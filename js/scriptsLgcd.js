const optOneUsr = document.getElementById('optOneUsr');
const optTwoUsr = document.getElementById('optTwoUsr');
const cdUsr = document.querySelector('.cdUsr');
const lgUsr = document.querySelector('.lgUsr');
const cdPf = document.querySelector('.cdPf');
const lgPf = document.querySelector('.lgPf');
const contentBoxUsr = document.querySelector('.contentBoxUsr');
const contentBoxPf = document.querySelector('.contentBoxPf');
const linkUsr = document.querySelector('#linkUsr');
const linkPf = document.querySelector('#linkPf');
const boxForOptPf = document.querySelector('.boxForOptPf');
const boxForOptUsr = document.querySelector('.boxForOptUsr');
const endPf = document.querySelector('.endPf');
let radioButtons = document.querySelectorAll('.option');
let ircardPf = document.getElementById('ircardPf');
let ircardUser = document.getElementById('ircardUser');
let screenOptionlogin = document.getElementById('screenOptionlogin');
let btnBackIniEscOpcUsr = document.getElementById("btn_back_ini_esc-opcsUsr");
let btnBackIniEscOpcPf = document.getElementById("btn_back_ini_esc-opcsPf");


btnBackIniEscOpcUsr.addEventListener("click", function () {
    screenOptionlogin.style.display = "block";
    contentBoxUsr.style.display = 'none';
});

btnBackIniEscOpcPf.addEventListener("click", function () {
    screenOptionlogin.style.display = "block";
    contentBoxPf.style.display = 'none';
});


radioButtons.forEach(function (radioButton) {
    radioButton.addEventListener('click', function () {
        radioButtons.forEach(function (rb) {
            if (rb !== radioButton) {
                rb.checked = false;
            }
        });
    });
});

ircardPf.addEventListener("click", function () {
    screenOptionlogin.style.display = "none";
    contentBoxPf.style.display = "block";
});

ircardUser.addEventListener("click", function () {
    screenOptionlogin.style.display = "none";
    contentBoxUsr.style.display = "block";
});

optOneUsr.addEventListener('click', function () {
    cdUsr.style.display = 'block';
    contentBoxUsr.style.display = 'none';
    boxForOptPf.style.display = 'none';
});

optTwoUsr.addEventListener('click', function () {
    lgUsr.style.display = 'block';
    contentBoxUsr.style.display = 'none';
    boxForOptPf.style.display = 'none';
});

optOnePf.addEventListener('click', function () {
    cdPf.style.display = 'block';
    contentBoxPf.style.display = 'none';
    boxForOptUsr.style.display = 'none';
});

optTwoPf.addEventListener('click', function () {
    lgPf.style.display = 'block';
    contentBoxPf.style.display = 'none';
    boxForOptUsr.style.display = 'none';
});




function formatDoc(input) {
    let valor = input.value.replace(/\D/g, '');
    if (valor.length === 11) {
        valor = valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
    } else if (valor.length === 14) {
        valor = valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/, '$1.$2.$3/$4-$5');
    }
    input.value = valor;
}

function backUsr() {
    lgUsr.style.display = 'none';
    cdUsr.style.display = 'none';
    contentBoxUsr.style.display = 'block';
    boxForOptPf.style.display = 'block';

}

function backPf() {
    lgPf.style.display = 'none';
    cdPf.style.display = 'none';
    contentBoxPf.style.display = 'block';
    boxForOptUsr.style.display = 'block';


}

function mdFormUsr() {
    lgUsr.style.display = 'none';
    cdUsr.style.display = 'block';
}

function mdFormPf() {
    lgPf.style.display = 'none';
    cdPf.style.display = 'block';
}

function mdFormCdUsr() {
    lgUsr.style.display = 'block';
    cdUsr.style.display = 'none';
}

function mdFormCdPf() {
    lgPf.style.display = 'block';
    cdPf.style.display = 'none';
}



////// validação de inputs/////////

const campos = document.querySelectorAll('.require');
const label = document.querySelectorAll('.label-require');
const spans = document.querySelectorAll('.span-require');
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

function setError(index) {
    campos[index].style.borderBottom = '1px solid #e63636';
    spans[index].style.display = 'block';
    label[index].style.color = '#e63636';
}

function setErrorDate(index) {
    campos[index].style.border = '1px solid #e63636';
    spans[index].style.display = 'block';
    label[index].style.color = '#e63636';
}

