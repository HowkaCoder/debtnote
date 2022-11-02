<?php

namespace App\Http\Controllers;

use App\Http\Requests\DebtRequest;
use App\Http\Resources\DebtResource;
use App\Models\Debt;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DebtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response(["data"=>DebtResource::collection(Debt::where('status' , 1)->get())] , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DebtRequest $request)
    {
        $mytime = Carbon::now();
        $date =  $mytime->toDateTimeString();

        Debt::create([
            "user_id"=>$request->user_id,
            "d_name"=>$request->d_name,
            "d_phone"=>$request->d_phone,
            "product_name"=>$request->product_name,
            "product_count"=>$request->product_count,
            "cost"=>$request->cost,
            "date"=>$date
        ]);

        return response(["message"=>"Successfully created"] , 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $debt = Debt::where('id' , $id)->get();

        return response(["message"=>"show_id" ,"data"=> DebtResource::collection($debt)] , 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DebtRequest $request, $id)
    {
        // return "dede";
        $mytime = Carbon::now();
        $date =  $mytime->toDateTimeString();

        Debt::where('id' , $id)->update($request->only([
            "user_id",
            "d_name",
            "d_phone",
            "product_name",
            "product_count",
            "cost"
        ]));
        return response([
            'message' => 'debt_updated'
        ] , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Debt::where('id',$id)->update(['status'=>0]);

        return response(["message"=>"deleted successfully"  ], 200);
    }
}
