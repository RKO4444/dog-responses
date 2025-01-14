@extends('layouts.app')

@section('content')
<h1 class="mb-4">My Lists</h1>
<ul class="list-group">
  @foreach($lists as $list)
    <li class="list-group-item d-flex justify-content-between align-items-center">
      <!-- Use btn btn-link for clickable appearance -->
      <a href="{{ route('lists.show', $list) }}" class="btn btn-link p-0 m-0 text-decoration-none text-primary">
        {{ $list->name }}
      </a>
      <form action="{{ route('lists.destroy', $list) }}" method="POST" 
            onsubmit="return confirm('Are you sure you want to delete this list?');">
         @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger btn-sm">Delete</button>
      </form>
    </li>
  @endforeach
</ul>
@endsection
