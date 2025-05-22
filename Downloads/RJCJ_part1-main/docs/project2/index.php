<?php include("includes/header.inc"); ?>
<?php include("includes/navbar.inc"); ?>

<main style="padding: 2em; max-width: 900px; margin: auto;">
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="RJCJ IT Home Page">
      <meta name="keywords" content="RJCJ IT, Job, Application, Opportunities, Home">
      <meta name="author" content="JG, RS, JP, CM">
      <title>RJCJ IT</title>
      <link rel="stylesheet" type="text/css" href="styles/styles.css">
      <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    </head>

    <!-- Set global body styling with font, background color, and text color -->
    <body style="margin: 0; font-family: 'Orbitron', sans-serif; background: #f4f4f4; color: #222;">

      <!-- Website header containing logo, navigation, and intro message -->
      <header style="background-color: #0401BE; color: white; padding: 1em; text-align: center;">
        
        <!-- Logo image wrapped in a clickable link -->
        <figure style="margin: 0;">
          <a href="images/rjcj.png"> <!-- Links to the image file, so when clicked, it opens the image -->
            <img src="images/rjcj.png" alt="RJCJ logo" title="filesize 232kb" style="width: 75px; height: auto;"> <!-- Displays the RJCJ logo, with a specified width and auto height, and provides an alternative text and title for the image -->
          </a>
        </figure>

        <!-- Main site title -->
        <h1 style="margin: 0.5em 0;">RJCJ IT</h1>
        <nav style="margin: 1em 0;">
          <p class="menu" style="display: inline; margin: 0 1em;"><a href="index.php" style="color: #fa269e; text-decoration: none;">Home</a></p>
          <p class="menu" style="display: inline; margin: 0 1em;"><a href="jobs.php" style="color: #fa269e; text-decoration: none;">Job Descriptions</a></p>
          <p class="menu" style="display: inline; margin: 0 1em;"><a href="apply.php" style="color: #fa269e; text-decoration: none;">Apply Now</a></p>
          <p class="menu" style="display: inline; margin: 0 1em;"><a href="about.php" style="color: #fa269e; text-decoration: none;">About</a></p>
        </nav>
        <hr style="border: none; border-top: 1px solid #fa269e; width: 80%; margin: auto;">
        <p style="margin-top: 1em;"><strong>At RJCJ, we provide industry-leading tech solutions. Explore exciting career opportunities in IT support and software development.</strong></p>
      </header>

      <!-- Main content section with history description -->
      <main style="padding: 2em; max-width: 900px; margin: auto;">
        <section>
          <!-- Section title -->
          <h2 style="color: #0401BE;">Our History</h2>

          <!-- Paragraph describing company background and growth -->
          <p>
            Founded in 2021 by a group of passionate technology students, RJCJ began as a small freelance collective offering tech support to local businesses. Over time, our reputation for reliability, innovation, and friendly service helped us grow into a respected IT solutions company. Today, RJCJ continues to evolve, combining deep technical expertise with a people-first approach to solve real-world challenges and support clients across various industries.
          </p>
        </section>
      </main>

      <footer style="background: radial-gradient(circle at center, #0401BE, #000000); color: whitesmoke; text-align: center; padding: 1em 0; margin-top: auto;">
        <div>
          <div>&copy; 2025 RJCJ Technologies</div>
          <div><a href="https://jericho06.atlassian.net/jira/software/projects/RJCJ/summary" style="color: #fa269e; text-decoration: none;" target="_blank">Jira Project</a></div>
          <div><a href="https://github.com/JerichoG06/RJCJ_part1" style="color: #fa269e; text-decoration: none;" target="_blank">GitHub</a></div>
          <div><a href="https://jerichog06.github.io/RJCJ_part1/" style="color: #fa269e; text-decoration: none;" target="_blank">Live Site</a></div>
        </div>
      </footer>
    </body>
    </html>
</main>
<?php include("includes/footer.inc"); ?>