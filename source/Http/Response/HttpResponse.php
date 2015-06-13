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
 * Description of HttpResponse
 *
 * @author Gor Mkhitaryan
 */
class HttpResponse {

    /**
     * Setting the HTTP response
     * @param type $code
     */
    public static function response($code = 200)
    {
        $ver1 = 'HTTP/1.0';
        $ver11 = 'HTTP/1.1';
        /**
         * @TODO add new codes
         */
        switch ($code)
        {
            case 200:
                header($ver1 . ' 200 OK');
                break;
            case 404:
                header($ver1 . ' 404 Not Found');
                break;
            case 403:
                header($ver1 . ' 403 Forbidden');
                break;
            case 301:
                header($ver1 . ' 301 Moved Permanently');
                break;
            case 302:
                header($ver1 . ' 302 Moved Temporarily ');
                break;
            case 303:
                header($ver11 . ' 303 See Other');
                break;
            case 307:
                header($ver11 . '307 Temporary Redirect');
                break;
            default:
                header($ver1 . ' 200 OK');
                break;
        }

        return $code;
    }

}
