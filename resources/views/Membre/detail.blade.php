<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('addMembre' ,$colocation->id) }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Entrer email d'un membre" required>
        <button type="submit">Inviter</button>
    </form>

    <h1>{{ $colocation->name }}</h1>
    <h5>{{ $colocation->is_active ? 'Active' : 'Inactive' }}</h5>

    @foreach($users as $user)
    <div style="border:1px solid #ccc; padding:10px; margin:10px 0;">
        <p><strong>Nom :</strong> {{ $user->name }}</p>
        <p><strong>Reputation :</strong> {{ $user->Reputation }}</p>
        <p><strong>Status :</strong> {{ $user->is_banned ? 'Banni' : 'Non banni' }}</p>

        <form action="" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Supprimer ce membre ?')">
                Supprimer
            </button>
        </form>
    </div>
    @endforeach

</body>

</html>