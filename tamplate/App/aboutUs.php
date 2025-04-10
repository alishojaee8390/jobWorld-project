<?php require_once(BASE_PATH . '/tamplate/App/layouts/header.php') ?>



<main>

    <div class="container">
        <h2 class="text-center mt-5"> <?= $page['title'] ?></h2>
        <div class="p-3 h-auto lh-lg fs-4 mt-5">
            <?= $page['description'] ?>

        </div>
    </div>
</main>


<?php require_once(BASE_PATH . '/tamplate/App/layouts/footer.php') ?>