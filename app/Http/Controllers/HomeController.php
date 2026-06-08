<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rules\PasswordValid;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Validator;
use DB;
use Carbon\Carbon;

use App\Models\Invoice;
use App\Models\Products;
use App\Models\Customers;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {

		$user 	= Auth::user();
		$user_id = Auth::user()->id;
		$now 	= Carbon::now();
		$totaluser = User::whereDate('created_at', '>', Carbon::now()->subDays(30))->count();
		$returningcustomer = User::select('users.*')->join('invoices','invoices.user_id','=','users.id')->count();
		
		$customers_data = Customers::select('customers.*', 'addresses.*', 'states.name as state_name', 'customers.id as id')->join('states', 'states.id', '=', 'customers.state_id')->leftjoin('addresses', 'addresses.customer_id', '=', 'customers.id')->where('customers.user_id', $user_id);
        $total_customer = $customers_data->count();


		// dd($total_customer);

		//$returningcustomer = Invoice::havingRaw('COUNT(user_id) > 1');
		//$returningcustomer = Invoice::all()->distinct()->count('user_id');
		//$votes = Invoice::where('user_id',28)->count();
		//$votes = Invoice::select(DB::raw('COUNT(id) as cnt', 'user_id'))->groupBy('user_id')->orderBy('cnt', 'DESC')->first();

		//$vals = array_count_values($returningcustomer);
		/* echo "<pre>";
		print_r($votes);
		die;  */

		$thismonthsale 	= Invoice::whereMonth('created_at',$now->month)->where('type','sale')->get();
		$totalcount 	= Invoice::whereMonth('created_at',$now->month)->where('type','sale')->count();
		$total_item_products 	= Products::all()->count();
		$total_item_instock 	= Products::where('stock', '<>', '')->count();
		$saleinvoice = Invoice::select('invoices.*','customers.name as customer_name')->join('customers','customers.id','=','invoices.customer_vendor_id')->where('invoices.user_id',$user->id)->where('invoices.type','sale')->where('invoices.status','!=','cancel')->orderBy('invoices.id','desc')->get();

		$purchaseinvoice = Invoice::select('invoices.*','customers.name as customer_name')->join('customers','customers.id','=','invoices.customer_vendor_id')->where('invoices.user_id',$user->id)->where('invoices.type','purchase')->where('invoices.status','!=','cancel')->orderBy('invoices.id','desc')->get();

		$invoicesByMonth = Invoice::select( DB::raw('MONTH(created_at) as month'),
							DB::raw('COUNT(*) as count') )
							->where('user_id',$user_id)
							->groupBy(DB::raw('MONTH(created_at)'))
							->get();

		// dd($invoicesByMonth);

		$janmonthprice 	  = Invoice::whereMonth('created_at','01')->get();
		$febmonthprice 	  = Invoice::whereMonth('created_at','02')->get();
		$marchmonthprice  = Invoice::whereMonth('created_at','03')->get();
		$aprilmonthprice  = Invoice::whereMonth('created_at','04')->get();
		$maymonthprice 	  = Invoice::whereMonth('created_at','05')->get();
		$junemonthprice   = Invoice::whereMonth('created_at','06')->get();
		$julymonthprice   = Invoice::whereMonth('created_at','07')->get();
		$augustmonthprice = Invoice::whereMonth('created_at','08')->get();
		$septmonthprice   = Invoice::whereMonth('created_at','09')->get();
		$octomonthprice   = Invoice::whereMonth('created_at','10')->get();
		$novermmonthprice = Invoice::whereMonth('created_at','11')->get();
		$decemmonthprice  = Invoice::whereMonth('created_at','12')->get();
		$janamount = 0;

		foreach($janmonthprice as $janmonthprices){
				$janamount = $janamount+$janmonthprices->grand_total;
		}
		$febamount = 0;
		foreach($febmonthprice as $febmonthprices){
				$febamount = $febamount+$febmonthprices->grand_total;
		}
		$marchamount = 0;
		foreach($marchmonthprice as $marchmonthprices){
				$marchamount = $marchamount+$marchmonthprices->grand_total;
		}
		$aprilamount = 0;
		foreach($aprilmonthprice as $aprilmonthprices){
				$aprilamount = $aprilamount+$aprilmonthprices->grand_total;
		}
		$mayamount = 0;
		foreach($maymonthprice as $maymonthprices){
				$mayamount = $mayamount+$maymonthprices->grand_total;
		}
		$juneamount = 0;
		foreach($junemonthprice as $junemonthprices){
				$juneamount = $juneamount+$junemonthprices->grand_total;
		}
		$julyamount = 0;
		foreach($julymonthprice as $julymonthprices){
				$julyamount = $julyamount+$julymonthprices->grand_total;
		}
		$augustamount = 0;
		foreach($augustmonthprice as $augustmonthprices){
				$augustamount = $augustamount+$augustmonthprices->grand_total;
		}
		$septamount = 0;
		foreach($septmonthprice as $septmonthprices){
				$septamount = $septamount+$septmonthprices->grand_total;
		}

		$octamount = 0;
		foreach($octomonthprice as $octomonthprices){
				$octamount = $octamount+$octomonthprices->grand_total;
		}

		$noveamount = 0;
		foreach($novermmonthprice as $novermmonthprices){
				$noveamount = $noveamount+$novermmonthprices->grand_total;
		}
		$decemamount = 0;
		foreach($decemmonthprice as $decemmonthprices){
				$decemamount = $decemamount+$decemmonthprices->grand_total;
		}

		return view('dashboard',compact('returningcustomer','totaluser','janamount','febamount','marchamount','aprilamount','mayamount','juneamount','julyamount','augustamount','septamount','octamount','noveamount','decemamount','thismonthsale','totalcount','total_item_products','total_item_instock','saleinvoice','purchaseinvoice','total_customer','invoicesByMonth'));
    }

    public function edit_user(){
        $user = Auth::user();
        return view('user.edit-profile')->with('user',$user);
    }

    public function save_profile(Request $request){
        // dd($request->all());
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        // dd($user);
        $rules = array(
            "name" => "required",
            "phone" => ["required",Rule::unique('users')->ignore($user->id)],
            "password" => ['nullable',new PasswordValid,'confirmed'],
        );

        $validator = Validator::make($request->all(), $rules);
        if (!$validator->fails()) {

            $user->name = $request->name;
            $user->phone = $request->phone;

            // if($request->password){
            //     $user->password = Hash::make($request->password);
            // }

            if($request->old_password && $request->password){
                // echo $old_password = Hash::make($request->old_password);
                $check_password = Hash::check($request->old_password,$user->password);
                // dd($check_password);
                if ($check_password) {
                    $user->password = Hash::make($request->password);
                }else{
                    $message ='Please Enter Correct Old Password';
                    $notification = array(
                        'message' => $message,
                        'type' => 'error'
                    );
                    return redirect()->back()->with($notification)->withinput();
                }
            }
            // die;
            $user->save();
            $notification = array(
                'message' => 'Profile Updated Successfully'
            );

            return redirect()->back()->with($notification);

        }else{

            $message = $validator->messages()->first();
            $notification = array(
                'message' => $message,
                'type' => 'error'
            );
            return redirect()->back()->with($notification)->withErrors($validator->errors());
        }
    }
}
