let menuBtn=document.querySelector('#menu-btn');
let navbar=document.querySelector('.header .navbar');
let accountBox=document.querySelector('.header .account-box');
let userBtn=document.querySelector('#user-btn')

menuBtn.addEventListener('click',()=>{
    navbar.classList.toggle('active');
    accountBox.classList.remove('active');
})

userBtn.addEventListener('click',()=>{
    accountBox.classList.toggle('active');
    navbar.classList.remove('active');
})


window.addEventListener('scroll',()=>{
    navbar.classList.remove('active');
    accountBox.classList.remove('active');
})


let cancelar=document.querySelector("#close-update");
cancelar.addEventListener("click",()=>{
    document.querySelector('.edit-product-form').style.display='none';
    window.location.href="admin_products.php";
})