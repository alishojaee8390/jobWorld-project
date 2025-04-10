<?php require_once(BASE_PATH . '/tamplate/User/layouts/header.php') ?>
<section class="user-account ">
    <div class="row w-100 m-auto mt-5 p-0">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto mt-5">

            <div class="container">

                <div class=" mt-5 bg-white p-3 rounded-3">

                    <h2>ایجاد تیکت جدید</h2>
                    <?php
                    $message = flash('accountError');
                    $messageSuccess = flash('accountSuccess');

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
                    <form action="<?= url('panel/ticket/store') ?>" class="mt-5" method="post">
                        <div class="row">
                            <div class="col-lg-12 mt-2">
                                <div class="form-floating">
                                    <input type="text" class="form-control disabled text-start" id="floatingtitle"
                                        placeholder="عنوان تیکت" name="title">
                                    <label for="floatingtitle">عنوان تیکت</label>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-2">
                                <div class="form-floating">
                                    <select name="category_id" class="form-control" id="floatingInputcategory_id">
                                        <?php foreach ($ticketCategories as $category) { ?>
                                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                                        <?php } ?>
                                    </select>

                                    <label for="floatingInputcategory_id">دسته</label>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-2">
                                <div class="form-floating">
                                    <select name="priority_id" class="form-control" id="floatingInputpriority_id">
                                        <?php foreach ($ticketPriorities as $priority) { ?>
                                            <option value="<?= $priority['id'] ?>"><?= $priority['name'] ?></option>
                                        <?php } ?>
                                    </select>

                                    <label for="floatingInputpriority_id">اولویت</label>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="form-floating my-3 w-100">
                                    <textarea type="text" class="form-control h-auto" id="floatingInputdescription" rows="20"
                                        placeholder=""
                                        name="description"></textarea>
                                    <label for="floatingInputdescription">متن تیکت</label>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">ایجاد تیکت</button>
                        </div>


                    </form>
                </div>


            </div>
        </div>
    </div>
    </div>


</section>

<?php require_once(BASE_PATH . '/tamplate/User/layouts/footer.php') ?>