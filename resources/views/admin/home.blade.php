@extends("admin.layouts.main")

@section("title","Acceuil Admin")

@section("content")
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-dark text-white mr-2">
          <i class="mdi mdi-home"></i>
        </span> Dashboard
      </h3>
    </div>

    <!-- Dashbord -->
    <div class="row">
      <div class="col-sm-4 grid-margin">
        <div class="card bg-gradient-info text-white">
          <div class="card-body">
            <div class="grey-circle-profile-icon">
              <i class="mdi mdi-receipt"></i>
            </div>
            <h2 class="mb-0 mt-3">{{$nb_cand[0]->nb_cand}}</h2>
            <h5 class="font-weight-normal mb-3">Candidatures</h5>
            <!-- <p class="text-medium m-0">  30%</p> -->
          </div>
        </div>
      </div>
      <div class="col-sm-4 grid-margin">
        <div class="card bg-gradient-success text-white">
          <div class="card-body">
            <div class="grey-circle-profile-icon">
              <i class="mdi mdi-briefcase-upload-outline"></i>
            </div>
            <h2 class="mb-0 mt-3">{{$nb_emplois[0]->nb_emplois}}</h2>
            <h5 class="font-weight-normal mb-3">Offres d'emplois</h5>
            <!-- <p class="text-medium m-0">  30%</p> -->
          </div>
        </div>
      </div>
      <div class="col-sm-4 grid-margin">
        <div class="card bg-gradient-danger text-white">
          <div class="card-body">
            <div class="grey-circle-profile-icon">
              <i class="mdi mdi-account-outline"></i>
            </div>
            <h2 class="mb-0 mt-3">{{$nb_employes[0]->nb_employes}}</h2>
            <h5 class="font-weight-normal mb-3">Employés inscrits</h5>
            <!-- <p class="text-medium m-0"> 30%</p> -->
          </div>
        </div>
      </div>
      <!-- <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
          <div class="card-body">
            <img src="./img/admin//dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Nombre d'Ecole <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">20</h2>
            <h6 class="card-text">Decreased by 10%</h6>
          </div>
        </div>
      </div> -->
      <!-- <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
          <div class="card-body">
            <img src="./img/admin//dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Utilisateurs inscrit<i class="mdi mdi-diamond mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-5">40</h2>
            <h6 class="card-text">Dans les 3 derniers mois</h6>
          </div>
        </div>
      </div> -->
    </div>
    <!-- <div class="row">
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Postes aux offres d'emplois </h4>
            <canvas id="cmdChart" style="height:230px"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Nouvelle offres</h4>
            <canvas id="ddvChart" style="height:230px"></canvas>
          </div>
        </div>
      </div>
    </div> -->
    <div class="row">
      <div class="col-lg-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body p-0 d-flex">
            <div id="inline-datepicker" class="datepicker datepicker-custom"></div>
          </div>
        </div>
      </div>
      <div class="col-md-7 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-white">Todo</h4>
                    <div class="add-items d-flex">
                      <input type="text" class="form-control todo-list-input" placeholder="des tâches à faire aujouter ?">
                      <button class="add btn btn-gradient-primary font-weight-bold todo-list-add-btn" id="add-task">Ajouter</button>
                    </div>
                    <div class="list-wrapper">
                      <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Ajouter l'offre d'emplois Génie industrielle Bac+5 à Settat</label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li class="completed">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox" checked> Cloturer l'offre Ingénieur de vente </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Ajouter l'offre de la BMCE pour expert GED</label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox"> Vérifier les nouvelles postes employés</label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                        <li>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input class="checkbox" type="checkbox">Ajouter l'offre de la SGABS Développpeur JAVA </label>
                          </div>
                          <i class="remove mdi mdi-close-circle-outline"></i>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
    </div>
    
    <!-- </div> -->
@endsection