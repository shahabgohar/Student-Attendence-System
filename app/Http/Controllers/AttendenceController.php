<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use App\Models\User;
use App\ReuseableCode\MarkAttendence;
use App\ReuseableCode\ProvideDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendenceController extends Controller
{
    use ProvideDate, MarkAttendence;
    public function __construct(){
      //  $this->middleware(['auth']);
    }

    public function getApplication($id){
        $application =
            Attendence::
            find((int)$id);
        return response()->json($application);
    }
    public function getLeavesForApproval(){
//        get the pending leaves from the database
        $data = DB::table('attendences')
            ->join("user_profiles",'attendences.id','=','user_profiles.id')
            ->join('users','users.id','=','user_profiles.id')
            ->select('attendences.id','attendences.student_class_id','user_profiles.roll_number','users.first_name','users.last_name')
            ->where('attendences.leave_approval','=',1)
           ->paginate(15);
        return response()->json($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {


        $result = \Illuminate\Support\Facades\DB::table('user_profiles')
            ->select('user_profiles.id','users.first_name','attendences.attendence_date','users.last_name','attendences.attendence_date',
                DB::raw(
                    " (CASE
            WHEN attendences.status = 'present' THEN 'present'
            WHEN attendences.status = 'absent' THEN 'absent'
            ELSE
                'Leave'
            END)
            AS
            status
            "
                )
                )
            ->join('attendences','user_profiles.id','=','attendences.user_profile_id')
            ->join('users','users.id','=','user_profiles.id')
            ->whereNull('attendences.deleted_at')
            ->orderBy('user_profiles.id','asc')->get();
        return response()->json($result);
    }

    public function showAttendenceByUser(Request $request)
    {
        if($request->type == 'leave') return \response()->json(Auth::user()->user_profile()->first()->attendences()->where('attendences.status','<>','present')->where('attendences.status','<>','absent')->get());
       else return \response()->json(Auth::user()->user_profile()->first()->attendences()->where('attendences.status','=',$request->type)->get());
    }
    public function approveApplication(Request $request){
        $input = $request->input('id');
        $result = Attendence::find($input)->update(['leave_approval'=>3]);
        return response()->json($result);
    }
    public function disapprovApplication(Request $request){
        $input = $request->input('id');
        $result = Attendence::find($input)->update(['leave_approval'=>2]);
        return response()->json($result);
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
