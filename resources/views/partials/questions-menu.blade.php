<div class="col-md-4">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link{{ active(['question.all*']) }}" href="{{ route('question.all') }}">Listaa kaikki</a>
        </li>
        <li class="nav-item">
            <a class="nav-link{{ active(['question.create*']) }}" href="{{ route('question.create') }}">Lisää uusi kysymys</a>
        </li>
    </ul>
</div>
