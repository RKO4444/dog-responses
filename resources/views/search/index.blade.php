@extends('layouts.app')

@section('content')
<h1 class="mb-4">Search Response Codes</h1>

<div class="card p-4 mb-4">
  <form method="POST" action="{{ route('search.filter') }}">
    @csrf
    <div class="mb-3">
      <label for="filter" class="form-label">Filter</label>
      <input type="text" 
             class="form-control" 
             id="filter" 
             name="filter" 
             value="{{ old('filter', $filter ?? '') }}" 
             placeholder="e.g., 2xx, 203, 20x" 
             required>
    </div>
    <button type="submit" class="btn btn-primary">Filter</button>
  </form>
</div>

@if(isset($results))
  <h2>Results for filter: {{ $filter }}</h2>
  @if(count($results) > 0)
    <div class="row">
      @foreach($results as $code => $url)
        <div class="col-md-3 mb-4">
          <div class="card h-100">
            <img src="{{ $url }}" class="card-img-top" alt="Dog {{ $code }}">
            <div class="card-body">
              <h5 class="card-title">HTTP {{ $code }}</h5>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="card p-4 mt-4">
      <form method="POST" action="{{ route('search.save') }}">
        @csrf
        <input type="hidden" name="filter" value="{{ $filter }}">
        <div class="mb-3">
          <label for="list_name" class="form-label">List Name</label>
          <input type="text" class="form-control" id="list_name" name="list_name" required>
        </div>
        <button type="submit" class="btn btn-success">Save List</button>
      </form>
    </div>
  @else
    <p class="alert alert-info">No results found for filter "{{ $filter }}".</p>
  @endif
@endif

@endsection
