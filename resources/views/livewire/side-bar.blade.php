@can('view-sidebar')
<aside id="sidebar" style=" display: none">
    <div class="display-flex flex-direction-column flex-align-items-center flex-justify-content-center">
        <div class="close-sign" wire:click = "$emit('showDropdown','sidebar')"></div>
        <div class="aside-element display-flex flex-direction-row flex-align-items-center flex-justify-content-space-between" >
            <h1 wire:click="goto('{{route('student-details')}}')">Students</h1>
            <div class="dropdown" wire:click = "$emit('showDropdown','studentAside')"></div>
        </div>
        <div id="studentAside" style="display: none" class="aside-element aside-element-dropdown display-flex flex-direction-column flex-align-item-start flex-justify-content-flex-start">
            <h1 wire:click="goto('{{route('create-student')}}')">Create</h1>
        </div>
        <div class="aside-element display-flex flex-direction-row flex-align-items-center flex-justify-content-space-between" >
            <h1>Classes</h1>
            <div class="dropdown" wire:click = "$emit('showDropdown','ClassAside')"></div>
        </div>
        <div id="ClassAside" style="display: none" class="aside-element aside-element-dropdown display-flex flex-direction-column flex-align-item-start flex-justify-content-flex-start">
            <h1>Create</h1>
        </div>
        <div class="aside-element display-flex flex-direction-row flex-align-items-center flex-justify-content-space-between" >
            <h1 wire:click="goto('{{route('student-attendence')}}')">Attendence</h1>

        </div>
        <div class="aside-element display-flex flex-direction-row flex-align-items-center flex-justify-content-space-between" >
            <h1 wire:click="goto('{{route('attendence-report')}}')">Generate Report</h1>

        </div>
        <div class="aside-element display-flex flex-direction-row flex-align-items-center flex-justify-content-space-between" >
            <h1 wire:click="goto('{{route('create-attendence')}}')">Create Attendence</h1>

        </div>
    </div>
</aside>
@endcan
