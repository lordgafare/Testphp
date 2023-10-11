<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgot password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">

</head>

<body>
    <div class="container mt-4">
        <h1>Forgot Password</h1>
        <hr>
        <?php if (session('success')) : ?>
            <div class="alert alert-success"><?= session('success'); ?></div>
        <?php endif; ?>

        <?php if (session('error')) : ?>
            <div class="alert alert-danger"><?= session('error'); ?></div>
        <?php endif; ?><!--  -->
        <div class="mt-3">
            <form method="post" action="<?= site_url('forgot_password/send_reset_link'); ?>">
                <div class="form-group">
                    <label for="email">
                        กรอกอีเมลเพื่อรับลิงก์รีเซ็ตรหัสผ่าน
                    </label>
                    <input type="text" name="email" id="email" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" value="Send Reset Link" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>