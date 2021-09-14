@extends('template.main')
@section('content')
    @include('pages.partials.flash')
    <section>
        <table class="table container w-75 mt-5">
            <thead>
                <tr class="greenLime">
                    <th class="text-center" scope="col">#</th>
                    <th class="text-center" scope="col">Nom</th>
                    <th class="text-center" scope="col">Prenom</th>
                    <th class="text-center" scope="col">Age</th>
                    
                    <th class="text-center" scope="col">Pays</th>
                    
                    <th class="text-center" scope="col">Equipe</th>
                    
                    <th class="text-center">Modifier</th>
                    <th class="text-center">Info</th>
                    <th class="text-center">Supprimer</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($joueurs as $joueur)
                    <tr class="greenLime">
                        <th class="text-center" scope="row">{{ $joueur->id }}</th>
                        <td class="text-center">{{ $joueur->nom }}</td>
                        <td class="text-center">{{ $joueur->prenom }}</td>
                        <td class="text-center">{{ $joueur->age }}</td>
                        
                        <td class="text-center">{{ $joueur->pays }}</td>
                        
                        <td class="text-center">{{ $joueur->equipes->nom }}</td>
                        
                        <td class="text-center">
                            <a class="btn btn-success" href="/joueur/{{ $joueur->id }}/edit">Modifier</a>
                        </td>
                        <td>
                            <a class="btn btn-primary m-auto" title="Show player"
                                href="/joueur/{{ $joueur->id }}/show">Info</a>
                        </td>
                        <td class="text-center">
                            <form action="/joueur/{{ $joueur->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">DELETE</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection
