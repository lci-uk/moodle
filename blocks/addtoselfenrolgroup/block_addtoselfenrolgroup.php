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
 * @package     block_addtoselfenrolgroup
 * @copyright   2019 Shubhendra Doiphode, doiphode.sunny@gmail.com
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class block_addtoselfenrolgroup extends block_base
{

    /**
     * Initializes class member variables.
     */
    public function init()
    {
        // Needed by Moodle to differentiate between blocks.
        $this->title = get_string('plugintitle', 'block_addtoselfenrolgroup');
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
        error_reporting(0);
        require_once($CFG->dirroot.'/group/lib.php');

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



            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


            if (strpos($actual_link, '/course/view.php') !== false) {

                //$context = context_course::instance($COURSE->id);
                //$isenrolled = is_enrolled($context, $USER->id, '', true);

                $cntenrolled = 0;

                $sql_enrolid = "SELECT id FROM {enrol} WHERE enrol = 'self' AND courseid = " . $COURSE->id;

                if ($arr_enrolid = $DB->get_record_sql($sql_enrolid)) {
                    $enrolid = $arr_enrolid->id;
                }

                // CHECK WHETHER user IS ENROLLED BY self
                $sql_selfenrol = "SELECT count(*) as cntenrolled FROM {user_enrolments} WHERE enrolid = $enrolid AND userid = " . $USER->id;

                if ($arr_selfenrol = $DB->get_record_sql($sql_selfenrol)) {
                    $cntenrolled = $arr_selfenrol->cntenrolled;
                }

                if ($cntenrolled>0) {
                    $sql_selfenrolgroup = "SELECT * FROM {groups} g WHERE g.courseid = $COURSE->id AND g.name = 'Self-enrollment course'";

                    if ($groups = $DB->get_records_sql($sql_selfenrolgroup)) {

                        foreach ($groups as $group) {

                            $groupid = $group->id;

                            $sql_checkuseralreadyingroup = "SELECT count(*) as cntuser FROM {groups_members} WHERE groupid = $groupid AND userid = " . $USER->id;

                            if ($useralreadyingroup = $DB->get_record_sql($sql_checkuseralreadyingroup)) {
                                $cntuser = $useralreadyingroup->cntuser;

//                            echo $group->id . " " . $cntuser;
                                if ($cntuser == 0) {
                                    groups_add_member($group->id, $USER->id);
                                }

                            }


                        }
                    }

                }

                //$this->content->text = $actual_link;

            } else {

                $this->content->text = "";
            }

        }

        return $this->content;
    }

}

