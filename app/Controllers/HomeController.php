<?php

class HomeController
{
  public static function index($query)
  {
    $success = isset($query) && str_contains($query, "success") ? get_success_message($query) : null;
    $error = isset($query) && str_contains($query, "error") ? get_error_message($query) : null;

    require_once "../app/Views/home.php";
  }
}
