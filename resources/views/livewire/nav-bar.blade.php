<nav class="display-flex flex-align-items-center flex-justify-content-space-between">
    @can('view-sidebar')
    <div class="hamburger display-flex flex-direction-column flex-align-items-center flex-justify-content-space-around" wire:click = "$emit('showDropdown','sidebar')">
        <div class=""></div>
        <div class=""></div>
        <div class=""></div>
    </div>
    @endcan
    <div class="nav-options display-flex flex-align-items-center flex-direction-row flex-justify-content-flex-end" >
        <div class="display-flex flex-align-items-center flex-direction-row flex-justify-content-center">
            <a href="" wire:click = "logoutUser" style="color: white">LogOut</a>
        </div>
    </div>
</nav>

