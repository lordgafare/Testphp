<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset your password</title>
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
        <h1>Reset your password</h1>
        <hr>
        <div class="mt-3">
            <form id="email-form" method="post" action="<?= site_url('reset_password/reset'); ?>">
                <div class="form-group">
                    <input type="hidden" name="token" value="<?= $token; ?>">
                    <label for="password">
                        Password
                    </label>
                    <input type="password" name="password" id="password" placeholder="Enter new password" class="form-control">
                </div>

                <label for="confirm_password">
                    Confirm Password
                </label>
                <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm new password" class="form-control">
                <br>
                <div class="form-group">
                    <input type="submit" value="Reset Password " class="btn btn-success">
                </div>
            </form>




        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>