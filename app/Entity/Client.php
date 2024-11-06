<?php

class Client
{
  public function __construct(
    public string $id,
    public string $first_name,
    public string $last_name,
    public string $email,
    public string $phone,
    public string $address,
    public ?string $user_id = null,
  ) {}
}
