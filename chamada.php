<nav><br><br><br><br><br><br><br><br><br><br><br><br>
    <ul>
        <li><a href="#" onclick="loadPage('footer.php')">Página Principal</a></li>
        <li><a href="#" onclick="loadPage('contratService.php')">Sobre</a></li>
        <li><a href="#" onclick="loadPage('contato.php')">Contato</a></li>
    </ul>
</nav>

<div id="content">
    <!-- Aqui será carregado o conteúdo da página -->
</div>

<script>
    function loadPage(page) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", page, true);
        xhttp.send();
    }
</script>
