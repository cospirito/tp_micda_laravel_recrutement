@extends("admin.layouts.main")

@section("title","Liste des offres en cours")

@section("content")
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-dark text-white mr-2">
          <i class="mdi mdi-receipt"></i>
        </span> Offres/En cours
      </h3>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Liste des offres en cours</h4>
            <div class="row grid-margin">
              <!-- <div class="col-12">
                <div class="alert alert-warning" role="alert">
                  <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
                </div>
              </div> -->
            </div>
            <div class="row overflow-auto">
              <div class="col-12">
                <table id="offres-encours" class="table" cellspacing="0" width="100%">
                  <thead>
                    <tr class="bg-gradient-dark text-white">
                      <th>Numero #</th>
                      <th>Titre</th>
                      <th>Description </th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($offres as $k =>$v )
                    <tr id="{{$v['id']}}" class="ligneOffreID" etat="{{$v['etat']}}">
                      <td>{{$k}}</td>
                      <td class="titre">{{$v["titre"]}}</td>
                      <td class="description" descTot='{{$v["description"]}}'>{{substr($v["description"], 0, 15)."..."}} </td>
                      <td class="text-right">
                        <button class="btn btn-light btnvoiroffre" >
                          <i class="mdi mdi-eye text-primary" ></i>voir/modifier</button>
                        <button class="btn btn-light" onclick="showSwal('avertissement-suppresion-offre', {{$v['id']}})">
                          <i class="mdi mdi-close text-danger btnSupprimeroffre"></i>supprimer</button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection