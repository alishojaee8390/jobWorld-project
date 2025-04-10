<!--  =============================================== start-footer =============================================== -->

<!-- <footer class="footer-panel-admin">
    <div class="row w-100">
        <div class="col-xl-10 col-lg-8 col-md-8 me-auto">
            <p class="text-center mb-0 p-3">تمامی حقوق مادی و معنوی متلعق به سایت JobWorld می باشد</p>
        </div>
    </div>

</footer> -->
<!--  =============================================== end-of-footer =============================================== -->



<script src="<?= asset('public/js/all.min.js') ?>"></script>
<script src="<?= asset('public/js/bootstrap.min.js') ?>"></script>
<script src="<?= asset('public/js/jquery-3.6.3.min.js') ?>"></script>
<script src="<?= asset('public/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= asset('public/js/Chart.min.js') ?>"></script>
<script src="<?= asset('public/js/panelAdmin.js') ?>"></script>
<script src="<?= asset('public/ckeditor/ckeditor.js') ?>"></script>

<script>
// const file = document.querySelector('#file-upload')
// const selectedFileLength = document.querySelector('#selected-file-length')
// file.addEventListener('change', () => {
//     selectedFileLength.textContent = `${file.files.length} فایل انتخاب  شده `
// })

$(document).ready(function() {
    CKEDITOR.replace('description');
    CKEDITOR.replace('description_header');

    // $("#published_at_view").persianDatepicker({

    //     format: 'YYYY-MM-DD HH:mm:ss',
    //     toolbox: {
    //         calendarSwitch: {
    //             enabled: true
    //         }
    //     },
    //     timePicker: {
    //         enabled: true,
    //     },
    //     observer: true,
    //     altField: '#published_at'

    // })
});
</script>

</body>

</html>