require('./bootstrap');

var TurboLInks = require('turbolinks')
TurboLInks.start()
Livewire.on('showDropdown',data => {

    if(document.getElementById(data).style.display === "block"){
        document.getElementById(data).style.display = "none"
    }else{
        document.getElementById(data).style.display = "block"
    }



})
