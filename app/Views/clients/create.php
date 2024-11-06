<?php

$title = 'Create client';
$url = 'clients';
ob_start();

?>

<h1 class="bold red-text text-lighten-2 title">Create Client</h1>

<?php require_once '../app/Views/layouts/partials/messages.php'; ?>

<div class="row">
  <form class="col s12" action="/clients/create" method="POST">
    <div class="row">
      <div class="input-field col s6">
        <input
          name="first_name"
          placeholder="First Name"
          id="first_name"
          type="text"
          class="validate" />
        <label for="first_name">First Name</label>
      </div>
      <div class="input-field col s6">
        <input name="last_name" id="last_name" type="text" class="validate" />
        <label for="last_name">Last Name</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input name="email" id="email" type="email" class="validate" />
        <label for="email">Email</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input name="phone" id="phone" type="text" class="validate" />
        <label for="phone">Phone</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input name="address" id="address" type="text" class="validate" />
        <label for="address">Address</label>
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