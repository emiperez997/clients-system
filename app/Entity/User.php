<?php

class User
{
  public function __construct(
    public string $id,
    public string $first_name,
    public string $last_name,
    public string $email,
    public string $role,
    public ?string $password = null,
  ) {}
}
