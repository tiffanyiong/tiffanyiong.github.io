<?php
global $wdwt_front; 
get_header(); 
?>
<div class="right_container">
<div class="container">
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
		<aside id="sidebar1" >
			<div class="sidebar-container">			
				<?php  dynamic_sidebar( 'sidebar-1' ); 	?>
				<div class="clear"></div>
			</div>
		</aside>
	<?php } ?>
	<div id="content" class="error-404">
		    <p><?php _e('error', WDWT_LANG ); ?></p>
			<h1 class="page-header">404</h1>
			<div class="imgBox">
                <div class="image_404"><img src="<?php echo WDWT_URL.'/images/404.png' ?>" title="404" /></div>		     
	    	</div>
			<p class="content-404"><?php _e('You are trying to reach a page that does not exist here. Either it has been moved or you typed a wrong address. Try searching:', WDWT_LANG); ?></p>
		   <?php get_search_form(); ?>
	</div>   
    <?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
	<aside id="sidebar2"> 
		<div class="sidebar-container">
		   <?php dynamic_sidebar( 'sidebar-2' ); ?>
		   <div class="clear"></div>
		</div>
	</aside><!-- #first .widget-area -->
<?php }	?>
</div>
</div>
<?php
get_footer(); ?>