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

namespace Source;

/**
 * Description of PlexBootstraper
 *
 * @author Gor Mkhitaryan
 */
use Source\ServiceManager\ServiceManager;

class PlexBootstraper {

    public function __construct()
    {
        /**
         * Putting objects of classes into the Service manager
         */
        ServiceManager::set('DatabaseManager', new Database\DbManager);
        ServiceManager::set('Loader', new Loader\UniversalLoader);
        ServiceManager::set('MainConfig', new Config\Main);
        /**
         * MVC routing
         */
        $router = new Routing\URL\Router;
        $eventManager = new EventManager\EventManager;
        /**
         * Executing of event which will happen when the application initialised
         */
        $eventManager->execute('onInit');
        $router->route();
    }

}
