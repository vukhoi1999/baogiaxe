<?php get_header(); ?>
	<?php if (have_posts()) :  while (have_posts()) : the_post();?>	 
		<?php 
			  global $options;$fields;$options2;$options3;
			  $fields = get_post_meta($post->ID, 'mod1', true);
			  $options = my_get_theme_options();
			  $options2 = get_post_meta($post->ID, 'mod2', true);
			  $options3 = get_post_meta($post->ID, 'mod3', true);
			  ?>	
			  <?php cps_ajax_search_results_single(); ?>
			  <div class="col-sm-9  col-sm-push-3 hideOnSearch">
			  	<div class="row">
			  		<div class="col-sm-8">	
					<div id="wrap">
						<div id="myCarousel" class="carousel slide hideOnSearch single" data-interval="false" data-ride="carousel">
							<div class="carousel-inner">
								<?php gallery_single ($post->ID,'large'); ?>
							</div>
							<a class="left carousel-control" href="#myCarousel" data-slide="prev">
								<i class="fa fa-angle-left fa-2x"></i></a>
							<a class="right carousel-control" href="#myCarousel" data-slide="next">
								<i class="fa fa-angle-right fa-2x"></i></a>
						</div> 
						<div id="my-thumbs-list" class="carousel">
							<ul class="carousel-thumbs hideOnSearch thumbnail">
								<?php gallery_thumbs ($post->ID,'thumbnail'); ?>
							</ul>    
 						</div>
 					</div>
 				<div style="clear: both"></div>
 				<ul class="nav nav-tabs hideOnSearch" role="tablist" id="myTabs">
 					<li class="active">
 						<a href="#overview" role="tab" data-toggle="tab">
 							<?php _e('Overview','language');?>
          				</a>
		  			</li>
					<?php $video_source = get_post_meta($post->ID, 'video_meta_box_source', true);
						  $video_id = get_post_meta($post->ID, 'video_meta_box_videoid', true);	
						  if(($video_source == "vimeo") && !empty($video_id)){ ?>
					<li>
		  				<a href="#video" role="tab" data-toggle="tab">
		  					<?php _e('Video','language');?>
          				</a>
		  			</li>
		  				<?php } elseif(( $video_source == "youtube") && !empty($video_id)){ ?>
		  			<li>
		  			<a href="#video" role="tab" data-toggle="tab">
		  				<?php _e('Video','language');?>
          			</a>
		  			</li>									
					<?php  } ?>
          		</ul>
		  	<div class="tab-content hideOnSearch">
			  	<div class="tab-pane active" id="overview">
			<ul class="overview">
			<?php 
				$content = get_the_content();
				$content = preg_replace("/<img[^>]+\>/i", " ", $content);          
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]>', $content);
				?><h1><?php echo $post->post_title;?></h1><?php
				echo '<span class="car-overview">'.wpautop(the_content()).'</span>';
			?>
			</ul>
    </div>
    <div class="tab-pane fade" id="features">
    <div class="item-list">								
		<ul class="features  features-list">
		<?php	if (get_the_terms($post->ID, 'features')) {
				$taxonomy = get_the_terms($post->ID, 'features');									
				foreach ($taxonomy as $taxonomy_term) {
			?> <li><?php echo $taxonomy_term->name;?></li><?php }  														
			}
			?>
        </ul>    
	</div>
    </div>
<div class="tab-pane fade" id="contact">
<?php echo do_shortcode('[contact-form][contact-field label="Name" type="name" class="form-control" required="1"/][contact-field label="Email" class="form-control" type="email" required="1"/][contact-field label="Phone" class="form-control" type="phone"/][contact-field label="Comment" default="I would like to request more information about your '. $fields['year'].' '.$post->post_title.' with Stock Number #'. $fields['stock'].'" type="textarea" class="form-control" required="1"/][/contact-form] ');?> 
	<div style="clear:both"></div>
</div>
	<div class="tab-pane fade" id="video">
		<ul class="video">
			<li><?php $video_source = get_post_meta($post->ID, 'video_meta_box_source', true);
$video_id = get_post_meta($post->ID, 'video_meta_box_videoid', true);		if(($video_source == "vimeo") && !empty($video_id)){ ?>
			<div class="embed-responsive embed-responsive-16by9">
				<iframe src="https://player.vimeo.com/video/<?php echo $video_id; ?>?title=0&amp;portrait=0&amp;color=e275c7" class="embed-responsive-item" webkitAllowFullScreen allowFullScreen></iframe>
			</div>
			<?php } elseif(( $video_source == "youtube") && !empty($video_id)){ ?>
			<div class="embed-responsive embed-responsive-16by9">
				<iframe src="https://www.youtube.com/embed/<?php parse_str( parse_url( $video_id, PHP_URL_QUERY ), $IdURL ); echo $IdURL['v']; ?>" class="embed-responsive-item" allowfullscreen></iframe>
			</div>
			<?php  } ?>
			</li>
		</ul>
    </div>
    </div>
	<div style="clear: both"></div>
