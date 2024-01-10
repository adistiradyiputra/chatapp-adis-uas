<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Unbin Chating</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css'>
  <link rel="stylesheet" href="./style.css">
  <link rel="icon" type="image/x-icon" href="icon.ico">
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
    <div class="row no-gutters">
        <div class="col-md-4 border-right">
            <div class="settings-tray">
                <img class="profile-image" src="https://www.clarity-enhanced.net/wp-content/uploads/2020/06/filip.jpg" alt="Profile img">
                <span class="settings-tray--right">
                    <i class="material-icons">cached</i>
                    <i class="material-icons">message</i>
                    <i class="material-icons">menu</i>
                </span>
            </div>
            <div class="search-box">
                <div class="input-wrapper">
                    <i class="material-icons">search</i>
                    <input placeholder="Search here" type="text">
                </div>
            </div>
            <div class="friend-drawer friend-drawer--onhover">
                <div class="card" style="height: 100%; border:0;">
                    <div class="card-body">
                        <form id="chat-form">
                            <div class="form-group">
                                <input style="width: 300px;" type="text" name="nama_chat" class="form-control" id="name" placeholder="Enter Name...">
                            </div>
                            <div class="form-group" style="margin-top: 10px; margin-bottom: 10px;">
                                <textarea class="form-control" name="text_chat" id="chat" rows="4" placeholder="Type Here..."></textarea>
                            </div>
                            <button type="button" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="settings-tray">
                <div class="friend-drawer no-gutters friend-drawer--grey">
                    <img class="profile-image" src="unbin.png" alt="">
                    <div class="text">
                        <h6>UNBIN</h6>
                        <p class="text-muted">Kampus Terbaik Se-Indonesia</p>
                    </div>
                    <span class="settings-tray--right">
                        <i class="material-icons">cached</i>
                        <i class="material-icons">message</i>
                        <i class="material-icons">menu</i>
                    </span>
                </div>
            </div>
            <div id="chat-content" class="chat-panel">
                <!-- Hasil chat dari getChat.php akan ditampilkan di sini -->
            </div>
        </div>
    </div>
</div>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
<script>
    $(document).ready(function () {
        getChat();
        $("button").click(function (e) {
            var values = $('#chat-form').serialize();
            // post
            $.ajax({
                type: "post",
                url: "postChat.php",
                data: values,
                success: function (response) {
                    getChat();
                    clearInput();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
        function getChat() {
            $.ajax({
                type: "get",
                url: "getChat.php",
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                },
                success: function (response) {
                    $("#chat-content").html(response);
                }
            });
        }

        function clearInput() {
            $('input').val('');
            $('textarea').val('');
        }
    });
</script>
</body>
</html>
