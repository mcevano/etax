@extends('layouts.app')
@section('title', '| Sales')
@section('content')
<main class="container container-main margin-container">
	<h6 class="page-title">Vat Relief > {{ ucfirst($type) }}</h6>
	<section class="content-holder bg-white">
		<h5 class="font-orange label-title">TAXPAYER NAME: <strong>{{$company->registered_name}}</strong></h5>
		<hr>
		<a href="/relief/{{$company->id}}/{{$type}}" class="btn btn-primary">Add</a>
		<a href="/companies/{{ $company->id }}/forms" class="btn btn-danger">Back</a>
		<br><br>
		<h5 class="label-title">VAT RELIEF: <strong> {{ strtoupper($type) }} </strong></h5>
		<table class="table table-bordered table-data">
			<thead>
				<tr class="text-center">
					<th>File Name</th>
					<th>Date</th>
					<th>Fiscal Month</th>
					@if($type == 'purchase')
					<th>Creditable</th>
					<th>Non-Creditable</th>
					@endif
					<th>Date Generated</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach($files as $each)
					<tr class="text-center">
						<td>{{$each->file_name}}</td>
						<td>{{date('Y-m-d',strtotime($each->date))}}</td>
						<td>{{$each->fiscal}}</td>
						@if($type == 'purchase')
						<td>{{$each->creditable}}</td>
						<td>{{$each->non_creditable}}</td>
						@endif
						<td>{{$each->created_at}}</td>
						<td width="30%">
							<a href="/relief/download_dat/{{$each->file_name}}" class="btn btn-warning btn-sm">
								Download DAT
							</a>
							<a href="/relief/download_excel/{{$company->id}}/{{$each->id}}/{{$each->file_name}}" class="btn btn-info btn-sm">
								Download Excel
							</a>
							<a href="/relief/{{$company->id}}/show/{{ $type }}/{{$each->id}}" class="btn btn-success btn-sm">View</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</section>
</main>
@endsection