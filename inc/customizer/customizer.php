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
         * ------------------- Section ----------------
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
                'default' => 'none'
            )
        );

        /**
         * ------------------- Section ----------------
         */
        $wp_customize->add_section(
            'emertech_blog',
            array(
                'title'    => __('Notícias (blog)', 'emertech'),
                'priority' => 15,
                'panel'    => $panel,
            )
        );

        /**
         * ----------------- Inner Section ----------------
         */
        Kirki::add_field( 
            'emertech_blog_feed',
            array(
                'type'      => 'custom',
                'settings'  => 'emertech_blog_feed',
                'section'   => 'emertech_blog',
                'default'   => '<h3 class="customize-section-title">' 
                    . __( 'Posts do Feed', 'emertech' ) 
                    . '</h3>'
            )
        );

        /**
         * Show Date in Feed Posts  
         */
        $wp_customize->add_setting(
            'emertech_blog_feed_show_date', 
            array(
                'default'     => true,
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
                'default'     => true,
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
                'default' => '•'
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
         * ------------------- Section ----------------
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
                'default'     => false,
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
            'emertech_footer_tel', 
            array(
                'default' => ''
            )
        );

        Kirki::add_field(
            'emertech_footer_tel', 
            array(
                'type' => 'text',
                'settings' => 'emertech_footer_tel',
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
                'default'     => true,
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
         * ------------------- Section ----------------
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
            'section'     => 'emertech_social',
            'settings'     => 'emertech_social_icons',
            'priority'    => 10,
            'label'       => esc_html__( 'Ícones de Redes Sociais', 'emertech' ),
            'row_label' => [
                'type'  => 'field',
                'value' => esc_html__( 'Ícone', 'emertech' ),
                'field' => 'label',
            ],
            'button_label' => esc_html__('Adicionar novo', 'emertech' ),
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
                    'type' => 'text',
                    'label' => __('Ícone a mostrar', 'emertech'),
                    'description' => __('Use o Bootstrap Icons', 'emertech')
                ],
                'url'  => [
                    'type' => 'text',
                    'label' => __('Link do ícone', 'emertech'),
                ],
            ]
        ] );
        

        /**
         * ------------------- Section ----------------
         */
        $wp_customize->add_section(
            'emertech_transform',
            array(
                'title'    => __('Transformações', 'emertech'),
                'priority' => 40,
                'panel'    => $panel,
            )
        );

        /**
         * Form Title
         */
        $wp_customize->add_setting(
            'emertech_transform_per_page', 
            array(
                'default' => 8
            )
        );

        Kirki::add_field(
            'emertech_transform_per_page', 
            array(
                'type' => 'number',
                'settings' => 'emertech_transform_per_page',
                'section' => 'emertech_transform',
                'label' => __('Registros por página (catálogo completo)', 'emertech'),
                'description' => __('Deixe "0" para usar o valor padrão definido no WordPress', 'emertech'),
                'min' => 0,
                'max' => 16,
                'default' => 8
            )
        );

        /**
         * ----------------- Inner Section ----------------
         */
        Kirki::add_field( 
            'emertech_transform_section',
            array(
                'type'      => 'custom',
                'section'   => 'emertech_transform',
                'default'   => '<h3 class="customize-section-title">' 
                    . __( 'Página de Transformação', 'emertech' ) 
                    . '</h3>'
            )
        );

        /**
         * Form Title
         */
        $wp_customize->add_setting(
            'emertech_transform_form_title', 
            array(
                'default' => __('Solicite um Orçamento')
            )
        );

        Kirki::add_field(
            'emertech_transform_form_title', 
            array(
                'type' => 'text',
                'settings' => 'emertech_transform_form_title',
                'section' => 'emertech_transform',
                'label' => __('Título do Formulário', 'emertech'),
                'description' => __('Deixar em branco caso queira ocultar', 'emertech'),
                'default' => __('Solicite um Orçamento')
            )
        );

        /**
         * Optionals Title
         */
        $wp_customize->add_setting(
            'emertech_transform_optionals_title', 
            array(
                'default' => __('Monte o seu Orçamento')
            )
        );

        Kirki::add_field(
            'emertech_transform_optionals_title', 
            array(
                'type' => 'text',
                'settings' => 'emertech_transform_optionals_title',
                'section' => 'emertech_transform',
                'label' => __('Título dos Opcionais', 'emertech'),
                'description' => __('Deixar em branco caso queira ocultar', 'emertech'),
                'default' => __('Monte o seu Orçamento')
            )
        );

        /**
         * ----------------- Inner Section ----------------
         */
        Kirki::add_field( 
            'emertech_transform_term_section',
            array(
                'type'      => 'custom',
                'settings'  => 'emertech_transform_term_section',
                'section'   => 'emertech_transform',
                'default'   => '<h3 class="customize-section-title">' 
                    . __( 'Características e Opcionais', 'emertech' ) 
                    . '</h3>'
            )
        );

        /**
         * Transform term image max height
         */
        $wp_customize->add_setting(
            'emertech_transform_term_image_height', 
            array(
                'default' => ''
            )
        );

        Kirki::add_field(
            'emertech_transform_term_image_height', 
            array(
                'type' => 'text',
                'settings' => 'emertech_transform_term_image_height',
                'section' => 'emertech_transform',
                'label' => __('Altura máxima da imagem (pixels)', 'emertech'),
                'description' => __('Deixar em branco para deixar altura automática', 'emertech'),
                'default' => '',
            )
        );

        /**
         * Transform term icon for "Learn More"
         */
        $wp_customize->add_setting(
            'emertech_transform_term_icon', 
            array(
            )
        );

        Kirki::add_field(
            'emertech_transform_term_icon', 
            array(
                'type' => 'text',
                'settings' => 'emertech_transform_term_icon',
                'section' => 'emertech_transform',
                'label' => __('Ícone para "Mais informações"', 'emertech'),
                'description' => __('Use o Bootstrap Icons', 'emertech'),
            )
        );

        /**
         * Transform term title for "Learn More"
         */
        $wp_customize->add_setting(
            'emertech_transform_term_title', 
            array(
            )
        );

        Kirki::add_field(
            'emertech_transform_term_title', 
            array(
                'type' => 'text',
                'settings' => 'emertech_transform_term_title',
                'section' => 'emertech_transform',
                'label' => __('Título para "Mais informações"', 'emertech'),
                'description' => __('Texto ao pairar o mouse sobre o botão', 'emertech'),
            )
        );

        /**
         * ----------------- Inner Section ----------------
         */
        Kirki::add_field( 
            'emertech_transform_form_section',
            array(
                'type'      => 'custom',
                'settings'  => 'emertech_transform_form_section',
                'section'   => 'emertech_transform',
                'default'   => '<h3 class="customize-section-title">' 
                    . __( 'Formulário', 'emertech' ) 
                    . '</h3>'
            )
        );

        /**
         * Transform hide form 
         */
        $wp_customize->add_setting(
            'emertech_transform_form_hide', 
            array(
            )
        );

        Kirki::add_field(
            'emertech_transform_form_hide', 
            array(
                'type' => 'checkbox',
                'settings' => 'emertech_transform_form_hide',
                'section' => 'emertech_transform',
                'label' => __('Ocultar formulário', 'emertech'),
            )
        );

        /**
         * Form fields
         */
        $wp_customize->add_setting(
            'emertech_transform_form_fields', 
            array(
                'default' => ''
            )
        );

        Kirki::add_field( 
            'emertech_transform_form_fields', 
            array(
                'type'        => 'repeater',
                'section'     => 'emertech_transform',
                'settings'     => 'emertech_transform_form_fields',
                'priority'    => 10,
                'label'       => esc_html__( 'Campos do formulário', 'emertech' ),
                'row_label' => [
                    'type'  => 'field',
                    'value' => esc_html__( 'Campo', 'emertech' ),
                    'field' => 'label',
                ],
                'button_label' => esc_html__('Adicionar novo', 'emertech' ),
                'default'      => [
                    [
                        'type' => 'text',
                        'label'  => __('Nome'),
                        'required' => true
                    ],
                    [
                        'type' => 'text',
                        'label'  => __('Companhia'),
                        'required' => true
                    ],
                    [
                        'type' => 'email',
                        'label'  => __('Email'),
                        'required' => true
                    ],
                    [
                        'type' => 'textarea',
                        'label'  => __('Mensagem'),
                        'required' => false
                    ],
                ],
                'fields' => [
                    'label'  => [
                        'type' => 'text',
                        'label' => __('Rótulo do campo', 'emertech'),
                    ],
                    'type' => [
                        'type' => 'select',
                        'label' => __('Tipo do campo', 'emertech'),
                        'choices' => array(
                            'text' => __('Texto', 'emertech'),
                            'email' => __('Email', 'emertech'),
                            'textarea' => __('Área de texto', 'emertech'),
                            'number' => __('Número', 'emertech'),
                            'date' => __('Data', 'emertech'),
                            'color' => __('Cor', 'emertech'),
                            'checkbox' => __('Caixa de Seleção', 'emertech'),
                            'radio' => __('Opções (separe-as com ; no rótulo)', 'emertech'),
                            'custom' => __('Seção customizada', 'emertech'),
                        ),
                    ],
                    'placeholder'  => [
                        'type' => 'text',
                        'label' => __('Dica padrão', 'emertech'),
                        'description' => __('Texto de sugestão de input', 'emertech'),
                    ],
                    'required'  => [
                        'type' => 'checkbox',
                        'label' => __('Obrigatório?', 'emertech'),
                    ],
                    'min'  => [
                        'type' => 'number',
                        'label' => __('Valor mínimo', 'emertech'),
                        'description' => __('Somente para campos de número', 'emertech'),
                    ],
                    'max'  => [
                        'type' => 'number',
                        'label' => __('Valor máximo', 'emertech'),
                        'description' => __('Somente para campos de número', 'emertech'),
                    ],
                    'step'  => [
                        'type' => 'number',
                        'label' => __('Intervalo de número', 'emertech'),
                        'description' => __('Somente para campos de número', 'emertech'),
                    ],
                ]
            )
        );

        /**
         * Transform form submit button text
         */
        $wp_customize->add_setting(
            'emertech_transform_form_submit', 
            array(
                'default' => __('Solicitar'),
            )
        );

        Kirki::add_field(
            'emertech_transform_form_submit', 
            array(
                'type' => 'text',
                'settings' => 'emertech_transform_form_submit',
                'section' => 'emertech_transform',
                'label' => __('Texto do Botão de envio', 'emertech'),
                'default' => __('Solicitar'),
            )
        );

        /**
         * Transform form submit button text
         */
        $wp_customize->add_setting(
            'emertech_transform_form_submit', 
            array(
                'default' => __('Solicitar'),
            )
        );

        Kirki::add_field(
            'emertech_transform_form_submit', 
            array(
                'type' => 'text',
                'settings' => 'emertech_transform_form_submit',
                'section' => 'emertech_transform',
                'label' => __('Texto do Botão de envio', 'emertech'),
                'default' => __('Solicitar'),
            )
        );

        /**
         * Transform form target email 
         */
        $wp_customize->add_setting(
            'emertech_transform_form_target', 
            array(
            )
        );

        Kirki::add_field(
            'emertech_transform_form_target', 
            array(
                'type' => 'text',
                'settings' => 'emertech_transform_form_target',
                'section' => 'emertech_transform',
                'label' => __('Email de envio das Solicitações', 'emertech'),
            )
        );

        /**
         * Transform form generate report 
         */
        $wp_customize->add_setting(
            'emertech_transform_generate_report', 
            array(
            )
        );

        Kirki::add_field(
            'emertech_transform_generate_report', 
            array(
                'type' => 'checkbox',
                'settings' => 'emertech_transform_generate_report',
                'section' => 'emertech_transform',
                'label' => __('Gerar 2ª via de relatório?', 'emertech'),
                'description' => __('Relatório constando todos os dados preenchidos e opcionais solicitados', 'emertech'),
            )
        );

        /**
         * ----------------- Inner Section ----------------
         */
        Kirki::add_field( 
            'emertech_transform_strings',
            array(
                'type'      => 'custom',
                'section'   => 'emertech_transform',
                'default'   => '<h3 class="customize-section-title">' 
                    . __( 'Textos e rótulos', 'emertech' ) 
                    . '</h3>'
            )
        );

        /**
         * Continue button
         */
        $wp_customize->add_setting(
            'emertech_transform_strings_continue_btn', 
            array(
                'default' => __('Continuar')
            )
        );

        Kirki::add_field(
            'emertech_transform_strings_continue_btn', 
            array(
                'type' => 'text',
                'settings' => 'emertech_transform_strings_continue_btn',
                'section' => 'emertech_transform',
                'label' => __('Botão Continuar ', 'emertech'),
                'description' => __('Exibido após a seleção dos opcionais, na página de Transformação', 'emertech'),
                'default' => __('Continuar')
            )
        );

        /**
         * View more
         */
        $wp_customize->add_setting(
            'emertech_transform_strings_view_more', 
            array(
                'default' => __('Veja Mais')
            )
        );

        Kirki::add_field(
            'emertech_transform_strings_view_more', 
            array(
                'type' => 'text',
                'settings' => 'emertech_transform_strings_view_more',
                'section' => 'emertech_transform',
                'label' => __('Link de ação do catálogo', 'emertech'),
                'description' => __('ex.: "Veja Mais" ou "Saiba Mais"', 'emertech'),
                'default' => __('Veja Mais')
            )
        );

        /**
         * Catalog title
         */
        $wp_customize->add_setting(
            'emertech_transform_strings_catalog_title', 
            array(
                'default' => __('Transformações')
            )
        );

        Kirki::add_field(
            'emertech_transform_strings_catalog_title', 
            array(
                'type' => 'text',
                'settings' => 'emertech_transform_strings_catalog_title',
                'section' => 'emertech_transform',
                'label' => __('Título do catálogo completo', 'emertech'),
                'default' => __('Transformações')
            )
        );

        /**
         * Filter 
         */
        $wp_customize->add_setting(
            'emertech_transform_strings_filter', 
            array(
                'default' => __('Filtrar por tipo')
            )
        );

        Kirki::add_field(
            'emertech_transform_strings_filter', 
            array(
                'type' => 'text',
                'settings' => 'emertech_transform_strings_filter',
                'section' => 'emertech_transform',
                'label' => __('Rótulo para filtrar por tipo', 'emertech'),
                'description' => __('Exibido no catálogo', 'emertech'),
                'default' => __('Filtrar por tipo')
            )
        );
        

        /**
         * ------------------- Section ----------------
         */
        $wp_customize->add_section(
            'emertech_floating',
            array(
                'title'    => __('Botão flutuante', 'emertech'),
                'priority' => 50,
                'panel'    => $panel,
            )
        );

        /**
         * ----------------- Inner Section ----------------
         */
        Kirki::add_field( 
            'emertech_floating',
            array(
                'type'      => 'custom',
                'section'   => 'emertech_floating',
                'default'   => '<h3 class="customize-section-title">' 
                    . __( 'Botão flutuante', 'emertech' ) 
                    . '</h3>'
            )
        );

        /**
         * Show
         */
        $wp_customize->add_setting(
            'emertech_floating_hide', 
            array(
                'default' => 0
            )
        );

        Kirki::add_field(
            'emertech_floating_hide', 
            array(
                'type' => 'checkbox',
                'settings' => 'emertech_floating_hide',
                'section' => 'emertech_floating',
                'label' => __('Ocultar botão?', 'emertech'),
                'default' => 0
            )
        );

        /**
         * New tab
         */
        $wp_customize->add_setting(
            'emertech_floating_newtab', 
            array(
                'default' => 0
            )
        );

        Kirki::add_field(
            'emertech_floating_newtab', 
            array(
                'type' => 'checkbox',
                'settings' => 'emertech_floating_newtab',
                'section' => 'emertech_floating',
                'label' => __('Abrir em nova guia?', 'emertech'),
                'default' => 0
            )
        );

        /**
         * Icon
         */
        $wp_customize->add_setting(
            'emertech_floating_icon', 
            array(
            )
        );

        Kirki::add_field(
            'emertech_floating_icon', 
            array(
                'type' => 'text',
                'settings' => 'emertech_floating_icon',
                'section' => 'emertech_floating',
                'label' => __('Ícone', 'emertech'),
                'description' => __('Use o Bootstrap Icons', 'emertech'),
                'default' => 'chat-fill',
            )
        );

        /**
         * URL
         */
        $wp_customize->add_setting(
            'emertech_floating_url', 
            array(
            )
        );

        Kirki::add_field(
            'emertech_floating_url', 
            array(
                'type' => 'text',
                'settings' => 'emertech_floating_url',
                'section' => 'emertech_floating',
                'label' => __('Link', 'emertech'),
            )
        );

        /**
         * Icon
         */
        $wp_customize->add_setting(
            'emertech_floating_text', 
            array(
            )
        );

        Kirki::add_field(
            'emertech_floating_text', 
            array(
                'type' => 'text',
                'settings' => 'emertech_floating_text',
                'section' => 'emertech_floating',
                'label' => __('Texto', 'emertech'),
                'description' => __('Deixe em branco para ocultar', 'emertech'),
            )
        );
        

        /**
         * ------------------- Section ----------------
         */
        $wp_customize->add_section(
            'emertech_strings',
            array(
                'title'    => __('Textos e rótulos', 'emertech'),
                'priority' => 60,
                'panel'    => $panel,
            )
        );

        /**
         * ----------------- Inner Section ----------------
         */
        Kirki::add_field( 
            'emertech_strings_404',
            array(
                'type'      => 'custom',
                'section'   => 'emertech_strings',
                'default'   => '<h3 class="customize-section-title">' 
                    . __( 'Página 404', 'emertech' ) 
                    . '</h3>'
            )
        );

        /**
         * 404 error message
         */
        $wp_customize->add_setting(
            'emertech_strings_404_message', 
            array(
                'default' => __('Nenhuma página foi encontrada!')
            )
        );

        Kirki::add_field(
            'emertech_strings_404_message', 
            array(
                'type' => 'text',
                'settings' => 'emertech_strings_404_message',
                'section' => 'emertech_strings',
                'label' => __('Mensagem de erro', 'emertech'),
                'default' => __('Nenhuma página foi encontrada!')
            )
        );

        /**
         * ----------------- Inner Section ----------------
         */
        Kirki::add_field( 
            'emertech_strings_archive',
            array(
                'type'      => 'custom',
                'section'   => 'emertech_strings',
                'default'   => '<h3 class="customize-section-title">' 
                    . __( 'Blog e arquivo', 'emertech' ) 
                    . '</h3>'
            )
        );

        /**
         * Read more
         */
        $wp_customize->add_setting(
            'emertech_strings_read_more', 
            array(
                'default' => __('Leia Mais')
            )
        );

        Kirki::add_field(
            'emertech_strings_read_more', 
            array(
                'type' => 'text',
                'settings' => 'emertech_strings_read_more',
                'section' => 'emertech_strings',
                'label' => __('Link de ação do blog', 'emertech'),
                'description' => __('ex.: "Leia Mais" ou "Continue Lendo"', 'emertech'),
                'default' => __('Leia Mais')
            )
        );
    }
}

return new Emertech_Customizer();
