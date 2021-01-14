<div class="modal fade " id="modal_ajouter">
        <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-group"  action="/back/ajouter_fiche" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="modal-header">
                    <h4 class="modal-title">Ajouter une fiche </h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="">
                            <label class="label_parametres" for="nom_star">Nom</label>
                            <input class="form-control input_parametres" type="text" name="nom_star"  value="{{ old('nom_star') }}">
                            @error('nom_star')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="">
                            <label  class="label_parametres" for="prenom_star">Prénom </label>
                            <input class="form-control input_parametres"  type="text" name="prenom_star" value="{{ old('prenom_star') }}">
                            @error('prenom_star')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="">
                            <label  class="label_parametres" for="description_star">Description</label>
                            <textarea class="form-control input_parametres"  name="description_star">{{ old('description_star') }}</textarea>
                            @error('description_star')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="photo_star">Photo</label>
                            <input type="file" id="photo_star" name="photo_star" class="form-control photo_star">
                            @error('photo_star')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                                
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" >Annuler</button>
                    <button class="btn btn-success" type="submit" >Valider</button>
                </div>
            </form>
        </div>
    </div>
</div>
