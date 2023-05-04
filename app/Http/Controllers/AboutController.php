<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;
use App\about_us;
use App\our_team;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function get_about(){
        return view('admin/about_us/List_About_Us');
    }
    public function data_about(){
        $about_us = about_us::select("*");
        return Datatables::of($about_us)
        ->addColumn('action', function ($about_us) {
            $button = '<button type="button" class="btn btn-primary p-3" data-toggle="modal" data-target="#exampleModal_'.$about_us->id.'">
            Xem chi tiết
          </button>
          <div class="modal fade" id="exampleModal_'.$about_us->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <td>'.$about_us->created_at.'</td>
                      </tr>
                      <tr>
                        <th scope="col">Ngày cập nhật</th>
                        <td>'.$about_us->updated_at.'</td>
                      </tr>
                    </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>';
          $button .= '<a href="'.route('admin.edit_about',$about_us->id).'" class="btn btn-xs btn-success ml-2 p-3"><i class="mdi mdi-pencil"></i> Cập nhật</a>';
          $button .= '<a href="'.route('admin.delete_about',$about_us->id).'"  class="btn btn-xs btn-danger ml-2 p-3" id="delete_about"><i class="mdi mdi-delete-variant"></i> Xóa</a>';
            return $button;
        })
        ->editColumn('image', function ($about_us) {
            $img = '<img src="assets/images/about/'.$about_us->image.'" alt="'.$about_us->image.'">';
            return $img;
        })
        ->rawColumns(['action','image'])
        ->make(true);
    }
    public function insert_about(){
       
        return view('admin/about_us/Insert_About_Us');
    }
    public function post_insert_about(Request $request){

        $this->validate($request,[
            'content'=>"required",
            'status'=>"required"
        ],[
            
            'content.required'=>'Bạn chưa viết nội dung!',
            'status.required'=>'Bạn chưa chọn trạng thái!',
        ]);
        $about = new about_us();
        if($request->hasFile('image')){
            $file_img = $request->file('image');
            $name = $file_img->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("public/assets/images/product/".$image)){
                $image = Str::random(4)."_".$name;
            }
            
            if($about->image == '' ){
                $file_img->move("public/assets/images/about",$image);
            }
            else{
                if(file_exists("public/assets/images/about/".$about->image)){
                    unlink("public/assets/images/about/".$about->image);
                    $file_img->move("public/assets/images/about",$image);
                }
            }
            $about->image = $image;
        }
        else{
            $about->image = '';
        }
        $about->title = $request->title;
        $about->content = $request->content;
        if($request->status == 1){
            $about->status = "Hiện";
        }
        else{
            $about->status = "Ẩn";
        }
        $about->save();
        return redirect()->route('admin.insert_about')->with('success',"Thêm giới thiệu thành công!");
       
    }

    public function edit_about($id){
        $about = about_us::find($id);
      
        return view('admin/about_us/Edit_About_Us',compact('about'));
    }
    public function post_edit_about($id, Request $request){
        $this->validate($request,[
            'content'=>"required",
            'status'=>"required"
        ],[
            
            'content.required'=>'Bạn chưa viết nội dung!',
            'status.required'=>'Bạn chưa chọn trạng thái!',
        ]);
        $about = about_us::find($id);
        if($request->hasFile('image')){
            $file_img = $request->file('image');
            $name = $file_img->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("public/assets/images/about/".$image)){
                $image = Str::random(4)."_".$name;
            }
            
            if($about->image == '' ){
                $file_img->move("public/assets/images/about",$image);
            }
            else{
                if(file_exists("public/assets/images/about/".$about->image)){
                    unlink("public/assets/images/about/".$about->image);
                    $file_img->move("public/assets/images/about",$image);
                }
            }
            $about->image = $image;
        }
        else{
            $about->image = '';
        }
        $about->title = $request->title;
        $about->content = $request->content;
        if($request->status == 1){
            $about->status = "Hiện";
        }
        else{
            $about->status = "Ẩn";
        }
        $about->save();
        return redirect()->route('admin.edit_about',$id)->with('success',"Cập nhật giới thiệu thành công!");
        
    }
    public function delete_about($id){
        about_us::destroy($id);
        return redirect()->route('admin.list_about');
    }
    
    //Our_Team

    public function get_our_team(){
        return view('admin/our_team/List_Our_Team');
    }
    public function data_our_team(){
        $our_team = our_team::select("*");
        return Datatables::of($our_team)
        ->addColumn('action', function ($our_team) {
            $button = '<button type="button" class="btn btn-primary p-3" data-toggle="modal" data-target="#exampleModal_'.$our_team->id.'">
            Xem chi tiết
          </button>
          <div class="modal fade" id="exampleModal_'.$our_team->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <td>'.$our_team->created_at.'</td>
                      </tr>
                      <tr>
                        <th scope="col">Ngày cập nhật</th>
                        <td>'.$our_team->updated_at.'</td>
                      </tr>
                    </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>';
          $button .= '<a href="'.route('admin.edit_our_team',$our_team->id).'" class="btn btn-xs btn-success ml-2 p-3"><i class="mdi mdi-pencil"></i> Cập nhật</a>';
          $button .= '<a href="'.route('admin.delete_our_team',$our_team->id).'"  class="btn btn-xs btn-danger ml-2 p-3" id="delete_our_team"><i class="mdi mdi-delete-variant"></i> Xóa</a>';
            return $button;
        })
        ->editColumn('image', function ($our_team) {
            $img = '<img src="assets/images/our_team/'.$our_team->image.'" alt="'.$our_team->image.'">';
            return $img;
        })
        ->rawColumns(['action','image'])
        ->make(true);
    }
    public function insert_our_team(){
       
        return view('admin/our_team/Insert_Our_Team');
    }
    public function post_insert_our_team(Request $request){

        $this->validate($request,[
            'image'=>'required',
            'name'=>'required',
            'position'=>"required",
            'introduce'=>"required"
        ],[
            
            'image.required'=>'Ảnh không được để trống!',
            'name.required'=>'Tên không được để trống!',
            'position.required'=>'Chức vụ không được để trống!',
            'introduce.required'=>'Giới thiệu không được để trống!',
        ]);
        $our_team = new our_team();
        if($request->hasFile('image')){
            $file_img = $request->file('image');
            $name = $file_img->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("public/assets/images/our_team/".$image)){
                $image = Str::random(4)."_".$name;
            }
            
            if($our_team->image == '' ){
                $file_img->move("public/assets/images/our_team",$image);
            }
            else{
                if(file_exists("public/assets/images/our_team/".$our_team->image)){
                    unlink("public/assets/images/our_team/".$our_team->image);
                    $file_img->move("public/assets/images/our_team",$image);
                }
            }
            $our_team->image = $image;
        }
        else{
            $our_team->image = '';
        }
        $our_team->name = $request->name;
        $our_team->position = $request->position;
        $our_team->introduce = $request->introduce;
        $our_team->save();
        return redirect()->route('admin.insert_our_team')->with('success',"Thêm thành viên thành công!");
       
    }

    public function edit_our_team($id){
        $our_team = our_team::find($id);
      
        return view('admin/our_team/Edit_Our_Team',compact('our_team'));
    }
    public function post_edit_our_team($id, Request $request){
        $this->validate($request,[
            'image'=>'required',
            'name'=>'required',
            'position'=>"required",
            'introduce'=>"required"
        ],[
            
            'image.required'=>'Ảnh không được để trống!',
            'name.required'=>'Tên không được để trống!',
            'position.required'=>'Chức vụ không được để trống!',
            'introduce.required'=>'Giới thiệu không được để trống!',
        ]);
        $our_team = our_team::find($id);
        if($request->hasFile('image')){
            $file_img = $request->file('image');
            $name = $file_img->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("public/assets/images/our_team/".$image)){
                $image = Str::random(4)."_".$name;
            }
            
            if($our_team->image == '' ){
                $file_img->move("public/assets/images/our_team",$image);
            }
            else{
                if(file_exists("public/assets/images/our_team/".$our_team->image)){
                    unlink("public/assets/images/our_team/".$our_team->image);
                    $file_img->move("public/assets/images/our_team",$image);
                }
            }
            $our_team->image = $image;
        }
        else{
            $our_team->image = '';
        }
        $our_team->name = $request->name;
        $our_team->position = $request->position;
        $our_team->introduce = $request->introduce;
        $our_team->save();
        return redirect()->route('admin.edit_our_team',$id)->with('success',"Cập nhật thành viên thành công!");
        
    }
    public function delete_our_team($id){
        our_team::destroy($id);
        return redirect()->route('admin.list_our_team');
    }

}
