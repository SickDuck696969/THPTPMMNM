<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách sản phẩm</title>
        <link rel="stylesheet" href="/PhamTrongPhuoc/public/css/redhood-theme.css">
    </head>
    <body>
        <h1>Danh sách sản phẩm</h1>
        <a href="/PhamTrongPhuoc/Product/add">Thêm sản phẩm</a>
        <ul>
            <?php foreach ($products as $product):?>
                <li>
                    <h2><?php echo htmlspecialchars($product->getName(),ENT_QUOTES,'UTF-8');?></h2>
                    <p><?php echo htmlspecialchars($product->getDescription(),ENT_QUOTES,'UTF-8');?></p>
                    <p>Giá: <?php echo htmlspecialchars($product->getPrice(),ENT_QUOTES,'UTF-8');?></p>
                    <a href="/PhamTrongPhuoc/Product/edit/<?php echo $product->getID();?>">Sửa</a>
                    <a href="/PhamTrongPhuoc/Product/delete/<?php echo $product->getID();?>" onclick="return confirm('Bạn có chắc muốn xoá không?');">Xóa</a>
                </li>
            <?php endforeach;?>
        </ul>
    </body>
</html>