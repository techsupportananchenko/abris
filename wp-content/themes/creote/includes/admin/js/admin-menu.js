jQuery(function($){
  $( 'body' ).on( 'change', '.megamenu-enable-oncheck', function ( e ) {
		megamenu_enable = $(this).closest('.top_badge_megamenu_box');
		if(this.checked) {
			megamenu_enable.find('.megamenu_enabledisable_box').removeClass('hidden-field');		
      megamenu_enable.find('.notmegamenu_enabledisable_box').addClass('hidden-field');			
		}else{
			megamenu_enable.find('.megamenu_enabledisable_box').addClass('hidden-field');
      megamenu_enable.find('.notmegamenu_enabledisable_box').removeClass('hidden-field');		
		}
	});
  $( 'body' ).on( 'change', '.badge-enable-oncheck', function ( e ) {
		badge_enable = $(this).closest('.top_badge_megamenu_box');
		if(this.checked) {
			badge_enable.find('.badge_enabledisable_box').removeClass('hidden-field');		 		
		}else{
			badge_enable.find('.badge_enabledisable_box').addClass('hidden-field');
      
		}
	});
  
    
  

  /* Color Picker */
  if( $('.creotemenubger-color-box').length > 0 ) {
    $('.creotemenubger-color-box').wpColorPicker();
  }
    // Set all variables to be used in scope
    var frame,
      metaBox = $('.jt-bg-image-upload-wrapper'), // Your meta box id here
      addImgLink = metaBox.find('.upload-custom-img');
      delImgLink = metaBox.find( '.delete-custom-img');  
    // ADD IMAGE LINK
    addImgLink.on( 'click', function( event ){
      
      event.preventDefault();
      
      var addImgLink1  = $(this).parent().parent().find('.upload-custom-img');
      var delImgLink1  = $(this).parent().parent().find( '.delete-custom-img');
      var imgContainer = $(this).parent().parent().find( '.custom-img-container');
      var imgIdInput   = $(this).parent().parent().find( '.creote-img-menu-id' );
  
      console.log(imgIdInput);
      console.log(imgContainer);
      
      // If the media frame already exists, reopen it.
      // if ( frame ) {
      //   frame.open();
      //   return;
      // }
      
      // Create a new media frame
      frame = wp.media({
        title: 'Select or Upload Media Of Your Chosen Persuasion',
        button: {
          text: 'Use this media'
        },
        multiple: false  // Set to true to allow multiple files to be selected
      });
  
      
      // When an image is selected in the media frame...
      frame.on( 'select', function() {
  
        
        // Get media attachment details from the frame state
        var attachment = frame.state().get('selection').first().toJSON();
  
        // Send the attachment URL to our custom image input field.
        imgContainer.append( '<img src="'+attachment.url+'" alt="" style="max-width:100%;"/>' );
  
        // Send the attachment id to our hidden input
        imgIdInput.val( attachment.id );
    
        // Hide the add image link
        addImgLink1.addClass( 'hidden' );
  
        // Unhide the remove image link
        delImgLink1.removeClass( 'hidden' );
  
        frame.close();
      });
  
      // Finally, open the modal on click
      frame.open();
    });
    
    
    // DELETE IMAGE LINK
    delImgLink.on( 'click', function( event ){
  
      event.preventDefault();
      
      var addImgLink1  = $(this).parent().parent().find('.upload-custom-img');
      var delImgLink1  = $(this).parent().parent().find( '.delete-custom-img');
      var imgContainer = $(this).parent().parent().find( '.custom-img-container');
      var imgIdInput   = $(this).parent().parent().find( '.creote-img-menu-id' );
  
      // Clear out the preview image
      imgContainer.html( '' );
  
      // Un-hide the add image link
      addImgLink1.removeClass( 'hidden' );
  
      // Hide the delete image link
      delImgLink1.addClass( 'hidden' );
  
      // Delete the image id from the hidden input
      imgIdInput.val( '' );
  
    });
  });