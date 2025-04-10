<?php require_once(BASE_PATH . '/tamplate/User/layouts/header.php') ?>

<section class="user-account">
    <div class="row w-100 m-auto mt-5 p-0">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto mt-5">

            <div class="container">


                <div class="row">
                    <?php if ($projects) {
                        foreach ($projects as $project) {
                    ?>
                            <div class="col-lg-12">
                                <div class="bg-white p-3 mt-4 rounded-3 ">
                                    <div>
                                        <div class="d-flex justify-content-between align-items-center">


                                            <h2 class="text-danger"><?= $project['title'] ?></h2>
                                            <div>
                                                <a href="<?= url('panel/edit-project/' . $project['id']) ?>" class="btn text-warning"><i class="fa fa-edit"></i>
                                                    ویرایش</a>
                                                <a href="<?= url('panel/delete-project/' . $project['id']) ?>" class="btn text-danger">
                                                    <i class="fa fa-trash"></i>
                                                    حذف
                                                </a>
                                            </div>
                                        </div>
                                        <p class="fs-5 mt-2"><?= $project['description'] ?></p>
                                        <p class="fs-5 mt-2 mb-4">بودجه : <span class="text-danger fs-5"><?= $project['budget'] ?></span> زمان پیشنهادی :<span class="text-danger fs-5"><?= $project['suggested_time'] ?></span></p>
                                        <?php
                                        
                                        $tags = explode(',', $project['tags']);
                                        foreach ($tags as $tag) { ?>
                                            <span class="bg-danger p-2 text-white rounded-3 mx-1"><?= $tag ?></span>
                                        <?php } ?>
                                    </div>

                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <p class="text-center">هیچ پروژه ای ایجاد نشده</p>
                    <?php } ?>
                </div>

            </div>
        </div>


</section>



<?php require_once(BASE_PATH . '/tamplate/User/layouts/footer.php') ?>