<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e73ec64d5b.js" crossorigin="anonymous"></script>    <title>Supplies</title>
    <link rel="stylesheet" href="supplies.css">
    
</head>
<body>
    
    <?php
        require_once ('../header/header.php');
    ?>

    <div class="wrapper">
    <div class="container mt-4">
        <h1 class="display-4 text-center"><i class="fa-solid fa-boxes-packing"></i> My <span class="supplies">Supplies</span>List</h1>
        <form action="" id="supply-form" onsubmit="return false">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Supplier Name</label>
                <input type="text" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="price">Price ($)</label>
                <input type="number" id="price" class="form-control">
            </div>
            <input value= "Add Supply" type="submit" class="btn btn-primary btn-block">
        </form>
        <table class="table table-striped mt-5">
            <thread>
                <tr>
                    <th>Title</th>
                    <th>Supplier Name</th>
                    <th>Price ($)</th>
                    <th></th>
                </tr>
            </thread>
            <tbody id="supply-list">
            </tbody>
        </table>

    </div>
</div>

    <script src="supply.js"></script>

</body>
</html>