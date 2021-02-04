window.addEventListener("scroll",()=>{
    let length = pageYOffset;
    console.log(length);
    if(length>500){
        document.querySelector(".onTop").style.display = "block";
    }else{
        document.querySelector(".onTop").style.display = "none";
    }
})
