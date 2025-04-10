<?php require_once(BASE_PATH . '/tamplate/User/layouts/header.php') ?>
<section class="user-account ">
    <div class="row w-100 m-auto mt-5 p-0">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto mt-5">

            <div class="container">

                <div class=" mt-5 bg-white p-3 rounded-3">

                    <h2>ویرایش پروژه </h2>
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
                    <form action="<?= url('panel/update-project/'. $project['id']) ?>" class="mt-5" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6 mt-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control disabled text-start" id="floatingtitle"
                                        placeholder="عنوان پروژه" name="title" value="<?= $project['title'] ?>">
                                    <label for="floatingtitle">عنوان پروژه</label>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-2">
                                <div class="form-floating">
                                    <select name="cat_id" class="form-control" id="floatingInputcat_id">
                                        <?php foreach ($categories as $category) { ?>
                                            <option value="<?= $category['id'] ?>"  <?php if($category['id'] == $project['cat_id']) echo 'selected' ?>  ><?= $category['name'] ?></option>
                                        <?php } ?>
                                    </select>

                                    <label for="floatingInputcat_id">دسته</label>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control disabled text-start" id="floatingInputbudget"
                                        placeholder="بودجه" name="budget" value="<?= $project['budget'] ?>">
                                    <label for="floatingInputbudget">بودجه</label>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-2">
                                <div class="form-floating">
                                    <input type="text" name="suggested_time" class="form-control disabled text-start" id="floatingInputsuggested_time"
                                        placeholder="زمان پیشنهادی" value="<?= $project['suggested_time'] ?>">
                                    <label for="floatingInputsuggested_time" >زمان پیشنهادی</label>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating my-3 w-100">
                                    <textarea type="text" class="form-control h-auto" id="floatingInputdescription" rows="20"
                                        placeholder="درباره پروژه"
                                        name="description"><?= $project['description'] ?></textarea>
                                    <label for="floatingInputdescription">توضیحات پروژه </label>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating my-3 w-100">
                                    <textarea type="text" class="form-control h-auto" id="floatingInputtags" rows="20"
                                        placeholder=""
                                        name="tags"><?= $project['tags'] ?></textarea>
                                    <label for="floatingInputtags">به چه مهارت هایی نیاز دارید؟ </label>

                                </div>
                            </div>

                            <div class="bg-white mt-2 p-3 d-flex flex-column flex-lg-row  gap-2 ">

                                <div class="file w-100 my-3 p-5  ">
                                    <input type="file" name="file" id="file-upload" multiple
                                        class="p-2 text-center  file-upload">
                                    <label for="file-upload" class="p-2 w-100 w-lg-50 m-auto ">انتخاب فایل
                                        &nbsp; <i class="fa-solid fa-cloud-arrow-up"></i>
                                    </label>
                                    <h4 class="text-muted text-center mt-4 fs-5">فایل های مجاز
                                        (png , jpg , jpeg , gif , pdf)</h4>

                                </div>
                            </div>

                                <div class="mb-2">

                                    <?php if($project['file'] != null){?>
                                    <p class="fs-4">فایل های آپلود شده</p>
                                    <a href="<?= $project['file'] ?>" class="btn btn-info" download>دانلود فایل</a>
                                    <?php } ?>
                                </div>

                            <button type="submit" class="btn btn-success">ویرایش پروژه</button>
                        </div>


                    </form>
                </div>


            </div>
        </div>
    </div>
    </div>


</section>



<?php require_once(BASE_PATH . '/tamplate/User/layouts/footer.php') ?>