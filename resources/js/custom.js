$(function(){
	'use strict';

	$(function() {
		$('.form-control').on('keyup', function(){
			$(this).removeClass('is-invalid');
		});

		$('#terms').on('click',function(){
			$('#agreement').modal('show');
		});

		/*For Terms and Agreement*/
		$('#terms').on('click',function(){
			$(this).prop('checked',false);      
			$('#agreement').modal('show');
		});

		$('.btn-agreed').on('click', function(){
			$('.btn-sign-up').removeAttr('disabled');
			$('#terms').prop('checked',true); 
			$('#agreement').modal('hide');
		})

		/*For Tin Validation*/
		/*$('#inputTin4').on('change', function(){
			var tin1 = $('#inputTin1').val();
			var tin2 = $('#inputTin2').val();
			var tin3 = $('#inputTin3').val();
			var tin4 = $('#inputTin4').val();
			
			$.ajax({
				url : URL + "company/validateTin",
				type: 'POST',
				data: {'tin1':tin1, 'tin2':tin2, 'tin3':tin3, 'tin4':tin4 },
				error: function(err){
				    alert("AJAX error in request: " + JSON.stringify(err, null, 2));
				},
				success : function(obj){ 
				console.log(obj); 
					if(obj == "Invalid"){
						$('.btn-save-company').attr('disabled','disabled');
					}else{
						$('.btn-save-company').removeAttr('disabled');
					}
				}
			});

			return false;
		})*/


	});
});



