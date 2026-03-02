<?php
// 文字コード設定
mb_language("Japanese");
mb_internal_encoding("UTF-8");

// フォームからの値を取得
$company    = $_POST['company'] ?? '';
$department = $_POST['department'] ?? '';
$name    = $_POST['name'] ?? '';
$email   = $_POST['email'] ?? '';
$tel     = $_POST['tel'] ?? '';
$zip        = $_POST['zip'] ?? '';
$prefecture = $_POST['prefecture'] ?? '';
$address1    = $_POST['address1'] ?? '';
$address2   = $_POST['address2'] ?? '';
$subject = $_POST['subject'] ?? '';
$message = $_POST['message'] ?? '';

// 送信先メールアドレス
$to = "noreply@example.com"; // ← 自分の受信したいアドレス

// メール件名
$mail_subject = "【お問い合わせ】" . $subject;

// メール本文
$body = "お問い合わせがありました。\n\n";

if ($company !== '') {
  $body .= "【会社名】\n{$company}\n\n";
}

if ($department !== '') {
  $body .= "【部署名】\n{$department}\n\n";
}

$body .= <<<EOT
【氏名】
$name

【メールアドレス】
$email

【電話番号】
$tel

【住所】
$zip
$prefecture
$address1
$address2

【件名】
$subject

【お問い合わせ内容】
$message
EOT;

/* ===== ここが迷惑メール対策ゾーン ===== */

// Fromは自分のドメイン
$headers = "From: noreply@example.com\r\n";

// 返信先をユーザーに
$headers .= "Reply-To: {$email}\r\n";

//文字コード指定（重要）
$headers .= "Content-Type: text/plain; charset=UTF-8";

/* ===== ここまで =====*/

// メール送信
if (mb_send_mail($to, $mail_subject, $body, $headers)) {
    echo "送信が完了しました。";
} else {
    echo "送信に失敗しました。";
}
