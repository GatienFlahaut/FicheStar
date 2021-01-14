@extends('layouts.visiteur')

@section('content')
<div class="container"  id="header-display" >
    <div class="container_liste">
        <ul class="nav nav-tabs liste_star" >
            @foreach ($stars as $star)
            <li data-toggle="collapse"  class="collapsed"  data-target="#partie_cachee_{{ $star->id }}">
            <div>{{$star->prenom}} {{$star->nom}}</div> 
            </li>    
            @endforeach
        </ul>
    </div>

    @foreach ($stars as $star)
        <div id="partie_cachee_{{ $star->id }}"  data-parent="#header-display"  class="desktop_fiche_star">
            <img class="desktop_image_star"  src="{{'http://fiche-star/storage/images/'.$star->url_photo}}"> 
            <p>
                {{$star->prenom}}
                {{$star->nom}}
            </p>
            {{$star->description}}
        </div>
        
    @endforeach    
    <div id="texte-defaut" style="margin:10px">
        <h2>
            Veuillez choisir une fiche
        </h2> 
    </div>
</div>
@endsection