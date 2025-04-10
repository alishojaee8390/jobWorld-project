<?php require_once(BASE_PATH . '/tamplate/App/layouts/header.php') ?>

<!-- ==================================== start-project-details ==================================== -->
<section class="project-details mt-5">
    <div class="container">
        <div class="bg-white shadow-lg rounded-3 p-3">
            <div class="row">
                <div class="col-lg-8">
                    <div class="project-details-info p-2">
                        <div class="project-title-info d-flex align-items-center">
                            <h3><?= $project['title'] ?></h3>

                        </div>
                        <!-- <div class="project-price-info py-2">
                            <span class="fs-5">بودجه از <span class="text-danger fw-bold">50000 تومان</span> تا
                                <span class="text-danger fw-bold">70000 تومان</span> </span>
                            <span class="me-4 fs-5">زمان پیشنهادی : <span class="badge bg-warning fs-6">2
                                    روز</span></span>
                        </div> -->
                        <div class="project-price-info py-2">
                            <span class="fs-5">بودجه <span class="text-danger fw-bold"><?= $project['budget'] ?>
                                    تومان</span>
                            </span>
                            <span class="me-4 fs-5">زمان پیشنهادی : <span class="badge bg-warning fs-6"><?= $project['suggested_time'] ?>
                                    روز</span></span>
                        </div>
                        <div class="project-desc mt-5">
                            <h4>توضیحات پروژه : </h4>
                            <p class="px-3 py-2 text-muted"><?= $project['description'] ?></p>
                        </div>
                        <div class="tag my-5">
                            <?php if ($tags !== null) {
                                foreach ($tags as $tag) {

                            ?>
                                    <a href="<?= url('show-projects/' . $project['cat_id']) ?>" class="btn bg-light text-success mt-1" target="_blank"><?= $tag ?></a>
                            <?php   }
                            }  ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="d-flex flex-column align-items-end gap-2">
                        <a class="btn btn-outline-primary w-50 <?= $disableBtn == false ? 'disabled' : '' ?>" href="<?= $disableBtn == false ? '#' : url('register-offer-view/' . $project['id'])   ?>">ثبت
                            پیشنهاد
                            روی
                            پروژه</a>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12">
                    <?php if($project['file'] != null){?>
                    <p class="fs-4">فایل های اضافه شده</p>
                    <a href="<?= $project['file'] ?>" download class="btn btn-info">دانلود</a>
                    <?php } ?>
                </div>
                <div class="col-lg-12">
                    <div class="share-project  d-flex justify-content-center flex-column align-items-center">
                        <p class="fs-5 mb-4"> پروژه رو با دوستان خود به اشتراک بگذارید </p>
                        <ul class="text-center">
                            <li class="twitter px-3 py-1 m-1"><a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(currentUrl()); ?>&text=<?php echo urlencode($project['title']); ?>"><i class="fab fa-twitter fa-3x "></i></a>
                            </li>
                            <li class="facebook px-3 py-1 m-1"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(currentUrl()); ?>"><i class="fab fa-facebook-f  fa-3x"></i></a>
                            </li>

                            <li class="whatsapp px-3 py-1 m-1"><a href="https://api.whatsapp.com/send?text=<?php echo urlencode($project['title'] . ' ' . currentUrl()); ?>" target="_blank"><i class="fab fa-whatsapp  fa-3x"></i></a>
                            </li>
                            <li class="telegram px-3 py-1 m-1"><a href="https://t.me/share/url?url=<?php echo urlencode(currentUrl()) . '&text= ' . urlencode($project['title']) ?>"><i class="fab fa-telegram  fa-3x"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====================================end-of-project-details ==================================== -->
<!-- 
<div class="modal-register-offer">
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-muted" id="exampleModalToggleLabel ">ثبت پیشنهاد روی پروژه
                        <span class="text-success  fs-4">( طراحی یک صفحه وب )</span>
                    </h1>
                    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4 mt-2">
                            <form action="/reg" method="post">
                                <div class="d-flex align-items-center gap-2 mt-5 ">
                                    <div class="Amount-offer pe-3 d-flex align-items-center gap-2 shadow-sm">
                                        <i class="fa fa-dollar ms-2 text-success "></i>
                                        <input class="border-0 p-2 px-3 w-100" type="text" placeholder="مبلغ پروژه را وارد کنید">
                                        <div class="amount-toman p-2 px-3 ms-0 bg-success rounded-3 text-white w-25 text-center">
                                            تومان</div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2 mt-5">
                                    <div class="Amount-offer pe-3 d-flex align-items-center gap-2 shadow-sm">
                                        <i class="fa fa-calendar-days ms-2 text-success"></i>
                                        <input class="border-0 p-2 px-3 w-100" type="text" placeholder=" مهلت انجام کار را وارد کنید">
                                        <div class="amount-toman p-2 px-3 ms-0 bg-success rounded-3 text-white w-25 text-center">
                                            روز</div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2 mt-5">
                                    <div class="Amount-offer pe-3 d-flex align-items-center gap-2 shadow-sm">
                                        <i class="fa fa-certificate text-success"></i>
                                        <input class="border-0 p-2 px-3 w-100" type="text" placeholder=" ضمانت  تخصص را وارد کنید">
                                        <div class="amount-toman p-2 px-3 ms-0 bg-success rounded-3 text-white w-25 text-center">
                                            درصد</div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-2 mt-5">
                                    <div class="Amount-offer pe-3 d-flex align-items-center gap-2 shadow-sm">
                                        <i class="far fa-calendar ms-2 text-success "></i>
                                        <input class="border-0 p-2 px-3 w-100" type="text" placeholder=" مدت اعتبار پیشنهاد را وارد کنید">
                                        <div class="amount-toman p-2 px-3 ms-0 bg-success rounded-3 text-white w-25 text-center">
                                            روز</div>
                                    </div>
                                </div>

                        </div>
                        <div class="col-lg-5 mt-2">
                            <div class="offer-desc mt-5 w-100 p-1 shadow-sm">
                                <textarea class="w-100 border-0 p-3" name="" id="" cols="30" rows="11" placeholder="توضیحات"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mt-2 d-none d-lg-block p-3">
                                <img src="<?= asset('/public/images/projects/register-offer.jpg')  ?>" class="img-fluid" alt="">

                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-12 mt-3">
                            <div>
                                <p class="fs-4"> آیا نیاز دارید فایلی ضمیمه شود؟</p>
                            </div>
                            <div class="file w-100 mt-3 p-5">
                                <input type="file" name="" id="file-upload" multiple class="p-2 text-center  file-upload">
                                <label for="file-upload" class="p-2 w-50 m-auto">انتخاب فایل
                                    &nbsp; <i class="fa-solid fa-cloud-arrow-up"></i>
                                </label>
                                <h4 class="text-muted text-center mt-4 fs-5" id="selected-file-length">هیچ فایلی
                                    انتخاب نشده</h4>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="p-2 px-5 text-white fs-5 rounded-3 border-0" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">ثبت پیشنهاد</button>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- ====================================end-of-modal-register-offer ==================================== -->



<?php require_once(BASE_PATH . '/tamplate/App/layouts/footer.php') ?>