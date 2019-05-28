<?php global $wdwt_front; ?>
<div id="footer">
    <div> 
	<div class="clear"></div>
		<?php if(!is_home()){ ?>
        <div class="footer-sidebar">
			<div class="container" style="padding: 40px 0px 60px 0px;">
				<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) { ?>
					<div id="sidebar-footer">
					  <?php  dynamic_sidebar( 'first-footer-widget-area' ); 	?>
					  <div class="clear"></div>	
					</div>	
				<?php } ?>
				 <?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) { ?>
				<div id="second-sidebar-footer" >
				  <?php  dynamic_sidebar( 'second-footer-widget-area' ); 	?>
				  <div class="clear"></div>	
				</div>	
				 <?php } ?> 
			</div> 
			<div class="clear"></div>	
		</div>
		<?php } ?>
		<div class="arrow-down"></div>
		<?php if ( is_active_sidebar( 'footer-widget-area' ) ) { ?>
			<div class="footer-sidbar third">			
				<div id="third-sidebar-footer" class="container">
				  <?php  dynamic_sidebar( 'footer-widget-area' ); 	?>
				  <div class="clear"></div>	
				</div>				
				<div class="clear"></div>	
			</div>
		<?php } ?>		
        <div id="footer-bottom">
			<div class="container">
				<?php $wdwt_front->footer_text(); ?>
			</div>
        </div>
    </div>
</div>
<a id="go-to-top" href="#" title="Back to top"><?php _e("Go Top", WDWT_LANG); ?></a>
<?php wp_footer();  ?>
<div class="clear"></div>
</body>
</html>