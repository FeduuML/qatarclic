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

                    <li type="button" id="n1" onclick="toggle()" class="first-day-november">1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li>10</li>
                    <li>11</li><li>12</li><li>13</li><li>14</li><li>15</li><li>16</li><li>17</li><li>18</li><li>19</li><li>20</li>
                    <li>21</li><li>22</li><li>23</li><li>24</li><li>25</li><li>26</li><li>27</li><li>28</li><li>29</li><li>30</li>
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

        <div class="partidos">
            <h1>Partidos del dia</h1>
        </div>

        <div id="popup">
            <h1>Partidos correspondientes al dia 1 de noviembre del 2022</h1>
            <br>
            <p>Argentina VS Alemania 15:30</p>
            <button class="cerrar" href="#" onclick="toggle()">Cerrar</button>
        </div>
    </body>
</html>

<script>
    function toggle() {
    var blur=document.getElementById('blur');
    blur.classList.toggle('active');
    var popup = document.getElementById('popup');
    popup.classList.toggle('active');
}
</script>