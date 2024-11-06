<?php

$title = 'Create user';
$url = 'users';
ob_start();

?>

<h1 class="bold red-text text-lighten-2 title">Create User</h1>

<?php require_once '../app/Views/layouts/partials/messages.php'; ?>

<div class="row">
  <form class="col s12" action="/users/create" method="POST">
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
        <input name="password" id="password" type="password" class="validate" />
        <label for="password">Password</label>
      </div>
    </div>
    <div class="row">

      <div class="input-field col s12">
        <select name="role">
          <option value="" disabled selected>Choose your option</option>
          <option value="admin">Admin</option>
          <option value="user">User</option>
        </select>
        <label>Role</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <button type="submit" class="waves-effect waves-light red lighten-2 btn">Send</button>
      </div>
    </div>
  </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, ["admin", "user"]);
  });
</script>

<?php

$content = ob_get_clean();
require_once '../app/Views/layouts/main.php';

?>