<?php 
add_action( 'wp_enqueue_scripts', 'darkly_magazine_enqueue_styles' );
function darkly_magazine_enqueue_styles() {
	wp_enqueue_style( 'darkly-magazine-parent-style', get_template_directory_uri() . '/style.css' ); 
} 

function darkly_magazine_load_google_fonts() {
	wp_enqueue_style( 'darkly-magazine-google-fonts', '//fonts.googleapis.com/css?family=Inter:400,600,700' ); 
}
add_action( 'wp_enqueue_scripts', 'darkly_magazine_load_google_fonts' ); 


if ( ! function_exists( 'feather_magazine_archive_post' ) ) {
	function feather_magazine_archive_post( $layout = '' ) { 
		?>
		<article class="post excerpt post-list-item">
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="post-blogs-container-thumbnails">
				<?php } else { ?>
					<div class="post-blogs-container">
					<?php } ?>
					<?php if ( empty($feather_magazine_full_posts) ) : ?>
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="featured-thumbnail-container">
								<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" id="featured-thumbnail">
									<?php  $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');  
									echo '<div class="blog-featured-thumbnail" style="background-image:url('.esc_url($featured_img_url).')"></div>';
									?> 
								</a>
							</div>
							<div class="thumbnail-post-content">
							<?php } else { ?>
								<div class="nothumbnail-post-content">
								<?php } ?>
								
								<h2 class="title">
									<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a>
								</h2>
								<span class="entry-meta">
									<?php echo get_the_date(); ?>
									<?php
									if ( is_sticky() && is_home() && ! is_paged() ) {
										printf( ' / <span class="sticky-text">%s</span>', esc_html( 'Featured', 'darkly-magazine' ) );
									} ?>
								</span>
								<div class="post-content">
									<?php echo esc_html(feather_magazine_excerpt(26)); ?><?php echo esc_html_e('...','darkly-magazine'); ?>
								</div>
							<?php else : ?>
								<?php if (feather_magazine_post_has_moretag()) : ?>
									<?php feather_magazine_readmore(); ?>
								</div>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				</article>
			<?php }
		}



		function darkly_magazine_customize_register( $wp_customize ) {
			$wp_customize->add_panel( 'panel_id', array(
				'priority'       => 121,
				'capability'     => 'edit_theme_options',
				'title'          => __('Theme Design Options', 'darkly-magazine'),
				'description'    => __('Theme Design Options', 'darkly-magazine'),
			) ); 
			$wp_customize->add_section( 'feather_magazine_styling_settings', array(
				'title'      => __('All Blog Posts Settings','darkly-magazine'),
				'priority'   => 122,
				'capability' => 'edit_theme_options',

			) );
			$wp_customize->add_section( 'feather_magazine_general_layout', array(
				'title'      => __('General Layout','darkly-magazine'),
				'priority'   => 1,
				'description'    => __('Please refresh the page to view the changes you make.', 'darkly-magazine'),
				'capability' => 'edit_theme_options',

			) );
			$wp_customize->add_setting('feather_magazine_layout', array(
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_key',
				'default'           => 'cslayout',
			));

			$wp_customize->add_setting( 'top_header_background_color', array(
				'default'           => '#000',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'top_header_background_color', array(
				'label'       => __( 'Header Background Color', 'darkly-magazine' ),
				'section'     => 'header_image',
				'description'    => __('Please refresh the page to view the changes you make.', 'darkly-magazine'),
				'priority'   => 1,
				'settings'    => 'top_header_background_color',
			) ) );

$wp_customize->add_section( 'feather_single_settings', array(
		'title'      => __('Single Post / Page Settings','news_portaly'),
		'priority'   => 100,
		'capability' => 'edit_theme_options',

	) );

    //Related Posts
	$wp_customize->add_setting('feather_magazine_relatedposts_section', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_key',
		'transport'         => 'refresh',
		'default'           => '1',
	));
	$wp_customize->add_control('feather_magazine_relatedposts_section', array(
		'label'    => __('Related Posts Section', 'news_portaly'),
		'section'  => 'feather_single_settings',
		'description' => __('This setting will only affect blog posts.','news_portaly'),
		'settings' => 'feather_magazine_relatedposts_section',
		'type'     => 'radio',
		'choices'  => array(
			'0' => __('OFF', 'news_portaly'),
			'1' => __('ON', 'news_portaly'),
		),
	));

    //Author Box
	$wp_customize->add_setting('feather_magazine_authorbox_section', array(
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_key',
		'transport'         => 'refresh',
		'default'           => '1',
	));
	$wp_customize->add_control('feather_magazine_authorbox_section', array(
		'label'    => __('Author box Section', 'news_portaly'),
		'section'  => 'feather_single_settings',
		'description' => __('This setting will only affect blog posts.','news_portaly'),
		'settings' => 'feather_magazine_authorbox_section',
		'type'     => 'radio',
		'choices'  => array(
			'0' => __('OFF', 'news_portaly'),
			'1' => __('ON', 'news_portaly'),
		),
	));

			$wp_customize->add_setting( 'primary_colors', array(
				'default'           => '#fdaf3a',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_colors', array(
				'label'       => __( 'Primary Color', 'darkly-magazine' ),
				'description' => __( 'Applied to header background.', 'darkly-magazine' ),
				'section'     => 'feather_magazine_general_layout',
				'priority'   => 1,
				'settings'    => 'primary_colors',
			) ) );

			$wp_customize->add_setting( 'navigation_background_color', array(
				'default'           => '#000',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_background_color', array(
				'label'       => __( 'Navigation Background Color', 'darkly-magazine' ),
				'section'     => 'navigation_settings',
				'priority'   => 1,
				'settings'    => 'navigation_background_color',
			) ) );

			$wp_customize->add_setting( 'navigation_link_color', array(
				'default'           => '#fff',
				'sanitize_callback' => 'sanitize_hex_color',
				'transport'         => 'postMessage',
			) );

			$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'navigation_link_color', array(
				'label'       => __( 'Navigation Link Color', 'darkly-magazine' ),
				'section'     => 'navigation_settings',
				'priority'   => 1,
				'settings'    => 'navigation_link_color',
			) ) );
			$wp_customize->add_section( 'colors', array(
				'title'      => __('Background Color','darkly-magazine'),
				'priority'   => 150,
				'capability' => 'edit_theme_options',

			) );
			$wp_customize->add_section( 'static_front_page', array(
				'title'      => __('Static Front Page','darkly-magazine'),
				'priority'   => 150,
				'capability' => 'edit_theme_options',

			) );
			$wp_customize->add_section( 'sidebars_settings', array(
				'title'      => __('Sidebar','darkly-magazine'),
				'priority'   => 100,
				'capability' => 'edit_theme_options',
			) );
			$wp_customize->add_section( 'all_blog_posts', array(
				'title'      => __('All Blog Posts','darkly-magazine'),
				'priority'   => 100,
				'capability' => 'edit_theme_options',
			) );

	
			$wp_customize->add_section( 'feather_magazine_header_settings', array(
				'title'      => __('Header','darkly-magazine'),
				'priority'   => 122,
				'capability' => 'edit_theme_options',

			) );
			$wp_customize->add_section( 'navigation_settings', array(
				'title'      => __('Navigation Settings','darkly-magazine'),
				'priority'   => 50,
				'description'    => __('Please refresh the page to view the changes you make.', 'darkly-magazine'),
				'capability' => 'edit_theme_options',
			) );

			$wp_customize->add_section( 'feather_magazine_pagination_settings', array(
				'title'      => __('Pagination Type','darkly-magazine'),
				'priority'   => 122,
				'capability' => 'edit_theme_options',

			) );

			$wp_customize->add_setting( 'feather_magazine_pagination_type', array(
				'default'           => '1',
				'capability'        => 'edit_theme_options',
				'priority'   => 1,
				'sanitize_callback' => 'sanitize_key',
			));

			$wp_customize->add_section( 'feather_magazine_footer_settings', array(
				'title'      => __('Footer','darkly-magazine'),
				'priority'   => 122,
				'capability' => 'edit_theme_options',

			) );

			$wp_customize->get_setting( 'blogname' )->transport                              = 'postMessage';
			$wp_customize->get_setting( 'blogdescription' )->transport                       = 'postMessage';
			$wp_customize->get_setting( 'header_textcolor' )->transport                      = 'postMessage';
			$wp_customize->get_section('header_image')->title = __( 'Header', 'darkly-magazine' );
			$wp_customize->get_control( 'background_color'  )->section   = 'feather_magazine_general_layout';
			$wp_customize->get_control( 'header_textcolor'  )->section   = 'header_image';

			function news_portly_sanitize_checkbox( $input ){
				return ( isset( $input ) ? true : false );
			}


		}
		add_action( 'customize_register', 'darkly_magazine_customize_register', 999 );

		if(! function_exists('news_portly_color_output' ) ):

