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
 * Description of DbManager
 *
 * @author Gor Mkhitaryan
 */
class DbManager implements DbInterface {
    /**
     * Contains the object of PDO
     * @var type 
     */
    private $db;
    
    public function connect()
    {
        $dbConnector = new DbConnector;
        
        $this->db = $dbConnector;
    }
    
    public function query($query, $bindParams = null)
    {
        
    }

    public function raw_query($query)
    {
        
    }

    public function close()
    {
     
    }

}
