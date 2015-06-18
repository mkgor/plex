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

namespace Libraries;

class Benchmark
{
    /**
     * @var array
     */
    public $marks = array();
    /**
     * @var boolean
     */
    public $runtime;
    /**
     * @throws \Exception
     */
    public function mark()
    {
        if (!isset($this->marks[0])) {
            $this->marks[0] = microtime(TRUE);
        } elseif (!isset($this->marks[1])) {
            $this->marks[1] = microtime(TRUE);
        }
    }

    /**
     * Displays debug information in the page footer
     */
    public function showDebug()
    {
        echo '<style>html,body {padding: none;} .cnt { display: flex;  min-height: 90vh;  flex-direction: column;  }  .cnt-t {  flex: 1;}  footer {z-index:1;  font-family:helvetica; color: rgb(255, 230, 230);  font-size: 15px;  padding: 22px;  text-shadow: 0px -1px 0px rgba(30, 30, 30, 0.8);  -webkit-border-radius: 6.891891891891891px;  -moz-border-radius: 6.891891891891891px;  border-radius: 2px;  background: rgb(125, 128, 255);  background: -moz-linear-gradient(99deg, rgb(125, 128, 255) 0%, rgb(200, 200, 200) 70%);  background: -webkit-linear-gradient(99deg, rgb(125, 128, 255) 0%, rgb(200, 200, 200) 70%);  background: -o-linear-gradient(99deg, rgb(125, 128, 255) 0%, rgb(200, 200, 200) 70%);  background: -ms-linear-gradient(99deg, rgb(125, 128, 255) 0%, rgb(255, 255, 255) 70%);  background: linear-gradient(9deg, rgb(125, 128, 255) 0%, rgb(150, 150, 255) 70%);  -webkit-box-shadow: 0px 2px 0px rgba(50, 50, 50, 0.75);  -moz-box-shadow:    0px 2px 0px rgba(50, 50, 50, 0.75);  box-shadow:0px 2px 0px rgba(50, 50, 50, 0.75); padding:2px;}</style><body class="cnt"><main class="cnt-t"></main><footer><div style="float:left;"><sup>Plex debug</sup></div><div  align="right"><sup>Memory usage:'.$this->getMemoryUsage().'b     Runtime:'.number_format($this->marks[1] - $this->marks[0], 4).'s</sup></div></footer></body>';
        $this->runtime = true;
    }

    /**
     * @return string
     */
    public function getRuntime()
    {
        return number_format($this->marks[1] - $this->marks[0], 4);
    }
    /**
     * @return int
     */
    public function getMemoryUsage()
    {
        return memory_get_usage(true);
    }
} 