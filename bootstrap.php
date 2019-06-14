<?php

// env.local.php ignored file in git used to customise environment params
if (file_exists(__DIR__ . '/env.local.php')) {
    require __DIR__ . '/env.local.php';
} else {
    require __DIR__ . '/env.php';
}

foreach ($defaultEnvParams as $key => $value) {
    getenv($key) || putenv("$key=$value");
}

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/config/doctrine.php';