<?php require_once(BASE_PATH . '/tamplate/App/layouts/header.php') ?>
<?php require_once(BASE_PATH . '/tamplate/App/layouts/header-main.php') ?>

<!-- proficiency start -->

<section class="mt-5">
    <div class="row w-100 m-0">
        <div class="col-lg-4 m-auto">

            <div class="proficiency-title ">
                <h2 class="text-center text-muted">مهارت خودتو انتخاب کن تا پروژه ها رو ببینی</h2>
            </div>
        </div>
    </div>

    <div class="container">


        <div class="row m-0">

            <?php foreach ($categories as $category) { ?>
                <div class="col-md-6 col-lg-3 mt-5">
                    <div class="card-proficiency text-center animated">
                        <h5 class="text-secondary text-center"><?= $category['name'] ?></h5>
                        <div class="card-body-proficiency h-75 mb-3 text-center">
                            <img src="<?= asset($category['image']) ?>" class="mw-100" alt="">
                        </div>
                        <a href="<?= url("show-projects/" . $category['id']) ?>" class="text-decoration-none fw-bold">دیدن
                            پروژه
                            ها</a>
                    </div>
                </div>
            <?php } ?>

        </div>
        <div class="btn-see mt-5 text-center">
            <a href="<?= url('show-projects') ?>" class="btn text-white">دیدن همه پروژه ها</a>
        </div>
    </div>
</section>
<!-- end of proficiency -->

<!-- today job start -->
 <?php if($projectTodayAllLimit){ ?>
<section class="mt-5">
    <div class="row w-100 m-0">
        <div class="col-lg-4 m-auto">
            <div class="today-job-title ">
                <h2 class="text-center text-muted">پروژه های امروز</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row mt-5 m-0">
            <div class="col-lg-5 mt-5">
                <div class="today-job">
                    <div class="card-title d-flex justify-content-evenly mb-5 align-items-center">
                        <h4>پروژه های امروز</h4>
                        <a href="<?= url('show-projects-today') ?>" class="text-info text-decoration-none d-flex align-items-center">پروژه های
                            بیشتر<i class="fa fa-arrow-left me-1"></i></a>
                    </div>
                    <div class="owl-carousel owl-theme owl-rtl owl-loaded owl-drag" id="employer">
                        <?php foreach ($projectTodayAllLimit as $project) { ?>

                            <div class="card shadow-sm  m-auto">
                                <div class="card-body p-4 ">
                                    <div class="employer d-flex justify-content-between align-items-center mb-5">
                                        <div class="employer-desc d-flex align-items-center ">
                                            <div class="me-3 mt-4">
                                                <h5><?= $project['title'] ?></h5>
                                                <p class="fs-6 text-muted"> زمان پیشنهادی <?= $project['suggested_time'] ?>
                                                    روز
                                                </p>
                                            </div>

                                        </div>

                                        <div class="employer-summry ">
                                            <span class="p-1 px-3">بودجه <?= $project['budget'] ?> تومان</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="employer-footer d-flex justify-content-between align-items-center">
                                        <span class="text-secondary">امروز</span>
                                        <a href="<?= url('view-project/' . $project['id']) ?>" class="btn">توضیحات بیشتر</a>
                                    </div>

                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 mt-5">
                <div class="today-img d-lg-block d-none">
                    <img src="<?= asset('public/images/job-left.jpg') ?>" class="img-fluid" alt="">
                </div>

            </div>
        </div>
    </div>
</section>
<?php }?>
<!-- end of today job -->

<!-- start work exmpale -->
<section class="mt-5">
    <div class="row w-100 m-0">
        <div class="col-lg-4 m-auto">
            <div class="today-job-title ">
                <h2 class="text-center text-muted"> فریلنسر ها</h2>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row m-0">
            <div class="col-lg-7">
                <div class="today-img d-lg-block d-none">
                    <img src="<?= asset('public/images/work-exmpale-right.jpg') ?>" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-lg-5">

                <div class="row m-0">

                    <?php foreach ($freelancers as $freelancer) { ?>

                        <div class="col-lg-6 mt-5">
                            <div class="card-work-exmpale h-100 justify-content-between ">
                                <div class="card h-100 justify-content-between">
                                    <div class="card-img ">
                                        <img src="<?= ($freelancer['image']) ? asset($freelancer['image']) : asset('public/images/users/user.png') ?>" class="img-fluid card-img-top">
                                    </div>
                                    <div class="card-body">
                                        <h2 class="text-center text-danger"><?= $freelancer['expertise_title'] ?></h2>
                                    </div>
                                    <div class="card-freelancer border-top  d-flex justify-content-between p-4">
                                        <div class="freelancer">
                                            <span>فریلنسر :
                                                <span><?= $freelancer['first_name'] . ' ' . $freelancer['last_name'] ?></span></span>
                                        </div>
                                        <div class="CV">
                                            <a href="<?= url('view-freelancer/' . $freelancer['id']) ?>" class="text-decoration-none text-danger">مشاهده</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php    } ?>

                    <div class="text-center mt-5">
                        <a href="<?= url('show-freelancers') ?>" class="btn btn-work-exmpale">نمایش همه فریلنسر ها</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of work exmpale -->

<!-- start work-data -->
<section class="work-data mt-5 animated fadeInLeft">

    <div class="d-flex justify-content-evenly py-5 ">

        <div class="d-flex flex-column w-25 justify-content-center align-items-center">
            <span class="text-white fs-3 text-center">پروژه ها</span>
            <div class="d-flex align-items-center gap-1">
                <span class="fs-4 counter">+<?= $projectsCount['COUNT(*)'] ?></span>
                <i class="fa fa-plus"></i>
            </div>
        </div>
        <!-- <div class="d-flex flex-column w-25 justify-content-center align-items-center">
            <span class="text-white fs-3">کارجویان</span>
            <span class="fs-4 counter">1800</span>
        </div> -->
        <div class="d-flex flex-column w-25 justify-content-center align-items-center">
            <span class="text-white fs-3">فریلنسر ها</span>
            <div class="d-flex align-items-center gap-1">

                <span class="fs-4 counter">

                    <?= $freelancersCount['COUNT(*)'] ?></span>
                <i class="fa fa-plus"></i>
            </div>
        </div>
        <div class="d-flex flex-column w-25 justify-content-center align-items-center">
            <span class="text-white fs-3">کارفرمایان</span>
            <div class="d-flex align-items-center gap-1">
                <span class="fs-4 counter">+<?= $employersCount['COUNT(*)'] ?></span>
                <i class="fa fa-plus"></i>
            </div>
        </div>
    </div>
</section>
<!-- end of work-data -->


<?php require_once(BASE_PATH . '/tamplate/App/layouts/footer.php') ?>