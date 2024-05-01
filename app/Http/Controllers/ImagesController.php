<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\images;
class ImagesController extends Controller
{
    public function get_images(){
        return view('admin/images/ListImages');
    }
    public function data_image(){
        $images = images::select("*");
        return Datatables::of($images)
        ->addColumn('action', function ($images) {
            $button = '<button type="button" class="btn btn-primary p-3" data-toggle="modal" data-target="#exampleModal_'.$images->id.'">
            Xem chi tiết
          </button>
          <div class="modal fade" id="exampleModal_'.$images->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <td>'.$images->created_at.'</td>
                      </tr>
                      <tr>
                        <th scope="col">Ngày cập nhật</th>
                        <td>'.$images->updated_at.'</td>
                      </tr>
                    </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>';
          $button .= '<a href="'.route('admin.edit_images',$images->id).'" class="btn btn-xs btn-success ml-2 p-3"><i class="mdi mdi-pencil"></i> Cập nhật</a>';
          $button .= '<a href="'.route('admin.delete_images',$images->id).'"  class="btn btn-xs btn-danger ml-2 p-3" id="delete_image"><i class="mdi mdi-delete-variant"></i> Xóa</a>';
            return $button;
        })
        ->editColumn('name', function ($images) {
            $img = '<img src="assets/images/images/'.$images->name.'" alt="'.$images->name.'">';
            return $img;
        })
        ->rawColumns(['action','name'])
        ->make(true);
    }
    public function insert(){
       
        return view('admin/images/InsertImages');
    }
    public function post_insert(Request $request){

        $this->validate($request,[
            
            'name'=>'required',
            'priority'=>'required'
        ],[
            
            'name.required'=>'Bạn chưa chọn ảnh!',
         
            'priority.required'=>'Bạn chưa chọn vị trí xuất hiện!',
        ]);

        $images = new images();
        if($request->hasFile('name')){
            $file_img = $request->file('name');
            $name = $file_img->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("public/assets/images/images/".$image)){
                $image = Str::random(4)."_".$name;
            }
            $file_img->move("public/assets/images/images",$image);
            $images->name = $image;

        }
        else{
            $images->name = '';
        }
       
        $images->link = $request->link;
        if($request->priority == 1){
            $images->priority = "Vị trí 1";
        }
        elseif($request->priority == 2){
            $images->priority = "Vị trí 2";
        }
        elseif($request->priority == 3){
            $images->priority = "Vị trí 3";
        }
        elseif($request->priority == 4){
            $images->priority = "Vị trí 4";
        }
        $images->save();
        return redirect("admin/images/insert")->with('success',"Thêm ảnh thành công!");
       
    }

    public function edit_images($id){
        $images = images::find($id);
      
        return view('admin/images/EditImages',compact('images'));
    }
    public function post_edit_images($id, Request $request){
        $this->validate($request,[
            
            'name'=>'required',
            'priority'=>'required'
        ],[
            
            'name.required'=>'Bạn chưa chọn ảnh!',
         
            'priority.required'=>'Bạn chưa chọn vị trí xuất hiện!',
        ]);
        $images = images::find($id);
        if($request->hasFile('name')){
            $file_img = $request->file('name');
            $name = $file_img->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("public/assets/images/images/".$image)){
                $image = Str::random(4)."_".$name;
            }
            if($images->name == ''){
                $file_img->move("public/assets/images/images",$image);
            }
            else {
                if(file_exists("public/assets/images/images/".$images->name)){
                    unlink("public/assets/images/images/".$images->name);
                    $file_img->move("public/assets/images/images",$image);
                }
            }
           
            $images->name = $image;

        }
        else{
            $images->name = '';
        }
        $images->link = $request->link;
        if($request->priority == 1){
            $images->priority = "Vị trí 1";
        }
        elseif($request->priority == 2){
            $images->priority = "Vị trí 2";
        }
        elseif($request->priority == 3){
            $images->priority = "Vị trí 3";
        }
        elseif($request->priority == 4){
            $images->priority = "Vị trí 4";
        }
        
       
        $images->save();
        return redirect()->route('admin.edit_images',$id)->with('success',"Cập nhật ảnh thành công!");
        
    }
    public function delete($id){
        images::destroy($id);
        return redirect("admin/images/list");
    }
}
