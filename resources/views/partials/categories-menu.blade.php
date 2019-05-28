<div class="col-md-4">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link {{ active(['category.all*']) }}" href="{{ route('category.all') }}">List all</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ active(['category.new*']) }}" href="{{ route('category.new') }}">Add new category</a>
        </li>
    </ul>
</div>
