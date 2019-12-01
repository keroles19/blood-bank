<?php

namespace App\Http\Controllers\Donation;

use App\BloodType;
use App\City;
use App\Client;
use App\DonationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class donationController extends Controller
{

    //=========================   show all message
    public  function  index(){
        $records = DonationRequest::paginate(10);
        return view('donations.index',compact('records'));
    }

    //=========================== show post
    public function show($id)
    {

        $record = DonationRequest::findOrFail($id);
        return view('donations.show',compact('record'));


    }

    //=====================  search about message
    public  function filter()
    {
        $mySearch = $_GET['mySearch'];
        $data = DonationRequest::where('name', 'like', '%' .$mySearch. '%')
            ->orwhere('blood_type_id', 'like', '%' . $mySearch . '%')
            ->orwhereHas('city',function ($q) use ($mySearch){
                $q->where('cities.name','like','%'.$mySearch.'%');
            })->orWhereHas('client',function ($q) use($mySearch){
                $q->where('clients.name','like','%'.$mySearch.'%');
            })
            ->orderBy('id', 'desc')->get();

        $output = '';
        $count = $data->count();
        if ($count > 0) {
            foreach ($data as $row ) {

                $output .='   <tr>
                                    <td>'.$row->id.'</td>
                                    <td>'.$row->name.'</td>
                                    <td>'.BloodType::find($row->blood_type_id)->getAttribute('name').'</td>
                                    <td>'.City::find($row->city_id)->getAttribute('name').'</td>
                                    <td>'.Client::find($row->client_id)->getAttribute('name').'</td>
                                     <td>
                                        <a class="btn btn-sm btn-info" href="donation/'.$row->id.'">
                                            <span class="fa fa-info-circle fa-1x"> Show donation</span>

                                        </a>
                                    </td>
                                 
                                    <td>
                                        <form action="'.url('admin/donation/delete/'.$row->id).'" method="POST">
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
        $record = DonationRequest::findOrFail($id);
        $record->delete();
        return redirect('admin\donation')->with('status' , 'donation was deleted successfully :)');
    }
}
