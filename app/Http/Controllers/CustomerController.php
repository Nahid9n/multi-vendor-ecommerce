<?php

namespace App\Http\Controllers;

use App\Models\BillingModel;
use App\Models\Chat;
use App\Models\Customer;
use App\Models\CustomerAuth;
use App\Models\CustomerWallet;
use App\Models\Message;
use App\Models\Order;
use App\Models\OrdersDetails;
use App\Models\ShippingsModel;
use App\Models\StartConversation;
use App\Models\Ticket;
use App\Models\TicketReply;
use App\Models\Wallet;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index(){

        if(auth()->user()->role != 'customer'){
            Toastr::error("Invalid");
            return redirect()->route('home');
        }

        return view('customer.home',[
            'billings'=> BillingModel::where('customer_id', auth()->user()->id)->first(),
            'shippings'=> ShippingsModel::where('customer_id', auth()->user()->id)->first(),
            'wallet'=> CustomerWallet::where('user_id', auth()->user()->id)->first(),

        ]);

    }
    public function wallet(){
        $wallet = CustomerWallet::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        $currect_balance = CustomerWallet::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first('balance');
        return view('customer.wallet.wallet', compact('wallet', 'currect_balance'));
    }
    public function walletOnlineRecharge(Request $request){

        try{

            $validate = Validator::make($request->all(),[
                'payment_type'  => 'required',
                'amount'        => 'required',
            ]);

            if($validate->fails()){
                Toastr::error("Failed to recharge the wallet");
                return redirect()->back();
            }
            $currect_balance = CustomerWallet::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first('balance');

            CustomerWallet::create([
                'payment_method'     =>$request->payment_type,
                'user_id'           => auth()->user()->id,
                'balance'           => $currect_balance->balance + (int)$request->amount,
            ]);

            Toastr::success("Wallet recharge successful");
            return redirect()->route('customer.wallet');

        }catch(Exception $e){
            Toastr::error($e);
            return redirect()->back();
        }

    }
    public function order(){
        $orders = Order::where('user_id', auth()->user()->id)->latest()->paginate(15);
        return view('customer.order.order', compact('orders'));
    }
    public function orderDetails($code){
        $order = Order::where('order_code',$code)->first();
        $orderDetails = OrdersDetails::where('order_id',$order->id)->get();
        return view('customer.order.order-details', compact('order','orderDetails'));
    }
    public function invoiceOrder($code){
        $order = Order::where('order_code',$code)->first();
        $orderDetails = OrdersDetails::where('order_id',$order->id)->get();
        return view('customer.invoice.invoice', compact('order','orderDetails'));
    }
    public function cancel(){
        $orders = Order::where('user_id', auth()->user()->id)->where('order_status', 2)->latest()->paginate(15);
        return view('customer.order.cancel', compact('orders'));
    }
    public function address(){
        $billings = BillingModel::where('customer_id', auth()->user()->id)->first();
        $shippings = ShippingsModel::where('customer_id', auth()->user()->id)->first();
        return view('customer.address.address', compact('billings', 'shippings'));
    }
    public function accountDetail(){
        $customer = Customer::where('user_id', auth()->user()->id)->first();
        return view('customer.account.accountDetail', compact('customer'));
    }
    public function customerChangePassword(){
        return view('customer.password.customerChangePassword');
    }
    public function customerSupportTicket(){
        $tickets = Ticket::where('sender_id',auth()->user()->id)->get();
        return view('customer.ticket.customerSupportTicket', compact('tickets'));
    }
    public function ticketView($id){
        $ticket = Ticket::where('ticket_id',$id)->first();
        $ticketReplys = TicketReply::where('ticket_id', $id)->get();
        return view('customer.ticket.customerSupportTicketView', compact('ticket', 'ticketReplys'));
    }
    public function customerConversations(){
        $conversation = StartConversation::with('user')->orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->get();
        return view('customer.conversation.customerConversations', compact('conversation'));
    }
    public function customerOrderFilter(Request $request){

        if($request->status == ''){
            return redirect()->route('customer.orders');
        }

        $currect_status = $request->status;
        if($request->status == 'pending'){
            $status = 0;
        }elseif($request->status == 'accepted'){
            $status = 2;
        }elseif($request->status == 'delivered'){
            $status = 3;
        }elseif($request->status == 'canceled'){
            $status = 1;
        }

        $orders = Order::where('user_id', auth()->user()->id)->where('order_status', $status)->latest()->get();
        return view('customer.orderFilter', compact('orders', 'currect_status'));
    }
    public function customerCreateMessage(Request $request){
        StartConversation::create([
            'seller_id' => $request->seller_id,
            'customer_id' => $request->custommer_id,
        ]);
        //return redirect()->route('phoneList.index');
    }
    public function CustomerMessagePost(Request $request){

        try{
            Chat::create([
                'conversation_id'     => $request->conversation_id,
                'message'             => $request->message,
                'sender_id'           => auth()->user()->id,
                'receiver_id'           => 0,
            ]);
            die("saved");
        }catch(Exception $e){
            return redirect()->back()->withErrors($e);
        }

    }
    public function converstationDataPost(Request $request){

        $con = StartConversation::create([
            'header' => $request->title,
            'user_id' => auth()->user()->id,
            'product_id' => $request->product_id,
            'seller_id' => $request->receiver_id,
        ]);


        if($con){
            Message::create([
                'conversation_id' => $con->id,
                'sender_id' => auth()->user()->id,
                'receiver_id' => $request->receiver_id,
                'message' => $request->message,
            ]);
        }

        Toastr::success("Message sent");
        return redirect()->back();
    }
    public function sendMessage(Request $request){

        Message::create([
            'conversation_id' => $request->conversation_id,
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        Toastr::success("Message sent");
        return redirect()->back();
    }
    public function converstationDetails($id){
        $conversation = Message::with('receiver')->where('conversation_id', $id)->get();
        $conversation_id = $id;
        return view('customer.conversation.conversations', compact('conversation', 'conversation_id'));
    }


}
