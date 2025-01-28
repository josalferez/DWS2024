<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Login</title>
  <!-- CSS de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="text-center">Iniciar Sesión</h3>
          </div>
          <div class="card-body">
            <form>
              <!-- Campo de correo electrónico -->
              <div class="mb-3">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo electrónico" required>
              </div>
              <!-- Campo de contraseña -->
              <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" placeholder="Ingresa tu contraseña" required>
              </div>
              <!-- Botón de envío -->
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
              </div>
              <!-- Enlace para registrarse -->
              <div class="mt-3 text-center">
                <a href="#">¿No tienes una cuenta? Regístrate</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JS de Bootstrap (opcional, solo si necesitas funcionalidades JS) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
</html>