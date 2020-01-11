<header class="app-header">
    <a href="#" class="app-header__logo">{{config('app.name')}}</a>
    <a href="#" class="app-sidebar__toggle" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <ul class="app-nav">
        <li class="app-search">
            <input type="search" class="app-search__input" placeholder="Search" />
            <button class="app-search__button">
                <i class="fa fa-search"></i>
            </button>
        </li>
        <li class="dropdown">
            <a href="#" class="app-nav__item" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">
                    You have 4 notifications
                </li>
                <div class="app-notification__content">
                    <li>
                        <a href="javascript:;" class="app-notification__item">
                            <span class="app-notification__icon">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-danger"></i>
                                    <i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i>
                                </span>
                            </span>
                            <div>
                                <p class="app-notification__message">
                                    Mail server not working
                                </p>
                                <p class="app-notification__meta">
                                    5 minutes ago
                                </p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="app-notification__item">
                            <span class="app-notification__icon">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x text-success"></i>
                                    <i class="fa fa-money fa-stack-1x fa-inverse"></i>
                                </span>
                            </span>
                            <div>
                                <p class="app-notification__message">
                                    Transaction Complete
                                </p>
                                <p class="app-notification__meta">
                                    2 days ago
                                </p>
                            </div>
                        </a>
                    </li>
                </div>
                <li class="app-notification__footer">
                    <a href="#">See all notifications</a>
                </li>
            </ul>
        </li>
{{--        User Menu--}}
        <li class="dropdown">
            <a href="#" class="app-nav__item" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li>
                    <a href="{{route('admin.settings')}}" class="dropdown-item"><i class="fa fa-cog fa-lg"></i>Settings</a>
                </li>
                <li>
                    <a href="page-user.html" class="dropdown-item"><i class="fa fa-user fa-lg"></i>Profile</a>
                </li>
                <li>
                    <a href="{{route('admin.logout')}}" class="dropdown-item"><i class="fa fa-sign-out fa-lg"></i>Logout</a>
                </li>
            </ul>
        </li>
    </ul>
</header>
