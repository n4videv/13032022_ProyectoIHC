
let userBox=document.querySelector(".header .header-2 .flex .user-box")
let userBtn=document.querySelector("#user-btn");
userBtn.addEventListener("click",()=>{
    userBox.classList.toggle("active");
    navBar.classList.remove("active")
})

let navBar=document.querySelector(".header .header-2 .flex .navbar")
let menuBtn=document.querySelector("#menu-btn");

menuBtn.addEventListener("click",()=>{
    navBar.classList.toggle("active");
    userBox.classList.remove("active");
})


window.addEventListener("scroll",()=>{
    userBox.classList.remove("active");
    navBar.classList.remove("active");

    if(window.scrollY>60){
        document.querySelector(".header .header-2").classList.add("active");
    }else{
        document.querySelector(".header .header-2").classList.remove("active");
    }
})

