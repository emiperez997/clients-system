<?php

const ERROR_MESSAGES = [
  "not-found" => "The requested resource was not found",
  "method-not-allowed" => "The request method is not allowed",
  "server-error" => "An internal server error occurred",
  "unauthorized" => "You are not authorized to access this resource",
  "forbidden" => "You are forbidden from accessing this resource",
  "bad-request" => "The request is invalid",
  "invalid-credentials" => "Invalid credentials",
  "email-exists" => "Email already exists",
  "email-not-found" => "Email not found",
  "already-logged-in" => "You are already logged in",
  "update-own-user" => "You cannot update your own user",
  "delete-own-user" => "You cannot delete your own user",
];

function get_error_message($error)
{
  return match (true) {
    $error === "error=not-found" => ERROR_MESSAGES["not-found"],
    $error === "error=method-not-allowed" => ERROR_MESSAGES["method-not-allowed"],
    $error === "error=server-error" => ERROR_MESSAGES["server-error"],
    $error === "error=unauthorized" => ERROR_MESSAGES["unauthorized"],
    $error === "error=forbidden" => ERROR_MESSAGES["forbidden"],
    $error === "error=bad-request" => ERROR_MESSAGES["bad-request"],
    $error === "error=invalid-credentials" => ERROR_MESSAGES["invalid-credentials"],
    $error === "error=email-exists" => ERROR_MESSAGES["email-exists"],
    $error === "error=email-not-found" => ERROR_MESSAGES["email-not-found"],
    $error === "error=already-logged-in" => ERROR_MESSAGES["already-logged-in"],
    $error === "error=update-own-user" => ERROR_MESSAGES["update-own-user"],
    $error === "error=delete-own-user" => ERROR_MESSAGES["delete-own-user"],
    default => "An error occurred"
  };
}
