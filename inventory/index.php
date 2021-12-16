<!doctype html>
<html lang="en">

<?php session_start(); ?>
<?php include('controller/middleware.php'); ?>

<head>
    <?php include('header.php') ?>
</head>

<body>
    <?php include('navbar.php') ?>

    <main role="main " class="container">
        
        <?php include('welcome_message.php') ?>
        
        <?php 
            include('database/inventory.php');

            $data = new Inventory();
        ?>

        <div class="container mt-5">
            <div class="row mb-4">
                <div class="col-12">
                    <h3 class="mb-4">Halo, <?= $_SESSION['name']  ?></h5>
                    <p><a href="create.php">tambah produk</a></p>
                    <p><a href="logout.php">jangan lupa logout</a></p>

                    <h5 class="mb-4">List of Product</h5>

                    <table class="table table-hover ">
                        <thead>
                            <tr>
                                <th scope="col ">Product Name</th>
                                <th scope="col ">Stock</th>
                                <th scope="col ">Expired At</th>
                                <th scope="col ">Created At</th>
                                <th scope="col ">Updated At</th>
                                <th scope="col ">User ID</th>
                                <th scope="col ">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $id=$_SESSION['id'];
                            foreach($data->getAll($id) as $item) { ?>
                            <tr>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['stock'] ?></td>
                                <td><?= $item['expired_at'] ?></td>
                                <td><?= $item['created_at'] ?></td>
                                <td><?= $item['updated_at'] ?></td>
                                <td><?= $item['user_id'] ?></td>
                                <td>
                                    <div class="btn-group " role="group " aria-label="Basic example ">
                                        <a href="edit.php?id=<?= $item['id'] ?>" class="btn btn-info text-white ">
                                            <i class="bx bx-pencil"></i>
                                        </a>
                                        <form onsubmit="return confirm('Do you really want to delete item?')" action="controller/inventory.php?id=<?= $item['id'] ?>&action=delete" method="POST">
                                            <button type="submit" class="btn btn-danger text-white">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                            
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php include('footer.php') ?>

    <?php include('scripts.php') ?>
</body>

</html>