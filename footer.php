
<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
<section class="footer-top-area testimonials_area">
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div>
	</div>
</section>
<?php endif; ?>

<footer id="footer" class="footer-area">
	<?php global $pitheme; if (isset($pitheme['opt-textarea-copyright']) && !empty($pitheme['opt-textarea-copyright']))
		{
			$copyright_text = $pitheme['opt-textarea-copyright'];
		}else{
			$copyright_text = 'Copyright &copy;2016 - All right reserved';
		}
	?>
	<p class="text-center"><?php echo $copyright_text; ?></p>
</footer>

<?php wp_footer(); ?>
</body>
</html>
