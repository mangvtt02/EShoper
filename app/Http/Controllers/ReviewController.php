<?php
namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use App\Comment;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function get_review(){
        return view('admin.review.ListReview');
    }
    public function data_review()
    {        
        $review = Comment::join('users', 'comment.id_user', '=', 'users.id')->join('product','comment.id_product','=','product.id')->select(['comment.created_at','comment.updated_at','comment.id', 'users.name', 'product.name as name_pr', 'comment.title', 'comment.content', 'comment.number_star']);
        return Datatables::of($review)
        ->addColumn('action', function ($review) {
            $button = '<button type="button" class="btn btn-primary p-3" data-toggle="modal" data-target="#exampleModal_'.$review->id.'">
            Xem chi tiết
          </button>
          <div class="modal fade" id="exampleModal_'.$review->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <td>'.$review->created_at.'</td>
                      </tr>
                      <tr>
                        <th scope="col">Ngày cập nhật</th>
                        <td>'.$review->updated_at.'</td>
                      </tr>
                    </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>';
          $button .= '<a href="'.route('admin.delete_review',$review->id).'"  class="btn btn-xs btn-danger ml-2 p-3" id="delete_review"><i class="mdi mdi-delete-variant"></i> Xóa</a>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function delete_review($id){
        Comment::destroy($id);
        return redirect()->route('admin.list_review');
    }
}
