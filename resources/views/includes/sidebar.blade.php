<?php

use Illuminate\Support\Facades\DB;

$nbr = DB::table('conges')->where('motif', 'Demande en cours de traitement')->where('annee', date('Y'))->count();
?>
<aside class="main-sidebar sidebar-dark-primary text-red" style="background-color:#17a2b8;height:100%;">
  <!-- Brand Logo -->
  <a href="" class="brand-link">
    <img src="{{asset('images/udc.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-2" style="opacity: .8">
    <span class="brand-text font-weight-light text-light">DRH</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar sidebar-primary">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      {{-- <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div> --}}
      <div class="info">
        <a href="{{ route('accueil') }}" class="d-block text-BG text-light">{{ $role->display_name }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <!-- <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2 text-red">
      <ul class="nav  nav-pills nav-sidebar flex-column text-red" data-widget="treeview" role="menu" data-accordion="false">

        @if(Auth::user()->hasRole('superadministrateur'))
        <li class="nav-item">
          <a href="#" class="nav-link">
            <!-- <i class="nav-icon fas fa-edit"></i> -->
            <i class="nav-icon fas fa-edit"></i>
            <p class="text-light">
              Cadres organiques
              <i class="fas fa-angle-left right"></i>
              <!-- <span class="badge badge-info right">6</span> -->
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('composante.index') }}" class="nav-link">
                <!-- <i class="nav-icon  fas fa-asterisk text-center"></i> -->
                <i class="nav-icon fas fa-solid fa-minus"></i>
                <p class="text-light">Composante</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('service.index') }}" class="nav-link">
                <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                <i class="nav-icon fas fa-solid fa-minus"></i>

                <p class="text-light">Service</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('fonction.index') }}" class="nav-link">
                <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                <i class="nav-icon fas fa-solid fa-minus"></i>

                <p class="text-light">fonction</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('annee.index') }}" class="nav-link">
                <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                <i class="nav-icon fas fa-solid fa-minus"></i>

                <p class="text-light">Année</p>
              </a>
            </li>


          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <!-- <i class="nav-icon fas fa-edit"></i> -->
            <i class="nav-icon fas fa-clone"></i>

            <p class="text-light">
              Grilles indiciaires
              <i class="fas fa-angle-left right"></i>
              <!-- <span class="badge badge-info right">6</span> -->
            </p>
          </a>
          <ul class="nav nav-treeview">
        </li>
        <li class="nav-item">
          <a href="{{ route('affectations.index') }}" class="nav-link">
            <!-- <i class="nav-icon fas fa-asterisk"></i> -->
            <i class="nav-icon fas fa-solid fa-minus"></i>

            <p class="text-light">Affectations</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('corps_grille') }}" class="nav-link">
            <!-- <i class="nav-icon fas fa-asterisk"></i> -->
            <i class="nav-icon fas fa-solid fa-minus"></i>

            <p class="text-light">Grille indiciaires</p>
          </a>
        </li>

      </ul>
      </li>
      @endif

      <li class="nav-item">
        <a href="#" class="nav-link">
          <!-- <i class="nav-icon fas fa-user-plus"></i> -->
          <i class="nav-icon fas fa-users"></i>
          <p class="text-light">
            Gestions employées
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p class="text-light">
                Enregistrements
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('employer.index') }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>
                  <p class="text-light">Etat civil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('recherche_formation') }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>


                  <p class="text-light">Formations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('recherche_statut') }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>


                  <p class="text-light">Statuts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('recherche_avancement') }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>



                  <p class="text-light">Avancements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('recherche_affectation') }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>



                  <p class="text-light">Affectations</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p class="text-light">
                Recherches
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('recherche') }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>

                  <p class="text-light">Matricule</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('liste') }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>


                  <p class="text-light">Liste employées</p>
                </a>
              </li>
            </ul>
          </li>
      </li>
      @if(Auth::user()->hasRole('superadministrateur'))
      <li class="nav-item">
        <a href="#" class="nav-link">
          <!-- <i class="nav-icon  fas fa-solid fa-person"></i> -->
          <i class="nav-icon fas fa-user"></i>
          <p class="text-light">
            Gestions Retraites
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('retraites.index') }}" class="nav-link">
              <!-- <i class="nav-icon fas fa-asterisk"></i> -->
              <i class="nav-icon fas fa-solid fa-minus"></i>

              <p class="text-light">Insertion</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('page_re') }}" class="nav-link">
              <!-- <i class="nav-icon fas fa-asterisk"></i> -->
              <i class="nav-icon fas fa-solid fa-minus"></i>


              <p class="text-light">Listes retraités</p>
            </a>
          </li>
        </ul>
      </li>
      @endif
     

      @if(Auth::user()->hasRole('superadministrateur'))
      <li class="nav-item">
        <a href="#" class="nav-link">
          <!-- <i class="nav-icon  fas fa-solid fa-person"></i> -->
          <i class="nav-icon fas fa-clone"></i>
          <p class="text-light">
            Gestions Contrats
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p class="text-light">
                CDD
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('liste_contrat',1) }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>
                  <p class="text-light">Normal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('liste_contrat',2) }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>


                  <p class="text-light">Corps Enseignants</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('liste_contrat',3) }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>


                  <p class="text-light">forfaitaires</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('liste_contrat',4) }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>



                  <p class="text-light">Vacations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('liste_contrat',5) }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>



                  <p class="text-light">Femme Ménange</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('liste_contrat',8) }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>


                  <p class="text-light">Sécurité</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('liste_contrat',9) }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>


                  <p class="text-light">Jardinier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('liste_contrat',10) }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>


                  <p class="text-light">Chauffeur</p>
                </a>
              </li>
            </ul>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p class="text-light">
                CDI
                <i class="fas fa-angle-left right"></i>

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('liste_contrat',6) }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>
                  <p class="text-light">Normal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('liste_contrat',7) }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>


                  <p class="text-light">Sécurité</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('liste_contrat',11) }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>


                  <p class="text-light">Femme de Menage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('liste_contrat',12) }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>


                  <p class="text-light">Jardinier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('liste_contrat',13) }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>


                  <p class="text-light">Chauffeur</p>
                </a>
              </li>
            </ul>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p class="text-light">
                Recherches
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('liste_cdd') }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>

                  <p class="text-light">Listes CDD</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('liste_cdi') }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>


                  <p class="text-light">Listes CDI</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('liste_retraites') }}" class="nav-link">
                  <!-- <i class="nav-icon fas fa-asterisk"></i> -->
                  <i class="nav-icon fas fa-solid fa-minus"></i>


                  <p class="text-light">Listes retraités</p>
                </a>
              </li>
            </ul>
          </li>
      </li>
    
     

      </ul>

      </li>
