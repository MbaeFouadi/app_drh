@extends('pages.conges.conges')
@section('meta-title', $title = "Mes congés")
@section('content')
<section class="content">
  @if(session()->has('congeOk1'))
  <script type="text/javascript">
    alert("Vous avez demandé un congés. Merci d'attendre une réponse.");
  </script>
  @endif
  @if(session()->has('congeOk2'))
  <script type="text/javascript">
    alert("Vous avez demandé un congés. Merci d'attendre une réponse.");
  </script>
  @endif
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->

        <div class="col-md-12">
          <!-- small box -->
          <div class="smallbox bg-white p-5">
            <div class="inner">
              <h3>Historique de mes congés</h3>

                <div class="row" style="">

                    <table class="table table-bordered">
                      <tr>
                        <th>Date demande</th>

                        <th>Réponse</th>
                        <th>Action</th>
                      </tr>
                       @foreach($conges as $conge)
                       <tr>
                           <td>{{ \Carbon\Carbon::parse($conge->created_at)->format('j F, Y') }}</td>

                           <td>
                             @if($conge->reponse==1 && $conge->is_ok==1)
                             <span class='text-success'>Accepté</span>
                             @elseif($conge->reponse==1 && $conge->is_ok==0)
                             <span class='text-danger'>Refusé</span>
                             @endif
                           </td>
                           <td>
                             @if($conge->reponse==0)
                             <span class='text-success glyphicon glyphicon-eye'></span>
                             <a href="{{route('conge.edit',$conge->id)}}">Info</a>

                             @else
                             <a href="{{route('conge.edit',$conge->id)}}">Voir details</a>
                             @endif

                           </td>
                       </tr>
                       @endforeach

                    </table>

                </div>
            </div>
            <div class="icon">
              {{-- <i class="ion ion-bag"></i> --}}
            </div>
            {{-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> --}}
          </div>

        <!-- ./col -->
      </div>
    </div>
  </section>
@endsection
