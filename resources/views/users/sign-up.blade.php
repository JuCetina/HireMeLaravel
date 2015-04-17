@extends('layout')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1>Registro</h1>

			{!! Form::open(['route' => 'register', 'method' => 'POST', 'role' => 'form']) !!}

			{!! Field::text('full_name') !!}

			{!! Field::email('email') !!}

			{!! Field::password('password') !!}

			{!! Field::password('password_confirmation', ['placeholder' => 'Repite tu clave']) !!}

			<p>
				<input type="submit" value="Registrarse" class="btn btn-success">
			</p>

			{!! Form::close() !!}
		</div>
	</div>
</div>

@stop