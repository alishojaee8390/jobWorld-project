<?php
require_once(BASE_PATH . '/tamplate/Admin/layouts/header.php');
?>
<!--  =============================================== start-card =============================================== -->

<section class="card-panle-admin d-flex justify-content-center">
    <div class="row w-100 mt-5">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto mt-5">

            <div class="row w-100 mt-5 m-auto">
                <div class="col-lg-3 mb-3 mt-md-0">
                    <div
                        class="card-1-info shadow-sm p-3 py-5 text-white d-flex justify-content-between align-items-center h-100">
                        <div class="card-desc text-center">
                            <h4>مجموع کاربران</h4>
                            <span><?= $usersCount['usersCount'] ?></span>
                        </div>
                        <div class="card-icon border-end px-2 border-white">
                            <i class="fa fa-users fa-2xl"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div
                        class="card-2-info shadow-sm p-3 py-5 text-white d-flex justify-content-between align-items-center h-100">
                        <div class="card-desc text-center">
                            <h4>مجموع منو ها</h4>
                            <span><?=$menuCount['menuCount']?></span>
                        </div>
                        <div class="card-icon border-end px-2 border-white">
                            <i class="fa fa-bars fa-2xl"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div
                        class="card-3-info shadow-sm p-3 py-5 text-white d-flex justify-content-between align-items-center h-100">
                        <div class="card-desc text-center">
                            <h4>مجموع دسته بندی ها</h4>
                            <span class=""><?= $categoriesCount['categoriesCount'] ?></span>
                        </div>
                        <div class="card-icon border-end px-2 border-white">
                            <i class="fa fa-clipboard-list fa-2xl"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-3">
                    <div
                        class="card-4-info shadow-sm p-3 py-5 text-white d-flex justify-content-between align-items-center h-100">
                        <div class="card-desc text-center">
                            <h4>مجموع پروژه ها</h4>
                            <span class=""><?= $projectCount['projectCount'] ?></span>
                        </div>
                        <div class="card-icon border-end px-2 border-white">
                            <i class="fa fa-briefcase  fa-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!--  =============================================== end-of-card =============================================== -->

<!--  =============================================== start-chart =============================================== -->
<section class="chart d-flex justify-content-center align-items-center">
    <div class="row w-100">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto mt-5">
            <div class="row w-100">
           
                <div class="col-lg-6 d-flex justify-content-center">
                    <div class="w-100  bg-white rounded-3 shadow-lg">


                        <canvas id="myChart" style="width:100%;max-width:600px" class="m-auto"></canvas>

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--  =============================================== end-of-chart =============================================== -->



<!--  =============================================== start-admin-website =============================================== -->


<!-- <section class="d-flex justify-content-between">
    <div class="row w-100 m-0 mt-5">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto">
            <div class="row">
                <div class="col-lg-6">
                    <div class="admin-info  bg-white shadow-lg rounded-3 p-3">
                        <h4 class="text-center text-warning fw-bold">ادمین های سایت</h4>
                        <div class="row justify-content-around mt-4">
                            <div
                                class="col-lg-5 d-flex flex-column justify-content-center align-items-center bg-danger rounded-3 p-3 text-white mb-3">
                                <div>
                                    <img src="../images/profile-3.jpg" class="img-fluid rounded-circle" width="100px"
                                        alt="">
                                </div>
                                <div>
                                    <h4 class="text-center mt-2">امیر رضایی</h4>
                                    <p class="text-center border-bottom pb-2">سطح دسترسی</p>
                                    <span class="text-center">ادمین بخش مدیریت پروژه ها</span>
                                </div>
                            </div>
                            <div
                                class="col-lg-5 d-flex flex-column justify-content-center align-items-center bg-info rounded-3 p-3 text-white mb-3">
                                <div>
                                    <img src="../images/profile-3.jpg" class="img-fluid rounded-circle" width="100px"
                                        alt="">
                                </div>
                                <div>
                                    <h4 class="text-center mt-2">علیرضا حسینی</h4>
                                    <p class="text-center border-bottom pb-2">سطح دسترسی</p>
                                    <span class="text-center">ادمین بخش وبلاگ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                        <div class="bg-white shadow-lg rounded-3 p-3">

                        </div> 
            </div>
        </div>
    </div>
    </div>
</section> -->

<!--  =============================================== end-of-admin-website =============================================== -->
 
<?php
require_once(BASE_PATH . '/tamplate/Admin/layouts/footer.php');
?>