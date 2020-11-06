$(document).ready(function(){
    $("#form_Login").submit(function(e) {
        username=$("#username").val();
        password=$("#password").val();
        repassword=$("#repassword").val();
        fullname=$("#fullname").val();
        if((username=='' && password=='')){
            e.preventDefault();
            $("#error_username").addClass("error");
            $("#error_pass").addClass("error");
            $("#error_username").html('Username Invalid');
            $("#error_pass").html('Password Invalid');
        }else{
            if(username==''){
                e.preventDefault();
                $("#error_username").addClass("error");
                $("#error_username").html('Username Invalid');
            }else{
                $("#error_username").removeClass("error");
                $("#error_username").remove();
            }
            if(password==''){
                e.preventDefault();
                $("#error_pass").addClass("error");
                $("#error_pass").html('Password Invalid');
            }else{
                $("#error_pass").removeClass("error");
                $("#error_pass").remove();
            }
        } 
    });
    $("#form_register").submit(function(e) {
        username=$("#username").val();
        password=$("#password").val();
        repassword=$("#repassword").val();
        fullname=$("#fullname").val();
        if(username=='' && password=='' && repassword==''&& fullname==''){
            e.preventDefault();
            $("#error_username").addClass("error");
            $("#error_pass").addClass("error");
            $("#error_repass").addClass("error");
            $("#error_fullname").addClass("error");
            $("#error_username").html('Username Invalid');
            $("#error_fullname").html('Fullname Invalid');
            $("#error_pass").html('Password Invalid');
            $("#error_repass").html('Re Password Invalid');
        }else if(password!==repassword){
            e.preventDefault();
            $("#error_repass").addClass("error");
            $("#error_repass").html('Re Password Not Match');
        }else
        {
            if(username==''){
                e.preventDefault();
                $("#error_username").addClass("error");
                $("#error_username").html('Username Invalid');
            }else{
                $("#error_username").removeClass("error");
                $("#error_username").remove();
            }
            if(password==''){
                e.preventDefault();
                $("#error_pass").addClass("error");
                $("#error_pass").html('Password Invalid');
            }else{
                $("#error_pass").removeClass("error");
                $("#error_pass").remove();
            }
            if(repassword==''){
                e.preventDefault();
                $("#error_repass").addClass("error");
                $("#error_repass").html('Re Password Invalid');
            }else{
                $("#error_repass").removeClass("error");
                $("#error_repass").remove();
            }
            if(fullname==''){
                e.preventDefault();
                $("#error_fullname").addClass("error");
                $("#error_fullname").html('Re Password Invalid');
            }else{
                $("#error_fullname").removeClass("error");
                $("#error_fullname").remove();
            }
        } 
        
    });
});