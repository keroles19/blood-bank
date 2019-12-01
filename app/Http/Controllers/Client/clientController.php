<?php

namespace App\Http\Controllers\Client;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class clientController extends Controller
{
    //=======================   list&filter  delete  active & de-active ======================

    public  function  index(){
        $records = Client::paginate(10);
        return view('clients.index',compact('records'));
    }



    //====================== active & de-active

    public  function status($id) {
        $record = Client::findOrFail($id);
        if($record){
            $s = $record->getAttribute('active');
            if($s == 0 )
                $record->active = 1;
            else
                $record->active = 0;
            $record->save();
            return redirect('admin/client')->with('status' , 'client status was updated');
        }
        else{
            return error_log("please try again");
        }
    }

    //=================================  search

    public  function filter()
    {
            $mySearch = $_GET['mySearch'];
            $data = Client::where('phone', 'like', '%' .$mySearch  . '%')
                ->orWhere('name', 'like', '%' . $mySearch . '%')
                ->orwhere('email', 'like', '%' . $mySearch . '%')
                ->orderBy('id', 'desc')->get();

        $output = '';
        $count = $data->count();
        if ($count > 0) {
           foreach ($data as $row ) {

                $output .='   <tr>
                                    <td>'.$row->id.'</td>
                                    <td>'.$row->phone.'</td>
                                    <td>'.$row->name.'</td>
                                    <td>'.$row->email.'</td>
                                    <td>
                                        <form action="'.url('admin/client/delete/'.$row->id).'" method="POST">
                                            '.csrf_field().'
                                            <input type="hidden" name="_method" value="DELETE"> 
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>

                                    </td>
                                    <td>

                                        <!-- active and de-active button by ajax -->
                                        <form action="'.url('admin/client/status/'.$row->id).'" method="POST">
                                         '.csrf_field().'                                            
                                          <input type="hidden" name="_method" value="PUT"> 
                                             <button type="submit" class="btn btn-sm '.activeStatus($row->active)[0].'">
                                                '.activeStatus($row->active)[1].'
                                                </button>
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

    //================================== delete client
    public function destroy($id)
    {
        $record = Client::findOrFail($id);
        $record->delete();
        return redirect('admin\client')->with('status' , 'client was deleted successfully :)');
    }




}
