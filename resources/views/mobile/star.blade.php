@extends('layouts.visiteur-mobile')

@section('content')

    <ul class="mobile_ul_liste_star" id="header-display">
        @foreach ($stars as $star)
            <li class="list-group-item mobile_li_liste_star"  data-toggle="collapse" data-target="#partie_cachee_{{ $star->id }}">
                {{$star->prenom}} {{$star->nom}}
                <div class=" collapse mobile_info_star" data-parent="#header-display" id="partie_cachee_{{ $star->id }}" >
                    <img class="image_star"  src="{{'http://fiche-star/storage/images/'.$star->url_photo}}">
                    {{$star->description}}
                </div>
            </li>
        @endforeach
    </ul>

@endsection