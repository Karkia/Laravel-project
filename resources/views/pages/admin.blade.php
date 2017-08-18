@extends('master')
@section('content')


<div class="main-container">

@include('pages.header')

  <div class="body">


	 <div class="admin-navigation">

      <div class="team">

        <h4 class="booking-title">Pridėkite darbuotojus</h4>

        <form action='/addmasters' method='post'>
          {{csrf_field()}}
          <h5>Darbuotojo vardas: <h5><input type='text' name='firstname' required>
          <h5>Darbuotojo pavardė: <h5><input type='text' name='lastname' required>
          <input class="btn btn-success" type='submit' name='submit' value="Pridėti">
        </form>

      </div>

      <div class="services">

       <h4 class="booking-title">Pridėkite procedūras</h4>

       <form action="/addservice" method="post">
          {{csrf_field()}}
          <h5>Paslauga: </h5><input type="text" name="service" required> <br/>
          <h5>Kaina: </h5> <input type="text" name="price" required>
          <input class="btn btn-success" type="submit" name="add" value="Pridėti">
        </form>

      </div> <!--end services-->

 </div> <!-- end of .navigation -->

 <div class="main">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><h5>Busimi užsakymai</h5></a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><h5>Buvę užsakymai</h5></a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><h5>Klientai<h5></a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><h5>Darbuotojai<h5></a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    	<table class = "table table-striped">

              <thead>
                 <tr>
                    <th>Data ir laikas</th>
                    <th>Klientas</th>
                    <th>Meistras</th>
                    <th>Procedūros</th>
                    <th>Kaina</th>
                 </tr>
              </thead>
          @foreach ($bookings as $booking)
            @if ($booking ->time >= $today)
               <tbody>
                  <tr>
                    <td>{{$booking ->time}}</td>
                    <td>{{ printIfIsset((App\Registration::where('id', $booking->user_id)->first()), 'firstname')  }}</td>
                    <td>{{$booking ->specialist}}</td>
                    <td>{{$booking ->procedure}}</td>
                    <td>{{$booking ->price}} &euro;</td>
                  </tr>
               </tbody>
            @endif
          @endforeach
        </table>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
    	<table class = "table table-striped">
              <thead>
                 <tr>
                    <th>Data ir laikas</th>
                    <th>Klientas</th>
                    <th>Meistras</th>
                    <th>Procedūros</th>
                    <th>Kaina</th>
                 </tr>
              </thead>
          @foreach ($bookings as $booking)
            @if ($booking ->time < $today)
               <tbody>
                  <tr>
                    <td>{{$booking ->time}}</td>
                    <td>{{ printIfIsset((App\Registration::where('id', $booking->user_id)->first()), 'firstname')  }}</td>
                    <td>{{$booking ->specialist}}</td>
                    <td>{{$booking ->procedure}}</td>
                    <td>{{$booking ->price}} &euro;</td>
                  </tr>
               </tbody>
            @endif
          @endforeach
        </table>
    </div>
    <div role="tabpanel" class="tab-pane" id="messages">
            <table class="table table-striped">
              <thead>
                 <tr>
                    <th>Vardas</th>
                    <th>Pavarde</th>
                    <th>Paskutinio vizito data</th>
                    <th>Procedūros</th>
                    <th>Kaina</th>
                 </tr>
              </thead>
              @foreach ($peoples as $people)
                 <tbody>
                    <tr>

                        <td>{{$people ->firstname}}</td>
                        <td>{{$people ->lastname}}</td>
                        <td>{{printIfIsset((App\Booking::where('user_id', $people->id)->orderBy('updated_at', 'DESC')->first()), "created_at")}}</td>
                        <td>{{printIfIsset((App\Booking::where('user_id', $people->id)->orderBy('updated_at', 'DESC')->first()), 'procedure')}}</td>
                        <td>{{printIfIsset((App\Booking::where('user_id', $people->id)->orderBy('updated_at', 'DESC')->first()), 'price')}} &euro;</td>
                    </tr>
                 </tbody>
               @endforeach
            </table>

    </div>
    <div role="tabpanel" class="tab-pane" id="settings">
                  <table class="table table-striped">
              <thead>
                 <tr>
                    <th>Vardas</th>
                    <th>Pavarde</th>
                    <th>Dirba nuo...</th>
                 </tr>
              </thead>
              @foreach ($masters as $master)
                 <tbody>
                    <tr>
                      <td>{{$master ->firstname}}</td>
                      <td>{{$master->lastname}}</td>
                      <td>{{$master ->created_at}}</td>
                    </tr>
                 </tbody>
               @endforeach
            </table>
    </div>
  </div>
  </div>



<!-- nervuoja ta table tvarkyt, tai jei nk pries, per include padariau ji -->


  </div> <!--end of .body -->

   @include('pages.footer')

</div>


<!-- <a href="/main">Main page</a> -->


@endsection
