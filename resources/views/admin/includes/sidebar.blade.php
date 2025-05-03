<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item active"><a href=""><i class="la la-mouse-pointer"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">الرئيسية </span></a>
            </li>
{{--start item category  --}}
            <li class="nav-item  open ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Categories </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('category.show')}}"
                                          data-i18n="nav.dash.ecommerce"> show all categories </a>
                    </li>
                    <li><a class="menu-item" href="{{route('category.create.view')}}" data-i18n="nav.dash.crypto">create new category</a>
                    </li>
                </ul>
            </li>
            {{--end item category --}}



            {{--start item product  --}}
            <li class="nav-item  open ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Products </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('product.show')}}"
                                          data-i18n="nav.dash.ecommerce"> show all products </a>
                    </li>
                    <li><a class="menu-item" href="{{route('product.save.view')}}" data-i18n="nav.dash.crypto">create new product</a>
                    </li>
                </ul>
            </li>
            {{--end item product --}}


            {{--start item store  --}}
            <li class="nav-item  open ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">store </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('store.show')}}"
                                          data-i18n="nav.dash.ecommerce"> show all store </a>
                    </li>
                    <li><a class="menu-item" href="{{route('store.save.view')}}" data-i18n="nav.dash.crypto">create new store</a>
                    </li>
                </ul>
            </li>
            {{--end item store --}}

            {{--start item branch  --}}
            <li class="nav-item  open ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Branches </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('branch.show')}}"
                                          data-i18n="nav.dash.ecommerce"> show all Branches </a>
                    </li>
                    <li><a class="menu-item" href="{{route('branch.save.view')}}" data-i18n="nav.dash.crypto">create new branch</a>
                    </li>
                </ul>
            </li>
            {{--end item branch --}}

            {{--start item Users  --}}
            <li class="nav-item  open ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Users </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('user.show')}}"
                                          data-i18n="nav.dash.ecommerce"> show all Users </a>
                    </li>
                    <li><a class="menu-item" href="{{route('user.save.view')}}" data-i18n="nav.dash.crypto">create new User</a>
                    </li>
                </ul>
            </li>
            {{--end item Users --}}


            {{--start request  --}}
            <li class="nav-item  open ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Requests of branch </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('show-request')}}"
                                          data-i18n="nav.dash.ecommerce"> show all requests </a>
                    </li>

                </ul>
            </li>
            {{--end request --}}

{{--start reports--}}
            <li class="nav-item  open ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Reports </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('show-reports')}}"
                                          data-i18n="nav.dash.ecommerce"> show branch report </a>
                    </li>

                    <li><a class="menu-item" href="{{route('search-product')}}" data-i18n="nav.dash.crypto">show product report</a>
                    </li>

                    <li><a class="menu-item" href="{{route('show-order-branch')}}" data-i18n="nav.dash.crypto">show All Order Of Branch</a>
                    </li>
                </ul>
            </li>
{{--end reports--}}

            {{--start item category  --}}
            <li class="nav-item  open ">
                <a href=""><i class="la la-home"></i>
                    <span class="menu-title" data-i18n="nav.dash.main">Charts </span>
                    <span
                        class="badge badge badge-info badge-pill float-right mr-2"></span>
                </a>
                <ul class="menu-content">
                    <li class="active"><a class="menu-item" href="{{route('show-charts-branch')}}"
                                          data-i18n="nav.dash.ecommerce"> show high branch </a>
                    </li>
                    <li><a class="menu-item" href="{{route('show-charts-product')}}" data-i18n="nav.dash.crypto">show high product</a>
                    </li>

                </ul>
            </li>
            {{--end item category --}}

        </ul>
    </div>
</div>
