import Cheetah from "cheetah-grid"
var studentRecord = null
var grid = null
viewAttendence();
document.getElementById("present").classList.add("selected-option-attendence-view")
function viewAttendence(type="present"){
    axios.post(window.appUrl+"/view/attendence/",{type:type}).then(response => {
        studentRecord = response.data
        loadData()
    }).catch(error => {
        console.log(error)
    })

}

function loadData(){

     grid = new Cheetah.ListGrid({
        // Parent element on which to place the grid
        parentElement: document.querySelector('.attendence-view-table'),
        // Header definition
        header: [

            {field: 'attendence_date', caption: 'Attendence Date', width: '33.33%'},
            {field: 'student_class_id', caption: 'Class', width:'33.33%' },
            {field: 'status', caption: 'Status', width: '33.33%'},
        ],
        // Array data to be displayed on the grid
        records: studentRecord,
        // Column fixed position
        frozenColCount: 2,
    });

}
Livewire.on('updateShow', data=>{
    let ids = ['present','absent','leave']
    for (let i=0;i<ids.length;i++){
        if( document.getElementById(ids[i]).classList.contains("selected-option-attendence-view"))
                document.getElementById(ids[i]).classList.remove("selected-option-attendence-view")
    }
    document.getElementById(data).classList.add("selected-option-attendence-view")
    axios.post(window.appUrl+"/view/attendence/",{type:data}).then(response => {
        studentRecord = response.data
        grid.records = studentRecord
    }).catch(error => {
        console.log(error)
    })
})
