<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Leto
 */

?>

			</div>
		</div>
	</div><!-- #content -->
<div class="bottom" style="background:#f2f2f2;">
			<div class="container">
				<div class="row text-center">
					<div class="col-md-3 col-lg-2 pt-2">
					  <?php echo dynamic_sidebar("first-page-widget-area");?>
					</div>
					<div class="col-md-3 col-lg-2 pt-2">
					 <?php echo dynamic_sidebar("second-page-widget-area");?>
					</div>
					<div class="col-md-3 col-lg-2 pt-2">
						 <?php echo dynamic_sidebar("third-page-widget-area");?>
			       </div>
					<div class="col-md-3 col-lg-2 pt-2">
						 <?php echo dynamic_sidebar("fourth-page-widget-area");?>
					</div>
					<div class="col-md-3 col-lg-2 pt-2">
						 <?php echo dynamic_sidebar("fifth-page-widget-area");?>
					</div>
				</div>
			</div>
		</div>
<footer class="footer">
			<div class="container">
				<div class="row mb-5 text-center text-md-left">
					<div class="col-md-3 col-lg-4 mb-3">
						<a class="logo" href="index.php"><?php echo("<img src='/wp-content/uploads/2018/03/shopisle.png' width='160px' height='60px'>");?></a>
						<div>&nbsp;</div>
						<?php echo dynamic_sidebar("image-sidebar-footer");?>
			        </div>
					<div class="col-md-3 col-lg-2 pt-2 offset-1">
					  <?php echo dynamic_sidebar("first-footer-widget-area");?>
					</div>
					<div class="col-md-3 col-lg-2 pt-2">
					 <?php echo dynamic_sidebar("second-footer-widget-area");?>
					</div>
					<div class="col-md-3 col-lg-2 pt-2">
						 <?php echo dynamic_sidebar("third-footer-widget-area");?>
			       </div>
					<div class="col-md-3 col-lg-2 pt-2">
						 <?php echo dynamic_sidebar("fourth-footer-widget-area");?>
					</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="divider"></div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 text-center text-md-left mt-2 mb-3 pt-1 copyright">
						<p class="copyright"><?php printf( __( 'Built by %1$s', 'theme_name' ), '<a href="'. esc_url( '#' ) .'">Webmobapps</a> © 2018 All Rights Reserved' ); ?></p>
					</div>
				     <div class="col-md-6 text-center text-md-right mt-2 mb-3 pt-1 social">
					 <?php echo dynamic_sidebar("social-footer");?>
		     </div>
        </div>
			</div>
		</footer>
<?php wp_footer(); ?>
</body>
</html>
