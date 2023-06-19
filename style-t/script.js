var ElabelBoxC = document.querySelector(".Elabel-box-c");
        var ElabelBox = document.querySelector(".Elabel-box");

        var PlabelBoxC = document.querySelector(".Plabel-box-c");
        var PlabelBox = document.querySelector(".Plabel-box");
        var rua = document.getElementById("rua");

        function entrega() {
            if (ElabelBoxC.style.display == "none") {
                ElabelBoxC.style.display = "block";
                ElabelBox.style.border = "1px solid green";
                rua.style.display = "block";
                PlabelBoxC.style.display = "none";
                PlabelBox.style.border = "none";
            } else {
                ElabelBoxC.style.display = "none";
                ElabelBox.style.border = "none";
                rua.style.display = "none";
            }
        }
        function pegar() {
            if (PlabelBoxC.style.display == "none") {
                PlabelBoxC.style.display = "block";
                PlabelBox.style.border = "1px solid green";
                ElabelBoxC.style.display = "none";
                ElabelBox.style.border = "none";
                rua.style.display = "none";
            } else {
                PlabelBoxC.style.display = "none";
                PlabelBox.style.border = "none";
            }
        }

        var formapag = document.getElementById("forma-pag");
        var pagtable = document.querySelector(".forma-pagamento");
        var areapix = document.getElementById("area-pix");

        function forma() {
            if (pagtable.style.display == "none") {
                pagtable.style.display = "block";
                formapag.style.display = "none";
            } else {
                pagtable.style.display = "none";
            }
        };
        function clickpix() {
            if (pagtable.style.display == "block") {
                pagtable.style.display = "none";
                formapag.style.display = "block";
                areapix.style.display = "flex";
            } else {
                pagtable.style.display = "block";
            }
        };
        function clickqr() {
            if (areapix.style.display == "flex") {
                areapix.style.display = "none";
            } else {
                areapix.style.display = "none";
            }
        };

        var menubtn = document.querySelector(".menu-sand");
        var menu = document.querySelector(".menu-ul-alternative");
        menubtn.addEventListener("click", function(){
            if(menu.style.display=="none"){
                menu.style.display="flex";
            }else{
                menu.style.display="none";
            }
        });
    
        /*const submit = document.getElementById("submit");

        submit.addEventListener("click", validate);
        
        function validate(e) {
          e.preventDefault();
        
          const firstNameField = document.getElementById("nome");
          const emailField = document.getElementById("email");
          const foneField = document.getElementById("fone");
          const endField = document.getElementById("end");
          const imgField = document.getElementById("img");
          let valid = true;
        
          if (!firstNameField.value) {
            const nameError1 = document.getElementById("nameError1");
            
            nameError1.classList.add("visible");
            firstNameField.classList.add("invalid");
            nameError1.setAttribute("aria-hidden", false);
            nameError1.setAttribute("aria-invalid", true);
          }else if(!emailField.value) {
            const nameError2 = document.getElementById("nameError2");
            
            nameError2.classList.add("visible");
            emailField.classList.add("invalid");
            nameError2.setAttribute("aria-hidden", false);
            nameError2.setAttribute("aria-invalid", true);
          }else if(!endField.value) {
            const nameError3 = document.getElementById("nameError3");
            
            nameError3.classList.add("visible");
            endField.classList.add("invalid");
            nameError3.setAttribute("aria-hidden", false);
            nameError3.setAttribute("aria-invalid", true);
          }else if(!foneField.value) {
            const nameError4 = document.getElementById("nameError4");
            
            nameError4.classList.add("visible");
            
            foneField.classList.add("invalid");
            nameError4.setAttribute("aria-hidden", false);
            nameError4.setAttribute("aria-invalid", true);
          }else if(!imgField.value) {
            const nameError5 = document.getElementById("nameError5");
            
            nameError5.classList.add("visible");
            imgField.classList.add("invalid");
            nameError5.setAttribute("aria-hidden", false);
            nameError5.setAttribute("aria-invalid", true);
          }
          return valid;
          
        }*/
        