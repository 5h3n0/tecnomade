
    

/*---------------------------------Carrossel---------------------------------------*/



const carrossel = document.querySelector('.carrossel');
const imagensCarrossel = document.querySelectorAll('.imagem-carrossel');
const botaoEsquerdo = document.querySelector('.botao-esquerdo');
const botaoDireito = document.querySelector('.botao-direito');
const indicadores = document.querySelectorAll('.indicador');

let indiceAtual = 0;


function mostrarImagemAtual() {
    imagensCarrossel.forEach((imagem, indice) => {
        if (indice === indiceAtual) {
            imagem.style.display = 'block';
        } else {
            imagem.style.display = 'none';
        }
    });


    indicadores.forEach((indicador, indice) => {
        if (indice === indiceAtual) {
            indicador.classList.add('ativo');
        } else {
            indicador.classList.remove('ativo');
        }
    });
}


function proximaImagem() {
    indiceAtual++;
    if (indiceAtual >= imagensCarrossel.length) {
        indiceAtual = 0;
    }
    mostrarImagemAtual();
}


function imagemAnterior() {
    indiceAtual--;
    if (indiceAtual < 0) {
        indiceAtual = imagensCarrossel.length - 1;
    }
    mostrarImagemAtual();
}


botaoDireito.addEventListener('click', proximaImagem);
botaoEsquerdo.addEventListener('click', imagemAnterior);


indicadores.forEach((indicador, indice) => {
    indicador.addEventListener('click', () => {
        indiceAtual = indice;
        mostrarImagemAtual();
    });
});


function avancarAutomaticamente() {
    proximaImagem();
}


let intervaloAutomatico = setInterval(avancarAutomaticamente, 4000);


carrossel.addEventListener('mouseenter', () => {
    clearInterval(intervaloAutomatico);
});

carrossel.addEventListener('mouseleave', () => {
    intervaloAutomatico = setInterval(avancarAutomaticamente, 4000);
});


mostrarImagemAtual();

let icon_bnt_carrossel = document.getElementById("icon_carrossel");
let icon_bnt_carrossel2 = document.getElementById("icon_carrossel2");
let iconCarrosselColor = document.getElementById("icon_carrossel_Color");
let iconCarrosselColor2 = document.getElementById("icon_carrossel_Color2");

icon_bnt_carrossel.addEventListener("mouseenter", function(){
  iconCarrosselColor.setAttribute("style", "fill: #fff;")
  
  icon_bnt_carrossel.addEventListener("mouseleave", function(){
    iconCarrosselColor.setAttribute("style", "fill: rgb(0,128,111);");
  });
});

icon_bnt_carrossel2.addEventListener("mouseenter", function(){
  iconCarrosselColor2.setAttribute("style", "fill: #fff;")

  icon_bnt_carrossel2.addEventListener("mouseleave", function(){
    iconCarrosselColor2.setAttribute("style", "fill: rgb(0,128,111);");
  });
});

 //--------------------------------------------------------------------------

 document.addEventListener("DOMContentLoaded", function() {
    var screen_exibition_ini = document.querySelectorAll(".screen_exibition_ini");
    screen_exibition_ini.forEach(function(element) {
        element.classList.add("apareceu");
    });
});

var element = $('.floating-chat');
var myStorage = localStorage;

if (!myStorage.getItem('chatID')) {
myStorage.setItem('chatID', createUUID());
}

setTimeout(function() {
element.addClass('enter');
}, 1000);

element.click(openElement);

function openElement() {
var messages = element.find('.messages');
var textInput = element.find('.text-box');
element.find('>i').hide();
element.addClass('expand');
element.find('.chat').addClass('enter');
var strLength = textInput.val().length * 2;
textInput.keydown(onMetaAndEnter).prop("disabled", false).focus();
element.off('click', openElement);
element.find('.header_chat button').click(closeElement);
element.find('#sendMessage').click(sendNewMessage);
messages.scrollTop(messages.prop("scrollHeight"));
}

function closeElement() {
element.find('.chat').removeClass('enter').hide();
element.find('>i').show();
element.removeClass('expand');
element.find('.header_chat button').off('click', closeElement);
element.find('#sendMessage').off('click', sendNewMessage);
element.find('.text-box').off('keydown', onMetaAndEnter).prop("disabled", true).blur();
setTimeout(function() {
element.find('.chat').removeClass('enter').show()
element.click(openElement);
}, 500);
}

function createUUID() {

var s = [];
var hexDigits = "0123456789abcdef";
for (var i = 0; i < 36; i++) {
s[i] = hexDigits.substr(Math.floor(Math.random() * 0x10), 1);
}
s[14] = "4";
s[19] = hexDigits.substr((s[19] & 0x3) | 0x8, 1);
s[8] = s[13] = s[18] = s[23] = "-";

var uuid = s.join("");
return uuid;
}

function sendNewMessage() {
var userInput = $('.text-box');
var dataAtual = new Date();
var horas = ('0' + dataAtual.getHours()).slice(-2);
var minutos = ('0' + dataAtual.getMinutes()).slice(-2);

var newMessage = userInput.html().replace(/\<div\>|\<br.*?\>/ig, '\n').replace(/\<\/div\>/g, '').trim().replace(/\n/g, '<br>');

if (!newMessage) return;


var messagesContainer = $('.messages');

messagesContainer.append([
'<li class="self msg">',
    newMessage,
    '</li><li class="self_hour msg">',horas,':',minutos,'</li>' 
].join(''));

setTimeout(function() {
messagesContainer.append('<li class="other msg"><img src="https://i.pinimg.com/236x/2c/67/f0/2c67f0796ef5bf73654c7429a0ce082e.jpg" class="img_perfil_tecnobot_chat">Se quiser sim mano</li>',`<li class="msg other_hour ">${horas}:${minutos}</li>`);
messagesContainer.animate({
    scrollTop: messagesContainer.prop("scrollHeight")
}, 250);
}, 2500);




userInput.html('');
userInput.focus();

messagesContainer.finish().animate({
scrollTop: messagesContainer.prop("scrollHeight")
}, 250);
}

function onMetaAndEnter(event) {
if ((event.metaKey || event.ctrlKey) && event.keyCode == 13) {
sendNewMessage();
}
}

function toggleNav() {
var nav = document.querySelector('.nav-responsive');
nav.style.display = nav.style.display === 'block' ? 'none' : 'block';
}
