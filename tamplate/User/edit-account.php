<?php require_once(BASE_PATH . '/tamplate/User/layouts/header.php') ?>
<section class="user-account ">
    <div class="row w-100 m-auto mt-5 p-0">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto mt-5">

            <div class="container">

                <div class=" my-5 bg-white p-3 rounded-3">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-edit-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-edit" type="button" role="tab" aria-controls="nav-edit"
                                aria-selected="true">ویرایش پروفایل</button>
                            <button class="nav-link" id="nav-image-tab" data-bs-toggle="tab" data-bs-target="#nav-image"
                                type="button" role="tab" aria-controls="nav-image" aria-selected="false">تصاویر</button>
                            <?php if ($user['activity_user'] === 'freelancer') { ?>
                                <button class="nav-link" id="nav-skills-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-skills" type="button" role="tab" aria-controls="nav-skills"
                                    aria-selected="false">مهارت ها</button>
                                <button class="nav-link" id="nav-protfolio-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-protfolio" type="button" role="tab" aria-controls="nav-protfolio"
                                    aria-selected="false">نمونه کار</button>
                                <button class="nav-link" id="nav-work-experience-tab" data-bs-toggle="tab" data-bs-target="#nav-work-experience"
                                    type="button" role="tab" aria-controls="nav-work-experience" aria-selected="false">سوابق کاری</button>

                                <button class="nav-link" id="nav-edu-tab" data-bs-toggle="tab" data-bs-target="#nav-edu"
                                    type="button" role="tab" aria-controls="nav-edu" aria-selected="false">تحصیلات</button>


                            <?php } ?>


                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-edit" role="tabpanel"
                            aria-labelledby="nav-edit-tab">
                            <form action="<?= url('panel/account/edit-information') ?>" method="post"
                                enctype="multipart/form-data">
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

                                <h3 class="my-4 text-center">اطلاعات شخصی </h3>
                                <div class="d-flex align-items-center gap-2">

                                    <div class="form-floating my-3 w-100">
                                        <input type="text" class="form-control" id="floatingInput" name="first_name" value="<?= $user['first_name'] ?>"
                                            placeholder="نام">
                                        <label for="floatingInput">نام </label>
                                    </div>
                                    <div class="form-floating w-100">
                                        <input type="text" class="form-control" id="floatinglastname"
                                            placeholder="نام خانوادگی" name="last_name" value="<?= $user['last_name'] ?>">
                                        <label for="floatinglastname">نام خانوادگی</label>
                                    </div>

                                </div>
                                <div class="form-floating">
                                    <input type="email" class="form-control disabled text-start" id="floatingInputGrid"
                                        placeholder="آدرس ایمیل" value="<?= $user['email'] ?>" disabled>
                                    <label for="floatingInputGrid">آدرس ایمیل</label>
                                </div>
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" id="floatinglastname" name="phone_number"
                                        placeholder="شماره موبایل" value="<?= $user['phone_number'] ?>">
                                    <label for="floatinglastname">شماره موبایل</label>
                                </div>
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" id="floatingcity" name="city"
                                        placeholder="شهر" value="<?= $user['city'] ?>">
                                    <label for="floatingcity">شهر</label>
                                </div>
                                <div class="form-floating my-3">
                                    <input type="text" class="form-control" id="floatingexpertise_title" name="expertise_title"
                                        placeholder="سمت شغلی" value="<?= $user['expertise_title'] ?>">
                                    <label for="floatingexpertise_title">سمت شغلی</label>
                                </div>
                                <div class="form-floating my-3 w-100">
                                    <textarea type="text" class="form-control h-auto" id="floatingInput" rows="20"
                                        placeholder="درباره من "
                                        name="about"><?= $user['about'] ?></textarea>
                                    <label for="floatingInput">درباره من </label>
                                </div>
                                <button type="submit" class="btn btn-success w-100">ذخیره تنظیمات</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-image" role="tabpanel" aria-labelledby="nav-image-tab">
                            <form action="<?= url('panel/account/edit-image') ?>" method="post"
                                enctype="multipart/form-data">
                                <h3 class="my-4 text-center">تصویر </h3>

                                <div class="d-flex flex-column align-items-center  gap-2">
                                    <p>کاربرانی که تصویر مناسب دارن ۳۰٪ احتمال بیشتری برای دریافت پروژه نسبت به بقیه
                                        کاربران دارند </p>
                                    <img src="<?= (asset($user['image']) ? asset($user['image']) : asset("/public/images/users/user.png")) ?>"
                                        alt="" class="img-fluid rounded-circle mb-3 shadow" width="200" height="200">
                                    <div class="file w-100 my-3 p-5">
                                        <input type="file" name="image" id="file-upload" multiple
                                            class="p-2 text-center  file-upload">
                                        <label for="file-upload" class="p-2 w-50 m-auto">انتخاب تصویر
                                            &nbsp; <i class="fa-solid fa-cloud-arrow-up"></i>
                                        </label>
                                        <h4 class="text-muted text-center mt-4 fs-5">فایل های مجاز (png , jpg ,
                                            jpeg , webp)</h4>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success w-100 mb-5">ذخیره تصویر</button>
                            </form>


                        </div>
                        <?php if ($user['activity_user'] == 'freelancer') { ?>
                            <div class="tab-pane fade" id="nav-skills" role="tabpanel" aria-labelledby="nav-skills-tab">

                                <?php if ($userInfo != true) { ?>
                                    <a href="<?= url('panel/account/create-skills') ?>" class="btn btn-outline-success mt-5">اضافه کردن مهارت</a>
                                <?php } else { ?>
                                    <a href="<?= url('panel/account/edit-skills/' . $userInfo['id']) ?>" class="btn btn-outline-success mt-5">ویرایش مهارت</a>
                                <?php } ?>
                                <div class="skills-freelancer mt-4">
                                    <h3 class="border-bottom d-inline p-1 border-danger">مهارت ها</h3>
                                    <ul class="list-unstyled list-inline mt-4 pe-0">

                                        <?php foreach ($skills as $skill) { ?>
                                            <li class="list-inline-item badge bg-danger p-2 px-4 my-2 me-2"><?= $skill ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="nav-protfolio" role="tabpanel"
                                aria-labelledby="nav-protfolio-tab">

                                <div class="text-center">
                                    <div class="row mt-5">


                                        <?php if (!empty($userPortfolios)) {
                                            foreach ($userPortfolios as $item) { ?>
                                                <div class="col-lg-4 my-3 d-flex justify-content-center">
                                                    <div class="card shadow-lg border-0 " style="width: 85%;">
                                                        <div class="text-start p-2">
                                                            <a href="<?= url('panel/portfolio/delete/' . $item['id']) ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                                                        </div>
                                                        <img src="<?= asset($item['image']) ?>" class="card-img-top p-4 rounded-3" style="height: 400px !important;" alt="...">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center mt-2"><?= $item['title'] ?></h5>
                                                            <p class="card-text text-center p-2 text-muted"><?= substr($item['description'], 0, 80) . ' ... ' ?></p>
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <a class="btn btn-outline-primary d-block" target="_blank" href="<?= url('show-portfolio/' . $item['id']) ?>" class="card-link">مشاهده نمونه
                                                                کار</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }
                                        } else { ?>
                                            <p class="text-center mt-5">هیچ نمونه کار وجود ندارد</p>
                                        <?php } ?>
                                    </div>
                                    <a href="<?= url('panel/create-portfolio') ?>" class="btn btn-outline-success mt-5">اضافه کردن نمونه کار جدید</a>
                                </div>



                            </div>

                            <div class="tab-pane fade" id="nav-work-experience" role="tabpanel" aria-labelledby="nav-work-experience-tab">

                                <div class="row">
                                    <?php foreach ($workExperiences as $item) { ?>
                                        <div class="col-lg-3">
                                            <div class="card-work-experience p-4 shadow mt-4 rounded-3">
                                                <div class="text-start">
                                                    <a href="<?= url('panel/work-experience/delete/' . $item['id']) ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                                                </div>

                                                <div class="card-work-experience-info">
                                                    <p>شرکت : <span class="text-danger"><?= $item['compony_name'] ?></span></p>
                                                    <p>سمت : <span class="text-danger"><?= $item['job'] ?></span></p>
                                                    <p><?= $item['description'] ?></p>
                                                    <p>تاریخ : از <span class="text-danger"><?= $item['date_start'] ?></span> تا <span class="text-danger"><?= $item['date_end'] ?></span></p>

                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <a href="<?= url('panel/create-work-experience') ?>" class="btn btn-outline-success mt-5">اضافه کردن سوابق جدید</a>
                            </div>
                            <div class="tab-pane fade" id="nav-edu" role="tabpanel" aria-labelledby="nav-edu-tab">


                                <div class="row">
                                    <?php foreach ($education as $item) { ?>
                                        <div class="col-lg-3">

                                            <div class="card-education p-4 shadow mt-4 rounded-3">
                                                <div class="text-start">
                                                    <a href="<?= url('panel/education/delete/' . $item['id']) ?>" class="text-danger"><i class="fas fa-trash"></i></a>
                                                </div>
                                                <div class="card-education-info">
                                                    <p>دانشگاه : <span class="text-danger"><?= $item['university_name'] ?></span></p>
                                                    <p>رشته : <span class="text-danger"><?= $item['feild_study'] ?></span></p>
                                                    <p><?= $item['description'] ?></p>
                                                    <p>تاریخ : از <span class="text-danger"><?= $item['date_start'] ?></span> تا <span class="text-danger"><?= $item['date_end'] ?></span></p>

                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <a href="<?= url('panel/create-education') ?>" class="btn btn-outline-success mt-5">اضافه کردن تحصیل جدید</a>
                            </div>

                        <?php } ?>

                    </div>

                </div>
            </div>
        </div>
    </div>


</section>



<?php require_once(BASE_PATH . '/tamplate/User/layouts/footer.php') ?>