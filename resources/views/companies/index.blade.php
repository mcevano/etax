@extends('layouts.app')
@section('title', '| Companies')
@section('content')
<main class="container container-main margin-container">
	<h6 class="page-title">COMPANY</h6>
	<section class="content-holder bg-white">
		<h5 class="font-orange label-title">LISTS OF COMPANIES</h5>
		<hr>
		<a href="/companies/create" class="btn btn-primary">New Company</a><br><br>
		<table class="table table-bordered table-data">
			<thead>
				<tr class="text-center">
					<th>Taxpayer Name</th>
					<th>TIN Number</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($companies as $each)
				<tr>
					<td>{{ $each->registered_name == '' ? $each->firstname." ".$each->middlename." ".$each->lastname : $each->registered_name}}</td>
					<td>{{ $each->tin1."-".$each->tin2."-".$each->tin3."-".$each->tin4}}</td>
					<td class="text-center">
						<a href="/companies/{{ $each->id }}/forms" class="btn btn-primary btn-sm">Open</a>
						<a href="/companies/{{ $each->id }}" class="btn btn-warning btn-sm">Profile</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</section>
</main>
@endsection