<?php
$paths = array
(
    __DIR__ . '/src/',
    __DIR__ . '/tests',
);

foreach ($paths as $path)
{
    spl_autoload_register(function ($class) use ($path)
    {
        if (($namespace = strrpos($class = ltrim($class, '\\'), '\\')) !== false)
        {
            $path .= strtr(substr($class, 0, ++$namespace), '\\', '/');
        }
        require($path . strtr(substr($class, $namespace), '_', '/') . '.php');
    });
}