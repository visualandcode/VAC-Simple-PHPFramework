<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit61e699b6fb92cd46cd4a2b86a519847b
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'System\\' => 7,
        ),
        'M' => 
        array (
            'Modular\\' => 8,
        ),
        'L' => 
        array (
            'Libs\\' => 5,
        ),
        'C' => 
        array (
            'Cores\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'System\\' => 
        array (
            0 => __DIR__ . '/../..' . '/System',
        ),
        'Modular\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Modular',
        ),
        'Libs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/System/Libraries',
        ),
        'Cores\\' => 
        array (
            0 => __DIR__ . '/../..' . '/System/Cores',
        ),
    );

    public static $classMap = array (
        'IdiormMethodMissingException' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'IdiormResultSet' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'IdiormString' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'IdiormStringException' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'Model' => __DIR__ . '/..' . '/j4mie/paris/paris.php',
        'ORM' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'ORMWrapper' => __DIR__ . '/..' . '/j4mie/paris/paris.php',
        'ParisMethodMissingException' => __DIR__ . '/..' . '/j4mie/paris/paris.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit61e699b6fb92cd46cd4a2b86a519847b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit61e699b6fb92cd46cd4a2b86a519847b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit61e699b6fb92cd46cd4a2b86a519847b::$classMap;

        }, null, ClassLoader::class);
    }
}
