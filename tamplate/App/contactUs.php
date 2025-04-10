<?php require_once(BASE_PATH . '/tamplate/App/layouts/header.php') ?>

<main>

    <div class="container">
        <h2 class="text-center mt-5">راه‌های ارتباطی با جاب ورلد</h2>
        <div class="p-5  mt-5 border rounded-3 text-center shadow">
            <span class=" fs-5">پیشنهادها و انتقادات خود را از طریق فرم زیر ارسال نمایید</span>
            <?php
                            $messageError = flash('contactError');
                            $messageSuccess = flash('contactSuccess');

                            if (!empty($messageError)) {
                            ?>
            <div class="alert alert-danger  mt-2 p-1 fs-6 d-flex align-items-center gap-1 justify-content-center"
                role="alert">

                <i class="fa fa-close ms-1 bg-danger text-white rounded-circle" style="width: 15px; padding:2px"></i>
                <span> <?= $messageError ?></span>
            </div>

            <?php } else if (!empty($messageSuccess)) { ?>


            <div class="alert alert-success  mt-2 p-1 fs-6 d-flex align-items-center gap-1 justify-content-center"
                role="alert">

                <i class="fa fa-check ms-1 bg-success text-white rounded-circle" style="width: 15px; padding:2px"></i>
                <span> <?= $messageSuccess ?></span>
            </div>

            <?php                      } ?>
            <form action="<?= url('contact-us-send') ?>" method="post">

                <input type="text" class="form-control  border-bottom  my-5 border-success "
                    placeholder="نام خود را وارد کنید" name="first_name">
                <input type="text" class="form-control my-5 border-bottom border-success "
                    placeholder="ایمیل خود را وارد کنید" name="email">
                <textarea class="form-control my-5 border border-success shadow" name="message" id="" cols="30"
                    rows="10" placeholder="پیام خود را بنویسید"></textarea>
                <button class="btn btn-success w-100">ثبت</button>
            </form>

        </div>
    </div>
</main>



<?php require_once(BASE_PATH . '/tamplate/App/layouts/footer.php') ?>