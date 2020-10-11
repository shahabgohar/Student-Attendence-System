var studentRecord = null
axios.get(window.appUrl+"/student-details").then(response => {
    studentRecord = response.data
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
            {field: 'check', caption: '', width: '3%', columnType: 'check', action: 'check'},
            {field: 'id', caption: 'ID', width: '12%'},
            {field: 'first_name', caption: 'First Name', width:'22.5%' },
            {field: 'mid_name', caption: 'Mid Name', width: '22.5%'},
            {field: 'last_name', caption: 'Last Name', width: '22.5%'},
            {field: 'email', caption: 'Email', width: '20%'},
        ],
        // Array data to be displayed on the grid
        records: studentRecord,
        // Column fixed position
        frozenColCount: 2,
    });

}
