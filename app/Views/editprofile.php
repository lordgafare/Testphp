<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">
</head>

<body>
    <?= $this->include('Layouts/Navbar'); ?>
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success"><?= session('success') ?></div>
    <?php endif; ?>

    <?php if (session()->has('error')) : ?>
        <div class="alert alert-danger"><?= session('error') ?></div>
    <?php endif; ?>
    <?php
    helper('form');
    ?>

    <?= form_open("/editprofile/update/{$user['id']}", ['enctype' => 'multipart/form-data']) ?>
    <section className="content-header">
        <div class="mt-3">
            <div>
                <label for="username">ชื่อผู้ใช้:</label>
                <input type="text" name="username" id="username" class="form-control" value="<?= old('username', $user['username']) ?>" required>
            </div>
            <br>
            <div>
                <label for="email">อีเมล:</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= old('email', $user['email']) ?>" required>
            </div>
            <br>
            <div>
                <label for="image_path">รูปภาพ:</label>
                <br>
                <img src="<?= base_url('uploads/' . $user['image_path']) ?>" width="300px">
                <br>
                <input type="file" name="image_path" id="image_path" class="form-control">
            </div>
            <br>
            <button type="submit" class="btn btn-success">บันทึก</button>
        </div>
    </section>
    <?= form_close() ?>
    <?= $this->include('Layouts/Footer'); ?>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
</body>

</html>