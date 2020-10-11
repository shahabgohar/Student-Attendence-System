@section('content')
<div class="create-student display-flex flex-direction-column flex-align-items-center flex-justify-content-flex-start">
    @livewire('header',['name' => 'Student Registeration Page','width'=> '70%','height' => '20%'])
<form style="margin-top: 2%; padding-top: 1%" class="student-form display-grid ">
<section class="name display-grid" >
<div class="display-flex flex-direction-column flex-justify-content-center">
    <label for="FirstName">First Name <span style="color: red">*</span> :</label>
    <input  type="text" name="FirstName">
</div>
    <div class="display-flex flex-direction-column flex-justify-content-center ">
        <label for="FirstName">Mid Name :</label>
        <input type="text" name="FirstName">
    </div>
    <div class="display-flex flex-direction-column flex-justify-content-center ">

        <label for="LastName">Last Name <span style="color: red">*</span> :</label>
        <input type="text" id="LastName" >
    </div>
</section>
    <section class="father-email display-grid ">
        <div  class="display-flex flex-direction-column flex-justify-content-center">
            <div>
                <label for="FatherName">Father Name <span style="color: red">*</span> :</label>
                <input type="text" name="FatherName">
            </div>
        </div>
        <div  class="display-flex flex-direction-column flex-justify-content-center">
            <div>
                <label for="FatherName">Father Name <span style="color: red">*</span> :</label>
                <input type="text" name="FatherName">
            </div>
        </div>

    </section>
    <section  class="roll-class display-grid flex-align-items-center ">
        <div class="display-flex flex-direction-column flex-justify-content-flex-end">
            <label for="RollNumber">Roll # <span style="color: red">*</span> :</label>
            <input type="number" name="RollNumber">
        </div>
        <div class="display-flex flex-direction-column flex-justify-content-flex-end">
            <label for="Class">Class <span style="color: red">*</span> :</label>
            <input type="number" name="Class">
        </div>
    </section>
    <section class="gender-profile display-grid flex-align-items-center">
        <div class="display-flex flex-direction-column flex-justify-content-flex-end">
            <label for="gender">Choose your gender <span style="color: red">*</span> :</label>
            <div class="">
                <label style="display: inline;" for="male">male</label>
            <input style="" name="gender" type="radio" value="M">
                <label style="display: inline" for="female">female</label>
            <input name="gender" type="radio" value="F">
            </div>
        </div>
        <div class="display-flex flex-direction-column ">
            <label for="photo">Profile Photo <span style="color: red">*</span> : </label>
            <input type="file" name="photo">
        </div>
    </section>
    <div class="student-registeration-form display-flex flex-direction-column flex-align-items-center flex-justify-content-center ">
            <button type="submit">Register Student</button>
    </div>
</form>
</div>
@endsection
