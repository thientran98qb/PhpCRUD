function getProduct(product){
    if(product){
        var productRow=`<tr> 
        <td class="align-middle">${product.product_id}</td>
        <td class="align-middle"><img src="uploads/${product.product_img}" class="img-thumbnail rounded float-left"></td>
        <td class="align-middle">${product.product_name}</td>
        <td class="align-middle">${product.product_description}</td>
        <td class="align-middle">${product.product_date_created}</td>
        <td class="align-middle">${product.user_fullname}</td>
        <td class="align-middle">
            <a href="#" class="btn btn-success mr-3 profile" data-toggle="modal" data-target="#userViewModal" title="Prfile"><i class="fa fa-address-card-o" aria-hidden="true"></i></a>
            <a href="#" class="btn btn-warning mr-3 edituser" data-toggle="modal" data-target="#userModal" title="Edit"><i class="fa fa-pencil-square-o fa-lg"></i></a>
            <a href="#" class="btn btn-danger deleteuser" data-userid="14" title="Delete"><i class="fa fa-trash-o fa-lg"></i></a>
        </td>
        </tr>`;
    }
    return productRow;
}
function pagination(totapages,currentPage){
    var paginatePage="";
    if(totapages>1){
        paginatePage=` <ul class="pagination">
        <li class="page-item disabled">
            <a class="page-link" href="" tabindex="-1">Previous</a>
        </li>`;
        for(let i=1;i<=totapages;i++){
            paginatePage+=`<li class="page-item"><a class="page-link" href="" data-page=${i}>${i}</a></li>`;
        }       
            paginatePage+=`<li class="page-item">
                <a class="page-link" href="#">Next</a>
                </li>
            </ul>`;
    }
    $("#paginate").html(paginatePage);
}
function loadProduct(){
    var currentPage=$("#currentpage").val();
    $.ajax({
        url:"http://localhost:8080/PhpCRUD/index.php",
        type:"GET",
        dataType:"JSON",
        data:{currentPage:currentPage,actionn:"getProduct"},
        success:function(rows){
            var productRows="";
            console.log(rows);
            if(rows){
                $.each(rows.product,function(index,value){
                    productRows+=getProduct(value);
                });
                $("#productstable tbody").html(productRows);
                
                var totalProduct=rows.count;
                let perPage=4;
                let totolPage = Math.ceil(parseInt(totalProduct)/perPage);
                console.log(totolPage)
                pagination(totolPage,currentPage);
            }   
        }
    });
    
}
$(document).ready(function(){
    $("#addform").submit(function(e){
        e.preventDefault();
        $.ajax({
            url:"http://localhost:8080/PhpCRUD/index.php",
            type: "POST",
            dataType: "json",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success:function(rows){
                if(rows.error==true){
                    console.log(rows)
                    if(rows.error_name){
                        $("#errorProductName").html(rows.error_name);
                    }else{
                        $("#errorProductName").remove();
                    }
                    if(rows.error_desc){
                        $("#errorDesc").text(rows.error_desc);
                    }else{
                        $("#errorDesc").remove();
                    }
                    if(rows.error_file){
                        $("#errorFile").text(rows.error_file);
                    }else{
                        $("#errorFile").remove();
                    }             
                }else{
                    $("#userModal").modal("hide");
                    Swal.fire(
                        'Add new product success',
                        'You clicked the button!',
                        'success'
                    )
                    $("#addform")[0].reset();
                    $("#message").html("Add new product successfully").fadeIn().delay(3000).fadeOut();
                    loadProduct();
                }
            },
            error:function(){
                console.log("Something went wrong");
            }
        });
    });
    $(document).on("click", "ul.pagination li a", function (e) {
        e.preventDefault();
        var $this=$(this);
        let pagenum=$this.data("page");
        $("#currentpage").val(pagenum);
        loadProduct();
      });
    loadProduct();
});