@endif
      </ul>
      </li>
      @if(Auth::user()->hasRole('superadministrateur'))
      <li class="nav-item">
        <a href="{{route('conges.index')}}" class="nav-link">
          <i class="nav-icon far fa-calendar-alt"></i>
          <p class="text-light">
            Gestions des congés
            <span class="badge badge-info right"><?= $nbr ?></span>
          </p>
        </a>
      </li>
      @endif
      <li class="nav-item">
        <a href="#" class="nav-link">
          <!-- <i class="nav-icon fas fa-search"></i> -->
          <!-- <i class="nav-icon fa fa-analytics"></i> -->
          <i class="nav-icon fas fa-solid fa-chart-pie"></i>
          <p class="text-light">
            Statistiques
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('genre') }}" class="nav-link">
              <!-- <i class="nav-icon fas fa-asterisk"></i> -->
              <i class="nav-icon fas fa-solid fa-minus"></i>

              <p class="text-light">Par genres</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('composantes') }}" class="nav-link">
              <!-- <i class="nav-icon fas fa-asterisk"></i> -->
              <i class="nav-icon fas fa-solid fa-minus"></i>


              <p class="text-light">Par composantes</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-cog"></i>
          <p class="text-light">
            Gestions utilisateurs
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          @if(Auth::user()->hasRole('superadministrateur'))
          <li class="nav-item">
            <a href="{{ route('utilisateur') }}" class="nav-link">
              <i class="nav-icon fas fa-users-cog"></i>
              <p class="text-light">Utilisateurs</p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ route('profil') }}" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p class="text-light">Profil</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('password') }}" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p class="text-light">Modifier mot de passe</p>
            </a>
          </li>
        </ul>
      </li>


      </li>
      <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link">
          <i class=" nav-icon fas fa-sign-out-alt"></i>
          <p class="text-light">
            Deconnexion
          </p>
        </a>
      </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>