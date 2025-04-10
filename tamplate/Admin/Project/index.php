<?php require_once(BASE_PATH . '/tamplate/Admin/layouts/header.php'); ?>




<section class="card-panle-admin d-flex justify-content-center vh-100" style="height: 85vh;">
    <div class="row w-100 mt-5">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto mt-5">

            <table class="table rounded-3 shadow-lg">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">عنوان </th>
                        <th scope="col">بودجه</th>
                        <th scope="col">زمان پیشنهادی</th>
                        <th scope="col">توضیحات</th>
                        <th scope="col">وضیعت</th>
                        <th scope="col">تاریخ ثبت</th>
                        <th scope="col">تنظیمات</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($projects as $project) {

                    ?>
                        <tr>
                            <th scope="row"><?= $project['id'] ?></th>
                            <td><?= $project['title'] ?></td>
                            <td><?= $project['budget'] ?> تومان</td>
                            <td><?= $project['suggested_time'] ?> روز</td>
                            <td><?= substr($project['description'] , 0 , 80) . '...' ?></td>
                            <td><?= $project['status'] ?></td>
                            <td><?= jalaliDate($project['created_at']) ?></td>
                            <td>
                                <a href="<?= url('admin/projects/delete/' . $user['id'])  ?>" class="btn btn-outline-danger">حذف</a>
                        

                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>
    </div>
</section>


<?php require_once(BASE_PATH .  '/tamplate/Admin/layouts/footer.php'); ?>