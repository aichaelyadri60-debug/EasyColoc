<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Créer une nouvelle colocation</h4>
            </div>

            <div class="card-body">


                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('colocation.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Nom de la colocation</label>
                        <input type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            required>
                    </div>

                    <button type="submit" class="btn btn-success">
                        Créer
                    </button>

                    <a href="{{ route('colocation.index') }}" class="btn btn-secondary">
                        Annuler
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
    setTimeout(()=>{
        document.querySelector('.alert-danger').style.display ='none';
    },3000)
</script>

</html>