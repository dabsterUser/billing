



<?php $__env->startSection('content'); ?>

<style>
.dataTables_filter{
  display: none;
}
</style>

<div class="page-content">
<div class="top-stickybar"> 
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Products</h4>

              <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                      <li class="breadcrumb-item"><a href="javascript: void(0);">Customer/Vendor</a></li>
                      
                      <a href="javascript:;" id="multiDelete" class="btn btn-danger mr-2 d-none">Remove</a>                    
                  </ol>
              </div>
          </div>
      </div>
    </div>

    <div class="row pb-4 gy-3">
      <div class="col-sm-4">
          
          <a class="btn btn-primary" data-bs-toggle="offcanvas" href="#AddProductroffcanvas" role="button" aria-controls="AddProductroffcanvas"><i class="las la-plus me-1"></i>Add Product</a>      
      </div>
      

      <div class="col-sm-auto ms-auto">
         <div class="d-flex gap-3">
          <div class="search-box">
            <input type="text" value="" name="" maxlength="150" class="form-control" id="searchbox" placeholder="Search for products..."
            required="" aria-required="true">
              
              <i class="las la-search search-icon"></i>
          </div>
          <div class="">
              <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false" class="btn btn-soft-info btn-icon fs-14"><i class="las la-ellipsis-v fs-18"></i></button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                  <li><a class="dropdown-item" href="#">Print</a></li>
                  <li><a class="dropdown-item" href="#">Export to Excel</a></li>
              </ul>
          </div>
         </div>
      </div>
  </div>
  </div>
</div>

