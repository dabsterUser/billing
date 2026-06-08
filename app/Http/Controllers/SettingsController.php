<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\GstinPan;

use App\Models\Banks;
use App\Models\Customers;
use App\Models\GeneralSettings;
use App\Models\InvoiceOptions;
use App\Models\InvoiceSetting;
use App\Models\Organization;

use Auth;
use Exception;
use Validator;

class SettingsController extends Controller
{
    public function edit_invoice()
    {
        $id = Auth::id();
        $settings = InvoiceSetting::where('user_id',$id)->first();
        $banks = Banks::where('user_id',$id)->get();
        $customers = Customers::where('customers.user_id',$id)->get();
        // dd($banks);
        return view('setting.edit_invoice',compact('settings','banks','customers'));
    }

    public function update_invoice_setting(Request $request){


        try{
        $id = Auth::id();
        $settings = InvoiceSetting::where('user_id',$id)->first();
        // dd($request->all());
            if($settings){

            }else{
                $settings = new InvoiceSetting();
            }
            if($request->hasFile('logo_image')){
                $path = $request->file('logo_image')->store('invoice_setting');
                $settings->logo_image =  $path;
            }
            if($request->hasFile('signature_image')){
                $sign_path = $request->file('signature_image')->store('invoice_setting');
                $settings->signature_image = $sign_path;
            }
            if($request->hasFile('invoice_background_img')){
                $back_path = $request->file('invoice_background_img')->store('invoice_setting');
                $settings->invoice_background_img = $back_path;
            }
            if($request->hasFile('invoice_footer_img')){
                $footer_path = $request->file('invoice_footer_img')->store('invoice_setting');
                $settings->invoice_footer_img = $footer_path;
            }
            $settings->user_id = $id;
            $settings->enable_product_note = $request->enable_product_note ? $request->enable_product_note  : '0';
            $settings->enable_round_off = $request->enable_round_off ? $request->enable_round_off  : '0';
            $settings->enable_round_off_value = $request->enable_round_off_value ? $request->enable_round_off_value  : '0';
            $settings->allow_oversell = $request->allow_oversell ? $request->allow_oversell  : '0';
            $settings->default_product_note = $request->default_product_note ? $request->default_product_note  : '';
            $settings->default_payment_type = $request->default_payment_type ? $request->default_payment_type  : 'CREDIT';
            $settings->default_due_date = $request->default_due_date ? $request->default_due_date  : 15;
            $settings->enable_discount = $request->enable_discount ? $request->enable_discount  : '0';
            $settings->discount_in = $request->discount_in ? $request->discount_in  : 'percentage';
            $settings->disc_per_item = $request->disc_per_item ? $request->disc_per_item  : 0;
            $settings->always_show_discount_column = $request->always_show_discount_column ? $request->always_show_discount_column  : 0;
            $settings->quantity_decimal_value = $request->quantity_decimal_value ? $request->quantity_decimal_value  : 2;
            $settings->price_decimal_value = $request->price_decimal_value ? $request->price_decimal_value  : 2;
            $settings->taxable_decimal_value = $request->taxable_decimal_value ? $request->taxable_decimal_value  : 0;
            $settings->gst_rate_decimal_value = $request->gst_rate_decimal_value ? $request->gst_rate_decimal_value  : 0;
            $settings->gst_decimal_value = $request->gst_decimal_value ? $request->gst_decimal_value  : 0;
            $settings->enable_signature_img = $request->enable_signature_img ? $request->enable_signature_img  : 0;
            $settings->other_tax_label_op = $request->other_tax_label_op ? $request->other_tax_label_op  : 'TCS';
            $settings->total_discount_label_op = $request->total_discount_label_op ? $request->total_discount_label_op  : 'Discount';
            $settings->invoice_title = $request->invoice_title ? $request->invoice_title  : 'TAX INVOICE';
            $settings->invoice_prefix = $request->invoice_prefix ? $request->invoice_prefix  : '';
            $settings->invoice_postfix = $request->invoice_postfix ? $request->invoice_postfix  : '';
            $settings->diffrent_invoice_series_for_export = $request->diffrent_invoice_series_for_export ? $request->diffrent_invoice_series_for_export  : 0;
            $settings->export_prefix = $request->export_prefix ? $request->export_prefix  : '';
            $settings->export_postfix = $request->export_postfix ? $request->export_postfix  : '';
            $settings->enable_challan = $request->enable_challan ? $request->enable_challan  : 0;
            $settings->challan_no_lable = $request->challan_no_lable ? $request->challan_no_lable  : 'Challan No.';
            $settings->enable_challan_date = $request->enable_challan_date ? $request->enable_challan_date  : 0;
            $settings->challan_date_lable = $request->challan_date_lable ? $request->challan_date_lable  : 'Challan Date';
            $settings->ewaybill_no_lable = $request->ewaybill_no_lable ? $request->ewaybill_no_lable  : 'E-Way No.';
            $settings->original_copy_name = $request->original_copy_name ? $request->original_copy_name  : 'ORIGINAL FOR RECIPIENT';
            $settings->duplicate_copy_name = $request->duplicate_copy_name ? $request->duplicate_copy_name  : 'DUPLICATE COPY';

            $settings->office_copy_name = $request->office_copy_name ? $request->office_copy_name  : 'TRIPLICATE FOR SUPPLIER';
            $settings->transport_copy_name = $request->transport_copy_name ? $request->transport_copy_name  : 'DUPLICATE FOR TRANSPORTER';
            $settings->term_title = $request->term_title ? $request->term_title  : 'Terms and Conditions';
            $settings->banktc = $request->banktc ? $request->banktc  : 'Subject to our home Jurisdiction.Our Responsibility Ceases as soon as goods leaves our Premises.Goods once sold will not taken back.Delivery Ex-Premises.';
            $settings->sales_invoice_default_sort = $request->sales_invoice_default_sort ? $request->sales_invoice_default_sort  : 'id';
            $settings->default_invoice_type = $request->default_invoice_type ? $request->default_invoice_type   : 'TaxInvoice';
            $settings->default_customer = $request->default_customer ? $request->default_customer  : 0;
            $settings->save();

            if($request->has('bank_name')){
                $banks = $request->bank_name;
                Banks::where('user_id',$id)->delete();
                foreach($banks as $key => $bank){
                    if($bank){
                        $bank = new Banks();
                        $bank->user_id = $id;
                        $bank->bank_name = $request->bank_name[$key] ? $request->bank_name[$key] : '';
                        $bank->ifsc_code = $request->ifsc_code[$key] ? $request->ifsc_code[$key] : '';
                        $bank->swift_code = $request->swift_code[$key] ? $request->swift_code[$key] :'';
                        $bank->account_no = $request->account_no[$key] ? $request->account_no[$key] : '';
                        $bank->branch_name = $request->branch_name[$key] ? $request->branch_name[$key] : '';
                        $bank->save();
                    }
                }
            }
            $notification = array('message' => 'Settings Saved Successfully');
            return redirect()->back()->with($notification)->withinput();
        }catch(Exception $e){
            $notification = array('type' => 'warning','message' => $e->getMessage());
            // dd($e);
            return redirect()->back()->with($notification)->withinput();
        }


    }

