
    <div class="create-student display-flex flex-direction-column flex-align-items-center flex-justify-content-flex-start">

        @livewire('header',['name' => 'Student Registeration Page','width'=> '70%','height' => '20%'])
        <form style="margin-top: 2%; padding-top: 1%" class="student-form display-grid " wire:submit.prevent="signUpUser" enctype="multipart/form-data">
            <section class="name display-grid" >
                <div class="display-flex flex-direction-column flex-justify-content-center">
                    <label for="FirstName">First Name <span style="color: red">*</span> :</label>
                    <input wire:model.defer = "form.first_name" type="text" name="FirstName">
                    @error('form.first_name')<span style="color:red">{{$message}}</span>@enderror
                </div>
                <div class="display-flex flex-direction-column flex-justify-content-center ">
                    <label for="FirstName">Mid Name :</label>
                    <input wire:model.defer = "form.mid_name" type="text" name="FirstName">
                    @error('form.mid_name')<span style="color:red">{{$message}}</span>@enderror
                </div>
                <div class="display-flex flex-direction-column flex-justify-content-center ">

                    <label for="LastName">Last Name <span style="color: red">*</span> :</label>
                    <input wire:model.defer="form.last_name" type="text" id="LastName" >
                    @error('form.last_name')<span style="color:red">{{$message}}</span>@enderror
                </div>
            </section>
            <section class="father-email display-grid ">
                <div  class="display-flex flex-direction-column flex-justify-content-center">
                    <div>
                        <label for="FatherName">Email <span style="color: red">*</span> :</label>
                        <input wire:model.defer="form.email" type="Email" name="FatherName">
                        @error('form.email')<span style="color:red">{{$message}}</span>@enderror
                    </div>
                </div>
                <div  class="display-flex flex-direction-column flex-justify-content-center">
                    <div>
                        <label for="FatherName">Father Name <span style="color: red">*</span> :</label>
                        <input wire:model.defer="form.father_name" type="text" name="FatherName">
                        @error('form.father_name')<span style="color:red">{{$message}}</span>@enderror
                    </div>
                </div>

            </section>
            <section  class="roll-class display-grid flex-align-items-center ">
                <div class="display-flex flex-direction-column flex-justify-content-flex-end">
                    <label for="RollNumber">Roll # <span style="color: red">*</span> :</label>
                    <input wire:model.defer="form.roll_number" type="number" name="RollNumber">
                    @error('form.roll_number')<span style="color:red">{{$message}}</span>@enderror
                </div>
                <div class="display-flex flex-direction-column flex-justify-content-flex-end">
                    <label for="Class">Class <span style="color: red">*</span> :</label>
                    <input wire:model.defer="form.student_class_id" type="number" name="Class">
                    @error('form.student_class_id')<span style="color:red">{{$message}}</span>@enderror
                </div>
            </section>
            <section class="gender-profile display-grid flex-align-items-center">
                <div class="display-flex flex-direction-column flex-justify-content-flex-end">
                    <label for="gender">Choose your gender <span style="color: red">*</span> :</label>
                    <div class="">
                        <label style="display: inline;" for="male">male</label>
                        <input wire:model.defer="form.gender" style="" name="gender" type="radio" value="M">
                        <label style="display: inline" for="female">female</label>
                        <input wire:model.defer="form.gender" name="gender" type="radio" value="F">
                    </div>
                    @error('form.gender')<span style="color:red">{{$message}}</span>@enderror
                </div>
                <div class="display-flex flex-direction-column ">
                    <label for="photo">Profile Photo <span style="color: red">*</span> : </label>
                    <input wire:model.defer="form.photo" type="file" name="photo">
                    @error('form.photo')<span style="color:red">{{$message}}</span>@enderror
                </div>
            </section>

            <section class="password display-grid flex-align-items-center">
                <div style="width: 100%;height: 100%" class="display-flex flex-direction-row flex-align-items-center flex-justify-content-space-between">
                    <div style="width: 50%; height: 100%" class="display-flex flex-direction-column ">
                        <label for="password">Password <span style="color: red" >*</span> : </label>
                        <input  wire:model.defer.prevent="form.password"  disabled type="password" name="password" required>
                    </div>
                    <button  type="submit" style="width: 40%;height: 100%; background-color: black;color: white">Register Student</button>
                </div>
            </section>

        </form>
    </div>

