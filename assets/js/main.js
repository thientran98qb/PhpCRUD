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
            <a href="#" class="btn btn-success mr-3 profile" data-productid="${product.product_id}" data-toggle="modal" data-target="#userViewModal" title="DetailProduct"><i class="fa fa-address-card-o" aria-hidden="true"></i></a>
            <a href="#" class="btn btn-warning mr-3 editproduct" data-productid="${product.product_id}" data-toggle="modal" data-target="#userModal" title="Edit"><i class="fa fa-pencil-square-o fa-lg"></i></a>
            <a href="#" class="btn btn-danger deleteproduct" data-productid="${product.product_id}" title="Delete"><i class="fa fa-trash-o fa-lg"></i></a>
        </td>
        </tr>`;
    }
    return productRow;
}
function pagination(totapages,currentPage){
    var prePage=currentPage-1;
    var paginatePage="";
    if(totapages>1){
        paginatePage=` <ul class="pagination">`;      
        if(currentPage>1){
            paginatePage+=`<li class="page-item">
            <a class="page-link" href="" tabindex="-1" data-page=${prePage}>Previous</a>
        </li>`;
        }else{
            paginatePage+=`<li class="page-item disabled">
            <a class="page-link" href="" tabindex="-1">Previous</a>
            </li>`;
        }
        for(let i=1;i<=totapages;i++){
            var activeClass=(currentPage == i) ? 'active' : ''; 
            paginatePage+=`<li class="page-item ${activeClass}"><a class="page-link" href="" data-page=${i}>${i}</a></li>`;
        }   
        var disabledClass=(currentPage>= totapages) ? 'disabled' : '';
        paginatePage+=`<li class="page-item ${disabledClass}">
            <a class="page-link" href="#" data-page="${++currentPage}">Next</a></li>`;
        paginatePage+= `</ul>`;   
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
            if(rows){
                $.each(rows.product,function(index,value){
                    productRows+=getProduct(value);
                });
                $("#productstable tbody").html(productRows);
                
                var totalProduct=rows.count;
                let perPage=4;
                let totolPage = Math.ceil(parseInt(totalProduct)/perPage);
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
    //show detail product 
    $(document).on("click",".profile",function(e){
        product_id=$(this).data("productid");
        console.log(product_id);
    });
    //show interface edit form 
    $(document).on("click",".editproduct",function(e){
        product_id=$(this).data("productid");
        $.ajax({
            url:"http://localhost:8080/PhpCRUD/index.php",
            type:"GET",
            dataType:"JSON",
            data:{product_id:product_id,actionn:"editproduct"},
            success:function(rows){
                if(rows){
                    $("#productname").attr("value",rows.row.product_name);
                    $("#productdescription").val(rows.row.product_description);
                    $("#productdate").attr("value",rows.row.product_date_created);
                    $("#nameFile").html("<img src='uploads/"+rows.row.product_img+"' class='img-thumbnail rounded float-left'>");
                }
            },
            error:function(){
                console.log("not exist");
            }
        });
    });
    $(document).on("click",".deleteproduct",function(){
        product_id=$(this).data("productid");
        // console.log(product_id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url:"http://localhost:8080/PhpCRUD/index.php",
                    type:"GET",
                    dataType:"JSON",
                    data:{product_id:product_id,actionn:"deleteproduct"},
                    success:function(dataa){
                        if(dataa.delete === true){
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                            // loadProduct();
                        }else{
                            Swal.fire(
                                'Not delete!',
                                'Your file has not been deleted.',
                                'fairlue'
                            )
                        }
                        loadProduct();
                    },
                    error:function(){
                        console.log("error");
                    }
                });
            }
        })
    });
    $(document).on("click","#addnewbtn", function () {
        $("#addform")[0].reset();
        $("#productname").val("");
        $("#productdescription").val("");
        $("#productdate").val("");
        $("#nameFile").remove();
    });
    loadProduct();
});