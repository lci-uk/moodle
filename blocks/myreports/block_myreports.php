<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Block section_grades is defined here.
 *
 * @package     block_myreports
 * @copyright   2019 Shubhendra Doiphode, doiphode.sunny@gmail.com
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_myreports extends block_base
{

    /**
     * Initializes class member variables.
     */
    public function init()
    {
        // Needed by Moodle to differentiate between blocks.
        $this->title = get_string('plugintitle', 'block_myreports');
    }

    /**
     * Returns the block contents.
     *
     * @return stdClass The block contents.
     */
    public function get_content()
    {
        require_once(dirname(dirname(__FILE__)).'../../config.php');
        global $CFG, $DB, $USER, $COURSE;

        if ($this->content !== null) {
            return $this->content;
        }

        if (empty($this->instance)) {
            $this->content = '';
            return $this->content;
        }

        $this->content = new stdClass();
        $this->content->items = array();
        $this->content->icons = array();
        $this->content->footer = '';

        if (!empty($this->config->text)) {
            $this->content->text = $this->config->text;
        } else {
            
                $context = context_system::instance();

                $roles = get_user_roles($context, $USER->id, false);
                $roleshortname = "";
                if ($roles) {
                $role = key($roles);
                $roleid = $roles[$role]->roleid;
                $roleshortname = $roles[$role]->shortname;
                }
                
                $t1 = "";

                $t1 .= '<a href="' . $CFG->wwwroot . '/blocks/myreports/leancompanyreport.php?mode=user">' . get_string('mytraining', 'block_myreports') . "</a>";
                if (is_siteadmin() || $roleshortname=="programme-manager" || $roleshortname=="company-manager" || $roleshortname=="project-manager") {
                    $t1 .= "<br/>";
                    $t1 .= '<a href="' . $CFG->wwwroot . '/blocks/myreports/leancompanyreport.php?mode=company">' . get_string('companystaffprogress', 'block_myreports') . "</a>";
                }
                $this->content->text = $t1;
                
            }



        return $this->content;
    }

}

