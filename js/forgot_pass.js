        const emailInputRecover = document.getElementById('email_recover');
        const emailError = document.getElementById('email-error');
        const noEmailFound = document.getElementById('no-email-found');
        const div_email = document.querySelector("#div_email");
        const div_verificacao = document.querySelector(".ajst_larg_verify");
        const div_redefinicao = document.querySelector(".ajs_alt_redefi");

        emailInputRecover.addEventListener('input', () => {
            const emailValue = emailInputRecover.value;
            if (!emailValue.match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/)) {
                emailError.textContent = 'Por favor, Insira um email válido';
                emailError.style.display = 'block';
            }else {
                emailError.textContent = '';
                emailError.style.display = 'none';
                
            }
        });

        document.getElementById("btn_enviar_code").addEventListener('click', () => {
               if(emailError.style.display === 'none'){
                console.log('Email enviado com sucesso');
                div_email.style.display = 'none';
                div_verificacao.style.display = 'block';
               }else{
                return;
               };
        });



let adress_email = document.getElementById("adress_email");

emailInputRecover.addEventListener("input", function() {
    let valorEmail = emailInputRecover.value;

    let atIndex = valorEmail.indexOf('@');

    if (atIndex > 2) {
        let hiddenEmail = valorEmail.slice(0, atIndex - 3) + "***" + valorEmail.slice(atIndex);
        adress_email.textContent = hiddenEmail;
    } else {
        adress_email.textContent = valorEmail;
    }
});


const inputs = document.querySelectorAll('.inputs input');
const verifyButton = document.getElementById("btn_verificar_code");

const expectedCodes = ["123456", "666666"];

verifyButton.addEventListener("click", function() {
    let userCode = "";
    inputs.forEach(input => {
        userCode += input.value;
    });

    if (expectedCodes.includes(userCode)) {
        noEmailFound.style.display = "none";
        inputs.forEach(input => {
            input.style.borderBottom = "solid 2px lime";
            input.style.color = "lime";
            setTimeout(redefinirPassOpen, 3000);

            function redefinirPassOpen() {
                div_verificacao.style.display = "none";
                div_redefinicao.style.display = "block";
            }


        });       
    } else {
        noEmailFound.style.display = "block";
        inputs.forEach(input => {
            input.style.borderBottom = "solid 2px #d12929";
            input.style.color = "#d12929";
            input.value = "";
        });
    }
});








// Seleciona os elementos necessários
const password1 = document.getElementById("password1");
const password2 = document.getElementById("password2");
const resetButton = document.getElementById("reset-button");
const erroPassword1 = document.querySelector(".erroPassword1");
const erroPassword2 = document.querySelector(".erroPassword2");

