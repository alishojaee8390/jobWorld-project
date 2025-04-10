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
                    <form action="<?= url('panel/portfolio/store') ?>" method="post" enctype="multipart/form-data">
                        <h3 class="my-4 text-center">اضافه کردن نمونه کار </h3>


                        <div class="form-floating my-3 w-100">
                            <input type="text" class="form-control" id="floatingtitle" name="title" placeholder="عنوان">
                            <label for="floatingtitle">عنوان </label>
                        </div>
                        <div class="form-floating my-3 w-100">
                            <textarea type="text" class="form-control h-100 " id="floatingdescription" name="description" placeholder="توضیحات" rows="20" cols="20"></textarea>
                            <label for="floatingdescription">توضیحات</label>
                        </div>

                        <div class="d-flex flex-column  gap-2">
                            <div class="form-floating my-3 w-100">
                                <textarea type="text" class="form-control h-auto mb-2" id="floatingInput" rows="10"
                                    placeholder="مثال : php , javascript , طراحی سایت "
                                    name="skills"></textarea>
                                <label for="floatingInput">مهارت ها </label>
                                <p>لطفا برای اضافه کردن تکنولوژی استفاده شده به این صورت درج نمایید</p>
                                <p>هر مهارتی که مینویسید با (,) جدا کنید</p>
                                <p>مثال : php , javascript , طراحی سایت , </p>
                            </div>
                        </div>
                        <h4 class="text-muted text-center my-3">عکس نمونه کار</h4>
                        <div class="file w-100 my-3 p-5">
                            <input type="file" name="image" id="file-upload" multiple class="p-2 text-center  file-upload">
                            <label for="file-upload" class="p-2 w-50 m-auto">انتخاب تصویر
                                &nbsp; <i class="fa-solid fa-cloud-arrow-up"></i>
                            </label>
                            <h4 class="text-muted text-center mt-4 fs-5">فایل های مجاز (png , jpg ,
                                jpeg)</h4>
                        </div>
                        <button type="submit" class="btn btn-success w-100">ذخیره نمونه کار</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</section>


<?php require_once(BASE_PATH . '/tamplate/User/layouts/footer.php') ?>