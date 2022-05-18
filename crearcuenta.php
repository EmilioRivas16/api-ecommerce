<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos-index.css">
    <title>API abarrotes</title>
</head>
<body>

    <div class="container">
        <h4 class="text-center" id="user_message"></h4>
        <br><br><br>
        <h1 class="titulo">Crear cuenta</h1>
        <br><br><br>
        <form action="models/signin.php" method="POST">
            <div class="form-group">
                <label style="color:#191855;">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="" required autocomplete= off>
            </div>
            <div class="form-group">
                <label style="color:#191855;">Username</label>
                <input type="text" class="form-control" name="username" id="" required autocomplete= off>
            </div>
            <div class="form-group">
                <label style="color:#191855;">Password</label>
                <input type="password" class="form-control" name="password" id="" required autocomplete= off>
            </div>
            <br><br>
            <div>
                <input type="submit" value="Aceptar" class="btn btn-success">
            </div>
            <br><br>
            <div>
                <a href="index.html" class="btn btn-primary">Ir al login</a>
            </div>
        </form>
    </div>
    


</body>

</html>
