<?php
// Block direct access
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: apply.php");
    exit();
}

define('ALLOW_SETTINGS', true);
require_once("settings.php");

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// === Step 1: Sanitize ===
function sanitise_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);
}

// === Step 2: Retrieve & sanitize form data ===
$jobRef      = sanitise_input($_POST["ref"]);
$fname       = sanitise_input($_POST["fname"]);
$lname       = sanitise_input($_POST["lname"]);
$dob         = sanitise_input($_POST["dob"]);
$gender      = sanitise_input($_POST["gender"]);
$address     = sanitise_input($_POST["address"]);
$suburb      = sanitise_input($_POST["suburb"]);
$state       = sanitise_input($_POST["state"]);
$postcode    = sanitise_input($_POST["postcode"]);
$email       = sanitise_input($_POST["email"]);
$phone       = sanitise_input($_POST["phone"]);
$otherSkills = sanitise_input($_POST["otherskills"]);

$skillsSelected = isset($_POST["skills"]) ? $_POST["skills"] : [];

$skill1_windows    = in_array("Windows", $skillsSelected) ? 1 : 0;
$skill2_linux      = in_array("Linux", $skillsSelected) ? 1 : 0;
$skill3_networking = in_array("Networking", $skillsSelected) ? 1 : 0;
$skill4_scripting  = in_array("Scripting", $skillsSelected) ? 1 : 0;

// === Step 3: Server-side validation ===
if (empty($jobRef)) {
    die("Job reference is required.");
}

if (!preg_match("/^[A-Za-z]{1,20}$/", $fname)) {
    die("First name must contain only letters (1–20 chars).");
}

if (!preg_match("/^[A-Za-z]{1,20}$/", $lname)) {
    die("Last name must contain only letters (1–20 chars).");
}

if (!preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $dob)) {
    die("Date of Birth must be in dd/mm/yyyy format.");
}

if (!in_array($gender, ["Male", "Female", "Other"])) {
    die("Please select a valid gender.");
}

if (strlen($address) > 40 || empty($address)) {
    die("Street address must be 1–40 characters.");
}

if (strlen($suburb) > 40 || empty($suburb)) {
    die("Suburb must be 1–40 characters.");
}

$validStates = ["VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT"];
if (!in_array($state, $validStates)) {
    die("Invalid state selected.");
}

if (!preg_match("/^\d{4}$/", $postcode)) {
    die("Postcode must be 4 digits.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}

if (!preg_match("/^[0-9 ]{8,12}$/", $phone)) {
    die("Phone must be 8–12 digits or spaces.");
}

if (!$skill1_windows && !$skill2_linux && !$skill3_networking && !$skill4_scripting) {
    die("At least one technical skill must be selected.");
}

// === Step 4: Create table if it doesn't exist ===
$table_query = "
CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    job_reference_number VARCHAR(10) NOT NULL,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    street_address VARCHAR(40) NOT NULL,
    suburb_town VARCHAR(40) NOT NULL,
    state ENUM('VIC','NSW','QLD','NT','WA','SA','TAS','ACT') NOT NULL,
    postcode CHAR(4) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(12) NOT NULL,
    skill1_windows BOOLEAN DEFAULT FALSE,
    skill2_linux BOOLEAN DEFAULT FALSE,
    skill3_networking BOOLEAN DEFAULT FALSE,
    skill4_scripting BOOLEAN DEFAULT FALSE,
    other_skills TEXT,
    status ENUM('New', 'Current', 'Final') DEFAULT 'New'
)";
mysqli_query($conn, $table_query);

// === Step 5: Insert into database ===
$insert_query = "
INSERT INTO eoi (
    job_reference_number, first_name, last_name, street_address, suburb_town, state, postcode,
    email, phone, skill1_windows, skill2_linux, skill3_networking, skill4_scripting, other_skills
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
";

$stmt = mysqli_prepare($conn, $insert_query);
if (!$stmt) {
    die("Prepare failed: " . mysqli_error($conn));
}

mysqli_stmt_bind_param(
    $stmt,
    "ssssssssiiiiss",
    $jobRef, $fname, $lname, $address, $suburb, $state, $postcode,
    $email, $phone,
    $skill1_windows, $skill2_linux, $skill3_networking, $skill4_scripting,
    $otherSkills
);

if (mysqli_stmt_execute($stmt)) {
    $eoiNumber = mysqli_insert_id($conn);
    echo "<h2>Application Successful!</h2>";
    echo "<p>Your EOI Number is: <strong>{$eoiNumber}</strong></p>";

    $skills = [];
    if ($skill1_windows)    $skills[] = "Windows";
    if ($skill2_linux)      $skills[] = "Linux";
    if ($skill3_networking) $skills[] = "Networking";
    if ($skill4_scripting)  $skills[] = "Scripting";

    echo "<p><strong>Skills Selected:</strong> " . implode(", ", $skills) . "</p>";
} else {
    echo "<p>Error submitting application: " . mysqli_error($conn) . "</p>";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
