
@extends('layouts.app')
$section('content')
    <h1>Mes colocations</h1>

    <a href="{{route('colocation.create')}}">
        <button>Créer une nouvelle colocation</button>
    </a>

    <hr>

    @forelse($colocations as $coloc)
    <div style="border:1px solid black; padding:10px; margin:10px 0;">

        <h2>{{ $coloc->name }}</h2>
        <h5>{{ $coloc->is_active ?'active' :'inactif' }}</h5>


        <a href="{{route('colocation.show', $coloc->id)}}">
            <button>Détail</button>
        </a>

        <form action="{{route('annulercolocation' , $coloc->id)}}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" onclick="return confirm('annuler cette colocation ?')">
                Annuler
            </button>
        </form>

    </div>
    @empty
    <p>Aucune colocation trouvée.</p>
    @endforelse





@endsection