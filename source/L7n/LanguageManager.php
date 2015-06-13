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
 * Description of LanguageManager
 * Syntax - Source\L7d\LanuageManager::write('TEXT_IDENTIFICATOR');
 * @author Gor Mkhitaryan
 */
class LanguageManager {

    /**
     * Displays the string
     * @param type $i11r ( = identificator)
     * @param type $file
     */
    public static function write($i11r, $file = 'lang')
    {
        if (!empty($i11r)) {
            $serviceManager = new \Source\ServiceManager\ServiceManager();
            $language = $serviceManager->get('MainConfig')->getConfig()['language'];

            $language = parse_ini_file(BASE_PATH . 'app/languages/' . $language . '/' . $file . '.ini');

            echo $language[$i11r];
        }
    }

    /**
     * Returns the string
     * @param type $i11r ( = identificator)
     * @return type
     */
    public static function get($i11r)
    {
        if (!empty($i11r)) {
            $serviceManager = new \Source\ServiceManager\ServiceManager();
            $language = $serviceManager->get('MainConfig')->getConfig()['language'];

            $language = parse_ini_file(BASE_PATH . 'app/languages/' . $language . '/' . $file . '.ini');

            return $language[$i11r];
        }
    }

    /**
     * Returns the current language
     * @return type
     */
    public static function getLanuguage()
    {
        $serviceManager = new \Source\ServiceManager\ServiceManager();

        return $serviceManager->get('MainConfig')->getConfig()['language'];
    }

}
