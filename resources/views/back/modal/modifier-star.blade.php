<div class="modal fade update " id="modal_update_{{$star->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-group"  action="{{ route('modifierFiche') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="modal-header">
                    <h4 class="modal-title">Modifier la fiche </h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="">
                            <label class="label_parametres" for="modif_nom_star">Nom</label>
                            <input value="{{$star->nom}}" class="form-control input_parametres" type="text" name="modif_nom_star">
                            @error('nom_star')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="">
                            <label  class="label_parametres" for="prenom_star">Prénom </label>
                            <input value="{{$star->prenom}}" class="form-control input_parametres"  type="text" name="modif_prenom_star">
                            @error('modif_prenom_star')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="">
                            <label  class="label_parametres" for="modif_description_star">Description </label>
                            <textarea class="form-control input_parametres"  name="modif_description_star">{{$star->description}}</textarea>
                            @error('modif_description_star')
                                <div  class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="modif_photo_star">Photo</label>
                            <input type="file" id="modif_photo_star" name="modif_photo_star" class="form-control photo_star" >
                            @error('modif_photo_star')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="modif_star_id" name="modif_star_id" value="{{$star->id}}" >
                    <button class="btn btn-danger" data-dismiss="modal" >Annuler</button>
                    <button class="btn btn-success" id="buttonid" type="submit" >Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>
