<?php
namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use App\contact_info;
use Illuminate\Http\Request;

class Contact_Info_Controller extends Controller
{
    public function get_contact_info(){
        return view('admin/contact_info/List_Contact_Info');
    }
    public function data_contact_info(){
        $contact_info = contact_info::select("*");
        return Datatables::of($contact_info)
        ->addColumn('action', function ($contact_info) {
            $button = '<button type="button" class="btn btn-primary p-3" data-toggle="modal" data-target="#exampleModal_'.$contact_info->id.'">
            Xem chi tiết
          </button>
          <div class="modal fade" id="exampleModal_'.$contact_info->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <td>'.$contact_info->created_at.'</td>
                      </tr>
                      <tr>
                        <th scope="col">Ngày cập nhật</th>
                        <td>'.$contact_info->updated_at.'</td>
                      </tr>
                    </table>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>';
          $button .= '<a href="'.route('admin.edit_contact_info',$contact_info->id).'" class="btn btn-xs btn-success ml-2 p-3"><i class="mdi mdi-pencil"></i> Cập nhật</a>';
          $button .= '<a href="'.route('admin.delete_contact_info',$contact_info->id).'"  class="btn btn-xs btn-danger ml-2 p-3" id="delete_contact_info"><i class="mdi mdi-delete-variant"></i> Xóa</a>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    public function insert_contact_info(){
        return view('admin/contact_info/Insert_Contact_Info');
    }
    public function post_insert_contact_info(Request $request){

        $this->validate($request,[
            'address'=>'required',
            'tel'=>'required',
            'fax'=>"required",
            'email'=>"required"
        ],[
            
            'address.required'=>'Địa chỉ không được để trống!',
            'tel.required'=>'Số điện thoại không được để trống!',
            'fax.required'=>'Số fax không được để trống!',
            'email.required'=>'Email không được để trống!',
        ]);
        $contact_info = new contact_info();
        $contact_info->address = $request->address;
        $contact_info->tel = $request->tel;
        $contact_info->fax = $request->fax;
        $contact_info->email = $request->email;
        $contact_info->save();
        return redirect()->route('admin.insert_contact_info')->with('success',"Thêm liên hệ thành công!");
       
    }

    public function edit_contact_info($id){
        $contact = contact_info::find($id);
      
        return view('admin/contact_info/Edit_Contact_Info',compact('contact'));
    }
    public function post_edit_contact_info($id, Request $request){
        $this->validate($request,[
            'address'=>'required',
            'tel'=>'required',
            'fax'=>"required",
            'email'=>"required"
        ],[
            
            'address.required'=>'Địa chỉ không được để trống!',
            'tel.required'=>'Số điện thoại không được để trống!',
            'fax.required'=>'Số fax không được để trống!',
            'email.required'=>'Email không được để trống!',
        ]);
        $contact_info = contact_info::find($id);
        $contact_info->address = $request->address;
        $contact_info->tel = $request->tel;
        $contact_info->fax = $request->fax;
        $contact_info->email = $request->email;
        $contact_info->save();
        return redirect()->route('admin.edit_contact_info',$id)->with('success',"Cập nhật liên hệ thành công!");
        
    }
    public function delete_contact_info($id){
        contact_info::destroy($id);
        return redirect()->route('admin.list_contact_info');
    }

    
}
