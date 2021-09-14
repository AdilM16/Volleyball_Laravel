@extends('template.main')
@section('content')
@include('pages.partials.flash')
<section>
    <form action="/joueur" method="POST" enctype="multipart/form-data" class="container w-50 mb-5">
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label greenLime">Nom du joueur :</label>
            <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label greenLime">Prénom du joueur :</label>
            <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label greenLime">Age :</label>
            <input type="number" name="age" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label greenLime">Téléphone :</label>
            <input type="number" min="0" name="telephone" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label greenLime">E-mail :</label>
            <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label greenLime">Genre:</label>
            <select name="genre" class="form-select mb-3" aria-label="Default select example">
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label greenLime">Pays d'origine :</label>
            <input type="text" name="pays" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label greenLime">Role :</label>
            <select name="role_id" class="form-select mb-3" aria-label="Default select example">
                @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->role }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label greenLime">Equipe:</label>
            <select name="equipe_id" class="form-select mb-3" aria-label="Default select example">
                @foreach ($equipes as $equipe)
                <option value="{{ $equipe->id }}">{{ $equipe->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label greenLime">Photo de profile :</label>
            <input class="form-control" name="src" type="file" id="formFile">
        </div>

        <button type="submit" class="btn btn-primary  greenLime">Créer</button>
    </form>
</section>
@endsection