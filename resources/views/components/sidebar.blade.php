<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item mb-3">
                <a class="nav-link @if(request()->routeIs('index')) active @endif" href="{{url(\App\Classes\Helpers::getHost() . '/')}}">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Главная
                </a>
            </li>
            <li class="nav-item mb-3">
                <nav class="small px-4" id="toc">
                    <a href="{{url(\App\Classes\Helpers::getHost() . '/waste')}}" class="btn btn-sm btn-outline-secondary">Все записи</a>
                </nav>
            </li>
            <li class="nav-item mb-3">
                <nav class="small px-4" id="toc">
                    <a href="{{url(\App\Classes\Helpers::getHost() . '/create')}}" class="btn btn-sm btn-outline-secondary">Загрузить данные</a>
                </nav>
            </li>
        </ul>
        <nav class="small px-4" id="toc">
            <a href="{{url(\App\Classes\Helpers::getHost() . '/export')}}" class="btn btn-sm btn-outline-secondary">Выгрузка в Excel</a>
        </nav>
    </div>
</nav>
