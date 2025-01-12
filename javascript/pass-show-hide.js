const pswrdField = document.querySelector(".form input[type ='password']"),
toggleBtn = document.querySelector(".form .field i");

toggleBtn.onclick = ()=>{  

    // code fourni par l'extension
   // j'ai compris le jeu
    if(pswrdField.type === "password"){
        pswrdField.type = "text";
        toggleBtn.classList.remove("fa-eye");
        toggleBtn.classList.add("fa-eye-slash");

    }else{
        pswrdField.type = "password";
        toggleBtn.classList.remove("fa-eye-slash");
        toggleBtn.classList.add("fa-eye");
    }
 }
