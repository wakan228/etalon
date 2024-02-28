<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="image">
    <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
</div>
<div class="info">
    <a href="#" class="d-block">Alexander Pierce</a>
</div>
</div>



<!-- Sidebar Menu -->
<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
    <li class="nav-item">
        <a href="{{route('admin.main')}}" class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}">
            <i class="nav-icon far fa-image"></i>
            <p>
            Main
            </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('admin.posts')}}" class="nav-link {{ (request()->is('admin/posts')) ? 'active' : '' }}">
            <i class="nav-icon far fa-image"></i>
            <p>
            Posts
            </p>
        </a>
    </li> 
</ul>
</nav>