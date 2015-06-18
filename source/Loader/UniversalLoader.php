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

namespace Source\Loader;

/**
 * Description of UniversalLoader
 *
 * @author Gor Mkhitaryan
 */
class UniversalLoader
{

    /**
     * Returns object of model
     *
     * @param type $model
     * @return type
     */
    public function model($model)
    {
        $format = '\\App\\Models\\';
        if (!empty($model)) {
            if (class_exists($format . $model)) {
                return new $format . $model;
            }
        }
    }

    /**
     * Loads views
     * @param $tpl
     * @param array $params
     */
    public function view($tpl, array $params)
    {
        /**
         * @TODO
         */
    }

    /**
     * Returns object of library
     * @param $name
     * @return string
     */
    public function lib($name)
    {
        $format = 'Libraries\\' . $name;
        if (!empty($name)) {
            if (class_exists($format)) {
                return new $format;
            }
        } else {
            throw new \Exception('Loader error: empty library name');
        }
    }

}
