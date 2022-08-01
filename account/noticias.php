<?php
    require 'database.php';

    if(isset($_POST['news'])):

        if(empty($_POST['title']) || empty($_POST['content']) || empty($_POST['image'])):
            echo 'Hay campos en blanco';
        else:
            $title = $conn->prepare("SELECT title FROM news WHERE title = :title");
            $title->bindParam(':title',$_POST['title']);
            $title->execute();
            if($title->fetchColumn() == $_POST['title']):
                echo 'Existe una noticia con el mismo titulo';
            else:
                $news = $conn->prepare("INSERT INTO news(title,content,image) VALUES (:title, :content, :image)");
                $news->bindParam(':title',$_POST['title']);
                $news->bindParam(':content',$_POST['content']);
                $news->bindParam(':image',$_POST['image']);
                $news->execute();
                    echo 'Noticia creada correctamente';
            endif;
        endif;
    endif;

  
    echo '<form action="" method="post">
    <input name="title" placeholder="Titulo de la noticia"><br>
    <textarea name="content" placeholder="Contenido de la noticia" rows="10" cols="40"></textarea><br>
    <input name="news" type="submit" value="Crear noticia">
    <form enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]?>
    <input name="image" type="file">
    <img src=' echo ['image']' 
    </form>';

    if(isset($_GET['id'])):
        $news = $conn->prepare("SELECT title,content, image FROM news WHERE title = :title");
        $news->bindParam(':title',urldecode($_GET['id']));
        $news->execute();

        if($news1 = $news->fetch(PDO::FETCH_ASSOC)):
            echo '<h1>'.$news1['title'].'</h1>'.$news1['content'].'<h1>'.$news1['image'].'<br> <strong>Autor:</strong> '.' <strong>Fecha:</strong> ';
        endif;

            $desde = @$_GET['pag'] * 10;
            $hasta = (@$_GET['pag'] * 10) + 10;
            $news = $conn->prepare("SELECT id,title FROM news LIMIT $desde,$hasta");
            $news->execute();

        while($news1 = $news->fetch(PDO::FETCH_ASSOC)):
            echo '<h1><a href="../account/noticias.php?id='.urlencode($news1['title']).'">'.$news1['title'].'</a></h1>';
        endwhile;

        $count_news = $conn->query("SELECT COUNT(*) title FROM news")->fetch(PDO::FETCH_ASSOC);

        for($i = 0; $i < round($count_news['title'] / 10 + 1); $i++):
                    echo '<a href="../account/noticias.php?pag='.$i.'">'.$i.'</a>';
        endfor;
    endif;
?>