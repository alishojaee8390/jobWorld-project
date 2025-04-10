<?php require_once('layouts/header.php') ?>


<title>فراموشی رمز عبور</title>

</head>


<body>
    <section class="login">

        <div class="row w-100 m-0">
            <div class="col-lg-6 p-0">
                <div class="content d-flex align-items-center p-5 vh-100">
                    <div class="form shadow-lg bg-white w-100 m-auto p-5 position-relative">
                        <div class="title-login text-center">
                            <div class="user position-absolute shadow-sm">
                                <i class="fa fa-user fa-lg text-white"></i>
                            </div>
                            <h3 class="text-center">فراموشی رمز عبور</h3>
                            <h3 class="text-center mt-3"><span>Job</span>World</h3>
                        </div>
                        <form action="<?= url('forgot/request') ?>" method="post">
                            <?php
                            $messageError = flash('forgotError');
                            $messageSuccess = flash('forgotSuccess');
                            if (!empty($messageError)) {
                            ?>

                                <div class="alert alert-danger  mt-2 p-1 fs-6 d-flex align-items-center gap-1 justify-content-center" role="alert">

                                    <i class="fa fa-close ms-1 bg-danger text-white rounded-circle" style="width: 15px; padding:2px"></i>
                                    <span> <?= $messageError ?></span>
                                </div>

                            <?php } else if (!empty($messageSuccess)) { ?>

                                <div class="alert alert-success  mt-2 p-1 fs-6 d-flex align-items-center gap-1 justify-content-center" role="alert">

                                    <i class="fa fa-check ms-1 bg-success text-white rounded-circle" style="width: 15px; padding:2px"></i>
                                    <span> <?= $messageSuccess ?></span>
                                </div>

                            <?php } ?>
                            <input class="d-block w-100 mt-4" type="text" placeholder=" ایمیل" name="email">



                            <div class="btn-login-form mt-5">
                                <button type="submit" class="btn text-white">ادامه</button>
                            </div>
                        </form>

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