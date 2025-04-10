<?php require_once(BASE_PATH . '/tamplate/User/layouts/header.php') ?>
<section class="user-account">
    <div class="row w-100 m-auto mt-5 p-0">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto mt-5">

            <div class="container">
                <div class="bg-white rounded-3 p-2 mt-4 d-flex justify-content-between align-items-center">

                    <h1 class="fs-4">حساب شما</h1>

                    <div>
                        <span></i>موجودی حساب شما : <span><?= $wallets['balance'] ?? '0' ?> تومان</span></span>
                    </div>
                </div>
                <div class="bg-white rounded-3 p-3 mt-4">
                    <div class="d-flex justify-content-between align-items-center">

                        <h2>تراکنش های انجام شده</h2>
                        <div>
                            
                                <a href="<?= url('panel/balance/withdrawal-account') ?>" class="btn btn-danger">برداشت از حساب</a>
                      
                                <a href="<?= url('panel/balance/deposit-account') ?>" class="btn btn-success">واریز به حساب</a>

                        
                        </div>
                    </div>

                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نوع</th>
                                <th>مبلغ (تومان)</th>
                                <th>وضعیت</th>
                                <th>تاریخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($transactions)) {
                                foreach ($transactions as $key => $item) {  ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?php
                                            if ($item['type'] == 'deposit') {
                                                echo 'واریز';
                                            } else if ($item['type'] == 'withdraw') {
                                                echo 'برداشت';
                                            }

                                            ?></td>
                                        <td><?= $item['amount'] ?></td>
                                        <td><?= $item['status'] == 1 ? 'تایید نشده' : 'تایید شد' ?></td>
                                        <td><?= jalaliDate($item['created_at']) ?></td>

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