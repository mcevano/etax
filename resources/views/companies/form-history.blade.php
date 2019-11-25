@extends('layouts.app')
@section('title', '| Form Transactions')
@section('content')
<main class="container container-main margin-container">
	<h6 class="page-title">BIR FORM {{ $form }}</h6>
	<section class="content-holder bg-white">
		<h5 class="font-orange label-title">TAXPAYER NAME: <strong>{{ $name }}</strong></h5>
		<hr>
		<a href="/form/{{ $form }}/{{$company}}/new/{{$form_no}}" class="btn btn-primary">Add</a>
		<a href="/companies/{{ $company }}/forms" class="btn btn-danger">Back</a>
		<br><br>
		<h5 class="	label-title">LISTS OF TRANSACTIONS FOR: <strong>BIR FORM {{ $form }} </strong></h5>
		<table class="table table-bordered table-data">
			<thead>
				<tr class="text-center">
					<th>File Name</th>
					<th>Return Period</th>
					<th>Date Created</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($forms as $each)
					<tr>
						<td>{{ $each->file_name }}</td>
						<td>{{ $each->return_period }}</td>
						<td>{{ date('Y-m-d h:i:s', strtotime($each->created_at)) }}</td>
						<td>{{ $each->status }}</td>
						<td class="text-center">
							@if($each->status != 'Filed')
							<a href="/form/{{ $form }}/{{$company}}/edit/{{ $each->form_id }}" class="btn btn-success btn-sm">
							Edit
							</a>
							<a class="btn btn-danger btn-sm" data-toggle="modal" href="#deleteModal{{$each->id}}">Delete</a>
							<a class="btn btn-warning btn-sm" data-toggle="modal" href="#fileModal{{$each->id}}">File</a>
							@else
							<a href="/form/{{ $form }}/{{$company}}/view/{{ $each->form_id }}" class="btn btn-primary btn-sm">
							View
							</a>
							@endif

							<!-- Delete Modal -->
							<div class="modal fade" id="deleteModal{{$each->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-centered" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalCenterTitle">Delete</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <form class="deleteForm">
							      		{{ method_field('DELETE') }}
										@csrf
							      		<div class="modal-body">
									      	<div class="alert alert-info">
									      	Are you sure you want to delete this data?
									      	</div>
									      	<input type="hidden" name="form" value="{{$each->id}}">
									    </div>
									    <div class="modal-footer">
									        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
									        <button type="submit" class="btn btn-primary">Yes</button>
									    </div>
							      </form>
							      
							    </div>
							  </div>
							</div>

							<!-- Filing Modal -->
							<div class="modal fade" id="fileModal{{$each->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							  <div class="modal-dialog modal-dialog-centered" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h5 class="modal-title" id="exampleModalCenterTitle">File</h5>
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							          <span aria-hidden="true">&times;</span>
							        </button>
							      </div>
							      <form class="fileForm">
							      	{{ method_field('PATCH') }}
									@csrf
							      		<div class="modal-body">
									      	<div class="alert alert-info">
									      	Are you sure you want to file this data?
									      	</div>
									      	<input type="hidden" name="form" value="{{$each->id}}">
									    </div>
									    <div class="modal-footer">
									        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
									        <button type="submit" class="btn btn-primary">Yes</button>
									    </div>
							      </form>
							      
							    </div>
							  </div>
							</div>

						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
						<!-- Modals -->
						<div class="modal fade" id="filingMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			              <div class="modal-dialog modal-dialog-centered" role="document">
			                <div class="modal-content">
			                  <div class="modal-header">
			                    <h5 class="modal-title" id="exampleModalLongTitle">Success!</h5>
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                      <span aria-hidden="true">&times;</span>
			                    </button>
			                  </div>
			                  <div class="modal-body">
			                        <div class="alert alert-success">
			                          You will no longer be allowed to modify since this is already the final copy. A confirmation message will be sent to your email to confirm that the transaction is successful.
			                        </div>
			                  </div>
			                  <div class="modal-footer">
			                    <a class="btn btn-primary" href="/companies/{{ $company }}/histories/{{ $form }}">Okay</a>
			                  </div>
			                </div>
			              </div>
			            </div>
			            <!-- For Delete Message -->
			            <div class="modal fade" id="deleteMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			              <div class="modal-dialog modal-dialog-centered" role="document">
			                <div class="modal-content">
			                  <div class="modal-header">
			                    <h5 class="modal-title" id="exampleModalLongTitle">Success!</h5>
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                      <span aria-hidden="true">&times;</span>
			                    </button>
			                  </div>
			                  <div class="modal-body">
			                        <div class="alert alert-success">
			                          You have successfully deleted the form.
			                        </div>
			                  </div>
			                  <div class="modal-footer">
			                    <a class="btn btn-primary" href="/companies/{{ $company }}/histories/{{ $form }}">Okay</a>
			                  </div>
			                </div>
			              </div>
			            </div>
	</section>
</main>
@endsection