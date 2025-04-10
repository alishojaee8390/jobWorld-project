<?php
require_once(BASE_PATH . '/tamplate/Admin/layouts/header.php');
?>


<section class="card-panle-admin d-flex justify-content-center p-5" style="height: auto;">
    <div class="row w-100 mt-5">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto mt-5">

            <h2 class="text-center mb-5 pb-3  border-success border-bottom">تنظیمات سایت</h2>

            <form action="<?= url('admin/setting/update') ?>" method="post" enctype="multipart/form-data">

                <div class="grop-input">
                    <div class="input-group mb-3  d-flex flex-column ">
                        <span class="input-group-text border-0 rounded-top bg-white border-bottom border-success"
                            id="inputGroup-sizing-default">عنوان سایت : </span>
                        <input type="text" class=" form-control border-bottom w-100" name="title" id="title"
                            value="<?= $setting['title'] ?>">
                    </div>
                    <div class="input-group mb-3 d-flex flex-column">
                        <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success"
                            id="inputGroup-sizing-default">کلمات کلیدی : </span>
                        <input type="text" class=" form-control border-bottom w-100" name="keywords" id="keywords"
                            value="<?= $setting['keywords'] ?>">
                    </div>
                    <div class="input-group mb-3 d-flex flex-column">
                        <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success"
                            id="inputGroup-sizing-default"> توضیحات سایت : </span>
                        <textarea name="description" id="description" cols="30"
                            rows="10"><?= $setting['description'] ?></textarea>
                    </div>
                    <div class="input-group mb-3 d-flex flex-column">
                        <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success"
                            id="inputGroup-sizing-default"> عنوان هدر : </span>
                        <input type="text" class=" form-control border-bottom w-100" name="title_header"
                            id="title_header" value="<?= $setting['title_header'] ?>">
                    </div>
                    <div class="input-group mb-3 d-flex flex-column">
                        <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success"
                            id="inputGroup-sizing-default"> توضیحات هدر : </span>
                        <textarea name="description_header" id="description_header" cols="30"
                            rows="10"><?= $setting['description_header'] ?></textarea>
                    </div>
                    <div class="input-group mb-3 d-flex flex-column">
                        <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success"
                            id="inputGroup-sizing-default">ایمیل : </span>
                        <input type="text" class=" form-control border-bottom w-100" name="email" id="email"
                            value="<?= $setting['email'] ?>">
                    </div>
                    <div class="input-group mb-3 d-flex flex-column">
                        <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success"
                            id="inputGroup-sizing-default">شماره تلفن : </span>
                        <input type="text" class=" form-control border-bottom w-100" name="phone" id="phone"
                            value="<?= $setting['phone'] ?>">
                    </div>
                    <div class="input-group mb-3 d-flex flex-column">
                        <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success"
                            id="inputGroup-sizing-default">لینک اینستاگرام : </span>
                        <input type="text" class=" form-control border-bottom w-100" name="instagram" id="instagram"
                            value="<?= $setting['instagram'] ?>" placeholder="https://www.instagram.com/username">
                    </div>
                    <div class="input-group mb-3 d-flex flex-column">
                        <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success"
                            id="inputGroup-sizing-default">لینک تلگرام : </span>
                        <input type="text" class=" form-control border-bottom w-100" name="telegram" id="telegram"
                            value="<?= $setting['telegram'] ?>" placeholder="t.me/username">
                    </div>
                    <div class="input-group mb-3 d-flex flex-column">
                        <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success"
                            id="inputGroup-sizing-default">لینک توییتر : </span>
                        <input type="text" class=" form-control border-bottom w-100" name="twitter" id="twitter"
                            value="<?= $setting['twitter'] ?>" placeholder="https://twitter.com/username">
                    </div>
                    <div class="input-group mb-3 d-flex flex-column">
                        <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success"
                            id="inputGroup-sizing-default">لینک لینکدین : </span>
                        <input type="text" class=" form-control border-bottom w-100" name="linkedin" id="linkedin"
                            value="<?= $setting['linkedin'] ?>" placeholder="https://www.linkedin.com/username">
                    </div>
                    <div class="input-group mb-3 d-flex flex-column">
                        <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success"
                            id="inputGroup-sizing-default"> آیکون : </span>
                        <div class="bg-white mt-2 p-3 d-flex flex-column flex-lg-row  gap-2 ">

                            <div class="file w-100 my-3 p-5  ">
                                <input type="file" name="icon" id="file-upload" multiple
                                    class="p-2 text-center  file-upload">
                                <label for="file-upload" class="p-2 w-100 w-lg-50 m-auto ">انتخاب فایل
                                    &nbsp; <i class="fa-solid fa-cloud-arrow-up"></i>
                                </label>
                                <h4 class="text-muted text-center mt-4 fs-5">فایل های مجاز
                                    (png , jpg , jpeg , gif)</h4>

                            </div>

                            <img src="<?= asset($setting['icon']) ?>" class="img-fluid rounded-2" width="50%" alt="">
                        </div>
                    </div>
                    <div class="input-group mb-3 d-flex flex-column">

                        <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success"
                            id="inputGroup-sizing-default"> لگو : </span>
                        <div class="bg-white mt-2 p-3 d-flex flex-column flex-lg-row  gap-2 ">

                            <div class="file w-100 my-3 p-5 ">
                                <input type="file" name="logo" id="file-upload" multiple
                                    class="p-2 text-center  file-upload">
                                <label for="file-upload" class="p-2 w-100 w-lg-50 m-auto ">انتخاب فایل
                                    &nbsp; <i class="fa-solid fa-cloud-arrow-up"></i>
                                </label>
                                <h4 class="text-muted text-center mt-4 fs-5">فایل های مجاز
                                    (png , jpg , jpeg , gif)</h4>

                            </div>

                            <img src="<?= asset($setting['logo']) ?>" class="img-fluid rounded-2" width="50%" alt="">
                        </div>
                    </div>
                    <div class="input-group mb-3 d-flex flex-column">
                        <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success"
                            id="inputGroup-sizing-default"> پس زمینه هدر : </span>
                        <!-- <input type="file" class=" form-control border-bottom w-100" name="background_head" id="background_head"> -->
                        <div class="bg-white mt-2 p-3 d-flex flex-column flex-lg-row  gap-2 ">

                            <div class="file w-100 my-3 p-5  ">
                                <input type="file" name="background_head" id="file-upload" multiple
                                    class="p-2 text-center  file-upload">
                                <label for="file-upload" class="p-2 w-100 w-lg-50 m-auto ">انتخاب فایل
                                    &nbsp; <i class="fa-solid fa-cloud-arrow-up"></i>
                                </label>
                                <h4 class="text-muted text-center mt-4 fs-5">فایل های مجاز
                                    (png , jpg , jpeg , gif)</h4>

                            </div>

                            <img src="<?= asset($setting['background_head']) ?>" class="img-fluid rounded-2" width="50%"
                                alt="">
                        </div>
                    </div>
                </div>

                <button class="btn btn-success px-5 py-3 w-100" type="submit">ذخیره</button>

            </form>


        </div>
    </div>
</section>


<?php
require_once(BASE_PATH . '/tamplate/Admin/layouts/footer.php');
?>