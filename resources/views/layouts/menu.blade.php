<li class="nav-item {{ Request::is('admin/listes*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.listes.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Listes</span>
    </a>
</li>

<li class="nav-item {{ Request::is('admin/liens*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.liens.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Liens</span>
    </a>
</li>


<li class="nav-item {{ Request::is('admin/photos*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.photos.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Photos</span>
    </a>
</li>