function clearError(index) {
    campos[index].style.border = '';
    spans[index].style.display = 'none';
    label[index].style.color = '';

}
function nameValidate() {
    if (campos[0].value.length < 13) {
        setError(0);
        spans[0].style.color = '#e63636';
        label[0].style.color = '#e63636';
    }
    else {
        campos[0].style.border = '';
        spans[0].style.display = 'none';
        label[0].style.color = '';
    }
}

function emailValidate() {
    if (!emailRegex.test(campos[2].value)) {
        setError(2);
    }
    else {
        campos[2].style.border = '';
        spans[2].innerHTML = "";
        label[2].style.color = '';
    }
}
function celValidate() {
    let lblCelUsr = document.getElementById("lblCelUsr");
    let inputCelUsr = document.getElementById("inputCelUsr");
    let spanErrorCllrUsr = document.getElementById("spanErrorCllrUsr");
    let inputCelValue = inputCelUsr.value;


    if (inputCelValue.length < 11) {
        lblCelUsr.style.color = "#e63636";
        inputCelUsr.style.borderBottom = "2px solid #e63636";
        spanErrorCllrUsr.style.display = "block";
        spanErrorCllrUsr.innerHTML = "*Insira um número válido*";
    }
    else {
        lblCelUsr.style.color = "";
        inputCelUsr.style.borderBottom = "";
        spanErrorCllrUsr.style.display = "none";

    }
}


function emailValidatepf() {
    let inputEmailPf = document.getElementById("inputEmailPf");
    let msgEmailError = document.getElementById("emailError");
    let labelEmailpf = document.getElementById("labelEmailpf");
    let inputEmailPfValue = inputEmailPf.value;
    let testEmailVal = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!testEmailVal.test(inputEmailPfValue) || !inputEmailPfValue.endsWith(".com")) {
        inputEmailPf.style.borderBottom = "2px solid #e63636";
        msgEmailError.textContent = "*Insira um Email válido*";
        msgEmailError.style.display = "block";
        labelEmailpf.style.color = "#e63636";
    } else {
        inputEmailPf.style.borderBottom = "";
        msgEmailError.style.display = "none";
        labelEmailpf.style.color = "";
    };
};

function celValidatepf() {

    let inputCllrPf = document.getElementById("inputCllrPf");
    let labelCllrPf = document.getElementById("labelCllrPf");
    let phoneError = document.getElementById("phoneError");
    let inputCllrPfValue = inputCllrPf.value.replace(/\D/g, '');
    let testPhoneVal = /^\d{11}$/;
    inputCllrPf.maxLength = 11;

    if (!testPhoneVal.test(inputCllrPfValue)) {
        inputCllrPf.style.borderBottom = "2px solid #e63636";
        labelCllrPf.style.color = "#e63636";
        phoneError.textContent = "*Número de telefone inválido*";
        phoneError.style.display = "block";
    } else {
        inputCllrPf.style.borderBottom = "";
        phoneError.style.display = "none";
        labelCllrPf.style.color = "";
    }
}

function formatCell(input) {

    let valor = input.value.replace(/\D/g, '');
    if (valor.length === 11) {
        valor = valor.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
    }
    input.value = valor;
}


function passwordPf() {
    let inputPasswordpf = document.getElementById("inputPasswordpf");
    let senhaPf = inputPasswordpf.value;
    let labelPass = document.getElementById("labelPass");
    let erroMsgPassPf = document.getElementById("erroMsgPassPf");

    if (senhaPf.length < 8) {
        inputPasswordpf.style.borderBottom = "2px solid #e63636";
        labelPass.style.color = "#e63636";
        erroMsgPassPf.style.display = "block";
        erroMsgPassPf.textContent = "*Insira uma senha válida*";
    } else {
        inputPasswordpf.style.borderBottom = "";
        erroMsgPassPf.style.display = "none";
        labelPass.style.color = "";
    }


}

function passwordPfCf() {
    let inputPasswordpf = document.getElementById("inputPasswordpf");
    let senhaPf = inputPasswordpf.value;

    let inputCfPfPass = document.getElementById("inputCfPfPass");
    let labelcfpassPf = document.getElementById("labelCfpassPf");
    let erroMsgPassCfPf = document.getElementById("erroMsgPassCfPf");
    let senhaCf = inputCfPfPass.value;

    if (senhaCf != senhaPf) {
        inputCfPfPass.style.borderBottom = "2px solid #e63636";
        labelcfpassPf.style.color = "#e63636";
        erroMsgPassCfPf.style.display = "block";
        erroMsgPassCfPf.textContent = "*Senhas Não conferem*";
    } else {
        inputCfPfPass.style.borderBottom = "";
        erroMsgPassCfPf.style.display = "none";
        labelcfpassPf.style.color = "";
    }

}

