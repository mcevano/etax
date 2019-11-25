@extends('layouts.app')
@section('title', '| Sales')
@section('content')
<main class="container container-main margin-container">
	<h6 class="page-title">Vat Relief > {{ $type }}</h6>
	<section class="content-holder bg-white">
		<h5 class="font-orange label-title text-center">TAXPAYER NAME: <strong>{{$company->registered_name}}</strong></h5>
		<hr>
		 <a href="/relief/{{ $company->id }}/histories/{{$type}}" class="btn btn-danger">Back</a>
		<br><br>
		<h5 class="	label-title">VAT RELIEF: <strong> {{ strtoupper($type) }} </strong></h5>
		@if($type == 'sales')
		<table class="table table-bordered table-data table-responsive">
			<thead>
				<tr class="text-center">
					<th rowspan="2">TIN</th>
					<th rowspan="2">Registered Name</th>
					<th colspan="3">Name of Customer</th>
					<th rowspan="2">Address</th>
					<th rowspan="2">Gross Sales</th>
					<th rowspan="2">Exempt</th>
					<th rowspan="2">Zero Rated</th>
					<th rowspan="2">Taxable Sales</th>
					<th rowspan="2">Output Tax</th>
					<th rowspan="2">Taxable Sales</th>
				</tr>
				<tr>
					<th>Last Name</th>
					<th>First Name</th>
					<th>Middle Name</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $each)
					<tr>
						<td width="30">{{$each->tin}}</td>
						<td>{{$each->reg_name}}</td>
						<td>{{$each->lastname}}</td>
						<td>{{$each->firstname}}</td>
						<td>{{$each->middlename}}</td>
						<td>{{$each->address}}</td>
						<td>{{$each->gross_sales}}</td>
						<td>{{$each->exempt}}</td>
						<td>{{$each->zero_rated}}</td>
						<td>{{$each->taxable_sales}}</td>
						<td>{{$each->output_tax}}</td>
						<td width="30%">{{$each->gross_taxable_sales}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		@elseif($type == 'purchase')
		<table class="font-sm table table-bordered table-data table-responsive">
			<thead>
				<tr class="text-center">
					<th rowspan="2">TIN</th>
					<th rowspan="2">Registered Name</th>
					<th colspan="3">Name of Supplier</th>
					<th rowspan="2">Address</th>
					<th rowspan="2">City</th>
					<th rowspan="2">Gross Purchase</th>
					<th rowspan="2">Exempt Purchase</th>
					<th rowspan="2">Zero-Rated Purchase</th>
					<th rowspan="2">Taxable Purchase</th>
					<th rowspan="2">Purchase of Services</th>
					<th rowspan="2">Capital Goods</th>
					<th rowspan="2">Good Other than Capital Goods</th>
					<th rowspan="2">Input Tax</th>
					<th rowspan="2">Gross Taxable Purchase</th>
				</tr>
				<tr>
					<th>Last Name</th>
					<th>First Name</th>
					<th>Middle Name</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $each)
					<tr>
						<td width="50%">{{$each->tin}}</td>
						<td>{{$each->reg_name}}</td>
						<td>{{$each->lastname}}</td>
						<td>{{$each->firstname}}</td>
						<td>{{$each->middlename}}</td>
						<td>{{$each->address}}</td>
						<td>{{$each->city}}</td>
						<td>{{$each->gross_purchase}}</td>
						<td>{{$each->exempt_purchase}}</td>
						<td>{{$each->zero_rated}}</td>
						<td>{{$each->taxable_purchase}}</td>
						<td>{{$each->services}}</td>
						<td>{{$each->capital_goods}}</td>
						<td>{{$each->other_goods}}</td>
						<td>{{$each->input_tax}}</td>
						<td>{{$each->gross_taxable_purchase}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		@elseif($type == 'importations')
		<table class="font-sm table table-bordered table-data table-responsive">
			<thead>
				<tr>
					<th>Entry No.</th>
					<th>Assesment/Release Date</th>
					<th>Registered Name</th>
					<th>Importation Date</th>
					<th>Country of Origin</th>
					<th>Total Landed Cost</th>
					<th>Dutiable Value</th>
					<th>Charges Before Release from Customs</th>
					<th>Taxable Imports</th>
					<th>Exempt Imports</th>
					<th>VAT</th>
					<th>OR Number</th>
					<th>Date of VAT</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $each)
					<tr>
						<td width="50%">{{$each->entry_no}}</td>
						<td>{{$each->release_date}}</td>
						<td>{{$each->seller_name}}</td>
						<td>{{$each->import_date}}</td>
						<td>{{$each->country_origin}}</td>
						<td>{{$each->landed_cost}}</td>
						<td>{{$each->dutiable_value}}</td>
						<td>{{$each->charges_before_custom}}</td>
						<td>{{$each->taxable_imports}}</td>
						<td>{{$each->exempt}}</td>
						<td>{{$each->vat}}</td>
						<td>{{$each->or_number}}</td>
						<td>{{$each->vat_date}}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		@endif
	</section>
</main>
@endsection