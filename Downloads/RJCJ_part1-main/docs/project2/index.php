<?php include("includes/navbar.inc"); ?>

<main>
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
    </head>

    <!-- Set global body styling with font, background color, and text color -->
    <body>

      <!-- Website header containing logo, navigation, and intro message -->
      <header>
        
        <!-- Logo image wrapped in a clickable link -->
        <figure>
          <a href="images/rjcj.png"> <!-- Links to the image file, so when clicked, it opens the image -->
            <img src="images/rjcj.png" alt="RJCJ logo" title="filesize 232kb"> <!-- Displays the RJCJ logo, with a specified width and auto height, and provides an alternative text and title for the image -->
          </a>
        </figure>

        <!-- Main site title -->
        <h1>RJCJ IT</h1>

        <nav>
          <p class="menu"><a href="index.php">Home</a></p>
          <p class="menu"><a href="jobs.php">Job Descriptions</a></p>
          <p class="menu"><a href="apply.php">Apply Now</a></p>
          <p class="menu"><a href="about.php">About</a></p>
        </nav>

        <hr>
        <p><strong>At RJCJ, we provide industry-leading tech solutions. Explore exciting career opportunities in IT support and software development.</strong></p>
      </header>

      <!-- Main content section with history description -->
      <main>
        <section>
          <!-- Section title -->
          <h2>Our History</h2>

          <!-- Paragraph describing company background and growth -->
          <p>
            Founded in 2021 by a group of passionate technology students, RJCJ began as a small freelance collective offering tech support to local businesses. Over time, our reputation for reliability, innovation, and friendly service helped us grow into a respected IT solutions company. Today, RJCJ continues to evolve, combining deep technical expertise with a people-first approach to solve real-world challenges and support clients across various industries.
          </p>
        </section>
      </main>

      <footer>
        <div>
          <div>&copy; 2025 RJCJ Technologies</div>
          <div><a href="https://jericho06.atlassian.net/jira/software/projects/RJCJ/summary" target="_blank">Jira Project</a></div>
          <div><a href="https://github.com/JerichoG06/RJCJ_part1" target="_blank">GitHub</a></div>
          <div><a href="https://jerichog06.github.io/RJCJ_part1/" target="_blank">Live Site</a></div>
        </div>
      </footer>
    </body>
    </html>
</main>
<?php include("includes/footer.inc"); ?>