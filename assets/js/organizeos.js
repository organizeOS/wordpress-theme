(function( $ ) {
  var $ = jQuery;

  $.fn.fadeThenSlideToggle = function(speed, callback) {
    if (this.is(":hidden")) {
      return this.slideDown(speed).fadeTo(speed, 1, callback);
    }
    else {
      return this.fadeTo(speed, 0).slideUp(speed, callback);
    }
  };



  $("body").on("click", "[data-action]", function(evt) {
    evt.preventDefault();

  	switch ($(this).data('action')) {

      case "scrollTo":

        $(window).scrollTo($(this).attr('href'), 1000, {easing: 'swing'});


      break;


      case "newsletter-signup":
        if ($("#newsletter-email").val() != "") {
          $("#newsletter-form-inputs").fadeThenSlideToggle();
          jQuery.ajax({
    				type : 'POST',
    				dataType: 'html',
    				url : '/wp-admin/admin-ajax.php',
    				data : {
    					action: 'organizeos_ajax',
    					email: $("#newsletter-email").val(),
              firstname: $("#newsletter-firstname").val(),
              lastname: $("#newsletter-lastname").val(),
    					type: 'subscribe'
    				},
    				success : function( data ) {
    					console.log(data);
              $("#newsletter-form-response").html("<p>Thank you for signing up! You will receive a confirmation email.</p>").fadeThenSlideToggle();
    				},
    				error : function (o, error) {
              console.log(o, error);
              $("#newsletter-form-response").html("<p>There was a problem with subscribing you to our list.</p>").fadeThenSlideToggle();
    				},
            complete : function () {
            }
    			});
  			}
  			else {
  				console.log("No email entered");
  			}
  		break;

      case "more-cards":
        var type = $(this).data('type');
        var target = $(this).data('target');
        var offset = $(this).data('offset');
        var count = $(this).data('count');
        var _this = $(this);
        jQuery.ajax({
          type : 'POST',
          dataType: 'html',
          url : '/wp-admin/admin-ajax.php',
          data : {
            action: 'organizeos_ajax',
            type: 'morecards',
            offset: offset,
            post_type: type,
            count: count
          },
          beforeSend: function() {
            //indicate loading
          },
          success : function( data ) {
            var $container = $(target);
            if (data) {
              _this.data('offset', _this.data('offset') + count);
              $data = $(data);
              $container.append( $data ).masonry( 'appended', $data );
              /*$('html, body').delay(500).animate({scrollTop: $(_this).offset().top - 800}, 1000);*/
            }
            else {
              _this.fadeThenSlideToggle();
            }
          },
          error : function (o, error) {
            //error handling?
          }
        });
      break;

    }
  });


  $( document ).ready( function() {


  });


})( jQuery );
