<?php
/**
 * Files renderer
 */

namespace theme_maker\output\core;

use plugin_renderer_base;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . '/files/renderer.php');

/**
 * Rendering of files viewer related widgets.
 */
class files_renderer extends \theme_boost\output\core\files_renderer {
    // Error message when this class is not included, but even if empty it works.
}