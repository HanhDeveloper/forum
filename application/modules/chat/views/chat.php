<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="panel panel-primary">
    <div class="panel-body">
        <?php echo form_open('chat', array('class' => 'form-horizontal')); ?>
        <div class="row">
            <div class="col-xs-9"><textarea name="message" rows="3" required="required"
                                            class="form-control" id="chat_input"></textarea></div>
            <div class="col-xs-3"><input type="submit" name="submit" value="Gửi"
                                         class="btn btn-primary btn-block" id="chat_submit"></div>
        </div>
        <?php echo form_close(); ?>
    </div>
    <div class="chatbox">
        <ul id="chatbox" class="list-group"></ul>
    </div>
</div>
<script>
    //chatbox
    var isSubmitting = false;
    $('#chat_submit').click(function (event) {
        event.preventDefault();
        if (isSubmitting)
            return;
        var input = $('#chat_input').val();
        if (input.length >= 5) {
            $.ajax({
                type: "POST",
                url: base + "/chat/save_message",
                data: {message: input},
                cache: false,
                beforeSend: function () {
                    isSubmitting = true;
                    //$("#chatbox").html('<img src="' + base + 'assets/img/ajax-loader.gif" /> Connecting...');
                },
                success: function (response) {
                    if (response.success == true) {
                        refresh();
                        $('#chat_input').val('')
                        console.log('submit')
                    }
                    isSubmitting = false;
                }
            });
        } else
            alert('Yeu cau 5 ky tu');
    });
    var first_id = false;
    var last_id = false;
    refresh = function () {
        $.post(base + "/chat/messages", {first_id: first_id, last_id: last_id}, function (response, status) {
            console.log(status);
            if (response.success == true) {
                $.each(response.messages, function (i, val) {
                    console.log(val);
                    $('#chatbox').prepend('<li class="list-group-item" data-time="' + val.time + '" id="chat-' + val.id + '"><a href="' + base + '/account/profile/' + val.username + '.' + val.user_id + '" title="' + val.time + '"><b>' + (val.name ? val.name : 'BOT') + '</b></a>: ' + val.message + '</li>');
                    last_id = val.id;
                });
            }
            console.log(last_id);
        });
    };

    function bootChat() {
        $('#chatbox').empty();
        refresh();
        setInterval(refresh, 5000);
    }

    bootChat();
</script>