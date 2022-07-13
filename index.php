<?php
    session_start();
    require 'account/database.php';
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>Qatar Clic</title>
        <link href="styles/main.css" rel="stylesheet" type="text/css">
        <link href="styles/header.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two&family=Yanone+Kaffeesatz:wght@300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script> <!--Source de los iconos-->
    </head>
   

    <body>
       <header class="header" id="header">
            <div class="wrapper">
                <div class="logo"><?php require 'header/header.php';?></div>
                <nav>
                    <?php 
                    if(isset($_SESSION['user_id'])){
                        echo("<div id='navicon' onclick='navicon()' class='navicon_box'><i class='navicon fas fa-solid fa-user fa-2x'></i></div>");
                        echo("<div id='user_options' class='user_options'><h1>Cerrar sesion</h1></div>");
                    }
                    else{
                        echo("<a href='account/login.php'>Iniciar sesion</a>");
                    } ?>
                </nav>
            </div>
            <hr>
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

        <content>
            <aside>
                <h2 class="title">Seleccion</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam bibendum faucibus ex, in euismod nunc feugiat a. Nunc sapien sem, efficitur id velit nec, consectetur vestibulum est. Aliquam facilisis mi non risus suscipit, ac accumsan nulla tempor. Donec aliquet metus vel condimentum lacinia. Pellentesque ultricies risus id euismod porta. Morbi sollicitudin eget ligula id semper. Pellentesque interdum vitae elit in egestas.
                    Vivamus ac gravida felis. Nullam ultrices urna ac scelerisque aliquam. Vestibulum vehicula eget magna at iaculis. Morbi sagittis arcu ut tempus vulputate. Nunc a justo eu justo suscipit semper in at purus. Etiam non elementum ligula, a bibendum nisi. Nullam bibendum justo id ultrices placerat. Etiam luctus leo ac nunc imperdiet, sit amet pulvinar dolor aliquet. Ut consequat orci ac est condimentum tincidunt. In vel dolor varius, ultrices leo et, tincidunt mauris. Phasellus nec dui ut elit hendrerit malesuada vel eget felis. Curabitur ultrices enim ut justo hendrerit lobortis. Nam eu sem vel ex fermentum porta. Vivamus sit amet lorem sed ipsum rhoncus tristique. Pellentesque eu hendrerit nulla, id pharetra nunc.
                    Ut sit amet facilisis massa. Nam consequat quam sed odio mollis porta. In sed convallis felis, nec facilisis velit. Phasellus elementum rhoncus sem, in scelerisque ligula accumsan quis. Quisque mollis, tortor nec scelerisque imperdiet, elit orci ultrices urna, non efficitur nibh nisl non nulla. Praesent gravida erat velit, ut tincidunt dolor aliquet id. Duis auctor, metus at luctus auctor, lectus augue euismod purus, at porttitor nibh ipsum a magna. Cras tellus purus, tempor et vestibulum hendrerit, vehicula vitae sem.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sit amet bibendum dolor. Morbi ut ipsum a mauris ultricies finibus sit amet vel orci. Fusce laoreet interdum ante eget suscipit. Integer tempus rhoncus imperdiet. Phasellus quis turpis nec purus aliquet cursus. Cras et est luctus nibh bibendum tempor sit amet vitae velit.
                    Nulla blandit lectus eget bibendum vestibulum. Mauris erat mi, sagittis id venenatis vel, ullamcorper ornare erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras vitae urna commodo, pellentesque purus malesuada, imperdiet enim. Proin consectetur pellentesque leo ac facilisis. Maecenas malesuada vestibulum lacus, eget congue dui vulputate ut. Integer at mi quam. Sed ac erat et eros porttitor posuere. Suspendisse potenti. Cras enim lectus, fringilla at diam sed, auctor malesuada leo. Proin non cursus lorem, vitae molestie erat. Donec commodo risus eu elit pellentesque mattis. Fusce hendrerit dignissim eros eget eleifend. Integer quis ligula consequat, congue ex accumsan, malesuada quam.
                </p>
            </aside>

            <section class="news">
                <h2 class="title">Noticias</h2>
                <p> 
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac orci laoreet odio tincidunt iaculis. Donec sapien nisi, maximus vel tempor ac, rhoncus quis lorem. Aliquam vulputate nulla ut massa efficitur commodo. Mauris ac leo blandit leo luctus luctus in id leo. Curabitur laoreet consequat mauris, quis euismod mauris venenatis et. Etiam feugiat dui non arcu fringilla molestie. Donec gravida, dolor sit amet placerat mollis, lectus metus malesuada elit, nec ullamcorper velit erat vel nunc. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas elementum, augue ac porta imperdiet, felis est consequat odio, sit amet varius massa nisl nec nunc. Nunc vitae purus at nisi placerat gravida.
                    Donec quam libero, sagittis nec urna eget, dignissim laoreet dolor. Aliquam ullamcorper elit quis molestie volutpat. Nullam nisl urna, posuere egestas porttitor faucibus, congue vel magna. Ut nec ultrices augue. In nec augue quam. Ut eu augue nec sem laoreet fringilla et at nulla. Nullam rutrum pharetra libero. Praesent sed cursus metus. Cras sapien urna, tristique eu tincidunt eu, imperdiet sed leo. Nullam rutrum sem eu sodales vestibulum. Mauris sed mauris facilisis, imperdiet velit ut, eleifend est. Sed tempor scelerisque nulla, sit amet ultrices magna.
                    Suspendisse vel convallis nulla, eleifend pharetra dui. Fusce fermentum ante ut suscipit luctus. In hac habitasse platea dictumst. Praesent nec pretium lectus, sit amet lacinia est. Morbi in massa libero. Sed ut bibendum elit. Nulla eu augue ullamcorper, malesuada nibh sed, mattis risus. Donec feugiat hendrerit placerat. In tellus elit, rhoncus eu arcu at, imperdiet laoreet elit. Nulla euismod eros nisi, placerat ullamcorper est dignissim ac. Aenean lorem sem, interdum vel leo nec, vestibulum interdum nulla. Phasellus dictum arcu a nisi accumsan tempus.
                    Etiam elementum dapibus elit congue aliquam. Proin porttitor eros et justo suscipit vulputate. Duis pharetra nisl nec dolor malesuada, vel dignissim leo tempor. Integer non posuere massa. Proin eget vulputate lacus, nec scelerisque mauris. Pellentesque et lacus eget est gravida venenatis. Sed metus orci, dapibus a facilisis ac, vestibulum nec odio. Phasellus ultrices nulla non eros laoreet tristique.
                    Aliquam sit amet odio at sapien blandit malesuada nec vitae diam. Etiam et est vestibulum, pretium mauris at, viverra arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus congue auctor venenatis. Nunc finibus cursus tellus, id interdum enim tempus non. Fusce viverra turpis eget fermentum molestie. Etiam auctor urna at dapibus imperdiet. Suspendisse lacinia consectetur nulla et pulvinar. Morbi mattis luctus felis eu dignissim. Maecenas non erat vel dui laoreet vulputate. Donec malesuada urna sed mi pharetra aliquam vel vel massa. Nunc placerat euismod orci ac vestibulum. Aliquam ornare turpis at nisi ornare rhoncus. Nulla laoreet ante a mattis pretium. Vivamus condimentum diam sit amet eleifend gravida.
                    Quisque enim metus, rhoncus vel ligula vel, porta imperdiet mi. Sed magna magna, feugiat ut neque sed, fermentum accumsan augue. Etiam condimentum diam at justo congue, ut tincidunt tellus semper. Aliquam sed ipsum ac lectus congue ornare at sed mauris. Vestibulum tempus elit non ex commodo, quis lobortis dui interdum. Praesent id mauris feugiat, porta leo non, ultricies magna. Mauris vel leo tempor, scelerisque libero id, blandit metus. Ut feugiat ex ut augue luctus, at pharetra eros porta. Aliquam ligula dui, pulvinar eu diam sit amet, rutrum fringilla justo. Donec ac sem ante.
                    Duis in malesuada tellus. Maecenas interdum augue eu nisl ultrices cursus. Proin eget imperdiet nisi, porta mollis neque. Duis vel iaculis nisl. Nulla ac turpis ante. Donec egestas finibus quam. Nam et lacinia sapien, eget imperdiet justo. Sed volutpat dolor sed metus accumsan molestie. Suspendisse interdum fringilla libero. Vivamus iaculis, nibh id commodo viverra, quam libero interdum augue, id dapibus orci massa auctor felis. Maecenas porta ac augue consectetur condimentum. Sed porttitor fringilla rhoncus. Praesent laoreet justo lorem, ut feugiat mi ultricies nec.
                    Curabitur suscipit vel nisi non convallis. Vestibulum eget tortor a risus ultrices interdum. Pellentesque id ultricies elit, et porttitor ipsum. Pellentesque aliquam laoreet justo, eget finibus lorem luctus in. Vestibulum suscipit nulla et turpis consequat condimentum. Morbi egestas tempor viverra. Nunc facilisis ante ante, in auctor dui tempus sed. Proin placerat, dui vitae aliquet consequat, nisi est maximus lacus, at aliquet arcu neque sit amet odio. Sed at erat dolor. Praesent non blandit nulla, at ullamcorper nisi. Nullam vitae pellentesque libero. Fusce facilisis diam risus, a lacinia sem rhoncus ut.
                    Fusce eget est et ante ultricies blandit non eu risus. Maecenas pellentesque at dui sit amet malesuada. Vivamus cursus aliquet tempus. Fusce dignissim aliquam commodo. Ut mollis urna congue augue dictum, sit amet pellentesque ligula convallis. Suspendisse sed auctor nibh. Nulla felis nunc, rhoncus eget viverra vel, pellentesque ut nisi. Proin at tincidunt felis. Curabitur pellentesque facilisis magna, volutpat congue metus sollicitudin et. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec ac metus ut ex ultricies tincidunt non eget erat. Sed efficitur congue hendrerit. Suspendisse vel sollicitudin ex.
                    Donec cursus molestie tortor, gravida posuere neque efficitur at. Nulla eu sapien eget nunc eleifend condimentum vitae sit amet mauris. Donec vestibulum, ante posuere accumsan egestas, nunc diam efficitur sapien, sed bibendum elit magna sit amet odio. Vivamus enim augue, consequat vel eros a, volutpat ultricies tortor. Maecenas varius turpis a augue aliquam ultrices. In est turpis, aliquet quis mattis id, blandit non purus. Mauris id sapien vitae nisi dignissim consectetur. Cras congue ipsum sit amet ullamcorper fermentum. Interdum et malesuada fames ac ante ipsum primis in faucibus.
                    Ut congue mauris tellus, a lacinia felis porttitor non. Integer imperdiet malesuada mattis. Curabitur dictum est id mi efficitur auctor. Suspendisse viverra nec libero sed vehicula. Donec fringilla dictum nisi a porta. Integer scelerisque tincidunt nibh sed pretium. Sed id ante magna. Ut ultrices felis sed ipsum porta consectetur. Nulla eget nisl non velit vestibulum euismod. Nunc volutpat finibus ligula efficitur pulvinar. Vivamus commodo mi magna, fermentum lobortis sem tempus eu. Donec hendrerit, lorem sit amet eleifend dictum, erat justo vestibulum justo, et bibendum arcu est at sem. Aenean mauris nibh, dictum id malesuada eget, laoreet non magna. Donec ut elit vel leo dignissim sollicitudin at et libero.
                    Vestibulum ullamcorper ipsum non aliquam sollicitudin. Quisque semper molestie diam, id fringilla leo gravida in. Sed mollis porttitor vehicula. Vestibulum finibus at mauris id interdum. Ut dignissim dolor non nibh rhoncus lobortis. Suspendisse lacinia velit bibendum tempus tempus. Cras tincidunt quis ante nec aliquet.
                    Cras non diam sed ligula vulputate lobortis id quis felis. Morbi ac sollicitudin dolor. Nullam mattis, magna non vehicula tincidunt, justo lorem sollicitudin lorem, ac volutpat elit nulla a tortor. Curabitur bibendum ligula vel magna accumsan, sit amet rutrum purus imperdiet. Duis fringilla, lacus sed ullamcorper ultrices, metus justo maximus turpis, dictum ornare ex mauris vitae turpis. Fusce at efficitur nulla, id consectetur dui. Quisque posuere sem vitae mi tincidunt, a aliquet ex iaculis. Donec vitae ligula nec purus venenatis aliquet eu a diam. Mauris maximus accumsan felis, a molestie metus aliquam ac. Sed elementum accumsan lorem sed condimentum. Integer in mi placerat, tincidunt augue sed, vehicula nibh. Vivamus consequat lorem vel luctus consequat. Etiam elementum mauris felis, a ultricies ligula vestibulum ut. Fusce in laoreet eros, et ultricies tortor. Cras aliquam eros tortor, porttitor ornare risus pellentesque ut.
                    Nam sit amet orci pulvinar tortor dictum sollicitudin a quis nisi. Vestibulum vitae imperdiet sem. Donec accumsan, magna vel molestie laoreet, risus orci sodales nulla, id varius lectus ligula vel erat. Donec dignissim quam a dapibus placerat. Curabitur at eros at tellus vestibulum congue. In efficitur consequat tellus, vitae sagittis ligula rutrum a. Suspendisse scelerisque a massa quis malesuada. Phasellus dapibus elit urna, efficitur consequat nibh tempus sed. Aliquam lacus tellus, aliquam vel lobortis vel, bibendum a est. Vestibulum mollis libero neque. Donec non orci congue, bibendum nunc in, malesuada velit. Morbi condimentum risus nec leo luctus, ac mattis urna aliquam. Pellentesque suscipit odio pulvinar metus scelerisque, eu consequat odio viverra. Donec sit amet metus ligula. Quisque et ipsum sit amet odio luctus convallis. Suspendisse viverra, ex non feugiat fringilla, est urna pellentesque ante, in rhoncus ante ipsum vel mi.
                    Integer maximus, justo id ultricies efficitur, nibh nulla scelerisque turpis, sit amet convallis nulla justo consequat erat. Donec tincidunt rutrum semper. Maecenas metus elit, eleifend et tincidunt sed, fringilla in tortor. Sed convallis tortor justo, in laoreet lacus vulputate eget. Integer et dictum massa. Curabitur id tellus vestibulum, mattis nulla eget, ultricies ex. Aenean at convallis nunc, vel tincidunt metus. Etiam dui tellus, tempor a sagittis vitae, tempor non eros. Vivamus ac urna molestie, laoreet nulla non, sollicitudin dolor.
                    Sed auctor, tellus id placerat tempor, justo erat sagittis ex, eu elementum libero nulla vitae orci. Pellentesque a varius lorem, at pretium justo. Nulla condimentum, velit id ullamcorper molestie, magna justo dignissim tellus, sit amet vestibulum diam nisl ac lacus. Ut luctus eros vel tellus tempor, in mattis urna malesuada. Donec mauris dui, ultrices id massa nec, porttitor elementum justo. Integer nec mi sodales, efficitur massa mattis, ornare massa. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque feugiat et nulla in dapibus. Morbi ullamcorper ligula sit amet leo elementum, vitae porttitor augue lobortis. Donec quis tortor elementum, pellentesque quam eget, fringilla lacus. Nullam in lacus eget orci laoreet interdum. Donec pellentesque volutpat tellus sit amet luctus. Donec justo nisi, rutrum ac tempor vitae, tempor eget nulla. Vestibulum ut neque posuere nisi iaculis suscipit dignissim id sapien. Sed tincidunt ac nulla eget interdum.
                    Praesent suscipit eros eu laoreet faucibus. Sed laoreet, erat non malesuada dictum, turpis ligula accumsan sem, eu interdum est arcu non urna. Curabitur mattis tortor id blandit tincidunt. Nam condimentum vulputate sem eget mollis. Cras sed quam nec urna placerat placerat. Sed nec nisl eu orci accumsan sollicitudin at sed nisl. Maecenas augue tellus, hendrerit non porttitor eu, maximus ut justo. Quisque pellentesque tristique nisl, eu porta ligula gravida a. Mauris in maximus urna. Nam vitae sodales odio, ultrices porta libero.
                </p>
            </section>
        </content>
        <script src="js/scroll.js"></script>
        <script src="js/index.js"></script>
    </body>
</html>