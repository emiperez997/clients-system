<?php

const SUCCESS_MESSAGES = [
  "register-success" => "Registration successful",
  "login-success" => "Login successful",
  "logout-success" => "Logout successful",
  "user-create-success" => "User created successfully",
  "user-update-success" => "User updated successfully",
  "user-delete-success" => "User deleted successfully",

  "client-create-success" => "Client created successfully",
  "client-update-success" => "Client updated successfully",
  "client-delete-success" => "Client deleted successfully",
];

function get_success_message($success)
{
  return match (true) {
    $success === "success=register" => SUCCESS_MESSAGES["register-success"],
    $success === "success=login" => SUCCESS_MESSAGES["login-success"],
    $success === "success=logout" => SUCCESS_MESSAGES["logout-success"],
    $success === "success=user-create" => SUCCESS_MESSAGES["user-create-success"],
    $success === "success=user-update" => SUCCESS_MESSAGES["user-update-success"],
    $success === "success=user-delete" => SUCCESS_MESSAGES["user-delete-success"],

    $success === "success=client-create" => SUCCESS_MESSAGES["client-create-success"],
    $success === "success=client-update" => SUCCESS_MESSAGES["client-update-success"],
    $success === "success=client-delete" => SUCCESS_MESSAGES["client-delete-success"],
    default => "Success"
  };
}
