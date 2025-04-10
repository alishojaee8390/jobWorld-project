<?php require_once(BASE_PATH . '/tamplate/App/layouts/header.php')  ?>


<section class="search-box">

    <div class="container">
        <div class="row">
            <form action="<?= url('search-projects/') ?>" method="post">
                <div class="search-box-content mt-5 shadow-lg">
                    <div class="search-input d-flex align-items-center ">
                        <i class="fa fa-search text-muted"></i>
                        <input class="form-control" type="search" placeholder="جستجو ..." name="search">
                    </div>
                </div>
                <div class="btn-search text-center mt-2">
                    <button type="submit">جستجو</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="list-projects mt-5">
    <div class="container">
        <h3 class="text-center border-bottom rounded-3 p-2 text-muted border-success"><?= $categoryName['name'] ?></h3>
        <?php
        if (!empty($projectFilterCategory)) {
            foreach ($projectFilterCategory as $project) {




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
                                <a href="<?= url('view-project/' . $project['id']) ?>">مشاهده پروژه</a>
                            </div>
                        </div>
                    </div>
                </div>



            <?php }
        } else { ?>

            <div class="d-flex justify-content-center align-items-center vh-100">
                <h2 class="text-muted fs-5">هیچ پروژه در این دسته بندی وجود ندارد
                    <h2 />

            </div>



        <?php } ?>


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


</section>





<?php require_once(BASE_PATH . '/tamplate/App/layouts/footer.php') ?>