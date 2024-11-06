<?php

# Start the session
session_start();

require_once "../config/config.php";
require_once "../app/Core/Router.php";

Router::main();
