<!-- <footer class="footer-user-panel">
    <div class="row w-100 m-0">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto ">
            <div class="row w-100">
                <div class="col-lg-12">
                    <ul class="list-unstyled d-flex align-items-center p-2 justify-content-center">
                        <li class="nav-item"><a href="#" class="nav-link text-white">درباره ما</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-white">پشتیبانی</a></li>
                        <li class="nav-item"><a href="#" class="nav-link text-white">وبلاگ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer> -->

<!-- start footer -->


<script src="<?= asset('public/js/all.min.js') ?>"></script>
<script src="<?= asset('public/js/bootstrap.min.js') ?>"></script>
<script src="<?= asset('public/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= asset('public/js/userPanel.js') ?>"></script>
<script src="<?= asset('public/js/jquery-3.6.3.min.js') ?>"></script>
<script src="<?= asset('public/jalalidatepicker/persian-datepicker.min.js') ?>"></script>
<script src="<?= asset('public/jalalidatepicker/persian-date.min.js') ?>"></script>
<script>
    $(document).ready(function() {
        $('#published_date_start').persianDatepicker({
            format: 'YYYY/MM/DD',
            altField: '#published_at',
            timePicker: {
                enabled: true,
                meridiem: {
                    enabled: true
                }
            }

        })
        $('#published_date_end').persianDatepicker({
            format: 'YYYY/MM/DD',
            altField: '#published_at',
            timePicker: {
                enabled: true,
                meridiem: {
                    enabled: true
                }
            }

        })
    })
</script>

</body>

</html>