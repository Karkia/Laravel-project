<div class="main">

    <div class="upcoming-bookings bookings">
      <table class = "table table-striped">
        <h4>Ateinantis užsakymai</h4>
        <thead>
            <tr>
              <th>Data ir laikas</th>
              <th>Meistras</th>
              <th>Procedūros</th>
              <th>Kaina</th>
            </tr>
        </thead>
        @foreach (App\Booking::where('user_id', $id)->orderBy('time', 'ASC')->cursor() as $booking)
          @if ($booking ->time >= $today)
          <tbody>
              <tr>
                <td>{{$booking ->time}}</td>
                <td>{{$booking ->specialist}}</td>
                <td>{{$booking ->procedure}}</td>
                <td>{{$booking ->price}} &euro;</td>
              </tr>
          </tbody>

        @endif
      @endforeach

        </table>
      </div>

      <div class="previous-bookings bookings">
        <table class = "table table-striped">
              <h4>Buvę užsakymai</h4>
              <thead>
                 <tr>
                    <th>Data ir laikas</th>
                    <th>Meistras</th>
                    <th>Procedūros</th>
                    <th>Kaina</th>
                 </tr>
              </thead>
          @foreach (App\Booking::where('user_id', $id)->orderBy('time', 'ASC')->cursor() as $booking)
            @if ($booking ->time < $today)
               <tbody>
                  <tr>
                    <td>{{$booking ->time}}</td>
                    <td>{{$booking ->specialist}}</td>
                    <td>{{$booking ->procedure}}</td>
                    <td>{{$booking ->price}} &euro;</td>
                  </tr>
               </tbody>
            @endif
          @endforeach
        </table>

      </div>

</div><!--end main-->
