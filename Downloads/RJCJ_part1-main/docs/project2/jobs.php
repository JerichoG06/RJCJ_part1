<?php 
include("includes/navbar.inc"); 

// Fetch all jobs from the database
define('ALLOW_SETTINGS', true);
require_once("settings.php");
$sql = "SELECT job_reference_number, job_title, job_description, location, date_posted, title FROM jobs";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="RJCJ IT Job Page">
    <meta name="keywords" content="RJCJ IT, Job, Application, Opportunities, Home">
    <meta name="author" content="JG, RS, JP, CM">
    <title>RJCJ IT</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
</head>
<body>
    <div id="header">
        <header>
            <hr>
            <h2>Job Opportunities</h2>
            <aside id="WTG">
                <p>Steps to take</p>
                <ol>
                    <li>Read the below information about what qualifications and experience is needed</li>
                    <li>Click About in the navagation bar to learn more about the company</li>
                    <li>Click Apply in the navagation bar to apply for the job that suits you best</li>
                    <li>Lastly contact us if you have any unanswered questions</li>
                </ol>
            </aside>
            <div id="Jintro">
                <p>RJCJ are on the search to find this generation’s next best tech talent.</p>
                <p><small>As the digital world evolves, so does the need for skilled and passionate individuals ready to take on the challenges of modern technology. This page highlights exciting career opportunities:</small></p>
            </div>
            <br><br><br>

            <?php 
            if ($result && $result->num_rows > 0) {
                // Loop through each job and print its info
                while ($job = $result->fetch_assoc()) {
                    ?>
                    <section>
                        <div class="job-header">
                            <div></div>
                            <div class="job-title">
                                <h2><?php echo htmlspecialchars($job['job_title']); ?></h2>
                            </div>
                            <div class="job-reference">Reference Number: <?php echo htmlspecialchars($job['job_reference_number']); ?></div>
                        </div>
                        <br>
                        <div class="JD">
                            <p><?php echo nl2br(htmlspecialchars($job['job_description'])); ?></p>
                            <?php if (!empty($job['location'])): ?>
                                <p><strong>Location:</strong> <?php echo htmlspecialchars($job['location']); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($job['date_posted'])): ?>
                                <p><strong>Date Posted:</strong> <?php echo htmlspecialchars($job['date_posted']); ?></p>
                            <?php endif; ?>
                        </div>
                        
                    </section>
                    <br>
                    <?php
                }
            } else {
                echo "<p>No job opportunities available right now.</p>";
            }
            $conn->close();
            ?>

            <section class="final-message">
                <br>
                <h3>If you're ready to take the next step in your IT career and make a real impact, don’t miss this opportunity — apply now and become a part of our innovative and growing team!</h3>
            </section>
        </header>
    </div>

    <script>
        window.addEventListener('scroll', () => {
            const arrow = document.body;
            if (window.scrollY > 50) {
                arrow.style.setProperty('--scroll-indicator-opacity', '0');
                document.body.style.setProperty('opacity', '1');
                document.body.style.setProperty('scroll-behavior', 'smooth');
                document.body.style.setProperty('--scroll-indicator-visibility', 'hidden');
            }
        });
    </script>

    <footer>
        <div>
            <div>&copy; 2025 RJCJ Technologies</div>
            <div><a href="https://jericho06.atlassian.net/jira/software/projects/RJCJ/summary" target="_blank">Jira Project</a></div>
        </div>
    </footer>
</body>
</html>
