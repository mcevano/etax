@extends('layouts.app')
@section('title', '| OCR')
@section('content')
<main class="container container-main margin-container">
    <h6 class="page-title"></h6>
    <section class="content-holder bg-white">
      <form action="/ocr/upload" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image">
        <input type="submit">
      </form>
    </section>
</main>
@endsection
