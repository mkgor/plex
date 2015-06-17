<?php
/*
 * Copyright (C) 2015 Gor Mkhitaryan
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Source\Routing\URL;

/**
 * Description of Router
 *
 * @author Gor Mkhitaryan
 */
use Source\ServiceManager\ServiceManager;
use Source\Http\Response\HttpResponse;

class Router {

    public function route()
    {
        //Configuration data
        $config = ServiceManager::get('MainConfig')->getConfig();

        $uri = $_SERVER['REQUEST_URI'];

        //Making array from string
        $uri = explode('/', $uri);

        //$uri[0] it's always empty cell, so we don't need it and we delete it 
        unset($uri[0]);

        $controller = (!empty($uri[1])) ? $uri[1] : $config['controller']['default'];
        $method = (!empty($uri[2])) ? 'action' . $uri[2] : 'actionIndex';
        $format = 'App\Controllers\\' . $controller;

        if (file_exists(BASE_PATH . 'app\controllers' . '\\' . $controller . '.php')) {
            if (class_exists($format)) {
                if (method_exists($format, $method)) {
                    $_obj = new $format;
                    call_user_func_array(array($_obj, $method), array_slice($uri, 2));
                } else {
                    HttpResponse::response(404);
                    die('Method <b>' . $method . '</b> does not exists');
                }
            } else {
                HttpResponse::response(404);
                die('Class <b>' . $controller . '</b> does not exists');
            }
        } else {
            HttpResponse::response(404);
            die('File <b>' . $controller . '.php</b> does not exists');
        }
    }

}
