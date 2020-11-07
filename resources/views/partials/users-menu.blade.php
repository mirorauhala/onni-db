<div class="col-md-4">
    <ul class="nav nav-pills nav-stacked">
        <li {{ active(['users.index*']) }}>
            <a href="{{ route('users.index') }}">User management</a>
        </li>
        <li {{ active(['users.create*']) }}>
            <a href="{{ route('users.create') }}">Create new user</a>
        </li>
    </ul>
</div>
