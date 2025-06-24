@extends('app')

@section('content')
<section>
    <h1>Category Admin Page</h1>
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