@extends('pages.conges.conges')
@section('meta-title', $title = "Congès")
@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12 col-6">
          <!-- small box -->
          <div class="smallbox bg-success text-center p-5 ">
            <div class="inner">
              <h3>Demande de congés</h3>

              <p>Bienvenu sur la page de demande de congès pour les employés de l'univestité de comores.</p>
              <p>NB:<br>
                Tout employé de l'UDC a droit de prendre un congés chaque année. Les heures de congés par an est 30 heurs. 
                </p><br>
                <i>A noter que vos heures restantes du congés sont 30 heures</i>

                <p><br>Veuiller renseigner le formulaire ci-dessous pour demander un congés. </p><hr>

                <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-5">
                    <form action="" method="post">
                        @csrf
                        <table class="pb-3">
                            <tr>
                                <td class="p-3"><label for="hrd">Date début du congés</label></td>
                                <td class="p-3"><input type="date" name="datedebut" id="hrd" class="form-control"></td>
                            </tr>
                            <tr>
                                <td class="p-3"><label for="hr">Nombre d'heures</label></td>
                                <td class="p-3"><input type="number" min="1" max="30" name="datedebut" id="hr" class="form-control"></td>
                            </tr>
                        </table>
                        <input type="number" value="1" hidden>
                    
                        <button type="submit" class="btn btn-info">Demander</button>
                    </form>
                </div>
                </div>
            </div>
            <div class="icon">
              {{-- <i class="ion ion-bag"></i> --}}
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        
        <!-- ./col -->
      </div>
    </div>
  </section>
@endsection