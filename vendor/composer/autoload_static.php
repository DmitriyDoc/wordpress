<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit76816bf36f042f033a1a79e5f5ad6905
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static $prefixesPsr0 = array (
        'j' => 
        array (
            'johnpbloch\\Composer\\' => 
            array (
                0 => __DIR__ . '/..' . '/johnpbloch/wordpress-core-installer/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit76816bf36f042f033a1a79e5f5ad6905::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit76816bf36f042f033a1a79e5f5ad6905::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit76816bf36f042f033a1a79e5f5ad6905::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit76816bf36f042f033a1a79e5f5ad6905::$classMap;

        }, null, ClassLoader::class);
    }
}
