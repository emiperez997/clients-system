<li <?php if (isset($url) && $url === "home") echo "class='active'" ?>>
  <a href="/">
    <i class="material-icons left">home</i>
    Home
  </a>
</li>

<?php if ($is_authenticaded) : ?>
  <li <?php if (isset($url) && $url === "clients") echo "class='active'" ?>>
    <a href="/clients">
      <i class="material-icons left">contacts</i>
      Clients
    </a>
  </li>


  <?php if ($user_logged["role"] === "admin") : ?>
    <li <?php if (isset($url) && $url === "users") echo "class='active'" ?>>
      <a href="/users">
        <i class="material-icons left">people</i>
        Users
      </a>
    </li>
  <?php endif; ?>

  <li>
    <a href="#!">
      <i class="material-icons left">account_circle</i>
      <?= $user_logged["email"] ?>
    </a>
  </li>

  <li>
    <a href="/logout">
      <i class="material-icons left">logout</i>
      Logout
    </a>
  </li>
<?php else: ?>
  <li <?php if (isset($url) && $url === "register") echo "class='active'" ?>>
    <a href="/register">
      <i class="material-icons left">person_add</i>
      Register
    </a>
  </li>
  <li <?php if (isset($url) && $url === "login") echo "class='active'" ?>>
    <a href="/login">
      <i class="material-icons left">login</i>
      Login
    </a>
  </li>
<?php endif; ?>