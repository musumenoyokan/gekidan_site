<?php
// send_mail.php

// セッション開始（CSRF対策用）
session_start();

// リクエストがPOSTか確認
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームからのデータを取得し、サニタイズ
    $name = htmlspecialchars(trim($_POST["name"]), ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars(trim($_POST["email"]), ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars(trim($_POST["message"]), ENT_QUOTES, 'UTF-8');

    // 入力チェック
    if (empty($name) || empty($email) || empty($message)) {
        http_response_code(400);
        echo "全てのフィールドを入力してください。";
        exit;
    }

    // メールアドレスの形式を検証
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        http_response_code(400);
        echo "有効なメールアドレスを入力してください。";
        exit;
    }

    // 送信先のメールアドレス（あなたのメールアドレスに変更してください）
    $to = "musumenoyokan@gmail.com";

    // メールの件名
    $subject = "お問い合わせフォームからのメッセージ";

    // メール本文
    $email_content = "名前: $name\n";
    $email_content .= "メールアドレス: $email\n\n";
    $email_content .= "メッセージ:\n$message\n";

    // メールヘッダー
    $email_headers = "From: $name <$email>";

    // メール送信
    if (mail($to, $subject, $email_content, $email_headers)) {
        // 成功メッセージ
        http_response_code(200);
        echo "メッセージが送信されました。ありがとうございます！";
    } else {
        // 失敗メッセージ
        http_response_code(500);
        echo "メッセージの送信に失敗しました。もう一度お試しください。";
    }
} else {
    // POST以外のリクエストは拒否
    http_response_code(403);
    echo "不正なリクエストです。";
}
?>
