<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <div>
            <p class="app-sidebar__user-name">Shamil Mardanzade</p>
            <p class="app-sidebar__user-designation">Back End Developer</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a href="{{route('admin.dashboard')}}" class="app-menu__item {{Route::currentRouteName() == 'admin.dashboard' ? 'active' : ''}}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#" class="app-menu__item" data-toggle="treeview">
                <i class="app-menu__icon fa fa-users"></i>
                <span class="app-menu__label">Users</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="#" class="treeview-item"><i class="icon fa fa-circle-o"></i>Admin Users</a>
                </li>
                <li>
                    <a href="#" class="treeview-item" target="_blank" rel="noopener noreferrer"><i class="icon fa fa-circle-o"></i>Roles</a>
                </li>
                <li>
                    <a href="#" class="treeview-item"><i class="icon fa fa-circle-o"></i>Permissions</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('admin.settings')}}" class="app-menu__item {{Route::currentRouteName() == 'admin.settings' ? 'active' : ''}}">
                <i class="app-menu__icon fa fa-cogs"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.categories.index')}}" class="app-menu__item {{Route::currentRouteName() == 'admin.categories.index' ? 'active' : ''}}">
                <i class="app-menu__icon fa fa-tags"></i>
                <span class="app-menu__label">Categories</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.attributes.index')}}" class="app-menu__item {{Route::currentRouteName() == 'admin.attributes.index' ? 'active' : ''}}">
                <i class="app-menu__icon fa fa-th"></i>
                <span class="app-menu__label">Attributes</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.brands.index')}}" class="app-menu__item {{Route::currentRouteName() == 'admin.brands.index' ? 'active' : ''}}">
                <i class="app-menu__icon fa fa-briefcase"></i>
                <span class="app-menu__label">Brands</span>
            </a>
        </li>
        <li>
            <a href="{{route('admin.products.index')}}" class="app-menu__item {{Route::currentRouteName() == 'admin.products.index' ? 'active' : ''}}">
                <i class="app-menu__icon fa fa-shopping-bag"></i>
                <span class="app-menu__label">Products</span>
            </a>
        </li>
    </ul>
</aside>
