<?php

/**
 * Core renderer for ajax calls.
 */

namespace theme_maker\output;

defined('MOODLE_INTERNAL') || die();

class core_renderer_ajax extends \core_renderer_ajax {

    public function image_url($imagename, $component = 'moodle') {
        // Strip -24, -64, -256  etc from the end of filetype icons so we
        // only need to provide one SVG, see MDL-47082.
        $imagename = \preg_replace('/-\d\d\d?$/', '', $imagename);
        return $this->page->theme->image_url($imagename, $component);
    }

}
