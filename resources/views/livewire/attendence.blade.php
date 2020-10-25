<div class="display-flex flex-direction-column flex-align-items-center flex-justify-content-flex-start attendence-admin">
    @livewire('header',['name'=>'Attendence Center','width' => '70%', 'height' => '20vh'])
    <div class="attendece-search display-grid">
        <div class="selected-criteria-label display-flex flex-direction-row flex-align-items-center flex-justify-content-flex-start" >
            Select the Search Criteria :
        </div>
        <div class="attendece-search-dropdown">
            <div id="dd" class="display-flex flex-direction-row flex-justify-content-flex-end" wire:click="$emit('showDropdown','dropdown-attendence')">
               <div class="drop-arrow"></div>
            </div>
            <div style="display: none" id="dropdown-attendence" class="attendece-search-dropdown-list display-flex flex-direction-column flex-justify-content-flex-start">
               @foreach($searchOptions as $key => $value)
                  <p style="margin-left: 1%" id="{{$value}}"  wire:click="$emit('selectMultiple','{{$value}}')">{{$key}}</p>
                @endforeach
            </div>
        </div>
        <div id="selected-criteria" class="selected-criteria display-flex flex-direction-row flex-wrap flex-wrap">

        </div>
        <div class="select-attendence display-flex flex-direction-column flex-justify-content-space-around">
        <div id="name-1" style="height: 25%; display: none;" class="display-flex flex-align-items-stretch flex-justify-content-center">
            <label for="name">Enter Name : <span style="color: red">*</span></label>
            <input type="text" name="name" style="width: 70%; height: 100%" >
        </div>
        <div id="class-1" style="height: 25%; display: none;" class=" display-flex flex-direction-row flex-justify-content-space-between">
            <label for="class">Enter Class : <span style="color: red">*</span></label>
            <input type="number" name="name" style="width: 70%; height: 100%">
        </div>
        <div id="email-1" style="height: 25%; display: none;" class="display-flex flex-direction-row flex-justify-content-space-between">
            <label for="email">Enter Email : <span style="color: red">*</span></label>
            <input type="email" name="email" style="width: 70%; height: 100%">
        </div>
        <div id="rollNumber-1" style="height: 25%;display: none;" class="display-flex flex-direction-row flex-justify-content-space-between">
            <label for="rollnumber">Enter Roll# : <span style="color: red">*</span></label>
            <input type="number" name="rollnumber" style="width: 70%; height: 100%">
        </div>
        </div>

    </div>
    <div class="attendence-result">

    </div>
</div>
