<?php

namespace Util;

class RotasUtil{

    public static function getRotas(){
        $urls = self::getUrls();
        $request = [];
        $request['rota'] = strtoupper($urls[0]);
        $request['recurso'] = $urls[1] ?? null;
        $request['id'] = $urls[2] ?? null;
        $request['metodo'] = $_SERVER['REQUEST_METHOD'];

        return $request;
    }

    public static function getUrls(){
        return explode('/', trim($_SERVER['REQUEST_URI'],'/'));
    }

}