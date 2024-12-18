<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit454ebb87d6af9f81b266a2317c88da9b
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit454ebb87d6af9f81b266a2317c88da9b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit454ebb87d6af9f81b266a2317c88da9b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit454ebb87d6af9f81b266a2317c88da9b::$classMap;

        }, null, ClassLoader::class);
    }
}
