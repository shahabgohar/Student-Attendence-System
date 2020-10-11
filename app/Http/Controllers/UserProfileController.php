<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jimmyjs\ReportGenerator\ReportMedia\PdfReport;

class UserProfileController extends Controller
{


    public function search_user_for_report(Request $request){
//        get the date
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        $attendences = UserProfile::search
        ([$request->input('roll_number'),$request->input('student_class_id')])
            ->with(['attendences' => function ($querry) use ($from_date,$to_date){
            $querry->whereBetween('attendences.attendence_date',[$from_date,$to_date]);
        }])->get();

        if(count($attendences) > 0){
            //        general user info
            $user = \App\Models\User::select('first_name','mid_name','last_name','email')
                ->where('id','=',$attendences[0]->user_id)
                ->get();

//        make pdf
            $pdf = \PDF::loadview('login',['user'=>$user,'attendence'=>$attendences[0]]);
//            return \response()->json(['email'=>$user[0]->email,'file'=>base64_encode($pdf->download($user[0]->email))]);
                return $pdf->download();
        }else{
            return response()->json('no attendence found',422);
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show(UserProfile $userProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProfile $userProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProfile $userProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
