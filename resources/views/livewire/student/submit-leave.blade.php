<div  class="submit-application display-flex flex-direction-column flex-justify-content-flex-start flex-align-items-center">
    @livewire('header',['name'=>'Write Application and submit','width'=> '100%','height' => '10%',
    'bgcolor'=>'brown'
    ])
<div id="text-area">


  </div>
    <button class="leave-submit" wire:click.prevent="$emit('hello')" >Submit Leave</button>
</div>
