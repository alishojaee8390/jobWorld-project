<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل ادمین | JobWorld</title>
    <link rel="stylesheet" href="<?= asset('public/css/style.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('public/css/animate.css') ?>">
</head>

<body style="background-color: whitesmoke;">




    <section class="sidebar d-none d-md-block">

        <div class="row w-100 m-0">
            <div class="col-xl-2 col-lg-4 col-md-4 fixed-top vh-100 shadow-lg p-0" style="background-color: #15283c;">


                <div class="sidebar-panel-admin">
                    <div class="user-info d-flex align-items-center justify-content-center py-4">
                        <img src="<?= (!empty($user['image'])) ?  asset($user['image']) : asset('public/images/user.png') ?>"
                            class="img-fluid rounded-circle" width="80px" alt="">
                        <div class="d-flex flex-column align-items-start justify-content-sm-center me-3">

                            <h6>
                                <?= $user['first_name'] . ' ' .  $user['last_name'] ?>
                            </h6>
                            <p class="d-flex align-items-center ">
                                <span class="online-animation d-block ms-1 "></span>
                                <span class="checkOnline me-1"></span>
                            </p>
                        </div>


                    </div>
                    <!-- <div class="Access-level mt-4 p-3 d-flex justify-content-between">
                        <span class="fs-5">سطح دسترسی : </span>
                        <span class="fs-5 fw-bold">مدیر</span>
                    </div> -->

                </div>
                <div class="menu-panel-admin py-3">
                    <ul class="list-unstyled p-0  nav-links">
                        <li class="me-4 px-3 py-2"><a href="<?= url('admin') ?>" class="text-decoration-none"><i
                                    class="fa fa-home ms-3 text-danger"></i>داشبورد</a></li>
                        <li class="py-2">
                            <div>
                                <a class="me-4  text-decoration-none d-flex align-items-center arrow" href="#">
                                    <i class="fa fa-bars-staggered m-3 text-warning"></i>
                                    <span class="ms-2">مدیریت دسته بندی</span>

                                    <i class="fa fa-angle-down fa-sm me-auto ms-3"></i>
                                </a>
                            </div>

                            <ul class="sub-menu animated fadeIn">
                                <li class="border-top-0"><a class="dropdown-item" href="<?= url('admin/category') ?>"><i
                                            class="fa fa-angle-left ms-2"></i>مشاهده همه دسته بندی ها</a></li>
                                <li><a class="dropdown-item" href="<?= url('admin/category/create') ?>"><i
                                            class="fa fa-angle-left ms-2"></i> افزودن دسته
                                        بندی جدید</a></li>

                            </ul>

                        </li>
                        <li class="py-2">
                            <div>
                                <a class="me-4 text-decoration-none d-flex align-items-center arrow" href="#">

                                    <i class="fa fa-bars m-3 text-primary"></i>
                                    <span class="ms-2"> مدیریت منو ها</span>

                                    <i class="fa fa-angle-down fa-sm me-auto ms-3"></i>
                                </a>
                            </div>
                            <ul class="sub-menu animated fadeIn">
                                <li class="border-top-0"><a class="dropdown-item" href="<?= url('admin/menus') ?>"><i
                                            class="fa fa-angle-left ms-2"></i>مشاهده همه منو ها</a></li>
                                <li><a class="dropdown-item" href="<?= url('admin/menus/create') ?>"><i
                                            class="fa fa-angle-left ms-2"></i>
                                        افزودن منوی جدید</a></li>

                            </ul>

                        </li>
                        <li class="py-2">
                            <div>
                                <a class="me-4 text-decoration-none d-flex align-items-center arrow" href="#">

                                    <i class="fa fa-users m-3 text-info"></i>
                                    <span class="ms-2"> مدیریت کاربران</span>

                                    <i class="fa fa-angle-down fa-sm me-auto ms-3"></i>
                                </a>
                            </div>
                            <ul class="sub-menu animated fadeIn">
                                <li class="border-top-0"><a class="dropdown-item" href="<?= url('admin/users') ?>"><i
                                            class="fa fa-angle-left ms-2"></i>مشاهده همه کاربران</a></li>

                            </ul>

                        </li>
                        <li class="py-2">
                            <div>
                                <a class="me-4 text-decoration-none d-flex align-items-center arrow" href="#">

                                    <i class="fa fa-clipboard m-3 text-info"></i>
                                    <span class="ms-2"> صفحه هات</span>

                                    <i class="fa fa-angle-down fa-sm me-auto ms-3"></i>
                                </a>
                            </div>
                            <ul class="sub-menu animated fadeIn">
                                <li class="border-top-0"><a class="dropdown-item" href="<?= url('admin/about-us') ?>"><i
                                            class="fa fa-angle-left ms-2"></i>صفحه
                                        درباه ما</a>
                                </li>
                                <li class="border-top-0"><a class="dropdown-item"
                                        href="<?= url('admin/terms-conditions') ?>"><i
                                            class="fa fa-angle-left ms-2"></i>صفحه قوانین و
                                        مقررات</a>
                                </li>

                            </ul>

                        </li>
                        <li class="me-4 px-3 py-2"><a href="<?= url('admin/transaction') ?>"
                                                    class="text-decoration-none"><i
                                                        class="fa fa-money-bill ms-3 text-warning"></i>درخواست برداشت</a></li>
                        <li class="py-2">
                            <div>
                                <a class="me-4 text-decoration-none d-flex align-items-center arrow" href="#">

                                    <i class="fa fa-envelope m-3 text-info"></i>
                                    <span class="ms-2"> مدیریت تیکت ها</span>

                                    <i class="fa fa-angle-down fa-sm me-auto ms-3"></i>
                                </a>
                            </div>
                            <ul class="sub-menu animated fadeIn">
                                <li class="border-top-0"><a class="dropdown-item" href="<?= url('admin/ticket') ?>"><i
                                            class="fa fa-angle-left ms-2"></i>مشاهده همه تیکت ها</a></li>
                                <li class="border-top-0"><a class="dropdown-item" href="<?= url('admin/ticket-category') ?>"><i
                                            class="fa fa-angle-left ms-2"></i>دسته بندی تیکت ها</a></li>
                                <li class="border-top-0"><a class="dropdown-item" href="<?= url('admin/ticket-priority') ?>"><i
                                            class="fa fa-angle-left ms-2"></i>اولویت تیکت ها</a></li>

                            </ul>

                        </li>
                        <li class="me-4 px-3 py-2"><a href="<?= url('admin/projects') ?>"
                                class="text-decoration-none"><i
                                    class="fa fa-clipboard ms-3 text-secondary"></i>پروژه ها</a></li>

                        <li class="me-4 px-3 py-2"><a href="<?= url('admin/setting') ?>" class="text-decoration-none"><i
                                    class="fa fa-cog ms-3 text-secondary"></i>تنظیمات</a></li>
                    </ul>
                </div>
            </div>
        </div>

    </section>



    <section class="nav-panel-admin">
        <div class="row w-100">
            <div class="col-xl-10 col-lg-8 col-md-8 fixed-top me-auto p-0">




                <nav class="">

                    <div class="row justify-content-between align-items-center">
                        <div class="position-absolute d-block d-md-none">
                            <button class="btn text-white" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i
                                    class="fa fa-bars fa-2xl"></i></button>

                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                                aria-labelledby="offcanvasRightLabel">
                                <div class="offcanvas-header offcanvas-header-panel-admin">
                                    <div class="nav-title">
                                        <a href="<?= url('/') ?>" class="text-decoration-none">
                                            <h5 class="text-white text-center text-md-end">Job<span>World</span></h5>
                                        </a>
                                    </div>
                                    <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas"
                                        aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body p-0 offcanvas-panel-admin">


                                    <div class="">
                                        <div class="user-info d-flex align-items-center justify-content-center py-4">
                                            <img src="<?= (!empty($user['image'])) ?  asset($user['image']) : asset('public/images/user.png') ?>"
                                                class="img-fluid rounded-circle" width="80px" alt="">
                                            <div
                                                class="d-flex flex-column align-items-start justify-content-sm-center me-3">
                                                <h6><?= $user['first_name'] . ' ' . $user['last_name'] ?>
                                                </h6>
                                                <p class="d-flex align-items-center">
                                                    <span class="online-animation d-block ms-1"></span>
                                                    <span class="checkOnline me-1"></span>
                                                </p>
                                            </div>


                                        </div>
                                        <!-- <div class="Access-level mt-4 p-3 d-flex justify-content-between">
                                            <span class="fs-5">سطح دسترسی : </span>
                                            <span class="fs-5 fw-bold">مدیر</span>
                                        </div> -->

                                    </div>
                                    <div class="menu-panel-admin py-3">
                                        <ul class="list-unstyled p-0  nav-links">
                                            <li class="me-4 px-3 py-2"><a href="<?= url('admin') ?>" class="text-decoration-none"><i
                                                        class="fa fa-home ms-3 text-danger"></i>داشبورد</a></li>
                                            <li class="py-2">
                                                <div>
                                                    <a class="me-4  text-decoration-none d-flex align-items-center arrow" href="#">
                                                        <i class="fa fa-bars-staggered m-3 text-warning"></i>
                                                        <span class="ms-2">مدیریت دسته بندی</span>

                                                        <i class="fa fa-angle-down fa-sm me-auto ms-3"></i>
                                                    </a>
                                                </div>

                                                <ul class="sub-menu animated fadeIn">
                                                    <li class="border-top-0"><a class="dropdown-item" href="<?= url('admin/category') ?>"><i
                                                                class="fa fa-angle-left ms-2"></i>مشاهده همه دسته بندی ها</a></li>
                                                    <li><a class="dropdown-item" href="<?= url('admin/category/create') ?>"><i
                                                                class="fa fa-angle-left ms-2"></i> افزودن دسته
                                                            بندی جدید</a></li>

                                                </ul>

                                            </li>
                                            <li class="py-2">
                                                <div>
                                                    <a class="me-4 text-decoration-none d-flex align-items-center arrow" href="#">

                                                        <i class="fa fa-bars m-3 text-primary"></i>
                                                        <span class="ms-2"> مدیریت منو ها</span>

                                                        <i class="fa fa-angle-down fa-sm me-auto ms-3"></i>
                                                    </a>
                                                </div>
                                                <ul class="sub-menu animated fadeIn">
                                                    <li class="border-top-0"><a class="dropdown-item" href="<?= url('admin/menus') ?>"><i
                                                                class="fa fa-angle-left ms-2"></i>مشاهده همه منو ها</a></li>
                                                    <li><a class="dropdown-item" href="<?= url('admin/menus/create') ?>"><i
                                                                class="fa fa-angle-left ms-2"></i>
                                                            افزودن منوی جدید</a></li>

                                                </ul>

                                            </li>
                                            <li class="py-2">
                                                <div>
                                                    <a class="me-4 text-decoration-none d-flex align-items-center arrow" href="#">

                                                        <i class="fa fa-users m-3 text-info"></i>
                                                        <span class="ms-2"> مدیریت کاربران</span>

                                                        <i class="fa fa-angle-down fa-sm me-auto ms-3"></i>
                                                    </a>
                                                </div>
                                                <ul class="sub-menu animated fadeIn">
                                                    <li class="border-top-0"><a class="dropdown-item" href="<?= url('admin/users') ?>"><i
                                                                class="fa fa-angle-left ms-2"></i>مشاهده همه کاربران</a></li>

                                                </ul>

                                            </li>
                                            <li class="py-2">
                                                <div>
                                                    <a class="me-4 text-decoration-none d-flex align-items-center arrow" href="#">

                                                        <i class="fa fa-clipboard m-3 text-info"></i>
                                                        <span class="ms-2"> صفحه هات</span>

                                                        <i class="fa fa-angle-down fa-sm me-auto ms-3"></i>
                                                    </a>
                                                </div>
                                                <ul class="sub-menu animated fadeIn">
                                                    <li class="border-top-0"><a class="dropdown-item" href="<?= url('admin/about-us') ?>"><i
                                                                class="fa fa-angle-left ms-2"></i>صفحه
                                                            درباه ما</a>
                                                    </li>
                                                    <li class="border-top-0"><a class="dropdown-item"
                                                            href="<?= url('admin/terms-conditions') ?>"><i
                                                                class="fa fa-angle-left ms-2"></i>صفحه قوانین و
                                                            مقررات</a>
                                                    </li>

                                                </ul>

                                            </li>
                                            <li class="me-4 px-3 py-2"><a href="<?= url('admin/transaction') ?>"
                                                    class="text-decoration-none"><i
                                                        class="fa fa-money-bill ms-3 text-warning"></i>درخواست برداشت</a></li>
                                            <li class="py-2">
                                                <div>
                                                    <a class="me-4 text-decoration-none d-flex align-items-center arrow" href="#">

                                                        <i class="fa fa-envelope m-3 text-info"></i>
                                                        <span class="ms-2"> مدیریت تیکت ها</span>

                                                        <i class="fa fa-angle-down fa-sm me-auto ms-3"></i>
                                                    </a>
                                                </div>
                                                <ul class="sub-menu animated fadeIn">
                                                    <li class="border-top-0"><a class="dropdown-item" href="<?= url('admin/ticket') ?>"><i
                                                                class="fa fa-angle-left ms-2"></i>مشاهده همه تیکت ها</a></li>
                                                    <li class="border-top-0"><a class="dropdown-item" href="<?= url('admin/ticket-category') ?>"><i
                                                                class="fa fa-angle-left ms-2"></i>دسته بندی تیکت ها</a></li>
                                                    <li class="border-top-0"><a class="dropdown-item" href="<?= url('admin/ticket-priority') ?>"><i
                                                                class="fa fa-angle-left ms-2"></i>اولویت تیکت ها</a></li>

                                                </ul>

                                            </li>
                                            <li class="me-4 px-3 py-2"><a href="<?= url('admin/projects') ?>"
                                                    class="text-decoration-none"><i
                                                        class="fa fa-clipboard ms-3 text-secondary"></i>پروژه ها</a></li>

                                            <li class="me-4 px-3 py-2"><a href="<?= url('admin/setting') ?>" class="text-decoration-none"><i
                                                        class="fa fa-cog ms-3 text-secondary"></i>تنظیمات</a></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="nav-title p-2">
                                <a href="<?= url('/') ?>" class="text-decoration-none">
                                    <h5 class="text-white text-center text-md-end">Job<span>World</span></h5>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 d-flex flex-row align-items-center justify-content-end">
                            <!-- <div class="notification mt-4">
                                <ul class="">
                                    <a type="button" class="position-relative text-decoration-none">
                                        <i class="far fa-envelope fa-lg text-white"></i> <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">9
                                            <span class="visually-hidden">unread messages</span></span>
                                    </a>
                                    <a type="button" class="position-relative me-3 text-decoration-none">
                                        <i class="far fa-bell fa-lg text-white"></i> <span
                                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">9
                                            <span class="visually-hidden">unread messages</span></span>
                                    </a>
                                </ul>
                            </div> -->
                            <div class="dropdown p-2 p-sm-3 user-info-nav">
                                <a class="text-decoration-none d-flex align-items-center text-white" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="<?= (!empty($user['image'])) ?  asset($user['image']) : asset('public/images/user.png') ?>"
                                        class="img-fluid rounded-circle ms-2" width="50px" alt="">
                                    <span>
                                        <?= $user['first_name'] . ' ' .  $user['last_name'] ?></span>
                                    <i class="fa fa-angle-down me-2"></i>
                                </a>

                                <ul class="dropdown-menu shadow-lg border-0 w-100">
                                    <li><a class="dropdown-item p-3" href="<?= url('admin/profile') ?>"><i
                                                class="fa fa-user ms-2"></i>پروفایل
                                            من</a></li>
                                    <li><a class="dropdown-item p-3" href="<?= url('admin/setting') ?>"><i
                                                class="fa fa-cog ms-2"></i>تنظیمات</a>
                                    </li>
                                    <li><a class="dropdown-item p-3" href="<?= url('logout') ?>"><i
                                                class="fa fa-sign-out ms-2"></i>خروج
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>