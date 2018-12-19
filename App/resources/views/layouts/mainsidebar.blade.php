    <div class="logo">
        <a href="#">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar2__content js-scrollbar1">
        <div class="account2">
            <div class="image img-cir img-120">
                <img src="{{ asset('assets/images/icon/avatar-big-01.jpg') }}" alt="John Doe" />
            </div>
            <h4 class="name">{{ auth()->user()->name }}</h4>
        </div>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                <li @if (Route::currentRouteName() =='home') class="active" @endif>
                    <a href="{{ route('home') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li @if (Route::currentRouteName() =='childs.create') class="active" @endif>
                    <a href="{{ route('childs.create') }}">
                        <i class="fas fa-plus"></i>Add Child
                    </a>
                </li>


                <li @if (Route::currentRouteName() =='profile.edit') class="active" @endif>
                    <a href="{{ route('profile.edit') }}">
                        <i class="fas fa-user"></i>Profile
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">
                        <i class="zmdi zmdi-power"></i>Logout
                    </a>
                </li>
            </ul>
        </nav>
    </div>
