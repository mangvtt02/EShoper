<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Blog;
use App\Comment_blog;

class BlogController extends Controller
{
    public function getblog(Request $request){
        return view('admin.blog.ListBlog');
    }
    public function data_blog(Request $request){
        $blog = Blog::select("*");
        return Datatables::of($blog)
        ->addColumn('action', function ($blog) {
            $button = '<button type="button" class="btn btn-primary p-3" data-toggle="modal" data-target="#exampleModal_'.$blog->id.'">
            Xem chi tiết
          </button>
          <div class="modal fade" id="exampleModal_'.$blog->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" >
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
                        <td>'.$blog->description.'</td>
                      </tr>
                      <tr>
                        <th scope="col" >Trạng thái</th>
                        <td >'.$blog->content.'</td>
                      </tr>
                      <tr>
                        <th scope="col">Ngày tạo</th>
                        <td>'.$blog->created_at.'</td>
                      </tr>
                      <tr>
                        <th scope="col">Ngày cập nhật</th>
                        <td>'.$blog->updated_at.'</td>
                      </tr>
                    </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>';
          $button .= '<a href="'.route('admin.edit_blog',$blog->id).'" class="btn btn-xs btn-success ml-2 p-3"><i class="mdi mdi-pencil"></i> Cập nhật</a>';
          $button .= '<a href="'.route('admin.delete_blog',$blog->id).'" class="btn btn-xs btn-danger ml-2 p-3" id="delete_blog"><i class="mdi mdi-delete-variant"></i> Xóa</a>';
            return $button;
        })
        ->editColumn('image', function ($blog) {
            
            $img = '<img src="assets/images/blog/'.$blog->image.'" alt="'.$blog->image.'">';
            return $img;
        })
        ->rawColumns(['action','image'])
        ->make(true);
    }
    public function delete($id){
        Blog::destroy($id);
        return redirect()->route('admin.list_blog');
    }
    public function insert(){
        
        return view('admin.blog.InsertBlog');
    }
    public function post_insert(Request $request){
        $this->validate($request,[
            'image'=>'required',
            'title'=>'required|min:3|unique:blog,title',
            'content'=>'required|min:3',     
        ],[
            'image.required'=>'Bạn chưa chọn ảnh!',
            'title.required'=>'Bạn chưa nhập tiêu đề!',
            'title.min'=>'Tiêu đề tối thiểu 3 ký tự!',
            'title.unique'=>'Tiêu đề đã tồn tại!',
            'content.required'=>"Bạn chưa chọn slide!",
            'content.min'=>'Mô tả tối thiểu 3 ký tự!',
            
        ]);

        $blog = new Blog();
        if($request->hasFile('image')){
            $file_img = $request->file('image');
            $name = $file_img->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("public/assets/images/blog/".$image)){
                $image = Str::random(4)."_".$name;
            }
            $file_img->move("public/assets/images/blog",$image);
            $blog->image = $image;

        }
        else{
            $blog->image = '';
        }
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->content = $request->content;
        $blog->save();
        return redirect("admin/blog/insert")->with('success',"Thêm blog thành công!");
    }
    public function edit($id){
        $blog = Blog::find($id);
        return view('admin.blog.EditBlog',['blog'=>$blog]);
    }
    public function post_edit($id, Request $request ){
        $blog = Blog::find($id);
        $this->validate($request,[
            'image'=>'required',
            'title'=>'required|min:3',
            'content'=>'required|min:3',     
        ],[
            'image.required'=>'Bạn chưa chọn ảnh!',
            'title.required'=>'Bạn chưa nhập tiêu đề!',
            'title.min'=>'Tiêu đề tối thiểu 3 ký tự!',
            'content.required'=>"Bạn chưa chọn slide!",
            'content.min'=>'Mô tả tối thiểu 3 ký tự!',
            
        ]);

       
        if($request->hasFile('image')){
            $file_img = $request->file('image');
            $name = $file_img->getClientOriginalName();
            $image = Str::random(4)."_".$name;
            while(file_exists("public/assets/images/blog/".$image)){
                $image = Str::random(4)."_".$name;
            }
            if(file_exists("public/assets/images/blog/".$blog->image)){
                unlink("public/assets/images/blog/".$blog->image);
            }
            $file_img->move("public/assets/images/blog",$image);
            $blog->image = $image;

        }
        else{
            $blog->image = '';
        }
        $blog->title = $request->title;
        $blog->description = $request->description;
        $blog->content = $request->content;
        $blog->save();
        return redirect("admin/blog/edit/$id")->with('success',"Sửa blog thành công!");
    }



    //cmt
    public function get_cmt(){
        return view('admin.blog.Comment');
    }
    public function data_cmt(){
        $cmt_blog = Comment_blog::join('users', 'Comment_blogs.id_user', '=', 'users.id')->join('blog','Comment_blogs.id_blog','=','blog.id')->select(['Comment_blogs.id','Comment_blogs.id_blog', 'users.name', 'blog.title', 'Comment_blogs.comment', 'Comment_blogs.created_at','Comment_blogs.updated_at']);
        return Datatables::of($cmt_blog)
        ->addColumn('action', function ($cmt_blog) {
            $button = '<button type="button" class="btn btn-primary p-3" data-toggle="modal" data-target="#exampleModal_'.$cmt_blog->id.'">
            Xem chi tiết
          </button>
          <div class="modal fade" id="exampleModal_'.$cmt_blog->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" >
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
                        <th>ID Blog</th>
                        <td>'.$cmt_blog->id_blog.'</td>
                      </tr>
                      
                      <tr>
                        <th>Ngày tạo</th>
                        <td>'.$cmt_blog->created_at.'</td>
                      </tr>
                      <tr >
                        <th scope="col">Ngày cập nhật</th>
                        <td>'.$cmt_blog->updated_at.'</td>
                      </tr>
                    </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>';
          $button .= '<a href="'.route('admin.delete_cmt',$cmt_blog->id).'"  class="btn btn-xs btn-danger ml-2 p-3" id="delete_cmt_blog"><i class="mdi mdi-delete-variant"></i> Xóa</a>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function delete_cmt($id){
        Comment_blog::destroy($id);
        return redirect()->route('admin.list_cmt');
    }
}
