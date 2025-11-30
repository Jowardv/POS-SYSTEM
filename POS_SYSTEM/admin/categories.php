<?php
include('../config/function.php');
?>

<?php include('../includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
            <h4 class="mb-0">
                Categories
                <a href="categories-create.php" class="btn btn-primary float-end">Add Category</a>
            </h4>
        </div>

        <div class="card-body">
            <?php alertMessage(); ?>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $categories = getAll("categories");
                        if ($categories && mysqli_num_rows($categories) > 0):
                            foreach ($categories as $item):
                        ?>
                            <tr>
                                <td><?= $item['id']; ?></td>
                                <td><?= $item['name']; ?></td>
                                <td><?= $item['description']; ?></td>
                                <td><?= $item['status'] == 0 ? "Visible" : "Hidden"; ?></td>
                                <td>
                                    <a href="categories-edit.php?id=<?= $item['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                    <a href="categories-delete.php?id=<?= $item['id']; ?>" 
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Delete this category?');">
                                       Delete
                                    </a>
                                </td>
                            </tr>
                        <?php
                            endforeach;
                        else:
                        ?>
                            <tr>
                                <td colspan="5" class="text-center">No record found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
