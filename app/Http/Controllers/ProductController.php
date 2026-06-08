<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customers;
use App\Models\GstRate;
use App\Models\Products;
use App\Models\Units;

use Validator;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
        // dd("hello");
        $user_id = Auth::user()->id;
        $units = Units::all();
        $gstrate = GstRate::all();
        $products = Products::where('user_id', '=', $user_id)->orderBy('id', 'desc');

        $product_count = $products->count();
        $products = $products->get();
        return view('product.index', compact('units', 'products', 'gstrate', 'product_count'));
    }

    public function create()
    {
        //
        $units = Units::all();
        return view('product.create')->with('units', $units);
    }

    public function store(Request $request)
    {
        //
        if ($request->method() == "POST") {
            // dd($request->all());
            $rules = array(
                "name" => "required",
                "product_type" => "required",
                "sell_price" => "required"
            );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
                // dd($request->all());





                $product = new Products();
                $product->name = $request->name;
                $product->user_id = Auth::user()->id;
                $product->product_type = $request->product_type != null ? $request->product_type : '';
                $product->hsn_code = $request->hsn_code != null ? $request->hsn_code : '';
                $product->description = '';
                $product->item_code = $request->item_code != null ? $request->item_code : '';
                $product->unit = $request->unit != null ? $request->unit : '';
                $product->category = $request->category != null ? $request->category : 'taxable';
                $product->gst_rate = $request->gst_rate != null ? $request->gst_rate : 'zero';

                $product->sell_price = $request->sell_price_original != null ? $request->sell_price_original : 0;
                $product->sell_price_with_tax = $request->sell_price_tax != null ? $request->sell_price_tax : 0;
                $product->purchase_price = $request->purchase_price_original != null ? $request->purchase_price_original : 0;
                $product->purchase_price_with_tax = $request->purchase_price_tax != null ? $request->purchase_price_tax : 0;

                $product->is_visible_all = $request->is_visible_all != null ? $request->is_visible_all : 1;

                if ($request->is_service_product) {
                    $product->stock = 0;
                } else {
                    $product->stock = $request->stock != null ? $request->stock : 0;
                }


                if ($files = $request->file('product_image')) {
                    $name = $files->getClientOriginalName();
                    $files->move('images', $name);
                    $product->product_image = $name;
                }

                $product->save();
                $notification = array(
                    'message' => 'Product Added Successfully',
                );
                return redirect('products')->with($notification);
            } else {
                return redirect()->back()->withErrors($validator->errors());
            }
        }
    }

    public function edit($id)
    {

        $user_id = Auth::user()->id;
        $product = Products::where('user_id', '=', $user_id)->where('id', '=', $id)->get()->first();
        // dd($product->all());
        $units = Units::all();
        return view('product.edit')->with(array('product' => $product, 'units' => $units));

    }

    public function update(Request $request, $id)
    {
        $rules = array(
            "name" => "required",
            "product_type" => "required",
            "sell_price" => "required"
        );
        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
            $product_id = $request->product_id;
            $product = Products::find($product_id);
            $product->name = $request->name;
            $product->product_type = $request->product_type != null ? $request->product_type : '';
            $product->hsn_code = $request->hsn_code != null ? $request->hsn_code : '';
            $product->description = '';
            $product->item_code = $request->item_code != null ? $request->item_code : '';
            $product->unit = $request->unit != null ? $request->unit : '';
            $product->category = $request->category != null ? $request->category : 'taxable';
            $product->gst_rate = $request->gst_rate != null ? $request->gst_rate : 'zero';

            $product->sell_price = $request->sell_price_original != null ? $request->sell_price_original : 0;
            $product->sell_price_with_tax = $request->sell_price_tax != null ? $request->sell_price_tax : 0;
            $product->purchase_price = $request->purchase_price_original != null ? $request->purchase_price_original : 0;
            $product->purchase_price_with_tax = $request->purchase_price_tax != null ? $request->purchase_price_tax : 0;

            $product->is_visible_all = $request->is_visible_all != null ? $request->is_visible_all : 1;

            if ($request->is_service_product) {
                $product->stock = 0;
            } else {
                $product->stock = $request->stock != null ? $request->stock : 0;
            }

            if ($files = $request->file('product_image')) {
                $name = $files->getClientOriginalName();
                $files->move('images', $name);
                $product->product_image = $name;
            }
            $notification = array(
                'message' => $request->file('product_image'),
                'type' => 'warning',
                'status' => 1
            );

            $product->update();
            // return response()->json($notification);

            // die;

            return redirect()->back()->with('success', 'Product Details Updated Successfully');

            // if ($product->save()) {
            //     $notification = array(
            //         'message' => 'Product Updated Successfully',
            //         'type' => 'warning',
            //         'status' => 1
            //     );
            //     return response()->json($notification);
            // } else {
            //     $notification = array(
            //         'message' => 'Internal Server Error!!',
            //         'type' => 'warning',
            //         'status' => 0
            //     );
            //     return response()->json($notification);
            // }

        } else {
            $notification = array(
                'message' => $validator->errors(),
                'type' => 'warning',
                'status' => 0
            );
            return response()->json($notification);
        }
    }

    public function multidelete(Request $request)
    {
        if ($request->method() == "POST") {
            $rules = array(
                "product_id" => "required"
            );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
                $products = $request->product_id;
                $user_id = Auth::user()->id;
                foreach ($products as $product) {
                    Products::where('id', $product)->where('user_id', $user_id)->delete();
                }
                return 1;
                // Comment::where('post_id',$id)->delete();



            } else {
                echo $validator->errors()->first();
                die;
                // return "0";
                // return redirect()->back()->withErrors($validator->errors());
            }
        }
    }

    public function stocks()
    {
        $user_id = Auth::user()->id;
        $products = Products::where('user_id', '=', $user_id)->orderBy('id', 'desc')->get();
        // dd($products);
        return view('product.stock')->with('products', $products);
    }

    public function stock_update(Request $request)
    {
        if ($request->method() == "POST") {
            $rules = array(
                "product_id" => "required",
                "inventory_stock" => "required"
            );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
                $products = $request->product_id;
                $user_id = Auth::user()->id;

                foreach ($products as $key => $product_id) {
                    $product = Products::find($product_id);

                    if ($product->is_service_product == 0) {

                        $product->stock = $product->stock + $request->inventory_stock[$key];
                        $product->save();
                    }
                }
                return 1;
            } else {
                echo $validator->errors()->first();
                die;
            }
        }
    }

    public function changeproductStatus(Request $request, $id)
    {

        $product = Products::find($id);
        // $product->status = $request->status;
        $product->is_visible_all = $request->status;
        $product->save();
        return response()->json(['success' => 'Status change successfully.']);

    }

    public function stockUpdate(Request $request, $id)
    {

        $productStock = Products::find($id);

        $updatedStock = $productStock->stock + $request->updated_Stockquantity;

        $productStock->stock = $updatedStock;

        $productStock->update();

        return redirect()->back()->with('success', 'Stock is updated');

    }

}
