<?php require_once(BASE_PATH . '/tamplate/Admin/layouts/header.php'); ?>




<section class="card-panle-admin d-flex justify-content-center" style="height: 100vh;">
    <div class="row w-100 mt-5">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto mt-5">
            <table class="table rounded-3 shadow-lg">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">نام کاربر</th>
                        <th scope="col">عنوان</th>
                        <th scope="col">توضیحات</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">دسته بندی</th>
                        <th scope="col">اولویت</th>
                        <th scope="col">تنظیمات</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($tickets as $key => $ticket) {

                    ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $ticket['first_name'] . ' ' . $ticket['last_name'] ?></td>
                            <td><?= $ticket['title'] ?></td>
                            <td><?= $ticket['description'] ?></td>
                            <td><?= $ticket['status'] == 0 ? 'بسته شد' : 'باز' ?></td>
                            <td><?= $ticket['category_name'] ?></td>
                            <td><?= $ticket['priority_name'] ?></td>
                     
                            <?php if ($ticket['status'] == 1 ) { ?>
                                <td>
                                    <a href="<?= url('admin/ticket/answer-create/' . $ticket['ticket_idd'])  ?>" class="btn btn-outline-primary">پاسخ</a>
                                    <!-- <a href="<?= url('admin/ticket/close/' . $ticket['ticket_idd'])  ?>" class="btn btn-outline-danger">بستن</a> -->
                                </td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>
    </div>
</section>


<?php require_once(BASE_PATH .  '/tamplate/Admin/layouts/footer.php'); ?>