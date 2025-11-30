<?php
    include('../middleware/adminMiddleware.php');
    include('includes/header.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $category = getByID("categories", $id);

        if (mysqli_num_rows($categories) > 0) {
            $data = mysqli_fetch_array($categories);
        } else {
            echo "<h4>No Record Found</h4>";
            die();
        }
    } else {
        echo "<h4>Id Missing from URL</h4>";
        die();
    }
?>

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Edit Category
                <a href="categories.php" class="btn btn-primary float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">

            <form action="code.php" method="POST">
                <input type="hidden" name="categoryId" value="<?= $data['id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Name *</label>
                    <input type="text" name="name" value="<?= $data['name']; ?>" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="3" class="form-control"><?= $data['description']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">
                        Status (Unchecked = Visible, Checked = Hidden)
                    </label><br>

                    <input type="checkbox" name="status" 
                        <?= $data['status'] == "1" ? "checked" : "" ?> 
                        style="width:30px; height:30px;">
                </div>

                <div class="mb-3">
                    <button type="submit" name="update_category" class="btn btn-primary float-end">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
