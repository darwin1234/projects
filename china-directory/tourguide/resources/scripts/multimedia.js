var multimedia;
$(function(){
	var base_url = $("#base_url").val();
	multimedia = {
		uploadaudiofile: function($form){
			var formdata = new FormData($form[0]); //formelement
			var request = new XMLHttpRequest();
			//progress event...
			request.upload.addEventListener('progress',function(e){
			var percent = Math.round(e.loaded/e.total * 100);
			});
			request.onreadystatechange = function() {
				if (request.readyState == 4 && request.status == 200) {
					
					alert(request.responseText);
												
				}
			};
			request.open('post', base_url + "Multimedia/uploadAudio");
			request.send(formdata);
			
		},
		uploadAudio: function(){
			
			$(document).on('submit','#audioUploadForm',function(e){
				e.preventDefault();
				$form = $(this);
			
				multimedia.uploadaudiofile($form);

			});
			
		}
			
		
	};
	multimedia.uploadAudio();
	
});