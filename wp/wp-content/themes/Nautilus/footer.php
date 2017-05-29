<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package fabthemes
 * @since fabthemes 1.0
 */
?>

	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer " role="contentinfo">
		<div class="site-info">
			<div class="fcred">
				Copyright &copy; <?php echo date('Y');?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> - <?php bloginfo('description'); ?>.<br />
<?php fflink(); ?> | <a href="http://fabthemes.com/<?php echo FT_scope::tool()->themeName ?>/" ><?php echo FT_scope::tool()->themeName ?> WordPress Theme</a>
			</div>		
		</div><!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>



<?php 
if(is_single()){ ?>
<script type="text/javascript">
jQuery("#primary").backstretch("<?php get_image_url(); ?> ");
</script>
<?php } ?>
</body>
</html>
