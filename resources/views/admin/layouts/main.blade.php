<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta name="google-site-verification" content="vMMeBPC9SCUqGyD91u9Os7T-I4zovUjkmXt5nmbMO10" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Recruzone TP MICDA- @yield("title") </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/vendor/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/vendor/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="/vendor/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/vendor/jquery-toast-plugin/jquery.toast.min.css">
    <!-- /vendor/bootstrap-datepicker/bootstrap-datepicker.min.js -->
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/css/admin/style.css">
    <link rel="stylesheet" href="/css/admin/pure-css-loader.css">
    <!-- End layout styles -->
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include("admin.partials.navbar")
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
          @include("admin.partials.sidebar")
        <!-- partial -->
        <!-- Main -->
        <div class="main-panel">
          <div class="content-wrapper">
             @yield("content")
             
            @include("admin.partials.footer")
        </div>
        <!-- main-panel ends -->
        
      </div>
    <div class="modal fade" id="modifierOffre" post_url="{{route('post.admin.modifier.offre')}}" post_url_supprimer="{{route('post.admin.supprimer.offre')}}" tabindex="-1" role="dialog" aria-labelledby="modifierOffreLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modifierOffreLabel">Modification Offre</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="modal-modi-offreTitre" class="col-form-label" >Titre :</label>
                <input type="text" class="form-control" id="modal-modi-offreTitre">
              </div>
              <div class="form-group">
                <label for="modal-modi-offreDescription" class="col-form-label">Descripton :</label>
                <textarea class="form-control" id="modal-modi-offreDescription"></textarea>
              </div>
              <div class="form-group">
                <label>Etat</label>
                <select class="js-example-basic-single" style="width:100%" id="modi-etat-offreEncours">
                  <option value="non_expiré">En cous</option>
                  <option value="expiré">Expiré</option>
                </select>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success btnModifierOffre">Modifier</button>
            <button type="button" class="btn btn-light" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>


      <!-- page-body-wrapper ends -->
    </div>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="/vendor/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/vendor/chart.js/Chart.min.js"></script>
    <script src="/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/vendor/jquery-toast-plugin/jquery.toast.min.js"></script>
    <script src="/vendor/sweetalert/sweetalert.min.js"></script>
    <!-- plugin pour les -->
    <script src="/vendor/datatables.net/jquery.dataTables.js"></script>
    <script src="/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <!-- End plugin js for this page -->

    <script src="/js/admin/off-canvas.js"></script>
    <script src="/js/admin/hoverable-collapse.js"></script>
    <script src="/js/admin/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- <script src="/js/admin/dashboard.js"></script> -->
    <script src="/js/admin/inline-datepicker.js"></script>    
    <script src="/js/admin/chart.js"></script>
    <script src="/js/admin/addlink.js"></script>
    <script src="/js/admin/todolist.js"></script>
    <script src="/js/admin/ajouter-offre.js"></script>
      
    </span>
    @if(Route::current()->uri() == 'admin/offres/{etat}' && Route::current()->parameters['etat'] == 'expiré')
      <script src="/js/admin/data-table-offres-expire.js"></script>
    @endif
    @if(Route::current()->uri() == 'admin/offres/{etat}' && Route::current()->parameters['etat'] == 'non_expiré')
      <script src="/js/admin/data-table-offres-non-expire.js"></script>
    @endif
    
    <script src="/js/admin/toast-notifiications.js"></script>
    <script src="/js/admin/data-table-employes.js"></script>
    <script src="/js/admin/data-table-candidature.js"></script>
    <script src="/js/admin/voir-modifier-modal.js"></script>
    <script src="/js/admin/alerts.js"></script>
  
    <!-- <script src="/js/admin/ajouter-admin.js"></script> -->
    <!-- End custom js for this page -->

  </body>
</html>