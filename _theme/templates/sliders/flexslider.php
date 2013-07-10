<?php global $flexslider_args; ?>
<div class="flexslider flexslider-<?=$flexslider_args['animation'].' '. $flexslider_args['area'];?>-flexslider">
	<ul class="slides">
		<?php foreach($flexslider_args['slides'] as $slide){
			echo $slide;
		} ?>
	</ul>
</div> 