    public function member_detail(){
        $user = Auth::user();
        return view('setting.member_detail',compact('user'));
    }

    public function organisation_detail(){
        $user_id = Auth::id();
        $user = Auth::user();
        $organization = Organization::select('organizations.*','states.name as state_name','states.state_code')->join('states','states.id','=','organizations.state_id')->where('user_id','=',$user_id)->orderBy('id','desc')->first();
        // dd($organization);
        $banks = Banks::where('user_id',$user_id)->get();
        return view('setting.business_detail',compact('user','organization','banks'));
    }

    public function update_organisation(Request $request){
        // dd($request->all());
        $rules = array(
            'name' => 'required',
            'type' => 'required|not_in:0',
            'gstin' => ['required',new GstinPan('gstin')],
            "pan_number" => ['nullable',new GstinPan('pan')],
            'address1' => 'required',
            'city' => 'nullable',
            'pincode' => 'required|digits:6',
        );

        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {
            $organization_id = $request->id;
            $organization = Organization::find($organization_id);
            $organization->name = $request->name;
            $organization->type = $request->type;
            $organization->gstin = $request->gstin;
            $organization->update_all = $request->update_all ? $request->update_all :0 ;
            $organization->address1 = $request->address1;
            $organization->address2 = $request->address2;
            $organization->pan_number = $request->pan_number != null ?$request->pan_number:'';
            $organization->email = $request->email != null ?$request->email:'';
            $organization->phone = $request->phone != null ?$request->phone:'';
            $organization->city = '';
            $organization->pincode = $request->pincode;

            // if($request->hasFile('logo_image')){
            //     $path = $request->file('logo_image')->store('public');
            //     $file_name = str_replace('public/','',$path);
            //     $organization->logo_image = $file_name;
            // }

            if ($files = $request->file('logo_image')) {
                $name = $files->getClientOriginalName();
                $files->move('public/org_logos', $name);
                $organization->logo_image = $name;
            }

            $organization->website = $request->website;
            $organization->save();
            if($request->has('bank_name')){
                $user_id = Auth::id();
                $banks = $request->bank_name;
                Banks::where('user_id',$user_id)->delete();

                $bank = new Banks();
                $bank->user_id = $user_id;
                $bank->bank_name = $request->bank_name ? $request->bank_name : '';
                $bank->ifsc_code = $request->ifsc_code ? $request->ifsc_code : '';
                $bank->swift_code = $request->swift_code ? $request->swift_code :'';
                $bank->account_no = $request->account_no ? $request->account_no : '';
                $bank->branch_name = $request->branch_name ? $request->branch_name : '';
                $bank->account_name = $request->account_name ? $request->account_name : '';
                $bank->upi_id = $request->upi_id ? $request->upi_id : '';
                $bank->save();

            }

            $notification = array(
                'message' => 'Business Updated Successfully',
            );
            return redirect('business-detail')->with($notification);
        }else{
            $message = $validator->messages()->first();
            $notification = array(
                'message' => $message,
                'type' => 'error'
            );
            return redirect()->back()->with($notification)->withinput();
        }
    }

