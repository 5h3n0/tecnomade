<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Assistente - Tecno</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <style>
    body {
      background: black;
    }

    .chatbox {
      background-color: gray;
      border: 5px solid rgb(20, 87, 91);
      border-radius: 5px;
      padding: 10px;
      max-width: 400px;
      margin: auto;
      font-family: Arial, sans-serif;
      position: relative; /* Adicionado para posicionar corretamente o parágrafo Tecno */
    }
	.fas{
		color: white !important;
	}
    .header h2 {
      margin: 0;
      font-size: 18px;
      color: rgb(13, 107, 91);
    }

    .options {
      margin-top: 10px;
    }

    .options p {
      margin: 0;
      font-size: 14px;
      color: white;
      margin-bottom: 5px;
    }

    .options ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .options li {
      margin-bottom: 5px;
    }

    .uii-op {
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      color: #333;
      display: block;
      padding: 10px;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .uii-op:hover {
      background-color: #eee;
    }

    /* Adiciona estilo para a resposta do bot */
    .bot {
      background-color: rgb(20, 87, 91);
      color: #fff;
      border-radius: 5px;
      padding: 10px;
      margin-top: 10px;
      margin-left: auto;
      max-width: 70%;
    }

    .bot::before {
      content: "";
      position: absolute;
      top: 50%;
      right: 100%;
      margin-top: -5px;
      border-style: solid;
      border-width: 5px;
      border-color: transparent;
    }

    .tecno {
      color: green !important;
    }

    li {
      color: white;
    }
  </style>
</head>
<body>
  <div class="chatbox">
    <div class="header">
      <a href="#" onclick="window.history.back()"><i class="fas fa-chevron-left"></i></a>
      <h2>Assistente Virtual</h2>
    </div>
    <div class="options">
      <p>Olá! Como posso ajudá-lo?</p>
      <ul>
        <li><a href="#" class="uii-op style-menu" onclick="responder('o Profissional Luiz é gay')">Dúvidas Sobre Os Profissionais</a></li>
        <li><a href="#" class="uii-op style-menu" onclick="responder('Opaaaaaaaaaaaaaaaaaa')">Como funciona a contratação de Serviços</a></li>
        <li><a href="#" class="uii-op style-menu" onclick="responder('Opaaaaaaaaaaaaaaaaaa')">Meu Perfil</a></li>
        <li><a href="#" class="uii-op style-menu" onclick="responder('Opaaaaaaaaaaaaaaaaaa')">Eventos Gratuitos</a></li>
        <li><a href="#" class="uii-op style-menu" onclick="responder('Opaaaaaaaaaaaaaaaaaa')">Suas Consultas</a></li>
      </ul>
    </div>
  </div>

  <script>
    function responder(opcao) {
      // Cria uma mensagem de resposta do bot
      const mensagemBot = document.createElement('div');
      mensagemBot.classList.add('bot');

      // Adiciona o texto da opção ao parágrafo
      const tecno = document.createElement('p');
      tecno.innerHTML = '<span class="tecno">Tecno:</span> ' + opcao;

      // Adiciona o parágrafo à mensagem do bot
      mensagemBot.appendChild(tecno);

      // Adiciona a mensagem de resposta do bot à caixa de chat
      document.querySelector('.options').appendChild(mensagemBot);
    }
  </script>
</body>
</html>
