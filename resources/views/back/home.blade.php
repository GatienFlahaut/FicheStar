@extends('layouts.app')

@section('content')
<div class="container">
    <fieldset class="fieldset_parametres">
        <legend class="legend_parametres">
            <h1> Fiches de star </h1>
        </legend>
        <div class="legend_button">
            <button class="btn-success btn-sm btn_plus"  data-toggle="modal" data-target="#modal_ajouter" >Ajouter</button>
            @include('back/modal/ajouter-star')
        </div>

       @isset($confirmation)
       <div class="modal fade show confirmation_ajout" id="confirmation_ajout" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{$confirmation}}</h4>
                    </div>
                    <div class="modal-footer" style="border-top:none">
                        <a href="{{route('home')}}">
                        <button class="btn btn-success" >Fermer</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
       @endisset
       @if (session('modification'))
       <div class="modal fade show confirmation_ajout" id="confirmation_modification" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ session('modification') }}</h4>
                    </div>
                    <div class="modal-footer" style="border-top:none">
                        <a href="{{route('home')}}">
                        <button class="btn btn-success" >Fermer</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
       @endif
       @isset($suppression)
       <div class="modal fade show confirmation_ajout" id="confirmation_ajout" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{$suppression}}</h4>
                    </div>
                    <div class="modal-footer" style="border-top:none">
                        <a href="{{route('home')}}">
                        <button class="btn btn-success" >Fermer</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
       @endisset
       @if(($errors->has('prenom_star'))||($errors->has('nom_star'))||($errors->has('photo_star'))||($errors->has('description_star')))
       <div class="modal fade  show confirmation_erreur" id="confirmation_erreur">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Votre fiche n'a pas été validée ! </h4>
                    </div>
                    <div class="modal-footer" style="border-top:none">
                        <button class="btn btn-danger" onclick="$('#confirmation_erreur').remove();">Fermer</button>
                        
                        <button class="btn btn-success" onclick="$('#confirmation_erreur').remove();" data-toggle="modal" data-target="#modal_ajouter" >Corriger</button>
                        
                    </div>
                </div>
            </div>
        </div>
        @endif
       @if(($errors->has('modif_prenom_star'))||($errors->has('modif_nom_star'))||($errors->has('modif_photo_star'))||($errors->has('modif_description_star')))
       <div class="modal fade  show confirmation_erreur" id="confirmation_erreur">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Votre fiche n'a pas été validée ! <br> Merci de réessayer </h4>
                    </div>
                    <div class="modal-footer" style="border-top:none">
                        <button class="btn btn-danger" onclick="$('#confirmation_erreur').remove();">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
        @endif


        <fieldset class="fieldset_parametres_action">
            <legend  class="legend_parametres_2"> Liste répertoriée </legend>
            <ul class="striped-list" id="detail-display">
                @foreach ($stars as $star)

                    <li class="list-group-item liste_article">
                       <div class="info_afficher">
                           <div class="info_img">
                                
                                <img class="liste_img"  src="{{ asset('storage/images/'.$star->url_photo) }}">
                                   
                            </div>
                            <div class="info_afficher_centre">
                                <div class="info_ref info_afficher_centre_detail" >Nom : {{ $star->nom }}</div>
                                <div class="info_ref info_afficher_centre_detail" >Prénom: {{ $star->prenom }}</div>

                            </div>
                            <div class="info_plus">

                                <button class="btn-info btn-sm btn_plus" data-toggle="collapse" data-target="#partie_cachee_{{ $star->id }}" >Détails </button>
                                
                            </div>
                        </div>
                        
                        <div class=" collapse info_cacher"   data-parent="#detail-display" id="partie_cachee_{{ $star->id }}" >
                            <div class="info_cacher_haut">
                                
                                <div class="info_cacher_centre">
                                    <div>
                                        {{ $star->description}}
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="info_cacher_droite">
                                <div class="info_cacher_button">
                                    <button type="button" data-toggle="modal" data-target="#modal_delete_{{$star->id}}" class="btn btn-danger">Supprimer</button>
                                    <button type="button" data-toggle="modal" data-target="#modal_update_{{$star->id}}" class="btn btn-warning">Modifier</button>
                                </div>
                        </div>
                    </div>
                    </li>
                    
                @include('back/modal/supprimer-star')
                @include('back/modal/modifier-star')
                
                @endforeach
            </ul>
        </fieldset>

    </fieldset>
</div>

@endsection


