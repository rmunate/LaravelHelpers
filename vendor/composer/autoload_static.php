<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6aa1291a54b1c22cb6ecbd14b47342ed
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Rmunate\\LaravelHelpers\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Rmunate\\LaravelHelpers\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit6aa1291a54b1c22cb6ecbd14b47342ed::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6aa1291a54b1c22cb6ecbd14b47342ed::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6aa1291a54b1c22cb6ecbd14b47342ed::$classMap;

        }, null, ClassLoader::class);
    }
}
