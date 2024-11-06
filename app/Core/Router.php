<?php

require_once "../app/Core/Controller.php";

class Router
{
  public static function main()
  {
    RootController::get_controller($_SERVER);
  }
}
