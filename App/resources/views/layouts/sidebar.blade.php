
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
            <h4 class="name">{{ $child->name }}</h4>
        </div>
        <nav class="navbar-sidebar2">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="{{ route('home') }}">
                        <i class="fas fa-arrow-circle-left"></i>Home
                    </a>
                </li>
                <li @if (Route::currentRouteName() == 'child.dashboard') class="active" @endif>
                    <a href="{{ route('child.dashboard',$child->id) }}">
                        <i class="fas fa-tachometer-alt"></i>Child Dashboard
                    </a>
                </li>
                <li @if (Route::currentRouteName()=='child.messages') class="active" @endif>
                    <a href="{{ route('child.messages',$child->id) }}">
                        <i class="fas fa-envelope"></i>Inbox
                    </a>
                    {{--  <span class="inbox-num">3</span>  --}}
                </li>
                <li @if (Route::currentRouteName()=='child.calls') class="active" @endif>
                    <a href="{{ route('child.calls',$child->id) }}">
                        <i class="fas fa-phone-square"></i>Calls
                    </a>
                </li>
                <li @if (Route::currentRouteName()=='child.contacts') class="active" @endif>
                    <a href="{{ route('child.contacts',$child->id) }}">
                        <i class="fas fa-user"></i>Contacts
                    </a>
                </li>
            </ul>
        </nav>
    </div>
