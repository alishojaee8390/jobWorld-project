<?php require_once(BASE_PATH . '/tamplate/App/layouts/header.php')  ?>


<!-- search box start -->

<section class="search-box">

    <div class="container">
        <div class="row">
            <form action="<?= url('search-projects/') ?>" method="post">
            <div class="search-box-content mt-5 shadow-lg">

                    <div class="search-input d-flex align-items-center ">
                        <i class="fa fa-search text-muted"></i>
                        <input class="form-control" type="search" placeholder="جستجو ..." name="search">
                    </div>
                    <!-- <div class="w-100 d-flex align-items-center ps-2">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>همه قیمت ها</option>
                        <option value="1">از 50000 تومان تا 10000 تومان</option>
                        <option value="2">از 450000 تومان تا 500000 تومان</option>
                        <option value="3">از 90000 تومان تا 1000000 تومان</option>
                    </select>
                    <i class="fa fa-dollar text-muted"></i>
                </div>

                <div class="w-100  d-flex align-items-center ps-2">
                    <select class="form-select" aria-label="Default select example">

                        <option selected>همه مهارت ها</option>
                        <option value="1">طراحی وب و برنامه نویسی</option>
                        <option value="2">طراحی لگو </option>
                        <option value="3">دیجیتال مارکتینگ</option>

                    </select>
                    <i class="fa fa-cogs text-muted"></i>
                </div> -->
            </div>
            <div class="btn-search text-center mt-2">
            <button type="submit">جستجو</button>
            </div>
        </form>
    </div>
    </div>
</section>

<!-- end of search box -->



<!-- list project start -->



<section class="list-projects mt-5">
    <div class="container">
        <h3 class="text-center border-bottom rounded-3 p-2 text-muted border-success">پروژه طبق جستجوی شما</h3>
        <?php
        if (!empty($projects)) {
            foreach ($projects as $project) {




        ?>

                <div class="card-projects shadow-lg mt-3">
                    <div class="row">

                        <div class="col-lg-6">

                            <div class="card-projects-desc">
                                <h1><?= $project['title'] ?></h1>
                                <span class="text-danger p-2">بودجه : <span class="text-muted px-2"><?= $project['budget'] ?>
                                        تومان</span></span>
                                <span class="text-danger p-2"> زمان پیشنهادی : <span class="text-muted px-2">
                                        <?= $project['suggested_time'] ?>
                                        روز</span></span>
                                <p class="text-muted"> <?= substr($project['description'], 0, 80) . ' ...' ?>
                                </p>
                                <div class="date-projects w-25">
                                    <span><?php $createdDate = new DateTime($project['created_at']);
                                            $today = new DateTime();
                                            $interval = $today->diff($createdDate);
                                            if ($interval->days === 0) {
                                                echo 'امروز';
                                            } else {

                                                echo $interval->days . " روز پیش ";
                                            } ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="btn-projects ">
                                <!-- <a href="#" class="">نشان کن</a> -->


                                <a href="<?= url('view-project/' . $project['id']) ?>">مشاهده پروژه</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of list project -->


            <?php }
        } else { ?>

            <div class="d-flex justify-content-center align-items-center vh-100">
                <h2 class="text-muted fs-5">هیچ پروژه در یافت نشد
                    <h2 />

            </div>



        <?php } ?>

        <!-- start pagination -->
        <!-- start pagination -->
        <nav aria-label="Page navigation example">

            <ul class="pagination justify-content-center mt-3">
                <?php if ($page > 1): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>"><i class="fa fa-angles-right"></i></a></li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>

                    <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>


                <?php if ($page < $totalPages): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $page + 1; ?>"><i class="fa fa-angles-left"></i></a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <!-- end of pagination -->

        <!-- end of pagination -->
</section>





<?php require_once(BASE_PATH . '/tamplate/App/layouts/footer.php') ?>