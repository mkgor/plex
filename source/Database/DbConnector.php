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

namespace Source\Database;

/**
 * Description of DbConnector
 *
 * @author Gor Mkhitaryan
 */
class DbConnector {

    /**
     * Connecting to DB 
     * @return \Source\Database\PDOC
     */
    public function __construct()
    {
        $serviceManager = new \Source\ServiceManager\ServiceManager();
        $config = $serviceManager->get('MainConfig')->getConfig();

        $pdo = new PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['current_db'], $config['db']['user'], $config['db']['password'], array(
            PDO::ATTR_PERSISTENT => true
        ));

        return $pdo;
    }

}
