<div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ checkActiveUrl('dashboard') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            @can('isAdmin')
                <li class="nav-item">
                    <a href="{{ route('categories.index') }}" class="nav-link {{ checkActiveUrl('categories*') }}">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
            @endcan
            <li class="nav-item">
                <a href="{{ route('books.index') }}" class="nav-link {{ checkActiveUrl('books*') }}">
                    <i class="nav-icon fa fa-book"></i>
                    <p>
                        Book
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('wishlist') }}" class="nav-link {{ checkActiveUrl('wishlist') }}">
                    <i class="nav-icon fas fa-heart"></i>
                    <p>
                        Wishlist
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
