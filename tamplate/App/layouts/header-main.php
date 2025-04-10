    <!-- header-main start -->
    <header>


        <section class="header-main" style="background:  linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.4)), url(<?= asset($setting['background_head']) ?>) !important ;     background-position: 100% !important;
    background-repeat: no-repeat !important;
    background-size: cover !important;
    height: 800px !important;
    position: relative !important;">
            <div class="row w-100 m-0">
                <div class="col-lg-6 me-auto  animated fadeInLeft">
                    <div class="header-main-title mb-5 ">
                        <h1 class="mb-4"><?= $setting['title_header'] ?></h1>
                        <h3><?= $setting['description_header'] ?></h3>
                    </div>
                    <div class="row w-100 ">
                        <div class="col-sm-8 col-md-8 col-lg-6 m-auto">
                            <div class="header-main-form">
                                <form class="d-flex align-items-center p-1" role="search" action="<?= url('search-projects/') ?>" method="post">
                                    <input class="form-control me-2" type="search" name="search" required placeholder="جستجوی پروژها" aria-label="Search">
                                    <button class="mt-1 text-secondary btn" type="submit"><i class="fa fa-search ms-2 "></i></button>
                                </form>
                                <div class="btn-main d-flex justify-content-center mt-3">
                                    <a href="<?= url('/show-projects') ?>" class="btn text-white mx-2">پروژه ها</a>
                                    <a href="<?= url('/show-freelancers') ?>" class="btn text-white">فریلنسر ها</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </header>
    <!-- end of header-main -->