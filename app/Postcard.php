<?php
namespace App;

class Postcard{
    // public static function any(){
    //     dump("Inside any");
    // }

    public static function resolvedFacade($name){
        return app()[$name];
    }
    public static function __callStatic($method, $arg)
    {
        dump($method);
        dump(self::resolvedFacade('Postcard')
         ->$method(...$arg));
        dump($arg);
    } 

}