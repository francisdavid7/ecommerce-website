<?php 
add_action( 'wp_enqueue_scripts', 'marketing_guru_enqueue_styles' );
function marketing_guru_enqueue_styles() {
	wp_enqueue_style( 'marketing-guruparent-style', get_template_directory_uri() . '/style.css' ); 
} 


function marketing_guru_customize_register( $wp_customize ) {
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_textcolor', array(
		'label'       => __( 'Logo Color', 'marketing-guru' ),
		'section'     => 'header_image',
		'priority'   => 1,
		'settings'    => 'header_textcolor',
	) ) );

	$wp_customize->add_setting( 'header_textcolor', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );

	$wp_customize->add_setting( 'navigation_background_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_setting( 'header_bg_c', array(
		'default'           => '#191a24',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_bg_c', array(
		'label'       => __( 'Header background color', 'marketing-guru' ),
		'section'     => 'header_image',
		'priority'   => 1,
		'settings'    => 'header_bg_c',
	) ) );

	$wp_customize->add_setting( 'navigation_text_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_section( 'marketing_guru_section', array(
		'title'      => __('Primary Color','marketing-guru'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_setting( 'primary_c', array(
		'default'           => '#3743f8',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_c', array(
		'label'       => __( 'Primary color', 'marketing-guru' ),
		'section'     => 'marketing_guru_section',
		'priority'   => 1,
		'settings'    => 'primary_c',
	) ) );


	$wp_customize->add_control( 'only_show_headerimage_frontpage', array(
		'label'    => __( 'Only show header background image on front page', 'marketing-guru' ),
		'section'  => 'header_images',
		'priority' => 1,
		'settings' => 'only_show_headerimage_frontpage',
		'type'     => 'checkbox',
	) );


	$wp_customize->add_control( 'header_img_text', array(
		'label'    => __( "Title", 'marketing-guru' ),
		'section'  => 'header_image',
		'type'     => 'text',
		'description'     => 'You must have either a title, tagline or button to show the header image',
		'priority' => 0,
	) );
	$wp_customize->add_control( 'header_img_text_tagline', array(
		'label'    => __( "Tagline", 'marketing-guru' ),
		'section'  => 'header_image',
		'description'     => 'You must have either a title, tagline or button to show the header image',
		'type'     => 'text',
		'priority' => 0,
	) );




	function marketing_guru_sanitize_checkbox( $input ) {
return ( ( isset( $input ) && true == $input ) ? true : false );
	}
}
add_action( 'customize_register', 'marketing_guru_customize_register', 9999 );
if(! function_exists('marketing_guru_customizer_css_final_output' ) ):
	function marketing_guru_customizer_css_final_output(){
		?>
		<style type="text/css">
			.header-content-wrap-outer { background-color: <?php echo esc_attr(get_theme_mod( 'header_bg_c')); ?>; }
			.page-numbers li a, .blogposts-list .blogpost-button, span.page-numbers.dots, .page-numbers.current, .page-numbers li a:hover, .wp-block-search .wp-block-search__button, .header-content-wrap .buttons-wrapper .header-button-solid, .blogposts-list .entry-content a, .post-tags li a { border-color: <?php echo esc_attr(get_theme_mod( 'primary_c')); ?>; }
			.comments-area p.form-submit input, .wp-block-search .wp-block-search__button, .header-content-wrap .buttons-wrapper .header-button-solid, .blogposts-list .entry-content a { background: <?php echo esc_attr(get_theme_mod( 'primary_c')); ?>; }
			.main-navigation a:hover, .pmenu ul li a:hover, .pmenu a:hover, 	.page-numbers li a, .blogposts-list .blogpost-button, span.page-numbers.dots, .page-numbers.current, .page-numbers li a:hover { color: <?php echo esc_attr(get_theme_mod( 'primary_c')); ?>; }
			#secondary .widget-title:after { background: <?php echo esc_attr(get_theme_mod( 'marketing_guru_sidebar_headline_border')); ?>; }
			#secondary .swidgets-wrap { background: <?php echo esc_attr(get_theme_mod( 'marketing_guru_sidebar_bgcolor')); ?>; }
			<?php if ( get_theme_mod( 'only_show_headerimage_frontpage' ) == '1' ) : ?>.page:not(.home) .sheader, .single .sheader, .archive .sheader, .error404 .sheader, .search .sheader{background-image:none !important;}<?php endif; ?>
			<?php if ( get_theme_mod( 'toggle_admin_byline' ) == '1' ) : ?>.author-by-line {display:none;}<?php endif; ?>
			body, .site, .swidgets-wrap h3, .post-data-text { background: <?php echo esc_attr(get_theme_mod( 'website_background_color')); ?>; }
			.site-title a, .site-description { color: <?php echo esc_attr(get_theme_mod( 'header_logo_color')); ?>; }
			.sheader { background-color: <?php echo esc_attr(get_theme_mod( 'header_background_color')); ?> !important; }
			.main-navigation ul li a, .main-navigation ul li .sub-arrow, .super-menu .toggle-mobile-menu,.toggle-mobile-menu:before, .mobile-menu-active .smenu-hide { color: <?php echo esc_attr(get_theme_mod( 'navigation_text_color')); ?>; }
			#smobile-menu.show .main-navigation ul ul.children.active, #smobile-menu.show .main-navigation ul ul.sub-menu.active, #smobile-menu.show .main-navigation ul li, .smenu-hide.toggle-mobile-menu.menu-toggle, #smobile-menu.show .main-navigation ul li, .primary-menu ul li ul.children li, .primary-menu ul li ul.sub-menu li, .primary-menu .pmenu, .super-menu { border-color: <?php echo esc_attr(get_theme_mod( 'navigation_border_color')); ?>; border-bottom-color: <?php echo esc_attr(get_theme_mod( 'navigation_border_color')); ?>; }
			#secondary .widget h3, #secondary .widget h3 a, #secondary .widget h4, #secondary .widget h1, #secondary .widget h2, #secondary .widget h5, #secondary .widget h6, #secondary .widget h4 a { color: <?php echo esc_attr(get_theme_mod( 'sidebar_headline_color')); ?>; }
			#secondary .widget a, #secondary a, #secondary .widget li a , #secondary span.sub-arrow{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_link_color')); ?>; }
			#secondary, #secondary .widget, #secondary .widget p, #secondary .widget li, .widget time.rpwe-time.published { color: <?php echo esc_attr(get_theme_mod( 'sidebar_text_color')); ?>; }
			#secondary .swidgets-wrap, #secondary .widget ul li, .featured-sidebar .search-field { border-color: <?php echo esc_attr(get_theme_mod( 'sidebar_border_color')); ?>; }
			.site-info, .footer-column-three input.search-submit, .footer-column-three p, .footer-column-three li, .footer-column-three td, .footer-column-three th, .footer-column-three caption { color: <?php echo esc_attr(get_theme_mod( 'footer_text_color')); ?>; }
			footer#colophon h3, footer#colophon h3 *, footer#colophon h4, footer#colophon h4 *, footer#colophon h5, footer#colophon h5 *, footer#colophon h6, footer#colophon h6 *, footer#colophon h1, footer#colophon h1 *, footer#colophon h2, footer#colophon h2 *, footer#colophon h4, footer#colophon h4 *, footer#colophon h3 a { color: <?php echo esc_attr(get_theme_mod( 'footer_headline_color')); ?>; }
			.footer-column-three a, .footer-column-three li a, .footer-column-three .widget a, .footer-column-three .sub-arrow, .site-footer a, .site-info a, .site-footer * a, .site-footer a { color: <?php echo esc_attr(get_theme_mod( 'footer_link_color')); ?>; }
			.footer-column-three h3:after { background: <?php echo esc_attr(get_theme_mod( 'footer_border_color')); ?>; }
			.site-info, .widget ul li, .footer-column-three input.search-field, .footer-column-three input.search-submit { border-color: <?php echo esc_attr(get_theme_mod( 'footer_border_color')); ?>; }
			.site-footer { background-color: <?php echo esc_attr(get_theme_mod( 'footer_background_color')); ?>; }
			.content-wrapper h2.entry-title a, .content-wrapper h2.entry-title a:hover, .content-wrapper h2.entry-title a:active, .content-wrapper h2.entry-title a:focus, .archive .page-header h1, .blogposts-list h2 a, .blogposts-list h2 a:hover, .blogposts-list h2 a:active, .search-results h1.page-title { color: <?php echo esc_attr(get_theme_mod( 'blogfeed_headline_color')); ?>; }
			.blog .entry-meta{ color: <?php echo esc_attr(get_theme_mod( 'blogfeed_byline_color')); ?>; }
			.blogposts-list p { color: <?php echo esc_attr(get_theme_mod( 'blogfeed_text_color')); ?>; }
			.page-numbers li a, .blogposts-list .blogpost-button, span.page-numbers.dots, .page-numbers.current { background: <?php echo esc_attr(get_theme_mod( 'blogfeed_buttonbg_color')); ?>; }
			.archive .page-header h1, .search-results h1.page-title, .blogposts-list.fbox, span.page-numbers.dots, .page-numbers li a, .page-numbers.current { border-color: <?php echo esc_attr(get_theme_mod( 'blogfeed_border_color')); ?>; }
			.blogposts-list .post-data-divider { background: <?php echo esc_attr(get_theme_mod( 'blogfeed_border_color')); ?>; }
			.page .comments-area .comment-author, .page .comments-area .comment-author a, .page .comments-area .comments-title, .page .content-area h1, .page .content-area h2, .page .content-area h3, .page .content-area h4, .page .content-area h5, .page .content-area h6, .page .content-area th, .single  .comments-area .comment-author, .single .comments-area .comment-author a, .single .comments-area .comments-title, .single .content-area h1, .single .content-area h2, .single .content-area h3, .single .content-area h4, .single .content-area h5, .single .content-area h6, .single .content-area th, .search-no-results h1, .error404 h1 { color: <?php echo esc_attr(get_theme_mod( 'postpage_headline_color')); ?>; }
			.single .entry-meta, .page .entry-meta { color: <?php echo esc_attr(get_theme_mod( 'postpage_byline_color')); ?>; }
			.page .content-area p, .page article, .page .content-area table, .page .content-area dd, .page .content-area dt, .page .content-area address, .page .content-area .entry-content, .page .content-area li, .page .content-area ol, .single .content-area p, .single article, .single .content-area table, .single .content-area dd, .single .content-area dt, .single .content-area address, .single .entry-content, .single .content-area li, .single .content-area ol, .search-no-results .page-content p { color: <?php echo esc_attr(get_theme_mod( 'postpage_text_color')); ?>; }
			.single .entry-content a, .page .entry-content a, .comment-content a, .comments-area .reply a, .logged-in-as a, .comments-area .comment-respond a { color: <?php echo esc_attr(get_theme_mod( 'postpage_link_color')); ?>; }
			.comments-area p.form-submit input, .error404 input.search-submit, .search-no-results input.search-submit { background: <?php echo esc_attr(get_theme_mod( 'postpage_buttonbg_color')); ?>; }
			.error404 .page-content p, .error404 input.search-submit, .search-no-results input.search-submit { color: <?php echo esc_attr(get_theme_mod( 'postpage_text_color')); ?>; }
			.page .comments-area, .page article.fbox, .page article tr, .page .comments-area ol.comment-list ol.children li, .page .comments-area ol.comment-list .comment, .single .comments-area, .single article.fbox, .single article tr, .comments-area ol.comment-list ol.children li, .comments-area ol.comment-list .comment, .error404 main#main, .error404 .search-form label, .search-no-results .search-form label, .error404 input.search-submit, .search-no-results input.search-submit, .error404 main#main, .search-no-results section.fbox.no-results.not-found{ border-color: <?php echo esc_attr(get_theme_mod( 'postpage_border_color')); ?>; }
			.single .post-data-divider, .page .post-data-divider { background: <?php echo esc_attr(get_theme_mod( 'postpage_border_color')); ?>; }
			.single .comments-area p.form-submit input, .page .comments-area p.form-submit input, .comments-area p.form-submit input, .error404 input.search-submit, .search-no-results input.search-submit { color: <?php echo esc_attr(get_theme_mod( 'postpage_buttontext_color')); ?>; }
			.bottom-header-wrapper { padding-top: <?php echo esc_attr(get_theme_mod( 'banner_img_top_padding')); ?>px; }
			.bottom-header-wrapper { padding-bottom: <?php echo esc_attr(get_theme_mod( 'banner_img_padding_bottom')); ?>px; }
			.bottom-header-wrapper { background: <?php echo esc_attr(get_theme_mod( 'imagebanner_background_color')); ?>; }
			.bottom-header-wrapper *{ color: <?php echo esc_attr(get_theme_mod( 'imagebanner_text_color')); ?>; }
			.header-widget a, .header-widget li a, .header-widget i.fa { color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_link_color')); ?>; }
			.header-widget, .header-widget p, .header-widget li, .header-widget .textwidget { color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_text_color')); ?>; }
			.header-widget .widget-title, .header-widget h1, .header-widget h3, .header-widget h2, .header-widget h4, .header-widget h5, .header-widget h6{ color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_title_color')); ?>; }
			.header-widget.swidgets-wrap, .header-widget ul li, .header-widget .search-field { border-color: <?php echo esc_attr(get_theme_mod( 'upperwidgets_border_color')); ?>; }
			.bottom-header-title, .bottom-header-paragraph{ color: <?php echo esc_attr(get_theme_mod( 'header_img_textcolor')); ?>; }
			#secondary .widget-title-lines:after, #secondary .widget-title-lines:before { background: <?php echo esc_attr(get_theme_mod( 'sidebar_headline_color')); ?>; }
			.header-content-wrap { padding-top: <?php echo esc_attr(get_theme_mod( 'header_top_padding')); ?>px; }
			.header-content-wrap { padding-bottom: <?php echo esc_attr(get_theme_mod( 'header_bottom_padding')); ?>px; }
			.header-button-solid { border-color: <?php echo esc_attr(get_theme_mod( 'header_img_buttoncolor')); ?>; }
			.header-button-solid { color: <?php echo esc_attr(get_theme_mod( 'header_img_buttoncolor')); ?>; }
			#smobile-menu, .primary-menu ul li ul.children, .primary-menu ul li ul.sub-menu { background: <?php echo esc_attr(get_theme_mod( 'dropdown_background_color')); ?>; }
			#smobile-menu.show .toggle-mobile-menu:before, #smobile-menu *, .main-navigation ul.sub-menu li .sub-arrow, .main-navigation ul.sub-menu li a, .primary-menu ul li ul.children, .primary-menu ul li ul.sub-menu { color: <?php echo esc_attr(get_theme_mod( 'dropdown_text_color')); ?>; }
			.header-widgets-three, .header-widgets-wrapper .swidgets-wrap{ background: <?php echo esc_attr(get_theme_mod( 'upperwidgets_bg_color')); ?>; }
			.sheader { background-color: <?php echo esc_attr(get_theme_mod( 'navigation_background_color')); ?>; }
			#secondary .widget li, #secondary input.search-field, #secondary div#calendar_wrap, #secondary .tagcloud, #secondary .textwidget{ background: <?php echo esc_attr(get_theme_mod( 'sidebar_bg_color')); ?>; }
			#secondary .swidget { border-color: <?php echo esc_attr(get_theme_mod( 'sidebar_border_color')); ?>; }
			article.blogposts-list { background: <?php echo esc_attr(get_theme_mod( 'blogfeed_bg_color')); ?>; }
			.blogposts-list .entry-content a{ color: <?php echo esc_attr(get_theme_mod( 'blogfeed_readmore_link')); ?>; }
			.blogposts-list .entry-content a{ border-color: <?php echo esc_attr(get_theme_mod( 'blogfeed_readmore_link')); ?>; }
			#secondary .widget *{ border-color: <?php echo esc_attr(get_theme_mod( 'sidebar_border_color')); ?>; }
			.error404 #primary .fbox, .single #primary .fbox, .page #primary .fbox { background: <?php echo esc_attr(get_theme_mod( 'postpage_bg_color')); ?>; }
			.page-numbers li a, .blogposts-list .blogpost-button, span.page-numbers.dots, .page-numbers.current, .page-numbers li a:hover { color: <?php echo esc_attr(get_theme_mod( 'blogfeed_buttontext_color')); ?>; }
			.page-numbers li a, .blogposts-list .blogpost-button, span.page-numbers.dots, .page-numbers.current, .page-numbers li a:hover { border-color: <?php echo esc_attr(get_theme_mod( 'blogfeed_buttontext_color')); ?>; }
		</style>
	<?php }
	add_action( 'wp_head', 'marketing_guru_customizer_css_final_output' );
endif;


function marketing_guru_customize_preview_js() {
	wp_enqueue_script( 'marketing-guru-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'marketing_guru_customize_preview_js' );


require get_stylesheet_directory() . '/inc/custom-header.php';


function marketing_guru_google_fonts() {
	wp_enqueue_style( 'marketing-guru-google-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600', false ); 
}
add_action( 'wp_enqueue_scripts', 'marketing_guru_google_fonts' );
