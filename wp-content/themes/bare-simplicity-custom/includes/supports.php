<?php

namespace BareSimplicity;

if(!defined('ABSPATH')) exit;

abstract class Supports {

    public static function Register() {

        /** post thumbnail **/
        add_theme_support( 'post-thumbnails' );

        /** HTML5 support **/
        add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

        /** custom background **/
        $bg_defaults = array(
            'default-image'          => '',
            'default-preset'         => 'default',
            'default-size'           => 'cover',
            'default-repeat'         => 'no-repeat',
            'default-attachment'     => 'scroll',
        );
        add_theme_support( 'custom-background', $bg_defaults );

        /** custom header **/
        $header_defaults = array(
            'default-image'          => '',
            'width'                  => 300,
            'height'                 => 60,
            'flex-height'            => true,
            'flex-width'             => true,
            'default-text-color'     => '',
            'header-text'            => true,
            'uploads'                => true,
        );
        add_theme_support( 'custom-header', $header_defaults );

        /** custom log **/
        add_theme_support( 'custom-logo', array(
            'height'      => 60,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => array( 'site-title', 'site-description' ),
        ) );
    }
}