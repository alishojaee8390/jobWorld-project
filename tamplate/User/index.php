<?php require_once(BASE_PATH . '/tamplate/User/layouts/header.php') ?>

<!-- start modal exit -->
<!-- <div class="modal fade" id="logout">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4>آیا میخواهید خارج شوید ؟</h4>
                <i class="fas fa-exclamation-triangle text-warning fa-lg"></i>
            </div>
            <div class="modal-body">
                <p class="text-muted">اگر خارج شوید دوباره باید وارد حساب کاربری خود شوید</p>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" data-bs-dismiss="modal">خیر</a>
                <a href="" class="btn btn-success" data-bs-dismiss="modal">بله</a>
            </div>
        </div>
    </div>
</div> -->
<!-- end of modal exit -->


<!-- start card info -->
<section class="card-panel-info">
    <div class="row w-100 m-auto mt-5 p-0">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto ">
            <div class="row mt-5 pt-5">
                <div class="col-lg-4">
                    <div class="card-panel shadow-lg mt-3 mt-lg-0">
                        <div class="card-body h-100">
                            <div class="card-panel-desc d-flex justify-content-between p-3">
                                <?php if ($user['activity_user'] == 'freelancer') { ?>
                                    <div class="card-panel-title d-flex flex-column ">
                                        <span>پروژه هایی که پیشنهاد دادید</span>
                                        <span class="m-auto"><?= $suggestionCount['count(*)'] ?></span>
                                    </div>
                                <?php } else { ?>
                                    <div class="card-panel-title d-flex flex-column ">
                                        <span>پروژه های ایجاد شده</span>
                                        <span class="m-auto"><?= $projectCount['count(*)'] ?></span>
                                    </div>
                                <?php } ?>
                                <div class="card-panel-img">
                                    <i class="fa fa-clipboard-check fa-3x text-muted"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-panel-footer">
                            <div class="card-panel-footer-desct">
                                <?php if ($user['activity_user'] == 'freelancer') { ?>
                                    <a href="<?= url('panel/messages') ?>"
                                        class="d-flex justify-content-between align-items-center text-decoration-none text-white">مشاهده پیشنهاد های داده شده <i class="fa fa-angle-double-left"></i></a>
                                <?php } else { ?>
                                    <a href="<?= url('panel/projects') ?>"
                                        class="d-flex justify-content-between align-items-center text-decoration-none text-white">گزارش
                                        پروژه های ایجاد شده <i class="fa fa-angle-double-left"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-panel shadow-lg mt-3 mt-lg-0">
                        <div class="card-body h-100">
                            <div class="card-panel-desc d-flex justify-content-between p-3">
                                <div class="card-panel-title d-flex flex-column ">
                                    <span>موجودی حساب</span>
                                    <span class="m-auto"><?= $wallet['balance'] ?> تومان</span>
                                </div>
                                <div class="card-panel-img">
                                    <i class="fa fa-dollar  fa-3x text-muted"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-panel-footer">
                            <div class="card-panel-footer-desct">
                                <a href="<?= url('panel/balance') ?>"
                                    class="d-flex justify-content-between align-items-center text-decoration-none text-white">گزارش
                                    مالی<i class="fa fa-angle-double-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card-panel shadow-lg mt-3 mt-lg-0">
                        <div class="card-body h-100">
                            <div class="card-panel-desc d-flex justify-content-between p-3">
                                <div class="card-panel-title d-flex flex-column ">
                                    <span>پروفایل </span>
                                    <span class="m-auto">پروفایل خود را تکمیل کنید </span>
                                </div>
                                <div class="card-panel-img">
                                    <i class="fa fa-user-alt fa-3x text-muted"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-panel-footer">
                            <div class="card-panel-footer-desct">
                                <a href="<?= url('panel/account') ?>"
                                    class="d-flex justify-content-between align-items-center text-decoration-none text-white">پروفایل<i
                                        class="fa fa-angle-double-left"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


</section>
<!-- end of card info -->


<!-- start last message and Latest offers  -->
<section class="last-message-offers">
    <div class="row w-100 mt-3 m-auto">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto ">
            <div class="row w-100 m-auto">
                <div class="col-lg-12 col-xl-6 mt-2">
                    <?php if ($user['activity_user'] === 'employer') { ?>
                        <div class="last-message h-100 shadow-lg">
                            <div class="last-message-header d-flex justify-content-between align-items-center p-3 ">
                                <span>آخرین پیشنهاد های روی پروژه شما</span>
                                <a href="<?= url('panel/messages') ?>" class="text-decoration-none d-flex align-items-center">مشاهده همه پیشنهاد ها <i
                                        class="fa fa-angle-left me-2"></i></a>
                            </div>
                            <?php if ($messageLastSuggestions) {
                                foreach ($messageLastSuggestions as $messageLastSuggestion) {


                            ?>
                                    <div
                                        class="last-message-main d-flex justify-content-between align-items-center p-3 mt-2 flex-column flex-md-row">
                                        <div class="last-message-desc">
                                            <div class="last-message-aother text-center text-md-end">
                                                <img src="<?= asset($messageLastSuggestion['image']) ?>"
                                                    class="img-fluid img-thumbnail" alt="">
                                                <span><?= $messageLastSuggestion['first_name'] . ' ' . $messageLastSuggestion['last_name'] ?></span>

                                            </div>
                                            <p>زمان پیشنهادی فریلنسر : <span class="text-success"><?= $messageLastSuggestion['deadline_work'] ?> روز</span> ضمانت تخصص : <span class="text-success">%<?= $messageLastSuggestion['guaranteed_expertise'] ?></span></p>
                                            <p>مبلغ پیشنهادی فریلنسر : <span class="text-success"><?= $messageLastSuggestion['pirce'] ?> تومان</span></p>
                                            <p class="text-muted py-2">
                                                <?= substr($messageLastSuggestion['descriptionsuggestion'], 0, 30) . ' ...' ?>
                                            </p>
                                        </div>
                                        <div class="last-message-show-message">

                                            <a href="<?= url('panel/message-detils/' . $messageLastSuggestion['suggestionid'] . '/user/' . $messageLastSuggestion['userid'])  ?>">چت کنید</a>
                                        </div>
                                    </div>
                                <?php }
                            } else { ?>

                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <div class="last-message h-100 shadow-lg">
                            <div class="last-message-header d-flex justify-content-between align-items-center p-3 ">
                                <span>آخرین پیشنهاد هایی که داده اید</span>
                                <a href="<?= url('panel/messages') ?>" class="text-decoration-none d-flex align-items-center">مشاهده همه پیشنهاد ها <i
                                        class="fa fa-angle-left me-2"></i></a>
                            </div>
                            <?php if ($messageLastSuggestionsFreelancers) {
                                foreach ($messageLastSuggestionsFreelancers as $messageLastSuggestion) {


                            ?>
                                    <div
                                        class="last-message-main d-flex justify-content-between align-items-center p-3 mt-2 flex-column flex-md-row">
                                        <div class="last-message-desc">
                                            <div class="last-message-aother text-center text-md-end">
                                                <img src="<?= asset($messageLastSuggestion['image']) ?>"
                                                    class="img-fluid img-thumbnail" alt="">
                                                <span><?= $messageLastSuggestion['first_name'] . ' ' . $messageLastSuggestion['last_name'] ?></span>

                                            </div>
                                            <p>زمان پیشنهادی کارفرما : <span class="text-success"><?= $messageLastSuggestion['suggested_time'] ?> روز</span></p>
                                            <p>مبلغ پیشنهادی کارفرما : <span class="text-success"><?= $messageLastSuggestion['budget'] ?> تومان</span></p>
                                            <p class="text-muted py-2">
                                                <?= substr($messageLastSuggestion['description'], 0, 30) . ' ...' ?>
                                            </p>
                                        </div>
                                        <div class="last-message-show-message">
                                            <a href="<?= url('panel/message-detils/' . $messageLastSuggestion['suggestionid'] . '/user/' . $messageLastSuggestion['project_userid'])  ?>">چت کنید</a>
                                        </div>
                                    </div>
                                <?php }
                            } else { ?>

                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                <?php if ($user['activity_user'] === 'freelancer') { ?>
                    <div class="col-lg-12 col-xl-6 mt-2">
                        <div class="offers h-100 mt-2 mt-xl-0">

                            <div class="offer-date text-center my-3">
                                <span><?= jalaliDate($dateNow) ?></span>
                            </div>
                            <div class="offers-list d-flex">

                                <div
                                    class="Number-offers  w-100 d-flex flex-column justify-content-center align-items-center">
                                    <span>تعداد پیشنهاد های شما</span>
                                    <h2 class="fs-1"><?= $suggestions['suggestions'] ?></h2>
                                    <span class="text-center">پیشنهاد از 10 پیشنهاد شما باقی مانده</span>
                                </div>
                                <div
                                    class="Increase-offer  w-100 me-1  d-flex flex-column justify-content-center align-items-center">
                                    <span>افزایش پیشنهاد</span>
                                    <h2 class="fs-1">10</h2>
                                    <span class="text-center">10 پیشنهاد به شما اضافه میشود</span>
                                    <a href="#" class="text-decoration-none text-white mt-2">افزایش</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- <div class="col-lg-12 col-xl-6 mt-2 ">
                    <?php if ($user['activity_user'] == 'freelancer') { ?>
                        <div class="Latest-offers h-100">
                            <div
                                class="Latest-offers-header d-flex justify-content-between align-items-center p-3 flex-column flex-md-row">
                                <span>آخرین پیشنهاد ها و پروژه های شما</span>
                                <a href="#" class="text-decoration-none d-flex align-items-center mt-2 mt-md-0">مشاهده
                                    همه پیشنهاد <i class="fa fa-angle-left me-2"></i></a>
                            </div>
                            <?php if ($lastSuggestionProjects) {

                                foreach ($lastSuggestionProjects as $lastSuggestionProject) {
                            ?>

                                    <div class="Latest-offers-main mt-2 p-3">
                                        <p class="atest-offers-title">
                                            <?= $lastSuggestionProject['title'] ?>
                                        </p>
                                        <p class="atest-offers-budget"><span class="text-danger">بودجه پیشنهادی :</span>
                                            <?= $lastSuggestionProject['pirce'] ?>
                                            تومان</p>
                                        <p class="atest-offers-time"><span class="text-danger">زمان پیشنهادی :</span>
                                            <?= $lastSuggestionProject['deadline_work'] ?> روز </p>
                                        <p class="text text-danger">متن پیشنهاد :</p>
                                        <p class="text-muted"> <?= $lastSuggestionProject['description'] ?></p>
                                    </div>
                        </div>
                    <?php }
                            } else { ?>

                    <div class="text-center mt-5 text-danger fw-bold fs-5">پیشنهادی ثبت نکرده اید</div>
            <?php }
                        } ?>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- end of last message and Latest offers  -->


<!-- start employment and offer -->

<section class="employment-offer mt-3">
    <div class="row w-100 m-auto">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto ">
            <div class="row w-100 m-auto">
                <!-- <div class="col-lg-12 col-xl-7">
                    <div class="employment shadow-lg">
                        <div class="employment-header d-flex justify-content-between align-items-center p-3 flex-column flex-md-row">
                            <span>شرکت هایی که روزمه برای استخدامی ارسال کرده اید</span>
                            <a href="#" class="text-decoration-none d-flex align-items-center mt-3  mt-md-0">مشاهده
                                همه رزومه های ارسال شده <i class="fa fa-angle-left me-2"></i></a>
                        </div>
                        <div class="employment-main  p-3 mt-2">
                            <div class="employment-desc p-3">
                                <div class="employment-aother">
                                    <img src="<?= asset('public/images/portfolio6.jpg') ?>" class="img-fluid img-thumbnail" alt="">
                                    <span>کار اموز طراح وب و اپ</span>

                                </div>
                                <p class="text-muted py-2">ارسال شده برای مرکز توسعه فناوری و نوآوری صنعتی شریف ...
                                </p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center  flex-column flex-md-row">
                                <div class="last-few-days">
                                    <span>4 روز پیش</span>
                                </div>
                                <div class="employment-show mt-2 mt-md-0">
                                    <a href="#" class="text-decoration-none d-flex align-items-center">مشاهده
                                        درخواست ارسال شده <i class="fa fa-angle-left me-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>
        </div>
    </div>
</section>


<!-- end of employment and offer -->

<?php require_once(BASE_PATH . '/tamplate/User/layouts/footer.php') ?>