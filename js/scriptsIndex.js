
    

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
    var element = $('.floating-chat');
    var myStorage = localStorage;

    var screenExibitionIni = document.querySelectorAll(".screen_exibition_ini");
    
    screenExibitionIni.forEach(function(el) {
        el.classList.add("apareceu");
    });

    document.querySelector(".text-box").addEventListener("keydown", function(event){
        if (event.key === "Enter") {
            sendNewMessage();
        }
    });

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

        return s.join("");
    }

    function sendNewMessage() {
        var userInput = $('.text-box');
        var dataAtual = new Date();
        var horas = ('0' + dataAtual.getHours()).slice(-2);
        var minutos = ('0' + dataAtual.getMinutes()).slice(-2);

        var newMessage = userInput.html().replace(/<div>|<br.*?>/ig, '\n').replace(/<\/div>/g, '').trim().replace(/\n/g, '<br>');

        if (!newMessage) return;

        var messagesContainer = $('.messages');


        //se quiser depois pode add mais perguntas e respostas blz
        var keywords = [
            { words: ['o que', 'oq'], response: 'Eu sou um chatbot desenvolvido para ajudar com suas perguntas.' },
            { words: ['quem'], response: 'Eu sou o Tec, o fantasma do chatbot.' },
            { words: ['por que', 'porque'], response: 'Eu estou aqui para ajudar e aprender com você.' },
            { words: ['como alterar minha senha', 'como mudar minha senha', 'alterar senha', 'desejo mudar a senha', 'mudar senha'], response: 'Para alterar sua senha, vá em configurações do seu usuário em "Perfil" e siga as instruções. Se precisar de mais ajuda, use a opção "Esqueci minha senha".' },
            { words: ['esqueci minha senha', 'recuperar senha'], response: 'Para recuperar sua senha, clique em "Esqueci minha senha" na página de login e siga as instruções.' },
            { words: ['senha'], response: 'Não consegui compreender muito bem, deseja em relação a senha, você esqueceu ou desaja mudar ela ? Por favor me explique melhor para poder te ajudar' },
            { words: ['olá', 'oi', 'iae','eae','hello','tec'], response: 'Olá! Como posso ajudar você hoje?' },
            { words: ['tudo bem', 'como vai', 'tranquilo'], response: 'Tudo sim e com você? <br> Como posso ajudar você hoje?' },
            { words: ['bom dia'], response: 'Olá! Bom dia, Como posso ajudar você hoje?' },
            { words: ['boa tarde'], response: 'Olá! Boa tarde, Como posso ajudar você hoje?' },
            { words: ['boa noite'], response: 'Olá! Boa noite, Como posso ajudar você hoje?' },
            { words: ['quando'], response: 'Eu estou sempre disponível para ajudar.' },
            { words: ['portifolio integrado','portifólio integrado','portifólio'], response: 'O portfólio integrado é uma ferramenta que ajuda a organizar seus projetos e tarefas já feitos, assim exibindo eles na plataforma e chamando mais atenção para você' },
            { words: ['quais são suas funcionalidades', 'o que você pode fazer', 'suas funções', 'o que faz'], response: 'Eu posso ajudar a responder suas perguntas, fornecer informações sobre o sistema e muito mais.' },
            { words: ['como me cadastro', 'como registrar', 'registro', 'cadastro'], response: 'Para se cadastrar, clique no botão "Registrar" na página inicial e preencha o formulário com suas informações pessoais.' },
            { words: ['dificuldade em se cadastrar', 'cadastrar difícil', 'grau de dificuldade em se cadastrar'], response: 'O processo de cadastro é simples e rápido. Basta preencher o formulário com suas informações pessoais e criar uma senha segura.' },
            { words: ['como fazer login', 'como entrar', 'login'], response: 'Para fazer login, clique no botão "Entrar" na página inicial e insira seu e-mail e senha.' },
            { words: ['termos de uso', 'condições de uso', 'termos'], response: 'Os termos de uso estão disponíveis no rodapé do nosso site. Clique em "Termos de Uso" para ler as condições completas.' },
            { words: ['formas de pagamento', 'como pagar', 'metodos de pagamento'], response: 'Aceitamos várias formas de pagamento, incluindo cartões de crédito, débito e pix e tranferência bancaria.' },
            { words: ['pagamento seguro', 'segurança pagamento', 'transação segura'], response: 'Sim, utilizamos criptografia e outras medidas de segurança para garantir que suas transações sejam seguras.' },
            { words: ['pagamento após serviço', 'quando o dinheiro é liberado', 'liberação do pagamento'], response: 'O pagamento só é liberado para o profissional após a conclusão do serviço e a sua confirmação de que tudo está em ordem.' },
            { words: ['dados pessoais', 'privacidade'], response: 'Levamos a privacidade dos seus dados muito a sério. Suas informações pessoais são protegidas e não serão compartilhadas sem o seu consentimento.' },
            { words: ['suporte', 'ajuda', 'preciso de ajuda', 'contato'], response: 'Você pode entrar em contato com o nosso suporte através do e-mail <br> tecnomadeservices@gmail.com ou pelo telefone (11) 4002-8922, ou atráves desse link <a href="./sobre.php#entraEmContato">Clique aqui</a>.' }
        ];

        var foundKeyword = false;

        for (var i = 0; i < keywords.length; i++) {
            for (var j = 0; j < keywords[i].words.length; j++) {
                if (newMessage.toLowerCase().includes(keywords[i].words[j]) || newMessage.toUpperCase().includes(keywords[i].words[j])) {
                    messagesContainer.append([
                        '<li class="self msg">', newMessage, `</li><li class="self_hour msg">${horas}:${minutos}</li>`
                    ].join(''));
                    
                    setTimeout(function() {
                        messagesContainer.append([
                            '<li class="other msg"><img src="./imgs/img_pf_chatbot_tec.png" class="img_perfil_tecnobot_chat">', keywords[i].response, `</li><li class="msg other_hour ">${horas}:${minutos}</li>`
                        ].join(''));
                        messagesContainer.finish().animate({
                            scrollTop: messagesContainer.prop("scrollHeight")
                        }, 250);
                    }, 1500);
                    
                    foundKeyword = true;
                    break;
                }
            }
            if (foundKeyword) break;
        }

        if (!foundKeyword) {
            messagesContainer.append([
                '<li class="self msg">', newMessage, `</li><li class="self_hour msg">${horas}:${minutos}</li>`
            ].join(''));
            
            setTimeout(function() {
                messagesContainer.append([
                    '<li class="other msg"><img src="./imgs/img_pf_chatbot_tec.png" class="img_perfil_tecnobot_chat"> Desculpe, eu não consegui entender sua pergunta.', `</li><li class="msg other_hour ">${horas}:${minutos}</li>`
                ].join(''));
                messagesContainer.finish().animate({
                    scrollTop: messagesContainer.prop("scrollHeight")
                }, 250);
            }, 1500);
        }

        userInput.html('');
        userInput.focus();

        messagesContainer.finish().animate({
            scrollTop: messagesContainer.prop("scrollHeight")
        }, 250);
    }

    function onMetaAndEnter(event) {
        if (event.metaKey) {
            sendNewMessage();
        }
    }
});

