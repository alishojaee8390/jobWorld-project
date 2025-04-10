<?php require_once(BASE_PATH . '/tamplate/Admin/layouts/header.php'); ?>




<section class="card-panle-admin d-flex justify-content-center vh-100" style="height: 85vh;">
    <div class="row w-100 mt-5">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto mt-5">

            <table class="table rounded-3 shadow-lg">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">نام </th>
                        <th scope="col">نام خانوادگی</th>
                        <th scope="col">نام کاربری</th>
                        <th scope="col">ایمیل</th>
                        <th scope="col">تاریخ ثبت نام</th>
                        <th scope="col">دسترسی</th>
                        <th scope="col">تنظیمات</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($users as $user) {

                    ?>
                        <tr>
                            <th scope="row"><?= $user['id'] ?></th>
                            <td><?= $user['first_name'] ?></td>
                            <td><?= $user['last_name'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= jalaliDate($user['created_at']) ?></td>
                            <td><?= $user['permission'] == 'admin' ? 'ادمین' : 'کاربر معمولی' ?></td>
                            <td>
                                <a href="<?= url('admin/users/delete/' . $user['id'])  ?>" class="btn btn-outline-danger">حذف</a>
                                <a href="<?= url('admin/users/edit/' . $user['id'])  ?>" class="btn btn-outline-primary">ویرایش</a>
                                <?php
                                if ($user['permission'] == 'admin') {



                                ?>
                                    <a href="<?= url('admin/users/permission/' . $user['id'])  ?>" class="btn btn-outline-success">
                                        تغییر به کاربر معمولی
                                    </a>
                                <?php } else { ?>
                                    <a href="<?= url('admin/users/permission/' . $user['id'])  ?>" class="btn btn-outline-success">
                                        تغییر به ادمین
                                    </a>
                                <?php } ?>


                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>
    </div>
</section>


<?php require_once(BASE_PATH .  '/tamplate/Admin/layouts/footer.php'); ?>