</div>
<?php endwhile; endif; ?>   
<div class="col-sm-4 single-sidebar hideOnSearch">	
	<span class="info-single">
		<h3 class="price-single"><?php $options['price_text'];?>
			<?php if (is_numeric( $fields['price'])){ echo number_format($fields['price']).' '.$options['currency_text'];}else {  echo  $fields['price']; }?>
		</h3>
		<div class="buttons-action">
		
			<a  type="button" class="btn btn-default btn-lg offer" href="mailto:<?php echo get_the_author_meta( 'user_email' );?>?subject=Vehicle information request&body=<?php echo	"I would like to request more information about your ". $fields['year'].' '.$post->post_title.' with Stock Number #'. $fields['stock'];?>">
					<i class="fa fa-envelope-o"></i> <?php _e('Request Information','language');?>
			</a>
		</div>
		<ul class="quick-list quick-glance hideOnSearch ">
		<?php echo do_shortcode('[socialbuttons]');?>
		<?php if ( is_active_sidebar( 'carfax' ) ) : ?>
        <?php dynamic_sidebar( 'carfax' ); ?>  
        <?php endif; ?>
		<?php $terms_child = get_the_terms($post->ID,'location');
				$sorted_terms_child = array();
				$find_child = 0;
				if($terms_child){
					for( $i = 0; $i < sizeof($terms_child); ++$i) {
						if (is_array($terms_child)) {
						foreach ($terms_child as $term_child) {
							if ($term_child->parent == $find_child) {
								 $find_child = $term_child->term_id;
								 $sorted_terms_child[] = $term_child;
									}
								}
							}
						}
				}
				if ( ! isset($sorted_terms_child[1])) {
				$sorted_terms_child[1] = null; } else {
				echo '<li><p>'.$sorted_terms_child[1]->name;}
				$terms = get_the_terms($post->ID,'location');
				$sorted_terms = array();
				$find_parent = 0;
				if($terms){
					for( $i = 0; $i < sizeof($terms); ++$i) {
						if (is_array($terms)) {
					
					foreach ($terms as $term) {
								if ($term->parent == $find_parent) {
									 $find_parent = $term->term_id;
									 $sorted_terms[] = $term;
										}
								 }
						}
					}
				}
				if ( ! isset($sorted_terms[0])) {
				$sorted_terms[0] = null; } else {
				echo '</p><div style="clear:both"></div></li>';} 
				global $user_ID;
				if  (get_the_author_meta('phone',$user_ID)  == true ) {
				echo '<li><p>'.__('Phone: ','language').'</p>'.get_the_author_meta('phone').'</li>';  }else {  echo ''; }
				if ((is_numeric( $fields['price']))){ echo '<li><p>'.$options['price_text'].':</p> '.number_format($fields['price']); echo ' '; echo $options['currency_text'].'</li>';}else {  echo '<li><p>'.$options['price_text'].' '.':</p> '.$fields['price'].'<li>'; }
				if (!empty( $fields['miles'])){ echo '<li><p>'.$options['miles_text'].':</p> '.$fields['miles'].'</li>';}else {  echo ''; }
				if (!empty( $fields['vehicle_type'])){ echo '<li><p>'.$options['vehicle_type_text'].':</p> '.$fields['vehicle_type'].'</li>';}else {  echo ''; }
				if (!empty( $fields['drive'])){ echo '<li><p>'.$options['drive_text'].':</p> '.$fields['drive'].'</li>';}else {  echo ''; }
				// hộp số
				if (!empty( $fields['transmission'])){ echo '<li><p>'.$options['transmission_text'].':</p> '.$fields['transmission'].'</li>';}else {  echo ''; }
				//  màu ngoại nội thất 
				if (!empty( $fields['exterior'])){ echo '<li><p>'.$options['exterior_text'].':</p> '.$fields['exterior'].'</li>';}else {  echo ''; }
				if (!empty( $fields['interior'])){ echo '<li><p>'.$options['interior_text'].':</p> '.$fields['interior'].'</li>';}else {  echo ''; }
				if (!empty( $fields['epamileage'])){ echo '<li><p>'.$options['epa_mileage_text'].':</p> '.$fields['epamileage'].'</li>';}else {  echo ''; }
				// giải trí trên xe
				if (!empty($fields['stock'])){ echo '<li><p>'.$options['stock_text'].':</p> '.$fields['stock'].'</li>';}else {  echo ''; }
					// tính năng an toàn
				if (!empty( $fields['VIN'])){ echo '<li><p>'.$options['vin_text'].':</p> '.$fields['VIN'].'</li>';}else {  echo ''; }
				if (!empty( $fields['vin'])){ echo '<li><p>'.$options['vin_text'].':</p> '.$fields['vin'].'</li>';}else {  echo ''; }?>
   				<div style="clear: both"></div>
   				<div><?php if (!empty( $fields['carfax'])){ ?><a class="carfax" target="_blank" href='http://www.carfax.com/VehicleHistory/p/Report.cfx?partner=<?php  echo $fields['carfax']; ?>&vin=<?php  echo $fields['vin']; ?>'><img style="border:1px solid #ccc" src='http://www.carfaxonline.com/media/img/subscriber/buyback.jpg' border='0'></a><?php  }else {   echo '';  }?></div>		
   			</ul>
			<?php if ( ! dynamic_sidebar( 'specs' )) : ?>
			<?php endif; ?>     
				</span>
			</span>
		</div>
	</div>
</div>  
<div class="col-sm-3 col-sm-pull-9">
	<?php if ( ! dynamic_sidebar( 'search' ) ) : endif; ?>
	<?php if ( ! dynamic_sidebar('sidebar')) :   endif; ?>
</div>    
<div class="col-sm-12">
	<?php if ( ! dynamic_sidebar('featured')) : endif; ?>
</div>
</div>
<?php get_footer(); ?>