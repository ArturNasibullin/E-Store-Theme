<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
add_action( 'woocommerce_before_main_content', 'estore_add_breadcrumbs', 20 );
function estore_add_breadcrumbs(){
	?>
	<div class="breadcrumb_dress">
		<div class="container">
			<?php woocommerce_breadcrumb(); ?>
		</div>
	</div>
<?php
}

add_action( 'woocommerce_before_single_product', 'estore_wrapper_product_start', 5 );
function estore_wrapper_product_start() {
	?>
	<div class="single-section">
		<div class="container">
	<?php
}
add_action( 'woocommerce_after_single_product', 'estore_wrapper_product_end', 5 );
function estore_wrapper_product_end() {
	?>
		</div>
	</div>
	<?php
}
add_action( 'woocommerce_before_single_product_summary', 'estore_wrapper_product_image_start', 5 );
function estore_wrapper_product_image_start() {
	?>
	<div class="col-md-4 single-left">
	<?php
}
add_action( 'woocommerce_before_single_product_summary', 'estore_wrapper_product_image_end', 25 );
function estore_wrapper_product_image_end() {
	?>
	</div>
	<?php
}
add_action( 'woocommerce_before_single_product_summary', 'estore_wrapper_product_entry_start', 30 );
function estore_wrapper_product_entry_start() {
	?>
	<div class="col-md-8 single-right">
	<?php
}
add_action( 'woocommerce_after_single_product_summary', 'estore_wrapper_product_entry_end', 5 );
function estore_wrapper_product_entry_end() {
	?>
	</div>
	<div class="clearfix"> </div>
	<?php
}
add_action( 'wp_enqueue_scripts', 'estore_woocommerce_scripts' );
function estore_woocommerce_scripts() {
	wp_enqueue_style( 'estore-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );
	
	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';
	
	wp_add_inline_style( 'estore-woocommerce-style', $inline_font );
}

add_filter( 'woocommerce_short_description', 'estore_short_description', 10 );
function estore_short_description($content){
?>
	<div class="description">
		<?php echo $content;?>
	</div>
<?php
}
