let botaoTopo = document.getElementById("botaoTopo");
if (botaoTopo) {
  botaoTopo.style.display = "block";
}

function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
}

window.addEventListener("scroll", function () {
  let btnTopo = document.getElementById("btnTopo");
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    btnTopo.style.display = "block";
  } else {
    btnTopo.style.display = "none";
  }
});

function fechar() {
  document.addEventListener("click", function (event) {
    if (
      event.target !== loginContainer &&
      event.target !== document.querySelector(".cliente") &&
      event.target !== document.getElementById("login_input_user") &&
      event.target !== document.getElementById("login_input_password")
    ) {
      loginContainer.style.display = "none";
    }
  });
}

/*-------------------------------Login-ghost--------------------------------------*/


    function fechar(){

    document.addEventListener("click", function (event) {
        if (event.target !== loginContainer && event.target !== document.querySelector(".cliente")) {
        loginContainer.style.display = "none";
        }
    });
  };

 
  document.addEventListener("DOMContentLoaded", function () {
    const loginContainer = document.getElementById("loginContainer");
    const loginSubmitButton = document.getElementById("loginSubmit");

    
  
    document.querySelector(".cliente").addEventListener("click", function () {
      if (loginContainer.style.opacity=== 1 ) {
        loginContainer.style.opacity= 1;
      } else {
      loginContainer.style.opacity = 1 ;
      }

    });
  
    
    const emailInput = document.getElementById("login_input_user");
    const passwordInput = document.getElementById("login_input_password");
  
    emailInput.addEventListener("input", toggleSubmitButton);
    passwordInput.addEventListener("input", toggleSubmitButton);
  
    function toggleSubmitButton() {
      if (emailInput.value.trim() !== "" && passwordInput.value.trim() !== "") {
        loginSubmitButton.removeAttribute("disabled");
      } else {
        loginSubmitButton.setAttribute("disabled", "true");
      }
    }
  });
/*-------------------------------Login--------------------------------------*/