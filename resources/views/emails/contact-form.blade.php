<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wiadomość ze strony www</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 14px; color: #333;">
    <h2>Nowa wiadomość ze strony www</h2>

    <p><strong>Imię i nazwisko:</strong> {{ $name }}</p>
<p><strong>E-mail:</strong> {{ $email }}</p>
@if($phone)
    <p><strong>Telefon:</strong> {{ $phone }}</p>
@endif

<p><strong>Treść wiadomości:</strong></p>
<p>{{ nl2br(e($messageContent)) }}</p>

<hr>
<p style="color: #999; font-size: 12px;">Wiadomość wysłana automatycznie z formularza kontaktowego na stronie.</p>
</body>
</html>
