<?php
/**
 * Form for editing block_spidergram block instances.
 *
 * @package    block_spidergram
 * @copyright  2019 
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
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
// along with Moodle.  If not, see <http://www.gnu.org/licenses

class block_spidergram_edit_form extends block_edit_form {

    /**
     * Extends the configuration form for block_spidergram.
     */
    protected function specific_definition($mform) {

        // Section header title.
        //$mform->addElement('header', 'configheader', get_string('blocksettings', 'block'));

        // Please keep in mind that all elements defined here must start with 'config_'.

    }
}