function imporError(element, errorMessage) {
    element.style.borderBottom = '1px solid #e63636';
    element.nextElementSibling.textContent = errorMessage;
    element.nextElementSibling.style.display = 'block';
    element.previousElementSibling.style.color = '#e63636';
}

function reterError(element) {
    element.style.borderBottom = '';
    element.nextElementSibling.textContent = '';
    element.nextElementSibling.style.display = 'none';
    element.previousElementSibling.style.color = '';
}

function nameValidate() {
    const nomeInput = document.querySelector('[name="pfName"]');
    const nomeValue = nomeInput.value.trim();

    if (nomeValue.length < 9) {
        imporError(nomeInput, '*Escreva seu nome completo*');
    } else {
        reterError(nomeInput);
    }
}

function dataValidate() {
    let birthDateInput = document.getElementById('dtNas');
    let lblDtNas = document.getElementById('lblDtNas');
    let inputDate = birthDateInput.value;
    let errorSpan = document.getElementById('spanErrorNameUsr');
    let currentDate = new Date();
    let enteredDate = new Date(inputDate);
    let age = currentDate.getFullYear() - enteredDate.getFullYear();
    let isDateValid = !isNaN(enteredDate.getTime());
    let isAbove18 = age >= 18;

    if (inputDate === "") {
        lblDtNas.style.color = "#e63636";
        errorSpan.style.display = "block";
        errorSpan.textContent = "*Data inválida*";
        birthDateInput.style.border = "1px solid #e63636";
        birthDateInput.parentElement.classList.add('Error_data_container');
        birthDateInput.parentElement.classList.remove('clear_data_error_container');
    } else if (!isDateValid) {
        lblDtNas.style.color = "#e63636";
        errorSpan.style.display = "block";
        errorSpan.textContent = "*Data inválida*";
        birthDateInput.style.border = "1px solid #e63636";
        birthDateInput.parentElement.classList.add('Error_data_container');
        birthDateInput.parentElement.classList.remove('clear_data_error_container');
    } else if (!isAbove18) {
        lblDtNas.style.color = "#e63636";
        errorSpan.style.display = "block";
        errorSpan.textContent = "*Você precisa ter mais de 18 anos*";
        birthDateInput.style.border = "1px solid #e63636";
        birthDateInput.parentElement.classList.add('Error_data_container');
        birthDateInput.parentElement.classList.remove('clear_data_error_container');
    } else {
        birthDateInput.style.border = "";
        lblDtNas.style.color = "";
        errorSpan.style.display = "none";
        birthDateInput.parentElement.classList.add('clear_data_error_container');
    }
}
function dataValidatePf() {
    let birthDateInput = document.getElementById('inputDataNascPf');
    let lblDtNas = document.getElementById('lblDtNasPf');
    let inputDate = birthDateInput.value;
    let errorSpan = document.getElementById('spanErrorDataNascUsr');
    let currentDate = new Date();
    let enteredDate = new Date(inputDate);
    let age = currentDate.getFullYear() - enteredDate.getFullYear();
    let isDateValid = !isNaN(enteredDate.getTime());
    let isAbove18 = age >= 18;

    if (inputDate === "") {
        lblDtNas.style.color = "#e63636";
        errorSpan.style.display = "block";
        errorSpan.textContent = "*Data inválida*";
        birthDateInput.style.border = "1px solid #e63636";
        birthDateInput.parentElement.classList.add('Error_data_container');
        birthDateInput.parentElement.classList.remove('clear_data_error_container');
    } else if (!isDateValid) {
        lblDtNas.style.color = "#e63636";
        errorSpan.style.display = "block";
        errorSpan.textContent = "*Data inválida*";
        birthDateInput.style.border = "1px solid #e63636";
        birthDateInput.parentElement.classList.add('Error_data_container');
        birthDateInput.parentElement.classList.remove('clear_data_error_container');
    } else if (!isAbove18) {
        lblDtNas.style.color = "#e63636";
        errorSpan.style.display = "block";
        errorSpan.textContent = "*Você precisa ter mais de 18 anos*";
        birthDateInput.style.border = "1px solid #e63636";
        birthDateInput.parentElement.classList.add('Error_data_container');
        birthDateInput.parentElement.classList.remove('clear_data_error_container');
    } else {
        birthDateInput.style.border = "";
        lblDtNas.style.color = "";
        errorSpan.style.display = "none";
        birthDateInput.parentElement.classList.add('clear_data_error_container');
    }
}

