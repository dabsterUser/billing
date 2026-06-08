<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Address;
use App\Models\Customers;
use App\Models\Invoice;
use App\Models\PaymentReceipt;
use App\Models\Products;
use App\Rules\BankValidation;
use App\Rules\GstinPan;
use App\Rules\Licensenumber;
use App\Rules\Vehiclenumber;
use App\Models\Transport;

use Auth;
use Exception;
use Validator;



class AjaxController extends Controller
{

    public function customers(Request $request){
        try{
            $user = Auth::user();
            $type = 'customer';

            $customer = Customers::select('customers.*','addresses.*','customers.id as id','customers.user_id as user_id','addresses.id as address_id')->where('customers.user_id',$user->id);

            if($request->id){
                $customer = $customer->where('customers.id',$request->id);
            }
            $customer = $customer->leftjoin('addresses','addresses.customer_id','=','customers.id');
            $customer = $customer;
            if($customer->count()>0){
                $customer = $customer->get();
                $status = 1;
                $message = "Customer get successfully";
            }else{
                $status = 0;
                $customer = [];
                $message = "Customer not found";
            }
            $response = array(
                'status' => $status,
                'data' => $customer,
                'message' => $message
            );


        }catch(Exception $e){
            $response = array('status' => '0','message' => $e);
        }

        return response()->json($response);
    }

    public function get_invoice_number(Request $request){
        try{
            $user = Auth::user();

            $type =  'sale';
            $invoice = Invoice::where('user_id',$user->id);
            if($request->type){
                $type = $request->type;
            }
            $invoice = $invoice->where('type',$type);
            $invoice = $invoice->latest()->first();

            $response = array(
                'status' => '1',
                'data' => $invoice
            );
        }catch(Exception $e){
            $response = array('status' => '0','message' => $e);
        }
        return response()->json($response);
    }

    public function transports(Request $request){
        try{
            $user = Auth::user();

            $type =  'sale';
            $transport = Transport::where('user_id',$user->id);
            if($request->id){
                $transport = $transport->where('id',$request->id);
            }
            $transport = $transport->get();

            $response = array(
                'status' => '1',
                'data' => $transport
            );
        }catch(Exception $e){
            $response = array('status' => '0','message' => $e);
        }
        return response()->json($response);
    }

    public function get_product(Request $request){
        try{
            $user = Auth::user();

            $product = Products::where('user_id',$user->id)->where('is_visible_all',1);
            if($request->id){
                $product = $product->where('id',$request->id);
            }
            $product = $product;
            if($product->count()>0){
                $product = $product->get();
                $response = array(
                    'status' => '1',
                    'data' => $product,
                    'message' => 'Product detail'
                );
            }else{
                $response = array(
                    'status' => '0',
                    'data' => [],
                    'message' => 'Product detail'
                );
            }


        }catch(Exception $e){
            $response = array('status' => '0','message' => $e);
        }
        return response()->json($response);

    }

    public function get_receipt_number(Request $request){
        // dd($request->all());
        try{
            $user = Auth::user();
            $type = 'sale';
            $invoice = PaymentReceipt::where('user_id',$user->id);
            if($request->type){
                $type = $request->type;
            }
            $invoice = $invoice->where('type',$type);
            $invoice = $invoice->latest()->first();

            $response = array(
                'status' => '1',
                'data' => $invoice
            );
        }catch(Exception $e){
            $response = array('status' => '0','message' => $e);
        }
        return response()->json($response);
    }

    public function get_invoice_list(Request $request){
        // dd($request->all());
        try{
            $user = Auth::user();
            $type = 'sale';
            $customer_id = $request->id;
            $invoice = Invoice::select('id','invoice_number')->selectRaw('grand_total - payment_received as payment')->where('user_id',$user->id)->where('customer_vendor_id',$customer_id);
            if($request->type){
                $type = $request->type;
            }
            // echo $type;
            $invoice = $invoice->where('type',$type);
            $invoice = $invoice->get();

            $response = array(
                'status' => '1',
                'data' => $invoice
            );
        }catch(Exception $e){
            $response = array('status' => '0','message' => $e);
        }
        return response()->json($response);
    }

