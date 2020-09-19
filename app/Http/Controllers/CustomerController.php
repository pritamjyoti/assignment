<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Customer;
use App\Product;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User as Authenticatable;
class CustomerController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
        {
          
            //$this->middleware('guest:font')->except('logout');
           
        }
        public function index(){
            return view('customer.index');
        }
        public function product(){
            $view =Product::where('status',1)->where('in_stock',1)->get();
            return view('customer.product',compact('view'));
        }
    public function login(Request $request)
    {
        if($_POST){
            $request->validate([
              
                'email' => ['required'],
                'password' => ['required'],
            ]);
            if (Auth::guard('font')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

                return redirect()->intended('/Customer');
            }
        }
        return view('c_auth.login');
    }
    public function register(Request $request){
        if($_POST){
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'confirmed'],
            ]);
            Customer::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            if (Auth::guard('font')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

                return redirect()->intended('/Customer');
            }
            
            
        }
        return view('c_auth.register');
    }

  

}
