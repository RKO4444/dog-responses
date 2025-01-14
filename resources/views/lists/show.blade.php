@extends('layouts.app')

@section('content')
<h1>{{ $dogList->name }}</h1>
<a href="{{ route('lists.edit', $dogList) }}" class="btn btn-primary mb-3">Edit List</a>
<div class="row">
  @foreach($dogList->items as $item)
    <div class="col-md-3 mb-4">
      <div class="card h-100">
        <img src="{{ $item->image_url }}" class="card-img-top" alt="Dog {{ $item->response_code }}">
        <div class="card-body">
          <h5 class="card-title">HTTP {{ $item->response_code }}</h5>
        </div>
      </div>
    </div>
  @endforeach
</div>
@endsection
