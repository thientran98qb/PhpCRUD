<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
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
            <tr></tr>
        <tfoot>
        </tfoot>
    </table>
</body>
</html>