@extends('app')

@section('content')
<h1>Admin Page</h1>

<ul>
    <li><a href="{{ route('admin.category.index')  }}" 
        class="text-blue-500 hover:underline">Category</a>
</ul>
@endsection