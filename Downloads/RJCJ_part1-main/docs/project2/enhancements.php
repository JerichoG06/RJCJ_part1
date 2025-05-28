<?php 
include("includes/header.inc"); 
include("includes/navbar.inc"); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Enhancements</title>
</head>
<body>
    <main>
        <section>
            <h2>Project Enhancements</h2>
            <p>The following enhancements were implemented to improve functionality, usability, and security of the HR management system:</p>

            <ul>
                <li>
                    <h3>1. Sort EOI Records by Selected Field</h3>
                    <p>
                        The manager interface was enhanced to include a dropdown that allows the manager to select the field (e.g., last name, application status, date applied) on which to sort the EOI records. This improves data accessibility and usability when reviewing applications. Utlises select to create dropdown, searches database for allowed fields, then prints the result.
                    </p>
                </li>

                <li>
                    <h3>2. Manager Registration Page with Server-Side Validation</h3>
                    <p>
                        A secure registration page was created where new managers can register. The system enforces:
                    </p>
                    <ul>
                        <li>Unique usernames (checked against existing records in the database).</li>
                        <li>Password rules (e.g., minimum length, inclusion of uppercase letters, numbers, etc.).</li>
                    </ul>
                    <p>The registration information is stored in a dedicated `managers` table in the database.</p>
                </li>

                <li>
                    <h3>3. Password-Protected Access to manage.php</h3>
                    <p>
                        Access to <code>manage.php</code> is now restricted to registered managers only. Users must log in with valid credentials. Session management is used to persist login status and prevent unauthorized access. This is done through creation of login.php.
                    </p>
                </li>
            </ul>
        </section>
    </main>
</body>
</html>
<?php include("includes/footer.inc"); ?>
