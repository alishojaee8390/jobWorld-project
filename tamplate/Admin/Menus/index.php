<?php require_once(BASE_PATH . '/tamplate/Admin/layouts/header.php'); ?>




<section class="card-panle-admin d-flex justify-content-center" style="height: 85vh;">
    <div class="row w-100 mt-5">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto mt-5">

            <!-- <table class="table text-white rounded-3 shadow-lg" style="background-color: #15283C;"> -->
            <table class="table rounded-3 shadow-lg">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اسم منو</th>
                        <th scope="col">زیر منو</th>
                        <th scope="col">url</th>
                        <th scope="col">تنظیمات</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($menus as $menu) {

                    ?>
                        <tr>
                            <td><?= $menu['id'] ?></td>
                            <td><?= $menu['name'] ?></td>
                            <td><?= $menu['parent_name'] == null ? 'منوی اصلی' : $menu['parent_name'] ?></td>
                            <td><?= $menu['url'] ?></td>
                            <td>
                                <a href="<?= url('admin/menus/delete/' . $menu['id'])  ?>" class="btn btn-outline-danger">حذف</a>
                                <a href="<?= url('admin/menus/edit/' . $menu['id'])  ?>" class="btn btn-outline-primary">ویرایش</a>

                            </td>

                        </tr>


                    <?php }  ?>
                </tbody>
            </table>


        </div>
    </div>
</section>


<?php require_once(BASE_PATH .  '/tamplate/Admin/layouts/footer.php'); ?>