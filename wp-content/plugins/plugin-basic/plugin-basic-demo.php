<?php

/**
 * Plugin Name: Plugin basic demo 
 * Description: Plugin đầu tiên của PLee =))
 * Text Domain: plugin-basic-demo
 * Version: 1.0 
 * Author: P Lê 
 * Author URI: http://fb.com/phamle21 
 * License: GPLv2 
 */

if (!defined('ABSPATH'))
    exit;

if (!class_exists('Plugin_Basic_Demo')) {
    class Plugin_Basic_Demo
    {
        function __construct()
        {
            if (!function_exists('add_shortcode')) {
                return;
            }

            add_shortcode('hello', array(&$this, 'hello_func'));
            add_shortcode('info', array(&$this, 'info_func'));
        }

        function hello_func($atts = array(), $content = null)
        {
            extract(shortcode_atts(array('name' => 'World'), $atts));
            return '<div><p>Hello ' . $name . '!</p></div>';
        }

        function info_func($atts = array())
        {
            extract(shortcode_atts(array(
                'avatar' => 'https://www.w3schools.com/howto/img_avatar.png',
                'name' => "Your name (ex: Le Pham)",
                'age' => "Your age (ex: 23)",
                'address' => "Your address (ex: 379/20 Huynh Van Banh, Q.Phu Nhuan, TP.HCM)",
                'education' => "Your education (ex: Can Tho University)",
                'work' => "Your work (ex: Fresher - Silicon Stack"
            ), $atts));

            return '
            <style>
                .card {
                    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
                    transition: 0.3s;
                    width: 40%;
                }

                .card:hover {
                    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
                }

                .container {
                    padding: 2px 16px;
                }
                .card-img {
                    display: flex;
                    justify-content: center;
                    padding: 2px 16px;
                }
            </style>
            <div class="card">
                <div class="card-img">
                    <img src='.$avatar.' alt="Avatar" style="width:50%">
                </div>
                <div class="container">
                    <h4><b>'.$name.'</b></h4>
                    <p><b>Age:</b> '.$age.'</p>
                    <p><b>Address:</b> '.$address.'</p>
                    <p><b>Education:</b> '.$education.'</p>
                    <p><b>Work:</b> '.$work.'</p>
                </div>
            </div>
';
        }
    }
}

function mfpd_load()
{
    global $mfpd;
    $mfpd = new Plugin_Basic_Demo();
}

add_action('plugins_loaded', 'mfpd_load');