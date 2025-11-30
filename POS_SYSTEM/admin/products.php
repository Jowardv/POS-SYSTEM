<?php include("includes/header.php"); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">

        <div class="card-header">
            <h4 class="mb-0">Products
                <a href="products-create.php" class="btn btn-primary float-end">Add Product</a>
            </h4>
        </div>

        <div class="card-body">
            <?php alertMessage(); ?>

            <?php
                $products = getALL('products');

                if (!$products) {
                    echo '<h4>Something went wrong</h4>';
                } else {
                    if (mysqli_num_rows($products) > 0) {
            ?>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($item = mysqli_fetch_assoc($products)) { ?>
                        <tr>
                            <td><?= $item['id']; ?></td>
                            <td> 
                                <img src="../<?= $item['image']; ?>" style="width: 50px; height: 50px;" alt="Img">
                            </td>
                            <td><?= htmlspecialchars($item['name']); ?></td>
                            <td><?= $item['status'] == "0" ? "Visible" : "Hidden"; ?></td>
                            <td>
                                <a href="products-edit.php?id=<?= $item['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                <a
                                href="products-delete.php?id=<?= $item['id']; ?>" 
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this image?');"
                                >
                                Delete
                            </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <?php
                    } else {
                        echo '<h4 class="mb-0">No record found</h4>';
                    }
                }
            ?>

        </div>

    </div>

</div>




<?php include("includes/footer.php"); ?>