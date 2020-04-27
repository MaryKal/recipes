/* ======================Dropdown=============================*/
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */

let drop1 = document.querySelector(".drop1");
let drCont = document.getElementById("profileDropdown");
let catDr = document.getElementById("catDropdown");
let drop2 = document.querySelector(".drop2");
if (drop2) {
    drop2.addEventListener("click", () => {
        catDr.classList.toggle("show");
    });
}
if (drop1) {
    drop1.addEventListener("click", () => {
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
            if (catDropdown) {
                catDropdown.classList.remove("show");
            }

            profileDropdown.classList.remove("show");
        }
    }
};

let login = document.querySelector(".login-btn");
let register = document.querySelector(".reg-btn");
let popupLog = document.querySelector(".bg-popup-login");
let popupReg = document.querySelector(".bg-popup-register");

if (login) {
    login.addEventListener("click", e => {
        e.preventDefault();
        popupLog.style.display = "block";
    });
}

if (register) {
    register.addEventListener("click", e => {
        e.preventDefault();
        popupReg.style.display = "block";
    });
}
if (register || login) {
    window.addEventListener("click", e => {
        if (
            e.target.classList.contains("bg-popup-login") ||
            e.target.classList.contains("bg-popup-register")
        ) {
            popupLog.style.display = "none";
            popupReg.style.display = "none";
        }
    });
}

// ======================adding recipe=============================

const axios = require("axios").default; //подключени axios
if (document.forms.recipe) {
    const addStep = document.querySelector(".add-step");
    const newStep = document.querySelector(".new-step");
    const RemoveNewStep = document.querySelector(".remove-step");
    const steps = document.querySelector(".steps");
    const newProduct = document.querySelector(".new-product");
    const addNewProduct = document.querySelector(".add-product");
    const prodItem = document.querySelector(".product-item-clean");

    function addNewStep(e) {
        // e.preventDefault();
        let div = document.createElement("div");
        div.className = "steps";

        div.innerHTML = `
                        <div class="photo">
                            <input type="file"  name="stepImage[]"  id="file" multiple value="null"/>
                        </div>
                        <div class="text">
                            <label for="stepText[]">Описание шага приготовления</label>
                            <textarea type="text"  name="stepText[]"></textarea>
                        </div>                        
                            `;
        newStep.append(div);
    }
    addStep.addEventListener("click", e => {
        e.preventDefault();
        addNewStep();
    });

    document.forms.recipe.addEventListener("submit", function(e) {
        e.preventDefault();

        // console.log(step);

        const fd = new FormData(this);

        // fd.append('steps', step);

        axios({
            method: "post",
            url: "/recipes/add",
            data: fd,
            headers: {
                "Content-Type": "multipart/form-data"
            }
        })
            .then(response => {
                console.log("ANSWER :", response);
            })
            .then(function(data) {
                console.log(data);
            })
            .catch(function(error) {
                console.log(error.response.data);
            });
    });

    //     document.forms.recipe.addEventListener('submit', function (e) {
    //     e.preventDefault();
    //     let steps = document.querySelectorAll('.steps');
    //     let step = '';

    //     for (const iterator of steps) {
    //         // console.log(imgSrc.slice(""));
    //         step+='<img style="max-width: 100%;" src="/images/recipes/'+ iterator.firstElementChild.value.split("\\").pop() +'" /> <br>';
    //         step+='<p>'+iterator.lastElementChild.value+'</p> <br>';

    //     }

    //     console.log(step);

    //     const fd = new FormData(this);

    //     fd.append('steps', step);

    //     axios({
    //         method: 'post',
    //         url: '/recipes/add',
    //         data: fd,
    //         headers: {
    //             'Content-Type': 'multipart/form-data'
    //           }
    //         })
    //         .then(response=>{
    //             console.log('ANSWER :', response);
    //         })
    //         .then(function(data){
    //             console.log(data)
    //         })
    //         .catch(function (error) {
    //             console.log(error.response.data);
    //             })
    // });
}
if (document.forms.recipeUpdate) {
    const addStep = document.querySelector(".add-step");
    const newStep = document.querySelector(".new-step");
    const RemoveNewStep = document.querySelector(".remove-step");
    const steps = document.querySelector(".steps");
    const newProduct = document.querySelector(".new-product");
    const addNewProduct = document.querySelector(".add-product");
    const prodItem = document.querySelector(".product-item-clean");

    function addNewStep(e) {
        // e.preventDefault();
        let div = document.createElement("div");
        div.className = "steps";

        div.innerHTML = `   
                            <div class="photo">
                                <input type="file"  name="stepImage[]"  id="file" multiple value="null"/>
                            </div>
                            <div class="text">
                            <label for="stepText[]">Описание шага приготовления</label>
                                <textarea type="text"  name="stepText[]"></textarea>
                            </div>    
                                             
                        `;
        newStep.append(div);
    }
    addStep.addEventListener("click", e => {
        e.preventDefault();
        addNewStep();
    });
}
// =======================================products====================

$(document).ready(function() {
    $("#productItemClean")
        .children("select")
        .select2();

    $("#add").click(function(e) {
        e.preventDefault();
        $myClone = $("#productItemClean").clone();

        $myClone.find("span").remove();
        $myClone.find("select").select2();
        // $($myClone).css('visibility', 'visible');
        // $($myClone).toggleClass("productItemClean")
        $($myClone).removeAttr("id");
        $("productItemClean select").attr("name", "products[]");
        $($myClone).css("visibility", "visible");
        $($myClone).css("height", "80px");
        // $($myClone).css('outline', 'none');
        $("#new-product").append($myClone);
    });
});

// =============================like=============================
const like = document.querySelectorAll(".like");
const dislike = document.querySelectorAll(".dislike");
const likeCount = document.querySelectorAll(".like-count");
const heart = document.querySelectorAll(".fa-heart");

// console.log(heart)

//if uder id already liked delete heart from view
like.forEach(item => {
    item.addEventListener("click", e => {
        e.preventDefault();
        // let liked = e.target.previousElementSibling == null;
        let id = e.target.getAttribute("data-id");
        // let liked = e.target.getAttribute('data-isLiked')

        // console.log(this.item)

        if (!e.target.classList.contains("red")) {
            e.target.classList.add("red");

            axios({
                method: "get",
                url: "/like/" + id + "/liked"
            })
                .then(response => {
                    // console.log('ANSWER :', response);
                    e.target.setAttribute("data-isLiked", "liked");
                    item.nextElementSibling.innerHTML = response.data;
                    // console.log(item, response.data)
                })
                .catch(function(error) {
                    console.log(error.response.data);
                });
        } else {
            e.target.classList.remove("red");

            axios({
                method: "get",
                url: "/like/" + id + "/disliked"
            })
                .then(response => {
                    // console.log('ANSWER :', response);
                    e.target.setAttribute("data-isLiked", "");
                    // item.innerHTML = response.data;
                    item.nextElementSibling.innerHTML = response.data;
                })
                .catch(function(error) {
                    console.log(error.response.data);
                });
        }
    });
});
