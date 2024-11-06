<?php

$title = 'Login';
$url = 'login';
ob_start();

?>

<h1 class="bold red-text text-lighten-2 title">Login</h1>

<?php require_once '../app/Views/layouts/partials/messages.php'; ?>

<div class="row">
  <form class="col s12" action="/login" method="POST">
    <div class="row">
      <div class="input-field col s12">
        <input name="email" id="email" type="email" class="validate" />
        <label for="email">Email</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input name="password" id="password" type="password" class="validate" />
        <label for="password">Password</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <button type="submit" class="waves-effect waves-light red lighten-2 btn">Send</button>
      </div>
    </div>
  </form>
</div>

<?php

$content = ob_get_clean();
require_once '../app/Views/layouts/main.php';

?>