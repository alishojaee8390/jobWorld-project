<?php require_once(BASE_PATH . '/tamplate/User/layouts/header.php') ?>

<section class="user-account">
    <div class="row w-100 m-auto mt-5 p-0">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto mt-5">

            <div class="container">

                <div class="bg-white rounded-3 p-3 mt-4">
                    <h2>ایجاد مرحله جدید</h2>
                    <form action="<?= url('panel/store-milestones/') ?>" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mt-2">
                                    <label for="amount">عنوان:</label>
                                    <input type="text" placeholder="عنوان را وارد کنید" class="form-control mt-2" name="name">
                                </div>

                            </div>
                            <div class="col-lg-6">
                                <div class="mt-2">
                                    <label for="amount">مبلغ:</label>
                                    <input type="text" placeholder="مبلغ را وارد کنید" class="form-control mt-2" name="amount" id="amount">
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <div class="mt-2">
                                    <label for="description">توضیحات:</label>
                                    <textarea name="description" id="description" class="form-control mt-2" placeholder="توضیحات را وارد کنید" row="60" col="30"></textarea>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="status" value="1">
                        <input type="hidden" name="project_id" value="<?= $project['id']?>">
                        <button type="submit" class="btn btn-success mt-3">ثبت</button>
                    </form>
                </div>

            </div>

        </div>
    </div>

</section>
<?php require_once(BASE_PATH . '/tamplate/User/layouts/footer.php') ?>