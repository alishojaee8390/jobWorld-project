<?php require_once(BASE_PATH . '/tamplate/App/layouts/header.php') ?>


<div class="container">


    <div class="mt-5">
        <h1 class="fs-5 text-muted text-center">ثبت پیشنهاد روی پروژه
            <span class="text-success  fs-4">(<?= $project['title'] ?>)</span>
        </h1>
    </div>

    <?php

    $messageError = flash('error_project');
    $messageSuccess = flash('success_project');
    if (!empty($messageError)) {
    ?>

    <div class="alert alert-danger alert-dismissible fade show mt-2 fs-6 d-flex  gap-1 align-items-center "
        role="alert">

        <i class="fa fa-close ms-1 bg-danger text-white rounded-circle" style="width: 15px; padding:2px"></i>
        <?= $messageError ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>


    <?php if (!empty($messageSuccess)) { ?>
    <div class="alert alert-success alert-dismissible fade show mt-2fs-6 d-flex  gap-1 align-items-center" role="alert">

        <i class="fa fa-check ms-1 bg-success text-white rounded-circle" style="width: 15px; padding:2px"></i>
        <?= $messageSuccess ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php } ?>

    <div class="row">
        <div class="col-lg-6 mt-2">
            <form action="<?= url('register-offer/' . $project['id']) ?>" method="post" enctype="multipart/form-data">
                <div class="d-flex align-items-center gap-2 mt-5 ">
                    <div class="Amount-offer pe-3 d-flex align-items-center gap-2 shadow-sm w-100">
                        <i class="fa fa-dollar ms-2 text-success "></i>
                        <input class="border-0 p-2 px-3 w-100" type="text" placeholder="مبلغ پروژه را وارد کنید"
                            name="pirce">
                        <div class="amount-toman p-2 px-3 ms-0 bg-success rounded-3 text-white w-25 text-center">
                            تومان</div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2 mt-5">
                    <div class="Amount-offer pe-3 d-flex align-items-center gap-2 shadow-sm w-100">
                        <i class="fa fa-calendar-days ms-2 text-success"></i>
                        <input class="border-0 p-2 px-3 w-100" type="text" placeholder=" مهلت انجام کار را وارد کنید"
                            name="deadline_work">
                        <div class="amount-toman p-2 px-3 ms-0 bg-success rounded-3 text-white w-25 text-center">
                            روز</div>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2 mt-5">
                    <div class="Amount-offer pe-3 d-flex align-items-center gap-2 shadow-sm w-100">
                        <i class="fa fa-certificate text-success"></i>
                        <input class="border-0 p-2 px-3 w-100" type="text" placeholder=" ضمانت  تخصص را وارد کنید"
                            name="guaranteed_expertise">
                        <div class="amount-toman p-2 px-3 ms-0 bg-success rounded-3 text-white w-25 text-center">
                            درصد</div>
                    </div>
                </div>
        

        </div>
        <div class="col-lg-6">
            <div class="mt-2 d-none d-lg-block p-3 text-center">
                <img src="<?= asset('/public/images/projects/register-offer.jpg')  ?>" width="250" class="img-fluid"
                    alt="">

            </div>
        </div>
        <div class="col-lg-12 mt-2">
            <div class="offer-desc  w-100 p-1 shadow-sm">
                <textarea class="w-100 border-0 p-3" name="description" cols="80" rows="11"
                    placeholder="توضیحات"></textarea>
            </div>
        </div>
    </div>
    <button type="submit" class="p-2 px-5  fs-5 rounded-3 border-0 btn btn-success mt-3 w-100">ثبت پیشنهاد</button>
    </form>
</div>



<?php require_once(BASE_PATH . '/tamplate/App/layouts/footer.php') ?>