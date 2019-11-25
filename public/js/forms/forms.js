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
            $.post("/companies/destroy/"+form+"", data).done(function(obj){
                console.log(obj);
                if(obj != ""){
                    $('#deleteModal'+obj+'').modal('hide');
                    $('#deleteMessage').modal('show');
                }
            });
            return false;
        });
	});

});

function numbersonly(e, decimal) {
    var key;
    var keychar;

    if (window.event) {
        key = window.event.keyCode;
    }
    else if (e) {
        key = e.which;
    }
    else {
        return true;
    }
    keychar = String.fromCharCode(key);

    if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27)) {
        return true;
    }
    else if ((("0123456789.").indexOf(keychar) > -1)) {
        return true;
    }
    else if (decimal && (keychar == ".")) {
        return true;
    }
    else
        return false;
}

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

function submitAndSave1702MX(form, data, company,form_no,form_id,item2A,item2B,tin,xml)
{
    save_1702MX(form, data);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/form/"+form+"/xml",
        type: 'POST',
        data: {'company':company,'form_no':form_no,'form_id':form_id,'item2A':item2A,'item2B':item2B,'tin':tin,'xml':xml},
        error: function(err){
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success : function(obj){ 
                
        }
    });

    submit(form, data, company);
}

function submitAndSave1707A(form, data, company,form_no,form_id,item1B,item1C,item1D,tin,xml)
{
    save_1707A(form, data);

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/form/"+form+"/xml",
        type: 'POST',
        data: {'company':company,'form_no':form_no,'form_id':form_id,'item1B':item1B,'item1C':item1C,'item1D':item1D,'tin':tin,'xml':xml},
        error: function(err){
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success : function(obj){ 
                
        }
    });

    submit(form, data, company);
}

function save_1702MX(form, data)
{
    $.ajax({
        url : "/form/"+form+"",
        type: 'POST',
        data: data,
        error: function(err){
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success : function(obj){ 
            
            }
        });
}

function save_1707A(form, data,company,form_no,form_id,item1B,item1C,item1D,tin,xml)
{
    $.ajax({
        url : "/form/"+form+"",
        type: 'POST',
        data: data,
        error: function(err){
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success : function(obj){ 
                submit1702A_XML('1707A',company,form_no,form_id,item1B,item1C,item1D,tin,xml);
            }
        });
}

function submit1702MX_XML(form,company,form_no,form_id,item2A,item2B,tin,xml)
{
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/form/"+form+"/xml",
        type: 'POST',
        data: {'company':company,'form_no':form_no,'form_id':form_id,'item2A':item2A,'item2B':item2B,'tin':tin,'xml':xml},
        error: function(err){
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success : function(obj){ 
            $('#successModal').modal('show');
            $('#successModal').find('.message').html('<div class="alert alert-success">BIR Form successfully saved as: '+obj+'</div>')
                  
        }
    });
}

function submit1702A_XML(form,company,form_no,form_id,item1B,item1C,item1D,tin,xml)
{
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/form/"+form+"/xml",
        type: 'POST',
        data: {'company':company,'form_no':form_no,'form_id':form_id,'item1B':item1B,'item1C':item1C,'item1D':item1D,'tin':tin,'xml':xml},
        error: function(err){
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success : function(obj){ 
            $('#successModal').modal('show');
            $('#successModal').find('.message').html('<div class="alert alert-success">BIR Form successfully saved as: '+obj+'</div>')
                  
        }
    });
}

function submit(form, data, company_id)
{
    $.post("/form/"+form+"/update", data).done(function(obj){
        console.log(obj);
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

function saveAndExit1702MX(form, data, company,form_no,form_id,item2A,item2B,tin,xml)
{
    $.ajax({
        url : "/form/"+form+"",
        type: 'POST',
        data: data,
        error: function(err){
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success : function(obj){ 
                
            }
        });

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/form/"+form+"/xml",
        type: 'POST',
        data: {'company':company,'form_no':form_no,'form_id':form_id,'item2A':item2A,'item2B':item2B,'tin':tin,'xml':xml},
        error: function(err){
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success : function(obj){ 
            $('#savedAlertModal').modal('show');
            $('#savedAlertModal').find('.message').html('<div class="alert alert-success">BIR Form successfully saved as: '+obj+'</div>');     
        }
    });
}

function saveAndExit1707A(form, data, company,form_no,form_id,item1B,item1C,item1D,tin,xml)
{
    $.ajax({
        url : "/form/"+form+"",
        type: 'POST',
        data: data,
        error: function(err){
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success : function(obj){ 
                
            }
        });

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url : "/form/"+form+"/xml",
        type: 'POST',
        data: {'company':company,'form_no':form_no,'form_id':form_id,'item1B':item1B,'item1C':item1C,'item1D':item1D,'tin':tin,'xml':xml},
        error: function(err){
            console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
        },
        success : function(obj){ 
            $('#savedAlertModal').modal('show');
            $('#savedAlertModal').find('.message').html('<div class="alert alert-success">BIR Form successfully saved as: '+obj+'</div>');     
        }
    });
}





