@extends('app')

@section('content')
<section>
    <h1>Category Admin Page</h1>
    <a href="{{ route('admin.category.create')  }}">Create Category</a>
    <table>
        <tr>
            <td>Name</td>
        </tr>
    @forelse ($categories as $category)
    <tr>
        <td>{{ $category->name  }}</td>
    </tr>
    @empty
    <tr>
        <td>No Category found</td>
    </tr>
    @endforelse
    </table>
    {{ $categories->links() }}
</section>
@endsection