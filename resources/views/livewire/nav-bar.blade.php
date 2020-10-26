<nav class="display-flex flex-direction-row flex-align-items-center flex-justify-content-space-between">
    @can('view-sidebar')
    <div id="hamburger-sidebar" class="hamburger display-flex flex-direction-column flex-align-items-center flex-justify-content-space-around" >
        <div class=""></div>
        <div class=""></div>
        <div class=""></div>
    </div>
    @endcan
    <div class=""></div>
    <div class="nav-options display-flex flex-align-items-center flex-direction-row flex-justify-content-flex-end" >
        <div class="display-flex flex-align-items-center flex-direction-row flex-justify-content-center">
            <a href="" wire:click = "logoutUser" style="color: white">LogOut</a>
        </div>
    </div>
</nav>


