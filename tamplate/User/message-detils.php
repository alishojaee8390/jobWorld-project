<?php require_once(BASE_PATH . '/tamplate/User/layouts/header.php') ?>

<section class="user-account">
    <div class="row w-100 m-auto mt-5 p-0">
        <div class="col-xl-10 col-md-8 col-lg-8 me-auto mt-5">

            <div class="container">

                <div class="card mt-4">
                    <div class="card-header text-center">
                        <h2>چت</h2>
                    </div>
                    <div class="card-body">
                        <div class="p-3" id="chat-box" style="height: 400px; overflow-y: scroll;"></div>
                    </div>
                    <div class="card-footer">
                        <form id="chat-form" class="mt-3">
                            <input type="hidden" id="project_id" value="<?= $id ?>">
                            <input type="hidden" id="user_id" value="<?= $_SESSION['user'][0] ?>">
                            <input type="hidden" id="receiver_id" value="<?= $user_id ?>">
                            <div class="input-group">
                                <input type="text" id="message" class="form-control" placeholder="پیام خود را وارد کنید..." required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">ارسال</button>
                                </div>
                            </div>
                        </form>
                       
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>


</section>



<?php require_once(BASE_PATH . '/tamplate/User/layouts/footer.php') ?>

<script>
    $(document).ready(function() {
        function convertTo12HourFormat(date) {

            let hours = date.slice(11, 13);
            const minutes = date.slice(14, 16);
            const seconds = date.slice(17, 19);
            const ampm = hours >= 12 ? 'PM' : 'AM';

            // تبدیل ساعت به فرمت 12 ساعته
            hours = hours % 12;
            hours = hours ? hours : 12; // ساعت 0 را به 12 تبدیل می‌کند

            return ampm + " " + hours + ":" + minutes;

        }

        function loadMessages() {
            let projectId = $('#project_id').val();
            let receiverId = $('#receiver_id').val();
            let user = $('#user_id').val();
            $.ajax({
                    url: domain + '/jobWorld/panel/show-message/' + projectId + '/user/' + user,
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        project_id: projectId,
                        user_id: user,
                        receiver_id: receiverId
                    },
                    success: function(data) {

                        $('#chat-box').empty();
                        $.each(data, function(index, message) {
                            if (message.seen == 1) {
                                seen = 'fa-check-double text-success'
                            } else {

                                seen = 'fa-check'
                            }

                            if (message.receiver_id == receiverId) {
                                if (message.user_id == user) {
                                    $('#chat-box').append('<div class="text-end d-inline-block bg-light p-2 rounded-3 mt-2"><span>' + message.message + '</span><div class="d-flex align-items-center  justify-content-between mt-1"><i class="fa ' + seen + ' text-secondary d-block"></i><span style="font-size:13px; color:#949292">' + convertTo12HourFormat(message.created_at) + '<span></div></div></br>')
                                }

                            }
                            if (message.receiver_id == user) {
                                if (message.user_id == receiverId) {
                                    $('#chat-box').append('<div class="mt-2 text-start d-flex justify-content-end"><p class="bg-light p-2 rounded-3 d-flex flex-column-reverse"><span style="font-size:13px;color:#949292">' + convertTo12HourFormat(message.created_at) + '</span>' + message.message + '</p></div>')

                                }

                            }

                        })

                    }
                })
        }
        $(document).ready(function() {
            let receiverId = $('#receiver_id').val();
            let projectId = $('#project_id').val();
            let user = $('#user_id').val();
            $.ajax({
                url:  domain + '/jobWorld/panel/seen-message/' + projectId + '/user/' + user,
                method: 'GET',
                dataType: 'json',
                data: { receiver_id: receiverId  , project_id : projectId},
                success: function() {
                       loadMessages();
                   }
               });

           loadMessages();


        })

        let domain = window.location.origin;
      

        loadMessages();

        $('#chat-form').on('submit', function(e) {

            e.preventDefault();
            let message = $('#message').val();
            let projectId = $('#project_id').val();
            let user = $('#user_id').val();
            let receiverId = $('#receiver_id').val();


            $.ajax({
                url: domain + '/jobWorld/panel/send-message/' + projectId + '/user/' + user,
                method: 'GET',
                data: {
                    message: message,
                    projectId: projectId,
                    receiverId: receiverId,
                },
                success: function() {
                    $('#message').val('');
                    loadMessages();
                }
            });
        });


        setInterval(loadMessages, 1000); // بارگذاری مجدد پیام‌ها هر 5 ثانیه
    });
</script>