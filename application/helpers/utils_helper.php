<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Loads pages from frontend/page-name/page-name
 * eg: frontend/home/home
 */
if (!function_exists('load_page')) {
    function load_page($page = '')
    {
        $CI = &get_instance();
        return $CI->load->view('frontend/' . $page . '/' . $page);
    }
}

/**
 * Loads part of pages from frontend/page-name/page-part/page-part
 * eg: frontend/home/slider/slider
 */
if (!function_exists('load_page_part')) {
    function load_page_part($page = '', $action = '', $part = '', $subpart = '')
    {
        $CI = &get_instance();
        if ($action == '') {
            return $CI->load->view('frontend/' . $page . '/' . $part . '/' . $part);
        } else {
            if ($subpart == '') {
                return $CI->load->view('frontend/' . $page . '/' . $action . '/' . $part . '/' . $part);
            } else {
                return $CI->load->view('frontend/' . $page . '/' . $action . '/' . $part . '/' . $subpart . '/' . $subpart);
            }
        }
    }
}

/**
 * Load module from frontend/modules/action
 * eg: members/list, members/details
 */
if (!function_exists('load_module')) {
    function load_module($module = '', $action = '')
    {
        $CI = &get_instance();
        if ($action == '') {
            return $CI->load->view('frontend/modules/' . $module);
        } else {
            return $CI->load->view('frontend/modules/' . $module . '/' . $action);
        }
    }
}


/**
 * Load module part from frontend/modules/action/part
 * eg: events/list/part
 */
if (!function_exists('load_module_part')) {
    function load_module_part($module = '', $action = '', $part = '', $subpart = '')
    {
        $CI = &get_instance();
        if ($subpart == '') {
            return $CI->load->view('frontend/modules/' . $module . '/' . $action . '/' . $part . '/' . $part);
        } else {
            return $CI->load->view('frontend/modules/' . $module . '/' . $action . '/' . $part . '/' . $subpart . '/' . $subpart);
        }
    }
}

/**
 * Gives class="active" for active menu in navigation bar
 */
function get_active($page, $nav)
{
    return strtolower($page) == strtolower($nav) ? 'active' : 'normal';
}

/**
 * Decrease the size of the given string
 */
function short_description($text, $length)
{
    $length = abs((int)$length);
    if (strlen($text) > $length) {
        $text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
    }
    return ($text);
}

/**
 * Decrease the size of the given string
 */
function image_exists($path)
{
    $path = rtrim($path, '/');
    $path = ROOTDIR . '/uploads/' . ltrim($path, '/');
    return file_exists($path) && !is_dir($path);
}

function get_image($path)
{
    if (image_exists($path) == false) {
        return false;
    }
    $path = rtrim($path, '/');
    return base_url('/uploads/' . ltrim($path, '/'));
}

function get_all_images($dir, $id)
{
    $handle = opendir(ROOTDIR . '/uploads/' . $dir . '/' . $id);
    $images = array();
    while ($file = readdir($handle)) {
        if ($file !== '.' && $file !== '..') {
            array_push($images, $id . '/' . $file);
        }
    }
    return $images;
}

/**
 * It makes social networks shares
 * It uses share-popup class jquery from assets/frontend/js/custom.js
 */

/**
 * @param $url is page url
 * @param $title is title for post
 * @return string
 */
function facebook_share($url, $title){
    return "<a href='http://www.facebook.com/sharer/sharer.php?u=".$url."&t=".$title."' target='_blank' class='share-popup'><i class='social_icon-facebook s-18 white'></i>Share on facebook</a>";
}

/**
 * @param $url is page url
 * @param $title is title for post
 * @param $twitter_handle is twitter handler
 * @return string
 */
function twitter_share($url, $title, $twitter_handle){
    return "<a href='http://www.twitter.com/intent/tweet?url=".$url."&via=".$twitter_handle."&text=".$title."' target='_blank' class='share-popup'><i class='social_icon-twitter s-17 white'></i>Share on twitter</a>";
}

/**
 * @param $url is page url
 * @param $title is title for post
 * @return string
 */
function google_share($url){
    return "<a href='http://plus.google.com/share?url=".$url."' target='_blank' class='share-popup'><i class='social_icon-gplus s-20 white'></i>Share on google</a>";
}