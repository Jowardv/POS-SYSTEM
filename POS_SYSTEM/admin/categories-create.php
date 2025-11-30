<?php include('../config/function.php'); ?>
<?php include('../includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
            <h4>
                Add Category
                <a href="categories.php" class="btn btn-danger float-end">Back</a>
            </h4>
        </div>

        <div class="card-body">
            <form action="code.php" method="POST">

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" required class="form-control" />
                </div>

                <div class="mb-3">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label>Status (0 = Visible, 1 = Hidden)</label>
                    <input type="checkbox" name="status" value="1">
                </div>

                <button type="submit" name="saveCategory" class="btn btn-primary">Save</button>

            </form>
        </div>
    </div>
</div>

<?php include('../includes/footer.php'); ?>
