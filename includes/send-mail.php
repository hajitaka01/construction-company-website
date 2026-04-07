<?php
header('Content-Type: application/json');
header('Cache-Control: no-cache, must-revalidate');
ini_set('display_errors', 0);
error_log("Processing send-mail request at " . date('Y-m-d H:i:s'));

require '../vendor/autoload.php'; // Sửa đường dẫn
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Phương thức không được hỗ trợ');
    }

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $subject = $_POST['subject'] ?? 'Liên hệ từ website';
    $message = $_POST['message'] ?? '';

    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        throw new Exception('Vui lòng điền đầy đủ thông tin bắt buộc');
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Email không hợp lệ');
    }

    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {
        error_log("SMTP Debug: $str");
    };
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'havy95170@gmail.com'; // Thay bằng email của bạn
    $mail->Password = 'wubzwimvwlcwsgjv'; // Thay bằng App Password không khoảng trắng
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->Timeout = 10;

    $mail->setFrom('havy95170@gmail.com', $name);
    $mail->addReplyTo($email, $name);
    $mail->addAddress('hoanggiakhanh114@gmail.com', 'Hoàng Gia Khánh'); // Thay bằng email người nhận
    $mail->Subject = "[Website] " . $subject;
    // Định dạng HTML cho email với thiết kế nâng cao
    $mail->isHTML(true);
    $mail->Body = "
        <html>
        <head>
            <style type='text/css'>
                body { margin: 0; padding: 0; font-family: 'Helvetica Neue', Arial, sans-serif; background-color: #f5f7fa; }
                .container { max-width: 600px; margin: 30px auto; background: linear-gradient(135deg, #ffffff 0%, #f0f4f8 100%); border-radius: 10px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
                .header { background: linear-gradient(90deg, #007bff, #00c6ff); padding: 20px; text-align: center; color: #fff; border-radius: 10px 10px 0 0; }
                .header img { max-width: 150px; }
                .content { padding: 30px; }
                .info-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
                .info-table td { padding: 10px; border-bottom: 1px solid #eee; }
                .info-table td:first-child { font-weight: bold; color: #333; width: 30%; }
                .info-table td:last-child { color: #666; }
                .message-box { background: #f9f9f9; padding: 15px; border-radius: 5px; border-left: 4px solid #007bff; }
                .action-btn { display: inline-block; padding: 12px 25px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 5px; font-weight: bold; margin-top: 20px; }
                .action-btn:hover { background-color: #0056b3; }
                .footer { text-align: center; font-size: 12px; color: #999; padding: 20px; background-color: #f0f4f8; border-top: 1px solid #ddd; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <img src='https://via.placeholder.com/150' alt='Logo' style='max-width: 150px;'> <!-- Thay bằng URL logo của bạn -->
                    <h2 style='margin: 10px 0;'>[Website] Liên Hệ Mới</h2>
                </div>
                <div class='content'>
                    <p style='color: #444; font-size: 16px;'>Bạn nhận được một tin nhắn mới từ website vào lúc " . date('H:i d/m/Y') . ":</p>
                    <table class='info-table'>
                        <tr><td>Họ tên:</td><td>$name</td></tr>
                        <tr><td>Email:</td><td>$email</td></tr>
                        <tr><td>Số điện thoại:</td><td>$phone</td></tr>
                    </table>
                    <div class='message-box'>
                        <strong>Nội dung:</strong><br>$message
                    </div>
                    <a href='mailto:$email' class='action-btn'>Trả lời ngay</a>
                </div>
                <div class='footer'>
                    <p>Đây là email tự động. Vui lòng không trả lời trực tiếp.</p>
                    <p>© " . date('Y') . " Your Website. All rights reserved.</p>
                </div>
            </div>
        </body>
        </html>
    ";

    $mail->send();
    echo json_encode([
        'status' => 'success',
        'message' => 'Cảm ơn bạn đã liên hệ. Chúng tôi sẽ phản hồi sớm nhất có thể!'
    ]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => "Có lỗi xảy ra: " . $e->getMessage()
    ]);
    error_log("PHPMailer Error: " . $e->getMessage());
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'Lỗi server nội bộ. Vui lòng thử lại sau.'
    ]);
    error_log("Unexpected Error: " . $e->getMessage());
}
?>