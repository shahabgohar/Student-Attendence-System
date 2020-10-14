var quill = new Quill('#view-leave', {
    theme: 'snow',

});
var scollingElement = document.getElementsByClassName("approval-list");
scollingElement = scollingElement[0]
var nextPageUrl = null
var currentPage = null
var lastPage = null
var isDataLoding = true
getDataFromServer()
function createElementForAttatchment(tit,capt,id){
    let div =document.createElement('div')
    div.classList.add("approval-list-tab");div.classList.add("display-flex");div.classList.add("display-flex")
    div.classList.add("flex-direction-column")
    div.classList.add("flex-align-item-start"); div.classList.add("flex-justify-content-space-between")
    div.setAttribute("wire:click",`$emit('launchLeave',${id})`)
    let h1 = document.createElement('h1')
    h1.innerHTML = tit
    let h2 = document.createElement('h2')
    h2.innerHTML = capt
    div.appendChild(h1)
    div.appendChild(h2)
    return div;
    // let template =
    //     ` <div class="approval-list-tab display-flex
    //         flex-direction-column flex-align-item-start
    //          flex-justify-content-space-between" wire:click="$emit('laucnhLeave',${id})">
    //             <h1 style="text-align: left">${tit}</h1>
    //             <h2>${capt}</h2>
    //         </div>`
    // return template
}

function getDataFromServer(){
        axios.get(appUrl+"/api/attendences/for/approval").then(response=>{
            console.log(response.data)
            let data = response.data.data
            nextPageUrl = response.data.next_page_url
            data.forEach(d => {
                let title = d.first_name + " " + d.last_name
                let caption = "ROll NUMBER : "+d.roll_number + " Class : "+d.student_class_id
                scollingElement.appendChild(createElementForAttatchment(title,caption,d.id))
            })
        }).catch(error =>{
            console.log(error)
        })
}
// function fetchNextDataFromSever(){
//     axios.get(nextPageUrl).then(response=>{
//         console.log(response.data)
//         let data = response.data.data
//         nextPageUrl = response.data.next_page_url
//         data.forEach(d => {
//             let title = d.first_name + " " + d.last_name
//             let caption = "ROll NUMBER : "+d.roll_number + " Class : "+d.student_class_id
//             scollingElement.insertAdjacentHTML("beforeend",createElementForAttatchment(title,caption,d.id))
//         })
//     }).catch(error =>{
//         console.log(error)
//     })
// }


Livewire.on('scroll',()=>{
   let remainingBottom = scollingElement.scrollHeight - scollingElement.offsetHeight ;

   if(remainingBottom == scollingElement.scrollTop){
       fetchNextDataFromSever()
   }
})

