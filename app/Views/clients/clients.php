<?php

$title = 'Clients';
$url = "clients";
ob_start();

$is_authenticaded = isset($_SESSION['user']);
$user_logged = $is_authenticaded ? $_SESSION['user'] : null;

?>

<h1 class="bold red-text text-lighten-2 title">My Clients</h1>

<?php require_once '../app/Views/layouts/partials/messages.php'; ?>

<?php if ($is_authenticaded && $user_logged["role"] === "user") : ?>
  <a href="/clients/create" class="waves-effect waves-light red lighten-2 btn my-2">Create Client</a>
<?php endif; ?>

<?php if (count($clients) > 0) : ?>
  <table class="responsive-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <?php if ($is_authenticaded && $user_logged["role"] === "admin") : ?>
          <th>User ID</th>
        <?php endif; ?>
        <?php if ($is_authenticaded && $user_logged["role"] === "user") : ?>
          <th>Action</th>
        <?php endif; ?>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($clients as $client) : ?>
        <tr>
          <td><?= htmlspecialchars($client['id'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?= htmlspecialchars($client['first_name'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?= htmlspecialchars($client['last_name'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?= htmlspecialchars($client['email'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?= htmlspecialchars($client['phone'], ENT_QUOTES, 'UTF-8'); ?></td>
          <td><?= htmlspecialchars($client['address'], ENT_QUOTES, 'UTF-8'); ?></td>
          <?php if ($is_authenticaded && $user_logged["role"] === "admin") : ?>
            <td><?= htmlspecialchars($client['user_id'], ENT_QUOTES, 'UTF-8') ?></td>
          <?php endif; ?>
          <?php if ($is_authenticaded && $user_logged["role"] === "user") : ?>
            <td>
              <a href="/clients/update?id=<?= htmlspecialchars($client['id'], ENT_QUOTES, 'UTF-8'); ?>" class="waves-effect waves-light btn green lighten-2 btn-floating">
                <i class="material-icons">edit</i>
              </a>
              <a href="/clients/delete?id=<?= htmlspecialchars($client['id'], ENT_QUOTES, 'UTF-8'); ?>" class="waves-effect waves-light btn red lighten-2 btn-floating">
                <i class="material-icons">delete</i>
              </a>
            </td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
<?php else : ?>
  <h5>No clients found.</h5>
<?php endif; ?>

<?php

$content = ob_get_clean();
require_once '../app/Views/layouts/main.php';

?>