function formatCnpj(cnpjInput) {
    let cnpjValue = cnpjInput.value.replace(/\D/g, '');

    cnpjValue = cnpjValue.replace(/^(\d{2})(\d)/, '$1.$2');
    cnpjValue = cnpjValue.replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3');
    cnpjValue = cnpjValue.replace(/\.(\d{3})(\d)/, '.$1/$2');
    cnpjValue = cnpjValue.replace(/(\d{4})(\d)/, '$1-$2');

    cnpjInput.value = cnpjValue;
}

function cpfValidate() {
    const cpfInput = document.querySelector('[name="cnpj"]');
    let cpfValue = cpfInput.value.trim();

    cpfValue = cpfValue.replace(/\D/g, '');

    if (cpfValue.length !== 14 || isNaN(cpfValue)) {
        imporError(cpfInput, '*CNPJ inválido! verifique e corrija*');
    } else {
        reterError(cpfInput);
        formatCnpj(cpfInput);
    }
}

// --------------------------------------------------------------------------


function nameValidateUsr() {

    const nomeInput = document.querySelector('[name="usrName"]');
    const nomeValue = nomeInput.value.trim();

    if (nomeValue.length < 9) {
        imporError(nomeInput, '*Escreva seu nome completo*');
    } else {
        reterError(nomeInput);
    }
}

function cpfUsrVal() {
    let lblcpfUsrVal = document.getElementById('lblcpfUsrVal');
    let inputCpfUsrVal = document.getElementById('inputCpfUsrVal');
    let spanErrorCpfUsr = document.getElementById('spanErrorCpfUsr');

    if (inputCpfUsrVal.value.length < 11 || inputCpfUsrVal.value.length == "") {
        lblcpfUsrVal.style.color = "#e63636";
        inputCpfUsrVal.style.borderBottom = "2px solid #e63636";
        spanErrorCpfUsr.style.display = "block";
        spanErrorCpfUsr.textContent = "*Insira um CPF válido*";
    }
    else {
        lblcpfUsrVal.style.color = "";
        inputCpfUsrVal.style.borderBottom = "";
        spanErrorCpfUsr.style.display = "none";

    }

}

function PassUsrVal() {
    let labelPassUsr = document.getElementById('labelPassUsr');
    let inputPassUsr = document.getElementById('inputPassUsr');
    let spanErrorPassUsr = document.getElementById('spanErrorPassUsr');

    if (inputPassUsr.value.length < 8) {
        labelPassUsr.style.color = "#e63636";
        inputPassUsr.style.borderBottom = "2px solid #e63636";
        spanErrorPassUsr.style.display = "block";
    }
    else {
        labelPassUsr.style.color = "";
        inputPassUsr.style.borderBottom = "";
        spanErrorPassUsr.style.display = "none";

    }
}

function PassCfUsrVal() {
    let labelCfPassUsr = document.getElementById('labelCfPassUsr');
    let inputCfPassUsr = document.getElementById('inputCfPassUsr');
    let inputPassUsr = document.getElementById('inputPassUsr');
    let spanErrorCfPassUsr = document.getElementById('spanErrorCfPassUsr');

    if (inputCfPassUsr.value !== inputPassUsr.value) {
        labelCfPassUsr.style.color = "#e63636";
        inputCfPassUsr.style.borderBottom = "2px solid #e63636";
        spanErrorCfPassUsr.style.display = "block";
    } else {
        labelCfPassUsr.style.color = "";
        inputCfPassUsr.style.borderBottom = "";
        spanErrorCfPassUsr.style.display = "";
    }
}


function validateCPF(cpf) {
    cpf = cpf.replace(/[^\d]/g, '');
    if (cpf.length !== 11) return false;

    let digits = cpf.split('').map(Number);
    if (digits.every(digit => digit === digits[0])) return false;

    let sum = 0;
    for (let i = 0; i < 9; i++) {
        sum += digits[i] * (10 - i);
    }
    let remainder = sum % 11;
    let firstDigit = (remainder < 2) ? 0 : 11 - remainder;

    if (firstDigit !== digits[9]) return false;

    sum = 0;
    for (let i = 0; i < 10; i++) {
        sum += digits[i] * (11 - i);
    }
    remainder = sum % 11;
    let secondDigit = (remainder < 2) ? 0 : 11 - remainder;

    return secondDigit === digits[10];
}

