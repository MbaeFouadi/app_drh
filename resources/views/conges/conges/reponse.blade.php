@extends('pages.conges.conges')
@section('meta-title', $title = "Réponse de votre demande de congés")
@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-9">
          <!-- small box -->
          <div class="smallbox bg-white p-5">
            <div class="inner">
              <h3>Historique de vos congés</h3>

                <div class="row" style="">
             
                    <table class="table table-bordered">
                        <tr>
                            <td>Date de demande : 12/12/2021</td>
                            <td>Demande non répondu</td>
                            <td><a href="" class="">Voir la réponse</a></td>
                        </tr>
                    </table>
                
                </div>
            </div>
            <div class="icon">
              {{-- <i class="ion ion-bag"></i> --}}
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>
        </div>
        <div class="col-lg-3">
            <!-- small box -->
            <div class="small-box bg-success text-center">
              <div class="inner">
                <h3>Messages</h3>
  
                <p>Dans cette page, vous pouvez regarder les reponses de vos demandes de congés et l'histoire de vos congés.</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
            </div>
          </div>
        <!-- ./col -->
      </div>
    </div>
  </section>
@endsection