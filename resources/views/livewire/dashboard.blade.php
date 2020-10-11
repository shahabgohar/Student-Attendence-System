@section('content')
<div style="padding-top: 1%" class="dashbard display-flex flex-direction-column flex-align-items-center flex-justify-content-flex-start">
@livewire('header',['name' => 'Dashboard'])
    <div class="summary-blocks display-grid grid-align-items-content grid-justify-content">
        <div class="display-flex flex-direction-column flex-align-items-center flex-justify-content-space-around">
            <h1>Total Students</h1>
            <h2>{{$total_students}}</h2>
        </div>
        <div class="display-flex flex-direction-column flex-align-items-center flex-justify-content-space-around">
            <h1>Total Classes</h1>
            <h2>{{$total_classes}}</h2>
        </div>
        <div class="display-flex flex-direction-column flex-align-items-center flex-justify-content-space-around">
            <h1>Student Presents</h1>
            <h2>{{$attendence_percentage}} %</h2>
        </div>


    </div>
</div>
@endsection
