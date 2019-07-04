<div class="col-md-4">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link {{ active(['category.all*']) }}" href="{{ route('category.all') }}">Listaa kaikki</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ active(['category.new*']) }}" href="{{ route('category.new') }}">Lisää uusi kategoria</a>
        </li>
    </ul>
</div>
