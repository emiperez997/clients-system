<?php

require_once "../app/Controllers/HomeController.php";
require_once "../app/Controllers/AuthController.php";
require_once "../app/Controllers/UserController.php";
require_once "../app/Controllers/ClientController.php";

class RootController
{
  public static function get_controller($request)
  {
    $uri = $request['REQUEST_URI'];
    $method = $request['REQUEST_METHOD'];

    if ($method === "GET") {
      $query = isset($request['QUERY_STRING']) ? $request['QUERY_STRING'] : null;

      if (isset($_SESSION['user'])) {
        match (true) {
          $uri === "/logout"                     => AuthController::logout(),
          str_contains($uri, "/users/create")    => UserController::get_create($query),
          str_contains($uri, "/users/update")    => UserController::get_update($query),
          str_contains($uri, "/users/delete")    => UserController::delete($query),
          str_contains($uri, "/users")           => UserController::get_all($query),

          str_contains($uri, "/clients/create")  => ClientController::get_create($query),
          str_contains($uri, "/clients/update")  => ClientController::get_update($query),
          str_contains($uri, "/clients/delete")  => ClientController::delete($query),
          str_contains($uri, "/clients")         => ClientController::get_all($query),
          str_contains($uri, "/")                => HomeController::index($query),
          default                                => RootController::get_not_found()
        };
      } else {
        match (true) {
          str_contains($uri, "/register")        => AuthController::get_register($query),
          str_contains($uri, "/login")           => AuthController::get_login($query),
          str_contains($uri, "/")                => HomeController::index($query),
          default                                => RootController::get_not_found()
        };
      }
    } else if ($method === "POST") {

      if (isset($_SESSION['user'])) {
        match (true) {
          $uri === "/users/create"               => UserController::post_create($_POST),
          $uri === "/users/update"               => UserController::post_update($_POST),
          $uri === "/clients/create"             => ClientController::post_create($_POST),
          $uri === "/clients/update"             => ClientController::post_update($_POST),
          default                                => RootController::get_not_found()
        };
      } else {
        match (true) {
          $uri === "/register"                   => AuthController::post_register($_POST),
          $uri === "/login"                      => AuthController::post_login($_POST),
          default                                => RootController::get_not_found()
        };
      }
    }
  }

  public static function get_not_found()
  {
    require_once "../app/Views/not-found.php";
  }
}
