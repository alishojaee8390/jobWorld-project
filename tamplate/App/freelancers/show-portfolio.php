<?php require_once(BASE_PATH . '/tamplate/App/layouts/header.php') ?>



<section class="show-portfolio">
    <div class="container">
        <div class="my-5 shadow-sm">

            <div class="portfolio-title bg-light p-3 rounded-3">
                <h1 class="fs-4"><?= $portfolio['title'] ?></h1>
            </div>
            <div class="portfolio-img p-5">
                <img src="<?= asset($portfolio['image']) ?>" class="img-fulid h-100 w-100 img-thumbnail" alt="">
            </div>
            <div class="portfolio-desc p-5">
                <p class="fs-5">
                    <?= $portfolio['description'] ?>
                </p>
            </div>
            <div class="portfolio-skills p-5">
                <div>
                    <h2> تکنولوژی های استفاده شده :
                    </h2>
                </div>
                <div>  <ul class="list-unstyled list-inline mt-4 pe-0">
                    <?php if ($skills) {
                        foreach ($skills as $skill) {
                    ?>
                          <li class="list-inline-item badge bg-danger p-2 px-4 my-2 me-2"><?= $skill ?></li>
                    <?php }
                    } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<?php require_once(BASE_PATH . '/tamplate/App/layouts/footer.php') ?>