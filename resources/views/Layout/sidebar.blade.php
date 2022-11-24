<div class="sidebar-menu">
    <div class="sidebar-header">
        <div class="logo">
            <a href="index.html"><img src="asset images/icon/logo.png" alt="ayyub tani logo"></a>
        </div>
    </div>
    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">

                    <li class="{{ Request::path() == 'dashboard' ? 'active' : '' }}"><a
                            href="{{ route('dashboard') }}"><i class="ti-dashboard"></i><span>dashboard</span></a></li>


                </ul>
            </nav>
        </div>
    </div>
</div>
