<?php include("includes/header.inc"); ?>
<?php include("includes/navbar.inc"); ?>
<?php include("includes/logo.inc"); ?>

<main>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="RJCJ IT Home Page">
      <meta name="keywords" content="RJCJ IT, Job, Application, Opportunities, Home">
      <meta name="author" content="JG, RS, JP, CM">
      <link rel="stylesheet" type="text/css" href="styles/styles.css">
    </head>

    <!-- Set global body styling with font, background color, and text color -->
    <body>

      <div class="container site-header">
        <!-- Website header containing logo, navigation, and intro message -->
        <header>

          <figure class="logo">
            <a href="about.php">
              <img src="styles/images/rjcj.png" alt="RJCJ logo" title="Go to About Page">
            </a>
          </figure>
          
          <!-- Main site title -->
          <h1 class="headline">RJCJ IT</h1>
          <hr>
          <p class="subtext"><strong>At RJCJ, we provide industry-leading tech solutions. Explore exciting career opportunities in IT support and software development.</strong></p>
        </header>
      </div>

      <hr class="section-divider">

      <!-- Main content section with history description -->
      <main>
        <div class="container main-content">
          <section>
            <!-- Section title -->
            <h2 class="section-title">Our History</h2>

            <!-- Paragraph describing company background and growth -->
            <p class="lead-paragraph">
              Founded in 2021 by a group of passionate technology students, RJCJ began as a small freelance collective offering tech support to local businesses. Over time, our reputation for reliability, innovation, and friendly service helped us grow into a respected IT solutions company. Today, RJCJ continues to evolve, combining deep technical expertise with a people-first approach to solve real-world challenges and support clients across various industries.
            </p>
          </section>
        </div>
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