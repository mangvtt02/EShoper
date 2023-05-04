<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use App\Contact;
class ContactController extends Controller
{
    //contact
    public function get_contact(){
        return view('admin/contact/List_Contact');
    }
    public function data_contact(){
        $contact = Contact::select("*");
        return Datatables::of($contact)
        ->addColumn('action', function ($contact) {
            $button = '<button type="button" class="btn btn-primary p-3" data-toggle="modal" data-target="#exampleModal_'.$contact->id.'">
            Xem chi tiết
          </button>
          <div class="modal fade" id="exampleModal_'.$contact->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <td>'.$contact->created_at.'</td>
                      </tr>
                      <tr>
                        <th scope="col">Ngày cập nhật</th>
                        <td>'.$contact->updated_at.'</td>
                      </tr>
                    </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>';
          $button .= '<a href="'.route('admin.delete_banner',$contact->id).'"  class="btn btn-xs btn-danger ml-2 p-3" id="delete_contact"><i class="mdi mdi-delete-variant"></i> Xóa</a>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function delete_contact($id){
        Contact::destroy($id);
        return redirect()->route('admin.list_contact');
    }
}
