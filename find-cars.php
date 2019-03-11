<?php $options = my_get_theme_options();?>
<div class="col-sm-12 hidden-xs">
	<div class="full-width find-wrapper">
		<div id="cars-container">
			<ul class="cars-list list-one">
				<div class="col-sm-2">
					<li>
						<a   href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_1']);?>/"><img src="<?php bloginfo('template_url'); ?>/assets/images/product-images/convertible.png" alt="<?php echo $options['vehicle_type_1'];?>" /></a>
						<a   href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_1']);?>/"><?php echo $options['vehicle_type_1'];?></a>
					 </li>
				</div>
				<div class="col-sm-2">
					<li>
						<a  href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_2']);?>/"><img src="<?php bloginfo('template_url'); ?>/assets/images/product-images/luxury.png" alt="<?php echo $options['vehicle_type_2'];?>" /></a>
						<a  href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_2']);?>/"><?php echo $options['vehicle_type_2'];?></a>
					</li>
				</div>
				<div class="col-sm-2">
					<li>
						<a  href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_3']);?>/"><img src="<?php bloginfo('template_url'); ?>/assets/images/product-images/minivans.png" alt="<?php echo $options['vehicle_type_3'];?>" /></a>
						<a  href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_3']);?>/"><?php echo $options['vehicle_type_3'];?></a>
					</li>
				</div>
				<div class="col-sm-2">
					<li>
						<a  href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_4']);?>/"><img src="<?php bloginfo('template_url'); ?>/assets/images/product-images/pickuptrucks.png" alt="<?php echo $options['vehicle_type_4'];?>" /></a>
						<a  href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_4']);?>/"><?php echo $options['vehicle_type_4'];?></a> 						
					</li>
				</div>
				<div class="col-sm-2">
					<li>
						<a href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_5']);?>/"><img src="<?php bloginfo('template_url'); ?>/assets/images/product-images/sedanscoupes.png" alt="<?php echo $options['vehicle_type_5'];?>" /></a>
						<a href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_5']);?>/"><strong><?php echo $options['vehicle_type_5'];?></strong></a>
						</li>
				</div>

				<div class="col-sm-2">
					<li>
						<a id="link" href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_9']);?>/"><img src="<?php bloginfo('template_url'); ?>/assets/images/product-images/sportutilities.png" alt="<?php echo $options['vehicle_type_9'];?>" /></a>
						<a href="<?php bloginfo('url'); ?>/#search/<?php echo strtolower(str_replace(" ", "", 'vehicletype')); ?>-<?php echo str_replace(' ', '+', $options['vehicle_type_9']);?>/"><strong><?php echo $options['vehicle_type_9'];?></strong></a>
					</li>
				</div>
			
			</ul>
		</div>
	</div>
</div>