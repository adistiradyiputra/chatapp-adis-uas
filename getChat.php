<?php 
    include 'Database.php';

    $db  = new Database();
    $con = $db->Connect();

    $rows = mysqli_query($con, "SELECT * FROM chat");
    $data = [];
    $no   = 0;

    foreach ($rows as $row) {
        $data[] = $row;
        $no = $no + 1;
    }

    $dataGet = json_encode($data);

    $mhs = json_decode($dataGet);

    for ($i = 0; $i < $no; $i++) {
        $isOdd = $i % 2 == 1;
        $class = $isOdd ? 'odd' : 'even';

        $bubbleClass = $isOdd ? 'chat-bubble--left' : 'chat-bubble--right'; // Tambahkan kelas chat-bubble--right jika ganjil, sebaliknya untuk chat-bubble--left

        $colClass = '';
        if ($i % 2 == 0) {
            $colClass = 'col-md-3 offset-md-9'; // Jika genap, gunakan col-md-3 offset-md-9
        } else {
            $colClass = 'col-md-3'; // Jika ganjil, gunakan col-md-3
        }

        echo "<div class='row no-gutters'>";
        echo "<div class='$colClass'>";
        echo "<div class='chat-bubble $bubbleClass $class'>";
        echo "<label style='top: 8px; position: absolute; font-size: 11px;'>" . $mhs[$i]->nama_chat . "</label>";

        $date = date_create($mhs[$i]->tgl_chat);
        echo "<label style='top: 8px; right: 8px; position: absolute; font-size: 11px;'>" . date_format($date, "M d") . "</label>";

        echo "<br>";
        echo $mhs[$i]->text_chat;
        echo "<br>";

        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
?>
