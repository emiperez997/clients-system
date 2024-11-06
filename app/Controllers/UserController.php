<?php

require_once "../app/Models/UserModel.php";

class UserController
{
  public static function get_all($query)
  {
    if ($_SESSION['user']['role'] === 'user') {
      header("Location: /");
    }

    $success = isset($query) && str_contains($query, "success") ? get_success_message($query) : null;
    $error = isset($query) && str_contains($query, "error") ? get_error_message($query) : null;
    $users = UserModel::get_all();

    require_once "../app/Views/users/users.php";
  }

  public static function get_create($query)
  {
    if ($_SESSION['user']['role'] === 'user') {
      header("Location: /");
    }

    $success = isset($query) && str_contains($query, "success") ? get_success_message($query) : null;
    $error = isset($query) && str_contains($query, "error") ? get_error_message($query) : null;

    require_once "../app/Views/users/create.php";
  }

  public static function post_create($body)
  {
    $first_name = $body['first_name'];
    $last_name = $body['last_name'];
    $email = $body['email'];
    $password = $body['password'];
    $role = $body['role'];

    $hash = password_hash($password, PASSWORD_DEFAULT);

    try {
      $user = new User(uniqid(), $first_name, $last_name, $email, $role, $hash);

      UserModel::create($user);

      header("Location: /users?success=user-create");
    } catch (Exception $e) {
      if ($e->getCode() == 23000) {
        header("Location: /users/create?error=email-exists");
      } else {
        header("Location: /users/create?error=server-error");
      }
    }
  }

  public static function get_update($query)
  {
    if ($_SESSION['user']['role'] === 'user') {
      header("Location: /");
    }

    $id = explode("=", $query)[1];
    $user = UserModel::get_by_id($id);

    $success = isset($query) && str_contains($query, "success") ? get_success_message($query) : null;
    $error = isset($query) && str_contains($query, "error") ? get_error_message($query) : null;

    if (!$user) {
      header("Location: /users?error=not-found");
    }

    require_once "../app/Views/users/update.php";
  }

  public static function post_update($body)
  {

    if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'user') {
      header("Location: /users?error=forbidden");
    }

    $id = $body['id'];
    $first_name = $body['first_name'];
    $last_name = $body['last_name'];
    $email = $body['email'];
    $role = $body['role'];

    var_dump($_SESSION['user']['email'] === $email);

    if ($_SESSION['user']['email'] === $email) {
      header("Location: /users?error=update-own-user");
      return;
    }

    try {
      $user = new User(
        id: $id,
        first_name: $first_name,
        last_name: $last_name,
        email: $email,
        role: $role
      );

      UserModel::update($user);

      header("Location: /users?success=user-update");
    } catch (Exception $e) {
      if ($e->getCode() == 23000) {
        header("Location: /users/update?id=$id&error=email-exists");
      } else {
        header("Location: /users/update?id=$id&error=server-error");
      }
    }
  }

  public static function delete($query)
  {
    if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'user') {
      header("Location: /users?error=forbidden");
    }

    $id = explode("=", $query)[1];

    if ($_SESSION['user']['id'] === $id) {
      header("Location: /users?error=delete-own-user");
      return;
    }

    try {
      UserModel::delete($id);

      header("Location: /users?success=user-delete");
    } catch (Exception $e) {
      header("Location: /users?error=server-error");
    }
  }
}
