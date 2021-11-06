<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ strFilter(config('app.name', 'Laravel')) }}</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('backend')}}/images/favicon/favicon.png">
    <!-- ionicons css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <!-- toastr css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- selectpicker css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!-- datepicker css -->
    <link rel="stylesheet" href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css">
    <!-- perfect scrollbar css -->
    <link rel="stylesheet" href="{{asset('backend')}}/vendors/scrollbar/perfect-scrollbar.css">
    <!-- include style -->
    <link rel="stylesheet" href="{{asset('backend')}}/style/master.css">

    @stack('header-style')
    @stack('header-script')
</head>
<body>

{{--@dd($mainMenu)--}}
<section class="wrapper" data-menu="{{(!empty($asideMenu) ? $asideMenu : '')}}" data-submenu="{{(!empty($asideSubmenu) ? $asideSubmenu : '')}}">
    <!-- panel aside start -->
    <aside class="panel_aside">
        <div class="brand">
            <span class="brand_icon"><i class="icon ion-md-home"></i></span>
            <h3>Freelance It Lab</h3>
            <a href="#" id="panelClose_btn">
                <i class="icon ion-ios-close io-36"></i>
            </a>
            <a href="#" id="panelOpen_btn">
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        <!-- aside nav start -->
        <ul class="aside_nav">
            <!-- dashboard -->
            <li id="dashboard">
                <a href="{{route('admin.dashboard')}}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="menu_title">Dashboard</span>
                </a>
            </li>


            @if(Auth::user()->privilege != 'user')
            <!-- product -->
            <li id="product" class="dropdown">
                <a href="#">
                    <i class="fas fa-shopping-basket"></i>
                    <span class="menu_title">Product</span>
                    <span class="menu_arrow">
                        <i class="icon ion-ios-arrow-forward right"></i>
                        <i class="icon ion-ios-arrow-down down"></i>
                    </span>
                </a>
                <ul>
                    <li class="productAdd"><a href="{{route('admin.product.create')}}">Add new</a></li>
                    <li class="productList"><a href="{{route('admin.product')}}">View All</a></li>
                    <li class="productCategory"><a href="{{route('admin.product.category')}}">Category</a></li>
                    <li class="productSubcategory"><a href="{{route('admin.product.subcategory')}}">Subcategory</a></li>
                    <li class="productBrand"><a href="{{route('admin.product.brand')}}">Brand</a></li>
                    <li class="productUnit"><a href="{{route('admin.product.unit')}}">Unit</a></li>
                </ul>
            </li>

            <!-- Machine -->
            <li id="machine" class="dropdown">
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span class="menu_title">Machine</span>
                    <span class="menu_arrow">
                        <i class="icon ion-ios-arrow-forward right"></i>
                        <i class="icon ion-ios-arrow-down down"></i>
                    </span>
                </a>
                <ul>
                    <li class="machineCreate"><a href="{{route('admin.machine.create')}}">Add new</a></li>
                    <li class="machineList"><a href="{{route('admin.machine')}}">View All</a></li>
                </ul>
            </li>


            <!-- Supplier -->
            <li id="supplier" class="dropdown">
                <a href="#">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span class="menu_title">Supplier</span>
                    <span class="menu_arrow">
                        <i class="icon ion-ios-arrow-forward right"></i>
                        <i class="icon ion-ios-arrow-down down"></i>
                    </span>
                </a>
                <ul>
                    <li class="addSupplier"><a href="{{route('admin.supplier.create')}}">Add Supplier</a></li>
                    <li class="allSupplier"><a href="{{route('admin.supplier')}}">All Supplier</a></li>
                    <li class="addTransaction"><a href="{{route('admin.transaction.create')}}">Add Transaction</a></li>
                    <li class="allTransaction"><a href="{{route('admin.transaction')}}">All Transaction</a></li>
                </ul>
            </li>

            <!-- Purchase -->
            <li id="purchase" class="dropdown">
                <a href="#">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span class="menu_title">Purchase</span>
                    <span class="menu_arrow">
                        <i class="icon ion-ios-arrow-forward right"></i>
                        <i class="icon ion-ios-arrow-down down"></i>
                    </span>
                </a>
                <ul>
                    <li class="addPurchase"><a href="{{route('admin.purchase.create')}}">Add Purchase</a></li>
                    <li class="allPurchase"><a href="{{route('admin.purchase')}}">All Purchase</a></li>
                    <li class="itemReport"><a href="{{route('admin.purchase.item-report')}}">Item Report</a></li>
                </ul>
            </li>

            <!-- Stock -->
            <li id="stock">
                <a href="{{route('admin.stock')}}">
                    <i class="fas fa-shopping-basket"></i>
                    <span class="menu_title">Stock</span>
                </a>
            </li>
            @endif

            <!-- Sale -->
            <li id="sale" class="dropdown">
                <a href="#">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <span class="menu_title">Sale</span>
                    <span class="menu_arrow">
                        <i class="icon ion-ios-arrow-forward right"></i>
                        <i class="icon ion-ios-arrow-down down"></i>
                    </span>
                </a>
                <ul>
                    <li class="addSale"><a href="{{route('admin.sale.create')}}">Add Sale</a></li>
                    <li class="allSale"><a href="{{route('admin.sale')}}">All Sale</a></li>
                    <li class="report"><a href="{{route('admin.sale.report')}}">Sale Report</a></li>
                </ul>
            </li>

            <?php /*
            <!-- Income -->
            <li id="income" class="dropdown">
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span class="menu_title">Income</span>
                    <span class="menu_arrow">
                        <i class="icon ion-ios-arrow-forward right"></i>
                        <i class="icon ion-ios-arrow-down down"></i>
                    </span>
                </a>
                <ul>
                    <li class="incomeCategory"><a href="{{route('admin.income.category')}}">Category</a></li>
                    <li class="incomeField"><a href="{{route('admin.income.field')}}">Field</a></li>
                    <li class="incomeAdd"><a href="{{route('admin.income.create')}}">New Income</a></li>
                    <li class="incomeList"><a href="{{route('admin.income')}}">All Income</a></li>
                </ul>
            </li>

            <!-- Cost -->
            <li id="cost" class="dropdown">
                <a href="#">
                    <i class="fas fa-cog"></i>
                    <span class="menu_title">Cost</span>
                    <span class="menu_arrow">
                        <i class="icon ion-ios-arrow-forward right"></i>
                        <i class="icon ion-ios-arrow-down down"></i>
                    </span>
                </a>
                <ul>
                    <li class="costCategory"><a href="{{route('admin.cost.category')}}">Category</a></li>
                    <li class="costField"><a href="{{route('admin.cost.field')}}">Field</a></li>
                    <li class="costAdd"><a href="{{route('admin.cost.create')}}">New Cost</a></li>
                    <li class="costList"><a href="{{route('admin.cost')}}">All Cost</a></li>
                </ul>
            </li> */ ?>

            <!-- User -->
            @if(Auth::user()->privilege != 'user')
            <li id="user" class="dropdown">
                <a href="#">
                    <i class="fa fa-users" aria-hidden="true"></i>
                    <span class="menu_title">User</span>
                    <span class="menu_arrow">
                        <i class="icon ion-ios-arrow-forward right"></i>
                        <i class="icon ion-ios-arrow-down down"></i>
                    </span>
                </a>
                <ul>
                    <li class="add_user"><a href="{{route('admin.user.create')}}">Add User</a></li>
                    <li class="all_user"><a href="{{route('admin.user')}}">All User</a></li>
                </ul>
            </li>
            <!-- privilege -->
            {{--<li id="privilege">
                <a href="{{route('admin.privilege')}}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="menu_title">Privilege</span>
                </a>
            </li>--}}
            @endif
        </ul>
    </aside>
    <!-- panel aside end -->


    <!-- body section start -->
    <div class="main_body">
        <!-- main nav start -->
        <nav class="main_nav">
            <ul class="function_menu">
                <li class="user_dropdown">
                    <a href="#" id="aside-toggle">
                        <i class="icon ion-ios-menu io-23"></i>
                    </a>
                </li>
            </ul>

            <ul class="user_menu">
                <!-- message -->
                <li class="user_dropdown">
                    <a href="#" class="menu-button">
                        <i class="icon ion-ios-mail io-21"></i>
                    </a>
                    <ul class="sub_menu">
                        <li class="head">
                            <a href="#">
                                <h6>You have 2 Message</h6>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Awesome aminmate.css</span>
                                <small>10 minit ago</small>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span>Awesome aminmate.css</span>
                                <small>10 minit ago</small>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- profile -->
                <li class="user_dropdown">
                    <a href="#" class="menu-button">
                        @if(!empty(Auth::user()->avatar))
                        <img src="{{asset(Auth::user()->avatar)}}" alt="">
                        @else
                            <img src="{{asset('backend')}}/images/user/02.png" alt="">
                        @endif
                    </a>
                    <ul class="sub_menu">
                        <li class="head">
                            <a href="">
                                <h6>{{strFilter(Auth::user()->name)}}</h6>
                                <small>{{strFilter(Auth::user()->privilege)}}</small>
                            </a>
                        </li>
                        <li><a href="{{route('admin.user.show', Auth::user()->id)}}">Profile</a></li>
                        <li>
                            <a href="{{ route('admin.logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- main nav end -->

        @yield('content')
    </div>
    <!-- body section end -->


    <!-- footer start -->
    <div class="developer">
        <p>Developed By : <a href="https://freelanceitlab.com/" target="_blank">Freelance It Lab</a></p>
    </div>
    <div class="wrapper_background"></div>
</section>

<!-- jQuery js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
<!-- selectpicker js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<!-- toastr js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- ckeditor4 js -->
<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
<!-- datepicker js -->
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js"></script>
<!-- perfect scrollbar js -->
<script src="{{asset('backend')}}/vendors/scrollbar/perfect-scrollbar.min.js"></script>
<!-- include js -->
<script src="{{asset('backend')}}/js/app.js"></script>

@include('components.toastr')

@stack('footer-style')
@stack('footer-script')
</body>
</html>

