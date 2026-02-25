<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes colocations</title>
</head>
<body>

    <h1>Mes colocations</h1>

    <!-- Bouton créer -->
    <a href="{{route('colocation.create')}}">
        <button>Créer une nouvelle colocation</button>
    </a>

    <hr>

    @forelse($colocations as $coloc)
        <div style="border:1px solid black; padding:10px; margin:10px 0;">
            
            <h2>{{ $coloc->name }}</h2>


            <a href="">
                <button>Détail</button>
            </a>

            <form action="" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Supprimer cette colocation ?')">
                    Supprimer
                </button>
            </form>

        </div>
    @empty
        <p>Aucune colocation trouvée.</p>
    @endforelse

</body>
</html>