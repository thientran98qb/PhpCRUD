$(document).ready(function(){
    $("#addform").submit(function(e){
        e.preventDefault();
        product_name=$("#productname").val();
        product_description=$("#productdescription").val();
        product_img=$("#productimg").val();
        product_date_created=$("#productdate").val();
        user_id=$("#userid").val();
        $.ajax({
            url:"http://localhost:8080/PhpCRUD/index.php",
            type: "POST",
            dataType: "text",
            data: {actionn:"addProductAjax",product_name:product_name,product_description:product_description,product_img:product_img,product_date_created:product_date_created,user_id:user_id},
            success:function(rows){
                console.log(rows);
            },
            error:function(){
                console.log("Something went wrong");
            }
        });
    });
});