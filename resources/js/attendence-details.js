var studentRecord = null
axios.get(window.appUrl+"/admin/attendence/list").then(response => {
    studentRecord = response.data
    console.debug(studentRecord)
    loadData()

}).catch(error => {
    console.log(error)
})

function loadData(){

    var grid = new cheetahGrid.ListGrid({
        // Parent element on which to place the grid
        parentElement: document.querySelector('.grid-sample'),
        // Header definition
        header: [
            {field: 'student_class_id', caption: 'Class', width:'14.28%' },
            {field: 'start_time', caption: 'Start Time', width: '14.28%',
                columnType: 'time',
                action: new cheetahGrid.columns.action.InlineInputEditor({
                    type: 'time',
                })
            },
            {field: 'end_time', caption: 'End Time', width: '14.28%',
                columnType: 'time',
                action: new cheetahGrid.columns.action.InlineInputEditor({
                    type: 'time',
                })
            },
            {field: 'expired', caption: 'Is Expired', width: '14.28%'},
            {field:'attendence_date',caption:'Date of Attendence',width: "10%" ,
                columnType: 'date',
                action: new cheetahGrid.columns.action.InlineInputEditor({
                    type: 'date',
                })
            },
            {
                caption:"Update",
                width: "14.28%",
                columnType: new cheetahGrid.columns.type.ButtonColumn({
                    caption:"Update Record"
                }),
                action:new cheetahGrid.columns.action.ButtonAction({
                    action(rec){
                        alert(JSON.stringify(rec))
                    }
            })
            },
            {
                caption:"Delete",
                width: "14.28%",
                columnType: new cheetahGrid.columns.type.ButtonColumn({
                    caption:"Delete Record"
                }),
                action:new cheetahGrid.columns.action.ButtonAction({
                    action(rec){
                        alert(JSON.stringify(rec))
                    }
                })
            }
        ],
        // Array data to be displayed on the grid
        records: studentRecord,
        // Column fixed position
        frozenColCount: 2,
    });

}
