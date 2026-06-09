<nav id="sidebar" class="active">
    <div class="sidebar-header">
    <span><img src="<?php echo e(asset('public/images/logo-svg.svg')); ?>"></span>
    <button type="button" id="sidebarCollapse" class="btn text-sidebar position-absolute">
      <i class="icon icon-arrow-right"></i>
      <span></span>
    </button>
    </div>

    <ul class="list-unstyled components">



<li class="default-btn">
  <a href="<?php echo e(url('/dashboard')); ?>"> <i class="fa fa-receipt"></i> <span class="menu-text">Dashboard</span></a>
</li>


<li>
    <a style="padding-bottom: 6px"> <span class="custom-heading h6 font-weight-bold "> Sales</span></a>
   <hr />
</li>

<li>
  <a href="<?php echo e(url('/point-of-sale/create')); ?>"> <i class="fa fa-receipt"></i> <span class="menu-text">Point of Sale</span></a>
</li>

<li>
  <a href="<?php echo e(url('/point-of-sale')); ?>"> <i class="fa fa-receipt"></i> <span class="menu-text">All Sales</span></a>
</li>


<li>
    <a style="padding-bottom: 6px"> <span class="custom-heading h6 font-weight-bold "> Invoices</span></a>
   <hr />
</li>

<li>
  <a href="<?php echo e(url('/sale-invoice/create')); ?>"> <i class="fa fa-receipt"></i> <span class="menu-text">New
      Invoice</span></a>
</li>
<li>
  <a href="<?php echo e(url('/sale-invoice')); ?>">
    <span class="text-small">
      <i class="fa fa-print"></i>
      Sale Invoices
    </span>
  </a>
</li>

<li>
  <a href="<?php echo e(url('/purchase-invoice')); ?>">
    <span class="text-small">
      <i class="fa fa-print"></i>
      Purchase Invoices
    </span>
  </a>
</li>




<li>
    <a style="padding-bottom: 6px"> <span class="custom-heading font-weight-bold "> Reports</span></a>
   <hr />
</li>

    <li>
      <a href="<?php echo e(url('/sales-report')); ?>" class="d-flex " style="gap:4px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/>
      </svg>
      <span class="text-small">Sales</small></span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/sales-outstandings-report')); ?>" class="d-flex " style="gap:4px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
          <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z"/>
        </svg>
        <span class="text-small">Sales Outstandings</small></span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/sales-product-report')); ?>" class="d-flex " style="gap:4px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
          <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z"/>
        </svg>
        <span class="text-small">Sales Product Report</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/sales-inward-report')); ?>" class="d-flex " style="gap:4px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
          <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z"/>
        </svg>
        <span class="text-small">Sales Inward Report</span>
      </a>
    </li>

    
    <li>
      <a href="<?php echo e(url('/purchase-report')); ?>" class="d-flex " style="gap:4px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/>
      </svg>
      <span class="text-small">Purchase Report</small></span>
      </a>
    </li>

    <li>
      <a href="<?php echo e(url('/purchase-outstandings-report')); ?>" class="d-flex " style="gap:4px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
          <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z"/>
        </svg>
        <span class="text-small">Purchase Outstandings</small></span>
      </a>
    </li>

    <li>
      <a href="<?php echo e(url('/purchase-product-report')); ?>" class="d-flex " style="gap:4px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
          <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z"/>
        </svg>
        <span class="text-small">Purchase Product Report</span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/purchase-inward-report')); ?>" class="d-flex " style="gap:4px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
          <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z"/>
        </svg>
        <span class="text-small">Purchase Inward Report</span>
      </a>
    </li>



<li>
    <a style="padding-bottom: 6px"> <span class="custom-heading font-weight-bold "> Payments</span></a>
   <hr />
</li>
    <li>
      <a href="<?php echo e(url('/sale-receipt')); ?>" class="d-flex " style="gap:4px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-fill" viewBox="0 0 16 16">
        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4zm0 3v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1a1 1 0 0 1 1-1z"/>
      </svg>
      <span class="text-small">Inward Payment<small class="text-muted">(On Sales)</small></span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/purchase-receipt')); ?>" class="d-flex " style="gap:4px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
          <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z"/>
        </svg>
        <span class="text-small">Outward Payment<small class="text-muted">(On Purchase)</small></span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/purchase-history')); ?>" class="d-flex " style="gap:4px;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card-2-back-fill" viewBox="0 0 16 16">
          <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z"/>
        </svg>
        <span class="text-small">History</span>
      </a>
    </li>



<li>
    <a style="padding-bottom: 6px"> <span class="custom-heading font-weight-bold ">Add New</span></a>
   <hr />
</li>

<li>
    <a href="<?php echo e(url('/customers')); ?>" class="d-flex " style="gap:4px;">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
      </svg>
      <span class="text-small"> Customer/Vendor</span>
    </a>
</li>
<li>
    <a href="<?php echo e(url('/products')); ?>" class="d-flex " style="gap:4px;">
      <svg style="margin-top:2px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
        <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
      </svg>
      <span class="text-small">
       Inventory
      </span>
    </a>
</li>
<li>
    <a href="<?php echo e(url('/transports')); ?>">
      <span class="text-small"> <i class="fa fa-truck"></i> Transport</span>
    </a>
</li>

<li>
  <a href="<?php echo e(url('/expenses')); ?>"> <i class="fa fa-receipt"></i> <span class="menu-text">Expenses</span></a>
</li>


    
<li>
    <a style="padding-bottom: 6px"> <span class="custom-heading font-weight-bold "> Settings</span></a>
   <hr />
</li>
    <li>
      <a href="<?php echo e(url('admin-details')); ?>">
        <span class="text-small">Profile </span>
      </a>
    </li>
    <li>
      <a href="<?php echo e(url('/business-detail')); ?>">
        <span class="text-small">My Business</span>
      </a>
    </li>
    <li>
        <a href="<?php echo e(url('/invoice-setting')); ?>">
          <span class="text-small">Invoice Setting</span>
        </a>
    </li>

</ul>
<div class="userbar">
<div class="logout-sec"><i class="fa fa-user-circle"></i><span>
    <p class="username"><?php echo e(Auth::user()->name); ?></p>
    <small class=" text-capitalize">Lifetime  plan</small>
  </span>
  <div class="logout-hover">
    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="dud-logout btn btn-danger"
      title="Logout">
      Logout
    </a>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
      <?php echo csrf_field(); ?>
    </form>
  </div>
</div>
<div class="developedby">
  <p class="text-muted">
    Developed with <i class="fa fa-heart"></i> by:<br>
    Dabster SoftTech
  </p>
</div>


  </nav>
<?php /**PATH C:\Users\HP\Desktop\Work\web-billing\billing\resources\views/partials/customer/sidebar.blade.php ENDPATH**/ ?>