<div class="container-fluid main-container">
  <div class="main-form-container">
    <div class="total-widget py-4">
      <div class="row ">
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="fs-18 fw-semibold  ff-secondary mb-2">Total </h4>
                                <span class="text-success fs-14 mb-0 ms-1 counter-value" data-target="<?php echo e($product_count); ?>">
                                    
                                </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="fs-18 fw-semibold  ff-secondary mb-2">Products </h4>
                                <span class="text-success fs-14 mb-0 ms-1 counter-value" data-target="<?php echo e($product_count); ?>">
                                    
                                </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->
        <div class="col-xl-3 col-md-6">
            <!-- card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h4 class="fs-18 fw-semibold  ff-secondary mb-2">Services </h4>
                                <span class="text-success fs-14 mb-0 ms-1 counter-value" data-target="5">
                                    
                                </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

      </div>
    </div>

    

    <?php if(\Session::has('success')): ?>
        <div class="alert alert-primary alert-border-left alert-dismissible fade show w-50" role="alert">
          <i class="ri-user-smile-line me-3 align-middle fs-16"></i>
          <?php echo \Session::get('success'); ?>

          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <div class="record-table custom-data-table mt-3 mb-3 bg-white py-3 px-3">
      <!-- <div class="record-table custom-data-table"> -->
        
          <table class="table table-hover" data-footable="" id="product-datatable" data-toggle-column="last"
            style="display: table;">
            <thead>
              <tr class="footable-header">

                <th class="chkbox footable-first-visible">

                  <input type="checkbox" class="select-all" onclick="selectall();" name="del">

                </th>
                <th><a href="">Product Image</a></th>

                <th><a href="javascript:void(0)">SKU ID</a></th>

                <th><a href="#">Name</a></th>

                <th><a href="#">Selling Price</a></th>

                <th><a href="#">HSN Code</a></th>

                <th><a href="#">UOM</a></th>

                <th><a href="#">Current Stock</a></th>

                <th><a href="#">Last Updated</a></th>

                <th>

                  <a href="#">Status</a>

                </th>

                <th class="footable-last-visible">

                  Action

                </th>

              </tr>

            </thead>

            <tbody>

              <?php if(count($products) > 0): ?>
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <tr>

                <td class="footable-first-visible">

                  <input type="checkbox" class="single-select" name="product_id[]" value="<?php echo e($product->id); ?>">

                </td>
				        
                <td><img src="<?php echo e(asset('public/images')); ?>/<?php echo e($product->product_image); ?>" width="70" height="70"></td>
                

                <td><?php echo e($product->item_code); ?></td>

                <td><?php echo e($product->name); ?></td>

                <td><?php echo e($product->sell_price); ?></td>

                <td><?php echo e($product->hsn_code); ?></td>

                <td><?php echo e($product->unit); ?></td>

                <td>
                  <div class="d-flex">
                    <span class="current-stock">
                      <?php echo e($product->stock); ?>

                    </span>
                    
                    <a href="#"  data-bs-toggle="modal" class="mx-1" data-bs-target="#updateStock<?php echo e($product->id); ?>">
                      <i class="bx bx-plus-circle" aria-hidden="true"></i>
                    </a>
                  </div>

                  
                    <div class="modal fade" id="updateStock<?php echo e($product->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header border-bottom py-2">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Prdouct Quanity</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="<?php echo e(route('stockUpdate',$product->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                <div class="form-group">
                                  <label for="Quanity">Add Quantity</label>
                                  <input type="Number" name="updated_Stockquantity" id="updated_Stockquantity" class="form-control"
                                  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="Add product quantity..."
                                  >
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>

                          </div>
                        </div>
                      </div>
                    </div>  


                </td>

                <td><?php echo e($product->updated_at->format('j F, Y')); ?></td>
				
                <td class="td-actions">
                  <input data-id="<?php echo e($product->id); ?>" class="toggle-class btn btn-outline-success" type="checkbox"
                    data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active"
                    data-off="InActive" <?php echo e($product->is_visible_all=='1' ? 'checked' : ''); ?>>
                  </td>

                <td class="td-actions footable-last-visible">
                  

                  <a href="#EditProductoffcanvas" data-bs-toggle="offcanvas" role="button" aria-controls="EditProductoffcanvas" onclick="get_product_by_id('<?php echo e($product->id); ?>')" class="btn btn-outline-primary d-flex" >
                    <i class="las la-pen fs-18 align-middle me-2 text-muted"></i>Edit </a>   

                  
                  
                  <div class="offcanvas offcanvas-end Productroffcanvas" tabindex="-1" id="EditProductoffcanvas" aria-labelledby="EditProductoffcanvasLabel">
                    <div class="offcanvas-header border-bottom">
                      <h5 class="offcanvas-title text-capitalize" id="EditProductoffcanvasLabel">Update Product</h5>
                      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                      <div class="modal-content">
                        <form method="post" action="<?php echo e(route('products.update',$product->id)); ?>" id="update-product-form"  enctype="multipart/form-data">
                                  <?php echo csrf_field(); ?>
                            <?php echo e(method_field('PATCH')); ?>

  
                          <input type="hidden" name="update_productId" id="update_productId" value="<?php echo e($product->id); ?>">
                          <div class="modal-header mb-2">
                            <h5 class="modal-title" id="editProductModalTitle">Update Product</h5>
                            <div class="d-flex justify-content-end gap-3">
                              <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-sm btn-primary"> Update</button>  
                            </div>
                          </div>
                          <input type="hidden" name="product_id" class="product_id">
                          <div class="modal-body">
                            <div class="row mt-2">
                              <label for="" class="col-sm-3 col-form-label required fw-normal fs-14">Type</label>
                              <div class="col-sm-9 d-flex mt-2 ">
                                <div class="custom-control custom-radio custom-control-inline mr-5">
                                  <input type="radio" id="edit_product_type" name="product_type" class="custom-control-input product_type" value="product" checked>
                                  <label class="custom-control-label" for="edit_product_type">Product/Goods</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="edit_product_type1" name="product_type" class="custom-control-input product_type" value="service"
                                    >
                                  <label class="custom-control-label" for="edit_product_type1">Services</label>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-2">
                              <label for="" class="col-sm-3 col-form-label required fw-normal fs-14">Name</label>
                              <div class="col-sm-9">
                                <div class="controls">
                                  <input type="text" name="name"  maxlength="150" class="form-control name"
                                    placeholder="Product/item name" required="" aria-required="true">
                                </div>
                              </div>
                            </div>
                            <div class="row mt-2 mb-3">
                              <label for="registration_type" class="col-sm-3 col-form-label required fw-normal fs-14">Measurment Unit</label>
                              <div class="col-sm-9">
                                <div class="controls">
                                  <select name="unit"  class="form-select unit">
                                    <option value="">Select unit</option>
                                    <?php if(array(count($units)>0)): ?>
                                      <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($unit->short_name); ?>"><?php echo e($unit->name); ?> </option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-2">
                              <label for="registration_type" class="col-sm-3 col-form-label required fw-normal fs-14">Category</label>
                              <div class="col-sm-9">
                                <div class="controls">
                                  <select name="category" class="form-select category">
                                    <option value="taxable">Taxable</option>
                                    <option value="exempted">Exempted</option>
                                    <option value="non_gst">Non GST</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-2">
                              <label for="registration_type" class="col-sm-3 col-form-label required fw-normal fs-14">Sell Price</label>
                              <div class="col-sm-9">
                                <div class="input-group">
                                  <input type="text" class="form-control sell_price" name="sell_price" aria-label="Text input with dropdown button">
                                  <div class="input-group-append">
                                    <button class="btn btn-outline-primary dropdown-toggle sell-dropdown" type="button" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">Excluding Tax</button>
                                    <div class="dropdown-menu sell-dropdown-option">
                                    <a class="dropdown-item" href="#">Including Tax</a>
                                    <a class="dropdown-item" href="#">Excluding Tax</a>
                                    </div>
                                  </div>
                                </div>
                                <input type="hidden" class="sell_price_tax" name="sell_price_tax" value="0">
                                <input type="hidden" class="sell_price_original" name="sell_price_original" value="0">
                                <!-- <p  class="sell_price_tax_label" ></p> -->
                                <div class="sell_price_container ">
                                    <p class="d-none sell_price_label">Sell Price :<span> </span> </p>
                                    <p class="d-none sell_price_tax_label">Sell Price with tax :<span> </span> </p>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-2">
                              <label for="registration_type" class="col-sm-3 col-form-label required fw-normal fs-14">Purchase Price</label>
                              <div class="col-sm-9">
                                <div class="input-group">
                                  <input type="text" name="purchase_price" class="form-control purchase_price" aria-label="Text input with dropdown button">
                                  <div class="input-group-append">
                                    <button class="btn btn-outline-primary dropdown-toggle purchase-dropdown" type="button" data-toggle="dropdown"
                                      aria-haspopup="true" aria-expanded="false">Excluding Tax</button>
                                    <div class="dropdown-menu purchase-dropdown-option">
                                      <a class="dropdown-item" href="#">Including Tax</a>
                                      <a class="dropdown-item" href="#">Excluding Tax</a>
                                    </div>
                                  </div>
  
                                </div>
                                <input type="hidden" class="purchase_price_tax" name="purchase_price_tax" value="0">
                                <!-- <p  class="purchase_price_tax_label" ></p> -->
                                <input type="hidden" class="purchase_price_original" name="purchase_price_original" value="0">
                                <!-- <p  class="sell_price_tax_label" ></p> -->
                                <div class="purchase_price_container ">
                                    <p class="d-none purchase_price_label">Purchase Price :<span> </span> </p>
                                    <p class="d-none purchase_price_tax_label">Purchase Price with tax :<span> </span> </p>
                                </div>
  
                              </div>
                            </div>
                            <div class="row mt-2 mb-4">
                              <label for="registration_type" class="col-sm-3 col-form-label required fw-normal fs-14">GST Rate</label>
                              <div class="col-sm-9">
                                <div class="controls">
                                  <select name="gst_rate"  class="form-select gst_rate">
                                    <option value="">Select applicable GST rate</option>
                                    <?php if(array(count($gstrate)>0)): ?>
                                      <?php $__currentLoopData = $gstrate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gst): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($gst->value); ?>"><?php echo e($gst->name); ?> </option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row mt-2">
                              <label for="" class="col-sm-3 col-form-label required fw-normal fs-14">HSN Code</label>
                              <div class="col-sm-9">
                                <div class="controls">
                                  <input type="text" name="hsn_code"  maxlength="150" class="form-control hsn_code"
                                    placeholder="HSN Code of an item" aria-required="true">
                                </div>
                              </div>
                            </div>
                            <div class="row mt-2">
                              <label for="" class="col-sm-3 col-form-label required fw-normal fs-14">Item Code</label>
                              <div class="col-sm-9">
                                <div class="controls">
                                  <input type="text" name="item_code"   maxlength="150" class="form-control item_code"
                                    placeholder="Item Code if you are using any"  aria-required="true">
                                </div>
                              </div>
                            </div>
                            <div class="row mt-2">
                              <label for="" class="col-sm-3 col-form-label required fw-normal fs-14">Stock</label>
                              <div class="col-sm-9">
                                <div class="controls">
                                  <input type="text" name="stock"  maxlength="150" class="form-control stock"
                                    placeholder="Stock in numbers"  aria-required="true" 
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                    >
                                </div>
                              </div>
                            </div>
                            <div class="row mt-2">
                              <label for="" class="col-sm-3 col-form-label required fw-normal fs-14">Product image</label>
                              <div class="col-sm-9">
                                <div class="controls">
                                  <!--<input type="text" name="product_image_input" id="product_image_input"  maxlength="150" class="form-control product_image" aria-required="true">-->
                                <input type="file" name="product_image" id="product_image" maxlength="150" class="form-control" aria-required="true">
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>

                    </div>
                  </div>


                </td>

              </tr>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <?php endif; ?>

            </tbody><!-- /tbody -->

          </table>

        

      <!-- </div> -->
    </div>
  </div>

