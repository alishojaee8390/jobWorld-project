<?php require_once(BASE_PATH . '/tamplate/User/layouts/header.php') ?>

<section class="user-account">
    <div class="row w-100 m-auto mt-5 p-0">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto mt-5">

            <div class="container">

                <?php if ($user['activity_user'] === 'freelancer') { ?>
                    <h2 class="text-center mt-4 text-danger">پیشنهاد هایی که به پروژه ها داده اید</h2>

                    <div class="row">
                        <?php if ($messageSuggestionsFreelancers) {

                            foreach ($messageSuggestionsFreelancers as $messageSuggestion) {


                        ?>
                                <div class="col-lg-12">
                                    <div class="bg-white p-3 mt-4 mb-3 rounded-3 shadow-sm">
                                        <div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h2 class="text-danger"><?= $messageSuggestion['title'] ?></h2>
                                                <div>
                                                    <?php if ($project) {
                                                        if ($project['id'] == $messageSuggestion['project_id']) {
                                                    ?>
                                                            <div class="d-inline">
                                                                <span class="text-danger">کارفرما شما رو استخدام گردید</span>
                                                                <a href="<?= url('panel/milestones/' . $messageSuggestion['suggestionid'] . '/user/' . $messageSuggestion['project_userid']) ?>" class="btn btn-primary fs-5">مشاهده مراحل</a>
                                                            </div>
                                                    <?php }
                                                    } ?>
                                                    <a href="<?= url('panel/message-detils/' . $messageSuggestion['suggestionid'] . '/user/' . $messageSuggestion['project_userid']) ?>" class="btn btn-success fs-5">

                                                        چت کنید
                                                    </a>

                                                </div>
                                            </div>
                                            <div>

                                                <p>کارفرما : <span class="text-success fs-5"><?= $messageSuggestion['first_name'] . ' ' .  $messageSuggestion['last_name'] ?></span></p>
                                                <p>متن : <span class="text-success fs-5"><?= $messageSuggestion['description'] ?></span></p>
                                                <p>زمان پیشنهادی کارفرما : <span class="text-success fs-5"><?= $messageSuggestion['suggested_time'] ?> روز</span></span></p>
                                                <p>مبلغ پیشنهادی کارفرما : <span class="text-success fs-5"><?= $messageSuggestion['budget'] ?> تومان</span></p>
                                            </div>
                                            <p class="fs-5 mt-2"></p>

                                        </div>

                                    </div>
                                </div>
                        <?php  }
                        } ?>

                    </div>

                <?php } else { ?>
                    <h2 class="text-center mt-4 text-danger">پیشنهاد های شما</h2>

                    <div class="row">
                        <?php if ($messageSuggestions) {

                            foreach ($messageSuggestions as $messageSuggestion) {


                        ?>
                                <div class="col-lg-12">
                                    <div class="bg-white p-3 mt-4 mb-3 rounded-3 shadow-sm">
                                        <div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <h2 class="text-danger"><?= $messageSuggestion['title'] ?></h2>
                                                <div>
                                                    <?php if ($projectAssigned['freelancer_id'] == $messageSuggestion['userid']) { ?>
                                                        <a href="<?= url('panel/milestones/' . $messageSuggestion['suggestionid'] . '/user/' . $messageSuggestion['userid']) ?>" class="btn btn-primary fs-5">ایجاد مرحله</a>
                                                    <?php } else { ?>
                                                        <a href="<?= url('panel/Hiring-freelancer/' . $messageSuggestion['suggestionid'] . '/user/' . $messageSuggestion['userid']) ?>" class="btn btn-danger fs-5">استخدام فریلنسر</a>
                                                    <?php } ?>
                                                    <a href="<?= url('panel/message-detils/' . $messageSuggestion['suggestionid'] . '/user/' . $messageSuggestion['userid']) ?>" class="btn btn-success fs-5">

                                                        چت کنید
                                                    </a>
                                                </div>
                                            </div>
                                            <div>

                                                <p>فریلنسر : <span class="text-success fs-5"><?= $messageSuggestion['first_name'] . ' ' .  $messageSuggestion['last_name'] ?> [ <?= $messageSuggestion['expertise_title'] ?> ] </span></p>
                                                <p>متن پیشنهاد : <span class="text-success fs-5"><?= $messageSuggestion['descriptionsuggestion'] ?></span></p>
                                                <p>زمان پیشنهادی فریلنسر : <span class="text-success fs-5"><?= $messageSuggestion['deadline_work'] ?> روز</span> ضمانت تخصص : <span class="text-success fs-5">%<?= $messageSuggestion['guaranteed_expertise'] ?></span></p>
                                                <p>مبلغ پیشنهادی فریلنسر : <span class="text-success fs-5"><?= $messageSuggestion['pirce'] ?> تومان</span></p>
                                            </div>
                                            <p class="fs-5 mt-2"></p>

                                        </div>

                                    </div>
                                </div>
                        <?php  }
                        } ?>

                    </div>
                <?php } ?>
            </div>
        </div>


</section>



<?php require_once(BASE_PATH . '/tamplate/User/layouts/footer.php') ?>