// Função para validar a força da senha
function validatePasswordStrength(password) {
    const minLength = 8;
    const hasUpperCase = /[A-Z]/.test(password);
    const hasLowerCase = /[a-z]/.test(password);
    const hasNumber = /\d/.test(password);
    const hasSpecialChar = /[!@#$%^&*(),.?":{}|<>]/.test(password);

    if (password.length < minLength) {
        return "A senha deve ter pelo menos 8 caracteres.";
    // } else if (!hasUpperCase) {
    //     return "A senha deve ter pelo menos uma letra maiúscula.";
    // } else if (!hasLowerCase) {
    //     return "A senha deve ter pelo menos uma letra minúscula.";
    // } else if (!hasNumber) {
    //     return "A senha deve ter pelo menos um número.";
    // } else if (!hasSpecialChar) {
    //     return "A senha deve ter pelo menos um caractere especial.";
    } else {
        return "";
    }
}

// Função para validar se as senhas são iguais
function validatePasswordMatch(password1, password2) {
    if (password1 !== password2) {
        return "As senhas não correspondem.";
    } else {
        return "";
    }
}

// Função para exibir os erros em tempo real
function displayErrors() {
    const password1Value = password1.value;
    const password2Value = password2.value;

    const password1Error = validatePasswordStrength(password1Value);
    const password2Error = validatePasswordMatch(password1Value, password2Value);

    erroPassword1.textContent = password1Error;
    erroPassword2.textContent = password2Error;

    // if (password1Error) {
    //     password1.style.borderColor = "#d12929";
    // } else {
    //     password1.style.borderColor = "";
    // }

    // if (password2Error) {
    //     password2.style.borderColor = "#d12929";
    // } else {
    //     password2.style.borderColor = "";
    // }
}

// Adiciona event listeners para verificar os inputs em tempo real
password1.addEventListener("input", displayErrors);
password2.addEventListener("input", displayErrors);
let loadingscreen = document.querySelector(".loadingscreen");

// Função para a verificação final no botão de redefinição
resetButton.addEventListener("click", function (event) {
    event.preventDefault(); // Evita o envio do formulário

    const password1Value = password1.value;
    const password2Value = password2.value;

    const password1Error = validatePasswordStrength(password1Value);
    const password2Error = validatePasswordMatch(password1Value, password2Value);

    if (password1Error || password2Error) {
        displayErrors(); // Exibe os erros se houver
        alert("Por favor, corrija os erros antes de continuar.");
    } else {
        div_redefinicao.style.display = "none";
        loadingscreen.style.display = "block";
        setTimeout(Enviado_Dados, 5000);

        function Enviado_Dados(){
            loadingscreen.style.display = "none";
            document.querySelector(".alert_box_sucesso").style.display = "block";
            setTimeout(btn_close_alerta, 5000)
        }
    }
});




document.querySelector(".close_code_verify").addEventListener("click", function(){
        div_verificacao.style.display = 'none';
        div_email.style.display = 'block';
});

function btn_close_alerta(){
    window.location.href = "lgcd.php";
}

































        function Canva() {
		var canvas = document.getElementById( 'c' ),
    ctx = canvas.getContext( '2d' ),
    fl = 300,
    count = 200,
    points = [],
    startSpeed = 0,
    tick = 0,
    width,
    height,
    bounds,
    vp,
    mouse,
    canvasOffset;

			function rand( min, max ) {
			  return Math.random() * ( max - min ) + min;
			}

			function norm( val, min, max ) {
			  return ( val - min ) / ( max - min );
			}

			function resetPoint( p, init ) {
			  p.z = init ? rand( 0, bounds.z.max ) : bounds.z.max;
			  p.x = rand( bounds.x.min, bounds.x.max ) / ( fl / ( fl + p.z ) );
			  p.y = rand( bounds.y.min, bounds.y.max ) / ( fl / ( fl + p.z ) );
			  p.ox = p.x;
			  p.oy = p.y;
			  p.oz = p.z;
			  p.vx = 0;
			  p.vy = 0;
			  p.vz = rand( -1, -10 ) + startSpeed;
			  p.ax = 0;
			  p.ay = 0;
			  p.az = 0;
			  p.s = 0;
			  p.sx = 0;
			  p.sy = 0;
			  p.os = p.s;
			  p.osx = p.sx;
			  p.osy = p.sy;
			  p.hue = rand( 120, 200 );
			  p.lightness = rand( 70, 100 );
			  p.alpha = 0;
			  return p;
			}

			function create() {
			  vp = {
			    x: width / 2,
			    y: height / 2
			  };
			  mouse = {
			    x: vp.x,
			    y: vp.y,
			    down: false
			  };
			  bounds = {
			      x: { min: -vp.x, max: width - vp.x },
			      y: { min: -vp.y, max: height - vp.y },
			      z: { min: -fl, max: 1000 }
			  };
			}

			function update() {
			  if( mouse.down ) {
			    if( startSpeed > -30 ) {
			      startSpeed -= 0.1;
			    } else {
			      startSpeed = -30;
			    }
			  } else {
			    if( startSpeed < 0 ) {
			      startSpeed += 1;
			    } else {
			      startSpeed = 0;
			    }
			  }
			  
			  vp.x += ( ( width / 2 - ( mouse.x - width / 2 ) ) - vp.x ) * 0.025;
			  vp.y += ( ( height / 2 - ( mouse.y - height / 2 ) ) - vp.y ) * 0.025;
			  bounds = {
			      x: { min: -vp.x, max: width - vp.x },
			      y: { min: -vp.y, max: height - vp.y },
			      z: { min: -fl, max: 1000 }
			  };  
			  
			  if( points.length < count ) {
			    points.push( resetPoint( {} ) );
			  }
			  var i = points.length;
			  while( i-- ) {
			    var p = points[ i ];
			    p.vx += p.ax;
			    p.vy += p.ay;
			    p.vz += p.az;
			    p.x += p.vx;
			    p.y += p.vy;
			    p.z += p.vz;
			    if( mouse.down ) {
			      p.az = -0.5;
			    }
			    if( 
			      p.sx - p.sr > bounds.x.max ||
			      p.sy - p.sr > bounds.y.max ||
			      p.z > bounds.z.max ||
			      p.sx + p.sr < bounds.x.min ||
			      p.sy + p.sr < bounds.y.min ||
			      p.z < bounds.z.min
			    ) {
			      resetPoint( p );
			    }
			    p.ox = p.x;
			    p.oy = p.y;
			    p.oz = p.z;
			    p.os = p.s;
			    p.osx = p.sx;
			    p.osy = p.sy;
			  }
			}

			function render() {
			  ctx.save();
			  ctx.translate( vp.x, vp.y );
			  ctx.clearRect( -vp.x, -vp.y, width, height );
			  var i = points.length;
			  while( i-- ) {
			    var p = points[ i ];    
			    p.s = fl / ( fl + p.z );
			    p.sx = p.x * p.s;
			    p.sy = p.y * p.s;
			    p.alpha = ( bounds.z.max - p.z ) / ( bounds.z.max / 2 );
			    ctx.beginPath();
			    ctx.moveTo( p.sx, p.sy );
			    ctx.lineTo( p.osx, p.osy );
			    ctx.lineWidth = 2;
			    ctx.strokeStyle = 'hsla(' + p.hue + ', 100%, ' + p.lightness + '%, ' + p.alpha + ')';
			    ctx.stroke();
			  }
			  ctx.restore();
			}

			function resize() {
			  width = canvas.width = window.innerWidth;
			  height = canvas.height = window.innerHeight;
			  canvasOffset = { x: canvas.offsetLeft, y: canvas.offsetTop };
			}


			function loop() {
			  requestAnimationFrame( loop );
			  update();
			  render();
			  tick++;
			}

			window.addEventListener( 'resize', resize );
			document.body.appendChild( canvas );
			resize();
			create();
			loop();
	};
Canva();






