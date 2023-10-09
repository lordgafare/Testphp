<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">

</head>
<?= $this->include('Layouts/Navbar'); ?>

<body>
    <div class="container mt-4">
        <h1>CodeIgniter CRUD</h1>
        <hr>
        <div class="d-flex justify-content-end">
            <a href="<?php echo site_url('/addname'); ?>" class="btn btn-primary">Add a name & email</a>
        </div>
        <div class="mt-3">
            <table class="table table-bordered" id="users-list">
                <thead>
                    <tr>
                        <th>User Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($users) : ?>
                        <?php foreach ($users as $users) { ?>
                            <tr>
                                <td><?php echo $users['id']; ?></td>
                                <td><?php echo $users['name']; ?></td>
                                <td><?php echo $users['email']; ?></td>
                                <td>
                                    <a href="<?php echo base_url('/editname/' . $users['id']); ?>" class="btn btn-primary">Edit</a>
                                        <a href="<?php echo base_url('/delete/' . $users['id']); ?>" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?= $this->include('Layouts/Footer'); ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#users-list').DataTable();

        })
    </script>
</body>

</html>