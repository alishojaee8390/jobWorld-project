<?php require_once(BASE_PATH . '/tamplate/User/layouts/header.php') ?>
<section class="user-account ">
    <div class="row w-100 m-auto mt-5 p-0">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto mt-5">

            <div class="container">

                <div class=" mt-5 bg-white p-3 rounded-3">

                    <h2>نمایش تیکت</h2>

                    <hr>
                    <h4>پاسخ ادمین</h4>

                    <p class="mt-3"><?= $ticketReplay ?  $ticketReplay['description'] : 'پاسخی وجود ندارد' ?></p>

                </div>


            </div>
        </div>
    </div>
    </div>


</section>

<?php require_once(BASE_PATH . '/tamplate/User/layouts/footer.php') ?>