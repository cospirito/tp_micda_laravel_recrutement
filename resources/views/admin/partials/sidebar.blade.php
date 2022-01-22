<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="/./img/admin/faces/admin.png" alt="profile">
          <span class="login-status online"></span>
          <!--change to offline or busy as needed-->
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">Administrateur</span>
          <span class="text-secondary text-small">admin</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin-home')}}">
        <span class="menu-title">Accueil</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-article" aria-expanded="false" aria-controls="ui-article">
        <span class="menu-title">Offres d'emmplois</span>
        <i class="menu-arrow"></i>
        <i class="  mdi mdi-briefcase menu-icon"></i>
      </a>
      <div class="collapse" id="ui-article">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{route('admin-offres.ajouter')}}" blink="">Ajouter</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('admin-offres', 'non_expiré')}}" blink="">En cours </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{route('admin-offres', 'expiré')}}" blink="">Expiré</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin-employes')}}">
        <span class="menu-title">Employes</span>
        <i class="mdi mdi-clipboard-account menu-icon"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin-candidatures')}}">
        <span class="menu-title">Candidatures </span>
        <i class="mdi mdi-receipt menu-icon"></i>
      </a>
    </li>
  </ul>
</nav>