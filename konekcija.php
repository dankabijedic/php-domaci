<?php
$mysql_server = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_db = "turisticka_agencija";
$conn = new mysqli($mysql_server, $mysql_user, $mysql_password, $mysql_db);
if ($conn->connect_errno) {
    printf("Konekcija neuspešna: %s\n", $conn->connect_error);
    exit();
}
$conn->set_charset("utf8");
?>
