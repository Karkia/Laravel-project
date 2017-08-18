@extends('master')
@section('content')

<div class="container text-center col-md-12 home-container">

		@if (count($errors) > 0)

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content alert alert-danger">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Neteisingai suvesti duomenys</h4>
        </div>
        <div class="modal-body alert alert-danger">
          		<div>
					@foreach ($errors->all() as $error)
						<p>{{ $error }}</p>
					@endforeach
				</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
        </div>
      </div>
      
    </div>
  </div>

   @endif
  


	<div class="row wrapper">

	<div class="login col-md-5">
		<h2>Prisijunkite</h2>
		<form action="/login_in" method="post">
			<div class="form-group">
				{{csrf_field()}}
				<input type="hidden" name="action" value="register" required>
				<input type="text" name="email" placeholder="e-paštas" required>
				<input type="password" name="password" placeholder="slaptažodis" required>
			</div>
			<!-- button neveikia su query uzklausom laravelyje -->
			<input class="btn btn-success" type="submit" name="register" value="Prisijungti">
		</form>
	</div>
	<div class="col-md-2">
		<h2>Arba</h2>

	</div>


	<div class="register col-md-5">
		<h2>Registruokites</h2>
		<form action="/register" method="post">
			<div class="form-group">
				{{csrf_field()}}
				<!-- <input type="hidden" name="action" value="register"> -->
				<input type="text" name="firstname" placeholder="vardas" required>
				<input type="text" name="lastname" placeholder="pavarde" required>
				<input type="text" name="email" placeholder="e-paštas" required>
				<input type="password" name="password" placeholder="slaptažodis" required>
				<input type="password" name="confirmed_password" placeholder="slaptažodžio pakartojimas">
			</div>
			<!-- button neveikia su query uzklausom laravelyje -->
		<input class="btn btn-primary" type="submit" name="register" value="Registruotis">
		</form>






		

	</div>
</div>

<script>
	$('#myModal').modal('show');
</script>
</div>

@endsection
