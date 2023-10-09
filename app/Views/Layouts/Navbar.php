<style>
    .dropdown-menu.left {
        right: auto;
        left: 0;
        margin-left: -73px;
    }

    .navbar {
        position: fixed;
        width: 100%;
        z-index: 1000;
        /* ค่า z-index สูงกว่าค่าของเนื้อหาในหน้าหลัก */
    }

    .bg-custom-1 {
        background-color: #85144b;
    }

    .bg-custom-2 {
        background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
    }
</style>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<nav class="navbar navbar-dark bg-dark navbar-expand-sm">
    <a class="navbar-brand" href="#">
        <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/logo_white.png" width="30" height="30" alt="logo">
        LordGaFare
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <?= anchor('/', 'Home', ['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= anchor('/hello?name=World', 'Link to Hello', ['class' => 'nav-link', 'target' => '_blank']) ?>
            </li>
            <li class="nav-item">
                <?= anchor('/namelist', 'CRUD', ['class' => 'nav-link', 'target' => '_blank']) ?>
            </li>

            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbar-list-4">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php $session = session(); 
                    $userUpdate = session('userUpdate');?>
    
                        <img src="<?= base_url('uploads/' . $session->get('user_image_path')) ?>" width="40" height="40" class="rounded-circle">
                </a>
                <div class="dropdown-menu left" aria-labelledby="navbarDropdownMenuLink">

                    <p style="text-align: center;"><?= $session->get('name'); ?></p>
                    <img src="<?= base_url('uploads/' . $session->get('user_image_path')) ?>" width="100px" class="rounded-circle mx-auto d-block">
                    <hr>
                    <a class="dropdown-item" href="<?= base_url("/editprofile/{$session->get('id')}") ?>">Edit Profile</a>
                    <?php $userID = strval($session->get('id')); ?>
                    <a class="dropdown-item" href="<?php echo base_url('/resetpassword/' . $userID); ?>">Reset Password</a>
                    <a class="dropdown-item" href="<?= site_url('logout') ?>">Logout</a>
                </div>
        </ul>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>