<!doctype html>
<html lang="en">
<head>
    <title>Admin Attendence System</title>
</head>
<body>

<div style="width: 100%; text-align: center;color: red;">
    <h1>Student Attendence Report </h1>
</div>

    <div style="">
        <h3 style="display: inline"><b> Name : </b></h3><h3 style="display: inline"><b>{{$user[0]->first_name." ".$user[0]->mid_name." ".$user[0]->last_name}}</b></h3>
        <br>
        <h3 style="display: inline"><b>Roll Number : </b></h3><h3 style="display: inline"><b>{{$attendence->roll_number}}</b></h3>
        <br>
        <h3 style="display: inline"><b>Class : </b></h3><h3 style="display: inline"><b>{{$attendence->student_class_id}}</b></h3>
        <br>
        <h3 style="display: inline"><b>Email : </b></h3><h3 style="display: inline">{{$user[0]->email}}</h3>
        <br>
        <h3 style="display: inline;"><b>Published Date : </b></h3> <h3 style="display: inline"><b>{{\Carbon\Carbon::now()->toDateString()}}</b></h3>
    </div>

<div style="display: flex; flex-direction: row; align-items: center;justify-content: center;width: 100%;height: fit-content">
<div style="width: 80%;height: fit-content">
<table style="width: 100%;text-align: left;border: green 2px solid">
<tr>
    <th style="padding-top: 12px;padding-bottom: 12px;background-color: green;color: white ">Attendence Date</th>
    <th style="padding-top: 12px;padding-bottom: 12px;background-color: green;color: white ">Status</th>
</tr>

    @foreach($attendence->attendences as $attende)

<tr>
    <td>{{$attende->attendence_date}}</td>
    @if($attende->status === 'present' ||$attende === 'absent')
    <td>{{$attende->status}}</td>
    @else
        <td>leave</td>
    @endif
</tr>
    @endforeach
</table>
</div>
</div>

</body>
</html>
