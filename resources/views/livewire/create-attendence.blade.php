<div class="admin-create-attendence display-flex flex-direction-column flex-align-items-center flex-justify-content-center">
    @livewire('header',['name'=>'Create Attendence',
    'width' => '100%', 'height' => '20%' ])
    <div class="display-grid admin-create-attendence-form">
     <div class="">
         <label for="create-attendence-class">Enter Class <span style="color:red">*</span></label>
     <input wire:model.defer = "enter_class" type="number" id="create-attendence-class">
         <span style="color:red"></span>
     </div>
     <div class="">
         <label for="create-attendence-date">Choose Date <span style="color:red">*</span></label>
     <input wire:model.defer = "attendence_date" type="date" id="create-attendence-date">
     </div>
     <div class="">
         <label for="create-attendence-from">From Date : <span style="color:red">*</span></label>
     <input wire:model.defer ="from_time" type="time" id="create-attendence-from">
     </div>
     <div class="">
         <label for="create-attendence-to">To Date : <span style="color:red">*</span></label>
     <input wire:model.defer = "to_time" type="time" id="create-attendence-to">
     </div>
 </div>
    @if(session()->exists('success'))
        <div style="width: 100%; margin-top: 2%" class="display-flex flex-align-items-center flex-justify-content-center">
        <span style="color: green"> * {{session()->pull('success','delete')}} *</span>
        </div>
    @endif
    @if(session()->exists('class_error'))
        <div style="width: 100%;margin-top: 2%" class="display-flex flex-align-items-center flex-justify-content-center">
        <span style="color: red"> * {{session()->pull('class_error','delete')}} *</span>
        </div>
    @endif
    <div style="width: 100%;height: 20%;" class="display-flex flex-align-items-center flex-justify-content-center">
        <button style="width: 40%; height: 50%;font-size: 30px; border-radius: 10%;" wire:click.prevent="createAttendence">Create Attendence</button>
    </div>
</div>
