jQuery(document).ready(function($){
	$(".slidecontrol").change(function(){
		var val = $(this).val();
		var id = $(this).attr("id");
		
		var style = 'horizon';
		
		// Link Thumbnail Background Type Switch
		if(val=="Block Colour" && id==page_data.theme_short_name+"_options_blog_"+style+"_single_link_thumb_bg_type"){
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_link_thumb_bg_pattern_wrap").children(".option").slideUp();
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_link_thumb_bg_colour").parents(".option").slideDown();
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_link_thumb_custom_bg_wrap").children(".option").slideUp();
		} else if(val=="Pattern" && id==page_data.theme_short_name+"_options_blog_"+style+"_single_link_thumb_bg_type"){
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_link_thumb_bg_pattern_wrap").children(".option").slideDown();
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_link_thumb_bg_colour").parents(".option").slideUp();
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_link_thumb_custom_bg_wrap").children(".option").slideUp();
		} else if(val=="Custom Image" && id==page_data.theme_short_name+"_options_blog_"+style+"_single_link_thumb_bg_type"){
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_link_thumb_bg_pattern_wrap").children(".option").slideUp();
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_link_thumb_custom_bg_wrap").children(".option").slideDown();
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_link_thumb_bg_colour").parents(".option").slideUp();
		} else if(val=="No Background" && id==page_data.theme_short_name+"_options_blog_"+style+"_single_link_thumb_bg_type"){
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_link_thumb_bg_pattern_wrap").children(".option").slideUp();
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_link_thumb_bg_colour").parents(".option").slideUp();
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_link_thumb_custom_bg_wrap").children(".option").slideUp();
		}
		
		// Link Thumbnail Background Type Switch
		else if(val=="Block Colour" && id==page_data.theme_short_name+"_options_blog_"+style+"_single_quote_thumb_bg_type"){
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_quote_thumb_bg_pattern_wrap").children(".option").slideUp();
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_quote_thumb_bg_colour").parents(".option").slideDown();
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_quote_thumb_custom_bg_wrap").children(".option").slideUp();
		} else if(val=="Pattern" && id==page_data.theme_short_name+"_options_blog_"+style+"_single_quote_thumb_bg_type"){
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_quote_thumb_bg_pattern_wrap").children(".option").slideDown();
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_quote_thumb_bg_colour").parents(".option").slideUp();
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_quote_thumb_custom_bg_wrap").children(".option").slideUp();
		} else if(val=="Custom Image" && id==page_data.theme_short_name+"_options_blog_"+style+"_single_quote_thumb_bg_type"){
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_quote_thumb_bg_pattern_wrap").children(".option").slideUp();
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_quote_thumb_custom_bg_wrap").children(".option").slideDown();
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_quote_thumb_bg_colour").parents(".option").slideUp();
		} else if(val=="No Background" && id==page_data.theme_short_name+"_options_blog_"+style+"_single_quote_thumb_bg_type"){
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_quote_thumb_bg_pattern_wrap").children(".option").slideUp();
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_quote_thumb_bg_colour").parents(".option").slideUp();
			$("#"+page_data.theme_short_name+"_options_blog_"+style+"_single_quote_thumb_custom_bg_wrap").children(".option").slideUp();
		}
	});
});