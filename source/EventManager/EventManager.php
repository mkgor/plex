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

namespace Source\EventManager;

/**
 * Description of EventManager
 *
 * @author Gor Mkhitaryan
 */
class EventManager {

    /**
     * Shows js alert
     * @param type $msg
     * @return boolean
     * @throws \Exception
     */
    public function showMessage($msg)
    {
        if (!empty($msg)) {
            /**
             * @TODO beautiful messages
             */
            echo "<script>alert('" . $msg . "');</script>";
            return true;
        } else {
            throw new \Exception('Event error: empty message');
            return false;
        }
    }

    /**
     * Method which used to execute the events
     * @param type $method
     */
    public function execute($method)
    {
        switch ($method)
        {
            case 'onInit':
                $this->onInit();
                break;
            case 'onRoute':
                $this->onRoute();
                break;
        }
    }

    /**
     * onInit event
     * @return boolean
     * @throws Exception
     */
    public function onInit()
    {
        if (file_exists(BASE_PATH . 'app/events/onInit.php')) {
            if (class_exists('\\App\Events\\OnInit')) {
                $event = new \App\Events\OnInit;
            } else {
                throw new Exception("Event error: undefined event");
            }
        } else {
            return false;
        }
    }

    /**
     * onRoute event
     * @return boolean
     * @throws Exception
     */
    public function onRoute()
    {
        if (file_exists(BASE_PATH . 'app/events/onRoute.php')) {
            if (class_exists('\\App\Events\\OnRoute')) {
                $event = new \App\Events\OnRoute;
            } else {
                throw new Exception("Event error: undefined event");
            }
        } else {
            return false;
        }
    }

}
