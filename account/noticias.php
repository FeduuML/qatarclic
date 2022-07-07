<?php
    require 'database.php';

    if(isset($_POST['news'])):
        if(empty($_POST['title']) || empty($_POST['content'])):
            echo 'Hay campos en blanco';
        else:
            $title = $conn->prepare("SELECT title FROM news WHERE title = :title");
            $title->bindParam(':title',$_POST['title']);
            $title->execute();
            if($title->fetchColumn() == $_POST['title']):
                echo 'Existe una noticia con el mismo titulo';
            else:
                $news = $conn->prepare("INSERT INTO news(title,content) VALUES (:title, :content)");
                $news->bindParam(':title',$_POST['title']);
                $news->bindParam(':content',$_POST['content']);
                $news->execute();
                    echo 'Noticia creada correctamente';
            endif;
        endif;
    endif;

    echo '<form action="" method="post">
    <input name="title" placeholder="Titulo de la noticia"><br>
    <textarea name="content" placeholder="Contenido de la noticia" rows="10" cols="40"></textarea><br>
    <input name="news" type="submit" value="Crear noticia">';

    if(isset($_GET['id'])):
        $news = $conn->prepare("SELECT title,content FROM news WHERE title = :title");
        $news->bindParam(':title',urldecode($_GET['id']));
        $news->execute();

        if($news1 = $news->fetch(PDO::FETCH_ASSOC)):
            echo '<h1>'.$news1['title'].'</h1>'.$news1['content'].'<br> <strong>Autor:</strong> '.' <strong>Fecha:</strong> ';
            if(isset($_POST['send'])):
                if(empty($_POST['comments'])):
                    echo 'No puedes dejar el comentario en blanco';
                else:
                    $comments = $conn->prepare("INSERT INTO comments(id,id_news,comments) VALUES ('', :id_news, '"."', :comments, '");
                    $comments->bindParam(':id_news', urldecode($_GET['id']));
                    $comments->bindParam(':comments', $_POST['comments']);
                    $comments->execute();
                    header('Location: /news.php?id='.urlencode($_GET['id']).'');
                    exit();
                endif;
            endif;

            echo '
                <form action="" method="post">
                    <textarea name="comments" placeholder="Comentario" rows="10" cols="40"></textarea><br>
                    <input name="send" type="submit" value="Publicar comentario">
                </form>';

            $comments = $conn->prepare("SELECT,comments FROM comments WHERE id_news = :id_news ORDER BY date DESC");
            $comments->bindParam(':id_news',urldecode($_GET['id']));
            $comments->execute();

            while($comments1 = $comments->fetch(PDO::FETCH_ASSOC)):
                echo '<strong>Comentario escrito por:</strong> '.' <strong>Fecha:</strong> '.$comments1['comments'].'<br><br>';
            endwhile;

            $comments = $conn->prepare("SELECT COUNT(*) comments FROM comments WHERE id_news = :id_news");
            $comments->bindParam(':id_news',urldecode($_GET['id']));
            $comments->execute();

            if($comments->fetchColumn() == 0):
                echo 'No hay comentarios';
            endif;
            else:
                echo 'La noticia no existe';
            endif;
        else:
            $desde = @$_GET['pag'] * 10;
            $hasta = (@$_GET['pag'] * 10) + 10;
            $news = $conn->prepare("SELECT id,title FROM news LIMIT $desde,$hasta");
            $news->execute();

        while($news1 = $news->fetch(PDO::FETCH_ASSOC)):
            echo '<h1><a href="/news.php?id='.urlencode($news1['title']).'">'.$news1['title'].'</a></h1>';
        endwhile;

        $count_news = $conn->query("SELECT COUNT(*) title FROM news")->fetch(PDO::FETCH_ASSOC);

        for($i = 0; $i < round($count_news['title'] / 10 + 1); $i++):
                    echo '<a href="/news.php?pag='.$i.'">'.$i.'</a>';
        endfor;
    endif;
?>