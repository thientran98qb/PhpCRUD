$(document).ready(function(){
    $("#addform").submit(function(e){
        e.preventDefault();
        user_id=$("#userid").val();
        $.ajax({
            url:"http://localhost:8080/PhpCRUD/index.php",
            type: "POST",
            dataType: "text",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success:function(rows){
                console.log(rows);
            },
            error:function(){
                console.log("Something went wrong");
            }
        });
    });
});