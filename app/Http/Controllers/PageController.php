<?php

namespace App\Http\Controllers;

use App\about_us;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Type_product;
use Mail;
use App\User;
use App\Banner;
use App\Blog;
use App\Comment_blog;
use App\Contact;
use App\Product;
use App\Cart;
use App\Comment;
use App\Size;
use App\Topping;
use Carbon\Carbon;
use App\customers;
use App\images;
use App\Order;
use App\Order_detail;
use App\our_team;
use Customer;
use Illuminate\Support\Str;


class PageController extends Controller
{

    public function get_info()
    {
        $user = User::find(Auth::guard('emp')->id());

        $email_customer = customers::where("email", $user->email)->first();
        // dd($email_customer->email);
        $order = Order::orderBy('id', 'DESC')->paginate(5);
        return view('page.account.User_Account', compact("order", "email_customer"));
    }
    public function post_info(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'SDT' => 'numeric|min:10',
        ], [
            'name.required' => 'Bạn chưa nhập tên!',
            'name.min' => 'Tên tối thiểu 5 ký tự!',
            'SDT.numeric' => 'Số điện thoại chỉ được nhập số!',
            'SDT.min' => 'Số điện thoại tối thiểu 10 số!',

        ]);

        $user = User::find(Auth::guard('emp')->id());
        $user->name = $request->name;
        $user->SDT = $request->SDT;

        $user->address = $request->address;
        if ($request->gender == 1) {
            $user->gender = "nam";
        } else {
            $user->gender = "nữ";
        }
        $user->save();

        return redirect()->route('page.get_info')->with('success', 'Cập nhật thành công!');
    }
    public function post_face(Request $request)
    {
        $user = User::find(Auth::guard('emp')->id());
        $this->validate($request, [
            'image' => 'required',
        ], [
            'image.required' => 'Bạn chưa chọn ảnh đại diện!',
        ]);

        if ($request->hasFile('image')) {
            $file_img = $request->file('image');
            $name = $file_img->getClientOriginalName();
            $image = Str::random(4) . "_" . $name;
            while (file_exists("public/assets/images/user/" . $image)) {
                $image = Str::random(4) . "_" . $name;
            }
            if ($user->image == '') {
                $file_img->move("public/assets/images/user", $image);
            } else {
                if (file_exists("public/assets/images/user/" . $user->image)) {
                    unlink("public/assets/images/user/" . $user->image);
                    $file_img->move("public/assets/images/user", $image);
                }
            }


            $user->image = $image;
        } else {
            $user->image = '';
        }
        $user->save();

        return redirect()->route('page.get_info')->with('success', 'Cập nhật thành công!');
    }
    public function post_change_passwd(Request $request)
    {
        $user = Auth::guard('emp')->user();

        $oldPassword = $request->old_password;
        $newPassword = $request->new_password;

        if (Hash::check($oldPassword, $user->password)) {
            $user_id = $user->id;
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($newPassword);
            $obj_user->save();

            return redirect()->route('page.get_info')->with('success', 'Thay đổi mật khẩu thành công!');
        } else {
            return redirect()->route('page.get_info')->with('error', 'Mật khẩu cũ không chính xác!');
        }
    }

    public function Home()
    {
        $banner = Banner::where('status', 'Hiện')->get();
        $products = Product::where('status', 'Hiện')->orderBy('created_at', 'DESC')->limit(4)->get();
        $image_blog = Blog::inRandomOrder()->limit(6)->get();
        $type_pr = Type_Product::where('status', 'Hiện')->get();
        $image = images::all();
        return view('page/Home', compact('banner', 'products', 'image_blog', 'type_pr', 'image'));
    }

    public function About()
    {
        $about = about_us::where('status', 'Hiện')->get();
        $our_team = our_team::all();
        return view('page/About', compact('about', 'our_team'));
    }

    public function Contact()
    {
        return view('page/Contact');
    }
    public function post_Contact(Request $request)
    {
        $contact = new Contact();
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'messages' => 'required|min:3',

        ], [
            'name.required' => 'Bạn chưa nhập tên!',
            'email.required' => 'Bạn chưa nhập email!',
            'messages.required' => 'Bạn chưa nhập liên hệ!',
            'messages.min' => 'Liên hệ tối thiểu 3 ký tự!',

        ]);



        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'messages' => $request->messages
        ];



        Mail::send('mail', $data, function ($message) use ($request) {
            $message->from('ganhteam01@gmail.com');

            $message->to($request->email, $request->name)->subject('Cảm ơn bạn đã liên hệ, chúng tôi sẽ trả lời bạn sớm nhất có thể!');
        });

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->messages = $request->messages;
        $contact->save();
        return redirect()->route('page.Contact')->with('success', "Cảm ơn bạn đã liên hệ với chúng tôi!");
    }
    public function Blog()
    {
        $blog1 = Blog::orderBy('id', 'DESC')->first();

        $blog2 = Blog::where('id', '<>', $blog1->id)->inRandomOrder()->paginate(4);

        return view('page/blog/Blog', compact('blog1', 'blog2'));
    }
    public function Blog_Detail($id, Request $request)
    {
        $blog = Blog::find($id);
        $blog2 = Blog::where('id', '<>', $id)->inRandomOrder()->limit(5)->get();
        $comment = Comment_blog::where('id_blog', $id)->get();
        $getUser = Comment_Blog::select('id')->where('id_blog', $id)->get();

        return view('page/blog/Blog_Detail', compact('blog', 'blog2', 'comment', 'getUser'));
    }
    public function Comment_Blog($id, Request $request)
    {
        $id_user = Auth::guard('emp')->id();
        $comment = new Comment_Blog();
        $this->validate($request, [
            'comment' => 'required|min:3',

        ], [

            'comment.required' => 'Bạn chưa nhập bình luận!',
            'comment.min' => 'Bình luận tối thiểu 3 ký tự!',

        ]);
        $comment->id_blog = $id;
        $comment->id_user = $id_user;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->route('page.Blog_Detail', [$id])->with('success', "Bình luận thành công!");
    }
    public function Search_Blogs(Request $request)
    {

        $kq = $request->q;
        $search = Blog::where('title', 'like', '%' . $kq . '%')->paginate(6);
        return view('page/blog/Search_Blog', compact('kq', 'search'));
    }

    public function Cart_details(Request $request)
    {
        $topping = Topping::where("status", 'Hiện')->get();
        $size = Size::where("status", 'Hiện')->get();

        return view('page/Cart_details', ['topping' => $topping, 'size' => $size]);
    }
    public function Post_Cart_details(Request $request)
    {
        $product = Product::find($request->productID);
        $total_price = ($product->unit_price - ($product->unit_price * $product->discount) / 100);

        if ($request->topping != 0) {
            $topping = Topping::find($request->topping);
            $size = Size::find($request->size);
            $price = $request->quantity * ($topping->price + $total_price + ($size->percent * $total_price) / 100);

            return $price;
        } else {
            $size = Size::find($request->size);
            $price = $request->quantity * ($total_price + ($size->percent * $total_price) / 100);

            return $price;
        }
    }
    public function Product($id, Request $request)
    {
        $image = images::all();
        $products = Product::where('status', 'Hiện')->where('id_type', '=', $id);
        $sort = null;
        $price = null;
        if ($request->sort) {
            $sort = $request->sort;
            switch ($sort) {
                case 1:
                    $products->orderBy('unit_price', 'ASC');
                    break;
                case 2:
                    $products->orderBy('unit_price', 'DESC');
                    break;
                case 3:
                    $products->orderBy('created_at', 'DESC');
                    break;
            }
        }
        if ($request->price) {
            $price = $request->price;
            switch ($price) {
                case 1:
                    $products->where('unit_price', '<', 50000);
                    break;
                case 2:
                    $products->whereBetween('unit_price', [50000, 100000]);
                    break;
                case 3:
                    $products->where('unit_price', '>', 100000);
                    break;
            }
        }
        $products = $products->paginate(6);
        return view('page/product/products', compact('products', 'image', 'sort', 'price'));
    }
    public function Product_detail($id)
    {
        $pr_detail = Product::find($id);
        $pr_random = Product::where('id', '<>', $id)->inRandomOrder()->limit(5)->get();
        return view('page/product/product_detail', compact('pr_detail', 'pr_random'));
    }
    public function Search_Products(Request $request)
    {
        $kq = $request->q;
        if ($kq != "") {
            $search = Product::where('name', 'like', '%' . $kq . '%')
                ->orWhere('unit_price', '=', $kq)
                ->paginate(6);
            return view('page/product/Search_Products', compact('search', 'kq'));
        } else {
            return view('page/404');
        }
    }
    public function Add_cart($id, cart $cart, Request $request)
    {
        $pr = Product::find($id);
        $cart->add($pr);
        $cart->update_carts($id, $request->quantity);
        $url = $_SERVER['HTTP_REFERER'];
        return redirect($url);
    }
    public function Delete_cart($id, cart $cart)
    {
        $pr = Product::find($id);
        $cart->delete_cart($id);
        $url = $_SERVER['HTTP_REFERER'];
        return redirect($url);
    }
    public function Delete_all_cart(Cart $cart)
    {
        $cart->clear_cart();
        $url = $_SERVER['HTTP_REFERER'];

        return redirect($url);
    }
    public function Get_Login()
    {

        return view('login/Login');
    }
    public function Login(Request $request)
    {
        $this->validate($request, [

            'email' => 'required',
            'password' => 'required',

        ], [

            'email.required' => 'Bạn chưa nhập email!',
            'password.required' => 'Bạn chưa nhập mật khẩu!',


        ]);
        if (Auth::guard('emp')->attempt(['email' => $request->email, 'password' => $request->password, 'token' => 0])) {
            return redirect()->route('page.Home')->with('success', "Đăng nhập thành công!");
        } else {
            return back()->with("sai", "Tài khoản hoặc mật khẩu không chính xác!");
        }
    }
    public function Reset_Password()
    {
        return view('login/Reset_Password');
    }
    public function Recover_Password(Request $request)
    {
        $email = $request->email;
        $now = date("d/m/Y");
        $title_mail = "Lấy lại mật khẩu " . $now;
        $customer = User::where('email', '=', $email)->where('token', '=', '0')->get();
        foreach ($customer as $key => $value) {
            $customer_id = $value->id;
        }
        if ($customer) {
            $count_customer = $customer->count();
            if ($count_customer == 0) {
                return redirect()->back()->with('error', "Email chưa được đăng ký, vui lòng đăng ký tài khoản!");
            } else {
                $token_random = Str::random(20);
                $customer = User::find($customer_id);
                $customer->remember_token = $token_random;
                $customer->save();

                $to_email  = $email;
                $link_reset_pass = url('update_password?email=' . $to_email . '&remember_token=' . $token_random);
                $data = array("name" => $title_mail, "body" => $link_reset_pass, "email" => $email);
                Mail::send('login.mail_reset_pass', ['data' => $data], function ($message) use ($title_mail, $data) {
                    $message->to($data['email'])->subject($title_mail);
                    $message->from('ganhteam01@gmail.com');
                });
                return redirect()->back()->with('success', "Vui lòng vào email để tiến hành đặt lại mật khẩu!");
            }
        }
    }
    public function Update_Password()
    {
        return view('login/Update_Password');
    }
    public function Set_Password(Request $request)
    {
        $data = $request->all();
        $token_random = Str::random(20);
        $customer = User::where('email', '=', $data['email'])->where('token', '=', '0')->where('remember_token', '=', $data['remember_token'])->get();
        $count = $customer->count();
        if ($count > 0) {
            foreach ($customer as $key => $value) {
                $customer_id = $value->id;
            }
            $reset = User::find($customer_id);
            $reset->password = bcrypt($data['password_account']);
            $reset->remember_token = $token_random;
            $reset->save();
            return redirect()->route("page.Login")->with("success", "Mật khẩu đặt lại thành công, vui lòng đăng nhập lại!");
        } else {
            return redirect()->back()->with("error", "Link đã quá hạn!");
        }
    }

    public function Get_Register()
    {
        return view('login/Register');
    }
    public function Logout(Cart $cart)
    {
        Auth::guard('emp')->logout();
        $cart->clear_cart();
        return redirect()->route('page.Home');
    }
    public function Register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:15',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:3',
        ], [
            'name.required' => 'Bạn chưa nhập Họ và tên',
            'name.min' => 'Họ và tên tối thiểu 3 ký tự',
            'name.max' => 'Họ và tên tối đa 15 ký tự',

            'email.required' => 'Bạn chưa nhập email',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu tối thiểu 3 ký tự',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->token = 0;

        $user->save();
        return redirect()->route('page.Get_Register')->with('success', 'Bạn đã đăng ký thành công!');
    }

    //Review

    public function Review($id, Request $request)
    {

        $id_user = Auth::guard('emp')->id();
        if ($request->ajax()) {
            Comment::insert([
                'id_product' => $id,
                'content' => $request->content,
                'title' => $request->title,
                'number_star' => $request->number,
                'id_user' => $id_user,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
            $product = Product::find($id);
            $product->total_rating += 1;
            $product->number_star += $request->number;
            $product->save();
        }
        return redirect()->route('page.Home');
    }


    public function get_payment(){
        $orderId = $_GET['extraData'];
        $reset = Order::find($orderId);
            $reset->status = 1;
            $reset->save();

        return redirect()->to('http://localhost/BroadWay/Account/info');

    }

    public function post_check_out(Cart $cart, Request $request)
    {
        if (count($cart->items) > 0) {
            if ($request->method == 0) {

                $user = Auth::guard('emp')->user();
                $topping = null;
                $size = null;
                $price = 0;
                $note = $request->note;
                $total = 0;
                $product = null;
                $quantity = null;
                $method = null;
                $phone_nb = $request->phone_nb;
                $address = $request->address;
                if ($request->method == 1) {
                    $method = "Thanh toán khi nhận hàng";
                } else {
                    $method = "Thanh toán online";
                }
                foreach ($cart->items as $items) {
                    $id_topping = $request['topping_' . $items->id];
                    $id_size = $request['size_' . $items->id];
                    $quantity = $request['quantity_' . $items->id];
                    $product = Product::find($items->id);
                    $total_price = ($product->unit_price - ($product->unit_price * $product->discount) / 100);

                    if ($id_topping != 0) {
                        $topping = Topping::find($id_topping);
                        $size = Size::find($id_size);
                        $price = $quantity * ($topping->price + $total_price + ($size->percent * $total_price) / 100);
                    } else {
                        $size = Size::find($id_size);
                        $price = $quantity * ($total_price + ($size->percent * $total_price) / 100);
                    }
                    $total += $price;
                }
                $customers = customers::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'address' => $address,
                    'phone_nb' => $phone_nb,
                ]);
                $order = Order::create([
                    'id_customer' => $customers->id,
                    'total' => $total + 20000,
                    'note' => $note,
                    'payment' => $method,
                    'status' => 0,

                ]);
                foreach ($cart->items as $items) {
                    $id_topping = $request['topping_' . $items->id];
                    $id_size = $request['size_' . $items->id];
                    $quantity = $request['quantity_' . $items->id];
                    $product = Product::find($items->id);
                    $total_price = ($product->unit_price - ($product->unit_price * $product->discount) / 100);

                    if ($id_topping != 0) {
                        $topping = Topping::find($id_topping);
                        $size = Size::find($id_size);
                        $price = $quantity * ($topping->price + $total_price + ($size->percent * $total_price) / 100);
                    } else {
                        $size = Size::find($id_size);
                        $price = $quantity * ($total_price + ($size->percent * $total_price) / 100);
                    }
                    if ($id_topping != 0) {
                        Order_detail::create([
                            'id_order' => $order->id,
                            'id_product' => $items->id,
                            'id_size' => $id_size,
                            'id_topping' => $id_topping,
                            'quantity' => $quantity,
                            'price' => $price,

                        ]);
                    } else {
                        Order_detail::create([
                            'id_order' => $order->id,
                            'id_product' => $items->id,
                            'id_size' => $id_size,
                            'quantity' => $quantity,
                            'price' => $price,

                        ]);
                    }
                }
                $cart->clear_cart();
                $or = Order::orderBy('id', 'DESC')->first();

                function execPostRequest($url, $data)
                {
                    $ch = curl_init($url);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt(
                        $ch,
                        CURLOPT_HTTPHEADER,
                        array(
                            'Content-Type: application/json',
                            'Content-Length: ' . strlen($data)
                        )
                    );
                    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
                    //execute post
                    $result = curl_exec($ch);
                    //close connection
                    curl_close($ch);
                    return $result;
                }


                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";


                $partnerCode = 'MOMOBKUN20180529';
                $accessKey = 'klm05TvNBzhg7h7j';
                $serectkey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';


                $orderInfo = "Thanh toán qua MoMo";
                $amount = $total;
                $orderId = time() . "";
                $redirectUrl = "http://localhost/BroadWay/check_out/payment-success";
                $ipnUrl = "http://localhost/BroadWay/check_out/payment-success";

                    $amount = $total;


                    $requestId = time() . "";
                    $requestType = "payWithATM";
                    $extraData = $or->id;
                    //before sign HMAC SHA256 signature
                    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                    $signature = hash_hmac("sha256", $rawHash, $serectkey);
                    $data = array(
                        'partnerCode' => $partnerCode,
                        'partnerName' => "Test",
                        "storeId" => "MomoTestStore",
                        'requestId' => $requestId,
                        'amount' => $amount,
                        'orderId' => $orderId,
                        'orderInfo' => $orderInfo,
                        'redirectUrl' => $redirectUrl,
                        'ipnUrl' => $ipnUrl,
                        'lang' => 'vi',
                        'extraData' => $extraData,
                        'requestType' => $requestType,
                        'signature' => $signature
                    );
                    $result = execPostRequest($endpoint, json_encode($data));
                    $jsonResult = json_decode($result, true);  // decode json
                    //Just a example,please check more in there
                    return redirect()->to($jsonResult['payUrl']);
            } else {
                // thanh toan khi nhan hang
                $user = Auth::guard('emp')->user();
                $topping = null;
                $size = null;
                $price = 0;
                $note = $request->note;
                $total = 0;
                $product = null;
                $quantity = null;
                $method = null;
                $phone_nb = $request->phone_nb;
                $address = $request->address;
                if ($request->method == 1) {
                    $method = "Thanh toán khi nhận hàng";
                } else {
                    $method = "Thanh toán online";
                }
                foreach ($cart->items as $items) {
                    $id_topping = $request['topping_' . $items->id];
                    $id_size = $request['size_' . $items->id];
                    $quantity = $request['quantity_' . $items->id];
                    $product = Product::find($items->id);
                    $total_price = ($product->unit_price - ($product->unit_price * $product->discount) / 100);

                    if ($id_topping != 0) {
                        $topping = Topping::find($id_topping);
                        $size = Size::find($id_size);
                        $price = $quantity * ($topping->price + $total_price + ($size->percent * $total_price) / 100);
                    } else {
                        $size = Size::find($id_size);
                        $price = $quantity * ($total_price + ($size->percent * $total_price) / 100);
                    }
                    $total += $price;
                }
                $customers = customers::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'address' => $address,
                    'phone_nb' => $phone_nb,
                ]);
                $order = Order::create([
                    'id_customer' => $customers->id,
                    'total' => $total + 20000,
                    'note' => $note,
                    'payment' => $method,
                    'status' => 0,

                ]);
                foreach ($cart->items as $items) {
                    $id_topping = $request['topping_' . $items->id];
                    $id_size = $request['size_' . $items->id];
                    $quantity = $request['quantity_' . $items->id];
                    $product = Product::find($items->id);
                    $total_price = ($product->unit_price - ($product->unit_price * $product->discount) / 100);

                    if ($id_topping != 0) {
                        $topping = Topping::find($id_topping);
                        $size = Size::find($id_size);
                        $price = $quantity * ($topping->price + $total_price + ($size->percent * $total_price) / 100);
                    } else {
                        $size = Size::find($id_size);
                        $price = $quantity * ($total_price + ($size->percent * $total_price) / 100);
                    }
                    if ($id_topping != 0) {
                        Order_detail::create([
                            'id_order' => $order->id,
                            'id_product' => $items->id,
                            'id_size' => $id_size,
                            'id_topping' => $id_topping,
                            'quantity' => $quantity,
                            'price' => $price,

                        ]);
                    } else {
                        Order_detail::create([
                            'id_order' => $order->id,
                            'id_product' => $items->id,
                            'id_size' => $id_size,
                            'quantity' => $quantity,
                            'price' => $price,

                        ]);
                    }
                }
                $cart->clear_cart();
                $or = Order::orderBy('id', 'DESC')->first();
                return view('page/Order', compact('or'));
            }
        } else {
            return redirect()->route("page.Home");
        }
    }
}
