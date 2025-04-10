<?php require_once(BASE_PATH . '/tamplate/App/layouts/header.php') ?>


<!-- ==================================== card-freelancers-start ==================================== -->

<section class="card-freelancers mt-5">
    <div class="container">
        <div class="row">
            <?php if (!empty($freelancers)) {
                foreach ($freelancers as $freelancer) {
                    $userInfo = explode(',', $freelancer['userinfo_freelancer']);
                    $userInfo = array_slice($userInfo , 0 ,  4);
            ?>
                    <div class="col-lg-3 mt-3">
                        <div class="card-freelancer  shadow-lg p-2 h-100 d-flex flex-column justify-content-between">
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
                                    class="btn btn-outline-success w-100">مشاهده پروفایل</a>
                               
                            </div>
                        </div>

                    </div>
            <?php    }
            } ?>

        </div>
    </div>

</section>
<!-- ==================================== card-freelancers-end ==================================== -->

<!-- ==================================== start-pagination ==================================== -->
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
<!-- ==================================== end-of-pagination ==================================== -->
<?php require_once(BASE_PATH . '/tamplate/App/layouts/footer.php') ?>