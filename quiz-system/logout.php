<?php
require_once __DIR__ . '/includes/functions.php';
session_unset();
session_destroy();
session_start();
setFlash('flash_success', 'Tu veiksmīgi izlogojies.');
redirect('index.php');