function news_portly_color_output(){

	?>

	<style type="text/css">
		<?php if ( get_theme_mod( 'footer_widgets_frontpage_only' ) == '1' ) : ?>
			body:not(.home) .footer-widgets{
				display:none;
				visibility:hidden;
			}
		<?php endif; ?>
		<?php if ( get_theme_mod( 'footer_copyright_frontpage_only' ) == '1' ) : ?>
			body:not(.home) .copyrights{
				display:none;
				visibility:hidden;
			}
		<?php endif; ?>

		#site-header { background-color: <?php echo esc_attr(get_theme_mod( 'top_header_background_color')); ?>; }
		.primary-navigation, #navigation ul ul li, #navigation.mobile-menu-wrapper { background-color: <?php echo esc_attr(get_theme_mod( 'navigation_background_color')); ?>; }
		a#pull, #navigation .menu a, #navigation .menu a:hover, #navigation .menu .fa > a, #navigation .menu .fa > a, #navigation .toggle-caret { color: <?php echo esc_attr(get_theme_mod( 'navigation_link_color')); ?> }
		#sidebars .widget h3, #sidebars .widget h3 a, #sidebars h3 { color: <?php echo esc_attr(get_theme_mod( 'sidebar_headline_color')); ?>; }
		#sidebars .widget a, #sidebars a, #sidebars li a { color: <?php echo esc_attr(get_theme_mod( 'sidebar_link_color')); ?>; }
		#sidebars .widget, #sidebars, #sidebars .widget li { color: <?php echo esc_attr(get_theme_mod( 'sidebar_text_color')); ?>; }
		.post.excerpt .post-content, .pagination a, .pagination2, .pagination .dots { color: <?php echo esc_attr(get_theme_mod( 'all_blog_posts_text')); ?>; }
		.post.excerpt h2.title a { color: <?php echo esc_attr(get_theme_mod( 'all_blog_posts_headline')); ?>; }
		.pagination a, .pagination2, .pagination .dots { border-color: <?php echo esc_attr(get_theme_mod( 'all_blog_posts_text')); ?>; }
		span.entry-meta{ color: <?php echo esc_attr(get_theme_mod( 'all_blog_posts_date')); ?>; }
		.article h1, .article h2, .article h3, .article h4, .article h5, .article h6, .total-comments, .article th{ color: <?php echo esc_attr(get_theme_mod( 'post_page_headline')); ?>; }
		.article, .article p, .related-posts .title, .breadcrumb, .article #commentform textarea  { color: <?php echo esc_attr(get_theme_mod( 'post_page_text')); ?>; }
		.article a, .breadcrumb a, #commentform a { color: <?php echo esc_attr(get_theme_mod( 'post_page_link')); ?>; }
		#commentform input#submit, #commentform input#submit:hover{ background: <?php echo esc_attr(get_theme_mod( 'post_page_link')); ?>; }
		.post-date-feather, .comment time { color: <?php echo esc_attr(get_theme_mod( 'post_page_date')); ?>; }
		.footer-widgets #searchform input[type='submit'],  .footer-widgets #searchform input[type='submit']:hover{ background: <?php echo esc_attr(get_theme_mod( 'footer_link_color')); ?>; }
		.footer-widgets h3:after{ background: <?php echo esc_attr(get_theme_mod( 'footer_headline_color')); ?>; }
		.footer-widgets h3{ color: <?php echo esc_attr(get_theme_mod( 'footer_headline_color')); ?>; }
		.footer-widgets .widget li, .footer-widgets .widget, #copyright-note{ color: <?php echo esc_attr(get_theme_mod( 'footer_text_color')); ?>; }
		footer .widget a, #copyright-note a, #copyright-note a:hover, footer .widget a:hover, footer .widget li a:hover{ color: <?php echo esc_attr(get_theme_mod( 'footer_link_color')); ?>; }
	</style>
<?php }
add_action( 'wp_head', 'news_portly_color_output' );
endif;




function darkly_magazine_custom_header_setup() {
	add_theme_support( 'custom-logo', array(
		'width'       => 155,
		'height'      => 44,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	add_theme_support( 'custom-header', array(
		'default-image'			=> '',
		'default-text-color'	=> 'fff',
		'width'					=> 1900,
		'height'				=> 200,
		'flex-width'			=> true,
		'flex-height'			=> true,
		'wp-head-callback'		=> 'feather_magazine_header_style',
	) );
}
add_action( 'after_setup_theme', 'darkly_magazine_custom_header_setup', 999 );