<?php require_once(BASE_PATH . '/tamplate/User/layouts/header.php') ?>
<section class="user-account">
    <div class="row w-100 m-auto mt-5 p-0">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto mt-5">

            <div class="container">
            <?php

$messageSuccess = flash('successWithdraw');
$messageError = flash('errorWithdraw');
if (!empty($messageError)) {
?>

    <div class="alert alert-danger alert-dismissible fade show mt-2 fs-6 d-flex  gap-1 align-items-center mt-4"
        role="alert">

        <i class="fa fa-close ms-1 bg-danger text-white rounded-circle" style="width: 15px; padding:2px"></i>
        <?= $messageError ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>


<?php if (!empty($messageSuccess)) { ?>
    <div class="alert alert-success alert-dismissible fade show mt-2fs-6 d-flex  gap-1 align-items-center mt-4" role="alert">

        <i class="fa fa-check ms-1 bg-success text-white rounded-circle" style="width: 15px; padding:2px"></i>
        <?= $messageSuccess ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
                <div class="bg-white rounded-3 p-2 mt-4 d-flex justify-content-between align-items-center">

                    <h1 class="fs-4">حساب شما</h1>

                    <div>
                        <span></i>موجودی حساب شما : <span><?= $wallets['balance'] ?? '0' ?> تومان</span></span>
                    </div>
                </div>
                <div class="bg-white rounded-3 p-5 mt-4">
                    <div class="text-center">
                        <span> مبلغ قابل برداشت : <span><?= $wallets['balance'] ?? '0' ?> تومان</span></span>
                    </div>
                        <form action="<?= url('panel/balance/withdrawal-account-store') ?>" method="post">
                            <div>
                                <label for="balance">مبلغ برداشتی (تومان)</label>
                                <input type="text" class="form-control mt-2" placeholder="مبلغ برداشتی رو وارد نمایید" name="balance">
                            </div>
                            <div class="mt-2">
                                <label for="">شماره شبا</label>
                                <input type="text" class="form-control mt-2" placeholder="شماره شبا رو وارد نمایید" name="shaba">
                            </div>
                            <button type="submit" class="btn btn-success mt-4">برداشت</button>
                        </form>

                </div>

            </div>

        </div>
    </div>

</section>
<?php require_once(BASE_PATH . '/tamplate/User/layouts/footer.php') ?>