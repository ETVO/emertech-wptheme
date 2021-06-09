<?php

/**
 * Custom customizer controls and options 
 * 
 * @package Emertech WordPress theme
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Emertech Customizer class
 */
final class Emertech_Customizer
{

    /**
     * Construct class functions and constants
     * 
     * @since 2.0
     */
    public function __construct()
    {

        // Register all the customizer options and sections 
        add_action('customize_register', array($this, 'register_options'));
    }

    /**
     * Register all custom theme options
     *
     * 		 
     * @param WP_Customize_Manager $wp_customize
     * @since 2.0
     */
    public function register_options($wp_customize)
    {

        /**
         * Panel
         */
        $panel = 'emertech_panel';
        $wp_customize->add_panel(
            $panel,
            array(
                'title'    => __('Opções Emertech', 'emertech'),
                'priority' => 210,
            )
        );

        /**
         * Section
         */
        $wp_customize->add_section(
            'emertech_header',
            array(
                'title'    => __('Cabeçalho', 'emertech'),
                'priority' => 10,
                'panel'    => $panel,
            )
        );

        /**
         * Move Logo control to Emertech Header section
         */
        $wp_customize->get_control('custom_logo')->section = 'emertech_header';

        /**
         *  Logo Video
         */
        $wp_customize->add_setting(
            'emertech_logo_video',
            array(
                'default' => ''
            )
        );

        $wp_customize->add_control(
            new WP_Customize_Media_Control(
                $wp_customize,
                'emertech_logo_video', #setting/option_id
                array(
                    'section' => 'emertech_header',
                    'mime_type' => 'video',
                    'label' => __('Logo Vídeo', 'emertech'),
                    'description' => __('Vídeo para logo dinâmica', 'emertech'),
                )
            )
        );

        /**
         * Logo Video Show 
         */
        $wp_customize->add_setting(
            'emertech_logo_video_show', 
            array(
                'default' => 'none'
            )
        );

        $wp_customize->add_control(
            'emertech_logo_video_show', 
            array(
                'type' => 'select',
                'section' => 'emertech_header',
                'label' => __('Opções da Logo Vídeo', 'emertech'),
                'choices' => array(
                    'none' => __('Não mostrar'),
                    'home' => __('Mostrar apenas na página inicial'),
                    'all' => __('Mostrar em todas as páginas'),
                ),
            )
        );
    }
}

return new Emertech_Customizer();
