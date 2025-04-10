<?php
require_once(BASE_PATH . '/tamplate/Admin/layouts/header.php');
?>



<section class="card-panle-admin d-flex justify-content-center vh-100" style="height: 85vh;">
    <div class="row w-100 mt-5">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto mt-5">
            <div class="shadow p-3 rounded-3 bg-white ">
                <h3 class="text-center my-3">
                    <?= $page['title'] ?>
                </h3>
                <form action="<?= url('admin/terms-conditions/update') ?>" method="post">

                    <textarea class="form-control border" name="description" id="description" cols="50"
                        rows="50"><?= $page['description'] ?></textarea>

                    <button class="btn  w-100 btn-outline-success mt-5">ذخیره</button>

                </form>


            </div>
        </div>
    </div>
</section>






<?php
require_once(BASE_PATH . '/tamplate/Admin/layouts/footer.php');
?>