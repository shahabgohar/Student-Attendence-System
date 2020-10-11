<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Models\User;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {


        $result = \Illuminate\Support\Facades\DB::table('user_profiles')
            ->select(['user_profiles.id','users.first_name','attendences.attendence_date','users.last_name','attendences.attendence_date','attendences.status'])
            ->join('attendences','user_profiles.id','=','attendences.user_profile_id')
            ->join('users','users.id','=','user_profiles.id')
            ->whereNull('attendences.deleted_at')
            ->orderBy('user_profiles.id','asc')->get();
        return response()->json($result);
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
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function show(Attendence $attendence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendence $attendence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendence $attendence)
    {
       $result =  $attendence->update(
           [
               'attendence_date'=> $request->input('attendence_date'),
               'status' => $request->input('status')
           ]
       );
        return response()->json($result);

//       return response()->json(
//           $user->attendences()->where('attendence_date','=',
//               date('y-m-d',strtotime($request->input('attendence_date')))
//               )->get()
//       );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendence $attendence)
    {
        $result = $attendence->delete();
        return response()->json($result);
    }
}