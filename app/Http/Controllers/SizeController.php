<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Size;

class SizeController extends Controller
{
    public function get_size(){
        return view('admin/size/ListSize');
    }
    public function data_size(){
        $size = Size::select("*");
        return Datatables::of($size)
        ->addColumn('action', function ($size) {
            $button = '<button type="button" class="btn btn-primary p-3" data-toggle="modal" data-target="#exampleModal_'.$size->id.'">
            Xem chi tiết
          </button>
          <div class="modal fade" id="exampleModal_'.$size->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <td>'.$size->created_at.'</td>
                      </tr>
                      <tr>
                        <th scope="col">Ngày cập nhật</th>
                        <td>'.$size->updated_at.'</td>
                      </tr>
                    </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>';
          $button .= '<a href="'.route('admin.edit_size',$size->id).'" class="btn btn-xs btn-success ml-2 p-3"><i class="mdi mdi-pencil"></i> Cập nhật</a>';
          $button .= '<a href="'.route('admin.delete_size',$size->id).'"  class="btn btn-xs btn-danger ml-2 p-3" id="delete_size"><i class="mdi mdi-delete-variant"></i> Xóa</a>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function insert(){
       
        return view('admin/size/InsertSize');
    }
    public function post_insert(Request $request){

        $this->validate($request,[
            
            'name'=>'required|unique:size,name',
            'percent'=>'required',
            'status'=>'required',
        ],[
            
            'name.required'=>'Bạn chưa nhập tên size!',
            'name.unique'=>'Tên size đã tồn tại!',
            'percent.required'=>'Bạn chưa nhập phần trăm tăng',
            'status.required'=>'Bạn chưa chọn trạng thái!',
        ]);

        $size = new Size();

        $size->name = $request->name;
        $size->percent = $request->percent;
        if($request->status == 1){
            $size->status = "Hiện";
        }
        else{
            $size->status = "Ẩn";
        }
        $size->save();
        return redirect("admin/size/insert")->with('success',"Thêm size thành công!");
       
    }

    public function edit_size($id){
        $size = Size::find($id);
      
        return view('admin/size/EditSize',compact('size'));
    }
    public function post_edit_size($id, Request $request){
        $size = Size::find($id);
        $this->validate($request,[
            
            'name'=>'required',
            'percent'=>'required',
            'status'=>'required',
        ],[
            
            'name.required'=>'Bạn chưa nhập tên size!',
            'percent.required'=>'Bạn chưa nhập phần trăm tăng',
            'status.required'=>'Bạn chưa chọn trạng thái!',
        ]);
       
        

      
        $size->name = $request->name;
        $size->percent = $request->percent;
        if($request->status == 1){
            $size->status = "Hiện";
        }
        else{
            $size->status = "Ẩn";
        }
        $size->save();
        return redirect()->route('admin.edit_size',$id)->with('success',"Cập nhật size thành công!");
        
    }
    public function delete($id){
        Size::destroy($id);
        return redirect("admin/size/list");
    }
}
