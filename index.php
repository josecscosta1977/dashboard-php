<?php

require __DIR__ . "/vendor/autoload.php";

use src\Dados;

$dados = new Dados;

?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
        <script type="text/javascript" src="assets/js/js.js"></script>
    </head>
    <body>
        <main class="base">
            <header class="cabecalho">
                <h1>Acidentes de Trânsito - Recife 2021</h1>
                <h4>Fonte: <a class="link" href="http://www.dados.recife.pe.gov.br" target="_blank">www.dados.recife.pe.gov.br</a></h4>
            </header>
            <hr>
            <section class="secao_principal">
                <section class="linha">
                    <article class="secao-secundaria-1">
                        <h4 class="texto-cor centro">Número de acidentes por mês</h4>
                        <div id="myChart1" style="width:100%;"></div>
                    </article>

                    <article class="secao-secundaria">
                        <h4 class="texto-cor centro">Número de ocorrências</h4>
                        <p class="tamanho centro margem"><?php print_r($dados->getMes("total")); ?></p>
                    </article>
                </section>    

                <section class="linha">
                    <article class="secao-secundaria">
                    <h4 class="centro texto-cor">Acidentes com e sem vítimas</h4>
                        <div id="myChart2" style="width:100%; min-width:300px; height:250px;"></div>
                    </article>

                    <article class="secao-secundaria">
                        <h4 class="centro texto-cor">Acidentes por períodos do dia</h4>
                        <div id="myChart" style="width:100%; min-width:300px; height:250px;"></div>
                    </article>

                    <article class="secao-secundaria-2">
                        <h4 class="centro texto-cor">Acidentes por bairros</h4>
                        <div id="myChart3" style="width:100%; min-width:500px; height:250px;"></div>
                    </article>
                </section>
            </section>
            <!-- <footer class="rodape">
                <p> </p>
            </footer> -->
        </main>
        <script type="text/javascript">
            google.charts.load('current',{packages:['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            google.charts.setOnLoadCallback(drawChart1);
            google.charts.setOnLoadCallback(drawChart2);
            google.charts.setOnLoadCallback(drawChart3);
        
            /* ------------------------------------------- */

            function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Contry', 'Mhl'],
            ['Manhã', <?php print_r($dados->getPorcentagem("manha")) ?>],
            ['Tarde', <?php print_r($dados->getPorcentagem("tarde")) ?>],
            ['Noite', <?php print_r($dados->getPorcentagem("noite")) ?>]
            ]);

            var options = {
            /* title:'Acidentes por períodos do dia', */
            is3D:true,
            responsive:true
            };

            var chart = new google.visualization.PieChart(document.getElementById('myChart'));
            chart.draw(data, options);
            }

            /* ------------------------------------------- */

            function drawChart1(){
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Mês');
            data.addColumn('number', 'Acidentes');
            
            data.addRows(
                [
                    ['Jan', <?php print_r($dados->getMes("janeiro")) ?>],
                    ['Fev', <?php print_r($dados->getMes("fevereiro")) ?>],
                    ['Mar', <?php print_r($dados->getMes("marco")) ?>],
                    ['Abr', <?php print_r($dados->getMes("abril")) ?>],
                    ['Mai', <?php print_r($dados->getMes("maio")) ?>],
                    ['Jun', <?php print_r($dados->getMes("junho")) ?>],
                    ['Jul', <?php print_r($dados->getMes("julho")) ?>],
                    ['Ago', <?php print_r($dados->getMes("agosto")) ?>],
                    ['Set', <?php print_r($dados->getMes("setembro")) ?>],
                    ['Out', <?php print_r($dados->getMes("outubro")) ?>],
                    ['Nov', <?php print_r($dados->getMes("novembro")) ?>],
                    ['Dez', <?php print_r($dados->getMes("dezembro")) ?>]
                ]            
            );

            var options = {
                /* 'title':'Quantidade de acidentes/mês' */
                responsive:true
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('myChart1'));
            chart.draw(data, options);
            }

            /* ------------------------------------------- */
            
            function drawChart2() {
            var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Sem vítimas', <?php print_r($dados->getVitimas("semVitima")); ?>],
            ['Com vítimas', <?php print_r($dados->getVitimas("comVitima")); ?>]
            ]);

            var options = {
            /* title: 'Acidentes com e sem vítimas', */
            pieHole: 0.4,
            is3D: true,
            responsive:true
            };

            var chart = new google.visualization.PieChart(document.getElementById('myChart2'));
            chart.draw(data, options);
            }

            /* ------------------------------------------- */

            function drawChart3() {

            var data = google.visualization.arrayToDataTable([
            ['Contry', 'Bairros'],
            ['Boa Viagem', <?php print_r($dados->getBairro("boaviagem")); ?>],
            ['Afogados', <?php print_r($dados->getBairro("afogados")); ?>],
            ['Boa Vista', <?php print_r($dados->getBairro("boavista")); ?>],
            ['Imbiribeira', <?php print_r($dados->getBairro("imbiribeira")); ?>],
            ['Ipsep', <?php print_r($dados->getBairro("ipsep")); ?>]
            ]);

            var options = {
            responsive:true
            };

            var chart = new google.visualization.BarChart(document.getElementById('myChart3'));
            chart.draw(data, options);

            }

        </script>
    </body>
</html>    