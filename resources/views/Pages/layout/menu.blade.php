
@extends('Pages.layout.index')
@section('menu')
<nav id="sidebar">
    <div class="menu dark-mode ">
        <?php if(Auth::user()->category == '3') { ?>
            <!--Logo-->
        <div class="dark-mode logo-area">
            <a id="logo" href="./Pages/Student/Home">
                <div class="logo-pages dark-mode ">
                </div>
                <h2>DTU</h2>
            </a>
        </div>
        <!--Menu item-->
        <div id="menu-content">
            <!-- @yield('menu_select') -->
            <a class="menu-item" href="./Pages/Student/Home">
                <span class="menu-item-icon icon-board"></span>
                <span class="menu-item-text">Tổng quan</span>
            </a>
            <a class="menu-item" href="./Pages/Student/chat">
                <span class="menu-item-icon icon-board"></span>
                <span class="menu-item-text">Chat với AI</span>
            </a>
            <a class="menu-item" href="./Pages/Student/Profile/{{Auth::user()->id}}">
                <div class="menu-item-icon icon-profile"></div>
                <div class="menu-item-text">Hồ Sơ</div>
            </a>
            <a class="menu-item" href="./Pages/Student/Blog">
                <div class="menu-item-icon icon-help"></div>
                <div class="menu-item-text">Blog Cá Nhân</div>
            </a>
                <a class="menu-item" href="./Pages/Student/DS1">
                <div class="icon-more icon-company"></div>
                <div class="menu-item-text">Công Ty</div>
            </a>
            <a class="menu-item" href="./Pages/Student/DS2">
                <div class="menu-item-icon icon-teacher"></div>
                <div class="menu-item-text">Nhà Trường</div>
            </a>
            <a class="menu-item" href="./Pages/Student/jobs">
                <div class="menu-item-icon icon-company"></div>
                <div class="menu-item-text">Công Việc</div>
            </a>
            <a class="menu-item" href="./Pages/Student/research-topics">
                <div class="menu-item-icon icon-teacher"></div>
                <div class="menu-item-text">Nghiên cứu</div>
            </a>
        <?php } elseif(Auth::user()->category == '1'){ ?>
        <div class="dark-mode logo-area">
            <a id="logo" href="./Pages/Company/Home">
                <div class="dark-mode logo-pages">

                </div>
                <h2>DTU</h2>
            </a>
        </div>
        <!--Menu item-->
        <div id="menu-content">
            <!-- @yield('menu_select') -->
            <a class="menu-item" href="./Pages/Company/Home">
                <span class="menu-item-icon icon-board"></span>
                <span class="menu-item-text">Tổng Quan</span>
            </a>
            <a class="menu-item" href="./Pages/Company/Profile/{{Auth::user()->id}}">
                <div class="menu-item-icon icon-profile"></div>
                <div class="menu-item-text">Hồ Sơ</div>
            </a>

            <a class="menu-item" href="./Pages/Company/Blog">
                <div class="icon-more icon-blog"></div>
                <div class="menu-item-text">Blog Cá Nhân</div>
            </a>
            
            <a class="menu-item" href="./Pages/Company/DS1">
                <div class="icon-more icon-company"></div>
                <div class="menu-item-text">Sinh viên</div>
            </a>
            <a class="menu-item" href="./Pages/Company/DS2">
                <div class="menu-item-icon icon-teacher"></div>
                <div class="menu-item-text">Nhà Trường</div>
            </a>
            <a class="menu-item" href="./Pages/Company/jobs">
                <div class="menu-item-icon icon-teacher"></div>
                <div class="menu-item-text">Tạo Công Việc</div>
            </a>
            </a>
        <?php } elseif(Auth::user()->category == '2'){ ?>
        <div class="dark-mode logo-area">
            <a id="logo" href="./Pages/Teacher/Home">
                <div class="logo-pages">

                </div>
                <h2>DTU</h2>
            </a>
        </div>
        <!--Menu item-->
        <div id="menu-content">
            <!-- @yield('menu_select') -->
            <a class="menu-item" href="./Pages/Teacher/Home">
                <span class="menu-item-icon icon-board"></span>
                <span class="menu-item-text">Tổng Quan</span>
            </a>
            <a class="menu-item" href="./Pages/Teacher/Profile/{{Auth::user()->id}}">
                <div class="menu-item-icon icon-profile"></div>
                <div class="menu-item-text">Hồ Sơ</div>
            </a>
            <a class="menu-item" href="./Pages/Teacher/Blog">
                <div class="icon-more icon-blog"></div>
                <div class="menu-item-text">Blog Cá Nhân</div>
            </a>

            <a class="menu-item" href="./Pages/Teacher/DS1">
            <div class="menu-item-icon icon-teacher"></div>
            <div class="menu-item-text">Công Ty</div>
            </a>
            <a class="menu-item" href="./Pages/Teacher/DS2">
            <div class="icon-more icon-company"></div>
            <div class="menu-item-text">Sinh Viên</div>
            </a>
            <a class="menu-item" href="./Pages/Teacher/research_topics/create">
                <div class="icon-more icon-company"></div>
                <div class="menu-item-text">Nghiên cứu</div>
                </a>
            <?php }?>
            <a class="menu-item" href="./Pages/meetings">
                <div class="menu-item-icon icon-help"></div>
                <div class="menu-item-text">Cuộc họp</div>
            </a>
            
            
            <a class="menu-item" href="./Pages/Setting">
                <div class="menu-item-icon icon-setting"></div>
                <div class="menu-item-text">Thiết Lập</div>
            </a>
            <a class="menu-item" href="./Pages/Help">
                <div class="menu-item-icon icon-help"></div>
                <div class="menu-item-text">Trợ Giúp</div>
            </a>
        </div>
    </div>
</nav>
@endsection
