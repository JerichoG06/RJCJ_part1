<?php
    require_once "settings.php";

    if (!$conn) {
        die("<p>Connection failed: " . mysqli_connect_error() . "</p>");
    }
?>

<!DOCTYPE html>
    <html>
    <head>
        <title>Manage EOIs</title>
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
            <label>New Status: <input type="text" name="new_status"></label>
            <input type="submit" name="update_status" value="Update Status">
        </form><br>

    <?php
        // 1. List All EOIs
        if (isset($_POST['list_all'])) {
            $query = "SELECT * FROM eoi";
            $result = mysqli_query($conn, $query);
            showResults($result);
        }
        // 2. List by Job Reference Number
        if (isset($_POST['list_by_job'])) {
            $job_ref = mysqli_real_escape_string($conn, $_POST['job_ref']);
            $query = "SELECT * FROM eoi WHERE job_reference_number = '$job_ref'";
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
            $query = "SELECT * FROM eoi WHERE $where";
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

        // Helper function to display results
        function showResults($result){
            if ($result && mysqli_num_rows($result) > 0){
                echo "<table border='1'><tr>";
                while ($field = mysqli_fetch_field($result)){
                    echo "<th>{$field->name}</th>";
                }
                echo "</tr>";
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    foreach ($row as $val){
                        echo "<td>" . htmlspecialchars($val) . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No results found.</p>";
            }
        }
    ?>

    </body>
    </html>