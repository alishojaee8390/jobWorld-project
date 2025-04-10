 <!-- start footer -->
 <footer>
     <div class="container-fluid">
         <div class="row w-100">


             <div class="col-lg-6">
                 <div class="about-jobworld m-3">
                     <div class="about-jobworld-title">
                         <h3 class="text-center"> jobWorld</h3>
                     </div>
                     <ul>
                         <li><a href="<?= url('terms-conditions') ?>">قوانین و مقررات</a></li>
                         <li><a href="<?= url('contact-us') ?>">تماس با ما</a></li>
                         <li><a href="<?= url('about-us') ?>">درباره ما</a></li>
                     </ul>
                 </div>
             </div>
             <div class="col-lg-6">
                 <div class="jobwolrd">

                     <div class="jobworld-title m-3">
                         <h3 class="text-center">JobWorld</h3>
                     </div>
                     <div class="jobworld">
                         <p class="text-center mt-3">ما را در شبکه ها اجتماعی دنبال کنید</p>
                         <ul class="d-flex justify-content-center">
                             <li class="px-3"><a href="<?= $setting['instagram'] ?>"><i
                                         class="fab fa-instagram fa-lg"></i></a></li>
                             <li class="px-3"><a href="<?= $setting['telegram'] ?>"><i
                                         class="fab fa-telegram fa-lg"></i></a></li>
                             <li class="px-3"><a href="<?= $setting['linkedin'] ?>"><i
                                         class="fab fa-twitter fa-lg"></i></a></li>
                             <li class="px-3"><a href="<?= $setting['twitter'] ?>"><i
                                         class="fab fa-linkedin-in fa-lg"></i></a></li>

                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </footer>
 <!-- end of footer -->

 <!-- start copy-right -->
 <div class="copy-right">
     <p class=" text-center m-0 p-3">این سایت متعلق به JobWorld می باشد</p>
 </div>
 <!-- end of copy-right -->




 <script src="<?= asset('public/js/jquery-3.6.3.min.js') ?>"></script>
 <script src="<?= asset('public/js/all.min.js') ?>"></script>
 <script src="<?= asset('public/js/bootstrap.min.js') ?>"></script>
 <script src="<?= asset('public/js/owl.carousel.min.js') ?>"></script>
 <script src="<?= asset('public/js/jquery.counterup.min.js') ?>"></script>
 <script src="<?= asset('public/js/jquery.waypoints.min.js') ?>"></script>
 <script src="<?= asset('public/js/script.js') ?>"></script>
 <script src="<?= asset('public/jalalidatepicker/persian-datepicker.min.js') ?>"></script>


 </body>

 </html>