@extends('template.main')
@section('content')
    <section>
        <table class="table container w-75 mt-5">
            <thead>
                <tr class="greenLime">
                    <th scope="col">#</th>
                    <th scope="col">Nom de l'Équipe</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Max. Joueurs</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr class="greenLime">
                    <th scope="row">{{ $show->id }}</th>
                    <td>{{ $show->nom }}</td>
                    <td>{{ $show->ville }}</td>
                    <td>{{ $show->joueursMax }}</td>
                </tr>
            </tbody>
        </table>
    </section>
    <section>
        <div class="pt-5">
            <h4 class="text-center mt-5 greenLime">Joueurs de l'équipe.</h4>
        </div>
        <table class="table container w-75 mt-5">
            <thead>
                <tr class="greenLime">
                    <th scope="col">#</th>
                    <th scope="col">Nom du joueur</th>
                    <th scope="col">Prénom du joueur</th>
                    <th scope="col">Role</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($joueurs as $joueur)
                    @if ($joueur->equipe_id == $show->id)
                        <tr class="greenLime">
                            <th scope="row">{{ $joueur->id }}</th>
                            <td>{{ $joueur->nom }}</td>
                            <td>{{ $joueur->prenom }}</td>
                            <td>{{ $joueur->roles->role }}</td>
                            <td>
                                <a class="btn btn-primary text-white greenLime" title="Show player"
                                    href="/joueur/{{ $joueur->id }}/show">Info</a>
                            </td>
                        </tr>
                    @endif
                @endforeach


            </tbody>
        </table>
    </section>
@endsection
