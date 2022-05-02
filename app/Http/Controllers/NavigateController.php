<?php

namespace App\Http\Controllers;

use App\Charts\ItemsChart;
use App\Models\Inventory;
use App\Models\InventoryAssignment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NavigateController extends Controller
{
    public function add_item(Request $request){
        $item = $request->validate([
            'product_name'=> 'required',
            'item_number'=> 'required',
            'delivered_by'=> 'required',
            'category'=> 'required',
            'condition'=> 'required',
            'date_delivered'=> 'required|date',
            'expiry_date'=> 'required|date',
            'product_desc'=> 'required',
            'quantity'=> 'required|numeric',
        ]);

       $item = new Inventory;
       $item->product_name = $request->product_name;
       $item->item_number = $request->item_number;
       $item->product_desc = $request->product_desc;
       $item->condition = $request->condition;
       $item->category = $request->category;
       $item->delivered_by = $request->delivered_by;
       $item->quantity = $request->quantity;
       $item->date_delivered = $request->date_delivered;
       $item->expiry_date = $request->expiry_date;
       $item->remaining_quantity = $request->quantity;
       $item->save();

        return back();
    }

    public function dashboard(ItemsChart $chart){
        $items = Inventory::latest()->where('remaining_quantity','!=',0)->take(4)->get();

        return view('dashboard',['items' => $items,'chart' => $chart->build()]);
    }
    public function inventory(){
        $items = Inventory::latest()->where('remaining_quantity','!=',0)->paginate(15);

        return view('inventory',['items' => $items]);
    }
    public function finished(){
        $items = Inventory::latest()->where('remaining_quantity',0)->take(10)->get();

        return view('finished-items',['items' => $items]);
    }

    public function assign_item(Request $request){
       $assign = $request->validate([
            'item_id' => 'required',
            'issued_by' => 'required',
            'assigned_to' => 'required',
            'issue_to' => 'required',
            'number_of_item' => 'required'
        ]);

        InventoryAssignment::create($assign);
        $item = Inventory::find($request->item_id);
        $item->remaining_quantity = $item->remaining_quantity - $request->number_of_item;
        $item->save();
        return back();
    }

    public function item_details($id){
        $item = Inventory::find($id);
        $assigns = InventoryAssignment::where('item_id',$item->id)->get();
        // dd($assigns);

        return view('item-history',['item' => $item,'assigns' => $assigns]);
    }

    public function history(){
        $items = InventoryAssignment::paginate(20);

        return view('history',['items' => $items]);
    }

    public function report(){
        return view('report');
    }

    public function generate_report(Request $request){
        $request->validate([
            'type' => 'required',
            'from' => 'required|date',
            'to' => 'required|date'
        ]);
        if ($request->type == 'assignment') {
            $items = InventoryAssignment::whereBetween('created_at',[$request->from,$request->to])->orWhereBetween('created_at',[$request->to,$request->from])->get();
            return view('history-report',['items' => $items]);
        }else{
            $items = Inventory::whereBetween('created_at',[$request->from,$request->to])->orWhereBetween('created_at',[$request->to,$request->from])->get();
            return view('inventory-report',['items' => $items]);
        }

    }

    public function all_users(){
        $users = User::get();
        return view('all-user',['users'=> $users]);
    }
    
    public function add_user(Request $request){
        $request->validate([
            'name' =>'required',
            'email' => 'required|email',
            'is_admin' => 'required|boolean',
            'password' => 'required|confirmed'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;
        $user->password = Hash::make($request->is_admin);
        $user->save();

        return back();
    }


    public function reset_password($id){
        $user = User::find($id);
        $user->password = Hash::make('password1');
        $user->save();

        return back()->with('msg','Password has been set to default ' . '"password1"');
    }

    public function delete_user($id){
        $user = User::find($id);
        $user->delete();

        return back()->with('msg','User has been deleted');
    }

    public function change_password(){
        return view('change-password');
    }

    public function change_pwd(Request $request){
        $this->validate($request,[
            'old_password' =>'required',
            'password' =>'required|confirmed',
        ]);
        $user = User::find(auth()->user()->id);
        if(Hash::check($request->old_password, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
            auth()->logout();
            return redirect('/login');
        }else{
            return back()->with('msg','Old Password Incorrect');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }
}
