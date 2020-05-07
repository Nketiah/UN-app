<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Dues;
use Illuminate\Support\Facades\DB;



class DuesController extends Controller
{
    
    public function __construct()
    {
      $this->middleware(["auth:api"]);
    }

     
    public function storedues(Request $request)
    {
         $validator = Validator::make($request->all(), [
          'amount' => ['required','numeric'],
          'paid_month' => ['required'],
          'paid_year' => ['required'],
          'user_id' =>['']
       ]);

        if($validator->fails())
        {   
          sleep(2);
         return response()->json(['errors' => $validator->errors()]);
        }
        $dues = $request->all();
        Dues::create($dues);
        sleep(2);
        return response()->json(["success" => 200]);
    }

    public function totaldues()
    {
      //$totalDues = DB::table("dues")->sum("amount");
      $collection = Dues::all();
      $totalDues = $collection->sum('amount');

      return response()->json($totalDues);
    }

    public function getMonth()
     {        $monthNum = date('m');
              $monthName = date("F", mktime(0,0,0, $monthNum, 10));
              $data = DB::select(DB::raw("SELECT SUM(amount) as total FROM dues WHERE paid_month = '$monthName' "));
              return response()->json($data[0]);
    }


    public function getYear()
     {        $currentYear = date('Y');
              $data = DB::select(DB::raw("SELECT SUM(amount) as total FROM dues WHERE paid_year = '$currentYear' "));
              return response()->json($data[0]);
    }

}
