var quill = new Quill('#text-area', {
    theme: 'snow',

});


Livewire.on('hello',()=>{
    let data = quill.getContents()
    axios.post(appUrl+"/submit/leave",{application:data}).then(response =>{
        console.log(alert(response.data))
        window.location.href = appUrl+"/"
    }).catch(error =>{
        console.log(error)
    })

})
