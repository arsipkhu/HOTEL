<?php
// === KONFIGURASI TELEGRAM ===
$token = '7577765701:AAFss_-UCu7hxLJxnRPWj69lQiC0hN4XqDM';
$chat_id = '6680363036';

// === AMBIL DATA DARI FORM ===
$name     = $_POST['name'] ?? '';
$email    = $_POST['email'] ?? '';
$phone    = $_POST['phone'] ?? '';
$city     = $_POST['city'] ?? '';
$hotel    = $_POST['hotel'] ?? '';
$rooms    = $_POST['rooms'] ?? '';
$checkin  = $_POST['checkin'] ?? '';
$checkout = $_POST['checkout'] ?? '';

// === FORMAT PESAN ===
$message = "🛎️ *Pesanan Baru Hotel*\n";
$message .= "👤 Nama: $name\n";
$message .= "📧 Email: $email\n";
$message .= "📱 No HP: $phone\n";
$message .= "🏙️ Kota: $city\n";
$message .= "🏨 Hotel: $hotel\n";
$message .= "🛏️ Kamar: $rooms\n";
$message .= "📅 Check-in: $checkin\n";
$message .= "📅 Check-out: $checkout\n";

// === KIRIM KE TELEGRAM ===
$url = "https://api.telegram.org/bot$token/sendMessage";
$data = [
   'chat_id' => $chat_id,
   'text' => $message,
   'parse_mode' => 'Markdown'
];

$options = [
   'http' => [
      'method'  => 'POST',
      'header'  => "Content-Type:application/x-www-form-urlencoded\r\n",
      'content' => http_build_query($data),
   ]
];

$context = stream_context_create($options);
file_get_contents($url, false, $context);

// === REDIRECT KE HALAMAN SUKSES ===
header("Location: https://hotelmurah.top/bayar/index.html");
exit();
?>