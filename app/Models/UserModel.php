<?php

require_once "../config/config.php";

class UserModel
{
  public static function get_all()
  {
    global $pdo;

    $sql = "SELECT id, first_name, last_name, email, role FROM users";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
  }

  public static function get_by_id($id)
  {
    global $pdo;

    $sql = "SELECT id, first_name, last_name, email, role, password FROM users WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    return $stmt->fetch();
  }

  public static function create($user)
  {
    global $pdo;

    $sql = "INSERT INTO users (id, first_name, last_name, email, password, role) VALUES (?, ?, ?, ?, ?, ?)";
    $user = [$user->id, $user->first_name, $user->last_name, $user->email, $user->password, $user->role];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($user);

    return $stmt;
  }

  public static function update($user)
  {
    global $pdo;

    $sql = "UPDATE users SET first_name = ?, last_name = ?, email = ?, role = ? WHERE id = ?";
    $user = [$user->first_name, $user->last_name, $user->email, $user->role, $user->id];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($user);

    return $stmt;
  }

  public static function delete($id)
  {
    global $pdo;

    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    return $stmt;
  }
}
