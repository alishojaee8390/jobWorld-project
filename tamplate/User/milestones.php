<?php require_once(BASE_PATH . '/tamplate/User/layouts/header.php') ?>
<section class="user-account">
    <div class="row w-100 m-auto mt-5 p-0">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto mt-5">

            <div class="container">
                <?php if ($user['activity_user'] == 'employer') { ?>
                    <div class="bg-white rounded-3 p-3 mt-4">
                        <a href="<?= url('panel/create-milestones/') ?>" class="btn btn-success mb-4">ایجاد مرحله جدید</a>
                        <?php
                        $message = flash('escrowError');
                        $messageSuccess = flash('escrowSuccess');

                        if (!empty($message)) {



                        ?>


                            <div class="alert alert-danger  mt-2 p-1 fs-6 d-flex align-items-center gap-1 justify-content-center"
                                role="alert">

                                <i class="fa fa-close ms-1 bg-danger text-white rounded-circle"
                                    style="width: 15px; padding:2px"></i>
                                <span> <?= $message ?></span>
                            </div>

                        <?php } else if (!empty($messageSuccess)) { ?>


                            <div class="alert alert-success  mt-2 p-1 fs-6 d-flex align-items-center gap-1 justify-content-center"
                                role="alert">

                                <i class="fa fa-check ms-1 bg-success text-white rounded-circle"
                                    style="width: 15px; padding:2px"></i>
                                <span> <?= $messageSuccess ?></span>
                            </div>

                        <?php                      } ?>


                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>توضیحات</th>
                                    <th>مبلغ</th>
                                    <th>وضعیت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($milestones)) {
                                    foreach ($milestones as $key => $item) {  ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $item['name'] ?></td>
                                            <td><?= $item['description'] ?></td>
                                            <td><?= $item['amount'] ?></td>
                                            <td><?php
                                                if ($item['status'] == 1) {
                                                    echo '<span class="text-warning">درحال انتظار</span>';
                                                } else if ($item['status'] == 2) {
                                                    echo '<span class="text-info">درحال انجام</span>';
                                                } else {
                                                    echo '<span class="text-success">تکمیل شد</span>';
                                                }

                                                ?></td>
                                            <td>
                                                <?php if ($item['status'] == 1) { ?>
                                                    <a href="<?= url("panel/store-escrow-milestones/{$item['id']}") ?>" class="btn btn-primary">واریز مبلغ به سایت</a>
                                                <?php } else { ?>
                                                    <a href="<?= url("panel/escrow-amount/{$item['id']}/project/{$item['project_id']}") ?>" class="btn btn-danger">آزاد سازی مبلغ</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                <?php }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <div class="bg-white rounded-3 p-3 mt-4">
                        <?php
                        $messageSuccess = flash('statusSuccess');
                        if (!empty($messageSuccess)) { ?>


                            <div class="alert alert-success  mt-2 p-1 fs-6 d-flex align-items-center gap-1 justify-content-center"
                                role="alert">

                                <i class="fa fa-check ms-1 bg-success text-white rounded-circle"
                                    style="width: 15px; padding:2px"></i>
                                <span> <?= $messageSuccess ?></span>
                            </div>

                        <?php                      } ?>


                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>توضیحات</th>
                                    <th>مبلغ</th>
                                    <th>وضعیت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($milestones)) {
                                    foreach ($milestones as $key => $item) {  ?>
                                        <tr>
                                            <td><?= $key + 1 ?></td>
                                            <td><?= $item['name'] ?></td>
                                            <td><?= $item['description'] ?></td>
                                            <td><?= $item['amount'] ?></td>
                                            <td><?php
                                                if ($item['status'] == 1) {
                                                    echo 'درحال انتظار';
                                                } else if ($item['status'] == 2) {
                                                    echo 'درحال انجام';
                                                } else {
                                                    echo 'تکمیل شد';
                                                }

                                                ?></td>
                                            <td>
                                                <?php if ($item['status'] == 2) { ?>
                                                    <a href="<?= url("panel/change-status-completed/{$item['id']}") ?>" class="btn btn-primary">تغییر به تکمیل شدن</a>
                                                <?php }
                                                if ($item['status'] == 3) { ?>
                                                    <span class="text-success">این مرحله تکمیل شد</span>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                <?php }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>

</section>
<?php require_once(BASE_PATH . '/tamplate/User/layouts/footer.php') ?>