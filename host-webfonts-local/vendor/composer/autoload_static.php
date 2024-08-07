<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit20ffbdf9670d31d6ed9d94ce50faf1c3
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'OMGF\\Tests\\Unit\\' => 16,
            'OMGF\\Tests\\Integration\\' => 23,
            'OMGF\\Tests\\' => 11,
            'OMGF\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'OMGF\\Tests\\Unit\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests/unit',
        ),
        'OMGF\\Tests\\Integration\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests/integration',
        ),
        'OMGF\\Tests\\' => 
        array (
            0 => __DIR__ . '/../..' . '/tests',
        ),
        'OMGF\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit20ffbdf9670d31d6ed9d94ce50faf1c3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit20ffbdf9670d31d6ed9d94ce50faf1c3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit20ffbdf9670d31d6ed9d94ce50faf1c3::$classMap;

        }, null, ClassLoader::class);
    }
}
