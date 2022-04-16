@extends('pages.conges.conges')
@section('meta-title', $title = "Congés")
@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12 col-6">
          <!-- small box -->
          <div class="smallbox bg-success text-center p-3 ">
            <div class="inner">
              <h3>Demande de congés</h3>

              <p>Bienvenu sur la page de demande de congès pour les employés de l'univestité de comores.</p>
              <p>
                Tout employé de l'UDC a droit de prendre un congés chaque année. Les heures de congés par an est 30 heurs.
                </p>
                <span class="text-warning"><i>A noter que pour vous, le nombre d'heures restants des congés est <b>
                  @if($emp->heure==0 || $emp->heure==1)
                  {{$emp->heure}} heure.
                  @else
                  {{$emp->heure}} heures.
                  @endif
                </b></i></span>

                <p><br>Veuiller renseigner le formulaire ci-dessous pour demander un congés. </p><hr>

                <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-5">
                  @if(session()->has('heure0'))
        						<p class="text-danger text-center">
        						° {{ session()->get('heure0') }}
                  </p>
        					@endif
                  @if(session()->has('heureGrand'))
        						<p class="text-danger text-center">
        						° {{ session()->get('heureGrand') }}
                  </p>
        					@endif
                  @if(session()->has('encours'))
        						<p class="text-danger text-center">
        						° {{ session()->get('encours') }}
                  </p>
        					@endif
                  @if(session()->has('dateinf'))
        						<p class="text-danger text-center">
      						  ° {{ session()->get('dateinf') }}
                  </p>
        					@endif
                    <form action="{{route('conges')}}" method="post">
                        @csrf
                        <table class="pb-3">
                            <tr>
                                <td class="p-3"><label for="hrd">Date début du congés</label></td>
                                <td class="p-3"><input type="date" name="datedebut" id="hrd" class="form-control" required></td>
                                <td>@error('datedebut')
                                    <p class="text-danger">{{ $message }}</p>
                                  @enderror</td>
                            </tr>
                            <tr>
                                <td class="p-3"><label for="hr">Nombre d'heures</label></td>
                                <td class="p-3"><input type="number" min="1" max="30" name="nombre" id="hr" class="form-control" required></td>
                                <td>@error('nombre')
                                    <p class="text-danger">{{ $message }}</p>
                                  @enderror</td>
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
