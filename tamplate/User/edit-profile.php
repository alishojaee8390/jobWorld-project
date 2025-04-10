<?php require_once(BASE_PATH . '/tamplate/User/layouts/header.php') ?>
<section class="user-account">
    <div class="row w-100 m-auto mt-5 p-0">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto mt-5">

            <div class="container">

                <div class=" mt-5 bg-white p-3 rounded-3" style="height: 800px;">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <!-- <button class="nav-link active" id="nav-info-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-info" type="button" role="tab" aria-controls="nav-info"
                                aria-selected="true">اطلاعات شخصی</button> -->
                            <button class="nav-link active" id="nav-bank-tab" data-bs-toggle="tab" data-bs-target="#nav-bank"
                                type="button" role="tab" aria-controls="nav-bank" aria-selected="false">حساب
                                بانکی</button>
                            <button class="nav-link" id="nav-password-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-password" type="button" role="tab" aria-controls="nav-password"
                                aria-selected="false">رمز عبور</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <!-- <div class="tab-pane fade show active" id="nav-info" role="tabpanel"
                            aria-labelledby="nav-info-tab">
                            <form action="">
                                <h3 class="my-4 text-center">اطلاعات شخصی </h3>
                                <div class="d-flex align-items-center gap-2">

                                    <div class="form-floating my-3 w-100">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="نام">
                                        <label for="floatingInput">نام </label>
                                    </div>
                                    <div class="form-floating w-100">
                                        <input type="text" class="form-control" id="floatinglastname"
                                            placeholder="نام خانوادگی">
                                        <label for="floatinglastname">نام خانوادگی</label>
                                    </div>

                                </div>
                                <div class="form-floating">
                                    <input type="email" class="form-control disabled text-start" id="floatingInputGrid"
                                        placeholder="آدرس ایمیل" value="mdo@example.com" disabled>
                                    <label for="floatingInputGrid">آدرس ایمیل</label>
                                </div>
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" id="floatinglastname"
                                        placeholder="شماره موبایل">
                                    <label for="floatinglastname">شماره موبایل</label>
                                </div>
                                <button type="submit" class="btn btn-success w-100">ذخیره تنظیمات</button>
                            </form>
                        </div> -->
                        <div class="tab-pane fade show active" id="nav-bank" role="tabpanel" aria-labelledby="nav-bank-tab">
                            <?php
                            $message = flash('accountError');
                            $messageSuccess = flash('accountSuccess');

                            if (!empty($message)) {



                            ?>


                                <div class="alert alert-danger  mt-2 p-1 fs-6 d-flex align-items-center gap-1 justify-content-center"
                                    role="alert">

                                    <i class="fa fa-close ms-1 bg-danger text-white rounded-circle"
                                        style="width: 15px; padding:2px"></i>
                                    <span> <?= $message ?></span>
                                </div>

                            <?php } else if (!empty($messageSuccess)) { ?>


                                <div class="alert alert-success  mt-2 p-1 fs-6 d-flex align-items-center gap-1 justify-content-center"
                                    role="alert">

                                    <i class="fa fa-check ms-1 bg-success text-white rounded-circle"
                                        style="width: 15px; padding:2px"></i>
                                    <span> <?= $messageSuccess ?></span>
                                </div>

                            <?php                      } ?>
                            <form action="<?= url('panel/edit-profile/shaba') ?>" method="post">
                                <h3 class="my-4 text-center">اطلاعات حساب </h3>
                                <p class="text-center text-muted">
                                    فقط و فقط شماره حساب مالک این حساب کاربری در کارلنسر را وارد کنید. عدم توجه به
                                    این نکته ممکن است باعث مسدود شدن این حساب کاربری شود.
                                </p>
                                <div class="form-floating my-3 w-100">
                                    <input type="text" class="form-control" id="number_shaba" name="number_shaba" placeholder="شماره شبا">
                                    <label for="number_shaba">شماره شبا </label>
                                </div>
                                <button type="submit" class="btn btn-success w-100">ثبت تغییرات</button>
                            </form>

                            <p class="mt-4 fs-5 text-danger"><span class="text-dark">شماره شبا شما : </span> <?= $user['number_shaba']  ?> </p>

                        </div>
                        <div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">

                            <form action="<?= url('panel/edit-profile/change-password') ?>" method="post">
                                <h3 class="my-4 text-center">تغییر رمز عبور </h3>

                                <div class="form-floating my-3 w-100">
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="رمز عبور فعلی">
                                    <label for="password">رمز عبور فعلی </label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="newPassword" name="newPassword"
                                        placeholder=" رمز عبور جدید">
                                    <label for="newPassword"> رمز عبور جدید</label>
                                </div>
                                <div class="form-floating my-3">
                                    <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword"
                                        placeholder="تکرار رمز عبور جدید">
                                    <label for="confirmNewPassword">تکرار رمز عبور جدید</label>
                                </div>
                                <button type="submit" class="btn btn-success w-100">ذخیره تغییرات</button>


                            </form>

                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>


</section>



<?php require_once(BASE_PATH . '/tamplate/User/layouts/footer.php') ?>