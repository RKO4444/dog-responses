@extends('layouts.app')

@section('content')
<h1 class="mb-4">Edit {{ $dogList->name }}</h1>

<form method="POST" action="{{ route('lists.update', $dogList) }}" class="mb-4">
  @csrf
  <div class="mb-3">
    <label for="name" class="form-label">List Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $dogList->name) }}" required>
  </div>
  <button type="submit" class="btn btn-primary">Update Name</button>
</form>

<h2 class="mb-3">Items in this list (select to delete):</h2>
<form method="POST" action="{{ route('lists.update', $dogList) }}">
  @csrf
  @method('POST')
  <input type="hidden" name="name" value="{{ old('name', $dogList->name) }}">
  <div class="row">
    @foreach($dogList->items as $item)
      <div class="col-md-3 mb-4">
        <div class="card h-100">
          <img src="{{ $item->image_url }}" class="card-img-top" alt="Dog {{ $item->response_code }}">
          <div class="card-body text-center">
            <h5 class="card-title">HTTP {{ $item->response_code }}</h5>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="{{ $item->id }}" 
                     id="delete_item_{{ $item->id }}" name="delete_items[]">
              <label class="form-check-label" for="delete_item_{{ $item->id }}">
                Delete
              </label>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <button type="submit" class="btn btn-success" 
          onclick="return confirm('Are you sure you want to apply these changes?');">
    Update
  </button>
</form>
@endsection
