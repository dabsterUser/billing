@extends('layouts.customer')

@section('content')
<div class="container-fluid">
      <div class="homepage-cards mt-5">
        <div class="row">
          <!-- <div class="col-md-12">
            <div class="card badge-light">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5><i class="icon icon-magnifier mr-2"></i> Search Product</h5>
                  </div>
                </div>
              </div>
              <div class="card-block">
                <form>
                  <div class="form-row align-items-end">
                    <div class="col-auto mr-3">
                      <label class="" for="">Search By Product Name :</label>
                      <input type="text" class="form-control mb-2" id="" placeholder="Product Name ">
                    </div>
                    <div class="col-auto">
                      <button type="submit" class="btn btn-primary mb-2"><i class="icon icon-magnifier"></i>
                        Search</button>
                      <strong class="mx-3">or</strong>
                      <a href="#" class="btn btn-primary mb-2"><i class="icon icon-list"></i> Show all Data</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div> -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col">
                    <h5><i class="icon icon-list mr-2"></i> Stock</h5>
                  </div>
                  
              </div>
              <div class="card-block">
                <div class="table-responsive">
                <form id="frm-example" action="{{url('/manage-stock')}}" method="POST">
                @csrf
                  <table class="table table-hover" data-footable="" id="product-datatable" data-toggle-column="last" style="display: table;">
                    <thead>
                      <tr class="footable-header">
                        
                        <th><a href="#">NAME</a></th>
                        <th><a href="#">SELLPRICE</a></th>
                        <th><a href="#">HSN CODE</a></th>
                        <th><a href="#">UOM</a></th>
                        <th><a href="#">CURRENT STOCK</a></th>
                        <th>New Stock</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if(count($products) > 0)
                        @foreach($products as $key => $product)
                        <tr>
                        
                        <td>{{$product->name}}</td>
                        <td>{{$product->sell_price}}</td>
                        <td>{{$product->hsn_code}}</td>
                        <td>{{$product->unit}}</td>
                        <td>{{$product->stock}}</td>
                        <td>
                        @if($product->is_service_product == '1')         
                             0      
                        @else
                          <input type="hidden" name="product_id[]" value="{{$product->id}}">
                          <input type="number" min="0" name="inventory_stock[]" } class="form-controls">  
                        @endif
                        </td>
                      </tr>
                        @endforeach
                      @endif
                    </tbody><!-- /tbody -->
                  </table>
                </form>
                </div>
              </div>
              <div class="card-footer bg-primary">
                <div class="row">
                  <div class="col">
                    <a href="javascript:;" class="btn btn-danger ml-5" id="updateStock"><i class="icon icon-plus"></i>
                      Save</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <script>
    $('#product-datatable').DataTable();
    

        $('#updateStock').on('click', function(e){
          $.ajax({
                url:base_url+'/manage-stock',
                method:'POST',
                data:$('#frm-example').serialize(),
                success:function(data){
                  console.log(data);
                    if (data == '1') {
                        swal.fire({
                            'title': 'Stock Updated successfully',
                            'icon': 'success'
                        }).then(function() {
                            document.location.href = base_url+'/manage-stock';
                        });
                    } else {
                        swal.fire(data);
                    }
                }
            });
        });

    </script>
@endsection
