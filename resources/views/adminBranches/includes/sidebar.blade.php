<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href=""><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>

            {{--start item product  --}}
            <li class="nav-item  open ">
                <a href="{{route('getCategories')}}"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Categories</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>
            </li>
            {{--end item product --}}

            <li class="nav-item  open ">
                <a href="{{route('make-order')}}"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">make order</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>
            </li>

            <li class="nav-item  open ">
                <a href="{{route('getProductsWithBranch')}}"><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">show product</span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>
            </li>

        </ul>
    </div>
</div>
