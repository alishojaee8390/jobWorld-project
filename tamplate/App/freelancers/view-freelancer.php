<?php require_once(BASE_PATH . '/tamplate/App/layouts/header.php') ?>

<!-- ====================================start-profile-freelancer ==================================== -->

<section class="section-profile-freelancer">
    <div class="container">
        <?php
         $messageError = flash('errorSendMail');
         $messageSuccess = flash('successSendMail');
        
        
        if (!empty($messageError)) {
            ?>
        
            <div class="alert alert-danger alert-dismissible fade show mt-2 fs-6 d-flex  gap-1 align-items-center mt-4"
                role="alert">
        
                <i class="fa fa-close ms-1 bg-danger text-white rounded-circle" style="width: 15px; padding:2px"></i>
                <?= $messageError ?>
        
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } ?>
        <?php if (!empty($messageSuccess)) { ?>
            <div class="alert alert-success alert-dismissible fade show mt-2fs-6 d-flex  gap-1 align-items-center mt-4" role="alert">
        
                <i class="fa fa-check ms-1 bg-success text-white rounded-circle" style="width: 15px; padding:2px"></i>
                <?= $messageSuccess ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } ?>
        <div class="profile-freelancer shadow-sm rounded-3 p-3  mt-4">
            <div class="nav-top-profile-info border-bottom pb-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="">
                                <img src="<?= ($freelancer['image']) ? asset($freelancer['image']) : asset('/public/images/users/user.png') ?>"
                                    class="img-fluid rounded-circle" width="80px" alt="freelancer image">
                            </div>
                            <div class="me-3 text-muted">
                                <h4 class="text-dark"><?= $freelancer['first_name'] . ' ' .  $freelancer['last_name'] ?>
                                </h4>
                                <i class="fa fa-location-dot"></i>
                                <?= $freelancer['city'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center justify-content-center">
                        <div
                            class="btn-Invited-to-cooperate d-flex align-items-center justify-content-center my-4 my-md-0">
                            <?php if($disableBtnInvitationCooperate){ ?>
                            <a href="<?= url('/invitation-cooperate/' . $userIdFreelancerGet) ?>" class="p-3">دعوت به همکاری</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-information-freelancer mt-3 p-3">
                <div class="about-freelancer">
                    <h3 class="border-bottom d-inline p-1 border-danger">درباره فریلنسر</h3>
                    <p class="my-5 text-muted">
                        <?= ($freelancer['about']) ? $freelancer['about'] : 'مطلبی وجود ندارد' ?></p>
                </div>
                <div class="education-freelancer">
                    <h3 class="border-bottom d-inline p-1 border-danger">تحصیلات</h3>
                    
                        <?php if ($educations) {
                            foreach ($educations as $education) {
                        ?>
                    <div class="mt-4">
                        <p><span class="fs-4">دانشگاه : </span><span class="fs-4 text-danger"><?= $education['university_name'] ?></span></p>
                        <p><span class="fs-5">رشته تحصیلی : </span><span class="fs-5 text-danger"><?= $education['feild_study'] ?></span></p>
                        <p class="fs-5"><?= $education['description'] ?></p>
                        <p><span class="fs-5">از تاریخ : </span><span class="fs-5 text-danger"><?= $education['date_start'] ?></span><span class="fs-5">تا </span><span class="fs-5 text-danger"><?= $education['date_end'] ?></span></p>
                    </div>

                <?php }
                        } else { ?>
                <p class="my-5 text-muted">
                    مطلبی وجود ندارد</p>
            <?php } ?>
                </div>
                <div class="work-experience">
                    <h3 class="border-bottom d-inline p-1 border-danger">تجربه کاری</h3>
                    <?php if ($workExperiences) {
                            foreach ($workExperiences as $workExperience) {
                        ?>

                    <div class="mt-4">
                        <p><span class="fs-4">شرکت : </span><span class="fs-4 text-danger"><?= $workExperience['compony_name'] ?></span></p>
                        <p><span class="fs-5">سمت شغلی : </span><span class="fs-5 text-danger"><?= $workExperience['job'] ?></span></p>
                        <p class="fs-5"><?= $workExperience['description'] ?></p>
                        <p><span class="fs-5">از تاریخ : </span><span class="fs-5 text-danger"><?= $workExperience['date_start'] ?></span><span class="fs-5">تا </span><span class="fs-5 text-danger"><?= $workExperience['date_end'] ?></span></p>
                    </div>

                <?php }
                        } else { ?>
                <p class="my-5 text-muted">
                    مطلبی وجود ندارد</p>
            <?php } ?>
                </div>
                <div class="skills-freelancer">
                    <h3 class="border-bottom d-inline p-1 border-danger">مهارت ها</h3>
                    <ul class="list-unstyled list-inline mt-4 pe-0">
                        <?php foreach ($skills as $skill) { ?>
                            <li class="list-inline-item badge bg-danger p-2 px-4 my-2 me-2"><?= $skill ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="worksamples-freelancer mt-4 rounded-3 shadow-lg p-3">
            <div class="title-worksamples bg-success text-center p-3 rounded-3 text-white fs-4">
                نمونه کارها
            </div>
            <div class="worksamples mt-4">
                <div class="row">
                    <?php
                    if ($portfolios) {


                        foreach ($portfolios as  $portfolio) { ?>
                            <div class="col-lg-4 my-3 d-flex justify-content-center">
                                <div class="card shadow-lg border-0 h-100" style="width: 85%;">
                                    <img src="<?= asset($portfolio['image']) ?>" class="card-img-top p-4" style="height: 400px !important;" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-center mt-2"><?= $portfolio['title'] ?></h5>
                                        <p class="card-text text-center p-2 text-muted"><?= substr($portfolio['description'], 0, 100) . ' ... ' ?></p>
                                    </div>
                                    <div class="card-body text-center">
                                        <a class="btn btn-outline-primary d-block" href="<?= url('show-portfolio/' . $portfolio['id']) ?>" class="card-link">مشاهده نمونه
                                            کار</a>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } else { ?>

                        <div>
                            <p class="text-center ">هیچ نمونه کاری وجود ندارد</p>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==================================== end-of-profile-freelancer ==================================== -->

<?php require_once(BASE_PATH . '/tamplate/App/layouts/footer.php') ?>