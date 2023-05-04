<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use App\Type_product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class Type_ProductController extends Controller
{
    public function get_type_product(){
        return view('admin/type_product/ListTypeProduct');
    }
    public function data_type_product(){
        $type_product = Type_product::select('*');
        return Datatables::of($type_product)
        ->addColumn('action', function ($type_product) {
            $button = '<button type="button" class="btn btn-primary p-3" data-toggle="modal" data-target="#exampleModal_'.$type_product->id.'">
            Xem chi tiết
          </button>
          <div class="modal fade" id="exampleModal_'.$type_product->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <th scope="col">Ngày tạo</th>
                        <td>'.$type_product->created_at.'</td>
                      </tr>
                      <tr>
                        <th scope="col">Ngày cập nhật</th>
                        <td>'.$type_product->updated_at.'</td>
                      </tr>
                    </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>';
          $button .= '<a href="'.route('admin.edit_type_product',$type_product->id).'" class="btn btn-xs btn-success ml-2 p-3"><i class="mdi mdi-pencil"></i> Cập nhật</a>';
          $button .= '<a href="'.route('admin.delete_type_product',$type_product->id).'" class="btn btn-xs btn-danger ml-2 p-3" id="delete_type_product"><i class="mdi mdi-delete-variant"></i> Xóa</a>';
            return $button;
        })
        ->editColumn('banner_type', function ($type_product) {
            $banner_type = '<img src="assets/images/product/'.$type_product->banner_type.'" alt="'.$type_product->banner_type.'"><br><br>';
            return $banner_type;
        })
        ->editColumn('new', function ($type_product) {
            if ($type_product->new == 1) {
                $new = 'Đồ ăn';
            }
            else{
                $new = 'Đồ uống';
            }
            return $new;
        })
        ->rawColumns(['action','banner_type','new'])
        ->make(true);
    }
    
    public function insert(){
        
        return view('admin/type_product/InsertTypeProduct');
    }
    public function post_insert(Request $request){

        $this->validate($request,[
            'name'=>'required|min:3|unique:type_product,name',
            'banner_type'=>'required',
            'new'=>'required',
            'status'=>'required',
        ],[
            
            'name.required'=>'Bạn chưa nhập tên loại sản phẩm!',
            'name.min'=>'Tên loại tối thiểu 3 ký tự!',
            'name.unique'=>'Tên sản loại phẩm đã tồn tại!',
            'banner_type.required'=>'Bạn chưa chọn banner loại sản phẩm!',
            'new.required'=>'Bạn chưa chọn phân loại sản phẩm!',
            'status.required'=>'Bạn chưa chọn trạng thái!',
        ]);

        $type_product = new Type_product();
        $type_product->name = $request->name;

        if($request->hasFile('banner_type')){
            $file_img = $request->file('banner_type');
            $name = $file_img->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("public/assets/images/product/".$image)){
                $image = Str::random(4)."_".$name;
            }
            $file_img->move("public/assets/images/product",$image);
            $type_product->banner_type = $image;

        }
        else{
            $type_product->banner_type = '';
        }
        
        $type_product->new = $request->new;
        if($request->status == 1){
            $type_product->status = "Hiện";
        }
        else{
            $type_product->status = "Ẩn";
        }
        $type_product->save();
        return redirect("admin/type_product/insert")->with('success',"Thêm loại sản phẩm thành công!");
       
    }

    public function edit_type_product($id){
        $type_product = Type_product::find($id);
        return view('admin/type_product/EditTypeProduct',compact('type_product'));
    }
    public function post_edit_type_product($id, Request $request){
        $type_product = Type_product::find($id);
        $this->validate($request,[
            
            'name'=>'required|min:3',
            'banner_type'=>'required',
            'new'=>'required',
            'status'=>'required',
        ],[
            'name.required'=>'Bạn chưa nhập tên loại sản phẩm!',
            'name.min'=>'Tên loại tối thiểu 3 ký tự!',
            'banner_type.required'=>'Bạn chưa chọn banner loại sản phẩm!',
            'new.required'=>'Bạn chưa chọn phân loại sản phẩm!',
            'status.required'=>'Bạn chưa chọn trạng thái!',
        ]);
        if($request->hasFile('banner_type')){
            $file_img = $request->file('banner_type');
            $name = $file_img->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("public/assets/images/product/".$image)){
                $image = Str::random(4)."_".$name;
            }
            if(file_exists("public/assets/images/product/".$type_product->banner_type)){
                unlink("public/assets/images/product/".$type_product->banner_type);
            }
            $file_img->move("public/assets/images/product",$image);
            $type_product->banner_type = $image;

        }
        else{
            $type_product->banner_type = '';
        }

        $type_product->name = $request->name;
        $type_product->new = $request->new;
        
        if($request->status == 1){
            $type_product->status = "Hiện";
        }
        else{
            $type_product->status = "Ẩn";
        }
        $type_product->save();
        return redirect()->route('admin.edit_type_product',$id)->with('success',"Cập nhật loại sản phẩm thành công!");
        
    }
    public function delete($id){
        Type_product::destroy($id);
        return redirect("admin/type_product/list");
    }
}
