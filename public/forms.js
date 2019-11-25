$(function(){
	'use strict';

	$(function() {

		$('.btn-add').on('click',function(){
            $('.loader').removeClass('hidden');
        })

        /*setTimeout(function() {
            
        }, 3000);
*/
        $(document).ready(function() {
            
            $('.loader').addClass('hidden');
        });
		$('.nav-button').on('click',function(){
       		var link = $(this).attr('id');
	        $('.btn-exit').val(link);
	    });

	    $('.btn-exit').on('click',function(){
	        var link = $(this).val();
	        var company = $(this).attr('company');
	        var form = $(this).attr('id');
	        window.location = '/companies/'+company+'/histories/'+form+'';
	    });

        $('.btn-filing-success').on('click', function(){
            var form = $(this).attr('form');
            var company = $(this).attr('company');
            var form_id =  $(this).attr('id');

            window.location = '/form/'+form+'/'+company+'/show/view/'+form_id+'';
        });

        /*for filing confirmation*/
        $('.fileForm').on('submit',function(){
            var id = $(this).find('input[name="form"]').val();
            var data = $(this).serialize();
            $.post("/companies/file/"+id+"", data).done(function(obj){
                console.log(obj);
                if(obj != ""){
                        $('#fileModal'+obj+'').modal('hide');
                        $('#filingMessage').modal('show');
                }
            });
            return false;
        });

        /*for delete form*/
        $('.deleteForm').on('submit',function(){
            var form = $(this).find('input[name="form"]').val();
            var data = $(this).serialize();
            $.post("/companies/"+form+"", data).done(function(obj){
                if(obj != ""){
                    $('#deleteModal'+obj+'').modal('hide');
                    $('#deleteMessage').modal('show');
                }
            });
            return false;
        });
	});

});
function save(form, data)
{
	$.ajax({
        url : "/form/"+form+"",
        type: 'POST',
        data: data,
        error: function(err){
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success : function(obj){ 
            console.log(obj);
            $('#successModal').modal('show');
            $('#successModal').find('.message').html('<div class="alert alert-success">BIR Form successfully saved as: '+obj+'</div>')
        	}
        });
}

function submitAndSave(form, data, company_id)
{
    $.post("/form/"+form+"", data).done(function(obj){
        if(obj != ""){
            submit(form, data, company_id);
        }
    });
}

function submit(form, data, company_id)
{
    $.post("/form/"+form+"/update", data).done(function(obj){
        $('#submitModal').modal('hide');
        $('#fillingSuccess').modal('show');
        $('#fillingSuccess').find('.btn-filing-success').attr('id', obj);
    });
}

function saveAndExit(form, data)
{
	$.ajax({
        url : "/form/"+form+"",
        type: 'POST',
        data: data,
        error: function(err){
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success : function(obj){ 
            	$('#savedAlertModal').modal('show');
                $('#savedAlertModal').find('.message').html('<div class="alert alert-success">BIR Form successfully saved as: '+obj+'</div>');
        	}
        });
}





