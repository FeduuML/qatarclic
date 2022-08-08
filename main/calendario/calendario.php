<?php
    session_start();

    require '../../account/database.php';

    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        $sql = "SELECT * FROM users WHERE id = $user_id";
        $query = $conn->prepare($sql);
        $query->execute();
        $results = $query -> fetch(PDO::FETCH_ASSOC);
        
        $username = $results['username'];
    }
?>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="calendario.css" />
        <title>Qatar Clic</title>
        <link href="../../styles/header.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
    </head>

    <body>
        <header class="header" id="header">
            <div class="wrapper">
                <div class="logo"><?php require '../../header/header.php';?></div>
                <nav>
                    <?php 
                    if(isset($_SESSION['user_id'])){
                        echo("<div id='navicon' onclick='navicon()' class='navicon_box'><i class='navicon fas fa-solid fa-user fa-2x'></i></div>");

                        if($_SESSION['rol_id'] == 1){
                            echo("<div id='user_options' style='height:80%;' class='user_options'><h1>$username</h1><hr><br><a href='../special_users/moderador.php'>Gestionar usuarios</a><br><br><a href='../settings.php'>Ajustes</a><br><br><a href='../../account/logout.php'>Cerrar sesion</a></div>");
                        }
                        else{
                            echo("<div id='user_options' style='height:60%;' class='user_options'><h1>$username</h1><hr><br><a href='../settings.php'>Ajustes</a><br><br><a href='../../account/logout.php'>Cerrar sesion</a></div>");
                        }
                    }
                    else{
                        echo("<a href='../../account/login.php'>Iniciar sesion</a>");
                    } ?>
                </nav>
            </div>

            <nav class="navegador_general" id="navbar">
                <div class="perfil">
                    <h1 class="text">Perfil</h1>
                </div>

                <div class="fixture">
                    <h1 class="text">Fixture</h1>
                </div> 
            
                <div class="calendario">
                   <h1 class="text" id="calendario" onclick="calendario()">Calendario</h1>
                </div>

                <div class="qatar">
                    <h1 class="text">Sobre Qatar<h1>
                </div>

                <div class="selecciones">
                    <h1 class="text">Selecciones<h1>
                </div>

                <div class="comunidad">
                    <h1 class="text">Comunidad<h1>
                </div>
            </nav>
        </header>

        <div class="wrap">
            <div class="references" id="blur2">
                <p onclick="references()">▶</p>
            </div>
        </div>

        <div class="container" id="blur">
            <div class="meses" id="mes-noviembre">
                <div id="showReferences">
                    <h1>Referencias</h1>
                    <table class="table">
                        <tr><td colspan="2" style="background-color:#A9A9A9">Fase de grupos</td></tr>
                        <tr><td colspan="2" style="background: linear-gradient(135deg,#1100ff 10%, #ff7b00);">Octavos de final</td></tr>
                        <tr><td colspan="2" style="background: linear-gradient(135deg,#fffb00, #cc00ff);">Cuartos de final</td></tr>
                        <tr><td colspan="2" style="background: linear-gradient(135deg,#ff0000 10%, #33ff00);">Semifinal</td></tr>
                        <tr><td id="tercerpuesto" colspan="2">Tercer puesto</td></tr>
                        <tr><td id="final" colspan="2">Final</td></tr>
                    </table>
                </div>
                <h1 class="mes">Noviembre 2022</h1>
                <ol>
                    <li class="day-name">Lun</li>
                    <li class="day-name">Mar</li>
                    <li class="day-name">Mie</li>
                    <li class="day-name">Jue</li>
                    <li class="day-name">Vie</li>
                    <li class="day-name">Sab</li>
                    <li class="day-name">Dom</li>

                    <li class="day" id="first-day-november">1</li>
                    <li class="day">2</li>
                    <li class="day">3</li>
                    <li class="day">4</li>
                    <li class="day">5</li>
                    <li class="day">6</li>
                    <li class="day">7</li>
                    <li class="day">8</li>
                    <li class="day">9</li>
                    <li class="day">10</li>
                    <li class="day">11</li>
                    <li class="day">12</li>
                    <li class="day">13</li>
                    <li class="day">14</li>
                    <li class="day">15</li>
                    <li class="day">16</li>
                    <li class="day">17</li>
                    <li class="day">18</li>
                    <li class="day">19</li>
                    <li class="day">20</li>
                    <li class="day" id="grupos" type="button" onclick="toggle1()">21</li>
                    <li class="day" id="grupos" type="button" onclick="toggle2()">22</li>
                    <li class="day" id="grupos" type="button" onclick="toggle3()">23</li>
                    <li class="day" id="grupos" type="button" onclick="toggle4()">24</li>
                    <li class="day" id="grupos" type="button" onclick="toggle5()">25</li>
                    <li class="day" id="grupos" type="button" onclick="toggle6()">26</li>
                    <li class="day" id="grupos" type="button" onclick="toggle7()">27</li>
                    <li class="day" id="grupos" type="button" onclick="toggle8()">28</li>
                    <li class="day" id="grupos" type="button" onclick="toggle9()">29</li>
                    <li class="day" id="grupos" type="button" onclick="toggle10()">30</li>
                </ol>
            </div>

            <div class="meses" id="mes-diciembre">
                <h1 class="mes">Diciembre 2022</h1>
                <ol>
                    <li class="day-name">Lun</li>
                    <li class="day-name">Mar</li>
                    <li class="day-name">Mie</li>
                    <li class="day-name">Jue</li>
                    <li class="day-name">Vie</li>
                    <li class="day-name">Sab</li>
                    <li class="day-name">Dom</li>

                    <li class="day" id="first-day-december" type="button" onclick="toggle11()">1</li>
                    <li class="day" id="grupos" type="button" onclick="toggle12()">2</li>
                    <li class="day" id="octavos" type="button" onclick="toggle13()">3</li>
                    <li class="day" id="octavos" type="button" onclick="toggle14()">4</li>
                    <li class="day" id="octavos" type="button" onclick="toggle15()">5</li>
                    <li class="day" id="octavos" type="button" onclick="toggle16()">6</li>
                    <li class="day">7</li>
                    <li class="day">8</li>
                    <li class="day" id="cuartos" type="button" onclick="toggle17()">9</li>
                    <li class="day" id="cuartos" type="button" onclick="toggle18()">10</li>
                    <li class="day" >11</li>
                    <li class="day" >12</li>
                    <li class="day" id="semifinal" type="button" onclick="toggle19()">13</li>
                    <li class="day" id="semifinal" type="button" onclick="toggle20()">14</li>
                    <li class="day">15</li>
                    <li class="day">16</li>
                    <li class="day" id="tercerpuesto" type="button" onclick="toggle21()">17</li>
                    <li class="day" id="final" type="button" onclick="toggle22()">18</li>
                    <li class="day">19</li>
                    <li class="day">20</li>
                    <li class="day">21</li>
                    <li class="day">22</li>
                    <li class="day">23</li>
                    <li class="day">24</li>
                    <li class="day">25</li>
                    <li class="day">26</li>
                    <li class="day">27</li>
                    <li class="day">28</li>
                    <li class="day">29</li>
                    <li class="day">30</li>
                    <li class="day">31</li>
                </ol>
            </div>
        </div>

        <div id="popups">
            <div id="popup1">
                <h1>Partidos correspondientes al dia 21 de noviembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/senegal.jpg">Senegal vs Paises Bajos<img src="../../images/flags/holanda.jpg"></p>
                <p> 7:00 </p>
                <p><img src="../../images/flags/inglaterra.jpg">Inglaterra vs Irán<img src="../../images/flags/iran.jpg"></p>
                <p> 15:30 </p>
                <p><img src="../../images/flags/qatar.jpg">Catar vs Ecuador <img src="../../images/flags/ecuador.jpg"></p>
                <p> 13:00 </p>
                <p><img src="../../images/flags/eeuu.jpg">Estados Unidos vs Gales <img src="../../images/flags/gales.jpg"></p>
                <p> 16:00 </p>
                <button class="cerrar" href="#" onclick="toggle1()">Cerrar</button>
            </div>

            <div id="popup2">
                <h1>Partidos correspondientes al dia 22 de noviembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/argentina.jpg">Argentina vs Arabia Saudita<img src="../../images/flags/arabia.jpg"></p>
                <p> 7:00 </p>
                <p><img src="../../images/flags/dinamarca.jpg">Dinamarca vs Tunez <img src="../../images/flags/tunez.jpg"></p>
                <p> 10:00 </p>
                <p><img src="../../images/flags/mexico.jpg">Mexico vs Polonia <img src="../../images/flags/polonia.jpg"></p>
                <p> 13:00 </p>
                <p><img src="../../images/flags/francia.jpg">Francia vs Australia <img src="../../images/flags/australia.jpg"></p>
                <p> 16:00 </p>
                <button class="cerrar" href="#" onclick="toggle2()">Cerrar</button>
            </div>

            <div id="popup3">
                <h1>Partidos correspondientes al dia 23 de noviembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/marruecos.jpg">Marruecos vs Croacia <img src="../../images/flags/croacia.jpg"></p>
                <p> 7:00 </p>
                <p><img src="../../images/flags/alemania.jpg">Alemania vs Japon <img src="../../images/flags/japon.jpg"></p>
                <p> 10:00 </p>
                <p><img src="../../images/flags/españa.jpg">España vs Costa Rica <img src="../../images/flags/costa_rica.jpg"></p>
                <p> 13:00 </p>
                <p><img src="../../images/flags/belgica.jpg">Belgica vs Canada <img src="../../images/flags/canada.jpg"></p>
                <p> 16:00 </p>
                <button class="cerrar" href="#" onclick="toggle3()">Cerrar</button>
            </div>

            <div id="popup4">
                <h1>Partidos correspondientes al dia 24 de noviembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/suiza.jpg">Suiza vs Camerun <img src="../../images/flags/camerun.jpg"></p>
                <p> 7:00 </p>
                <p><img src="../../images/flags/uruguay.jpg">Uruguay vs Corea del Sur <img src="../../images/flags/korea.jpg"></p>
                <p> 10:00 </p>
                <p><img src="../../images/flags/portugal.jpg">Portugal  vs Ghana <img src="../../images/flags/ghana.jpg"></p>
                <p> 13:00 </p>
                <p><img src="../../images/flags/brasil.jpg">Brasil vs Serbia <img src="../../images/flags/serbia.jpg"></p>
                <p> 16:00 </p>
                <button class="cerrar" href="#" onclick="toggle4()">Cerrar</button>
            </div>

            <div id="popup5">
                <h1>Partidos correspondientes al dia 25 de noviembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/gales.jpg">Gales vs Iran <img src="../../images/flags/iran.jpg"></p>
                <p> 7:00 </p>
                <p><img src="../../images/flags/qatar.jpg">Catar vs Senegal <img src="../../images/flags/senegal.jpg"></p>
                <p> 10:00 </p>
                <p><img src="../../images/flags/holanda.jpg">Paises Bajos vs Ecuador <img src="../../images/flags/ecuador.jpg"></p>
                <p> 13:00 </p>
                <p><img src="../../images/flags/inglaterra.jpg">Inglaterra vs Estados Unidos <img src="../../images/flags/eeuu.jpg"></p>
                <p> 16:00 </p>
                <button class="cerrar" href="#" onclick="toggle5()">Cerrar</button>
            </div>

            <div id="popup6">
                <h1>Partidos correspondientes al dia 26 de noviembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/tunez.jpg">Tunez vs Australia<img src="../../images/flags/australia.jpg"></p>
                <p> 7:00 </p>
                <p><img src="../../images/flags/polonia.jpg">Polonia vs Arabia Saudita<img src="../../images/flags/arabia.jpg"></p>
                <p> 10:00 </p>
                <p><img src="../../images/flags/francia.jpg">Francia vs Dinamarca<img src="../../images/flags/dinamarca.jpg"></p>
                <p> 13:00 </p>
                <p><img src="../../images/flags/argentina.jpg">Argentina vs Mexico<img src="../../images/flags/mexico.jpg"></p>
                <p> 16:00 </p>
                <button class="cerrar" href="#" onclick="toggle6()">Cerrar</button>
            </div>

            <div id="popup7">
                <h1>Partidos correspondientes al dia 27 de noviembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/japon.jpg">Japon vs Costa Rica <img src="../../images/flags/costa_rica.jpg"></p>
                <p> 7:00 </p>
                <p><img src="../../images/flags/belgica.jpg">Belgica vs Marruecos <img src="../../images/flags/marruecos.jpg"></p>
                <p> 10:00 </p>
                <p><img src="../../images/flags/croacia.jpg">Croacia vs Canada <img src="../../images/flags/canada.jpg"></p>
                <p> 13:00 </p>
                <p><img src="../../images/flags/españa.jpg">España vs Alemania <img src="../../images/flags/alemania.jpg"></p>
                <p> 16:00 </p>
                <button class="cerrar" href="#" onclick="toggle7()">Cerrar</button>
            </div>

            <div id="popup8">
                <h1>Partidos correspondientes al dia 28 de noviembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/camerun.jpg">Camerún vs Serbia <img src="../../images/flags/serbia.jpg"></p>
                <p> 7:00 </p>
                <p><img src="../../images/flags/korea.jpg">Corea del Sur vs Ghana <img src="../../images/flags/ghana.jpg"></p>
                <p> 10:00 </p>
                <p><img src="../../images/flags/brasil.jpg">Brasil vs Suiza <img src="../../images/flags/suiza.jpg"></p>
                <p> 13:00 </p>
                <p><img src="../../images/flags/portugal.jpg">Portugal vs Uruguay <img src="../../images/flags/uruguay.jpg"></p>
                <p> 16:00 </p>
                <button class="cerrar" href="#" onclick="toggle8()">Cerrar</button>
            </div>

            <div id="popup9">
                <h1>Partidos correspondientes al dia 29 de noviembre del 2022</h1>
                <br>
                <p><p><img src="../../images/flags/holanda.jpg">Paises Bajos vs Qatar<img src="../../images/flags/qatar.jpg">7:00</p>
                <p> 7:00 </p>
                <p><p><img src="../../images/flags/ecuador.jpg">Ecuador vs Senegal<img src="../../images/flags/senegal.jpg">10:00</p>
                <p> 10:00 </p>
                <p><p><img src="../../images/flags/gales.jpg">Gales vs Inglaterra<img src="../../images/flags/inglaterra.jpg">13:00</p>
                <p> 13:00 </p>
                <p><p><img src="../../images/flags/iran.jpg">Irán vs Estados Unidos<img src="../../images/flags/eeuu.jpg">16:00</p>
                <p> 16:00 </p>
                <button class="cerrar" href="#" onclick="toggle9()">Cerrar</button>
            </div>

            <div id="popup10">
                <h1>Partidos correspondientes al dia 30 de noviembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/tunez.jpg">Túnez vs Francia<img src="../../images/flags/francia.jpg"></p>
                <p> 7:00 </p>
                <p><img src="../../images/flags/australia.jpg">Australia vs Dinamarca<img src="../../images/flags/dinamarca.jpg"></p>
                <p> 10:00 </p>
                <p><img src="../../images/flags/polonia.jpg">Polonia vs Argentina<img src="../../images/flags/argentina.jpg"></p>
                <p> 16:00 </p>
                <p><img src="../../images/flags/arabia.jpg">Arabia Saudita vs México<img src="../../images/flags/mexico.jpg"></p>
                <p> 16:00 </p>
                <button class="cerrar" href="#" onclick="toggle10()">Cerrar</button>
            </div>

            <div id="popup11">
                <h1>Partidos correspondientes al dia 1 de diciembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/croacia.jpg">Croacia vs Belgica<img src="../../images/flags/belgica.jpg"></p>
                <p> 7:00 </p>
                <p><img src="../../images/flags/canada.jpg">Canadá vs Marruecos<img src="../../images/flags/marruecos.jpg"> 10:00</p>
                <p> 10:00 </p>
                <p><img src="../../images/flags/japon.jpg">Japón vs España<img src="../../images/flags/españa.jpg"> 16:00</p>
                <p> 16:00 </p>
                <p><img src="../../images/flags/costa_rica.jpg">Costa Rica vs Alemania<img src="../../images/flags/alemania.jpg"> 16:00</p>
                <p> 16:00 </p>
                <button class="cerrar" href="#" onclick="toggle11()">Cerrar</button>
            </div>

            <div id="popup12">
                <h1>Partidos correspondientes al dia 2 de diciembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/korea.jpg">Corea del Sur vs Portugal<img src="../../images/flags/portugal.jpg"></p>
                <p> 7:00 </p>
                <p><img src="../../images/flags/uruguay.jpg">Uruguay vs Ghana<img src="../../images/flags/ghana.jpg"></p>
                <p> 10:00 </p>
                <p><img src="../../images/flags/camerun.jpg">Camerún vs Brasil<img src="../../images/flags/brasil.jpg"></p>
                <p> 16:00 </p>
                <p><img src="../../images/flags/serbia.jpg">Serbia vs Suiza<img src="../../images/flags/suiza.jpg"></p>
                <p> 16:00 </p>
                <button class="cerrar" href="#" onclick="toggle12()">Cerrar</button>
            </div>

            <div id="popup13">
                <h1>Partidos correspondientes al dia 3 de diciembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/definir.jpg">Octavos de final<img src="../../images/flags/definir.jpg"></p>
                <p> A definir - 12:00 </p>
                <p><img src="../../images/flags/definir.jpg">Octavos de final<img src="../../images/flags/definir.jpg"></p>
                <p> A definir - 16:00 </p><br><br><br><br><br>
                <button class="cerrar" href="#" onclick="toggle13()">Cerrar</button>
            </div>

            <div id="popup14">
                <h1>Partidos correspondientes al dia 4 de diciembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/definir.jpg">Octavos de final<img src="../../images/flags/definir.jpg"></p>
                <p> A definir - 12:00 </p>
                <p><img src="../../images/flags/definir.jpg">Octavos de final<img src="../../images/flags/definir.jpg"></p>
                <p> A definir - 16:00 </p><br><br><br><br><br>
                <button class="cerrar" href="#" onclick="toggle14()">Cerrar</button>
            </div>

            <div id="popup15">
                <h1>Partidos correspondientes al dia 5 de diciembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/definir.jpg">Octavos de final<img src="../../images/flags/definir.jpg"></p>
                <p> A definir - 12:00 </p>
                <p><img src="../../images/flags/definir.jpg">Octavos de final<img src="../../images/flags/definir.jpg"></p>
                <p> A definir - 16:00 </p><br><br><br><br><br>
                <button class="cerrar" href="#" onclick="toggle15()">Cerrar</button>
            </div>

            <div id="popup16">
                <h1>Partidos correspondientes al dia 6 de diciembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/definir.jpg">Octavos de final<img src="../../images/flags/definir.jpg"></p>
                <p> A definir - 12:00 </p>
                <p><img src="../../images/flags/definir.jpg">Octavos de final<img src="../../images/flags/definir.jpg"></p>
                <p> A definir - 16:00 </p><br><br><br><br><br>
                <button class="cerrar" href="#" onclick="toggle16()">Cerrar</button>
            </div>

            <div id="popup17">
                <h1>Partidos correspondientes al dia 9 de diciembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/definir.jpg">Cuartos de final<img src="../../images/flags/definir.jpg"></p>
                <p> A definir - 12:00 </p>
                <p><img src="../../images/flags/definir.jpg">Cuartos de final<img src="../../images/flags/definir.jpg"></p>
                <p> A definir - 16:00 </p><br><br><br><br><br>
                <button class="cerrar" href="#" onclick="toggle17()">Cerrar</button>
            </div>

            <div id="popup18">
                <h1>Partidos correspondientes al dia 10 de diciembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/definir.jpg">Cuartos de final<img src="../../images/flags/definir.jpg"></p>
                <p> A definir - 12:00 </p>
                <p><img src="../../images/flags/definir.jpg">Cuartos de final<img src="../../images/flags/definir.jpg"></p>
                <p> A definir - 16:00 </p><br><br><br><br><br>
                <button class="cerrar" href="#" onclick="toggle18()">Cerrar</button>
            </div>

            <div id="popup19">
                <h1>Partidos correspondientes al dia 13 de diciembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/definir.jpg">Semifinal<img src="../../images/flags/definir.jpg"></p>
                <p> A definir - 16:00 </p><br><br><br><br><br><br><br>
                <button class="cerrar" href="#" onclick="toggle19()">Cerrar</button>
            </div>

            <div id="popup20">
                <h1>Partidos correspondientes al dia 14 de diciembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/definir.jpg">Semifinal<img src="../../images/flags/definir.jpg"></p>
                <p> A definir - 16:00 </p><br><br><br><br><br><br><br>
                <button class="cerrar" href="#" onclick="toggle20()">Cerrar</button>
            </div>

            <div id="popup21">
                <h1>Partidos correspondientes al dia 17 de diciembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/definir.jpg">3° y 4° puesto<img src="../../images/flags/definir.jpg"></p>
                <p> A definir - 16:00 </p><br><br><br><br><br><br><br>
                <button class="cerrar" href="#" onclick="toggle21()">Cerrar</button>
            </div>

            <div id="popup22">
                <h1>Partidos correspondientes al dia 17 de diciembre del 2022</h1>
                <br>
                <p><img src="../../images/flags/definir.jpg">Final<img src="../images/flags/definir.jpg"></p>
                <p> A definir - 12:00 </p><br><br><br><br><br><br><br>
                <button class="cerrar" href="#" onclick="toggle22()">Cerrar</button>
            </div>
        </div>
        <script src="calendario.js"></script>
        <script src="../../js/index.js"></script>
    </body>
</html>