@extends("admin.layouts.main")

@section("title","Ajouter une offre")

@section("content")
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-dark text-white mr-2">
          <i class="mdi mdi-receipt"></i>
        </span> Offres/Ajouter
      </h3>
    </div>
    <div class="row">
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Ajouter un nouvelle offres</h4>
                <form id="formnewOffre" class="forms-sample" method="post" post_url="{{route('post.admin.nouvel.offres')}}">
                  <div class="form-group">
                    <label for="newOffreTitre">Titre</label>
                    <input type="text" class="form-control" id="newOffreTitre" placeholder="Titre" required>
                  </div>
                  <div class="form-group">
                    <label for="newOffreDesc">Description</label>
                    <input type="text" class="form-control" id="newOffreDesc" placeholder="Description de l'offre" required>
                  </div>
                  <button id="btnAddOffre" class="btn btn-gradient-dark mr-2 todesabled">Ajouter</button>
                  <button id="btnLoader" class="btn btn-light btn-sm btn-icon"id="" style="display: none;"><i class="lds-dual-ring"></i></button>
                  <button id="btnAnnuler" class="btn btn-light">Annuler</button>
                  <label class="" id="ajouterOffreinfo" style="display: none;"> </label>
                </form>
                  <form id="hiddenForm" method="get" action="route('admin-home')">
                </form>
              </div>
            </div>
        </div>
    </div>
@endsection