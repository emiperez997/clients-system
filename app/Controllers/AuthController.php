<?php

require_once "../app/Models/AuthModel.php";
require_once "../app/Entity/User.php";

require_once "../app/Common/error_messages.php";
require_once "../app/Common/success_messages.php";

class AuthController
{
  public static function get_register($query)
  {

    if (isset($_SESSION['user'])) {
      header("Location: /");
    }

    $success = isset($query) && str_contains($query, "success") ? get_success_message($query) : null;
    $error = isset($query) && str_contains($query, "error") ? get_error_message($query) : null;

    require_once "../app/Views/register.php";
  }

  public static function post_register($body)
  {
    if (isset($_SESSION['user'])) {
      header("Location: /");
    }

    $first_name = $body['first_name'];
    $last_name = $body['last_name'];
    $email = $body['email'];
    $password = $body['password'];

    $hash = password_hash($password, PASSWORD_DEFAULT);

    try {
      $user = new User(uniqid(), $first_name, $last_name, $email, $hash, "user");

      AuthModel::register($user);

      header("Location: /register?success=register");
    } catch (Exception $e) {
      header("Location: /register?error=email-exists");
    }
  }

  public static function get_login($query)
  {
    if (isset($_SESSION['user'])) {
      header("Location: /?error=already-logged-in");
    }

    $success = isset($query) && str_contains($query, "success") ? get_success_message($query) : null;
    $error = isset($query) && str_contains($query, "error") ? get_error_message($query) : null;

    require_once "../app/Views/login.php";
  }

  public static function post_login($body)
  {
    if (isset($_SESSION['user'])) {
      header("Location: /?error=already-logged-in");
    }

    $email = $body['email'];
    $password = $body['password'];

    try {
      $user = AuthModel::login($email);

      $is_password_correct = password_verify($password, $user["password"]);

      if ($user && $is_password_correct) {
        $_SESSION['user'] = $user;
        header("Location: /?success=login");
      } else {
        header("Location: /login?error=invalid-credentials");
      }
    } catch (Exception $e) {
      header("Location: /login?error=email-not-found");
    }
  }

  public static function logout()
  {
    session_destroy();
    header("Location: /login");
  }
}
