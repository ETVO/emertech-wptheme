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
                'priority' => 10,
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
                'emertech_logo_video',
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

        Kirki::add_field(
            'emertech_logo_video_show', 
            array(
                'type' => 'select',
                'settings' => 'emertech_logo_video_show',
                'section' => 'emertech_header',
                'label' => __('Opções da Logo Vídeo', 'emertech'),
                'choices' => array(
                    'none' => __('Não mostrar'),
                    'home' => __('Mostrar apenas na página inicial'),
                    'all' => __('Mostrar em todas as páginas'),
                ),
            )
        );

        /**
         * Section
         */
        $wp_customize->add_section(
            'emertech_blog',
            array(
                'title'    => __('Notícias (blog)', 'emertech'),
                'priority' => 15,
                'panel'    => $panel,
            )
        );
        
        Kirki::add_field( 'emertech_blog_feed', [
            'type' => 'custom',
            'settings' => 'emertech_blog_feed',
            'section' => 'emertech_blog',
            'default' => '<h3 style="padding:15px 10px; background:#fff; margin:0;">' . __( 'Posts do Feed', 'kirki' ) . '</h3>',
            'priority' => 10,
        ] );

        /**
         * Show Date in Feed Posts  
         */
        $wp_customize->add_setting(
            'emertech_blog_feed_show_date', 
            array(
            )
        );

        Kirki::add_field( 
            'emertech_blog_feed_show_date', 
            array(
                'type'        => 'checkbox',
                'settings'    => 'emertech_blog_feed_show_date',
                'section'     => 'emertech_blog',
                'label' => __('Exibir Data', 'emertech'),
                'default'     => true,   
            )
        );

        /**
         * Show Category in Feed Posts  
         */
        $wp_customize->add_setting(
            'emertech_blog_feed_show_category', 
            array(
            )
        );

        Kirki::add_field( 
            'emertech_blog_feed_show_category', 
            array(
                'type'        => 'checkbox',
                'settings'    => 'emertech_blog_feed_show_category',
                'section'     => 'emertech_blog',
                'label' => __('Exibir Categoria', 'emertech'),
                'default'     => true,   
            )
        );

        /**
         * Meta separator 
         */
        $wp_customize->add_setting(
            'emertech_blog_feed_meta_separator', 
            array(
            )
        );

        Kirki::add_field(
            'emertech_blog_feed_meta_separator', 
            array(
                'type' => 'text',
                'settings' => 'emertech_blog_feed_meta_separator',
                'section' => 'emertech_blog',
                'label' => __('Separador', 'emertech'),
                'default' => '•'
            )
        );

        /**
         * Section
         */
        $wp_customize->add_section(
            'emertech_footer',
            array(
                'title'    => __('Rodapé', 'emertech'),
                'priority' => 20,
                'panel'    => $panel,
            )
        );

        /**
         * Footer Title 
         */
        $wp_customize->add_setting(
            'emertech_footer_title', 
            array(
                'default' => ''
            )
        );

        Kirki::add_field(
            'emertech_footer_title', 
            array(
                'type' => 'text',
                'settings' => 'emertech_footer_title',
                'section' => 'emertech_footer',
                'label' => __('Título', 'emertech')
            )
        );

        /**
         * Footer Show Title Bottom 
         */
        $wp_customize->add_setting(
            'emertech_footer_title_show_bottom', 
            array(
            )
        );

        Kirki::add_field( 
            'emertech_footer_title_show_bottom', 
            array(
                'type'        => 'checkbox',
                'settings'    => 'emertech_footer_title_show_bottom',
                'section'     => 'emertech_footer',
                'label' => __('Exibir este mesmo título na barra inferior?', 'emertech'),
                'default'     => false,   
            )
        );

        /**
         * Footer Contact No. 
         */
        $wp_customize->add_setting(
            'emertech_footer_contact', 
            array(
                'default' => ''
            )
        );

        Kirki::add_field(
            'emertech_footer_contact', 
            array(
                'type' => 'text',
                'settings' => 'emertech_footer_contact',
                'section' => 'emertech_footer',
                'label' => __('Contacto', 'emertech'),
                'description' => __('Deixar em branco caso queira ocultar', 'emertech')
            )
        );

        /**
         * Footer Email 
         */
        $wp_customize->add_setting(
            'emertech_footer_email', 
            array(
                'default' => ''
            )
        );

        Kirki::add_field(
            'emertech_footer_email', 
            array(
                'type' => 'text',
                'section' => 'emertech_footer',
                'settings' => 'emertech_footer_email',
                'label' => __('Email', 'emertech'),
                'description' => __('Deixar em branco caso queira ocultar', 'emertech')
            )
        );

        /**
         * Footer Address 
         */
        $wp_customize->add_setting(
            'emertech_footer_address', 
            array(
                'default' => ''
            )
        );

        Kirki::add_field(
            'emertech_footer_address', 
            array(
                'type' => 'text',
                'settings' => 'emertech_footer_address',
                'section' => 'emertech_footer',
                'label' => __('Endereço', 'emertech'),
                'description' => __('Deixar em branco caso queira ocultar', 'emertech')
            )
        );

        /**
         * Footer Map 
         */
        $wp_customize->add_setting(
            'emertech_footer_map', 
            array(
                'default' => ''
            )
        );

        Kirki::add_field(
            'emertech_footer_map', 
            array(
                'type' => 'text',
                'settings' => 'emertech_footer_map',
                'section' => 'emertech_footer',
                'label' => __('Endereço do Mapa', 'emertech'),
                'description' => __('Deixar em branco para usar o mesmo endereço', 'emertech')
            )
        );

        /**
         * Footer Show Map 
         */
        $wp_customize->add_setting(
            'emertech_footer_map_show', 
            array(
                'default' => ''
            )
        );

        Kirki::add_field( 
            'emertech_footer_map_show', 
            array(
                'type'        => 'checkbox',
                'settings'    => 'emertech_footer_map_show',
                'section'     => 'emertech_footer',
                'label' => __('Mostrar Mapa', 'emertech'),
                'default'     => true,   
            )
        );
        

        /**
         * Section
         */
        $wp_customize->add_section(
            'emertech_social',
            array(
                'title'    => __('Redes Sociais', 'emertech'),
                'priority' => 30,
                'panel'    => $panel,
            )
        );

        /**
         * Social Icons
         */
        $wp_customize->add_setting(
            'emertech_social_icons', 
            array(
                'default' => ''
            )
        );

        Kirki::add_field( 'emertech_social_icons', [
            'type'        => 'repeater',
            'label'       => esc_html__( 'Ícones de Redes Sociais', 'emertech' ),
            'section'     => 'emertech_social',
            'priority'    => 10,
            'row_label' => [
                'type'  => 'text',
                'value' => esc_html__( 'Ícone', 'emertech' ),
            ],
            'button_label' => esc_html__('Adicionar novo', 'emertech' ),
            'settings'     => 'emertech_social_icons',
            'default'      => [
                [
                    'icon' => 'facebook',
                    'url'  => 'https://www.facebook.com/emertechproject',
                ],
                [
                    'icon' => 'instagram',
                    'url'  => 'https://www.instagram.com/emertechproject',
                ],
            ],
            'fields' => [
                'icon' => [
                    'type' => 'select',
                    'label' => __('Ícone a mostrar', 'emertech'),
                    'choices' => array(
                        'facebook' => __('Facebook', 'emertech'),
                        'instagram' => __('Instagram', 'emertech'),
                        'whatsapp' => __('WhatsApp', 'emertech'),
                        'youtube' => __('YouTube', 'emertech'),
                        'twitter' => __('Twitter', 'emertech')
                    ),
                ],
                'url'  => [
                    'type' => 'text',
                    'label' => __('Link do ícone', 'emertech'),
                ],
            ]
        ] );
    }
}

return new Emertech_Customizer();
