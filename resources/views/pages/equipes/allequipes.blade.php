@extends('template.main')
@section('content')
@if (session()->has('message'))
        <div class="container alert alert-success mt-2 w-50">
            {{ session()->get('message') }}
        </div>
    @endif
    @if (session()->has('messageDelete'))
        <div class="container alert alert-danger mt-2 w-50">
            {{ session()->get('messageDelete') }}
        </div>
    @endif
    
    @if ($errors->any())
        <div class="alert alert-warning alert-block">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section>
        <table class="table container w-75 mt-5">
            <thead>
                <tr class="greenLime">
                    <th scope="col">#</th>
                    <th scope="col">Nom de l'Équipe</th>
                    <th scope="col">Ville</th>
                    <th scope="col">Pays</th>
                    <th scope="col">Continent</th>
                    <th>Modifier</th>
                    <th>Info</th>
                    <th>Supprimer</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($equipes as $equipe)
                    @if($equipe->id!=1)
                    <tr class="greenLime">
                        <th scope="row">{{ $equipe->id }}</th>
                        <td>{{ $equipe->nom }}</td>
                        <td>{{ $equipe->ville }}</td>
                        <td>{{ $equipe->pays }}</td>
                        <td>{{ $equipe->continents->continent }}</td>

                        <td class="text-center greenLime">
                            <a class="btn btn-success text-white" href="/equipe/{{ $equipe->id }}/edit">EDIT</a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-primary text-white" href="/equipe/{{ $equipe->id }}/show">Voir les joueurs</a>
                        </td>
                        <td class="text-center greenLime">
                            <form action="/equipe/{{ $equipe->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger text-white" type="submit">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </section>
@endsection

