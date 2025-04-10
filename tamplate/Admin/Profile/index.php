<?php require_once(BASE_PATH . '/tamplate/Admin/layouts/header.php'); ?>



<section class="card-panle-admin d-flex justify-content-center vh-100" style="height: 85vh;">
    <div class="row w-100 mt-5">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto mt-5">


            <div class="d-flex justify-content-center mt-5">
                <div class="shadow-lg h-100 w-75 p-3 rounded-3 bg-white ">
                    <div class="d-flex  align-items-center gap-4 bg-success rounded-3 p-2">

                        <img src="<?= ($user['image'] == null) ? asset('public/images/user.png') : asset($user['image']) ?>"
                            class="img-fluid rounded-circle" width="140px" alt="">
                        <div class="">
                            <h4 class=" text-white"><?= $user['first_name'] . ' ' . $user['last_name'] ?></h4>
                            <h5 class="text-white "><?= ($user['permission'] == 'admin') ? 'ادمین' : '' ?></h5>
                        </div>

                    </div>
                    <hr>
                    <div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>ایمیل : </span>
                            <span class="text-muted"><?= $user['email'] ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>نام کاربری : </span>
                            <span class="text-muted"><?= $user['username'] ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>شماره موبایل : </span>
                            <span class="text-muted"><?= $user['phone_number'] ?></span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <a href="<?= url('admin/profile/edit/' . $user['id']) ?>"
                                class="btn btn-success w-100">ویرایش</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>





<?php require_once(BASE_PATH .  '/tamplate/Admin/layouts/footer.php'); ?>