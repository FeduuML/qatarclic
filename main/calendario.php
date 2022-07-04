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
                    <li type="button" onclick="toggle1()">21</li><li type="button" onclick="toggle2()">22</li><li type="button" onclick="toggle3()">23</li><li type="button" onclick="toggle4()">24</li><li type="button" onclick="toggle5()">25</li><li>26</li><li>27</li><li>28</li><li>29</li><li>30</li>
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

                    <li class="first-day-december">1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li>10</li>
                    <li>11</li><li>12</li><li>13</li><li>14</li><li>15</li><li>16</li><li>17</li><li>18</li><li>19</li><li>20</li>
                    <li>21</li><li>22</li><li>23</li><li>24</li><li>25</li><li>26</li><li>27</li><li>28</li><li>29</li><li>30</li><li>31</li>
                </ol>
            </div>
        </div>   

        <div id="popup1">
            <h1>Partidos correspondientes al dia 21 de noviembre del 2022</h1>
            <br>
            <p>Senegal vs Paises Bajos 7:00</p>
            <p>Inglaterra vs Irán 15:30</p>
            <p>Catar vs Ecuador 13:00</p>
            <p>Estados Unidos vs Gales 16:00</p>
            <button class="cerrar" href="#" onclick="toggle1()">Cerrar</button>
        </div>

        <div id="popup2">
            <h1>Partidos correspondientes al dia 22 de noviembre del 2022</h1>
            <br>
            <p>Argentina vs Arabia Saudita 7:00</p>
            <p>Dinamarca vs Tunez 10:00</p>
            <p>Mexico vs Polonia 13:00</p>
            <p>Francia vs Australia 16:00</p>
            <button class="cerrar" href="#" onclick="toggle2()">Cerrar</button>
        </div>

        <div id="popup3">
            <h1>Partidos correspondientes al dia 23 de noviembre del 2022</h1>
            <br>
            <p>Marruecos vs Croacia 7:00</p>
            <p>Alemania vs Japon 10:00</p>
            <p>España vs Costa Rica 13:00</p>
            <p>Belgica vs Canada 16:00</p>
            <button class="cerrar" href="#" onclick="toggle3()">Cerrar</button>
        </div>

        <div id="popup4">
            <h1>Partidos correspondientes al dia 24 de noviembre del 2022</h1>
            <br>
            <p>Suiza vs Camerun 7:00</p>
            <p>Uruguay vs Corea del Sur 10:00</p>
            <p>Portugal  vs Ghana 13:00</p>
            <p>Brasil vs Serbia 16:00</p>
            <button class="cerrar" href="#" onclick="toggle4()">Cerrar</button>
        </div>

        <div id="popup5">
            <h1>Partidos correspondientes al dia 25 de noviembre del 2022</h1>
            <br>
            <p>Gales vs Iran 7:00</p>
            <p>Catar vs Senegal 10:00</p>
            <p>Paises Bajos vs Ecuador 13:00</p>
            <p>Inglaterra vs Estados Unidos 16:00</p>
            <button class="cerrar" href="#" onclick="toggle5()">Cerrar</button>
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
</script>