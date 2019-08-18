@extends('layouts/layout')

@section('title')

  <hi>Welcome to Laravel</hi>

@endsection

@section('content')

  <p>This is the content</p>

  <ul>
    @foreach ($contents as $contentitem)
      <li>{{ $contentitem }}</li>
    @endforeach
  </ul>

@endsection
