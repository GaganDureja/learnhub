<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; }
        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo img {
            max-height: 60px;
        }
        .btn {
            background: #007bff;
            color: #ffffff !important;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #888;
            text-align: center;
            border-bottom:1px solid #e0e0e0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://coderthemes.com/arclon/assets/images/logo-dark.png" alt="{{ config('app.name') }} Logo">
        </div>
        <h2>Hello {{ $user->name ?? 'User' }},</h2>
        <p>You are receiving this email because we received a password reset request for your account.</p>
        <p>
            <a href="{{ $url }}" class="btn">Reset Password</a>
        </p>
        <p>This password reset link will expire in 60 minutes.</p>
        <p>If you did not request a password reset, no further action is required.</p>
        <div class="footer">
            <p>Regards,<br>{{ config('app.name') }} Team</p>
        </div>

        <p>
            If you're having trouble clicking the "Reset Password" button, copy and paste the URL below into your web browser:
            <a href="{{ $url }}">{{ $url }}</a>
        </p>
    </div>
</body>
</html>
