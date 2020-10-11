<div class="admin-report display-flex flex-direction-column flex-align-items-center flex-justify-content-flex-start">
    @livewire('header',['name'=>'Student Attendence Report Generation Section',
                         'width' => '80%', 'height' => '20vh' ])
    <form action="{{route('get-report')}}" style="width: 100%;height: fit-content;" class="display-flex flex-direction-column flex-align-items-center flex-justify-content-center">
    <div class="student-search-report display-grid">
            <div class="display-flex flex-align-items-center flex-justify-content-center">
                <div class="">
                    <label for="RollNumber">Roll Number: <span style="color: red">*</span></label>
                    <input id="report-roll-number" type="number" name="roll_number" required minlength="1" maxlength="2" size="2">
                    <span id="report-roll-number-error"  style="color: red;display: none">Roll Number is required</span>
                </div>
            </div>
        <div class="display-flex flex-align-items-center flex-justify-content-center">
            <div class="">
                <label for="Class">Class: <span style="color: red">*</span></label>
                <input id="report-class"  type="number" name="student_class_id" required>
                <span id="report-class-error" style="color: red;display: none;" id="report-class-error">Class is required</span>
            </div>
        </div>
        <div class="display-flex flex-align-items-center flex-justify-content-center">
            <div class="">
                <label for="Class">From Date: <span style="color: red">*</span></label>
                <input id="report-from-date" type="date" name="from_date" required>
                <span style="color: red">From Date is required</span>
            </div>
        </div>
        <div class="display-flex flex-align-items-center flex-justify-content-center">
            <div class="">
                <label for="Class">To Date: <span style="color: red">*</span></label>
                <input id="report-to-date"  type="date" name="to_date" required>
                <span style="color: red">To Date is required</span>
            </div>
        </div>

    </div>
    <div class="search-student-report display-flex flex-direction-row flex-align-items-center flex-justify-content-center">
        <button wire:click = "$emit('submitForReport')">Search</button>
    </div></form>
</div>

