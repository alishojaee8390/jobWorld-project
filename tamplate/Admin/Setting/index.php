<?php
require_once(BASE_PATH . '/tamplate/Admin/layouts/header.php');
?>


<section class="card-panle-admin d-flex justify-content-center">
    <div class="row w-100 mt-5">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto mt-5">

            <h2 class="text-center mb-5 pb-3  border-success border-bottom">تنظیمات سایت</h2>






            <table class="table rounded-3 shadow-lg w-100">

                <tbody>

                    <tr>
                        <td class="fw-bold p-3">عنوان سایت : </td>
                        <td class="p-3"><?= $setting['title'] ?></td>
                    </tr>

                    <tr>
                        <td class="fw-bold">توضیحات : </td>
                        <td class="p-3"><?= $setting['description'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">عنوان هدر : </td>
                        <td class="p-3"><?= $setting['title_header'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">توضیحات هدر : </td>
                        <td class="p-3"><?= $setting['description_header'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">کلمات کلیدی : </td>
                        <td class="p-3"><?= $setting['keywords'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">شماره تلفن : </td>
                        <td class="p-3"><?= $setting['phone'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">ایمیل : </td>
                        <td class="p-3"><?= $setting['email'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">اینستاگرام : </td>
                        <td class="p-3"><?= $setting['instagram'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">تلگرام : </td>
                        <td class="p-3"><?= $setting['instagram'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">توییتر : </td>
                        <td class="p-3"><?= $setting['twitter'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">لینکدین : </td>
                        <td class="p-3"><?= $setting['linkedin'] ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">آیکون : </td>
                        <td class="p-3"><img src="<?= asset($setting['icon']) ?>" width="150px" alt="icon"></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">لگو : </td>
                        <td class="p-3"><img src="<?= asset($setting['logo']) ?>" width="150px" alt="logo"></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">پس زمینه هدر : </td>
                        <td class="p-3"><img src="<?= asset($setting['background_head']) ?>" width="150px" alt="background_head">
                        </td>
                    </tr>





                </tbody>
            </table>

            <div class="text-center">

                <a href="<?= url('admin/setting/edit')  ?>" class="btn text-center w-25 
    btn-primary">ویرایش تنظیمات سایت</a>
            </div>
        </div>
    </div>
</section>


<?php
require_once(BASE_PATH . '/tamplate/Admin/layouts/footer.php');
?>