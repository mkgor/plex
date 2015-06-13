<?php

/*
 * Copyright (C) 2015 Depo
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
 * @author Gor Mkhitaryan
 */
interface DbInterface {

    /**
     * Executes raw query. It's dangerous, because if you using this in your application
     * It'll be vulnerable for SQL injection
     * @param type $query
     */
    public function raw_query($query);

    /**
     * Preapred query
     * @param type $query
     * @param type $bindParams
     */
    public function query($query, $bindParams = null);

    /**
     * Close the connection to DB
     */
    public function close();
}
