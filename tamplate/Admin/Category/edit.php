<?php require_once(BASE_PATH . '/tamplate/Admin/layouts/header.php'); ?>

<section class="card-panle-admin d-flex justify-content-center" style="height: 100vh;">
    <div class="row w-100 mt-5">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto mt-5">

            <h3>افزودن دسته بندی جدید</h3>
            <form action="<?= url('admin/category/update/' . $category['id']) ?>" method="post" class="mt-5 w-100" enctype="multipart/form-data">
                <input type="text" placeholder="نام دسته بندی" class=" border-0 w-100  shadow-sm  border-bottom rounded-3 p-2 bg-white"
                    name="name" value="<?= $category['name'] ?>">
                <div class="bg-white mt-2 p-3 d-flex flex-column">

                    <div class="file w-100 my-3 p-5">
                        <input type="file" name="image" id="file-upload" multiple class="p-2 text-center  file-upload">
                        <label for="file-upload" class="p-2 w-50 m-auto">انتخاب فایل
                            &nbsp; <i class="fa-solid fa-cloud-arrow-up"></i>
                        </label>
                        <h4 class="text-muted text-center mt-4 fs-5">فایل های مجاز
                            (png , jpg , jpeg , gif)</h4>
                    </div>
                    <?php if ($category['image'] !== null) {

                    ?>

                        <img src="<?= asset($category['image']) ?>" class="img-fluid w-25" alt="<?= $category['name'] ?>">
                    <?php } else { ?>
                        <p>عکسی وجود ندارد</p>
                    <?php } ?>
                </div>
                <button class="btn btn-success px-5 py-2 " type="submit">ذخیره</button>
            </form>

        </div>
    </div>
</section>

<?php require_once(BASE_PATH .  '/tamplate/Admin/layouts/footer.php'); ?>