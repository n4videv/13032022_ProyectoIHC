
let $formulario_login=document.querySelector(".formulario__login"),
    $formulario_register=document.querySelector(".formulario__register"),
    $contenedor_login_register=document.querySelector(".contenedor__login-register"),
    $caja_trasera_login=document.querySelector(".caja__trasera-login"),
    $caja_trasera_register=document.querySelector(".caja__trasera-register");


//Funciones
function anchoPage(){
    if(window.innerWidth>850){
        $caja_trasera_register.style.display="block";
        $caja_trasera_login.style.display="block";
    }else{
        $contenedor_login_register.style.left="0px";

        $caja_trasera_register.style.display="block";
        $caja_trasera_register.style.opacity="1";
        $caja_trasera_login.style.display="none";

        $formulario_login.style.display="block";
        $formulario_register.style.display="none";
    }
}
function iniciarSesion(){
    if (window.innerWidth > 850){
        $contenedor_login_register.style.left = "10px";

        $formulario_login.style.display = "block";
        $formulario_register.style.display = "none";

        $caja_trasera_register.style.opacity = "1";
        $caja_trasera_login.style.opacity = "0";
    }else{
        $contenedor_login_register.style.left = "0px";
        
        $formulario_login.style.display = "block";
        $formulario_register.style.display = "none";

        $caja_trasera_register.style.display = "block";
        $caja_trasera_login.style.display = "none";
    }
}

function register(){
    if (window.innerWidth > 850){
        $formulario_register.style.display = "block";
        $formulario_login.style.display = "none";

        $contenedor_login_register.style.left = "410px";

        $caja_trasera_register.style.opacity = "0";
        $caja_trasera_login.style.opacity = "1";
    }else{
        $formulario_login.style.display = "none";
        $formulario_register.style.display = "block";

        $contenedor_login_register.style.left = "0px";

        $caja_trasera_register.style.display = "none";
        $caja_trasera_login.style.display = "block";
        $caja_trasera_login.style.opacity = "1";
    }
}


document.getElementById("btn__iniciar-sesion").addEventListener('click',iniciarSesion)
document.getElementById("btn__registrarse").addEventListener("click", register);
window.addEventListener("resize", anchoPage);
anchoPage();
