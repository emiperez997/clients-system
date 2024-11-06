<?php

$is_authenticaded = isset($_SESSION['user']);
$user_logged = $is_authenticaded ? $_SESSION['user'] : null;

?>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <title>
    PHP MVC | <?= $title ?>
  </title>
</head>


<nav>
  <div class="nav-wrapper container">
    <a href="#!" class="brand-logo">Proyects System</a>

    <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large right waves-effect">
      <i class="material-icons">
        menu
      </i>
    </a>
  </div>
</nav>

<ul class="sidenav" id="slide-out">
  <svg width="100%" height="80px" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" fill="#000000">
    <g id="SVGRepo_bgCarrier" stroke-width="0" />
    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
    <g id="SVGRepo_iconCarrier">
      <title>file_type_php3</title>
      <path d="M7.6,13.791a2.352,2.352,0,0,1,1.745.483,1.916,1.916,0,0,1,.207,1.66,2.78,2.78,0,0,1-.918,1.748,3.375,3.375,0,0,1-2.07.529h-1.4L6.024,13.8ZM2,22.677H4.3l.545-2.8H6.812A7.049,7.049,0,0,0,8.956,19.6a4.06,4.06,0,0,0,1.53-.918A4.585,4.585,0,0,0,11.93,16.1a3.288,3.288,0,0,0-.55-2.922A3.671,3.671,0,0,0,8.47,12.129H4.057Z" style="fill:#EE6E73" />
      <path d="M13.617,9.323H15.9l-.553,2.8h2.031a3.956,3.956,0,0,1,2.645.669,2.213,2.213,0,0,1,.436,2.167l-.954,4.909H17.195l.908-4.667a1.267,1.267,0,0,0-.114-1.086,1.6,1.6,0,0,0-1.144-.286H15.022l-1.175,6.044H11.559Z" style="fill:#EE6E73" />
      <path d="M25.539,13.791a2.352,2.352,0,0,1,1.745.483,1.916,1.916,0,0,1,.207,1.66,2.78,2.78,0,0,1-.918,1.748,3.375,3.375,0,0,1-2.074.529H23.1l.858-4.416Zm-5.6,8.886h2.3l.545-2.8h1.968A7.049,7.049,0,0,0,26.9,19.6a4.06,4.06,0,0,0,1.53-.918A4.585,4.585,0,0,0,29.869,16.1a3.288,3.288,0,0,0-.55-2.922,3.671,3.671,0,0,0-2.909-1.046h-4.42Z" style="fill:#EE6E73" />
    </g>
  </svg>

  <?php require 'partials/nav-links.php'; ?>
</ul>

<main class="container">
  <?= $content ?>
</main>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');

  body {
    font-family: 'Open Sans', sans-serif;
  }

  .title {
    font-family: 'Montserrat', sans-serif;
    font-size: 3.5rem;
  }

  .mt-5 {
    margin-top: 5rem;
  }

  .my-2 {
    margin-top: 2rem;
    margin-bottom: 2rem;
  }

  .bold {
    font-weight: bold;
  }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js" defer></script>
<script>
  // Initialize Materialize JS
  document.addEventListener('DOMContentLoaded', function() {
    const elems = document.querySelectorAll('.sidenav');
    const instances = M.Sidenav.init(elems);
  });

  const close = document.getElementById('close');

  if (close) {
    close.addEventListener('click', () => {
      close.parentElement.style.display = 'none';

      switch (window.location.pathname) {
        case '/login':
          window.location = '/login';
          break;
        case '/register':
          window.location = '/register';
          break;
        case '/users/create':
          window.location = '/users/create';
          break;
        case '/users':
          window.location = '/users';
          break;
        case '/clients/create':
          window.location = '/clients/create';
          break;
        case '/clients':
          window.location = '/clients';
          break;
        default:
          window.location = '/';
          break;
      }


    });
  }
</script>