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
        <h3 class="text-center border-bottom rounded-3 p-2 text-muted border-success">جستجوی شما</h3>
    
        <div class="row">
            <?php if (!empty($freelancersSearch)) {
                foreach ($freelancersSearch as $freelancer) {
                    $userInfo = explode(',', $freelancer['userinfo_freelancer']);
                    $userInfo = array_slice($userInfo , 0 ,  4);
            ?>
                    <div class="col-lg-3 mt-3">
                        <div class="card-freelancer  shadow-lg p-2 h-100 d-flex flex-column justify-content-between">
                            <!-- <div class="card-freelancer-star">
                        <ul class="list-inline text-start p-1">
                            <li class="list-inline-item m-0 text-warning"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item m-0 text-warning"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item m-0 text-warning"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item m-0 text-warning"><i class="fa fa-star"></i></li>
                            <li class="list-inline-item m-0 text-warning"><i class="fa fa-star"></i></li>
                        </ul>
                    </div> -->
                            <div class="card-freelancer-img text-center">
                                <img src="<?= ($freelancer['image']) ? asset($freelancer['image']) : asset('public/images/users/user.png') ?>"
                                    class="img-fluid rounded-circle w-50"
                                    alt="<?= $freelancer['first_name'] . ' ' . $freelancer['last_name'] ?>">
                            </div>
                            <div class="card-freelancer-info  mt-3">
                                <h5 class="text-center text-secondary">
                                    <?= $freelancer['first_name'] . ' ' . $freelancer['last_name'] ?></h5>
                                <h5 class="text-center text-info fs-6"><?= $freelancer['expertise_title'] ?></h5>
                                <p class="text-center"><i
                                        class="fa fa-map-marker-alt ms-1 text-primary"></i><?= $freelancer['city'] ?></p>
                            </div>
                            <div class="card-freelancer-skills p-2">
                                <div class="d-flex gap-1">
                                    <?php foreach ($userInfo as $key => $info) { ?>
                                            <p class="bg-danger text-white p-1 rounded-3 w-50 text-center"><?= $info ?></p>
                                    <?php } ?>
                                </div>

                            </div>
                            <div class="card-freelancer-btn d-flex p-2 ">
                                <a href="<?= url('view-freelancer/' . $freelancer['id']) ?>"
                                    class="btn btn-outline-success w-50">مشاهده پروفایل</a>
                                <a href="" class="btn btn-outline-primary w-50  me-1">دعوت به همکاری</a>
                            </div>
                        </div>

                    </div>
            <?php    }
            } ?>

        </div>

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