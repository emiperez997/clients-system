<?php

$title = 'Update user';
$url = 'users';
ob_start();

?>

<h1 class="bold red-text text-lighten-2 title">Update User</h1>

<?php if ($success) : ?>
  <div class="card-panel green lighten-2">
    <span class="white-text">
      User registered successfully!
    </span>

    <i id="close" class="material-icons white-text right waves-effect btn-flat">close</i>

  </div>

<?php elseif ($error): ?>
  <div class="card-panel red lighten-2">
    <span class="white-text">
      Error registering user!
    </span>

    <i id="close" class="material-icons white-text right waves-effect btn-flat">close</i>
  </div>
<?php endif; ?>


<div class="row">
  <form class="col s12" action="/users/update" method="POST">
    <div class="row">
      <div class="input-field col s12">
        <input
          name="id"
          id="id"
          type="hidden"
          class="validate"
          value="<?= $user["id"] ?>" />
      </div>
    </div>
    <div class="row">
      <div class="input-field col s6">
        <input
          name="first_name"
          placeholder="First Name"
          id="first_name"
          type="text"
          class="validate"
          value="<?= $user["first_name"] ?>" />

        <label for="first_name">First Name</label>
      </div>
      <div class="input-field col s6">
        <input
          name="last_name"
          id="last_name"
          type="text"
          class="validate"
          value="<?= $user["last_name"] ?>" />

        <label for="last_name">Last Name</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input
          name="email"
          id="email"
          type="email"
          class="validate"
          value="<?= $user["email"] ?>" />

        <label for="email">Email</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input
          name="password"
          id="password"
          type="password"
          class="validate"
          disabled
          value="<?= $user["password"] ?>" />
        <label for="password">Password</label>
      </div>
    </div>
    <div class="row">

      <div class="input-field col s12">
        <select name="role">
          <option value="" disabled selected>Choose your option</option>
          <option value="admin" <?= $user["role"] === "admin" ? "selected" : "" ?>>Admin</option>
          <option value="user" <?= $user["role"] === "user" ? "selected" : "" ?>>User</option>
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