    public function invoice_setting(){
        $id = Auth::id();
        $general_settings = GeneralSettings::where('user_id',$id)->get()->first();
        $invoice_option = InvoiceOptions::where('user_id',$id)->get();
        return view('setting.invoice_setting',compact('general_settings','invoice_option'));
    }

    public function save_invoice_setting(Request $request){
        try{
            $rules = array(
                'enable_round' => 'required',
                'due_date' => 'required',
                'challan_date_no' => 'required',
                'e_way_no' => 'required',
                'transport' => 'required',
                'discount_box' => 'required',
                'pan_no' => 'required',
                'show_price_last' => 'required',
                'allow_oversell' => 'required',
                'default_first_page' => 'required',
            );
            $validator = Validator::make($request->all(), $rules);
            if (!$validator->fails()) {
                $user_id = Auth::id();
                $general_settings = GeneralSettings::where('user_id',$user_id)->get()->first();
                $general_settings->enable_round = $request->enable_round;
                $general_settings->due_date = $request->due_date;
                $general_settings->challan_date_no = $request->challan_date_no;
                $general_settings->e_way_no = $request->e_way_no;
                $general_settings->transport = $request->transport;
                $general_settings->discount_box = $request->discount_box;
                $general_settings->pan_no = $request->pan_no;
                $general_settings->show_price_last = $request->show_price_last;
                $general_settings->allow_oversell = $request->allow_oversell;
                $general_settings->default_first_page = $request->default_first_page;
                if($general_settings->save()){
                    foreach($request->id as $key => $value){
                        $invoice_option = InvoiceOptions::find($value);
                        $invoice_option->po_no = $request->po_no[$key];
                        $invoice_option->lr_no = $request->lr_no[$key];
                        $invoice_option->invoice_no_prefix = $request->invoice_no_prefix[$key];
                        $invoice_option->invoice_no_postfix = $request->invoice_no_postfix[$key];
                        $invoice_option->term_condition_title = $request->term_condition_title[$key];
                        $invoice_option->term_condition = $request->term_condition[$key];
                        $invoice_option->save();
                    }
                    $notification = array(
                        'message' => 'Settings Updated Successfully',
                        'type' => 'success'
                    );
                    return redirect()->back()->with($notification)->withinput();
                }else{
                    $notification = array(
                        'message' => 'Internal Server Error',
                        'type' => 'error'
                    );
                    return redirect()->back()->with($notification)->withinput();
                }
            }else{
                $message = $validator->messages()->first();
                $notification = array(
                    'message' => $message,
                    'type' => 'error'
                );
                return redirect()->back()->with($notification)->withinput();
            }
        }catch(Exception $e){
            $notification = array('type' => 'warning','message' => $e->getMessage());
            // dd($e);
            return redirect()->back()->with($notification)->withinput();
        }

    }
}
