var baseUrl = $('baseurl').attr('url');
var siteUrl = $('siteurl').attr('url');

function showMessage(messageClass, message){
		$('.alert-box .alert-class').removeClass('alert-success');
		$('.alert-box .alert-class').removeClass('alert-danger');
		$('.alert-box .alert-class').addClass(messageClass);
		$('.alert-box').removeClass('d-none');
		$('.alert-box .d-flex').addClass('flipInX');
		$('.alert-box .alert-message').html(message)



	setTimeout(function(){
		$('.alert-box .d-flex').addClass('flipOutX');
		$('.alert-box .d-flex').removeClass('flipInX');	
	}, 3500)

	setTimeout(function(){		
		$('.alert-box').addClass('d-none');
		$('.alert-box .d-flex').removeClass('flipOutX');
	},4000);

}


function getDataAjax(url,data, method){
        
        var dataToReturn = "";
        $.ajax({
            url     :   siteUrl+'/'+url,
            method  :   method,
            async   :   false,
            cache   :   false,
            data    :   data,
            success :   function(response){
                var responseObj     = $.parseJSON(response);
                dataToReturn        = responseObj;
            }   
        })
        return dataToReturn;
}

function getData(data, method, url){
        var dataToReturn = "";
        $.ajax({
            url     :   siteUrl+url,
            method  :   method,
            async   :   false,
            cache   :   false,
            data    :   data,
            success :   function(response){
                dataToReturn = response;
            }   
        })

        return dataToReturn;
        
    }


$('body').on('click','.course-img',function(){
	$(this).parent().find('[type=file]').trigger('click');
});

$('body').on('change','.uploadedImg',function(e){
	var file 			= this.files[0];
	var fileType 		= file["type"];
	var ValidImageTypes = ["image/gif", "image/jpeg", "image/png"];

	if ($.inArray(fileType, ValidImageTypes) > -1) {
	     var tmppath 	= URL.createObjectURL(e.target.files[0]);
	     $(this).parents('#update-users').find('img').attr('src',tmppath);
	}else{
		showMessage('alert-danger', 'Only Image Allowed');
		$(this).val('');
	}
});


 $('body').on('click','.change_pic',function(){
    $(this).parent().find('.upload_img').trigger('click');
    $('')
    
 });
