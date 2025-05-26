<?php include("includes/header.inc"); ?>
<?php include("includes/navbar.inc"); ?>

<hr class="section-divider" />

<main class="container">
    <section>
      <h2 class="section-title">📋 Group Information</h2>
      <p><strong>Group Name:</strong> RJCJ</p>
      <p><strong>Class Time and Day:</strong> Monday, 10:30 AM – 12:30 PM</p>
      <p><strong>Student IDs:</strong> Jericho: 106004642, Rishon: 106012878, Jamin: 105613995, Collins: 104192202</p>

      <h3 class="section-subtitle">💡 Project Ideas</h3>
      <ul>
        <li>Real-time Analytics</li>
        <li>Voice Recognition</li>
        <li>Data Visualization</li>
      </ul>

      <h3 class="section-subtitle">🎓 Tutor</h3>
      <p><strong>Tutor’s Name:</strong> Razeen Hashmi</p>

      <h3 class="section-subtitle">🛠️ Members Contributions</h3>
      <dl>
        <dt><strong>Jericho Gonzalez</strong></dt>
        <dd>Lead Developer – Responsible for backend architecture and API development.</dd>

        <dt><strong>Rishon Sunil</strong></dt>
        <dd>Frontend Developer – Focused on UI/UX design and frontend logic.</dd>

        <dt><strong>Jamin Petruccelli</strong></dt>
        <dd>Project Manager – Coordinated project milestones and timelines.</dd>

        <dt><strong>Collins Menghong</strong></dt>
        <dd>Project Manager – Coordinated project milestones and timelines.</dd>
      </dl>

      <h3 class="section-subtitle">🖼️ Group Photo</h3>
      <div class="centered">
        <figure class="group-photo">
          <img src="images/IMG_0008.JPEG" alt="Our Group" width="579" height="772" />
          <figcaption><em>Our Group Picture</em></figcaption>
        </figure>
      </div>

      <h3 class="section-subtitle">🎵 Members' Interests</h3>
      <table class="interests-table" border="1" cellpadding="10" cellspacing="0">
        <caption><strong>Members' Hobbies and Interests</strong></caption>
        <thead>
          <tr>
            <th>Name</th>
            <th>Hobby</th>
            <th>Favorite Music</th>
            <th>Favorite Book</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>Jericho Gonzalez</td><td>Tennis</td><td>Indie Rock</td><td>Snow Crash by Neal Stephenson</td></tr>
          <tr><td>Rishon Sunil</td><td>Hiking</td><td>EDM</td><td>1984 by George Orwell</td></tr>
          <tr><td>Jamin Petruccelli</td><td>Basketball</td><td>Kpop</td><td>House of Leaves by Mark Z. Danielewski</td></tr>
          <tr><td>Collins Menghong</td><td>Photography</td><td>Pop</td><td>The Great Gatsby by F. Scott Fitzgerald</td></tr>
        </tbody>
      </table>

      <h3 class="section-subtitle">🧠 Group Profile</h3>
      <p><strong>Programming Skills:</strong> Python, JavaScript, HTML, CSS, React.js</p>
      <p><strong>Working Experiences:</strong> Internships in Web Development, Mobile App Development</p>
      <p><strong>Demographics:</strong> We are a diverse group from various cultural backgrounds.</p>
      <p><strong>Hometowns:</strong> Jericho: Werribee, Rishon: Caufield, Jamin: Dandenong, Collins: Footscray</p>
    </section>

    <h3 class="section-subtitle">🛠️ Members Contributions</h3>
      <dl>
        <dt><strong>Jericho Gonzalez</strong></dt>
        <dd>Backend Developer – Created <code>settings.php</code>, set up the SQL database, and built <code>manage.php</code> for managing EOIs.</dd>

        <dt><strong>Rishon Sunil</strong></dt>
        <dd>Frontend Developer – Refactored HTML into PHP, integrated headers and navbars, and authored <code>styles.css</code>. Also documented team contributions in <code>about.php</code>.</dd>

        <dt><strong>Jamin Petruccelli</strong></dt>
        <dd>Form Developer – Developed <code>process_eoi.php</code>, updated <code>apply.php</code>, and provided EOI table structure to backend.</dd>

        <dt><strong>Collins Menghong</strong></dt>
        <dd>Presentation & QA – Created the PowerPoint pitch deck and reviewed the project for formatting, accuracy, and consistency.</dd>
      </dl>

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
</main>

<?php include("includes/header.inc"); ?>