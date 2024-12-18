<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
  <form class="login-form" action="../admin/adm.php" method="post">
        <h1>Iniciar Sesion</h1>
        <div class="form-input-material">
          <input type="text" name="username" id="username" placeholder="Usuario" autocomplete="off" class="form-control-material" required />
        </div>
        <div class="form-input-material">
          <input type="password" name="password" id="password" placeholder="Contraseña" autocomplete="off" class="form-control-material" required />
        </div>
        <button type="submit" class="btn btn-primary btn-ghost">Ingresar</button>
      </form>
</body>
</html>