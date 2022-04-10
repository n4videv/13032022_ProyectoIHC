let userBox=document.querySelector(".header .header-2 .flex .user-box")
let userBtn=document.querySelector("#user-btn");

userBtn.addEventListener("click",()=>{
    userBox.classList.toggle("active");
})



let navBar=document.querySelector(".header .header-2 .flex .navbar")
let menuBtn=document.querySelector("#menu-btn");

menuBtn.addEventListener("click",()=>{
    navBar.classList.toggle("active");
})

