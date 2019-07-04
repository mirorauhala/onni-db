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
                            <th>Kategoria</th>
                            <th>Toiminnot</th>
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
                                            Toiminnot <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('category.edit', ['category' => $category->id]) }}">Muokkaa</a></li>
                                            <li><a class="dropdown-item" href="{{ route('category.delete', ['category' => $category->id]) }}">Poista</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            @else
                <p>Ei kategorioita.</p>
            @endif
        </div>
    </div>
</div>
@endsection
