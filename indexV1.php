<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color:#ff0000;
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <h1>Formulário com PHP</h1>

        <p class="error">* campo obrigatório</p>

        Nome: <input required type="text" name="nome"> <span class="error">*</span> <br><br>
        E-mail: <input required type="email" name="email"> <span class="error">*</span> <br><br>
        Website: <input type="url" name="website"><br><br>
        Comentário:<br>
        <textarea name="comentario" cols="36" rows="5"></textarea><br><br>
        Gênero: 
        <input type="radio" name="genero" value="masculino">masculino 
        <input type="radio" name="genero" value="feminino">feminino 
        <input type="radio" name="genero" value="outro">outro 
        <br><br>
        <button name="enviado" type="submit">Enviar</button>
        <br><br>
        <h1>Dados enviados:</h1>
        <?php
            if(isset($_POST['enviado'])) {

                $genero = "Não selecionado";

                if(isset($_POST['genero'])) {
                    $genero = $_POST['genero'];
                }

                echo "<p><b>Nome: </b>" . $_POST['nome'] . "</p>";
                echo "<p><b>E-mail: </b>" . $_POST['email'] . "</p>";
                echo "<p><b>Website: </b>" . $_POST['website'] . "</p>";
                echo "<p><b>Comentário: </b>" . $_POST['comentario'] . "</p>";
                echo "<p><b>Gênero: </b>" . $genero . "</p>";
            }
        ?>
    </form>
</body>
</html>