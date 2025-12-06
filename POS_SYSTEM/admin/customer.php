<?php include("includes/header.php"); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">

        <div class="card-header">
            <h4 class="mb-0">Customers
                <a href="customers-create.php" class="btn btn-primary float-end">Add Customer</a>
            </h4>
        </div>

        <div class="card-body">
            <?php alertMessage(); ?>

            <?php
                $customers = getALL('customers');

                if (!$customers) {
                    echo '<h4>Something went wrong</h4>';
                } else {
                    if (mysqli_num_rows($customers) > 0) {
            ?>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($item = mysqli_fetch_assoc($customers)) { ?>
                        <tr>
                            <td><?= $item['id']; ?></td>
                            <td><?= $item['name']; ?></td>
                            <td><?= $item['email']; ?></td>
                            <td><?= $item['phone']; ?></td>

                            <td><?= $item['status'] == "0" ? "Visible" : "Hidden"; ?></td>
                            <td>
                                <a href="customers-edit.php?id=<?= $item['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                <a href="customers-delete.php?id=<?= $item['id']; ?>" 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('are you sure you want to delete this data?')"
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