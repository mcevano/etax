@extends('layouts.app')
@section('title', '| Dashboard')
@section('content')
<main class="container container-main margin-container">
   
  @if(Auth::user()->status == 'Deactivated')
    <br><br>
    <div class="alert alert-danger" role="alert">
      <h4 class="alert-heading">Oops Sorry!</h4>
      <hr>
      <p>Your account for <strong>DEMO</strong> version has already expired.</p>
    </div>
  @else
    <h6 class="page-title">DASHBOARD</h6>
    <section>
      <div class="row">
        <div class="col-lg-4">
          <div class="bg-white p-3 rounded">
            <h5 class="font-orange label-title text-center">FREE EBOOK</h5>
            <hr>
            <figure class="text-center">
              <img class="mr-3" src="{{ asset('images/ebook_cover.png') }}" alt="Train Law" width="150">
            </figure>
            <h6 class="mt-0">"TRAIN Law Simplified (R.A. 10963 Summary)"</h6>
              <p class="font-sm text-justify">The TRAIN law program aims to create a more just, simple and
                effective system of tax collection, as per the constitution, where the
                rich will have a bigger contribution and the poor will benefit more
                from the government’s programs and services.
                TRAIN law seeks to raise P130 billion in revenue in order to
                facilitate the funding of the government’s Build, Build, Build
                infrastructure program and socio-economic programs.</p>
              <a href="https://s3-ap-southeast-1.amazonaws.com/devleyte/etax+release/TRAIN+Ebook.etax.pdf" class="btn btn-warning btn-sm" target="_blank">Read here</a>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="bg-white p-3 rounded">
            <div id="calendar">
              {!! $calendar->calendar() !!}
              {!! $calendar->script() !!}
            </div>
            
          </div>
        </div>
      </div>
    </section>
  @endif
   
</main>
@endsection
