<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <style>
        .error {
            color: red;
            font-style: italic;
            font-weight: bold;
            margin-top: 5px;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h1>Reset password</h1>
                <hr>
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                <form id="reset" action="/reset" method="post" name="reset">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="<?php echo $user_obj['id']; ?>">
                        <div class="form-group">
                            <label for="inputpassword">
                                Password
                            </label>
                            <input type="password" name="password" id="inputforpassword" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputconfpassword">
                                Confirm Password
                            </label>
                            <input type="password" name="confpassword" id="inputforconfpassword" class="form-control">
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="submit" value="reset" class="btn btn-success">
                        </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>

    </script>

</body>

</html>