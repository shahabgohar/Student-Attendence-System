var quill = new Quill('#text-area', {
    theme: 'snow',

});


Livewire.on('hello',()=>{
    let data = quill.getContents()
    axios.post(appUrl+"/submit/leave",{application:data}).then(response =>{
        console.log(response)
    }).catch(error =>{
        console.log(error)
    })

})
