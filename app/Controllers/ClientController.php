<?php

require_once "../app/Models/ClientModel.php";
require_once "../app/Entity/Client.php";

class ClientController
{
  public static function get_all($query)
  {
    $success = isset($query) && str_contains($query, "success") ? get_success_message($query) : null;
    $error = isset($query) && str_contains($query, "error") ? get_error_message($query) : null;

    if ($_SESSION['user']['role'] === 'admin') {
      $clients = ClientModel::get_all();
      require_once "../app/Views/clients/clients.php";
      return;
    }

    $user_id = $_SESSION["user"]["id"];
    $clients = ClientModel::get_all_by_user($user_id);

    require_once "../app/Views/clients/clients.php";
  }

  public static function get_create($query)
  {
    if ($_SESSION['user']['role'] === 'admin') {
      header("Location: /?error=forbidden");
    }

    $success = isset($query) && str_contains($query, "success") ? get_success_message($query) : null;
    $error = isset($query) && str_contains($query, "error") ? get_error_message($query) : null;

    require_once "../app/Views/clients/create.php";
  }

  public static function post_create($body)
  {

    $id = uniqid();
    $first_name = $body['first_name'];
    $last_name = $body['last_name'];
    $email = $body['email'];
    $phone = $body['phone'];
    $address = $body['address'];

    $user_id = $_SESSION["user"]["id"];

    $client = new Client(
      $id,
      $first_name,
      $last_name,
      $email,
      $phone,
      $address,
      $user_id
    );

    try {
      ClientModel::create($client);

      header("Location: /clients?success=client-create");
    } catch (Exception $e) {
      if ($e->getCode() == 23000) {
        header("Location: /clients/create?error=email-exists");
      } else {
        header("Location: /clients/create?error=server-error");
      }
    }
  }

  public static function get_update($query)
  {
    $success = isset($query) && str_contains($query, "success") ? get_success_message($query) : null;
    $error = isset($query) && str_contains($query, "error") ? get_error_message($query) : null;

    $id = explode("=", $query)[1];

    $client = ClientModel::get_by_id($id);

    if ($client['user_id'] !== $_SESSION['user']['id']) {
      header("Location: /?error=forbidden");
    }

    require_once "../app/Views/clients/update.php";
  }

  public static function post_update($body)
  {
    $id = $body['id'];
    $first_name = $body['first_name'];
    $last_name = $body['last_name'];
    $email = $body['email'];
    $phone = $body['phone'];
    $address = $body['address'];

    $client = new Client(
      $id,
      $first_name,
      $last_name,
      $email,
      $phone,
      $address
    );

    try {
      ClientModel::update($client);

      header("Location: /clients?success=client-update");
    } catch (Exception $e) {
      if ($e->getCode() == 23000) {
        header("Location: /clients/edit/$id?error=email-exists");
      } else {
        header("Location: /clients/edit/$id?error=server-error");
      }
    }
  }

  public static function delete($query)
  {
    $id = explode("=", $query)[1];
    try {
      ClientModel::delete($id);

      header("Location: /clients?success=client-delete");
    } catch (Exception $e) {
      header("Location: /clients?error=server-error");
    }
  }
}
