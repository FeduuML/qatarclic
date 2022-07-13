<?php
    session_start();
?>

<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="calendario.css" />
    </head>

    <body>
        <div class="container" id="blur">
            <div class="meses" id="mes-noviembre">
                <h1>Noviembre 2022</h1>
                <ol>
                    <li class="day-name">Lun</li>
                    <li class="day-name">Mar</li>
                    <li class="day-name">Mie</li>
                    <li class="day-name">Jue</li>
                    <li class="day-name">Vie</li>
                    <li class="day-name">Sab</li>
                    <li class="day-name">Dom</li>

                    <li class="first-day-november">1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li>10</li>
                    <li>11</li><li>12</li><li>13</li><li>14</li><li>15</li><li>16</li><li>17</li><li>18</li><li>19</li><li>20</li>
                    <li type="button" onclick="toggle1()">21</li><li type="button" onclick="toggle2()">22</li><li type="button" onclick="toggle3()">23</li><li type="button" onclick="toggle4()">24</li><li type="button" onclick="toggle5()">25</li><li type="button" onclick="toggle6()">26</li><li type="button" onclick="toggle7()">27</li>
                    <li type="button" onclick="toggle8()">28</li><li type="button" onclick="toggle9()">29</li><li type="button" onclick="toggle10()">30</li>
                </ol>
            </div>

            <div class="meses" id="mes-diciembre">
                <h1>Diciembre 2022</h1>
                <ol>
                    <li class="day-name">Lun</li>
                    <li class="day-name">Mar</li>
                    <li class="day-name">Mie</li>
                    <li class="day-name">Jue</li>
                    <li class="day-name">Vie</li>
                    <li class="day-name">Sab</li>
                    <li class="day-name">Dom</li>

                    <li class="first-day-december" type="button" onclick="toggle11()">1</li><li type="button" onclick="toggle12()">2</li><li type="button" onclick="toggle13()">3</li>
                    <li type="button" onclick="toggle14()">4</li><li type="button" onclick="toggle15()">5</li><li type="button" onclick="toggle16()">6</li><li>7</li><li>8</li>
                    <li type="button" onclick="toggle17()">9</li><li type="button" onclick="toggle18()">10</li><li>11</li><li>12</li><li type="button" onclick="toggle19()">13</li><li type="button" onclick="toggle20()">14</li>
                    <li>15</li><li>16</li><li type="button" onclick="toggle21()">17</li><li type="button" onclick="toggle22()">18</li><li>19</li><li>20</li><li>21</li><li>22</li><li>23</li><li>24</li><li>25</li><li>26</li><li>27</li><li>28</li><li>29</li><li>30</li><li>31</li>
                </ol>
            </div>
        </div>   

        <div id="popup1">
            <h1>Partidos correspondientes al dia 21 de noviembre del 2022</h1>
            <br>
            <p><img src="../images/flags/senegal.jpg">Senegal vs Paises Bajos<img src="../images/flags/holanda.jpg"></p>
            <p><center> 7:00 </center></p>
            <p><img src="../images/flags/inglaterra.jpg">Inglaterra vs Irán <img src="../images/flags/iran.jpg"></p>
            <p><center> 15:30 </center></p>
            <p><img src="../images/flags/qatar.jpg">Catar vs Ecuador <img src="../images/flags/ecuador.jpg"></p>
            <p><center> 13:00 </center></p>
            <p><img src="../images/flags/eeuu.jpg">Estados Unidos vs Gales <img src="../images/flags/gales.jpg"></p>
            <p><center> 16:00 </center></p>
            <button class="cerrar" href="#" onclick="toggle1()">Cerrar</button>
        </div>

        <div id="popup2">
            <h1>Partidos correspondientes al dia 22 de noviembre del 2022</h1>
            <br>
            <p><img src="../images/flags/argentina.jpg">Argentina vs Arabia Saudita<img src="../images/flags/arabia.jpg"></p>
            <p><center> 7:00 </center></p>
            <p><img src="../images/flags/dinamarca.jpg">Dinamarca vs Tunez <img src="../images/flags/tunez.jpg"></p>
            <p><center> 10:00 </center></p>
            <p><img src="../images/flags/mexico.jpg">Mexico vs Polonia <img src="../images/flags/polonia.jpg"></p>
            <p><center> 13:00 </center></p>
            <p><img src="../images/flags/francia.jpg">Francia vs Australia <img src="../images/flags/australia.jpg"></p>
            <p><center> 16:00 </center></p>
            <button class="cerrar" href="#" onclick="toggle2()">Cerrar</button>
        </div>

        <div id="popup3">
            <h1>Partidos correspondientes al dia 23 de noviembre del 2022</h1>
            <br>
            <p><img src="../images/flags/marruecos.jpg">Marruecos vs Croacia <img src="../images/flags/croacia.jpg"></p>
            <p><center> 7:00 </center></p>
            <p><img src="../images/flags/alemania.jpg">Alemania vs Japon <img src="../images/flags/japon.jpg"></p>
            <p><center> 10:00 </center></p>
            <p><img src="../images/flags/españa.jpg">España vs Costa Rica <img src="../images/flags/costa_rica.jpg"></p>
            <p><center> 13:00 </center></p>
            <p><img src="../images/flags/belgica.jpg">Belgica vs Canada <img src="../images/flags/canada.jpg"></p>
            <p><center> 16:00 </center></p>
            <button class="cerrar" href="#" onclick="toggle3()">Cerrar</button>
        </div>

        <div id="popup4">
            <h1>Partidos correspondientes al dia 24 de noviembre del 2022</h1>
            <br>
            <p><img src="../images/flags/suiza.jpg">Suiza vs Camerun <img src="../images/flags/camerun.jpg"></p>
            <p><center> 7:00 </center></p>
            <p><img src="../images/flags/uruguay.jpg">Uruguay vs Corea del Sur <img src="../images/flags/korea.jpg"></p>
            <p><center> 10:00 </center></p>
            <p><img src="../images/flags/portugal.jpg">Portugal  vs Ghana <img src="../images/flags/ghana.jpg"></p>
            <p><center> 13:00 </center></p>
            <p><img src="../images/flags/brasil.jpg">Brasil vs Serbia <img src="../images/flags/serbia.jpg"></p>
            <p><center> 16:00 </center></p>
            <button class="cerrar" href="#" onclick="toggle4()">Cerrar</button>
        </div>

        <div id="popup5">
            <h1>Partidos correspondientes al dia 25 de noviembre del 2022</h1>
            <br>
            <p><img src="../images/flags/gales.jpg">Gales vs Iran <img src="../images/flags/iran.jpg"></p>
            <p><center> 7:00 </center></p>
            <p><img src="../images/flags/qatar.jpg">Catar vs Senegal <img src="../images/flags/senegal.jpg"></p>
            <p><center> 10:00 </center></p>
            <p><img src="../images/flags/holanda.jpg">Paises Bajos vs Ecuador <img src="../images/flags/ecuador.jpg"></p>
            <p><center> 13:00 </center></p>
            <p><img src="../images/flags/inglaterra.jpg">Inglaterra vs Estados Unidos <img src="../images/flags/eeuu.jpg"></p>
            <p><center> 16:00 </center></p>
            <button class="cerrar" href="#" onclick="toggle5()">Cerrar</button>
        </div>

        <div id="popup6">
            <h1>Partidos correspondientes al dia 26 de noviembre del 2022</h1>
            <br>
            <p><img src="../images/flags/tunez.jpg">Tunez vs Australia <p><img src="../images/flags/australia.jpg"></p>
            <p><center> 7:00 </center></p>
            <p><img src="../images/flags/polonia.jpg">Polonia vs Arabia Saudita <p><img src="../images/flags/arabia.jpg"></p>
            <p><center> 10:00 </center></p>
            <p><img src="../images/flags/francia.jpg">Francia vs Dinamarca <p><img src="../images/flags/dinamarca.jpg"></p>
            <p><center> 13:00 </center></p>
            <p><img src="../images/flags/argentina.jpg">Argentina vs Mexico <p><img src="../images/flags/mexico.jpg"></p>
            <p><center> 16:00 </center></p>
            <button class="cerrar" href="#" onclick="toggle6()">Cerrar</button>
        </div>

        <div id="popup7">
            <h1>Partidos correspondientes al dia 27 de noviembre del 2022</h1>
            <br>
            <p><img src="../images/flags/japon.jpg">Japon vs Costa Rica <img src="../images/flags/costa_rica.jpg"></p>
            <p><center> 7:00 </center></p>
            <p><img src="../images/flags/belgica.jpg">Belgica vs Marruecos <img src="../images/flags/marruecos.jpg"></p>
            <p><center> 10:00 </center></p>
            <p><img src="../images/flags/croacia.jpg">Croacia vs Canada <img src="../images/flags/canada.jpg"></p>
            <p><center> 13:00 </center></p>
            <p><img src="../images/flags/españa.jpg">España vs Alemania <img src="../images/flags/alemania.jpg"></p>
            <p><center> 16:00 </center></p>
            <button class="cerrar" href="#" onclick="toggle7()">Cerrar</button>
        </div>

        <div id="popup8">
            <h1>Partidos correspondientes al dia 28 de noviembre del 2022</h1>
            <br>
            <p><img src="../images/flags/camerun.jpg">Camerún vs Serbia <img src="../images/flags/serbia.jpg"></p>
            <p><center> 7:00 </center></p>
            <p><img src="../images/flags/korea.jpg">Corea del Sur vs Ghana <img src="../images/flags/ghana.jpg"></p>
            <p><center> 10:00 </center></p>
            <p><img src="../images/flags/brasil.jpg">Brasil vs Suiza <img src="../images/flags/suiza.jpg"></p>
            <p><center> 13:00 </center></p>
            <p><img src="../images/flags/portugal.jpg">Portugal vs Uruguay <img src="../images/flags/uruguay.jpg"></p>
            <p><center> 16:00 </center></p>
            <button class="cerrar" href="#" onclick="toggle8()">Cerrar</button>
        </div>

        <div id="popup9">
            <h1>Partidos correspondientes al dia 29 de noviembre del 2022</h1>
            <br>
            <p><p><img src="../images/flags/holanda.jpg">Paises Bajos vs Qatar <p><img src="../images/flags/qatar.jpg">7:00</p>
            <p><center> 7:00 </center></p>
            <p><p><img src="../images/flags/ecuador.jpg">Ecuador vs Senegal <p><img src="../images/flags/senegal.jpg">10:00</p>
            <p><center> 10:00 </center></p>
            <p><p><img src="../images/flags/gales.jpg">Gales vs Inglaterra <p><img src="../images/flags/inglaterra.jpg">13:00</p>
            <p><center> 13:00 </center></p>
            <p><p><img src="../images/flags/iran.jpg">Irán vs Estados Unidos <p><img src="../images/flags/eeuu.jpg">16:00</p>
            <p><center> 16:00 </center></p>
            <button class="cerrar" href="#" onclick="toggle9()">Cerrar</button>
        </div>

        <div id="popup10">
            <h1>Partidos correspondientes al dia 30 de noviembre del 2022</h1>
            <br>
            <p>Túnez vs Francia 7:00</p>
            <p>Australia vs Dinamarca 10:00</p>
            <p>Polonia vs Argentina 16:00</p>
            <p>Arabia Saudita vs México 16:00</p>
            <button class="cerrar" href="#" onclick="toggle10()">Cerrar</button>
        </div>

        <div id="popup11">
            <h1>Partidos correspondientes al dia 1 de diciembre del 2022</h1>
            <br>
            <p>Croacia vs Belgica 7:00</p>
            <p>Canadá vs Marruecos 10:00</p>
            <p>Japón vs España 16:00</p>
            <p>Costa Rica vs Alemania 16:00</p>
            <button class="cerrar" href="#" onclick="toggle11()">Cerrar</button>
        </div>

        <div id="popup12">
            <h1>Partidos correspondientes al dia 2 de diciembre del 2022</h1>
            <br>
            <p>Corea del Sur vs Portugal 7:00</p>
            <p>Ghana vs Ghana 10:00</p>
            <p>Camerún vs Brasil 16:00</p>
            <p>Serbia vs Suiza 16:00</p>
            <button class="cerrar" href="#" onclick="toggle12()">Cerrar</button>
        </div>

        <div id="popup13">
            <h1>Partidos correspondientes al dia 3 de diciembre del 2022</h1>
            <br>
            <p>Octavos de final - A definir 12:00</p>
            <p>Octavos de final - A definir 16:00</p>
            <button class="cerrar" href="#" onclick="toggle13()">Cerrar</button>
        </div>

        <div id="popup14">
            <h1>Partidos correspondientes al dia 4 de diciembre del 2022</h1>
            <br>
            <p>Octavos de final - A definir 12:00</p>
            <p>Octavos de final - A definir 16:00</p>
            <button class="cerrar" href="#" onclick="toggle14()">Cerrar</button>
        </div>

        <div id="popup15">
            <h1>Partidos correspondientes al dia 5 de diciembre del 2022</h1>
            <br>
            <p>Octavos de final - A definir 12:00</p>
            <p>Octavos de final - A definir 16:00</p>
            <button class="cerrar" href="#" onclick="toggle15()">Cerrar</button>
        </div>

        <div id="popup16">
            <h1>Partidos correspondientes al dia 6 de diciembre del 2022</h1>
            <br>
            <p>Octavos de final - A definir 12:00</p>
            <p>Octavos de final - A definir 16:00</p>
            <button class="cerrar" href="#" onclick="toggle16()">Cerrar</button>
        </div>

        <div id="popup17">
            <h1>Partidos correspondientes al dia 9 de diciembre del 2022</h1>
            <br>
            <p>Cuartos de final - A definir 12:00</p>
            <p>Cuartos de final - A definir 16:00</p>
            <button class="cerrar" href="#" onclick="toggle17()">Cerrar</button>
        </div>

        <div id="popup18">
            <h1>Partidos correspondientes al dia 10 de diciembre del 2022</h1>
            <br>
            <p>Cuartos de final - A definir 12:00</p>
            <p>Cuartos de final - A definir 16:00</p>
            <button class="cerrar" href="#" onclick="toggle18()">Cerrar</button>
        </div>

        <div id="popup19">
            <h1>Partidos correspondientes al dia 13 de diciembre del 2022</h1>
            <br>
            <p>Semifinal - A definir 16:00</p>
            <button class="cerrar" href="#" onclick="toggle19()">Cerrar</button>
        </div>

        <div id="popup20">
            <h1>Partidos correspondientes al dia 14 de diciembre del 2022</h1>
            <br>
            <p>Semifinal - A definir 16:00</p>
            <button class="cerrar" href="#" onclick="toggle20()">Cerrar</button>
        </div>

        <div id="popup21">
            <h1>Partidos correspondientes al dia 17 de diciembre del 2022</h1>
            <br>
            <p>3º y 4º puesto - A definir 12:00</p>
            <button class="cerrar" href="#" onclick="toggle21()">Cerrar</button>
        </div>

        <div id="popup22">
            <h1>Partidos correspondientes al dia 17 de diciembre del 2022</h1>
            <br>
            <p>FINAL - A definir 12:00</p>
            <button class="cerrar" href="#" onclick="toggle22()">Cerrar</button>
        </div>

        
    </body>
