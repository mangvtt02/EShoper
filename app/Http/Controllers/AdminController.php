<?php

namespace App\Http\Controllers;
use App\customers;
use App\Order;
use App\Order_detail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use PDF;
class AdminController extends Controller
{
    public function index(){
        $order = Order::orderBy('id','DESC')->paginate(1000);
        return view('admin/order/ListOrder',compact('order'));
    }
    
    public function delete_order($id){
        Order::destroy($id);
        return redirect()->route('admin.home');
    }
    public function print_order($id){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->print_order_convert($id));
        return $pdf->stream();
    }
    public function print_order_convert($id){
        $order = Order::where('id',$id)->first();
        
        $output = '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>PDF</title>
        </head>
        <style>
        body{
            font-family: Dejavu Sans;
        }
        </style>
        <body>
       
            <h1 style = "color:red;"><center>Hoá đơn EShoper</center></h1>
            <h1><center>Hóa đơn</center></h1>
            <u>Mã đơn hàng: </u><b>'.$order->customers->id.'</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <u>Ngày tạo: </u><b>'.date_format($order->created_at,"d-m-Y").'</b><br>
            <u>Tên khách hàng: </u><b>'.$order->customers->name.'</b>

            <p>Thông tin sản phẩm đặt mua: </p>
           
                <table border="1" cellspacing="0" style="width:100%">
                <tr>
                    <th>Sản phẩm</th>
                    <th>Size</th>
                    <th>Màu</th>
                    <th>Số lượng</th>
                    <th>Giá bán</th>
                </tr>
                ';
               
                foreach ($order->order_detail as $or) {
                    $output .= '<tr>
                                    <td align = "center">'.$or->product->name.'</td>
                                    <td align = "center">'.$or->size->name.'</td>';
                    if ($or->topping != null) {
                        $output .= '<td align = "center">'.$or->topping->name.'</td>';
                    }
                    else{
                        $output .= '<td align = "center">null</td>';
                    }
                    $output .= '<td align = "center">'.$or->quantity.'</td>
                                <td align = "center">'.number_format($or->price).'đ</td>
                                </tr>';
                }
                $output .= '<tr>
                    <th colspan="4" align = "left">Phí ship </th>
                    <th colspan="1"><i>'.number_format(20000).'</i>đ</th>
                    </tr>
                    <tr>
                    <th colspan="4" align = "left">Tổng tiền </th>
                    <th colspan="1"><i>'.number_format($order->total).'</i>đ</th>
                </tr>
                
                </table>
                ';
        $output .= '<br><b>Ghi chú: </b><u>'.$order->note.'</u>';
        $output .= '</body>
        </html>';
        return $output;
    }
    public function confirm($id){
        $order = Order::find($id);
        if ($order->status == 0) {
            $order->status = 1;
        }
        $order->save();
        return redirect()->route('admin.home');
    }
    public function Admin_Login(){
        return view('admin/Login');
    }
    public function Admin_Logout(){
        Auth::logout();

        return redirect()->route('Admin_Login');
    }
    public function Post_Admin_Login(Request $request){

        $this->validate($request,[
           
            'email'=>'required',
            'password'=>'required',           
           
        ],[
            
            'email.required'=>'Bạn chưa nhập email!',
            'password.required'=>'Bạn chưa nhập mật khẩu!',
            
            
        ]);

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'token'=>1])){
            return redirect()->route('admin.home');
        }else{
            return redirect()->back()->with('error','Tài khoản hoặc mật khẩu không đúng');
        }
    }
    public function get_info(){
       
        return view('admin.account.User_Account');
    }
    public function post_info(Request $request){
        $this->validate($request,[
            'name'=>'required|min:5',
            'SDT'=>'numeric|min:10',   
            
        ],[
            'name.required'=>'Bạn chưa nhập tên!',
            'name.min'=>'Tên tối thiểu 5 ký tự!',
            'SDT.numeric'=>'Số điện thoại chỉ được nhập số!',
            'SDT.min'=>'Số điện thoại tối thiểu 10 số!',
            
        ]);
        
        $admin = User::find(Auth::id());
        $admin->name = $request->name;
        $admin->SDT = $request->SDT;
        $admin->address = $request->address;
        
        if($request->gender == 1){
            $admin->gender = "nam";
        }
        else{
            $admin->gender = "nữ";
        }
        $admin->save();
        
        return redirect("admin/Account/info")->with('success','Cập nhật thành công!');
    }
    public function change_passwd(){
        return view('admin.account.Change_Password');
    }
    public function post_change_passwd(Request $request){
        $user = Auth::user();
        $oldPassword = $request->old_password;
        $newPassword = $request->new_password;
    
        if (Hash::check($oldPassword, $user->password)) {
            $user_id = $user->id;
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($newPassword);
            $obj_user->save();
    
            return redirect("admin/Account/change_passwd")->with('success','Thay đổi mật khẩu thành công!');
        }
        else
        {
            return redirect("admin/Account/change_passwd")->with('error','Mật khẩu cũ không chính xác!');
        }
    }
    public function post_face(Request $request){
        $this->validate($request,[
            'image'=>'required',
        ],[
            'image.required'=>'Bạn chưa chọn ảnh đại diện!',
        ]);
        
        $admin = User::find(Auth::id());
      
        if($request->hasFile('image')){
            $file_img = $request->file('image');
            $name = $file_img->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("public/assets/images/user/".$image)){
                $image = Str::random(4)."_".$name;
            }
            if($admin->image == ''){
                $file_img->move("public/assets/images/user",$image);
            }
            else{
                if(file_exists("public/assets/images/user/".$admin->image)){
                    unlink("public/assets/images/user/".$admin->image);
                    $file_img->move("public/assets/images/user",$image);
                }
            }
            
            $admin->image = $image;

        }
        else{
            $admin->image = '';
        }
        
        
        
        $admin->save();
        
        return redirect("admin/Account/info")->with('success','Cập nhật thành công!');

    }
    
}
