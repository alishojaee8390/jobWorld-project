<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="kewords" content="<?= $setting['keywords'] ?>">
    <title><?= $setting['title'] ?></title>
    <link rel="shortcut icon" href="<?= asset($setting['icon']) ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= asset('public/css/style.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/css/responsive.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/css/animate.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/css/owl.theme.default.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/jalalidatepicker/persian-datepicker.min.css') ?>">



</head>

<body>

    <!-- header start -->


    <!-- nav top start -->
    <section class="nav-top d-none d-md-block" style="background-color: #2FDB40 !important;">
        <div class="container-fluid">
            <div class=" d-flex justify-content-between mx-5 justify-content-center align-items-center py-1">
                <div class="nav-top-contact">
                    <span class="text-white "><?= $setting['phone'] ?><i class="fa fa-mobile mx-2"></i></span>
                    <span class="text-white"><?= $setting['email'] ?><i class="fa fa-envelope mx-2"></i></span>
                </div>
                <div class="nav-top-logo d-none d-md-block">
                    <span class="text-white">کارتو بسپار به <span
                            class="logo-job"><?= $setting['title'] ?></span></span>
                </div>
                <div class="nav-top-social d-none  d-lg-block">
                    <a href="<?= $setting['instagram'] ?>"><i class="fab fa-instagram  px-2 text-danger"></i></a>
                    <a href="<?= $setting['telegram'] ?>"><i class="fab fa-telegram  px-2 text-primary"></i></a>
                    <a href="<?= $setting['linkedin'] ?>"><i class="fab fa-linkedin-in  px-2 text-primary"></i></a>
                    <a href="<?= $setting['twitter'] ?>"><i class="fab fa-twitter  px-2 text-primary"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- end of nav top -->




    <!-- navbar start -->

    <nav class="navbar navbar-expand-lg  shadow-sm ">

        <div class="container-fluid">
            <!-- start navbar menu mobile -->
            <button class="btn d-md-block d-lg-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                    class="fa fa-bars fa-xl"></i></button>

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 id="offcanvasRightLabel"> <a class="navbar-brand text-secondary" href="<?= url('/') ?>">
                            <!-- <span class="fs-1">Job</span>World</a></h5> -->
                            <img src="<?= asset($setting['logo']) ?>" class="img-fluid" alt="">
                    </h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body text-black-50">
                    <div class="collapse navbar-collapse align-items-center d-block">
                     
                        <ul class="navbar-nav mt-2 mb-2 mb-lg-0 p-0">
                    <li class="nav-item">
                        <a class="nav-link text-secondary active" aria-current="page" href="<?= url('/') ?>">خانه</a>
                    </li>

                    <?php foreach ($menus as $menu) {
                        if ($menu['parent_id'] == null) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" aria-current="page"
                            href="<?= url($menu['url']) ?>"><?= $menu['name'] ?>

                        </a>
                    </li>

                    <?php }
                    }
                    foreach ($menus as $subMenu) {
                        if ($subMenu['parent_id'] == $menu['id']) {
                        ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle  text-secondary" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">

                            <?= $menu['name']  ?>
                        </a>
                        <ul class="dropdown-menu shadow-sm py-3">

                            <li><a class="dropdown-item" href="<?= $subMenu['url'] ?>"><?= $subMenu['name'] ?></a>
                            </li>

                        </ul>
                    </li>
                    <?php }
                    } ?>




                </ul>
                        <div class="nav-top-contact text-center mt-3">
                            <span class="text-danger "><?= $setting['phone'] ?><i class="fa fa-mobile mx-2"></i></span>
                            <span class="text-danger"><?= $setting['email'] ?><i class="fa fa-envelope mx-2"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end of navbar menu mobile -->
            <a class="navbar-brand text-secondary" href="<?= url('/') ?>"><img src="<?= asset($setting['logo']) ?>"
                    alt="logo" width="100"></a>
            <div class="collapse navbar-collapse align-items-center">
                <ul class="navbar-nav mt-2 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-secondary active" aria-current="page" href="<?= url('/') ?>">خانه</a>
                    </li>

                    <?php foreach ($menus as $menu) {
                        if ($menu['parent_id'] == null) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" aria-current="page"
                            href="<?= url($menu['url']) ?>"><?= $menu['name'] ?>

                        </a>
                    </li>

                    <?php }
                    }
                    foreach ($menus as $subMenu) {
                        if ($subMenu['parent_id'] == $menu['id']) {
                        ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle  text-secondary" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">

                            <?= $menu['name']  ?>
                        </a>
                        <ul class="dropdown-menu shadow-sm py-3">

                            <li><a class="dropdown-item" href="<?= $subMenu['url'] ?>"><?= $subMenu['name'] ?></a>
                            </li>

                        </ul>
                    </li>
                    <?php }
                    } ?>




                </ul>
            </div>
            <div class="btn-register-login me-auto d-flex align-items-center">
                <i class="far fa-user text-secondary fa-xl ms-2 "></i>
                <?php
                // dd($_SESSION['user'][1] == 'admin');
                if (isset($_SESSION['user'])) {

                ?>

                <?php if ($_SESSION['user'][1] == 'admin') { ?>
                <a href="<?= url('admin') ?>" class="btn-login btn px-4  ms-1 btn-outline-success">ورود به پنل
                    ادمین</a>

                <?php } else { ?>
                <a href="<?= url('panel') ?>" class="btn-login btn px-4  ms-1 btn-outline-success">ورود به پنل
                    کاربری</a>
                <?php } ?>




                <?php } else {  ?>
                <a href="<?= url('login') ?>" class="btn-login btn px-4  ms-1 btn-outline-success">ورود</a>
                <a href="<?= url('register') ?>" class="btn-register btn px-4 ms-1  text-white">ثبت نام</a>
                <?php } ?>
            </div>
        </div>
    </nav>

    <!-- end of navbar -->