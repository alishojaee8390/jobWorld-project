<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jobWrold | داشبورد</title>
    <link rel="stylesheet" href="<?= asset('public/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/css/user-panel.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/css/responsive.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/jalalidatepicker/persian-datepicker.min.css') ?>">

</head>

<body style="background-color: whitesmoke;">




    <nav class="navbar navbar-collapse p-0">

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 id="offcanvasRightLabel"></h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-0">
                <div class="user-panel-sidebar  d-flex flex-column vh-100 ">

                    <div class="logo">
                        <h3 class="text-center">Job<span>World</span></h3>
                    </div>
                    <div class="user-status d-flex  justify-content-between align-items-center">
                        <span class="text-white">علی شجاعی</span>
                        <span>آنلاین</span>
                    </div>
                    <div class="menu mt-4">
                        <?php


                        ?>
                        <ul class="list-unstyled pe-0">

                            <li class="nav-item "><a href="<?= url('panel') ?>" class="nav-link text-white"><i
                                        class="fa fa-home ms-3"></i>داشبورد</a></li>
                            <li class="nav-item"><a href="<?= url('panel/account') ?>" class="nav-link text-white"><i
                                        class="fa fa-user ms-3"></i>حساب کاربری</a></li>
                            <li class="nav-item"><a href="<?= url('panel/edit-profile') ?>"
                                    class="nav-link text-white"><i class="fa fa-user-circle ms-3"></i>ویرایش پروفایل</a>
                            </li>
                            <?php if ($user['activity_user'] === 'freelancer') { ?>
                                <li class="nav-item"><a href="<?= url('show-projects') ?>" class="nav-link text-white"><i
                                            class="fa fa-clipboard-list ms-3"></i>پروژه ها</a></li>
                            <?php } else {
                            ?>
                                <li class="nav-item"><a href="<?= url('panel/create-project') ?>" class="nav-link text-white"><i
                                            class="fa fa-plus ms-3"></i>ایجاد پروژه</a></li>
                                <li class="nav-item"><a href="<?= url('panel/projects') ?>" class="nav-link text-white"><i
                                            class="fa fa-clipboard-list ms-3"></i>پروژه های ایجاد شده</a></li>
                            <?php } ?>
                            <li class="nav-item"><a href="<?= url('panel/balance') ?>" class="nav-link text-white"><i
                                        class="fa fa-dollar ms-3"></i>حساب</a></li>
                            <li class="nav-item"><a
                                    href="<?= url('panel/ticket') ?>" class="nav-link text-white"><i
                                        class="fa fa-headset ms-3"></i>تکیت</a></li>

                        </ul>
                    </div>
                    <div class="btn-exit text-center d-flex align-items-end h-100 justify-content-center">
                        <ul class="list-unstyled pe-0 w-100">
                            <li class="nav-item ">
                                <a href="<?= url('logout') ?>" class="nav-link d-flex align-items-center text-white"><i
                                        class="fa fa-sign-out ms-3"></i>خروج </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="row w-100 m-0">
            <div class="col-xl-2 col-md-4 col-lg-4 p-0 fixed-top">
                <div class="user-panel-sidebar  flex-column vh-100 d-none d-md-flex ">

                    <div class="logo">
                        <h3 class="text-center">Job<span>World</span></h3>
                    </div>
                    <div class="user-status d-flex  justify-content-between align-items-center">

                        <span class="text-white"><?= $user['first_name'] . ' ' . $user['last_name'] ?></span>
                        <span>آنلاین</span>
                    </div>
                    <div class="menu mt-4">

                        <ul class="list-unstyled pe-0">
                            <li class="nav-item"><a href=" <?= url('panel') ?>" class="nav-link text-white"><i
                                        class="fa fa-home ms-3"></i>داشبورد</a></li>
                            <li class="nav-item"><a href="<?= url('panel/account') ?>" class="nav-link text-white"><i
                                        class="fa fa-user ms-3"></i>ویرایش پروفایل</a></li>
                            <li class="nav-item"><a href="<?= url('panel/edit-profile') ?>"
                                    class="nav-link text-white"><i class="fa fa-user-circle ms-3"></i>حساب کاربری</a>
                            </li>
                            <?php if ($user['activity_user'] === 'freelancer') { ?>
                                <li class="nav-item"><a href="<?= url('show-projects') ?>" class="nav-link text-white"><i
                                            class="fa fa-clipboard-list ms-3"></i>پروژه ها</a></li>

                            <?php } else {
                            ?>
                                <li class="nav-item"><a href="<?= url('panel/create-project') ?>" class="nav-link text-white"><i
                                            class="fa fa-plus ms-3"></i>ایجاد پروژه</a></li>
                                <li class="nav-item"><a href="<?= url('panel/projects') ?>" class="nav-link text-white"><i
                                            class="fa fa-clipboard-list ms-3"></i>پروژه های ایجاد شده</a></li>
                            <?php } ?>
                            <li class="nav-item"><a
                                    href="<?= url('panel/balance') ?>" class="nav-link text-white"><i
                                        class="fa fa-dollar ms-3"></i>حساب</a></li>
                            <li class="nav-item"><a
                                    href="<?= url('panel/ticket') ?>" class="nav-link text-white"><i
                                        class="fa fa-headset ms-3"></i>تکیت</a></li>

                        </ul>
                    </div>
                    <div class="btn-exit text-center d-flex align-items-end h-100 justify-content-center">
                        <ul class="list-unstyled pe-0 w-100">
                            <li class="nav-item ">
                                <a href="<?= url('logout/') ?>" class="nav-link d-flex align-items-center text-white"><i
                                        class="fa fa-sign-out ms-3"></i>خروج </a>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>
            <div class="col-xl-10 col-md-8 col-lg-8 fixed-top me-auto nav-main p-0">
                <div class="row d-flex justify-content-between align-items-center mt-4">
                    <div class="col-2 col-sm-2 col-md-2">
                        <button class="btn btn-bars me-2 d-block d-md-none" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                                class="fa fa-bars fa-xl text-white"></i></button>


                        <div class="title-nav d-none d-md-block">
                            <h4 class="text-white">داشبورد</h4>
                        </div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 ms-4">

                        <div class="men-user d-flex align-items-center justify-content-end position-relative ">
                            <div class="message-notifiaction px-3 d-flex">
                                <a href="<?= url('panel/messages') ?>" class="text-white" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="پیام ها"><i class="fa fa-envelope fa-lg"></i></a>

                            </div>
                            <img src="<?= (asset($user['image']) ? asset($user['image']) : asset("/public/images/users/user.png")) ?>"
                                class="img-fluid rounded-circle" alt="" width="20">
                            <a class="list-info-show px-2 text-decoration-none text-white d-flex align-items-center"><?= $user['first_name'] . ' ' . $user['last_name'] ?><i
                                    class="fa fa-angle-down me-1"></i></a>

                            <div class="list-info shadow-lg position-absolute ">
                                <div></div>
                                <ul class="list-unstyled ps-0 ps-md-4 pe-2 p-4">
                                    <li class="nav-item  py-2 fs-6">
                                        <?php if ($user['activity_user'] == 'freelancer') { ?>
                                            <a href="<?= url('view-freelancer/' . $_SESSION['user'][0]) ?>" class="nav-link"><i
                                                    class="fa fa-edit ms-2"></i>مشاهده پروفایل</a>

                                        <?php } else { ?>
                                            <a href="<?= url('panel/account') ?>" class="nav-link"><i
                                                    class="fa fa-edit ms-2"></i>پروفایل</a>
                                        <?php } ?>
                                    </li>

                                    <li class="nav-item  py-2 fs-6"><a href="<?= url("panel/account") ?>"
                                            class="nav-link"><i class="fa fa-info-circle ms-2"></i>ویرایش پروفایل</a>
                                    </li>
                                    <li class="nav-item  py-2 fs-6"><a class="nav-link"
                                            href="<?= url("panel/edit-profile") ?>"><i class="fa fa-cog ms-2"></i>تنظیمات
                                            حساب کاربری</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


    </nav>