<?php require_once(BASE_PATH . '/tamplate/Admin/layouts/header.php'); ?>

<section class="card-panle-admin d-flex justify-content-center" style="height: 85vh;">
    <div class="row w-100 mt-5">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto mt-5">

            <h3>ویرایش کاربر</h3>
            <form action="<?= url('admin/users/update/' . $user['id']) ?>" method="post" class="mt-5 w-100 shadow-sm  border-bottom rounded-3 p-2 bg-white ">

                <div class="input-group mb-3">
                    <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success" id="inputGroup-sizing-default">ایمیل : </span>
                    <input type="text" placeholder="ایمیل" class=" form-control border-bottom" name="email" id="email" value="<?= $user['email'] ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success" id="inputGroup-sizing-default">نام کاربری : </span>
                    <input type="text" placeholder="نام کاربری" class=" form-control border-bottom" name="username" value="<?= $user['username'] ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success" id="inputGroup-sizing-default">نام : </span>
                    <input type="text" placeholder="نام " class=" form-control border-bottom" name="first_name" value="<?= $user['first_name'] ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success" id="inputGroup-sizing-default">نام خانوادگی: </span>
                    <input type="text" placeholder="نام خانوادگی " class=" form-control border-bottom" name="last_name" value="<?= $user['last_name'] ?>">
                </div>
                <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success" id="inputGroup-sizing-default">دسترسی : </span>
                <div class="input-group mb-3">
                    <select class="form-select" aria-label="Default select example" name="permission">


                        <option value="user" <?php if ($user['permission'] == 'user') echo 'selected' ?>>کاربر معمولی
                        </option>
                        <option value="admin" <?php if ($user['permission'] == 'admin') echo 'selected' ?>>ادمین
                        </option>

                    </select>
                </div>



                <button class="btn btn-success px-5 py-2 " type="submit">ذخیره</button>
            </form>

        </div>
    </div>
</section>

<?php require_once(BASE_PATH .  '/tamplate/Admin/layouts/footer.php'); ?>