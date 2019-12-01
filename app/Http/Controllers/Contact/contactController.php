<?php

namespace App\Http\Controllers\Contact;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class contactController extends Controller
{
       //=========================   show all message
    public  function  index(){
        $records = Contact::paginate(10);
        return view('contacts.index',compact('records'));
    }


    //=====================  search about message
    public  function filter()
    {
        $mySearch = $_GET['mySearch'];
        $data = Contact::where('name', 'like', '%' .$mySearch  . '%')
            ->orWhere('email', 'like', '%' . $mySearch . '%')
            ->orwhere('phone', 'like', '%' . $mySearch . '%')
            ->orwhere('subject', 'like', '%' . $mySearch . '%')
            ->orwhere('message', 'like', '%' . $mySearch . '%')
            ->orderBy('id', 'desc')->get();

        $output = '';
        $count = $data->count();
        if ($count > 0) {
            foreach ($data as $row ) {

                $output .='   <tr>
                                    <td>'.$row->id.'</td>
                                    <td>'.$row->name.'</td>
                                    <td>'.$row->email.'</td>
                                    <td>'.$row->phone.'</td>
                                    <td>'.$row->subject.'</td>
                                    <td>'.$row->message.'</td>
                                 
                                    <td>
                                        <form action="'.url('admin/contact/delete/'.$row->id).'" method="POST">
                                            '.csrf_field().'
                                            <input type="hidden" name="_method" value="DELETE"> 
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>

                                    </td>
                                </tr>';

            }


        } else {
            $output = '<tr>
                            <td colspan="6"><div class="alert alert-info">No Result Found</div> </td>
                        </tr>';
        }
        return $output;
    }

    //================= delete message
    public function destroy($id)
    {
        $record = Contact::findOrFail($id);
        $record->delete();
        return redirect('admin\contact')->with('status' , 'client was deleted successfully :)');
    }
}
