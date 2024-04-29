<?php
include("connect.php");
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<head>
	<link rel="stylesheet" href="./css/style_home.css">
</head>
<script src="./js/script.js"></script>


<div class="header cleafix">
	<div class="container_nav">

		<a class="backhome" href="index.php">
			<img src="./imgs/img_logo_white_and_black.png" class="logo" />
			<h1 class="title_nav">TecnoMade</h1>
		</a>
		<div class="menu-icon" onclick="toggleNav()">&#9776;</div>
		
		<ul class="nav">
			<li><a href="index.php" class="nav-links linkHome">Home</a></li>
			<li><a href="#" class="nav-links">Services</a></li>
			<li><a href="#" class="nav-links">Contact</a></li>
			<li><a href="sobre.php" class="nav-links">About</a></li>
			<li><a href="lgcd.php" class="nav-links linkRegister">Register</a></li>
			<li><a href="#" class="nav-links cliente" id="loginOpen" onclick="abrirTelamenu()">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
						stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
						class="feather feather-user">
						<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
						<circle cx="12" cy="7" r="4"></circle>
					</svg>
				</a></li>
		</ul>

	</div>

	<div style="display: none;" id="loginContainer" class="login_container">

		<form action="loginUsrBd.php" method="post" class="form_login">

		<a href="#" onclick="fechar()"><svg class="btn_fechar_login" xmlns="http://www.w3.org/2000/svg"
					class="icon icon-tabler icon-tabler-letter-x" width="35" height="35" viewBox="0 0 24 24"
					stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
					<path stroke="none" d="M0 0h24v24H0z" fill="none" />
					<path d="M7 4l10 16" />
					<path d="M17 4l-10 16" />
				</svg></a>


			<ul class="login_nav">
				<li class="login_nav_item active nav-links">
					<a href="#" id="userFocus">Cliente</a>
				</li>
				<li class="login_nav_item nav-links">
					<a href="#" id="prfFocus">Profissional</a>
				</li>
			</ul>

			<label for="login_input_user" id="lblLogin_input_user" class="login_label">
				Email<input id="login_input_user" name="email" name="enviarForm" class="login_input" type="text" required />
			</label>

			

			<label for="login_input_password" id="lblLogin_input_password" class="login_label">
				Password<input id="login_input_password" name="usrPass" class="login_input" type="password" required/>
			</label>

			
			<!-- alterar para pfPass -->

			<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" id="visuOff"><path   fill="rgb(0, 123, 111)" d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z"/></svg>
			<svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" id="visuOn" style="display: none;"><path fill="rgb(0, 123, 111)" d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>

			<label for="login_sign_up" class="login_label_checkbox">

					<a href="#" class="login_forgot">Forgot Password?</a>
					<span class="bdfrea"><input id="login_sign_up" type="checkbox" class="login_input_checkbox"/>Keep me Signed in</span>  

			</label>

			<input type="submit" value="sign in" name="enviarForm" class="login_submit" />

			<hr class="breakLine35">
				<a href="#" class="DontCadastroLink" style="text-align: center;">Don't have a registration? Click here</a>
		</form>




	</div>

	<script>


		let login_input_password = document.getElementById("login_input_password");

		const  screen_exibition_ini = document.querySelector(".screen_exibition_ini");
		const loginContainer = document.getElementById("loginContainer");
		const loginSubmitButton = document.getElementById("loginSubmit");

		function abrirTelamenu() {
			if (loginContainer.style.display = "none") {
				loginContainer.style.display = "block";
			} else {
				loginContainer.style.display = "none";
			};
		};

		function fechar() {
			loginContainer.style.display = "none";
		};

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

		const prfFocus = document.getElementById("prfFocus");
		const userFocus = document.getElementById("userFocus");
		


		userFocus.addEventListener("click", () => { 
		userFocus.style.color = "white"; 
		prfFocus.style.color = "rgba(255, 255, 255, 0.5)"; 
		login_input_password.name="usrPass";
		document.querySelector(".form_login").action="loginUsrBd.php";
	
	})
		prfFocus.addEventListener("click", () => { 
		prfFocus.style.color = "white";
		userFocus.style.color = "rgba(255, 255, 255, 0.5)"; 
		login_input_password.name="pfPass";
		document.querySelector(".form_login").action="loginPfBd.php";
		
		});

		var ocultarClienteIcon = "http://localhost/tecnomade/lgcd.php";
		if (window.location.href === ocultarClienteIcon) {
    	var svgElement = document.querySelector('.cliente');
    	var linkRegister = document.querySelector('.linkRegister');
    	if (svgElement) {
        svgElement.style.display = "none";
        linkRegister.style.display = "none";
    	}

	}
	var ocultarHome = "http://localhost/tecnomade/index.php";
	if (window.location.href === ocultarHome) {
    	var linkHome = document.querySelector('.linkHome');

    	if (linkHome) {
        linkHome.style.display = "none";
    	}

	}
	</script>
</div>




