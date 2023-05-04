<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use App\Topping;
use Illuminate\Http\Request;

class ToppingController extends Controller
{
    public function get_topping(){
        return view('admin/topping/ListTopping');
    }
    public function data_topping(){
        $topping = Topping::select("*");
        return Datatables::of($topping)
        ->addColumn('action', function ($topping) {
            $button = '<button type="button" class="btn btn-primary p-3" data-toggle="modal" data-target="#exampleModal_'.$topping->id.'">
            Xem chi tiết
          </button>
          <div class="modal fade" id="exampleModal_'.$topping->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <tr>
                        <th scope="col">Ngày tạo</th>
                        <td>'.$topping->created_at.'</td>
                      </tr>
                      <tr>
                        <th scope="col">Ngày cập nhật</th>
                        <td>'.$topping->updated_at.'</td>
                      </tr>
                    </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>';
          $button .= '<a href="'.route('admin.edit_topping',$topping->id).'" class="btn btn-xs btn-success ml-2 p-3"><i class="mdi mdi-pencil"></i> Cập nhật</a>';
          $button .= '<a href="'.route('admin.delete_topping',$topping->id).'"  class="btn btn-xs btn-danger ml-2 p-3" id="delete_topping"><i class="mdi mdi-delete-variant"></i> Xóa</a>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function insert(){
       
        return view('admin/topping/InsertTopping');
    }
    public function post_insert(Request $request){

        $this->validate($request,[
            
            'name'=>'required|unique:topping,name',
            'price'=>'required',
            'status'=>'required',
        ],[
            
            'name.required'=>'Bạn chưa nhập tên size!',
            'name.unique'=>'Tên size đã tồn tại!',
            'price.required'=>'Bạn chưa nhập phần trăm tăng',
            'status.required'=>'Bạn chưa chọn trạng thái!',
        ]);

        $topping = new Topping();

        $topping->name = $request->name;
        $topping->price = $request->price;
        if($request->status == 1){
            $topping->status = "Hiện";
        }
        else{
            $topping->status = "Ẩn";
        }
        $topping->save();
        return redirect("admin/topping/insert")->with('success',"Thêm topping thành công!");
       
    }

    public function edit_topping($id){
        $topping = Topping::find($id);
      
        return view('admin/topping/EditTopping',compact('topping'));
    }
    public function post_edit_topping($id, Request $request){
        $topping = Topping::find($id);
        $this->validate($request,[
            
            'name'=>'required',
            'price'=>'required',
            'status'=>'required',
        ],[
            
            'name.required'=>'Bạn chưa nhập tên size!',
            'price.required'=>'Bạn chưa nhập giá topping!',
            'status.required'=>'Bạn chưa chọn trạng thái!',
        ]);

        $topping->name = $request->name;
        $topping->price = $request->price;
        if($request->status == 1){
            $topping->status = "Hiện";
        }
        else{
            $topping->status = "Ẩn";
        }
        $topping->save();
        return redirect()->route('admin.edit_topping',$id)->with('success',"Cập nhật topping thành công!");
        
    }
    public function delete($id){
        Topping::destroy($id);
        return redirect("admin/topping/list");
    }
}
