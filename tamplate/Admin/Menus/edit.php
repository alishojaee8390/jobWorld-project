<?php require_once(BASE_PATH . '/tamplate/Admin/layouts/header.php');
?>

<section class="card-panle-admin d-flex justify-content-center" style="height: 85vh;">
    <div class="row w-100 mt-5">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto mt-5">

            <h3>افزودن منو جدید</h3>
            <form action="<?= url('admin/menus/update/' . $menu['id']) ?>" method="post" class="mt-5 w-100 shadow-sm  border-bottom rounded-3 p-2 bg-white">

                <div class="input-group mb-3">
                    <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success" id="inputGroup-sizing-default">نام منو : </span>
                    <input type="text" class=" form-control border-bottom" name="name" id="name" value="<?= $menu['name'] ?>">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text border-0 rounded-0 bg-white border-bottom border-success" id="inputGroup-sizing-default">لینک : </span>
                    <input type="text" class=" form-control border-bottom" name="url" id="ur" value="<?= $menu['url'] ?>">
                </div>
                <div class="input-group mb-3">
                    <label for="parent_id" class="input-group-text border-0 rounded-0 bg-white border-bottom border-success w-100" id="inputGroup-sizing-default">زیر منو : </label>
                    <div class="d-flex align-items-center w-100  justify-content-between shadow-lg rounded-3">
                        <select name="parent_id" id="parent_id" class="form-control w-100">


                            <option value="" <?php if ($menu['parent_id'] == '') echo 'selected' ?>>منوی اصلی</option>


                            <?php foreach ($menus as $selectMenu) { ?>
                                <?php if ($menu['id'] != $selectMenu['id']) { ?>
                                    <option value="<?= $selectMenu['id'] ?>" <?php if ($menu['parent_id'] == $selectMenu['id'])  echo 'selected'  ?>>
                                        <?= $selectMenu['name'] ?>
                                    </option>
                            <?php }
                            } ?>




                        </select>
                        <i class="fa fa-angle-down ms-3"></i>
                    </div>
                </div>






                <button class="btn btn-success px-5 py-2" type="submit">ذخیره</button>
            </form>

        </div>
    </div>
</section>

<?php require_once(BASE_PATH .  '/tamplate/Admin/layouts/footer.php'); ?>