<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Invitation à rejoindre une colocation</h2>

    <p>Vous avez été invité à rejoindre une colocation.</p>

    <a href="{{ route('acceptInvitation', $token) }}">
        Cliquer ici pour accepter
    </a>  
</body>
</html>