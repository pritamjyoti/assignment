<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Order;
use Auth;
use App\Customer;
use App\Product;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Cart;
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

                return redirect('customer')->with('Success','Customer Login is Success');
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
    public function add_to_cart(Request $request){
       // dd($request->all());
       try {
        Cart::session(Auth::guard('font')->user()->id)->remove($request->pr_id);
      }catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
      }
       
        Cart::session(Auth::guard('font')->user()->id)->add(array(
            'id' => $request->pr_id,
            'name' => $request->pr_name,
            'price' => $request->pr_price,
            'quantity' => $request->quantity,
            
        ));
       
      return redirect()->back();

    }
    public function cart_list(){
        $view = \Cart::session(Auth::guard('font')->user()->id)->getContent();
       // dd($items);
        return view('customer.cart',compact('view'));
    }
    public function cart_delete($id){
       // echo $id; exit;
        Cart::session(Auth::guard('font')->user()->id)->remove($id);
        return redirect()->back();
    }
    public function order(){
        $view = \Cart::session(Auth::guard('font')->user()->id)->getContent();
        foreach($view as $key=>$row){
            $prs= Product::find($row->id);
            $quantity = $prs->quantity- $prs->orderd_quantity;
            if(($prs->in_stock == 1) && ($quantity >=$row->quantity )){

            $data['product_id']=$row->id;
            $data['user_id']=Auth::guard('font')->user()->id;
            $data['price']=$row->quantity * $row->price;
            $data['quantity']=$row->quantity;
            $data['status']=1;
            $data['order']= rand().$key;
            Order::create($data);
            $up_prod['orderd_quantity'] = $data['quantity'];
            if($quantity == $data['quantity']){
                $data['in_stock']=0;
            }
            Product::where('id',$row->id)->update($up_prod);

            }
            return redirect('order_list');
        }
       

    }
    public function order_list(){
        $view = Order::with('product')->where('user_id',Auth::guard('font')->user()->id)->get();
        return view('customer.order',compact('view')); 
    }


  

}
