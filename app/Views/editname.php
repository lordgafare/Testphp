<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addnaja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css" rel="stylesheet">
<style>
    .error{
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
        <h1>CodeIgniter CRUD</h1>
        <hr>
        <div class="mt-3">
            <form id="update-form" action="<?= site_url('/update'); ?>" method="post" name="update_user">
              <input type="hidden" name="id" id="id" value="<?php echo $user_obj['id']; ?>">  
            <div class="form-group">
                    <label for="name">
                        Name
                    </label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $user_obj['name']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">
                        Email
                    </label>
                    <input type="text" name="email" id="email" class="form-control"value="<?php echo $user_obj['email']; ?>">
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" value="Update Data" class="btn btn-primary mt-2">
                </div>
            </form>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>
        $(document).ready(function() {
            if ($('#update-form').length > 0) {
                $('#update-form').validate({
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