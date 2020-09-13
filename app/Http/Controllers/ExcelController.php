<?php

namespace App\Http\Controllers;
use App\ActRules;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Excel;
use App\ExcelReport;
use App\ExcelReportDetails;
use Illuminate\Support\Facades\Storage;
use App\Imports\ExcelImport;
class ExcelController extends Controller
{
    
    public function store(Request $request)
    {
   
     
       
       
            if ($files = $request->file('file')) {
                $orginal_file_name = $files->getClientOriginalName();
              $exten = $files->getClientOriginalExtension();
              if($exten == 'xlsx'){
                  $new_data['excel_name']=$filename  = time(). $orginal_file_name;
                    $files->move(public_path('documents'),$filename); 
                   // return $new_data;
                   $res = ExcelReport::create($new_data);
                   $slave_data['excel_id'] = $res->id;
                    $array = Excel::toArray(new ExcelImport, public_path('documents/'.$new_data['excel_name']));
                    $res_array =$array[0];
                    if(count($res_array) >1){
                            for($i=1; $i <count($res_array);$i++){
                                $slave_data['name'] =$res_array[$i][0];
                                $slave_data['phone'] =$res_array[$i][1];                       
                                $slave_data['email'] =$res_array[$i][2];
                                $slave_data['details'] =$res_array[$i][3];
                                if(!empty($res_array[$i][0]) && !empty($res_array[$i][1]) && !empty($res_array[$i][2]) && !empty($res_array[$i][3])){
                                    ExcelReportDetails::create($slave_data);
                                }$slave_data= array();
                            }  

                    }
                  return $res;
                }else{
                    echo json_encode("Import Excel file only");
                }
                
                }else{
                    echo json_encode("Import Excel file only");
                }
        


        }
    public function details(Request $request){
       
            $res = ExcelReport::with('details');
        if($request->file_id != ''){
            $res->where('id',$request->file_id);
        }elseif($request->file_name != ''){
            $res->where('excel_name',$request->file_name);
        }
        return $res->get();

    }

    public function download($id){
        $res = ExcelReport::find($id);
        $file = $res->excel_name;
      
        return response()->download(public_path('documents/'.$file));
      
    }
  
}
