<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Type_product;

class ProductController extends Controller
{
    public function get_product(Request $request){
        return view('admin/product/ListProduct');
    }
    public function data_product(){
        $product = Product::join('type_product', 'product.id_type', '=', 'type_product.id')->select(['product.updated_at','product.created_at','product.status','product.number_star','product.id','product.description','product.total_rating','product.image', 'product.name', 'type_product.name as name_tp', 'product.unit_price', 'product.discount', 'product.unit']);
        return Datatables::of($product)
        ->addColumn('action', function ($product) {
            $button = '<button type="button" class="btn btn-primary p-3" data-toggle="modal" data-target="#exampleModal_'.$product->id.'">
            Xem chi tiết
          </button>
          <div class="modal fade" id="exampleModal_'.$product->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document" >
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Thông tin chi tiết</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body ">
                    <table class="table table-responsive text-left" >
                      <tr >
                        <th>Mô tả</th>
                        <td>'.$product->description.'</td>
                      </tr>
                      <tr >
                        <th scope="col" >Tổng đánh giá</th>
                        <td>'.$product->total_rating.'</td>
                      </tr>
                      <tr>
                        <th scope="col" >Tổng số sao</th>
                        <td>'.$product->number_star.'</td>
                      </tr>
                      <tr>
                        <th scope="col" >Trạng thái</th>
                        <td >'.$product->status.'</td>
                      </tr>
                      <tr>
                        <th scope="col">Ngày tạo</th>
                        <td>'.$product->created_at.'</td>
                      </tr>
                      <tr>
                        <th scope="col">Ngày cập nhật</th>
                        <td>'.$product->updated_at.'</td>
                      </tr>
                    </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>';
          $button .= '<a href="'.route('admin.edit_product',$product->id).'" class="btn btn-xs btn-success ml-2 p-3"><i class="mdi mdi-pencil"></i> Cập nhật</a>';
          $button .= '<a href="'.route('admin.delete_product',$product->id).'" class="btn btn-xs btn-danger ml-2 p-3" id="delete_product"><i class="mdi mdi-delete-variant"></i> Xóa</a>';
            return $button;
        })
        ->editColumn('image', function ($product) {
            $num_star = 0;
            if($product->total_rating>0){
                $num_star = round($product->number_star/$product->total_rating);
            }
            $img = '<img src="assets/images/product/'.$product->image.'" alt="'.$product->image.'"><br><br>';
            for ($i=1; $i <= 5; $i++) {
                if($i <= $num_star) {
                    $img .= '<i class="mdi mdi-star active_star"></i>';
                }
                else{
                    $img .= '<i class="mdi mdi-star"></i>';
                }
                
            }
            return $img;
        })
        ->rawColumns(['action','image'])
        ->make(true);
    }
    public function insert(){
        $type_product = Type_product::where('status','Hiện')->get();
        return view('admin/product/InsertProduct',compact('type_product'));
    }
    public function post_insert(Request $request){

        $this->validate($request,[
            'image'=>'required',
            'name'=>'required|min:3|unique:product,name',
            
            'unit_price'=>'required|min:0',
            'discount'=>'required|min:0',
            'unit'=>'required',
            'status'=>'required',
        ],[
            'image.required'=>'Bạn chưa chọn ảnh sản phẩm!',
            'name.required'=>'Bạn chưa nhập tên sản phẩm!',
            'name.min'=>'Tiêu đề tối thiểu 3 ký tự!',
            'name.unique'=>'Tên sản phẩm đã tồn tại!',
            
            'unit_price.required'=>"Bạn chưa giá hiệ tại!",
            'unit_price.min'=>"Giá hiện tại tối thiểu bằng 0!",
            'discount.required'=>'Bạn chưa nhập phần trăm khuyến mại!',
            'discount.required'=>'Phần trăm khuyến mại tối thiểu bằng 0!',
            'unit.required'=>'Bạn chưa nhập đơn vị!',
            'status.required'=>'Bạn chưa chọn trạng thái!',
        ]);

        $product = new Product();

        if($request->hasFile('image')){
            $file_img = $request->file('image');
            $name = $file_img->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("public/assets/images/product/".$image)){
                $image = Str::random(4)."_".$name;
            }
            $file_img->move("public/assets/images/product",$image);
            $product->image = $image;

        }
        else{
            $product->image = '';
        }

        $product->name = $request->name;
        $product->id_type = $request->type_product;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->discount = $request->discount;
        $product->unit = $request->unit;
        $product->total_rating = 0;
        $product->number_star = 0;
        if($request->status == 1){
            $product->status = "Hiện";
        }
        else{
            $product->status = "Ẩn";
        }
        $product->save();
        return redirect("admin/product/insert")->with('success',"Thêm sản phẩm thành công!");
       
    }

    public function edit_product($id){
        $product = Product::find($id);
        $type_product = Type_product::where('status','Hiện')->get();
        return view('admin/product/EditProduct',compact('product','type_product'));
    }
    public function post_edit($id, Request $request){
        $product = Product::find($id);
        $this->validate($request,[
            'image'=>'required',
            'name'=>'required|min:3',
            'unit_price'=>'required|min:0',
            'discount'=>'required|min:0',
            'unit'=>'required',
            'status'=>'required',
        ],[
            'image.required'=>'Bạn chưa chọn ảnh sản phẩm!',
            'name.required'=>'Bạn chưa nhập tên sản phẩm!',
            'name.min'=>'Tiêu đề tối thiểu 3 ký tự!',
           
            'unit_price.required'=>"Bạn chưa giá hiệ tại!",
            'unit_price.min'=>"Giá hiện tại tối thiểu bằng 0!",
            'discount.required'=>'Bạn chưa nhập phần trăm khuyến mại!',
            'discount.required'=>'Phần trăm khuyến mại tối thiểu bằng 0!',
            'unit.required'=>'Bạn chưa nhập đơn vị!',
            'status.required'=>'Bạn chưa chọn trạng thái!',
        ]);

        
        if($request->hasFile('image')){
            $file_img = $request->file('image');
            $name = $file_img->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("public/assets/images/product/".$image)){
                $image = Str::random(4)."_".$name;
            }
            
            if(file_exists("public/assets/images/product/".$product->image)){
                unlink("public/assets/images/product/".$product->image);
            }
            $file_img->move("public/assets/images/product",$image);
            $product->image = $image;

        }
        else{
            $product->image = '';
        }

        $product->name = $request->name;
        $product->id_type = $request->type_product;
        $product->description = $request->description;
        $product->unit_price = $request->unit_price;
        $product->discount = $request->discount;
        $product->unit = $request->unit;
        
        if($request->status == 1){
            $product->status = "Hiện";
        }
        else{
            $product->status = "Ẩn";
        }
        $product->save();
        return redirect()->route('admin.edit_product',$id)->with('success',"Cập nhật sản phẩm thành công!");
        
    }
    public function delete($id){
        Product::destroy($id);
        return redirect("admin/product/list");
    }
}