</div>



<div class="offcanvas offcanvas-end Productroffcanvas" tabindex="-1" id="AddProductroffcanvas" aria-labelledby="AddProductroffcanvasLabel">
  <div class="offcanvas-header border-bottom">
    <h5 class="offcanvas-title text-capitalize" id="AddProductroffcanvasLabel">Create Product</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">

    <form method="post" action="<?php echo e(url('/products/')); ?>" id="add-product-form" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create New Product</h5>

            <div class="d-flex justify-content-end gap-3">
              <button type="button" class="btn btn-sm btn-light ml-auto mr-2" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-sm btn-primary"> Save</button>
            </div>

          </div>

          <div class="modal-body">
            <div class="row mt-2">
              <label for="" class="col-sm-3 col-form-label required fw-normal fs-14">Type</label>
              <div class="col-sm-9 d-flex gap-3 mt-2">
                  <div class="custom-control custom-radio custom-control-inline mr-5">
                    <input type="radio" id="product_type" name="product_type" class="custom-control-input product_type" value="product" checked>
                    <label class="custom-control-label fw-noramal fs-14" for="product_type">Product/Goods</label>
                  </div>
                  <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="product_type1" name="product_type" class="custom-control-input product_type" value="service">
                    <label class="custom-control-label fw-normal fs-14" for="product_type1">Services</label>
                  </div>
              </div>
            </div>
            <div class="row mt-2">
              <label for="" class="col-sm-3 col-form-label required fw-normal fs-14">Name</label>
              <div class="col-sm-9">
              <div class="controls">
                <input type="text" name="name" id="name" maxlength="150" class="form-control name" placeholder="Product/item name" required="" aria-required="true">
              </div>
              </div>
            </div>
            <div class="row mt-2 mb-3">
              <label for="registration_type" class="col-sm-3 col-form-label required fw-normal fs-14">Measurment Unit</label>
              <div class="col-sm-9">
                <div class="controls">
                  <select name="unit" id="unit" class="form-select unit">
                    <option value="">Select unit</option>
                    <?php if(array(count($units)>0)): ?>
                      <?php $__currentLoopData = $units; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $unit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($unit->short_name); ?>"><?php echo e($unit->name); ?> </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <label for="registration_type" class="col-sm-3 col-form-label required fw-normal fs-14">Category</label>
              <div class="col-sm-9">
                <div class="controls">
                  <select name="category" id="category" class="form-select category">
                    <option value="taxable">Taxable</option>
                    <option value="exempted">Exempted</option>
                    <option value="non_gst">Non GST</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <label for="registration_type" class="col-sm-3 col-form-label required fw-normal fs-14">Sell Price</label>
              <div class="col-sm-9">
                <div class="input-group">
                  <input type="text" class="form-control sell_price" name="sell_price" aria-label="Text input with dropdown button">
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary dropdown-toggle sell-dropdown" type="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">Including Tax</button>
                    <div class="dropdown-menu sell-dropdown-option">
                    <a class="dropdown-item" href="#">Including Tax</a>
                    <a class="dropdown-item" href="#">Excluding Tax</a>
                    </div>
                  </div>
                </div>
                <input type="hidden" class="sell_price_tax" name="sell_price_tax" value="0">
                <!-- <p id="sell_price_tax_label" class="sell_price_tax_label" ></p> -->
                <input type="hidden" class="sell_price_original" name="sell_price_original" value="0">
                <!-- <p  class="sell_price_tax_label" ></p> -->
                <div class="sell_price_container ">
                    <p class="d-none sell_price_label">Sell Price :<span> </span> </p>
                    <p class="d-none sell_price_tax_label">Sell Price with tax :<span> </span> </p>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <label for="registration_type" class="col-sm-3 col-form-label required fw-normal fs-14">Purchase Price</label>
              <div class="col-sm-9">
                <div class="input-group">
                  <input type="text" name="purchase_price" class="form-control purchase_price" aria-label="Text input with dropdown button">
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary dropdown-toggle purchase-dropdown" type="button" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">Including Tax</button>
                    <div class="dropdown-menu purchase-dropdown-option">
                      <a class="dropdown-item" href="#">Including Tax</a>
                      <a class="dropdown-item" href="#">Excluding Tax</a>
                    </div>
                  </div>

                </div>
                <input type="hidden" class="purchase_price_tax" name="purchase_price_tax" value="0">
                <!-- <p id="purchase_price_tax_label" class="purchase_price_tax_label" ></p> -->
                <input type="hidden" class="purchase_price_original" name="purchase_price_original" value="0">
                <!-- <p  class="sell_price_tax_label" ></p> -->
                <div class="purchase_price_container ">
                    <p class="d-none purchase_price_label">Purchase Price :<span> </span> </p>
                    <p class="d-none purchase_price_tax_label">Purchase Price with tax :<span> </span> </p>
                </div>
              </div>
            </div>
            <div class="row mt-2 mb-4">
              <label for="registration_type" class="col-sm-3 col-form-label required fw-normal fs-14">GST Rate</label>
              <div class="col-sm-9">
                <div class="controls">
                  <select name="gst_rate" id="gst_rate" class="form-select gst_rate">
                    <option value="">Select applicable GST rate</option>
                    <?php if(array(count($gstrate)>0)): ?>
                      <?php $__currentLoopData = $gstrate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gst): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($gst->value); ?>"><?php echo e($gst->name); ?> </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <label for="" class="col-sm-3 col-form-label required fw-normal fs-14">HSN Code</label>
              <div class="col-sm-9">
                <div class="controls">
                  <input type="text" name="hsn_code" id="hsn_code" maxlength="150" class="form-control hsn_code"
                    placeholder="HSN Code of an item" aria-required="true">
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <label for="" class="col-sm-3 col-form-label required fw-normal fs-14">SKU ID</label>
              <div class="col-sm-9">
                <div class="controls">
                  <input type="text" name="item_code" id="item_code"  maxlength="150" class="form-control item_code"
                    placeholder="Item Code if you are using any"  aria-required="true">
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <label for="" class="col-sm-3 col-form-label required fw-normal fs-14">Stock</label>
              <div class="col-sm-9">
                <div class="controls">
                  <input type="text" name="stock" id="stock" maxlength="150" class="form-control stock"
                    placeholder="Stock in numbers"  aria-required="true"
                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                    >
                </div>
              </div>
            </div>
          <div class="row mt-2">
            <label for="" class="col-sm-3 col-form-label required fw-normal fs-14">Select product image</label>
            <div class="col-sm-9">
              <div class="controls">
                <input type="file" name="product_image" id="product_image" maxlength="150" class="form-control" aria-required="true">
              </div>
            </div>
          </div>
        </div>
    </form>

  </div>
