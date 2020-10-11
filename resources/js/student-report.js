var rollNumber = null
var studentClass = null
var from_date = null
var to_date = null
var shouldSubmit = false
Livewire.on('checkRollNumber',data=>{

    let val = Number(document.getElementById(data[0]).value);
    if (val == 0){
        document.getElementById(data[1]).style.display = "block"
        shouldSubmit = false
    }else{
        document.getElementById(data[1]).style.display = "none"
        shouldSubmit = true
    }
    rollNumber = val

})
Livewire.on('checkClass',data=>{
    let val = Number(document.getElementById(data[0]).value)
    if (val > 12 || val== 0){
        document.getElementById(data[1]).style.display = "block"
        shouldSubmit = false
    }else{
        document.getElementById(data[1]).style.display = "none"
        shouldSubmit = true
    }
    studentClass = val
})
Livewire.on('dateChecker', (id)=>{
    let val = new Date(document.getElementById(id[0]).value)
    let d = val.getFullYear()+"-"+val.getMonth()+"-"+val.getDate()
    if (id[1]==='1')
        from_date = d
    else
        to_date = d
})
Livewire.on('submitForReport',()=>{
    if (from_date !== null && to_date !== null && shouldSubmit !== false) {
        axios.get(`http://127.0.0.1:8000/student/report?from_date=${from_date}&to_date=${to_date}&student_class_id=${studentClass}&roll_number=${rollNumber}`
         ,{
            responseType:'blob'
        }).then(response => {
            // let blob = new Blob([response.data], { type:   'application/pdf' } );
            // let link = document.createElement('a');
            // link.href = window.URL.createObjectURL(blob);
            // link.download = 'Report.pdf';
            // link.click();
            console.log(response)

            let blob = new Blob([response.data], { type: 'application/pdf' }),
                url = window.URL.createObjectURL(blob)
            window.open(url)
            // const byteCharacters = atob(response.data.file);
            // const byteNumber = new Array(byteCharacters.length)
            // for (let i =0; i<byteCharacters.length;i++){
            //     byteNumber[i] = byteCharacters.charCodeAt(i)
            // }
            // const  byteTyped = new Blob([byteNumber],{type:'application/pdf'})
            // FileSaver.saveAs(new Blob([response.data]))

           // download(atob(data.file),data.email,'application/pdf')
            console.log(data)
        }).catch(error => {
            console.log(error)
        })
    }
})
