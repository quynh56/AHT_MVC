<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit70e35ea4d8e13fca09e607b739e0518d
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AHT_MVC1\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AHT_MVC1\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit70e35ea4d8e13fca09e607b739e0518d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit70e35ea4d8e13fca09e607b739e0518d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}