<?php

// Load config
require_once 'config/config.php';

// Autoload Core libraries, loads all in library
spl_autoload_register(function($className){
  require_once 'libraries/' . $className . '.php';

// Helpers
require_once 'helpers/redirect.php';
require_once 'helpers/session_handler.php';
});
