<?php require_once(BASE_PATH . '/tamplate/User/layouts/header.php') ?><section class="user-account ">
    <div class="row w-100 m-auto mt-5 p-0">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto mt-5">

            <div class="container mt-5">
                <div class="bg-white rounded-3 p-3">
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

                    <form action="<?= url('panel/account/store-skills') ?>" method="post">
                        <h3 class="my-4 text-center">مهارت ها </h3>

                        <div class="d-flex flex-column align-items-center  gap-2">
                            <p>لطفا برای اضافه کردن مهارت به این صورت درج نمایید</p>
                            <p>هر مهارتی که مینویسید با (,) جدا کنید</p>
                            <p>مثال : php , javascript , طراحی سایت , </p>
                            <div class="form-floating my-3 w-100">
                                <textarea type="text" class="form-control h-auto" id="floatingInput" rows="20"
                                    placeholder="مثال : php , javascript , طراحی سایت "
                                    name="skills"></textarea>
                                <label for="floatingInput">مهارت ها </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success w-100">ذخیره مهارت ها </button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</section>


<?php require_once(BASE_PATH . '/tamplate/User/layouts/footer.php') ?>