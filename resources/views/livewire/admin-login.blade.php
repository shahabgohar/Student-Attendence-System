
<div class="admin-login display-flex  flex-align-items-center flex-justify-content-center">
    <div class="admin-form display-flex flex-direction-column flex-justify-content-center" >
        @livewire('header',['name'=> 'Admin Login','width'=> '100%','height' => '20%'])
    <form  class=" display-flex flex-direction-column flex-justify-content-center" wire:submit.prevent="login_user" >
        <section style="margin: 2%;">
        <label for="Email">Email :<span style="color: red">*</span></label>
        <input type="email" wire:model.defer = "email" required>
            @error('email')<span style="color: red">* {{$email}} *</span>@enderror
        </section>
        <section style="margin: 2%;">
            <label for="Password">Password :<span style="color: red">*</span></label>
            <input type="password" wire:model.defer = "password" required>
            @error('password')<span style="color: red">* {{$password}} *</span>@enderror
        </section>
            @if(session()->exists('error-general'))
              <span style="color: red"> * {{session()->pull('error-general','delete')}} *</span>
        @endif
            <button  style="width: 40%; height: 5vh; align-self: center;justify-self: flex-end; color: white; background-color: black"  type="submit">Login</button>

    </form>
    </div>
</div>