</html>

<script>
    function toggle1() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup1 = document.getElementById('popup1');
        popup1.classList.toggle('active');
    }

    function toggle2() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup2 = document.getElementById('popup2');
        popup2.classList.toggle('active');
    }

    function toggle3() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup3 = document.getElementById('popup3');
        popup3.classList.toggle('active');
    }

    function toggle4() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup4 = document.getElementById('popup4');
        popup4.classList.toggle('active');
    }

    function toggle5() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup5 = document.getElementById('popup5');
        popup5.classList.toggle('active');
    }

    function toggle6() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup6 = document.getElementById('popup6');
        popup6.classList.toggle('active');
    }

    function toggle7() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup7 = document.getElementById('popup7');
        popup7.classList.toggle('active');
    }

    function toggle8() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup8 = document.getElementById('popup8');
        popup8.classList.toggle('active');
    }

    function toggle9() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup9 = document.getElementById('popup9');
        popup9.classList.toggle('active');
    }

    function toggle10() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup10 = document.getElementById('popup10');
        popup10.classList.toggle('active');
    }

    function toggle11() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup11 = document.getElementById('popup11');
        popup11.classList.toggle('active');
    }

    function toggle12() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup12 = document.getElementById('popup12');
        popup12.classList.toggle('active');
    }
    function toggle13() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup13 = document.getElementById('popup13');
        popup13.classList.toggle('active');
    }

    function toggle14() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup14 = document.getElementById('popup14');
        popup14.classList.toggle('active');
    }
    function toggle15() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup15 = document.getElementById('popup15');
        popup15.classList.toggle('active');
    }

    function toggle16() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup16 = document.getElementById('popup16');
        popup16.classList.toggle('active');
    }

    function toggle17() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup17 = document.getElementById('popup17');
        popup17.classList.toggle('active');
    }

    function toggle18() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup18 = document.getElementById('popup18');
        popup18.classList.toggle('active');
    }

    function toggle19() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup19 = document.getElementById('popup19');
        popup19.classList.toggle('active');
    }

    function toggle20() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup20 = document.getElementById('popup20');
        popup20.classList.toggle('active');
    }

    function toggle21() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup21 = document.getElementById('popup21');
        popup21.classList.toggle('active');
    }

    function toggle22() {
        var blur=document.getElementById('blur');
        blur.classList.toggle('active');
        var popup22 = document.getElementById('popup22');
        popup22.classList.toggle('active');
    }
</script>