<?php include_once DOCUMENT_ROOT. "/views/layouts/header.php"; ?>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <td>Stt</td>
                    <td>User Name</td>
                    <td>Thumb</td>
                    <td>Phone</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userList as $key => $value) {  ?>
                <tr>
                    <td><?php echo $value['id']; ?></td>
                    <td><?php echo $value['user_name']; ?></td>
                    <td><?php echo $value['user_img']; ?></td>
                    <td><?php echo $value['user_phone']; ?></td>
                </tr>
                <?php }?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
<?php include_once DOCUMENT_ROOT. "/views/layouts/footer.php"; ?>