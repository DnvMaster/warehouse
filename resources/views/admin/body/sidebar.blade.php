<div id="sidebar-menu">
    <div class="logo-box">
        <a href="{{ route('dashboard') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('backend/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend/images/logo-light.png') }}" alt="" height="24">
            </span>
        </a>
        <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('backend/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('backend/images/logo-dark.png') }}" alt="" height="24">
            </span>
        </a>
    </div>
    <ul id="side-menu">
        <li>
            <a href="{{ route('dashboard') }}" class="tp-link" style="font-size: 16px;">
                <i data-feather="home"></i>
                <span><b>{{ __('Панель управления') }}</b></span>
            </a>
        </li>
        <li>
            <a href="#sidebarReview" data-bs-toggle="collapse"><i data-feather="users"></i>
                <span> {{ __('Пользователь') }} </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarReview">
                <ul class="nav-second-level">
                    <li><a href="{{ route('all.review') }}" class="tp-link">{{ __('Все') }}</a></li>
                    <li><a href="{{ route('add.review') }}" class="tp-link">{{ __('Добавить') }}</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#sidebarSlider" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span>{{ __('Настройки слайдера')}} </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarSlider">
                <ul class="nav-second-level">
                    <li><a href="{{ route('get.slider') }}" class="tp-link">{{ __('Слайдер') }}</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#sidebarFeatures" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> {{ __('Настройки функций') }} </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarFeatures">
                <ul class="nav-second-level">
                    <li><a href="{{ route('all.feature') }}" class="tp-link">{{ __('Все') }}</a></li>
                    <li><a href="{{ route('add.feature') }}" class="tp-link">{{ __('Добавить') }}</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#sidebarClarifies" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> {{ __('Секция стратегия') }} </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarClarifies">
                <ul class="nav-second-level">
                    <li><a href="{{ route('all.clarifies') }}" class="tp-link">{{ __('Все') }}</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#sidebarYoutube" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> {{ __('Ютуб') }} </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarYoutube">
                <ul class="nav-second-level">
                    <li><a href="{{ route('get.usability') }}" class="tp-link">{{ __('Создать') }}</a></li>
                    <li><a href="{{ route('all.connect') }}" class="tp-link">{{ __('Просмотр данных') }}</a></li>
                    <li><a href="{{ route('add.connect') }}" class="tp-link">{{ __('Добавить данные') }}</a></li>
                </ul>
            </div>
        </li>
         <li>
            <a href="#sidebarTeams" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> {{ __('Клиенты') }}</span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarTeams">
                <ul class="nav-second-level">
                    <li><a href="{{ route('all.team') }}" class="tp-link">{{ __('Все клиенты') }}</a></li>
                    <li><a href="{{ route('add.team') }}" class="tp-link">{{ __('Добавить клиента') }}</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#sidebarFaq" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> {{ __('Частые вопросы') }} </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarFaq">
                <ul class="nav-second-level">
                    <li><a href="{{ route('all.faqs') }}" class="tp-link">{{ __('Все вопросы') }}</a></li>
                    <li><a href="{{ route('add.faqs') }}" class="tp-link">{{ __('Добавить вопрос') }}</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#sidebarAbout" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> {{ __('Страница о нас') }} </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarAbout">
                <ul class="nav-second-level">
                    <li><a href="{{ route('get.aboutus') }}" class="tp-link">{{ __('О нас') }}</a></li>
                </ul>
            </div>
        </li>
         <li>
            <a href="#sidebarCategoryBlog" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> {{ __('Блог / Категории') }} </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarCategoryBlog">
                <ul class="nav-second-level">
                    <li><a href="{{ route('all.blog.category') }}" class="tp-link">{{ __('Категория Блога') }}</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#sidebarBlogPost" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> {{ __('Блог / Пост') }} </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarBlogPost">
                <ul class="nav-second-level">
                    <li><a href="{{ route('all.blog.post') }}" class="tp-link">{{ __('Все посты') }}</a></li>
                    <li><a href="{{ route('all.blog.post') }}" class="tp-link">{{ __('Добавить пост') }}</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="#sidebarFormContact" data-bs-toggle="collapse">
                <i data-feather="alert-octagon"></i>
                <span> {{ __('Контакты') }} </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarFormContact">
                <ul class="nav-second-level">
                    <li><a href="{{ route('contact.all.message') }}" class="tp-link">{{ __('Все сообщения') }}</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>