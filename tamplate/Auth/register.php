<?php require_once('layouts/header.php') ?>


<title>ثبت نام</title>



</head>

<body>
    <section class="login">

        <div class="row w-100 m-0">
            <div class="col-lg-6 p-0">
                <div class="content d-flex align-items-center p-5 vh-100">
                    <div class="form shadow-lg bg-white w-100 m-auto p-5 position-relative">
                        <div class="title-login text-center ">
                            <div class="user position-absolute shadow-sm">
                                <i class="fa fa-user fa-lg text-white"></i>
                            </div>
                            <h3 class="text-center">ثبت نام کارجو</h3>
                            <h3 class="text-center mt-3"><span>Job</span>World</h3>
                        </div>

                        <form action="<?= url('register/store') ?>" method="post">
                            <?php
                            $messageError = flash('registerError');
                            $messageSuccess = flash('registerSuccess');

                            if (!empty($messageError)) {
                            ?>
                            <div class="alert alert-danger  mt-2 p-1 fs-6 d-flex align-items-center gap-1 justify-content-center"
                                role="alert">

                                <i class="fa fa-close ms-1 bg-danger text-white rounded-circle"
                                    style="width: 15px; padding:2px"></i>
                                <span> <?= $messageError ?></span>
                            </div>

                            <?php } else if (!empty($messageSuccess)) { ?>


                            <div class="alert alert-success  mt-2 p-1 fs-6 d-flex align-items-center gap-1 justify-content-center"
                                role="alert">

                                <i class="fa fa-check ms-1 bg-success text-white rounded-circle"
                                    style="width: 15px; padding:2px"></i>
                                <span> <?= $messageSuccess ?></span>
                            </div>

                            <?php                      } ?>

                            <!-- <div class="d-flex align-items-center justify-content-center gap-2"> -->

                            <!-- <i class="fa fa-envelope mt-4 " style="color:#01ab95;"></i> -->
                            <!-- </div> -->
                            <input class="d-block w-100 mt-4" type="text" name="email" placeholder="ایمیل ">
                            <input class="d-block w-100 mt-4" type="text" name="username" placeholder="نام کاربری ">
                            <input class="d-block w-100 mt-4" type="text" name="first_name" placeholder="نام">
                            <input class="d-block w-100 mt-4" type="text" name="last_name" placeholder="نام خانوادگی">
                            <input class="d-block w-100 mt-4" type="text" name="phone_number" placeholder="شماره تلفن">

                            <input class="d-block w-100 mt-4" type="password" name="password" placeholder="رمز عبور">

                            <input class="d-block w-100 mt-4" type="password" name="confirmPassword"
                                placeholder=" تکرار رمز عبور">

                            <div class="d-flex justify-content-between mt-3">

                                <a href="<?= url('/login') ?>" class="text-decoration-none">حساب کاربری دارم </a>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="form-check">
                                        <input class="form-check-input shadow" type="radio" name="activity_user"
                                            id="freelancer" value="freelancer" checked>
                                        <label class="form-check-label" for="freelancer">
                                            فریلنسر هستم
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input shadow" type="radio" name="activity_user"
                                            value="employer" id="employer">
                                        <label class="form-check-label" for="employer">
                                            کارفرما هستم
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="btn-login-form mt-5">
                                <button type="submit" class="btn text-white">ثبت نام</button>
                            </div>
                        </form>

                        <!-- <div class="forgut-password mt-5 text-center">
                            <a href="./register-emp.html" class="text-decoration-none">کارفرما هستید ؟</a>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-5 d-none d-lg-block">
                <div class="img-login text-center mt-5">
                    <img src="<?= asset('public/images/login.jpg') ?>" class="img-fluid mt-5" alt="">
                </div>
            </div>



        </div>
    </section>

    <?php require_once('layouts/footer.php') ?>