<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit20ffbdf9670d31d6ed9d94ce50faf1c3
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit20ffbdf9670d31d6ed9d94ce50faf1c3', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit20ffbdf9670d31d6ed9d94ce50faf1c3', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit20ffbdf9670d31d6ed9d94ce50faf1c3::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
