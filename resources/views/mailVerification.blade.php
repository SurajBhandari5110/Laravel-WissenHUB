<!-- resources/views/mailVerification.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>{{ $data['title'] }}</title>
</head>
<body>
    <h1>Email Verification</h1>
    <p>{{ $data['body'] }}</p>
    <p>This is your One Time Password (OTP) for email verification. Please use it within 90 seconds.</p>
    <p>If you didn't request this, please ignore this email.</p>
</body>
</html>