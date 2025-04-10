<?php require_once(BASE_PATH . '/tamplate/User/layouts/header.php') ?>
<section class="user-account">
    <div class="row w-100 m-auto mt-5 p-0">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto mt-5">

            <div class="container">
                <div class="bg-white rounded-3 p-2 mt-4 d-flex justify-content-between align-items-center">

                    <h1 class="fs-4">تیکت های شما</h1>

                    <div>
                        <a href="<?= url('panel/ticket/create') ?>" class="btn btn-success">ایجاد تیکت</a>
                    </div>
                </div>
                <div class="bg-white rounded-3 p-3 mt-4">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>موضوع</th>
                                <th>متن</th>
                                <th>وضعیت</th>
                                <th>دسته</th>
                                <th>اولویت</th>
                                <th>تاریخ</th>
                                <th>پاسخ</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($tickets)) {
                                foreach ($tickets as $key => $item) {  ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $item['title'] ?></td>
                                        <td><?= $item['description'] ?></td>
                                        <td>
                                            <?php
                                            if ($item['status'] == 0) {
                                                echo 'بسته شد';
                                            } else {
                                                echo 'باز';
                                            }
                                            ?>
                                        </td>
                                        <td><?= $item['category_name'] ?></td>
                                        <td><?= $item['priority_name'] ?></td>
                                        <td><?= jalaliDate($item['created_at']) ?></td>
                                        <td>
                                            <a href="<?= url('panel/ticket/show/' . $item['tickets_ticket_id']) ?>" class="btn btn-info">نمایش</a>
                                        </td>


                                    </tr>
                                <?php }
                            } else {
                                ?>
                                <p>تراکنشی وجود ندارد</p>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

</section>

<?php require_once(BASE_PATH . '/tamplate/User/layouts/footer.php') ?>