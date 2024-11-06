<?php

require_once "../config/config.php";

class ClientModel
{
  public static function get_all_by_user($user_id)
  {
    global $pdo;

    $sql = "SELECT * FROM clients WHERE user_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id]);

    $clients = $stmt->fetchAll();

    return $clients;
  }

  public static function get_all()
  {
    global $pdo;

    $sql = "SELECT * FROM clients";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $clients = $stmt->fetchAll();

    return $clients;
  }

  public static function get_by_id($id)
  {
    global $pdo;

    $sql = "SELECT * FROM clients WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    $client = $stmt->fetch();

    return $client;
  }

  public static function create($client)
  {
    global $pdo;

    $sql = "INSERT INTO clients (id, user_id, first_name, last_name, email, phone, address) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $client = [$client->id, $client->user_id, $client->first_name, $client->last_name, $client->email, $client->phone, $client->address];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($client);

    return $stmt;
  }

  public static function update($client)
  {
    global $pdo;

    $sql = "UPDATE clients SET first_name = ?, last_name = ?, email = ?, phone = ?, address = ? WHERE id = ?";
    $client = [$client->first_name, $client->last_name, $client->email, $client->phone, $client->address, $client->id];
    $stmt = $pdo->prepare($sql);
    $stmt->execute($client);

    return $stmt;
  }

  public static function delete($id)
  {
    global $pdo;

    $sql = "DELETE FROM clients WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    return $stmt;
  }
}
