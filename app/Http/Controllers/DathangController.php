<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Bill;
use App\Cart;
use App\BillDetail;
use Session;
use Carbon\Carbon;
use Mail;

class DathangController extends Controller
{
    public function getDathang(){
        return view('pages.dathang');
    }
    public function postDathang(Request $request){
        $data = $request->all();
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer -> name = $request -> name;
        $customer -> gender = $request -> gender;
        $customer -> email = $request -> email;
        $customer -> address = $request -> address;
        $customer -> phone_number = $request -> phone;
        $customer -> note = $request -> notes;
        $customer -> save();

        $bill = new Bill;
        $bill ->id_customer = $customer->id;
        $bill ->date_order = date('Y-m-d');
        $bill ->total = $cart->totalPrice;
        $bill ->payment = $request->payment_method;
        $bill ->note = $request -> notes;
        $bill->save();


        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail -> id_bill = $bill->id;
            $bill_detail -> id_product = $key;
            $bill_detail -> quantity = $value['qty'];
            $bill_detail -> unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();

        }

        //send mail
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        $title = "Đơn hàng xác nhận ngày ". ' '.$now;
        $customer = Customer::find(Session::get('id'));
        $data['email'] = $request->get('email');
        $data['name'] = $request->get('name');

        $bodys = array("name"=>$data['name']); //body of mail.blade.php

        Mail::send('pages.mail_order', $bodys, function ($message) use ($title, $data) {
            $message->from($data['email'], 'UTT SHOP')->subject($title);
            $message->to($data['email'], $title);
        });




        Session::forget('cart');
        return redirect()->back()->with('ThongBao', 'Đặt hàng thành công');

        //Send mail



    }
}
