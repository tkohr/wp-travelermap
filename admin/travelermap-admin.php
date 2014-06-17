<?php
/**
 *  Copyright (C) 2014 bitschubser.org
 *
 *
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to 
 *  deal in the Software without restriction, including without limitation the
 *  rights to use, copy, modify, merge, publish, distribute, sublicense, and/or
 *  sell copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 *
 *  The above copyright notice and this permission notice shall be included in
 *  all copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER 
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN 
 *  THE SOFTWARE.
 */

add_action( 'admin_init', 'travelermap_init' );
add_action( 'admin_menu', 'travelermap_create_admin_menu');
add_action( 'admin_enqueue_scripts','travelermap_enqueue_admin_scripts' );

function travelermap_enqueue_admin_scripts() {
    wp_enqueue_media();
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-01.10.4', TM_URL . "js/jquery-ui-1.10.4.min.js" , array('jquery'), '1.10.4', false);
    wp_enqueue_script('jquery-slimbox2', TM_URL . "js/slimbox2.js" , array('jquery'), '2.0.5', false);
    wp_enqueue_script('jquery-colorbox', TM_URL . "js/jquery.colorbox-min.js" , array('jquery'), '1.5.9', false);
    wp_enqueue_script('json2');
    wp_enqueue_script('travelermap-admin', TM_URL . "admin/js/travelermap-admin.js" , array(), '0.9.0', false);
    wp_enqueue_script('travelermap-frontend', TM_URL . "frontend/js/travelermap-frontend.js" , array(), '0.9.0', false);
    wp_enqueue_style('tm-admin', TM_URL . "media/tm-admin.css" );
    wp_enqueue_style('tm-frontend', TM_URL . "media/tm-frontend.css" );
    wp_enqueue_style('font-awesome', TM_URL . "media/font-awesome.min.css" );
    wp_enqueue_style('jquery-style', TM_URL . "media/jquery-ui-1.10.4.min.css" );
    wp_enqueue_style('jquery-slimbox2-style', TM_URL . "media/slimbox/slimbox2.css");
    wp_enqueue_style('jquery-colorbox-style', TM_URL . "media/colorbox/colorbox.css");
}

function travelermap_init() {
   ob_start();
   require_once (dirname (__FILE__) . '/travelermap-ajax.php');
   require_once (dirname (__FILE__) . '/travelermap-editmaps.php');
   require_once (dirname (__FILE__) . '/travelermap-editmap.php');
}

function travelermap_create_admin_menu() {
    add_menu_page( 'Travelermap', 'Travelermap', 'manage_options', 'travelermap_editmaps', 'travelermap_editmaps' );
    add_submenu_page( null, "Edit Map", "Edit Map", 'manage_options', 'travelermap_editmap', 'travelermap_editmap');
}
 
?>