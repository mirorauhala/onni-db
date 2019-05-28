<div class="col-md-4">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link{{ active(['question.all*']) }}" href="{{ route('question.all') }}">List all</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ active(['question.new*']) }}" href="{{ route('question.new') }}">Add new question</a>
        </li>
    </ul>
</div>
