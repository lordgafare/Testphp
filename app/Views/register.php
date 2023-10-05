<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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
                <h1>Sign up</h1>
                <hr>
                <?php if(isset($validation)): ?>
                    <div class="alert alert-danger">
                        <?= $validation->listErrors() ?>
                    </div>
                <?php endif; ?>
                <form id="register" action="/register/save" method="post" name="register">
                    <div class="form-group">
                        <label for="inputname">
                            Name
                        </label>
                        <input type="text" name="username" id="inputforname" class="form-control" value="<?= set_value('username'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputemail">
                            Email
                        </label>
                        <input type="email" name="email" id="inputforemail" class="form-control" value="<?= set_value('email'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputpassword">
                            Password
                        </label>
                        <input type="password" name="password" id="inputforpassword" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="inputconfpassword">
                            Confirm Password
                        </label>
                        <input type="password" name="confpassword" id="inputforconfpassword" class="form-control" >
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" value="Register" class="btn btn-success">
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
        $(document).ready(function() {
            if ($('#add-form').length > 0) {
                $('#add-form').validate({
                    rules: {
                        name: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true,
                            maxlength: 60
                        }
                    },
                    messages: {
                        name: {
                            required: 'Please enter name'
                        },
                        email: {
                            required: 'Please enter email',
                            email: 'Please enter a valid email',
                            maxlength: 'Maximum length is 60'
                        }
                    }
                });
            }
        });
    </script>

</body>

</html>