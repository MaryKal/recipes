/* ======================Dropdown=============================*/
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */

let drop1 = document.querySelector('.drop1')
let drCont = document.getElementById('profileDropdown');
let catDr = document.getElementById('catDropdown');
let drop2 = document.querySelector('.drop2');
if(drop2){
drop2.addEventListener('click',()=>{
    catDr.classList.toggle("show");
})
}
if(drop1){
drop1.addEventListener('click',()=>{
    drCont.classList.toggle("show");
});
}
// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
    if (!e.target.matches(".dropbtn")) {
        let catDropdown = document.getElementById("catDropdown");
        let profileDropdown = document.getElementById("profileDropdown");
        if (
            catDropdown.classList.contains("show") ||
            profileDropdown.classList.contains("show")
        ) {
            if(catDropdown){
                catDropdown.classList.remove("show");
            }
            
            profileDropdown.classList.remove("show");
        }
    }
};

// ======================adding recipe=============================

const axios = require('axios').default;//подключени axios
    if(document.forms.recipe){
        let steps = document.querySelectorAll('.steps');
        let image = [];
        document.forms.recipe.addEventListener('submit', function (e) {
        e.preventDefault();
        let step = '';
        for (const iterator of steps) {            
            // console.log(imgSrc.slice(""));
            step+='<img src="/images/recipes/'+ iterator.firstElementChild.value.split("\\").pop() +'" /> <br>';   
            step+='<p>'+iterator.lastElementChild.value+'</p> <br>';      

        }
        // console.log(step);
   
        const fd = new FormData(this);
        // let addImg = document.querySelectorAll('#file');

        // fd.append('image', addImg.files[0]);
        
        fd.append('steps', step);

        console.log(fd);
        // console.log(fd);   

        axios({
            method: 'post',
            url: '/recipes/add',
            data: fd,
            headers: {
                'Content-Type': 'multipart/form-data'
              }
            })
            .then(response=>{
                console.log('ANSWER :', response);
            // return response.data;

            })
            // .then(function(data){
            //     console.log(data)
      
            // })
            .catch(function (error) {
                console.log(error.response.data);
                // console.log(fd);
                // console.log(error.response.headers);
                
                })
            
            
    });
    }