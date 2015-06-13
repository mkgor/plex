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

/**
 * Description of HttpRedirect
 *
 * @author Gor Mkhitaryan
 */
class HttpRedirect {

    /**
     * Redirect
     * @param type $location
     * @param type $time
     * @throws Exception
     */
    public static function redirect($location = null, $time = 0)
    {
        if (!$location == null) {
            if ($time != 0) {
                header('Refresh: ' . $time . '; url=' . $location);
            } else {
                header('Location: ' . $location);
            }
        } else {
            throw new Exception('Http redirect error: empty location');
        }
    }

}
