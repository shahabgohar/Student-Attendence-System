
var quill = new Quill('#view-leave', {
    theme: 'snow',

});
var approveButton = document.getElementById("approve")
var disapproveButton = document.getElementById("disapprove")
quill.enable(false)
var scollingElement = document.getElementsByClassName("approval-list");
scollingElement = scollingElement[0]
scollingElement.addEventListener("scroll",getNew)
var nextPageUrl = null
var beforeConstant = "leave-application-"
var currentlySelected = null
getDataFromServer()
function approveApplication(id){
axios.post(appUrl+"/admin/approve/application",{id:id}).then(response=>{
    alert("approved")
    console.log(response)
    quill.setContents(null)
    removeSelectedItem(id)
})    .catch(error=>{
    console.log(error)
})
}
function disapproveApplication(id){
    axios.post(appUrl+"/admin/disapprove/application",{id:id}).then(response=>{
        alert("disapproved")
        console.log(response)
        quill.setContents(null)
        removeSelectedItem(id)
    })    .catch(error=>{
        console.log(error)
    })
}
approveButton.addEventListener("click",()=>{
    approveApplication(currentlySelected)
})
disapproveButton.addEventListener("click",()=>{
    disapproveApplication(currentlySelected)
})
function launchLeave(id){
    currentlySelected = id
   axios.get(appUrl+`/admin/attendences/leave/application/${id}`).then(response => {
       console.log(response.data)
       quill.setContents(JSON.parse(response.data.status))
   }).then(error => {
       console.log(error)
   })
}
function removeSelectedItem(id){
    document.getElementById(beforeConstant+id).remove()
    alert("removed")
}
function createElementForAttatchment(tit,capt,id){
    let div =document.createElement('div')
    div.classList.add("approval-list-tab");div.classList.add("display-flex");div.classList.add("display-flex")
    div.classList.add("flex-direction-column")
    div.classList.add("flex-align-item-start"); div.classList.add("flex-justify-content-space-between")
    div.setAttribute("id",beforeConstant+id)
    div.addEventListener("click",()=>{
        launchLeave(id)
    })
    let h1 = document.createElement('h1')
    h1.innerHTML = tit
    let h2 = document.createElement('h2')
    h2.innerHTML = capt
    div.appendChild(h1)
    div.appendChild(h2)
    return div;
}

function getDataFromServer(){
        axios.get(appUrl+"/admin/attendences/for/approval").then(response=>{
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
function fetchNextDataFromSever(){
    axios.get(nextPageUrl).then(response=>{
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
function getNew(){
       let remainingBottom = scollingElement.scrollHeight - scollingElement.offsetHeight ;

   if(remainingBottom == scollingElement.scrollTop){
       fetchNextDataFromSever()
   }
}

