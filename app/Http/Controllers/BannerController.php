<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Banner;
use Yajra\Datatables\Datatables;

class BannerController extends Controller
{
    public function getBanner(){
        return view('admin/banner/ListBanner');
    }
    public function data_banner(){
        $banner = Banner::select("*");
        return Datatables::of($banner)
        ->addColumn('action', function ($banner) {
            $button = '<button type="button" class="btn btn-primary p-3" data-toggle="modal" data-target="#exampleModal_'.$banner->id.'">
            Xem chi tiết
          </button>
          <div class="modal fade" id="exampleModal_'.$banner->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <td>'.$banner->created_at.'</td>
                      </tr>
                      <tr>
                        <th scope="col">Ngày cập nhật</th>
                        <td>'.$banner->updated_at.'</td>
                      </tr>
                    </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>';
          $button .= '<a href="'.route('admin.edit_banner',$banner->id).'" class="btn btn-xs btn-success ml-2 p-3"><i class="mdi mdi-pencil"></i> Cập nhật</a>';
          $button .= '<a href="'.route('admin.delete_banner',$banner->id).'"  class="btn btn-xs btn-danger ml-2 p-3" id="delete_banner"><i class="mdi mdi-delete-variant"></i> Xóa</a>';
            return $button;
        })
        ->editColumn('image', function ($banner) {
            $img = '<img src="assets/images/banner/'.$banner->image.'" alt="'.$banner->image.'">';
            return $img;
        })
        ->editColumn('slide', function ($banner) {
            $slide = '<img src="assets/images/banner/'.$banner->slide.'" alt="'.$banner->slide.'">';
            return $slide;
        })
        ->rawColumns(['action','image','slide'])
        ->make(true);
    }
    public function insert_banner(){
        
        return view('admin/banner/InsertBanner');
    }
    public function post_insert_banner(Request $request){
        $this->validate($request,[
            'title'=>'required|unique:banner,title',
            'status'=>'required',
            'image'=>'required',
            'link'=>'required',   
            'slide'=>  'required'           
        ],[
            'title.required'=>'Bạn chưa nhập tiêu đề!',
            'title.min'=>'Tiêu đề tối thiểu 3 ký tự!',
            'title.unique'=>'Tiêu đề đã tồn tại!',
            
            'status.required'=>'Bạn chưa chọn trạng thái!',
            'image.required'=>'Bạn chưa chọn ảnh nền!',
            'slide.required'=>"Bạn chưa chọn slide!",
            'link.required'=>'Bạn chưa nhập đường dẫn!',
            
        ]);

        $banner = new Banner();
        $banner->title = $request->title;
        $banner->link = $request->link;
        if($request->status == 1){
            $banner->status = "Hiện";
        }
        else{
            $banner->status = "Ẩn";
        }
        
        if($request->hasFile('image')){
            $file_img = $request->file('image');
            $name = $file_img->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("public/assets/images/banner/".$image)){
                $image = Str::random(4)."_".$name;
            }
            $file_img->move("public/assets/images/banner",$image);
            $banner->image = $image;

        }
        else{
            $banner->image = '';
        }
        
        if($request->hasFile('slide')){
            $file_slide = $request->file('slide');
            $name = $file_slide->getClientOriginalName();
            $slide = Str::random(4)."_".$name;
            while(file_exists("public/assets/images/banner/".$slide)){
                $slide = Str::random(4)."_".$name;
            }
            $file_slide->move("public/assets/images/banner",$slide);
            $banner->slide = $slide;
        }
        else{
            $banner->slide = '';
        }
        
        $banner->save();
        return redirect("admin/banner/insert")->with('success',"Thêm banner thành công!");
    }
    public function delete_banner($id){
       Banner::destroy($id);
        return redirect("admin/banner/list");

    }
    public function edit_banner($id){
        $banner = Banner::find($id);
        
        return view('admin.banner.EditBanner',['banner'=>$banner]);

    }
    public function post_edit_banner($id, Request $request){
        $this->validate($request,[
            'title'=>'required',
            'status'=>'required',
            'image'=>'required',
            'link'=>'required',   
            'slide'=>  'required'           
        ],[
            'title.required'=>'Bạn chưa nhập tiêu đề!',
            'status.required'=>'Bạn chưa chọn trạng thái!',
            'image.required'=>'Bạn chưa chọn ảnh nền!',
            'slide.required'=>"Bạn chưa chọn slide!",
            'link.required'=>'Bạn chưa nhập đường dẫn!',
        ]);

        $banner = Banner::find($id);
        $banner->title = $request->title;
        $banner->link = $request->link;
        if($request->status == 1){
            $banner->status = "Hiện";
        }
        else{
            $banner->status = "Ẩn";
        }
        
        if($request->hasFile('image')){
            $file_img = $request->file('image');
            $name = $file_img->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("public/assets/images/banner/".$image)){
                $image = Str::random(4)."_".$name;
            }
            if(file_exists("public/assets/images/banner/".$banner->image)){
                unlink("public/assets/images/banner/".$banner->image);
            }
            
            $file_img->move("public/assets/images/banner",$image);
            $banner->image = $image;

        }
        else{
            $banner->image = '';
        }
        
        if($request->hasFile('slide')){
            $file_slide = $request->file('slide');
            $name = $file_slide->getClientOriginalName();
            $slide = Str::random(4)."_".$name;
            while(file_exists("public/assets/images/banner/".$slide)){
                $slide = Str::random(4)."_".$name;
            }
            if(file_exists("public/assets/images/banner/".$banner->$slide)){
                unlink("public/assets/images/banner/".$banner->slide);
            }
            
            $file_slide->move("public/assets/images/banner",$slide);
            $banner->slide = $slide;
        }
        else{
            $banner->slide = '';
        }
        
        $banner->save();
        
        return redirect('admin/banner/list')->with('success','Update thành công!');

    }
}
