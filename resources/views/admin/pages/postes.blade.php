@extends("admin.layouts.main")

@section("title","Liste des postes aux offres ")

@section("content")
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-dark text-white mr-2">
          <i class="mdi mdi-receipt"></i>
        </span>  Postes aux offres d'emplois 
      </h3>
    </div>
    <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste des postes</h4>
                    <div class="row grid-margin">
                      <!-- <div class="col-12">
                        <div class="alert alert-warning" role="alert">
                          <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
                        </div>
                      </div> -->
                    </div>
                    <div class="row overflow-auto">
                      <div class="col-12">
                        <table id="postes-offres" class="table" cellspacing="0" width="100%">
                          <thead>
                            <tr class="bg-primary text-white">
                              <th>Numero #</th>
                              <th>Offre</th>
                              <th>Nom Employé</th>
                              <th>Email Employé </th>
                              <th>Tel Employé </th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>000001</td>
                              <td>...</td>
                              <td>nom  </td>
                              <td>40</td>
                              <td class="text-right">
                                <button class="btn btn-light">
                                  <i class="mdi mdi-eye text-primary"></i>voir/modifier</button>
                                <button class="btn btn-light">
                                  <i class="mdi mdi-close text-danger"></i>supprimer</button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection