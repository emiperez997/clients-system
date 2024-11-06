<?php

require_once "../config/config.php";

class AuthModel
{
  public static function register($user)
  {
    global $pdo;

    $sql = "INSERT INTO users (id, first_name, last_name, email, password) VALUES (?, ?, ?, ?, ?)";
    $user = [$user->id, $user->first_name, $user->last_name, $user->email, $user->password];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($user);

    return $stmt;
  }

  public static function login($email)
  {
    global $pdo;


    $sql = "SELECT id, email, password, role FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);

    $user = $stmt->fetch();

    return $user;
  }
}
