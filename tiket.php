<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $name = $_POST["name"];
    $email = $_POST["email"];
    $from = $_POST["from"];
    $to = $_POST["to"];
    $departure = $_POST["departure"];
    $arrive = $_POST["arrive"];

    // Kirim data ke bot Telegram
    $telegramMessage = "Pesan Tiket Pesawat Baru:\n\n";
    $telegramMessage .= "Nama Penumpang: " . $name . "\n";
    $telegramMessage .= "Email: " . $email . "\n";
    $telegramMessage .= "Dari: " . $from . "\n";
    $telegramMessage .= "Ke: " . $to . "\n";
    $telegramMessage .= "Tanggal Berangkat: " . $departure . "\n";
    $telegramMessage .= "Tanggal Pulang: " . $arrive . "\n";

    $telegramBotToken = "6636940991:AAFLFQfF_E7k9JvAzWBQnDtf_ArXYE0rc4U";
    $chatId = "5757465222";

    $telegramUrl = "https://api.telegram.org/bot" . $telegramBotToken . "/sendMessage?chat_id=" . $chatId . "&text=" . urlencode($telegramMessage);
    file_get_contents($telegramUrl); // Kirim pesan ke bot Telegram

    // Redirect ke halaman "bayar"
    header("Location: bayar/");
    exit();
} else {
    // Jika form tidak disubmit, kembali ke halaman sebelumnya
    header("Location: tiket.html");
    exit();
}
?>
