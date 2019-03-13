<?php include_once('../includes/session.php'); ?>
<div class="mainfooter">
<ul class="footer-container">
  <li class="footer-item flex1">&copy; Euphoria Technologies Pvt Ltd</li>
  <li class="footer-item flex2">
    <button class="flex2 support" id="support">Support</button>
    <button class="flex2 about" id="about">About</button>
  </li>
</ul>
    </div>
    <script type="text/javascript">
    $(function() {
        $("#support").click(function() {
            swal({
                title: 'Support Request',
                html: '<label>Priority</label><br>' +
                    '<select id="priority" name="priority" class="swal-content__input">' +
                    '<option value="">Select</option>' +
                    '<option value="high">High</option>' +
                    '<option value="medium">Medium</option>' +
                    '<option value="low">Low</option></select><br>' +
                    '<label>Name</label>' +
                    '<input type="text" id="name" value="<?php $action_by_name = $user_data['name']; ?>"name="name" class="swal-content__input" placeholder="Enter name" required><br>' +
                    '<label>Email</label>' +
                    '<input type="text" id="email" name="email" class="swal-content__input" placeholder="Enter email" required><br>' +
                    '<label>Message</label>' +
                    '<textarea id="message" name="message" rows="4" cols="50" class="swal-content__input" placeholder="Enter your message" required></textarea><br>',
                preConfirm: function() {
                    return new Promise(function(resolve, reject) {
                        var response = {};
                        response.errors = {};
                        response.values = {};
                        if ($('#priority').val() == '') {
                            response.errors.priority = 'Please select priority';
                        }
                        if ($('#name').val() == '') {
                            response.errors.name = 'Please enter your name';
                        }
                        if ($('#email').val() == '') {
                            response.errors.email =
                                'Please enter your email address';
                        }
                        if ($('#message').val() == '') {
                            response.errors.message = 'Please enter message';
                        }
                        if (Object.keys(response.errors).length == 0) {
                           
                            resolve([
                                $('#priority').val(),
                                $('#name').val(),
                                $('#email').val(),
                                $('#message').val()
                            ]);
                        } else {
                            $.each(response.errors, function(key, value) {
                                if (!($('input[name="' + key + '"]').hasClass(
                                        'invalid')) && !($('input[name="' +
                                        key + '-invalid"]').length)) {
                                    $('input[name="' + key + '"]').addClass(
                                        'invalid').after('<div class="' +
                                        key +
                                        '-invalid invalid-feedback">' +
                                        value + '</div>');
                                }
                                if (!($('select[name="' + key + '"]').hasClass(
                                        'invalid')) && !($('select[name="' +
                                        key + '-invalid"]').length)) {
                                    $('select[name="' + key + '"]').addClass(
                                        'invalid').after('<div class="' +
                                        key +
                                        '-invalid invalid-feedback">' +
                                        value + '</div>');
                                }
                                if (!($('textarea[name="' + key + '"]')
                                        .hasClass('invalid')) && !($(
                                        'textarea[name="' + key +
                                        '-invalid"]').length)) {
                                    $('textarea[name="' + key + '"]').addClass(
                                        'invalid').after('<div class="' +
                                        key +
                                        '-invalid invalid-feedback">' +
                                        value + '</div>');
                                }                           
                            });
                            reject();
                        }
                    })
                },
                confirmButtonText: 'Send Request',
                // closeOnConfirm: false,
                showCancelButton: false,
                showCloseButton: true,
                allowOutsideClick: false
            }).then(function(result) {
                console.log(result);
                $.ajax({
                    type: 'POST',
                    url: '../layout/support.php',
                    data: {
                        priority: result[0],
                        name: result[1],
                        email: result[2],
                        message: result[3],
                        url: window.location.href
                    },
                    success: function(response) {
                        swal(response);
                    },
                    error: function(response) {
                        console.error(response.message);
                        swal(response.message);
                    }
                });
            }).catch(function(result) {
                swal.noop;
            });
        });
    });
    $("#about").click(function() {
        swal({
                html: '<img src="../img/euphotel.png"><br>' +
                    '<a  href="https://www.euphoriatechnologies.com" target="_blank">www.euphoriatechnologies.com</a><br>' +
                    '<label for="number" id="number">+91 (22) 6129-7697</label><br>' +
                    '<label for="version" id="version">version: 1.0.0</label>',
                showConfirmButton: false,
                showCancelButton: false,
                showCloseButton: true,
                allowOutsideClick: false
            },
            function(isConfirm) {
                if (isConfirm) {} else {}
            }).catch(swal.noop);
    });
    </script>
