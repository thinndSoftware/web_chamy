<?php
namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Order;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Cart;
class CheckoutController extends Controller
{
    /**
     * Class constructor.
     */
    private $checkout;
    private $order;
    public function __construct(Checkout $checkout, Order $order)
    {
        $this->checkout = $checkout;
        $this->order = $order;
    }
    public function login_checkout()
    {
        if (Auth::check()) {
           return view('client.list.checkout');
        }
        return redirect()->route('login');
    }
    public function save_checkout_customer(Request $request)
    {
        //insert shipping table
        $checkoutInsert = $this->checkout->create([
            'shipping_name'=> $request->name,
            'shipping_address'=>
            $request->address_detail.'Xã, Phường: '. $request->address_wards.'Tỉnh, Thành Phố: '.$request->address_city,
            'shipping_phone'=>$request->phone,
            'shipping_email'=>$request->email,
            'shipping_description'=>$request->description
        ]);

        $shipping_id = $checkoutInsert->id;
        $request->session()->put('shipping_id', $shipping_id);

        // insert oreder table

        $orderInssert = $this->order->create([
            'user_id' => Auth::user()->id,
            'shipping_id'=> $shipping_id,
            'order_total'=> Cart::subtotal(),
            'order_status'=> 'Đơn hàng đang chờ'
        ]);
        foreach ($contents as $content) {

            $dataOrderDetail['order_id'] = $orderInssert->id;
            $dataOrderDetail['product_id'] = Cart::content();
            $dataOrderDetail['product_name'] = $orderInssert->id;
            $dataOrderDetail['product_discount'] = $orderInssert->id;
            $dataOrderDetail['product_qty'] = $orderInssert->id;
        }

        $orderDetailInssert = DB::tables('order_details')->
    }
}
