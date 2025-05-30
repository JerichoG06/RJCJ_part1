<?php
    session_start();
    define('ALLOW_SETTINGS', true);
    require_once "settings.php";
    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
    }    
    if (!$conn) {
        die("<p>Connection failed: " . mysqli_connect_error() . "</p>");
    }
?>

<!DOCTYPE html>
    <html>
    <head>
        <title>Manage EOIs</title>
        <link rel="stylesheet" type="text/css" href="styles/styles.css">
    </head>
    <body>
        <h2>Manage EOIs</h2>
        <!-- FORM to list all EOIs -->
        <form method="post">
            <input type="submit" name="list_all" value="List All EOIs">
        </form><br>
        <!-- FORM to list EOIs by job reference -->
        <form method="post">
            <label>Job Reference Number: <input type="text" name="job_ref"></label>
            <input type="submit" name="list_by_job" value="List by Job Reference">
        </form><br>
        <!-- FORM to list EOIs by applicant name -->
        <form method="post">
            <label>First Name: <input type="text" name="first_name"></label>
            <label>Last Name: <input type="text" name="last_name"></label>
            <input type="submit" name="list_by_name" value="List by Name">
        </form><br>
        <!-- FORM to delete EOIs by job reference -->
        <form method="post">
            <label>Job Reference to Delete: <input type="text" name="delete_job_ref"></label>
            <input type="submit" name="delete_by_job" value="Delete EOIs">
        </form><br>
        <!-- FORM to change status -->
        <form method="post">
            <label>EOI Number: <input type="text" name="eoi_number"></label>
            <label>New Status: (New,Current,) <input type="text" name="new_status"></label>
            <input type="submit" name="update_status" value="Update Status">
        </form><br>
        <!-- FORM to sort EOIs by selected field -->
        <form method="post">
                <label>Sort EOIs by:
                    <select name="sort_field">
                        <option value="EOInumber">EOI Number</option>
                        <option value="job_reference_number">Job Reference</option>
                        <option value="first_name">First Name</option>
                        <option value="last_name">Last Name</option>
                        <option value="status">Status</option>
                    </select>
                </label>
                <input type="submit" name="sort_eois" value="Sort">
            </form><br>

    <?php
        // 1. List All EOIs
        if (isset($_POST['list_all'])) {
            $query = "SELECT EOInumber, job_reference_number, first_name, last_name, street_address, suburb_town, state, postcode, email, phone, status FROM eoi";
            $result = mysqli_query($conn, $query);
            showResults($result);
        }
        // 2. List by Job Reference Number
        if (isset($_POST['list_by_job'])) {
            $job_ref = mysqli_real_escape_string($conn, $_POST['job_ref']);
            $query = "SELECT EOInumber, job_reference_number, first_name, last_name,street_address, suburb_town, state, postcode, email, phone, status FROM eoi WHERE job_reference_number = '$job_ref'";
            $result = mysqli_query($conn, $query);
            showResults($result);
        }
        // 3. List by First or Last Name
        if (isset($_POST['list_by_name'])){
            $fname = mysqli_real_escape_string($conn,$_POST['first_name']);
            $lname = mysqli_real_escape_string($conn,$_POST['last_name']);
            $conditions = [];
            if (!empty($fname)) $conditions[] = "first_name = '$fname'";
            if (!empty($lname)) $conditions[] = "last_name = '$lname'";
            $where = implode(" AND ", $conditions);
            $query = "SELECT EOInumber, job_reference_number, first_name, last_name,street_address, suburb_town, state, postcode, email, phone, status FROM eoi WHERE $where";
            $result = mysqli_query($conn, $query);
            showResults($result);
        }
        // 4. Delete by Job Reference Number
        if (isset($_POST['delete_by_job'])){
            $del_ref = mysqli_real_escape_string($conn,$_POST['delete_job_ref']);
            $query = "DELETE FROM eoi WHERE job_reference_number = '$del_ref'";
            if(mysqli_query($conn, $query)){
                echo "<p>Deleted EOIs with job reference: $del_ref</p>";
            } else { 
                echo "<p>Error deleting: " . mysqli_error($conn) . "</p>";
            }
        }

        // 5. Update EOI Status
        if (isset($_POST['update_status'])){
            $eoi_num = mysqli_real_escape_string($conn, $_POST['eoi_number']);
            $new_status = mysqli_real_escape_string($conn, $_POST['new_status']);
            $query = "UPDATE eoi SET status = '$new_status' WHERE EOInumber = '$eoi_num'";
            if (mysqli_query($conn, $query)){
                echo "<p>Status updated for EOI: $eoi_num</p>";
            } else {
                echo "<p>Error updating status: " . mysqli_error($conn) . "</p>";
            }
        }
// 6. Sort EOIs by selected field
if (isset($_POST['sort_eois'])) {
    // Check if the form was submitted with a request to sort EOIs

    $allowed_fields = ['EOInumber', 'job_reference_number', 'first_name', 'last_name', 'status'];
    // Define a whitelist of allowed fields that can be used for sorting
    $field = $_POST['sort_field'];
    // Get the selected field from the submitted form (e.g., from a dropdown)
    if (in_array($field, $allowed_fields)) {
        // Check that the selected field is in the allowed list before using it in the SQL query
        $query = "SELECT EOInumber, job_reference_number, first_name, last_name, street_address, suburb_town, state, postcode, email, phone, status FROM eoi ORDER BY $field";
        // Construct an SQL query to select all relevant fields from the 'eoi' table
        // and sort the results by the selected field
        $result = mysqli_query($conn, $query);
        // Execute the SQL query and store the result
        showResults($result);
        // Call a function (presumably defined elsewhere) to display the query results in a formatted way
    } else {
        echo "<p>Invalid sort field selected.</p>";
        // If the selected field is not allowed, show an error message
    }
}


       // Helper function to display results
function showResults($result) {
    // Check if the result is valid and contains rows
    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table border='1'><tr>"; // Start an HTML table with a border and begin the header row
        while ($field = mysqli_fetch_field($result)) { // Loop through each field (column) in the result set
            echo "<th>{$field->name}</th>"; // Output the column name as a table header cell
        }
        echo "</tr>"; // Close the header row

        while ($row = mysqli_fetch_assoc($result)) { // Loop through each row in the result set
            echo "<tr>";
            foreach ($row as $val) { // Loop through each value in the row
                echo "<td>" . htmlspecialchars($val) . "</td>"; // Output the value in a table cell, using htmlspecialchars to prevent XSS
            }
            echo "</tr>"; // Close the table row
        }

        echo "</table>"; // End the HTML table
    } else {
        echo "<p>No results found.</p>"; // If no rows were found or the query failed, display a message
    }
}

    ?>
        <p><a href="logout.php">Logout</a></p>
    </body>
    </html>