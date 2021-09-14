@extends('template.main')
@section('content')
<section>
    <form action="/equipe" method="POST" class="container w-50 mb-5">
        @csrf

        <div class="mb-3 greenLime">
            <label for="exampleInputEmail1" class="form-label">Nom :</label>
            <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3 greenLime">
            <label for="exampleInputEmail1" class="form-label">Ville:</label>
            <input type="text" name="ville" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3 greenLime">
            <label for="exampleInputEmail1" class="form-label">Pays:</label>
            <input type="text" name="pays" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3 greenLime">
            <label for="exampleInputEmail1" class="form-label">Max. Joueurs :</label>
            <input type="number" min="7" name="joueurmax" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>

        <div class="mb-3 greenLime">
            <label for="exampleInputEmail1" class="form-label">Continent :</label>
            <select class="form-select" name="continent_id" aria-label="Default select example">
                @foreach ($continents as $continent)
                    <option value="{{ $continent->id }}">{{ $continent->continent }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary greenLime">Créer</button>
    </form>
</section>

@endsection