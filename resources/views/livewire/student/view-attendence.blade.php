<div>
   @livewire('header',['name'=>'View your Attendence','width'=>'100%','height'=>'10vh'])
    <div class="option-attendence-view display-flex flex-direction-row flex-align-items-center flex-justify-content-space-around">
        <button id="present" wire:click = "$emit('updateShow','present')">View Presents</button>
        <button id="absent" wire:click = "$emit('updateShow','absent')">View Absents</button>
        <button id="leave" wire:click = "$emit('updateShow','leave')">View Leaves</button>
    </div>
    <div id="attendence-view" class="display-flex flex-align-items-center flex-justify-content-center flex-direction-column">
        <div class="attendence-view-table"></div>
    </div>
</div>
