<?php global $portfolio_atts; ?>
	<div class="page-builder-portfolio horizon-style clearfix">
	<?php 
		if ( (string) $portfolio_atts['title'] != "" ) {
			echo '<h2 class="section-title">' . $portfolio_atts['title'] . '</h2>';
		}
		if ( (string) $portfolio_atts['portfolio_text'] == "" ) {
			return;
		} else {
			echo '<div class="read-all"><a class="horizon-button rounded" href="' . $portfolio_atts['portfolio_link'] . '">' . $portfolio_atts['portfolio_text'] . '</a></div>';
		}
	?>