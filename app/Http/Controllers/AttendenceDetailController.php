<?php

namespace App\Http\Controllers;

use App\Models\AttendenceDetail;
use App\ReuseableCode\MarkAttendence;
use App\ReuseableCode\ProvideDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AttendenceDetailController extends Controller
{
    use ProvideDate, MarkAttendence;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $attendences = AttendenceDetail::select('student_class_id','attendence_date','start_time','end_time',
            DB::raw("(CASE WHEN expired = 1 THEN 'yes' ELSE 'No' END) as expired")
            )->get();
        return response()->json($attendences);
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
        $application = $request->input('application');
        $result = $this->markAttendence(json_encode($application));
        return response()->json($result,200);
    }

    /*
     * Display the specified resource.
     *
     * @param  \App\Models\AttendenceDetail  $attendenceDetail
     * @return \Illuminate\Http\Response
     */
    public function show(AttendenceDetail $attendenceDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttendenceDetail  $attendenceDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(AttendenceDetail $attendenceDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttendenceDetail  $attendenceDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttendenceDetail $attendenceDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttendenceDetail  $attendenceDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendenceDetail $attendenceDetail)
    {
        //
    }
}
