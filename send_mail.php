<?php
declare(strict_types=1);

// Her zaman JSON dön
header('Content-Type: application/json; charset=utf-8');
// Gerekirse CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// JSON'u bozan uyarıları ekrana bastırma
ini_set('display_errors', '0');
error_reporting(E_ALL);

// Yardımcı: POST al
function p(string $k): string {
    return isset($_POST[$k]) ? trim((string)$_POST[$k]) : '';
}

if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Geçersiz istek.']);
    exit;
}

// Form alanları
$studentName   = p('studentName');
$studentGrade  = p('studentGrade');
$studentPhone  = p('studentPhone');
$studentEmail  = p('studentEmail');
$studentSchool = p('studentSchool');
$parentName    = p('parentName');
$parentPhone   = p('parentPhone');

// Doğrulama
$req = [
  'studentName'   => 'Öğrenci Adı Soyadı',
  'studentGrade'  => 'Sınıf Düzeyi',
  'studentPhone'  => 'Öğrenci Telefon',
  'studentEmail'  => 'Öğrenci E-posta',
  'studentSchool' => 'Okul Adı',
  'parentName'    => 'Veli Adı Soyadı',
  'parentPhone'   => 'Veli Telefon'
];

$errors = [];
foreach ($req as $k => $label) {
    if ($$k === '') $errors[] = "$label alanı boş olamaz.";
}
if ($studentEmail !== '' && !filter_var($studentEmail, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Geçerli bir e-posta adresi giriniz.';
}
if ($errors) {
    echo json_encode(['success' => false, 'errors' => $errors]);
    exit;
}

// Mail hedefi
$to      = 'berkansucsuz95@gmail.com';
$subject = 'Yeni Sınav Kayıt Formu - ' . $studentName;

// Basit HTML içerik (kısaltıldı)
$message = '
<!DOCTYPE html><html lang="tr"><meta charset="UTF-8">
<body style="font-family:Arial,sans-serif;color:#333">
  <h2>🎓 Yeni Sınav Kayıt Başvurusu</h2>
  <p><b>Öğrenci:</b> '.htmlspecialchars($studentName).'</p>
  <p><b>Sınıf:</b> '.htmlspecialchars($studentGrade).'</p>
  <p><b>Öğrenci Tel:</b> '.htmlspecialchars($studentPhone).'</p>
  <p><b>Öğrenci E-posta:</b> '.htmlspecialchars($studentEmail).'</p>
  <p><b>Okul:</b> '.htmlspecialchars($studentSchool).'</p>
  <p><b>Veli:</b> '.htmlspecialchars($parentName).'</p>
  <p><b>Veli Tel:</b> '.htmlspecialchars($parentPhone).'</p>
</body></html>';

// Headerlar
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "From: Odak Eğitim Kurumları <noreply@odakkurs.com>\r\n";
$headers .= "Reply-To: ".$studentEmail."\r\n";
$headers .= "X-Mailer: PHP/".phpversion()."\r\n";

// Localhost'ta mail simülasyonu (SMTP yoksa JSON bozulmasın)
$host = $_SERVER['SERVER_NAME'] ?? '';
$isLocal = in_array($host, ['localhost','127.0.0.1'], true);

if ($isLocal) {
    // İstersen aşağıdakini açıp son maili dosyaya kaydedebilirsin:
    // @file_put_contents(__DIR__.'/last_mail.html', $message);
    echo json_encode([
        'success' => true,
        'message' => '(Geliştirici modu) Kayıt alındı. Localhost’ta e-posta simüle edildi.'
    ]);
    exit;
}

// Canlı sunucuda gerçek gönderim (SMTP ayarlıysa)
$sent = @mail($to, $subject, $message, $headers);

if ($sent) {
    echo json_encode([
        'success' => true,
        'message' => 'Kaydınız başarıyla alınmıştır! En kısa sürede size dönüş yapılacaktır.'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Mail gönderilemedi. Sunucu tarafında SMTP yapılandırması gerekli.'
    ]);
}
