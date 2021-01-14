<div class="modal fade delete" id="modal_delete_{{$star->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Souhaitez vous vraiment supprimer la fiche de {{$star->prenom}} {{$star->nom}} ?</h4>
            </div>
            <div class="modal-body" style="text-align:center">
                <div class="container">
                    <a class="btn btn-success" style="width:80px" href="{{ route('supprimerFiche', $star->id) }}" >oui</a>
                    <a class="btn btn-danger"style="width:80px" data-dismiss="modal" >non</a>
                </div>
            </div>
        </div>
    </div>
</div>