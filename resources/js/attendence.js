
    var dropdownAttendence = document.getElementById('dropdown-attendence')
    document.addEventListener('click',(e)=>{
    if(dropdownAttendence.style.display === "block"){
    var preventIds = ['dropdown-attendence','dd','dropdown-attendence']
    var mouseOverElement = document.elementFromPoint(e.clientX,e.clientY)
    var shouldFalse = 0
    for(let i = 0 ; i < preventIds.length; i++){
    if(mouseOverElement.id === preventIds[i]){
    shouldFalse++;
}
}
    if(shouldFalse === 0){
    dropdownAttendence.style.display = "none"
}
}

})
    function closeDropDownAttendence(){
    alert("hello")
    if(dropdownAttendence.style.display === "none"){
    dropdownAttendence.style.display = "block"
}else{
    dropdownAttendence.style.display = "none"
}
}
    var studentRecord = null
    window.axios.get(window.appUrl+"/student/attendence/list").then(response => {
        console.log(response.data)
    studentRecord = response.data
    loadData()

}).catch(error => {
    console.log(error)
})

    function loadData(){

    var menuOptions = [{value:'present',label:'present'},{value:'absent',label:'absent'}]
        var displayOptions = [{value:'present',label:'present'},{value:'absent',label:'absent'}]
        var inputEditor =  new cheetahGrid.columns.action.InlineInputEditor();
    var grid = new cheetahGrid.ListGrid({
    // Parent element on which to place the grid
    parentElement: document.querySelector('.attendence-result'),
    // Header definition
    header: [
{field: 'check', caption: '', width: '3%', columnType: 'check', action: 'check'},
{field: 'id', caption: 'ID', width: '3%'},
{field: 'first_name', caption: 'First Name', width:'20.5%' },
{field: 'last_name', caption: 'Last Name', width: '20.5%',},
{field: 'attendence_date', caption: 'Date', width: '20.5%',
    action: new cheetahGrid.columns.action.SmallDialogInputEditor({
        type: 'date',
        classList: ['al-right']
    })
},
{field: 'status', caption: 'Attendence Status', width: '20.5%',
columnType: new cheetahGrid.columns.type.MenuColumn({options:menuOptions}),
    action: new cheetahGrid.columns.action.InlineMenuEditor({options: displayOptions}),
},
{caption: 'Update', width: '6%',style:{buttonBgColor:'green'},columnType: new cheetahGrid.columns.type.ButtonColumn({
        caption: 'Update',

    }),
    action:new cheetahGrid.columns.action.ButtonAction({
        action(rec){
          axios.post(`/student/attendence/list/update/${rec.id}`,rec).then(response=>{
              console.log(response)
          }).catch(error =>{
              console.log(error)
          });
        }
    })

},
        {caption: 'Delete', width: '6%',style:{buttonBgColor:'red'},columnType: new cheetahGrid.columns.type.ButtonColumn({
                caption: 'Delete',

            }),
            action:new cheetahGrid.columns.action.ButtonAction({
                action(rec){
                    axios.delete(`/student/attendence/list/delete/${rec.id}`).then(response=>{
                        console.log(response)
                    }).catch(error =>{
                        console.log(error)
                    });
                }
            })
        },
    ],
    // Array data to be displayed on the grid
    records: studentRecord,
    // Column fixed position
    frozenColCount: 2,
});

}
