

<div class="student-menu display-flex flex-direction-column flex-align-items-center flex-justify-content-center">
    @can('mark-attendence')
    @livewire('header',['name'=> 'Mark your attendence for today :','width'=> '100%','height' => '20%'])
    @elsecannot('mark-attendence')
        @livewire('header',['name'=> 'No Attendence for you today !!','width'=> '100%','height' => '20%'])
    @endcan
 <div style="width: 100%;height: 20%" class="display-flex flex-align-items-center flex-direction-row flex-justify-content-space-around">
      @can('mark-attendence')
        <button>Mark Attendence</button>
        <button>Mark Leave</button>
     @endcan
    <button>View Your Attendence</button>
 </div>
</div>