<?php
include('connect.php');


?>

<html>

<body>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
            <style>
                main{
                    margin-top: 85px;
                }

            </style>
    </head>

    <?php
    include_once('navPf.php');
    ?>
    <main>
        <form action="servicesInsert">
            <label for="sName">Nome do serviço:</label><br/>
            <input type="text" name='sName' placeholder="serviço" required><br>
            <label for="sname">Categoria de serviço:</label><br/>
            <select name="sCat" id="sCat" required>
                <option value="" selected disabled>Selecionar Categoria</option>
                <option value="1">Manutenção preventiva de Hardware</option>
                <option value="2">Manutenção de Desktop/Notebook</option>
                <option value="3">Infraestrutura de rede</option>
                <option value="4">Manutenção de rede sem fio</option>
                <option value="5">Desenvolvimento Web</option>
                <option value="6">Desenvolvimento de Games</option>
                <option value="7">Desenvolvimento de Sistemas</option> 
                <option value="8">Manutenção de Servidores</option>
                <option value="9">Instalação de Câmeras/Alarmes</option>
                <option value="10">Power BI</option>
                <option value="11">UI/UX Design</option>
                <option value="12">Aplicações para dispositivos Móveis</option>
            </select><br>
            <label for="sDesc">Descrição de serviço</label><br>
            <textarea name="sDesc" maxlength="255" rows="4" cols="50" required></textarea><br>
        </form>
    </main>
    <?php
    include_once('footer.php');
    ?>
</body>

</html>