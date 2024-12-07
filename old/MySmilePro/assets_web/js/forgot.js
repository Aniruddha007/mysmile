var regEmail = RegExp(/^[a-zA-Z0-9_.]+@[a-zA-Z]+?\.[a-zA-Z]{2,3}$/);
$('body').on('click', '.user-forgot', function(e) {
    e.preventDefault();
    var $this = $(this);
    var reset = $(this).attr('reset');
    var email = $.trim($('body').find('[name="user_email"]').val());
    var otp   = $.trim($('body').find('[name="otp"]').val());
    var user_password = $.trim($('body').find('[name="user_password"]').val());
    var ischeck = false;

    if (email == '') {        
        showMessage('alert-danger', 'Please enter your email address.');
        ischeck = false;
    } else if (!regEmail.test(email)) {
        showMessage('alert-danger', 'Invalid email address.');
        ischeck = false;
    } else {
        $('body').find('[name="pick_up_email"]').parent('.group').next('span').text('');
        ischeck = true;
    }


    if (ischeck) {

        if (reset == 'reset') {
        var data = {
            "user_email": email
        }


        $.ajax({
            url: siteUrl+'home/forgotpassword',
            method: 'POST',
            data: data,
            success: function(response) {
            var response = JSON.parse(response);
            if (response.status == 'OK') {

            showMessage('alert-success', response.msg);
            
            setTimeout(function(){ 
                window.location.href = siteUrl+'home/view_page/login';
            }, 3000);


            // $this.attr('reset','OTP');

            // var html =  `
            //                 <div class="form-row">
            //                     <div class="col-lg-6 form-group">
            //                       <label>OTP:</label>
            //                           <i class="fa fa-envelope-o" aria-hidden="true"></i>
            //                           <input type="text" class="form-control" name="otp" placeholder="Enter Otp ****** " />
            //                     </div>

            //                     <div class="col-lg-6 form-group">
            //                       <label>Password:</label>
            //                          <i class="fa fa-unlock-alt" aria-hidden="true"></i>
            //                          <input type="password" class="form-control" placeholder="******" name="user_password" />
            //                 </div>

            //                 </div>

            //             `;

            // $('body').find('.forgot-otp-none').html(html);
        } else {
            showMessage('alert-danger', response.msg);

        }

        }
    })


    }else{
        var data = {
            "user_email": email,
            "otp": otp,
            "password": user_password,
        }


        $.ajax({
            url: siteUrl+'home/reset_password',
            method: 'POST',
            data: data,
            success: function(responseData) {
            var responseObj = JSON.parse(responseData);
          
            if (responseObj.status == 'OK') {
                $.trim($('body').find('[name="user_email"]').val(''));
                showMessage('alert-success', responseObj.msg);
                $this.attr('reset','reset');
                $('body').find('.forgot-otp-none').html('');
            } else {
                showMessage('alert-danger', responseObj.msg);
            }

        }
    })



    }

    } else {

        return false;

    }



})





$('body').find("input").focus(function() {
    $('.error').text('');
});