<?php include_once DOCUMENT_ROOT. "/views/layouts/header.php"; ?>
    <div class="container">
        <div class="addNew m-2">
            <button type="button" class="btn btn-primary" data-toggle="modal" id="addnewbtn" data-target="#userModal">Add Product</button>
        </div>
        <?php include_once DOCUMENT_ROOT."/views/products/add.php"; ?>
        <div class="alert alert-success text-center" id="message" style="display: none;">

        </div>
        <table class="table" id="productstable">
            <thead>
                <tr>
                    <th scope="col">Product code</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Creator</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            
            </tbody>
        </table><!-- table -->
        <nav id="paginate">
           
        </nav>
        <input type="hidden" name="currentpage" id="currentpage" value="1">                     
    </div>
    
    <div id="overlay" style="display:none;">
    <div class="spinner-border text-danger" style="width: 3rem; height: 3rem;"></div>
    <br />
    Loading...
  </div>
<?php include_once DOCUMENT_ROOT. "/views/layouts/footer.php"; ?>