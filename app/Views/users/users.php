<?php

$title = 'Users';
$url = "users";
ob_start();

$is_authenticaded = isset($_SESSION['user']);
$user_logged = $is_authenticaded ? $_SESSION['user'] : null;

?>

<h1 class="bold red-text text-lighten-2 title">Users</h1>

<?php require_once '../app/Views/layouts/partials/messages.php'; ?>

<?php if ($is_authenticaded && $user_logged["role"] === "admin") : ?>
  <a href="/users/create" class="waves-effect waves-light red lighten-2 btn my-2">Create User</a>
<?php endif; ?>

<?php if (count($users) > 0) : ?>
  <table class="responsive-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user) : ?>
        <tr>
          <td><?= $user['id'] ?></td>
          <td><?= $user['first_name'] ?></td>
          <td><?= $user['last_name'] ?></td>
          <td><?= $user['email'] ?></td>
          <td><?= $user['role'] ?></td>
          <td>
            <?php if ($is_authenticaded && $user_logged["role"] === "admin") : ?>
              <a href="/users/update?id=<?= $user['id'] ?>" class="waves-effect waves-light btn btn-floating green lighten-2">
                <i class="material-icons">edit</i>
              </a>
              <a href="/users/delete?id=<?= $user['id'] ?>" class="waves-effect waves-light btn btn-floating red accent-2">
                <i class="material-icons">delete</i>
              </a>
            <?php endif; ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php else : ?>
  <h5>No users found.</h5>
<?php endif; ?>

<?php

$content = ob_get_clean();
require_once '../app/Views/layouts/main.php';

?>