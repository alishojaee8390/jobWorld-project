<?php require_once(BASE_PATH . '/tamplate/Admin/layouts/header.php'); ?>

<section class="card-panle-admin d-flex justify-content-center" style="height: 100vh;">
    <div class="row w-100 mt-5">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto mt-5">

            <h3>ویرایش اولویت </h3>
            <form action="<?= url('admin/ticket-priority/update/' . $ticketPriority['id']) ?>" method="post" class="mt-5 w-100">
                <input type="text" placeholder="نام اولویت" class=" border-0 w-100 shadow-sm border-bottom rounded-3 p-2 bg-white"
                    name="name" value="<?= $ticketPriority['name'] ?>">
             
                <button class="btn btn-success px-5 py-2 " type="submit">ذخیره</button>
            </form>

        </div>
    </div>
</section>

<?php require_once(BASE_PATH .  '/tamplate/Admin/layouts/footer.php'); ?>