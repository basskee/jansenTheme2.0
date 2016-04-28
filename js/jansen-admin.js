jQuery(document).ready(function($){
	var mediaUploader;

	//bind button to media uploader
	$('#upload-button').on('click', function(e) {
		e.preventDefault();
		if(mediaUploader){
			mediaUploader.open();
			return;
		}
		//customize options in Media Uploader
		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Profile Picture',
			button: {
				text: 'Choose Picture'
			},
			multiple: false
		});

		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#profile-picture').val(attachment.url);
			//swap photos
			$('#profile-picture-preview').css('background-image', 'url(' + attachment.url + ')');
		});

		mediaUploader.open();

	});

	//Remove Profile Picture
	$('#remove-picture').on('click', function(e){
		e.preventDefault();
		var answer = confirm("Are you sure you want to delete your Profile Picture?");
		if(answer == true){
			$('#profile-picture').val('');
			$('.jansen-general-form').submit();
		}
		return;
	});

});