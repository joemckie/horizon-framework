<?php 

global $shortcode_atts;

extract( shortcode_atts( array(
	"col" => "1/4",
	"last" => "false",
	"offset" => "",
), $shortcode_atts['atts'] ) );

// Standardise text inputs
$first = strtolower($first);
$last = strtolower($last);

if($last=='true') $additional_class = ' last-col';

switch($col):
	case '1/6': $width = '1-6'; break;
	case '5/6': $width = '5-6'; break;
	case '1/4': $width = '1-4'; break;
	case '3/4': $width = '3-4'; break;
	case '1/3': $width = '1-3'; break;
	case '2/3': $width = '2-3'; break;
	case '1/2': $width = '1-2'; break;
	case '1/1': $width = '1-1'; break;
endswitch;

switch($offset):
	case '1/2': $offset = ' offset1-2'; break;
	case '1/3': $offset = ' offset1-3'; break;
	case '2/3': $offset = ' offset2-3'; break;
	case '1/4': $offset = ' offset1-4'; break;
	case '3/4': $offset = ' offset3-4'; break;
	case '1/6': $offset = ' offset1-6'; break;
	case '5/6': $offset = ' offset5-6'; break;
endswitch;

?>
	
<div class="shortcode-col width<?php echo $width . $offset . $additional_class;?>">
 <?php echo do_shortcode($shortcode_atts['content']);?>
</div>

<?php if($last=='true') { ?>
	<div class="clear"></div>
<?php } ?>