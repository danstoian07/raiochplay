<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="/backend/avatar/{{ auth()->user()->avatar }}" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</div>
                <div class="email">{{ auth()->user()->email }}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('admin.settings.index') }}"><i class="material-icons">person</i>Cont</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="{{ route('logout.get-method') }}"><i class="material-icons">input</i>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li @if($active == 'home') class="active" @endif>
                    <a href="{{ route('admin.index') }}">
                        <i class="material-icons">home</i>
                        <span>Acasa</span>
                    </a>
                </li>
                <li @if($active == 'cat') class="active" @endif>
                    <a href="{{ route('admin.categories') }}">
                        <i class="material-icons">folder</i>
                        <span>Categorii</span>
                    </a>
                </li>
                <li @if($active == 'prod') class="active" @endif>
                    <a href="{{ route('admin.products') }}">
                        <i class="material-icons">store_mall_directory</i>
                        <span>Produse</span>
                    </a>
                </li>
                <li @if($active == 'newsletter') class="active" @endif>
                    <a href="{{ route('admin.newsletter.index') }}">
                        <i class="material-icons">mail</i>
                        <span>Newsletter</span>
                    </a>
                </li>
                <li @if($active == 'settings') class="active" @endif>
                    <a href="{{ route('admin.settings.index') }}">
                        <i class="material-icons">settings</i>
                        <span>Setari</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->

</section>