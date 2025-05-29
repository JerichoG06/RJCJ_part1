<?php include("includes/header.inc"); ?>
<?php include("includes/navbar.inc"); ?>

<main style="padding: 2em; max-width: 900px; margin: auto;">
    <h1>Apply for a Position at RJCJ IT</h1>

    <form action="process_eoi.php" method="post" novalidate="novalidate">
        <!-- Job Reference -->
        <label for="ref">Job Reference Number:</label>
        <select id="ref" name="ref" required>
            <option value="">--Select--</option>
            <option value="IT5T9">IT Support Technician</option>
            <option value="SW3NG">Software Engineer</option>
        </select><br><br>

        <!-- First & Last Name -->
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" maxlength="20" pattern="[A-Za-z]+" title="Only letters allowed" required><br><br>

        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" maxlength="20" pattern="[A-Za-z]+" title="Only letters allowed" required><br><br>

        <!-- DOB -->
        <label for="dob">Date of Birth:</label>
        <input type="text" id="dob" name="dob" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{4}" title="Format: dd/mm/yyyy" required><br><br>

        <!-- Gender -->
        <fieldset>
            <legend>Gender:</legend>
            <input type="radio" id="male" name="gender" value="Male" required>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label>
            <input type="radio" id="other" name="gender" value="Other">
            <label for="other">Other</label>
        </fieldset><br>

        <!-- Address -->
        <label for="address">Street Address:</label>
        <input type="text" id="address" name="address" maxlength="40" required><br><br>

        <label for="suburb">Suburb/Town:</label>
        <input type="text" id="suburb" name="suburb" maxlength="40" required><br><br>

        <label for="state">State:</label>
        <select id="state" name="state" required>
            <option value="">--Select--</option>
            <option value="VIC">VIC - Victoria</option>
            <option value="NSW">NSW - New South Wales</option>
            <option value="QLD">QLD - Queensland</option>
            <option value="NT">NT - Northern Territory</option>
            <option value="WA">WA - Western Australia</option>
            <option value="SA">SA - South Australia</option>
            <option value="TAS">TAS - Tasmania</option>
            <option value="ACT">ACT - Australian Capital Territory</option>
        </select><br><br>

        <label for="postcode">Postcode:</label>
        <input type="text" id="postcode" name="postcode" pattern="\d{4}" title="4-digit postcode" required><br><br>

        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email"
               pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
               title="Must be a valid email address" required><br><br>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" pattern="[0-9 ]{8,12}" title="8–12 digits, spaces allowed" required><br><br>

        <!-- Skills -->
        <fieldset>
            <legend>Technical Skills:</legend>
            <input type="checkbox" id="skill_windows" name="skills[]" value="Windows">
            <label for="skill_windows">Windows</label>

            <input type="checkbox" id="skill_linux" name="skills[]" value="Linux">
            <label for="skill_linux">Linux</label>

            <input type="checkbox" id="skill_networking" name="skills[]" value="Networking">
            <label for="skill_networking">Networking</label>

            <input type="checkbox" id="skill_scripting" name="skills[]" value="Scripting">
            <label for="skill_scripting">Scripting</label>
        </fieldset><br>

        <label for="otherskills">Other Skills:</label><br>
        <textarea id="otherskills" name="otherskills" rows="4" cols="40"
                  placeholder="e.g. Python, Docker, Team Leadership, Cloud Computing"></textarea><br><br>

        <input type="submit" value="Apply">
    </form>
</main>

<script>
        window.addEventListener('scroll', () => {
          const arrow = document.body;
          if (window.scrollY > 50) {
            arrow.style.setProperty('--scroll-indicator-opacity', '0');
            document.body.style.setProperty('opacity', '1'); // Ensure full visibility
            document.body.style.setProperty('scroll-behavior', 'smooth');
            document.body.style.setProperty('--scroll-indicator-visibility', 'hidden');
          }
        });
 </script>

<?php include("includes/footer.inc"); ?>
