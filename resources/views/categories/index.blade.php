@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if(count($categories))
                {{ $categories->links() }}
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr class="cursor-pointer">
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Actions <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('category.edit', ['category' => $category->id]) }}">Edit</a></li>
                                            <li><a class="dropdown-item" href="{{ route('category.delete', ['category' => $category->id]) }}">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            @else
                <p>There are no categories.</p>
            @endif
        </div>
    </div>
</div>
@endsection
