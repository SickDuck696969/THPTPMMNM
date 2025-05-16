<!DOCTYPE html>
<html>
    <head>
        <title>Thêm sản phẩm</title>
        <link rel="stylesheet" href="/PhamTrongPhuoc/public/css/redhood-theme.css">
        <script>
            function validateForm(){
                let name = document.getElementById('name').value;
                let price = document.getElementById('price').value;
                let error = [];
                if(name.length < 10 || name.length > 100){
                    error.push('Tên sản phẩm phải từ 10 đến 100 ký tự');
                }
                if(price <= 0 || isNaN(price)){
                    error.push('Giá sản phẩm phải là số dương');
                }
                if(error.length > 0){
                    alert(errors.join('\n'));
                    return false;
                }
                return true;
            }
        </script>
    </head>
    <body>
        <h1>Thêm sản phẩm</h1>
        <?php if (!empty($error)):?>
            <ul>
                <?php foreach ($error as $error):?>
                    <li><?php echo htmlspecialchars($error, ENT_QUOTES,'UTF-8');?></li>
                <?php endforeach;?>
            </ul>
        <?php endif;?>
        <form method = "POST" action = "/PhamTrongPhuoc/Product/add" onsubmit = "return validateForm();">
            <label for = "name">Tên sản phẩm:</label>
            <input type="text" id = "name" name = "name" required><br><br>
            <label for = "description">Mô tả:</label>
            <textarea id = "description" name = "description" required></textarea><br><br>
            <label for = "price">Giá:</label>
            <input type="number" id = "price" name = "price" step="0.01" required><br><br>
            <button type="submit">Thêm sản phẩm</button>
        </form>
        <a href="/PhamTrongPhuoc/Product/list">Quay lại danh sách sản phẩm</a>
    </body>
</html>