</div>

</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
<script src="<?php echo e(asset('public/js/general.js')); ?>"></script>

<script>
  var gst_rate;
  $('#add-product-form .category,#add-product-form .sell_price,#add-product-form .purchase_price, #add-product-form .gst_rate').on('keyup change blur',function(){
    var selector = "#add-product-form";
    product_calculation(selector);
  });

  $('#update-product-form .category,#update-product-form .sell_price,#update-product-form .purchase_price, #update-product-form .gst_rate').on('keyup change blur',function(){
    var selector = "#update-product-form";
    product_calculation(selector);
  });

  // $('#update-product-form .sell-dropdown').on('change click blur ',function(){
  //   console.log($(this).html());
  // });

  $('#update-product-form .sell-dropdown-option a').on('click', function(){
    
      $('#update-product-form .sell-dropdown').html($(this).html());
      var selector = "#update-product-form";
      product_calculation(selector);
  });

  $('#update-product-form .purchase-dropdown-option a').on('click', function(){
    
      $('#update-product-form .purchase-dropdown').html($(this).html());
      var selector = "#update-product-form";
      product_calculation(selector);
  });


  $('#add-product-form .sell-dropdown-option a').on('click', function(){
    console.log($(this).html());
      $('#add-product-form .sell-dropdown').html($(this).html());
      var selector = "#add-product-form";
      product_calculation(selector);
  });

  $('#add-product-form .purchase-dropdown-option a').on('click', function(){
    
      $('#add-product-form .purchase-dropdown').html($(this).html());
      var selector = "#add-product-form";
      product_calculation(selector);
  });



  var product_datatable = $('#product-datatable').DataTable();

  $("#searchbox").keyup(function() {
      filterGlobal();
  }); 

  function filterGlobal () {
      product_datatable.search(
          $('#searchbox').val(),
      ).draw();
  }

  function selectall(event) {
    var ischecked = $('.select-all').is(':checked');
    if (ischecked == true) {
      $('.single-select').prop('checked', 'checked');
      $('#multiDelete').removeClass('d-none');
    } else {
      $('.single-select').prop('checked', false);
      $('#multiDelete').addClass('d-none');
    }

  }



  $('.single-select').on('click', function () {
    var totalCheckboxes = $('.single-select').length;
    var numberOfChecked = $('.single-select:checked').length;
    if (numberOfChecked < totalCheckboxes) {
      $('.select-all').prop('checked', false);
    } else {
      $('.select-all').prop('checked', true);
    }

    if(numberOfChecked > 0){
      $('#multiDelete').removeClass('d-none');
    }else{
      $('#multiDelete').addClass('d-none');
    }
  });



  $('#multiDelete').on('click', function (e) {
    Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    url: base_url + '/product/multidelete',
                    method: 'POST',
                    data: $('#frm-example').serialize(),
                    success: function (data) {
                      if (data == '1') {
                        swal.fire({
                          'title': 'Product Deleted successfully',
                          'icon': 'success'
                        }).then(function () {
                          document.location.href = base_url + '/products';
                        });
                      } else {
                        swal.fire(data);
                      }
                    }
                  });
                }
            })  
  });



  //change the customer status

  $(function () {
    $('.toggle-class').change(function () {
      var status = $(this).prop('checked') == true ? '1' : '0';
      console.log(status);
      var p_id = $(this).data('id');
      $.ajax({
        type: "GET",
        dataType: "json",
        url: base_url + '/changeproductStatus/' + p_id,
        data: { 'status': status, 'id': p_id },
        success: function (data) {
          if(data){
            toastr.success(data.success);
          }else{
            toastr.warning(data.message);
          }
          // if(data.status == 1){
          //   toastr.success(data.message);
          // }else{
          //   toastr.warning(data.message);
          // }
        }
      });

    })

  })


  $('#add-product-form').validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
            name: {
              required:true,
            },
            sell_price:{
              required:true
            }
        },
        messages: {
          name: {
              required: 'Please enter name',
          }
        },
        highlight: function(element) {
            $(element).closest('.form-group input').addClass('has-error border-danger');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group input').removeClass('has-error border-danger');
        },
        success: function(element) {
            $(element).closest('.form-group input').removeClass('has-error border-danger');
            $(element).closest('.form-group').children('span.help-block').remove();
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.closest('.form-group .col-sm-9'));
        },
        submitHandler: function(form) {
           form.submit();
        }
    });

    //edit the product data


    function get_product_by_id(product_id){
      $.ajax({
        type: "GET",
        url: base_url+'/productlist',
        ContentType : 'application/json',
        dataType: 'json',
        data: {id:product_id},
        success: function(response){
            // console.log(response);
            if(response.status == 1){
              var customer_data = response.data[0];
              var form_selector = '#update-product-form';
              $(form_selector + ' .category').val(customer_data.category);
              $(form_selector + ' .name').val(customer_data.name);
              $(form_selector + ' .unit').val(customer_data.unit);
              $(form_selector + ' .sell_price').val(customer_data.sell_price);
              $(form_selector + ' .sell_price_original').val(customer_data.sell_price);
              $(form_selector + ' .sell_price_tax').val(customer_data.sell_price_with_tax);
              $(form_selector + ' .sell_price_label').removeClass('d-none');
              $(form_selector + ' .sell_price_label').children('span').html(customer_data.sell_price);
              $(form_selector + ' .sell_price_tax_label').removeClass('d-none');
              $(form_selector + ' .sell_price_tax_label').children('span').html(customer_data.sell_price_with_tax);
              $(form_selector + ' .purchase_price').val(customer_data.purchase_price);
              $(form_selector + ' .purchase_price_original').val(customer_data.purchase_price);
              $(form_selector + ' .purchase_price_tax').val(customer_data.purchase_price_with_tax);
              $(form_selector + ' .purchase_price_label').removeClass('d-none');
              $(form_selector + ' .purchase_price_label').children('span').html(customer_data.purchase_price);
              $(form_selector + ' .purchase_price_tax_label').removeClass('d-none');
              $(form_selector + ' .purchase_price_tax_label').children('span').html(customer_data.purchase_price_with_tax);
              $(form_selector + ' .gst_rate').val(customer_data.gst_rate);
              $(form_selector + ' .hsn_code').val(customer_data.hsn_code);
              $(form_selector + ' .item_code').val(customer_data.item_code);
              $(form_selector + ' .stock').val(customer_data.stock);
              $(form_selector + ' .product_id').val(customer_data.id);
              
              // if(customer_data.)
              // $(form_selector + ' .product_type').val(customer_data.product_type);
              $(form_selector + " input[name='product_type'][value='" + customer_data.product_type + "']").prop('checked', true);

              $('#editProductModal').modal('show');
            }else{
              toastr.warning(response.message);
            }
        },
        error: function(data){
        },
        complete: function(data){
        }
      });
    }

    $('#update-product-form').validate({
        errorElement: 'span',
        errorClass: 'text-danger text-right',
        rules: {
            name: {
              required:true,
            },
            sell_price:{
              required:true
            }
        },
        messages: {
          name: {
              required: 'Please enter name',
          }
        },
        highlight: function(element) {
            $(element).closest('.form-group input').addClass('has-error border-danger');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group input').removeClass('has-error border-danger');
        },
        success: function(element) {
            $(element).closest('.form-group input').removeClass('has-error border-danger');
            $(element).closest('.form-group').children('span.help-block').remove();
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.closest('.form-group .col-sm-9'));
        },
        submitHandler: function(form) {
		    var product_id = $('#update-product-form .product_id').val(); 
			
        
			//var file_data = $("#product_image").prop("files")[0];   
			//var formData = new FormData(this);
			var formData = new FormData($(form));
			//var formData = $('#update-product-form').serialize();
			//formData.append("file", file_data);
			//console.log(formData);
			//console.log();
			$.ajax({  
				type: "POST",  
				url: base_url+'/products/'+product_id,  
				ContentType : 'application/json',
				dataType: 'json',
				enctype: 'multipart/form-data',
				data: $('#update-product-form').serialize(),
				//data: formData,
				success: function(response){
					console.log(response);
				  if(response.status == 1){
					toastr.success(response.message);
					document.location.href = base_url + '/products';
				  }else{
					toastr.warning(response.message);
				  }  
				}
		    }); 
        },
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.customer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u284794662/domains/dabstersofttech.com/public_html/billing/resources/views/product/index.blade.php ENDPATH**/ ?>