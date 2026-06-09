<!-- removeNotificationModal -->
<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
            </div>
            <div class="modal-body">
                <div class="mt-2 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                    <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                        <h4>Are you sure ?</h4>
                        <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
        <!-- ========== App Menu ========== -->
        <div class="app-menu navbar-menu">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="{{url('/dashboard')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('new/images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('new/images/logo-dark.png') }}" alt="" height="21">
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="{{url('/dashboard')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('images/logo-sm.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('new/images/logo-light.png') }}" alt="" height="21">
                    </span>
                </a>
                <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{url('/dashboard')}}">
                                <i class="las la-house-damage"></i> <span data-key="t-dashboard">Dashboard</span>
                            </a>
                        </li>

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Invoices</span></li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/sale-invoice')}}" >
                                <i class="las la-file-invoice"></i> <span data-key="t-invoices">Sales</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/purchase-invoice')}}" >
                                <i class="las la-file-invoice"></i> <span data-key="t-invoices">Purchase</span>
                            </a>
                        </li>

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Add New</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{url('/customers')}}" >
                                <i class="las la-pen-nib"></i> <span data-key="t-bootstrap-ui">Customer/Vendor</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{url('/products')}}" >
                                <i class="las la-pen-nib"></i> <span data-key="t-bootstrap-ui">Products/Services</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{url('/transports')}}" >
                                <i class="las la-pen-nib"></i> <span data-key="t-bootstrap-ui">Transport</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{url('/expenses')}}" >
                                <i class="las la-pen-nib"></i> <span data-key="t-bootstrap-ui">Expense</span>
                            </a>
                        </li>

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Reports</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#salesReprtsUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
                                <i class="las la-pen-nib"></i> <span data-key="t-bootstrap-ui">Sales</span>
                            </a>
                            <div class="collapse menu-dropdown " id="salesReprtsUI">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{url('/sales-report')}}" class="nav-link" data-key="t-grid">Sales-Report</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{url('/sales-outstandings-report')}}" class="nav-link" data-key="t-grid">Sales-Outstandings</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{url('/sales-product-report')}}" class="nav-link" data-key="t-grid">Sales-Products</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{url('/sales-inward-report')}}" class="nav-link" data-key="t-grid">Sales-Inward</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#purchaseReprtsUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUI">
                                <i class="las la-pen-nib"></i> <span data-key="t-bootstrap-ui">Purchase </span>
                            </a>
                            <div class="collapse menu-dropdown " id="purchaseReprtsUI">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="{{url('/purchase-report')}}" class="nav-link" data-key="t-dropdowns">Purchase-Report</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{url('/purchase-outstandings-report')}}" class="nav-link" data-key="t-grid">Purchase-Outstandings</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{url('/purchase-product-report')}}" class="nav-link" data-key="t-grid">Purchase-Products</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{url('/purchase-inward-report')}}" class="nav-link" data-key="t-grid">Purchase-Inward</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#othreReportsUI" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarUIy">
                                <i class="las la-pen-nib"></i> <span data-key="t-bootstrap-ui">Other Reports</span>
                            </a>
                            <div class="collapse menu-dropdown mega-dropdown-menu" id="othreReportsUI">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="nav nav-sm flex-column">
                                            <li class="nav-item">
                                                <a href="ui-dropdowns.html" class="nav-link" data-key="t-dropdowns">Dropdowns</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="ui-grid.html" class="nav-link" data-key="t-grid">Grid</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Payments</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{url('/sale-receipt')}}" >
                                <i class="las la-pen-nib"></i> <span data-key="t-bootstrap-ui">Inward Payment<small class="text-muted">(On Sales)</small></span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{url('/purchase-receipt')}}" >
                                <i class="las la-pen-nib"></i> <span data-key="t-bootstrap-ui">Outward Payment<small class="text-muted">(On Purchase)</small></span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{url('/purchase-history')}}" >
                                <i class="las la-pen-nib"></i> <span data-key="t-bootstrap-ui">History</span>
                            </a>
                        </li>

                        {{-- <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Settings</span></li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{url('admin-details')}}" >
                                <i class="las la-pen-nib"></i> <span data-key="t-bootstrap-ui">Profile</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{url('/business-detail')}}" >
                                <i class="las la-pen-nib"></i> <span data-key="t-bootstrap-ui">My Business</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="{{url('/invoice-setting')}}" >
                                <i class="las la-pen-nib"></i> <span data-key="t-bootstrap-ui">Settings</span>
                            </a>
                        </li> --}}

                        <div class="help-box text-center">
                            <img src="{{ asset('new/images/create-invoice.png') }}" class="img-fluid" alt="">
                            <p class="mb-3 mt-2 text-muted">Upgrade To Pro For More Features</p>
                            <div class="mt-3">
                                <a href="invoice-add.html" class="btn btn-primary"> Create Invoice</a>
                            </div>
                        </div>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>

            <div class="sidebar-background"></div>
        </div>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        