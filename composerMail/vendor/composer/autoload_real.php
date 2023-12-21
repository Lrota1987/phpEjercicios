<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInite2c8c85efa2e080884c34e4fbea8998f
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInite2c8c85efa2e080884c34e4fbea8998f', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInite2c8c85efa2e080884c34e4fbea8998f', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInite2c8c85efa2e080884c34e4fbea8998f::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}