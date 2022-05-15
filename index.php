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

        Nome: <input type="text" name="nome"> <span class="error">*</span> <br><br>
        E-mail: <input type="text" name="email"> <span class="error">*</span> <br><br>
        Website: <input type="text" name="website"><br><br>
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

                if(empty($_POST['nome']) || strlen($_POST['nome']) < 3 || strlen($_POST['nome']) > 100){
                    echo '<p class="error">Preencha corretamente o campo nome</p>';
                    die();
                }

                if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                    echo '<p class="error">Preencha corretamente o campo e-mail</p>';
                    die();
                }

                if(!empty($_POST['website']) && !filter_var($_POST['website'], FILTER_VALIDATE_URL)){
                    echo '<p class="error">Preencha corretamente o campo website</p>';
                    die();
                }

                $genero = "Não selecionado";
                if(isset($_POST['genero'])) {
                    $genero = $_POST['genero'];
                    if($genero != "masculino" && $genero != "feminino" && $genero != "outro") {
                        echo '<p class="error">Preencha corretamente o campo de gênero</p>';
                        die();
                    }
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