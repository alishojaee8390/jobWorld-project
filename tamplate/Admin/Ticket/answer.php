<?php require_once(BASE_PATH . '/tamplate/Admin/layouts/header.php'); ?>

<section class="card-panle-admin d-flex justify-content-center" style="height: 85vh;">
    <div class="row w-100 mt-5">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto mt-5">

            <div class="bg-white rounded-3 p-2">
                <h3>پاسخ به <?= $ticket['first_name']. ' ' . $ticket['last_name'] ?></h3>
                <p>اولویت : <?= $ticket['priority_name'] ?></p>
                <p>دسته بندی : <?= $ticket['category_name'] ?></p>
                <p><?= $ticket['description']?></p>
                
            </div>
            <form action="<?= url('admin/ticket/answer-store/'. $ticket['ticket_idd']) ?>" method="post" class=" w-100">

                <textarea class=" border-0 w-100 shadow-sm  border-bottom rounded-3 p-2 bg-white" name="description"></textarea>

                <button class="btn btn-success px-5 py-2 mt-2" type="submit">ذخیره</button>
            </form>

        </div>
    </div>
</section>

<?php require_once(BASE_PATH .  '/tamplate/Admin/layouts/footer.php'); ?>