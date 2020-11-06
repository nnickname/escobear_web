// Data control variables
var container_global = document.querySelector(".form-login_register");
var container_login = document.querySelector(".form-login");
var container_register = document.querySelector(".form-register");

var container_back_login = document.querySelector(".back-box_login");
var container_back_register = document.querySelector(".back-box_register");





window.addEventListener("resize", widthPage);

function widthPage()
{
    if(window.innerWidth > 850)
    {
        container_back_login.style.display = "block";
        container_back_register.style.display = "block";
    } else
    {
        container_back_register.style.display = "block";
        container_back_register.style.opacity = "1";
        container_back_login.style.display = "none";
        container_login.style.display = "block";
        container_register.style.display = "none";

        container_global.style.left = "0px";
    }
}

widthPage();
function changeMovementBox(type)
{
    if(type == 1)
    {
        if(window.innerWidth > 850)
        {
            container_register.style.display = "block";
            container_global.style.left = "410px";
            container_login.style.display = "none";

            container_back_register.style.opacity = "0";
            container_back_login.style.opacity = "1";   
        }
        else
        {
            container_register.style.display = "block";
            container_global.style.left = "0px";
            container_login.style.display = "none";

            container_back_register.style.display = "none";
            container_back_login.style.display = "block";

        }
    }
    else
    {
        if(window.innerWidth > 850)
        {
            container_register.style.display = "none";
            container_global.style.left = "10px";
            container_login.style.display = "block";

            container_back_register.style.opacity = "1";
            container_back_login.style.opacity = "0";
        }
        else
        {
            container_register.style.display = "none";
            container_global.style.left = "0px";
            container_login.style.display = "block";

            container_back_register.style.display = "block";
            container_back_login.style.display = "none";

            container_back_login.style.opacity = "1";
        }
    }

}