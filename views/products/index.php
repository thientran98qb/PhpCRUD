<?php include_once DOCUMENT_ROOT. "/views/layouts/header.php"; ?>
    <div class="container">
        <div class="addNew m-2">
            <a href="" class="btn btn-primary">Add Product</a>
        </div>
        <table class="table" id="userstable">
            <thead>
                <tr>
                    <th scope="col">Stt</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Date Created</th>
                    <th scope="col">Creator</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($product as $key => $value) {?>
                <tr> 
                    <?php $i=0; ?>       
                    <td><?php echo ++$i; ?></td>
                    <td class="align-middle"><img src="http://placehold.it/80x80" class="img-thumbnail rounded float-left"></td>
                    <td class="align-middle"><?php echo $value['product_name']; ?></td>
                    <td class="align-middle"><?php echo $value['product_description']; ?></td>
                    <td class="align-middle"><?php echo $value['product_date_created']; ?></td>
                    <td class="align-middle"><?php echo $value['user_fullname']; ?></td>
                    <td class="align-middle">
                        <a href="#" class="btn btn-success mr-3 profile" data-toggle="modal" data-target="#userViewModal" title="Prfile"><i class="fa fa-address-card-o" aria-hidden="true"></i></a>
                        <a href="#" class="btn btn-warning mr-3 edituser" data-toggle="modal" data-target="#userModal" title="Edit"><i class="fa fa-pencil-square-o fa-lg"></i></a>
                        <a href="#" class="btn btn-danger deleteuser" data-userid="14" title="Delete"><i class="fa fa-trash-o fa-lg"></i></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table><!-- table -->
    </div>
<?php include_once DOCUMENT_ROOT. "/views/layouts/footer.php"; ?>