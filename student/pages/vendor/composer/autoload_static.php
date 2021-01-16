<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2ce7f7f8f85d67b104f23bc83e72aa06
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Phpml\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Phpml\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-ai/php-ml/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2ce7f7f8f85d67b104f23bc83e72aa06::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2ce7f7f8f85d67b104f23bc83e72aa06::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}