<?php
spl_autoload_register(function ($class) {
    $prefix = 'Config\\'; // Namespace prefix for Config classes
    $base_dir = __DIR__ . '/config/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

spl_autoload_register(function ($class) {
    $prefix = 'App\\Model\\'; // Namespace prefix for Model classes
    $base_dir = __DIR__ . '/app/Model/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

spl_autoload_register(function ($class) {
    $prefix = 'App\\Controller\\'; // Namespace prefix for Controller classes
    $base_dir = __DIR__ . '/app/Controller/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

spl_autoload_register(function ($class) {
    $prefix = 'Support\\'; // Namespace prefix for Support classes
    $base_dir = __DIR__ . '/bin/support/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});
require_once __DIR__ . '/bin/support/Asset.php';
require_once __DIR__ . '/bin/support/Prefix.php';
require_once __DIR__ . '/bin/support/Rc.php';
?>