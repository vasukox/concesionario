<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario - Sin Base de Datos</title>
    <style>
        body { font-family: Arial, Helvetica, sans-serif; background:#f7f7f7; color:#222; display:flex; align-items:center; justify-content:center; height:100vh; margin:0; }
        .card { background:#fff; padding:28px; border-radius:8px; box-shadow:0 6px 24px rgba(0,0,0,0.08); max-width:640px; }
        h1 { margin:0 0 10px; font-size:1.4rem; }
        p { margin:8px 0; color:#555; }
        a.button { display:inline-block; margin-top:12px; padding:10px 16px; background:#0070f3; color:white; text-decoration:none; border-radius:6px; }
    </style>
</head>
<body>
    <div class="card">
        <h1>La aplicación está desplegada</h1>
        <p>La aplicación se ha desplegado correctamente en Vercel, pero no hay una base de datos configurada en este entorno.</p>
        <p>Para ver la aplicación completa configure una base de datos MySQL y añada estas variables de entorno en el panel de Vercel:</p>
        <ul>
            <li><code>DB_HOST</code></li>
            <li><code>DB_NAME</code></li>
            <li><code>DB_USER</code></li>
            <li><code>DB_PASS</code></li>
        </ul>
        <p>Mientras tanto, esta página confirma que el despliegue funciona y evita errores 500.</p>
        <a class="button" href="/index.php?action=mobile">Ver vista móvil (puede fallar sin BD)</a>
    </div>
</body>
</html>