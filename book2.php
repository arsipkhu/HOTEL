<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $name = $_POST["name"];
    $email = $_POST["email"];
    $city = $_POST["city"];
    $hotel = $_POST["hotel"];
    $rooms = $_POST["rooms"];
    $checkin = $_POST["checkin"];
    $checkout = $_POST["checkout"];

    // Kirim data ke bot Telegram
    $telegramMessage = "Pesan Hotel Baru:\n\n";
    $telegramMessage .= "Nama: " . $name . "\n";
    $telegramMessage .= "Email: " . $email . "\n";
    $telegramMessage .= "Kota: " . $city . "\n";
    $telegramMessage .= "Nama Hotel: " . $hotel . "\n";
    $telegramMessage .= "Jumlah Kamar: " . $rooms . "\n";
    $telegramMessage .= "Check-in: " . $checkin . "\n";
    $telegramMessage .= "Check-out: " . $checkout . "\n";

    $telegramBotToken = "6636940991:AAFLFQfF_E7k9JvAzWBQnDtf_ArXYE0rc4U";
    $chatId = "6680363036";

    $telegramUrl = "https://api.telegram.org/bot" . $telegramBotToken . "/sendMessage?chat_id=" . $chatId . "&text=" . urlencode($telegramMessage);
    file_get_contents($telegramUrl); // Kirim pesan ke bot Telegram

    // Redirect ke halaman "bayar"
    header("Location: bayar/index.html");
    exit();
} else {
    // Jika form tidak disubmit, kembali ke halaman sebelumnya
    header("Location: book.html");
    exit();
}
?>
