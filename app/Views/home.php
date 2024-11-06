<?php

$title = 'Home';
$url = "home";
ob_start();

?>

<?php require_once '../app/Views/layouts/partials/messages.php'; ?>

<section class="center">
  <h1 class="bold red-text text-lighten-2 title">Welcome to the home page</h1>
  <p>This is the home page of the website.</p>
</section>

<?php

$content = ob_get_clean();
require_once '../app/Views/layouts/main.php';

?>