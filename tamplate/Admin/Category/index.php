<?php require_once(BASE_PATH . '/tamplate/Admin/layouts/header.php'); ?>




<section class="card-panle-admin d-flex justify-content-center" style="height: 100vh;">
    <div class="row w-100 mt-5">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto mt-5">

            <table class="table rounded-3 shadow-lg">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اسم دسته بندی</th>
                        <th scope="col">عکس</th>
                        <th scope="col">تنظیمات</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($categories as $category) {

                    ?>
                        <tr>
                            <th scope="row"><?= $category['id'] ?></th>
                            <td><?= $category['name'] ?></td>
                            <td><?php
                                if ($category['image'] != '') { ?>
                                    <img src="<?= asset($category['image']) ?>" class="img-fluid" alt="<?= $category['name'] ?>" width="100px">
                                <?php } else {
                                ?>

                                    <p>هیچ عکسی وجود ندارد</p>

                                <?php                            } ?>


                            </td>
                            <td>
                                <a href="<?= url('admin/category/edit/' . $category['id'])  ?>" class="btn btn-outline-primary">ویرایش</a>
                                <a href="<?= url('admin/category/delete/' . $category['id'])  ?>" class="btn btn-outline-danger">حذف</a>
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>
    </div>
</section>


<?php require_once(BASE_PATH .  '/tamplate/Admin/layouts/footer.php'); ?>