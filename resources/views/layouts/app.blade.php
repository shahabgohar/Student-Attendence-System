<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{asset('js/app.js')}}" defer ></script>
    @if(Route::currentRouteName() === 'submit-leave' || Route::currentRouteName()=== 'attendence-details')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js" ></script>
    @endif
    <link rel="stylesheet" href="{{asset('css/admin/app.css')}}">
    @livewireStyles
    @livewireScripts
    <script
        src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" defer></script>
    @if(Route::currentRouteName() === 'student-details')
        <script src="{{asset('js/student-details.js')}}" defer></script>
    @endif
    @if(Route::currentRouteName() === 'student-attendence')
        <script src="https://unpkg.com/cheetah-grid@0.22" defer></script>
        @endif
    <title>Admin Dashboard</title>


</head>
<body>
@if(\Illuminate\Support\Facades\Auth::check())
@livewire('nav-bar')
@livewire('side-bar')
@endif
@yield('content')
</body>
{{--script for attendence component--}}
@if(Route::currentRouteName() === 'attendence-report')
<script src="{{asset('js/student-report.js')}}" defer></script>
@endif
@if(Route::currentRouteName() === 'submit-leave')
<script src="{{asset('js/submit-leave.js')}}" defer></script>
@endif
@if(Route::currentRouteName() === 'view-attendence-page')
    <script src="https://unpkg.com/cheetah-grid@0.22" defer></script>
    <script src="{{asset('js/view-attendence.js')}}" defer ></script>
@endif
@if( Route::currentRouteName()=== 'student-attendence')
    <script src="https://unpkg.com/cheetah-grid@0.22" defer></script>
    <script src="{{asset('js/attendence.js')}}" defer ></script>
@endif
@if( Route::currentRouteName()=== 'attendence-details')
    <script src="{{asset('js/attendence-details.js')}}" defer ></script>
    <script src="{{asset('js/leave-approval.js')}}" defer></script>
@endif



<script defer>

 Livewire.on('selectMultiple', data => {
     let parent = document.getElementById('selected-criteria')
     let child  = document.createElement('div')
     child.classList.add("display-flex")
     child.classList.add("flex-direction-row")
     child.classList.add('flex-justify-content-space-between')
     child.classList.add('flex-align-items-center')
     child.append(data)
     let text = document.createElement("p")
     text.textContent = "x"
     child.appendChild(text)
     parent.appendChild(child)
     document.getElementById(data+"-1").style.display = "block"
     document.getElementById('dropdown-attendence').removeChild(document.getElementById(data))
 })
 Livewire.on("showDropdown",data=>{
     let sidebar =  document.getElementById(data)
     if(sidebar.style.display == 'block'){
         sidebar.style.display = "none"
     }else{
         sidebar.style.display="block"
     }

 })
 function toggleSidebar(){
     let sidebar =  document.getElementById("sidebar")
     if(sidebar.style.display == 'block'){
         sidebar.style.display = "none"
     }else{
         sidebar.style.display="block"
     }
 }
 document.getElementById("hamburger-sidebar").addEventListener("click",toggleSidebar)
 document.getElementById("close-sidebar").addEventListener("click",toggleSidebar)
</script>

</html>
