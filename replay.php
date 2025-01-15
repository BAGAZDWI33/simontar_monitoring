<?php
header("Content-Type: application/xml; charset=UTF-8");

// Ambil data dari Twilio
$incomingMessage = isset($_POST['Body']) ? $_POST['Body'] : "";

// Balasan otomatis berdasarkan pesan yang diterima
if (strpos($incomingMessage, 'ALERT') !== false) {
    $responseMessage = "Kami telah menerima notifikasi ALERT. Harap segera cek sistem Anda.";
} else {
    $responseMessage = "Terima kasih atas pesan Anda.";
}

// Balasan untuk Twilio
echo '<Response><Message>' . htmlspecialchars($responseMessage) . '</Message></Response>';
