@extends('layouts.app')
@section('title', '| Invites')
@section('content')
<main class="container container-main margin-container">
	<h6 class="page-title">MY INVITES</h6>
	<section class="content-holder bg-white">
		<div class="row">
			<div class="col">
				<h5 class="font-orange label-title">LISTS</h5>
				<hr>
				<table class="table table-bordered table-data">
					<thead>
						<tr class="text-center">
							<th>Email</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach ($invites as $invite)
						<tr>
							<td>{{ $invite->email }}</td>
							<td>{{ $invite->status == '' ? 'Not Confirmed' : $invite->status }}</td>
							<td class="text-center">
								@if($invite->status == '')
								<a href="/invite/{{$invite->id}}/resend" class="btn btn-sm btn-primary">Resend</a>
								@endif
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="col">
				<h5 class="font-orange label-title">INVITE FRIEND</h5>
				<hr>
				<p>Invite your friend by adding his/her email below.</p>
				<form method="POST" action="/invite" class="needs-validation">
					@csrf
					<div class="form-group">
					    <label for="email">Email address</label>
					    <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : ''}}" id="email" name="email" value="{{ old('email') }}">
					    @if($errors->has('email'))
					      	<label class="font-sm text-danger">
					      		{{$errors->first('email') }}
					      	</label>
					    @endif
					</div>
					<button type="submit" class="btn btn-warning">Send Invitation</button>
				</form>
			</div>
		</div>
	</section>
</main>
@endsection