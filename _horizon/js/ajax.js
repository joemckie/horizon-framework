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

jQuery(document).ready(function($){
	
     var form = $("#horizon-theme-options-form");
     var submit_button = $(".horizon-theme-options-submit");
     var reset_button = $(".horizon-theme-options-reset");
	 var overlay = $("#theme-options .overlay");
	 var message_box = $("#theme-options #message_box");
	 
     submit_button.click(function(){
		 showLoader();
         doAjaxRequest();
     });
	 
     /* reset_button.click(function(){
		 setWarningMessage();
		  showLoader();
     }); */
	 
	 overlay.click(function(e){
		 hideLoader();
	 });
	 
	function doAjaxRequest(){
		 $.ajax({
			  url: page_data.ajaxurl,
			  data:{
				action: 'do_ajax',
				fn: 'horizon_save_theme_options',
				security: page_data.nonce_secure,
				string: form.serializeArray()
			  },
			  dataType: 'json',
			  type: 'POST',
			  beforeSend: function(){
			  	message_box.animate({
					top: $(window).scrollTop()+100,
					width: message_box.children("span").outerWidth(),
				}, 300);
			}
		 }).
		 done(function(data){
			 message_box.children("span").html(data.message);
			 message_box.animate({
				 top: $(window).scrollTop()+100,
				 width: message_box.children("span").outerWidth(),
			 }, 300);
    	 }).
		 fail( function(errorThrown){
			 message_box.children("span").html(errorThrown.message);
			 message_box.animate({
				 top: $(window).scrollTop()+100,
				 width: message_box.children("span").outerWidth(),
			 }, 300);
			console.log(errorThrown);
		 })
	}
	
	function showLoader() {
		overlay.show().animate({
			opacity : 0.9
		}, 300)
	}
	
	function hideLoader() {
		overlay.animate({
			opacity:0
		}, 300,function() {
			overlay.hide();
			message_box.children("span").html('<span><img src="'+page_data.root+'/_horizon/images/ajax/bar.gif" /></span>');
			message_box.css("width", message_box.find("img").outerWidth());
		});
	}
	
	function setWarningMessage() {
		message_box.children("span").html("WARNING! You are about to reset all of the options to this theme.");
	}
	
});