<?php require_once(BASE_PATH . '/tamplate/User/layouts/header.php') ?>

<section class="user-account">
    <div class="row w-100 m-auto mt-5 p-0">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto mt-5">

            <div class="container">

                <div class=" mt-5 bg-white p-3 rounded-3">

                    <h2>ایجاد تحصیل جدید</h2>
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
                    <form action="<?= url('panel/education/store') ?>" method="post">
                        <h3 class="my-4 text-center">تحصیلات </h3>
                        <div class="d-flex flex-column align-items-center gap-2 h-100">

                            <div class="w-100">

                                <div class="d-flex align-items-center gap-2 mb-3">

                                    <div class="form-floating w-100">
                                        <input type="text" class="form-control" id="feild_study"
                                            placeholder="رشته تحصیلی" name="feild_study">
                                        <label for="feild_study">رشته تحصیلی</label>
                                    </div>
                                    <div class="form-floating w-100">
                                        <input type="text" class="form-control" id="university_name"
                                            placeholder="نام دانشگاه" name="university_name">
                                        <label for="university_name">نام دانشگاه</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="description">توضیحات</label>
                                    <textarea type="date" class="form-control" rows="15" cols="15" id="description"
                                        placeholder="توضیحات " name="description"></textarea>
                                </div>
                                <div class="d-flex justify-content-center align-items-center gap-2">

                                    <div class="form-floating w-100">
                                        <input type="text" class="form-control" id="published_date_start"
                                            placeholder="از تاریخ" name="date_start">
                                        <label for="published_date_start">از تاریخ</label>
                                    </div>

                                    <div class="form-floating w-100">
                                        <input type="text" class="form-control" id="published_date_end"
                                            placeholder="از تاریخ" name="date_end">
                                        <label for="published_date_end">از تاریخ</label>
                                    </div>
                                </div>


                            </div>

                            <button type="submit" class="btn btn-success w-100 mt-5">ذخیره تنظیمات</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</section>
<?php require_once(BASE_PATH . '/tamplate/User/layouts/footer.php') ?>