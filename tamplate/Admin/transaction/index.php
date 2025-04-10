<?php require_once(BASE_PATH . '/tamplate/Admin/layouts/header.php'); ?>




<section class="card-panle-admin d-flex justify-content-center" style="height: 100vh;">
    <div class="row w-100 mt-5">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto mt-5">

            <table class="table rounded-3 shadow-lg">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">کابر</th>
                        <th scope="col">مبلغ (تومان)</th>
                        <th scope="col">نوع درخواست</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">تایید درخواست</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($transactions as $transaction) {

                    ?>
                        <tr>
                            <th scope="row"><?= $transaction['id'] ?></th>
                            <td><?= $transaction['first_name'] . $transaction['last_name'] ?></td>
                            <td><?= $transaction['amount'] ?></td>
                            <td><?= $transaction['type'] == 'withdraw' ? 'برداشت' : '' ?></td>
                            <td><?= $transaction['status'] == 1 ? 'تایید نشده' : 'تایید شده' ?></td>

                            <td>
                                <?php if ($transaction['status'] == 1) { ?>
                                    <a href="<?= url('admin/transaction/confirm/' . $transaction['transaction_id'])  ?>" class="btn btn-outline-primary">تایید</a>
                                <?php } else { ?>
                                    <span class="text-success fw-bold">تایید شد</span>
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