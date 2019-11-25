@extends('layouts.app')
@section('title', '| Forms')
@section('content')
	<main class="container container-main margin-container">
		<h6 class="page-title">FORMS</h6>
		<section class="content-holder bg-white">
			<h5 class="font-orange label-title">TAXPAYER NAME: <strong>{{ $name }}</strong></h5>
			<hr>
			<a href="/companies" class="btn btn-danger">Back</a> 
			<br><br>
			<h5 class="label-title"><strong>VAT RELIEF</strong></h5>
			<table class="table table-bordered table-data">
					<tr>
						<td width="92.5%">SALES</td>
						<td><a href="/relief/{{ $company }}/histories/sales" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>PURCHASE</td>
						<td><a href="/relief/{{ $company }}/histories/purchase" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>IMPORTATION</td>
						<td><a href="/relief/{{ $company }}/histories/importations" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
			</table>
			<h5 class="label-title"><strong>LISTS OF BIR FORMS</strong></h5>
			<table class="table table-bordered table-data">
				<tbody>
					<tr>
						<td>
							BIR Form 0605 - Payment Form
						</td>
						<td><a href="/companies/{{ $company }}/histories/0605" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 0619E - Monthly Remittance Form for Creditable Income Taxes Withheld (Expanded)
						</td>
						<td><a href="/companies/{{ $company }}/histories/0619E" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 0619F - Monthly Remittance Form for Final Income Taxes Withheld
						</td>
						<td><a href="/companies/{{ $company }}/histories/0619F" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1600 - Monthly Remittance Return of Value-Added Tax and Other Percentage Taxes Withheld
						</td>
						<td><a href="/companies/{{ $company }}/histories/1600" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1600WP - Remittance Return of Percentage Tax on Winnings and Prizes Withheld by Race Track Operators
						</td>
						<td><a href="/companies/{{ $company }}/histories/1600WP" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1601Cv2018 - Monthly Remittance Return of Income Taxes Withheld on Compensation (NEW)
						</td>
						<td><a href="/companies/{{ $company }}/histories/1601Cv2018" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1601E - Monthly Remittance Return of Creditable Income Taxes Withheld(Expanded)
						</td>
						<td><a href="/companies/{{ $company }}/histories/1601E" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1601EQ - Quarterly Remittance Return of Creditable Income Taxes Withheld (Expanded)
						</td>
						<td><a href="/companies/{{ $company }}/histories/1601EQ" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1601F - Monthly Remittance Return of Final Income Tax Withheld
						</td>
						<td><a href="/companies/{{ $company }}/histories/1601F" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1601FQ - Quarterly Remittance Return of Final Income Tax Withheld
						</td>
						<td><a href="/companies/{{ $company }}/histories/1601FQ" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1602Qv2018 - Quarterly Remittance Return of Final Taxes Withheld on Interest Paid on Deposits Substitutes/Trusts/Etc. (NEW)
						</td>
						<td><a href="/companies/{{ $company }}/histories/1602Qv2018" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1603Qv2018 - Quarterly Remittance Return of Final Income Taxes Witheld on Fringe Benefits to Employees Other than Rank and File (NEW)
						</td>
						<td><a href="/companies/{{ $company }}/histories/1603Qv2018" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1604E - Annual Information Return of Creditable Income Taxes Withheld
						</td>
						<td><a href="/companies/{{ $company }}/histories/1604E" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1604CF - Annual Information Return of Income Taxes Withheld on Compensation
						</td>
						<td><a href="/companies/{{ $company }}/histories/1604CF" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1606 - ONETT Withholding Tax Return
						</td>
						<td><a href="/companies/{{ $company }}/histories/1606" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1701A - Annual Income Tax Return (NEW)
						</td>
						<td><a href="/companies/{{ $company }}/histories/1701A" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1701v2018 - Annual Income Tax Return (NEW)
						</td>
						<td><a href="/companies/{{ $company }}/histories/1701v2018" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1701Qv2018 - Quarterly Income Tax Return For Self-Employed Individuals, Estates and Trusts (NEW)
						</td>
						<td><a href="/companies/{{ $company }}/histories/1701Qv2018" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1702EX - Annual Income Tax Return (EXEMPT)
						</td>
						<td><a href="/companies/{{ $company }}/histories/1702EX" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1702MX - Annual Income Tax Return (MIXED)
						</td>
						<td><a href="/companies/{{ $company }}/histories/1702MX" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1702RT - Annual Income Tax Return (REGULAR)
						</td>
						<td><a href="/companies/{{ $company }}/histories/1702RT" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>

					<tr>
						<td>
							BIR Form 1702Q - Quarterly income Tax Return
						</td>
						<td><a href="/companies/{{ $company }}/histories/1702Q" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1704 - Improperly Accumulated Earnings Tax Return
						</td>
						<td><a href="/companies/{{ $company }}/histories/1704" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1706 - Improperly Accumulated Earnings Tax Return
						</td>
						<td><a href="/companies/{{ $company }}/histories/1706" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1707 - Capital Gains Tax Return
						</td>
						<td><a href="/companies/{{ $company }}/histories/1707" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1707A - Annual Capital Gains Tax Return(For Onerous Transfer of Shares of Stocks Not Traded Through the Local Stock Exchange)
						</td>
						<td><a href="/companies/{{ $company }}/histories/1707A" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1800 - ONETT Donor's Tax Return
						</td>
						<td><a href="/companies/{{ $company }}/histories/1800" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 1801 - ONETT State Tax Return
						</td>
						<td><a href="/companies/{{ $company }}/histories/1801" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 2000v2018 - Monthly Documentary Stamp Tax Declaration/Return (NEW)
						</td>
						<td><a href="/companies/{{ $company }}/histories/2000v2018" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 2000OT - Documentary Stamp Tax Declaration/Return (one-time transactions)
						</td>
						<td><a href="/companies/{{ $company }}/histories/2000OT" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 2200A - Excise Tax Return for Alcohol Products
						</td>
						<td><a href="/companies/{{ $company }}/histories/2200A" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 2200AN - Excise Tax Return for AutoMobiles and Non-essential Goods
						</td>
						<td><a href="/companies/{{ $company }}/histories/2200AN" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 2200M - Excise Tax Return for Mineral Products
						</td>
						<td><a href="/companies/{{ $company }}/histories/2200M" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 2200P - Excise Tax Return for Petroleum Products
						</td>
						<td><a href="/companies/{{ $company }}/histories/2200P" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 2200S - Excise Tax Return for Sweetened Beverages
						</td>
						<td><a href="/companies/{{ $company }}/histories/2200S" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 2200T - Excise Tax Return for Tobacco Products
						</td>
						<td><a href="/companies/{{ $company }}/histories/2200T" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 2550M - Monthly Value-Added Tax Declaration
						</td>
						<td><a href="/companies/{{ $company }}/histories/2550M" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 2550Q - Quarterly Value-Added Tax Return
						</td>
						<td><a href="/companies/{{ $company }}/histories/2550Q" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 2551Qv2018 - Quarterly Percentage Tax Return
						</td>
						<td><a href="/companies/{{ $company }}/histories/2551Qv2018" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 2551M - Monthly Percentage Tax Return
						</td>
						<td><a href="/companies/{{ $company }}/histories/2551M" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 2552 - Percentage Tax Return on Stocks
						</td>
						<td><a href="/companies/{{ $company }}/histories/2552" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
					<tr>
						<td>
							BIR Form 2553 - Return of Percentage Tax Payable Under Special Laws
						</td>
						<td><a href="/companies/{{ $company }}/histories/2553" class="btn btn-sm btn-success">Fill Up</a></td>
					</tr>
				</tbody>
			</table>
		</section>
	</main>
@endsection