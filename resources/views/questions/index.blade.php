@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if(count($questions))
                <!-- TODO: use API -->
                <script>
                    window.Questions = {!! $questions->toJSON() !!}
                </script>
                <o-questions></o-questions>
                {{ $questions->links() }}
            @else
                <p>There are no questions.</p>
            @endif
        </div>
    </div>
</div>
@endsection
