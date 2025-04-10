<?php require_once(BASE_PATH . '/tamplate/App/layouts/header.php')  ?>


<!-- search box start -->

<section class="search-box">

    <div class="container">
        <div class="row">
            <div class="search-box-content mt-5 shadow-lg">
                <div class="search-input d-flex align-items-center ">
                    <i class="fa fa-search text-muted"></i>
                    <input class="form-control" type="search" placeholder="جستجو ...">
                </div>
                <div class="w-100 d-flex align-items-center ps-2">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>همه قیمت ها</option>
                        <option value="1">از 50000 تومان تا 10000 تومان</option>
                        <option value="2">از 450000 تومان تا 500000 تومان</option>
                        <option value="3">از 90000 تومان تا 1000000 تومان</option>
                    </select>
                    <i class="fa fa-dollar text-muted"></i>
                </div>

                <div class="w-100  d-flex align-items-center ps-2">
                    <select class="form-select" aria-label="Default select example">

                        <option selected>همه مهارت ها</option>
                        <option value="1">طراحی وب و برنامه نویسی</option>
                        <option value="2">طراحی لگو </option>
                        <option value="3">دیجیتال مارکتینگ</option>

                    </select>
                    <i class="fa fa-cogs text-muted"></i>
                </div>
            </div>
            <div class="btn-search text-center mt-2">
                <input type="submit" value="جستجو">
            </div>
        </div>
    </div>
</section>

<!-- end of search box -->



<!-- list project start -->



<section class="list-projects mt-5">
    <div class="container">
        <?php foreach ($projectTodayAll as $project) { ?>

        <div class="card-projects shadow-lg mt-3">
            <div class="row">

                <div class="col-lg-6">

                    <div class="card-projects-desc">

                        <h1><?= $project['title'] ?></h1>
                        <span class="text-danger p-2">بودجه : <span class="text-muted px-2"><?= $project['budget'] ?>
                                تومان</span></span>
                        <span class="text-danger p-2"> زمان پیشنهادی : <span class="text-muted px-2">
                                <?= $project['suggested_time'] ?>
                                روز</span></span>
                        <p class="text-muted"> <?= substr($project['description'], 0, 80) . ' ...' ?>
                        </p>
                        <div class="date-projects w-25">
                            <span><?php $createdDate = new DateTime($project['created_at']);
                                            $today = new DateTime();
                                            $interval = $today->diff($createdDate);
                                            if ($interval->days === 0) {
                                                echo 'امروز';
                                            } else {

                                                echo $interval->days . " روز پیش ";
                                            } ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="btn-projects ">
                        <!-- <a href="#" class="">نشان کن</a> -->


                        <a href="<?= url('view-project/' . $project['id']) ?>">مشاهده پروژه</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- <div class="card-projects shadow-lg mt-3 border-danger">
            <div class="row">
                <div class="col-lg-2">
                    <div class="card-projects-img justify-content-center">
                        <img src="images/portfolio6.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="date-projects">
                        <span>2 روز پیش</span>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="card-projects-desc">
                        <h1>طراح وب <span class="date-exp fs-6 bg-danger px-2 py-1 text-white">29 روز باقی
                                مانده</span><span class="instant m-2 fs-6 bg-danger px-2 py-1 text-white">پروژه
                                فوری</span></h1>
                        <span class="text-danger p-2">بودجه : <span class="text-muted px-2">1500000
                                تومان</span></span>
                        <span class="text-danger p-2"> زمان پیشنهادی : <span class="text-muted px-2"> 5
                                روز</span></span>
                        <p class="text-muted">سلام یک پروژه دارم
                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت ...
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="btn-projects ">
                        <a href="#" class="">نشان کن</a>


                        <a href="#">مشاهده پروژه</a>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- end of list project -->

        <!-- start pagination -->
        <nav aria-label="Page navigation example">
      
      <ul class="pagination justify-content-center mt-3">
      <?php if ($page > 1): ?>
  <li class="page-item"><a class="page-link" href="?page=<?php echo $page - 1; ?>"><i class="fa fa-angles-right"></i></a></li> 
  <?php endif; ?>

  <?php for ($i = 1; $i <= $totalPages; $i++): ?>
  
  <li class="page-item"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
<?php endfor; ?>
          
        
<?php if ($page < $totalPages): ?>
  <li class="page-item"><a class="page-link"href="?page=<?php echo $page + 1; ?>"><i class="fa fa-angles-left"></i></a></li>
  <?php endif; ?>
      </ul>
  </nav>

        <!-- end of pagination -->
</section>





<?php require_once(BASE_PATH . '/tamplate/App/layouts/footer.php') ?>