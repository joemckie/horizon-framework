/*
 *
 *  @copyright 2013 Joe McKie
 *  @version 1.0
 *  @author Joe McKie
 * 	@link http://joemck.ie/
 *
 *	This file is part of the Horizon Framework.
 *
 *  Horizon Framework is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  Horizon Framework is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with the Horizon Framework.  If not, see <http://www.gnu.org/licenses/>.
 *
 *	Horizon Framework is built and maintained by Joe McKie (http://joemck.ie/)
 *
*/

(function($){
	$.fn.font_preview = function(){
		var fonts_container = $(this).parents(".option_input");
		
		var o = {
			"colour": fonts_container.find(".colourpicker").val(),
			"exclude_fonts": ["Arial", "Arial Black", "Comic Sans MS", "Courier New", "Georgia", "Impact", "Palatino Linotype", "Lucida Console", "Lucida Sans Unicode", "Times New Roman", "Tahoma", "Trebuchet MS", "Verdana", "Helvetica Neue"],
			"font": {"name": fonts_container.find(".font").val()},
			"rel":	$(this).attr("rel"),
			"size": fonts_container.find(".font_size").val(),
			"size_type": fonts_container.find(".font_size_type").val(),
			"transform": fonts_container.find(".transform").val(),
			"weight": fonts_container.find(".weight").val()
		};		
		o.font.dashed	= o.font.name.replace(/\ /g,"-");
		o.font.plussed	= o.font.name.replace(/\ /g,"+");

		// Font preview
		var string = '';
		string += 'font-family:'+o.font.name+';';
		string += 'font-size:'+o.size+o.size_type+';';
		string += 'text-transform:'+o.transform+';';
		
		string += (o.weight.indexOf("italic") !== -1) ? 'font-style:italic;' : 'font-style:normal;';
		switch(o.weight){
			case "100":			o.weight = '100';		break;
			case "300":			o.weight = '300';		break;
			case "300italic":	o.weight = '300';		break;
			case "regular":		o.weight = '400';		break;
			case "italic":		o.weight = '400';		break;
			case "500":			o.weight = '500';		break;
			case "700":			o.weight = '700';		break;
			case "700italic":	o.weight = '700';		break;
			case "900":			o.weight = '900';		break;
			case "900italic":	o.weight = '900';		break;
			default:			o.weight = 'normal';	break;			
		}
		string += 'font-weight:'+o.weight+';';
		string += 'color:'+o.colour+';';
		
		var css_string = 'http://fonts.googleapis.com/css?family='+o.font.plussed+':300,300italic,400,italic,500,500italic,700,700italic,900,900italic';
		var preview_string = 'Sphinx of black quartz, judge my vow.';

		// Get google font (AJAX call)
		if(o.exclude_fonts.indexOf(o.font.name) == -1 && o.rel == "font") {
			$.ajax({
				url: page_data.ajaxurl,
				data:{
					action: 'do_ajax',
					fn: 'switch_google_font_css',
					security: page_data.nonce_secure,
					string: css_string
				},
				dataType: 'json',
				type: 'POST',
				beforeSend: function(){
					fonts_container.find(".font-preview").html('<img src="'+page_data.root+'/_horizon/images/ajax/bar.gif" />');
				}
			}).
			done(function(data){
				if(data.indexOf("Error 404") == -1){
					fonts_container.find(".preview-css").html(data);
					fonts_container.find(".font-preview").html(preview_string);
				} else {
					fonts_container.find(".font-preview").html("There has been a problem. This may be caused by your server settings.");
				}
			}).
			fail(function(errorThrown){
				fonts_container.find(".font-preview").html("There has been a problem. This may be caused by your server settings.");
				for (var i in errorThrown) {
					out += i + ": " + errorThrown[i] + "\n";
				}
				console.log(errorThrown);
			});			
		}

		return fonts_container.find(".font-preview").attr("style", string);
		
	};
})(jQuery);