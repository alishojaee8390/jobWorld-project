<?php require_once(BASE_PATH . '/tamplate/Admin/layouts/header.php'); ?>




<section class="card-panle-admin d-flex justify-content-center" style="height: 100vh;">
    <div class="row w-100 mt-5">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto mt-5">


            <a href="<?= url('admin/ticket-priority/create') ?>" class="btn btn-success my-2">ایجاد اولویت</a>

            <table class="table rounded-3 shadow-lg">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">اسم اولویت</th>
                        <th scope="col">تنظیمات</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($ticketPriorities as $ticketPriority) {
                    ?>
                        <tr>
                            <th scope="row"><?= $ticketPriority['id'] ?></th>
                            <td><?= $ticketPriority['name'] ?></td>
                            <td>
                                <a href="<?= url('admin/ticket-priority/edit/' . $ticketPriority['id'])  ?>" class="btn btn-outline-primary">ویرایش</a>
                                <a href="<?= url('admin/ticket-priority/delete/' . $ticketPriority['id'])  ?>" class="btn btn-outline-danger">حذف</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>
    </div>
</section>


<?php require_once(BASE_PATH .  '/tamplate/Admin/layouts/footer.php'); ?>