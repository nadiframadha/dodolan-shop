<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('load_view')) {
    /**
     * Load a view file with data.
     *
     * @param string $view   View file path.
     * @param array  $data   Data to pass to the view.
     * @param bool   $return Whether to return the output as a string or not.
     *
     * @return mixed
     */
    function load_view($view, $data = array(), $return = false)
    {
        $CI = &get_instance();
        $CI->load->view($view, $data, $return);
    }
}

if (!function_exists('view_exists')) {
    /**
     * Check if a view file exists.
     *
     * @param string $view View file path.
     *
     * @return bool
     */
    function view_exists($view)
    {
        $CI = &get_instance();
        return $CI->load->view($view, '', true);
    }
}
