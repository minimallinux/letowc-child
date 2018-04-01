<?php
// Include parent theme styles. 
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}
add_action('woocommerce_after_shop_loop','show_text_under_shop',99);
function show_text_under_shop() {
echo 'TEST';
}
add_theme_support( 'post-thumbnails' );
add_image_size( 'leto_child_blog_img_side', 600, 400, true );
/*Hide Product Count showing in Category View*/
add_filter( 'woocommerce_subcategory_count_html', 'woo_remove_category_products_count' );
function woo_remove_category_products_count() {
    return;
}
add_filter( 'woocommerce_gateway_icon', 'leto_child_remove_what_is_paypal', 10, 2 );
 
function leto_child_remove_what_is_paypal( $icon_html, $gateway_id ) {
// the apply_filters comes with 2 parameters: $icon_html, $this->id
// hence we declare 2 parameters within the function
// and the hook above takes the "2" as we decided to pass 2 variables
 
if( 'paypal' == $gateway_id ) {
// we use one of the passed variables to make sure we only
// run this function for the gateway ID == 'paypal'
 
$icon_html = '<img src="/wp-content/themes/leto-child/images/cards.png" alt="Card Payment Types">';
// in here we define our own $icon_html
// note there is no mention of the "What is PayPal"
// all we want is to repeat the part with the paypal logo
 
}
// endif
 
return $icon_html;
// we send the $icon_html variable back to the system
// if PayPal, the system will use our custom $icon_html
// if not, the system will use the original $icon_html
 
}
/*add_filter( 'wc_stripe_payment_icons', 'change_my_icons' );
function change_my_icons( $icons ) {
        // var_dump( $icons ); to show all possible icons to change.
    $icons['visa'] = '<img src="/wp-content/themes/leto-child/images/visa.jpg" />';
    $icons['mastercard'] = '<img src="/wp-content/themes/leto-child/images/mastercard.jpg" />';
    $icons['amex'] = '<img src="/wp-content/themes/leto-child/images/amex.jpg" />';
    return $icons;
}*/


/*Remove Choose Option Text on Variations Dropdaown*/
add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'leto_child_remove_select_text');
function leto_child_remove_select_text( $args ){ $args['show_option_none'] = '';
return $args; }
// Main Price Setting changed to "From" and remove higher price
function leto_child_variable_price_format( $price, $product ) {
    $prefix = sprintf('%s: ', __('From', 'shopstar_child'));
    $min_price_regular = $product->get_variation_regular_price( 'min', true );
    $min_price_sale    = $product->get_variation_sale_price( 'min', true );
    $max_price = $product->get_variation_price( 'max', true );
    $min_price = $product->get_variation_price( 'min', true );
    $price = ( $min_price_sale == $min_price_regular ) ?
        wc_price( $min_price_regular ) :
        '<del>' . wc_price( $min_price_regular ) . '</del>' . '<ins>' . wc_price( $min_price_sale ) . '</ins>';
 
    return ( $min_price == $max_price ) ?
        $price :
        sprintf('%s%s', $prefix, $price);
}
add_filter( 'woocommerce_variable_sale_price_html', 'leto_child_variable_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'leto_child_variable_price_format', 10, 2 );
/*Fix search bug*/
function leto_child_extra_post_class( $classes, $class = '', $post_id = '' ) {

      $product = wc_get_product( $post_id );

      if( $product && is_search()  ) {
        $classes[] = 'hentry';
      }

      return $classes;

    } 
add_filter( 'post_class', 'leto_child_extra_post_class', 3, 20 );   
/*Remove Default Sorting Dropdown*/
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
function page_widgets_init() {
      //First page widget area, located in the footer. Empty by default.
    register_sidebar([
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4 class="widget-title">',
        'name' => __( '1st Page Widget Area', 'leto-child' ),
        'id' => 'first-page-widget-area',
        'description' => __( 'The first page widget area', 'leto-child' )
    ]);
     //Second page widget area, located in the footer. Empty by default.
   register_sidebar([
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4 class="widget-title">',
        'name' => __( '2nd Page Widget Area', 'leto-child' ),
        'id' => 'second-page-widget-area',
        'description' => __( 'The second page widget area', 'leto-child' )
    ]);
     //Third page widget area, located in the footer. Empty by default.
    register_sidebar([
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4 class="widget-title">',
        'name' => __( '3rd Page Widget Area', 'leto-child' ),
        'id' => 'third-page-widget-area',
        'description' => __( 'The third page widget area', 'leto-child' )
    ]);
      //Fourth page widget area, located in the footer. Empty by default.
    register_sidebar([
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4 class="widget-title">',
        'name' => __( '4th Page Widget Area', 'leto-child' ),
        'id' => 'fourth-page-widget-area',
        'description' => __( 'The fourth page widget area', 'leto-child' )
    ]);
     //Fifth page widget area, located in the footer. Empty by default.
    register_sidebar([
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4 class="widget-title">',
        'name' => __( '5th Page Widget Area', 'leto-child' ),
        'id' => 'fifth-page-widget-area',
        'description' => __( 'The fifth page widget area', 'leto-child' )
    ]);
}
add_action( 'widgets_init', 'page_widgets_init' );
function footer_widgets_init() {
   //Image Widget Areas for banners/images etc in footer under logo
    register_sidebar([
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4 class="footer-title">',
        'name'          => __('Image Footer', 'sage'),
        'id'            => 'image-sidebar-footer',
        'description' => __( 'The Image footer widget area','leto-child' )
    ]);
    //Other footer widget areas
    //First footer widget area, located in the footer. Empty by default.
    register_sidebar([
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4 class="footer-title">',
        'name' => __( 'First Footer Widget Area', 'sage' ),
        'id' => 'first-footer-widget-area',
        'description' => __( 'The first footer widget area', 'leto-child' )
    ]);
     //Second footer widget area, located in the footer. Empty by default.
    register_sidebar([
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4 class="footer-title">',
        'name' => __( 'Second Footer Widget Area', 'sage' ),
        'id' => 'second-footer-widget-area',
        'description' => __( 'The second footer widget area','leto-child' )
    ]);
     //Third footer widget area, located in the footer. Empty by default.
    register_sidebar([
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4 class="footer-title">',
        'name' => __( 'Third Footer Widget Area', 'sage' ),
        'id' => 'third-footer-widget-area',
        'description' => __( 'The third footer widget area', 'leto-child' )
    ]);
      //Fourth footer widget area, located in the footer. Empty by default.
    register_sidebar([
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4 class="footer-title">',
        'name' => __( 'Fourth Footer Widget Area', 'sage' ),
        'id' => 'fourth-footer-widget-area',
        'description' => __( 'The Fourth footer widget area', 'leto-child' )
    ]);
      register_sidebar([
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="footer-title">',
        'after_title'   => '</h4 class="footer-title">',
        'name'          => __('Social Footer', 'sage'),
        'id'            => 'social-footer',
        'description' => __( 'The Social footer widget area','leto-child' )
    ]);
}
add_action( 'widgets_init', 'footer_widgets_init' );