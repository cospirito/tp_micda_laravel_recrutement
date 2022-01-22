@extends("admin.layouts.main")

@section("title","Liste des Candidatures")

@section("content")
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-dark text-white mr-2">
          <i class="mdi mdi-receipt"></i>
        </span> Candidatures
      </h3>
    </div>
    <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste des Candidatures</h4>
                    <div class="row grid-margin">
                      <!-- <div class="col-12">
                        <div class="alert alert-warning" role="alert">
                          <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
                        </div>
                      </div> -->
                    </div>
                    <div class="row overflow-auto">
                      <div class="col-12">
                        <table id="candidature" class="table" cellspacing="0" width="100%">
                          <thead>
                            <tr class="bg-primary text-white">
                              <th>Numero #</th>
                              <th>Nom employe</th>
                              <th>Téléphone </th>
                              <th>Email</th>
                              <th>Offre demandé</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                          @foreach ($canditatures as $k =>$v )
                            <tr>
                              <td>{{$k}}</td>
                              <td>{{$v->nom}}</td>
                              <td>{{$v->tel}}</td>
                              <td>{{$v->email}}</td>
                              <td>{{$v->titre}}</td>
                              <td class="text-right">
                                <button class="btn btn-light" data-toggle="modal" data-target="#exampleModal-4">
                                  <i class="mdi mdi-eye text-primary" ></i>voir</button>
                                <button class="btn btn-light">
                                  <i class="mdi mdi-close text-danger"></i>supprimer</button>
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