    public function create_customer(Request $request){
        if ($request->method() == "POST") {
            try{
                $rules = array(
                    "name" => "required",
                    "state_id" => 'required',
                    "registration_type" => "required",
                    "type" => "required",
                    "pan" => ['nullable',new GstinPan('pan')],
                    "gstin" => ['nullable',new GstinPan('gstin')],
                    "shipping_pan" => ['nullable',new GstinPan('pan')],
                    "shipping_gstin" => ['nullable',new GstinPan('gstin')],
                    "pincode" => ['required','numeric']
                );
                $validator = Validator::make($request->all(), $rules);
                if (!$validator->fails()) {
                    // dd($request->all());
                    $customer = new Customers();
                    $customer->name = $request->name;
                    $customer->user_id = Auth::user()->id;

                    $customer->phone = $request->phone != null ? $request->phone : '';
                    $customer->address1 = $request->address1 != null ? $request->address1 : '';

                    $customer->pincode = $request->pincode != null ? $request->pincode : '';
                    $customer->state_id = $request->state_id ;
                    $customer->country_code = '+91';

                    $customer->type = $request->type != null ? $request->type : '';

                    $customer->registration_type = $request->registration_type != null ? $request->registration_type : '';
                    $customer->gstin = $request->gstin != null ? $request->gstin : '';
                    $customer->pan = $request->pan != null ? $request->pan : '';
                    $customer->same_shipping = $request->same_shipping == 1 ? 'on' : 'off';

                    if($customer->save()){

                        $customer_id = $customer->id;
                        $customer_id = $customer->id;
                        if( $request->same_shipping){
                            $address = new address();
                            $address->customer_id = $customer_id;
                            $address->shipping_name = $request->name ?$request->name :'';
                            $address->shipping_phone = $request->phone ? $request->phone:'';
                            $address->shipping_country_code = '+91';
                            $address->shipping_address = $request->address1? $request->address1 :'';
                            $address->shipping_state_id = $request->state_id ? $request->state_id :'';
                            $address->shipping_pan = $request->pan ? $request->pan :'';
                            $address->shipping_gstin = $request->gstin ? $request->gstin:'';
                            $address->save();
                        }else{
                            $address = new address();
                            $address->customer_id = $customer_id;
                            $address->shipping_name = $request->shipping_name ?$request->shipping_name :'';
                            $address->shipping_phone = $request->shipping_phone ? $request->shipping_phone:'';
                            $address->shipping_country_code = '+91';
                            $address->shipping_address = $request->shipping_address? $request->shipping_address :'';
                            $address->shipping_state_id = $request->shipping_state_id ? $request->shipping_state_id :'';
                            $address->shipping_pan = $request->shipping_pan ? $request->shipping_pan :'';
                            $address->shipping_gstin = $request->shipping_gstin ? $request->shipping_gstin:'';
                            $address->save();
                        }
                        $response = array('status' => '1','message' => $customer->type.' Added Successfully',
                        'type' => 'success','data'=>$customer);

                    }else{
                        $response = array('status' => '0','message' => 'Internal Server Error!!',
                        'type' => 'warning');
                    }

                }else{
                    $error = $validator->errors()->first();
                    $response = array('status' => '0','message' => $error,'type' => 'warning');
                }
            }catch(Exception $e){
                $response = array('status' => '0','message' => $e,'type' => 'warning');
            }

            return response()->json($response);
        }
    }

    public function create_transport(Request $request){
        if ($request->method() == "POST") {
            try{
                $rules = array(
                    "trans_name" => "required",
                    "trans_vehicle_no" => ['nullable',new Vehiclenumber],
                );
                $validator = Validator::make($request->all(), $rules);
                if (!$validator->fails()) {
                    $transport = new Transport();
                    $transport->name = $request->trans_name;
                    $transport->user_id = Auth::user()->id;
                    $transport->transport_id = $request->trans_transport_id != null ? $request->trans_transport_id:'';
                    $transport->vehicle_no = $request->trans_vehicle_no != null ? $request->trans_vehicle_no :'';
                    $transport->save();

                    $response = array('status' => '1','message' => 'Transport Added Successfully',
                        'type' => 'success','data'=>$transport);
                    // return redirect('transports')->with($notification);
                }else{
                    $error = $validator->errors()->first();
                    $response = array('status' => '0','message' => $error,'type' => 'warning');
                }
            }catch(Exception $e){
                $response = array('status' => '0','message' => $e,'type' => 'warning');
            }
            return response()->json($response);
        }
    }

    public function create_product(Request $request){
        // dd($request->all());
        if ($request->method() == "POST") {
            try{
                $rules = array(
                    "name" => "required",
                    "product_type" => "required",
                    "sell_price" => "required",
                );
                $validator = Validator::make($request->all(), $rules);
                if (!$validator->fails()) {
                        // dd($request->all());
                    $product = new Products();
                    $product->name = $request->name;
                    $product->user_id = Auth::user()->id;
                    $product->product_type = $request->product_type != null ?$request->product_type :'';
                    $product->hsn_code = $request->hsn_code != null ?$request->hsn_code :'';
                    $product->description = '';
                    $product->item_code = $request->item_code != null ?$request->item_code :'';
                    $product->unit = $request->unit != null ?$request->unit :'';
                    $product->category = $request->category != null ?$request->category :'taxable';
                    $product->gst_rate = $request->gst_rate != null ?$request->gst_rate :'zero';

                    $product->sell_price = $request->sell_price_original != null ?$request->sell_price_original :0;
                    $product->sell_price_with_tax = $request->sell_price_tax != null ?$request->sell_price_tax :0;
                    $product->purchase_price = $request->purchase_price_original != null ?$request->purchase_price_original :0;
                    $product->purchase_price_with_tax = $request->purchase_price_tax != null ?$request->purchase_price_tax :0;

                    $product->is_visible_all = $request->is_visible_all != null ?$request->is_visible_all : 1;

                    if($request->is_service_product){
                        $product->stock = 0;
                    }else{
                        $product->stock = $request->stock != null ? $request->stock :0;
                    }

                    $product->save();
                    $notification = array(
                        'message' => 'Product Added Successfully',
                    );

                    $response = ['status' => 1,'message' => 'Product Added Successfully','data'=>$product];
                    // return redirect('products')->with($notification);
                    // return response()->json($response);
                }else{
                    $error = $validator->errors()->first();
                    $response = array('status' => '0','message' => $error,'type' => 'error');
                    // return redirect()->back()->withErrors($validator->errors());
                }
            }catch(Exception $e){
                $response = array('status' => '0','message' => $e,'type' => 'warning');
            }
            return response()->json($response);
        }
    }
}
