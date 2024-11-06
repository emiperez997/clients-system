<?php

$title = 'Not Found';
ob_start();

?>

<section class="center">
  <h1 class="bold red-text text-lighten-2 title">404 - Not Found</h1>
  <p>Sorry, the page you are looking for does not exist.</p>
  <a href="/">
    <button class="waves-effect waves-light red btn">Go Back</button>
  </a>
</section>

<?php

$content = ob_get_clean();
require_once '../app/Views/layouts/main.php';

?>