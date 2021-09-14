@extends('template.main')
@section('content')
<section class="sctionHome">
    <h1 class="greenLime">Joueurs sans équipe (4)</h1>

    <div class="d-flex">
        @foreach ($joueurs as $joueur )
        @if($loop->iteration==1)
        <p class="d-none">
            {{$count=0}}
        </p>
        @endif
        @if($joueur->equipe_id==1)
        @if($count<4)
        <p class="d-none">
            {{$count=$count+1}}
        </p>
    <div class="col-3 px-2">
        <div class="card " style="width: 18rem;">
            <img class="card-img-top" src="{{asset("storage/img/".$joueur->photos->src)}} " alt="Photo de profil">
            <div class="card-body">
                    <div>
                        <h1>
                            {{  $joueur->nom.' '. $joueur->prenom}}
    
                        </h1>
                    </div>

            </div>
        </div>
    </div>
        @endif
        @endif
        @endforeach

    </div>
</section>
<section class="sctionHome">



    <h1 class="greenLime">Joueurs sélectionner</h1>


    <div class="d-flex">
        @foreach ($joueurs as $joueur )
        @if($loop->iteration==1)
        <p class="d-none">
            {{$count=0}}
        </p>
        @endif
        @if($joueur->equipe_id != 1)
        @if($count<4)
        <p class="d-none">
            {{$count=$count+1}}
        </p>
    <div class="col-3 px-2">
        <div class="card " style="width: 18rem;">
            <img class="card-img-top" src="{{asset("storage/img/".$joueur->photos->src)}} " alt="Photo de profil">
            <div class="card-body">
                    <div>
                        <h1>
                            {{  $joueur->nom.' '. $joueur->prenom}}
    
                        </h1>
                    </div>

            </div>
        </div>
    </div>
        @endif
        @endif
        @endforeach

    </div>
</section>

<section class="sctionHome">
    <h1 class="greenLime">Europe</h1>


    <div class="d-flex">
        @foreach ($equipes as $equipe )
        @if($equipe->continent_id == 1)
        @if($equipe->nom != 'Liste de selection')
        <div class="col-3 px-2">
            <div class="card " style="width: 18rem;">
                <div class="card-body">
                        <div>
                            <h1>    
                                {{  $equipe->nom}}
        
                            </h1>
                        </div>
    
                </div>
            </div>
        </div>
        @endif
        @endif
        @endforeach

    </div>
</section>
<section class="sctionHome">
    <h1 class="greenLime">Equipe Etrangere</h1>


    <div class="d-flex">
        @foreach ($equipes as $equipe )
        @if($equipe->continent_id != 1)
        @if($equipe->nom != 'Liste de selection')
        <div class="col-3 px-2">
            <div class="card " style="width: 18rem;">
                <div class="card-body">
                        <div>
                            <h1>    
                                {{  $equipe->nom}}
        
                            </h1>
                        </div>
    
                </div>
            </div>
        </div>
        @endif
        @endif
        @endforeach

    </div>
</section>
<section class="sctionHome">
    <h1 class="greenLime">Joueuse(s)</h1>
    <div class="d-flex">
        @foreach ($joueurs as $joueur )
        @if($loop->iteration==1)
        <p class="d-none">
            {{$count=0}}
        </p>
        @endif
        @if($joueur->genre == 'Femme' && $joueur->equipe_id != 1 )
        @if($count<5)
        <p class="d-none">
            {{$count=$count+1}}
        </p>
    <div class="col-3 px-2">
        <div class="card " style="width: 18rem;">
            <img class="card-img-top" src="{{asset("storage/img/".$joueur->photos->src)}} " alt="Photo de profil">
            <div class="card-body">
                    <div>
                        <h1>
                            {{  $joueur->nom.' '. $joueur->prenom}}
    
                        </h1>
                    </div>

            </div>
        </div>
    </div>
        @endif
        @endif
        @endforeach

    </div>
</section>
<section class="sctionHome">
    <h1 class="greenLime">Joueur(s)</h1>
    <div class="d-flex">
        @foreach ($joueurs as $joueur )
        @if($loop->iteration==1)
        <p class="d-none">
            {{$count=0}}
        </p>
        @endif
        @if($joueur->genre == 'Homme' && $joueur->equipe_id != 1)
        @if($count<5)
        <p class="d-none">
            {{$count=$count+1}}
        </p>

    <div class="col-3 px-2">
        <div class="card " style="width: 18rem;">
            <img class="card-img-top" src="{{asset("storage/img/".$joueur->photos->src)}} " alt="Photo de profil">
            <div class="card-body">
                    <div>
                        <h1>
                            {{  $joueur->nom.' '. $joueur->prenom}}
    
                        </h1>
                    </div>

            </div>
        </div>
    </div>
        @endif
        @endif
        @endforeach

    </div>
</section>
@endsection