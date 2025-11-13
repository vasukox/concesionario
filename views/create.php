<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Vehículo - Concesionario Premium</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');

        :root {
            --primary: #000000;
            --secondary: #BB0A21;
            --accent: #F50537;
            --success: #00B140;
            --warning: #FFB800;
            --dark: #1A1A1A;
            --light: #F4F4F4;
            --white: #FFFFFF;
            --gray: #666666;
            --gray-light: #CCCCCC;
            --shadow: rgba(0, 0, 0, 0.1);
            --shadow-heavy: rgba(0, 0, 0, 0.25);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--white);
            min-height: 100vh;
            padding: 40px 0;
            font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }

        .form-container {
            background: var(--white);
            border-radius: 0;
            box-shadow: 0 10px 40px var(--shadow-heavy);
            overflow: hidden;
            border: none;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-header {
            background: var(--dark);
            color: white;
            padding: 50px 40px;
            text-align: center;
            position: relative;
        }

        .form-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--secondary);
        }

        .form-header i.main-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            display: block;
            color: var(--accent);
        }

        .form-header h3 {
            margin: 0;
            font-weight: 800;
            font-size: 2.5rem;
            letter-spacing: -1px;
            text-transform: uppercase;
        }

        .form-header p {
            margin: 12px 0 0;
            opacity: 0.8;
            font-size: 1.1rem;
            font-weight: 300;
            letter-spacing: 0.5px;
        }

        .form-body {
            padding: 45px;
        }

        .form-group label {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group label i {
            margin-right: 10px;
            color: var(--secondary);
            width: 20px;
        }

        .form-control {
            border-radius: 0;
            border: none;
            border-bottom: 2px solid var(--gray-light);
            padding: 14px 0;
            transition: all 0.3s ease;
            font-size: 1rem;
            background: transparent;
            font-weight: 500;
        }

        .form-control:focus {
            border-bottom-color: var(--secondary);
            box-shadow: none;
            background: transparent;
            outline: none;
        }

        .form-control:hover {
            border-bottom-color: var(--gray);
        }

        .custom-file {
            border-radius: 10px;
            overflow: hidden;
        }

        .custom-file-input:focus ~ .custom-file-label {
            border-color: var(--secondary);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.15);
        }

        .custom-file-label {
            border: 2px solid #E8EDF2;
            border-radius: 10px;
            padding: 14px 18px;
            transition: all 0.3s;
            background: #F8F9FA;
        }

        .custom-file-label::after {
            background: var(--secondary);
            color: white;
            border: none;
            padding: 14px 25px;
            height: calc(100% - 4px);
            border-radius: 0 8px 8px 0;
            font-weight: 600;
        }

        .image-preview-area {
            margin-top: 20px;
            border: 2px dashed #E8EDF2;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            display: none;
            background: #F8F9FA;
        }

        .image-preview-area.active {
            display: block;
            animation: fadeIn 0.3s ease-out;
        }

        .image-preview-area img {
            max-width: 100%;
            max-height: 300px;
            border-radius: 10px;
            box-shadow: 0 4px 20px var(--shadow);
        }

        .btn-submit {
            background: var(--secondary);
            border: 2px solid var(--secondary);
            border-radius: 0;
            padding: 18px;
            font-weight: 700;
            font-size: 0.9rem;
            transition: all 0.3s;
            color: white;
            box-shadow: none;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-submit:hover {
            background: var(--accent);
            border-color: var(--accent);
            transform: translateX(5px);
            box-shadow: -5px 5px 20px rgba(245, 5, 55, 0.3);
            color: white;
        }

        .btn-cancel {
            border-radius: 0;
            padding: 18px;
            font-weight: 700;
            font-size: 0.9rem;
            transition: all 0.3s;
            background: transparent;
            border: 2px solid var(--dark);
            color: var(--dark);
            box-shadow: none;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-cancel:hover {
            background: var(--dark);
            border-color: var(--dark);
            transform: translateX(5px);
            box-shadow: -5px 5px 20px rgba(0, 0, 0, 0.2);
            color: white;
        }

        .input-group-text {
            background: transparent;
            border: none;
            border-bottom: 2px solid var(--gray-light);
            color: var(--dark);
            font-weight: 700;
            font-size: 1.2rem;
            border-radius: 0;
            padding: 14px 15px 14px 0;
        }

        .input-group .form-control {
            border-left: none;
        }

        @media (max-width: 768px) {
            .form-body {
                padding: 30px 25px;
            }

            .form-header h3 {
                font-size: 1.6rem;
            }

            .form-header i.main-icon {
                font-size: 3rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <div class="form-container">
                    <div class="form-header">
                        <i class="fas fa-car-side main-icon"></i>
                        <h3>Registrar Nuevo Vehículo</h3>
                        <p>Completa la información del vehículo</p>
                    </div>
                    <div class="form-body">
                        <form action="index.php?action=create" method="POST" enctype="multipart/form-data" id="vehicleForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nombre"><i class="fas fa-car"></i> Nombre del Vehículo</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej: Tesla Model S" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="modelo"><i class="fas fa-calendar"></i> Modelo (Año)</label>
                                        <input type="number" class="form-control" id="modelo" name="modelo" min="1900" max="2100" placeholder="Ej: 2024" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fabricante"><i class="fas fa-industry"></i> Fabricante</label>
                                        <input type="text" class="form-control" id="fabricante" name="fabricante" placeholder="Ej: Tesla" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pais"><i class="fas fa-globe"></i> País de Origen</label>
                                        <input type="text" class="form-control" id="pais" name="pais" placeholder="Ej: Estados Unidos" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="precio"><i class="fas fa-dollar-sign"></i> Precio (USD)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" class="form-control" id="precio" name="precio" placeholder="230000" required step="0.01" min="0">
                                        </div>
                                        <small class="form-text text-muted">Ingresa solo números. Ej: 230000 o 230000.50</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="descripcion"><i class="fas fa-align-left"></i> Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Describe las características del vehículo..."></textarea>
                                <small class="form-text text-muted">Opcional: Agrega detalles adicionales del vehículo</small>
                            </div>

                            <div class="form-group">
                                <label for="calificacion"><i class="fas fa-star"></i> Calificación</label>
                                <select class="form-control" id="calificacion" name="calificacion" required>
                                    <option value="5" selected>★★★★★ (5 estrellas - Excelente)</option>
                                    <option value="4">★★★★☆ (4 estrellas - Muy Bueno)</option>
                                    <option value="3">★★★☆☆ (3 estrellas - Bueno)</option>
                                    <option value="2">★★☆☆☆ (2 estrellas - Regular)</option>
                                    <option value="1">★☆☆☆☆ (1 estrella - Básico)</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="imagen"><i class="fas fa-image"></i> Imagen del Vehículo</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imagen" name="imagen" accept="image/*">
                                    <label class="custom-file-label" for="imagen">Seleccionar imagen...</label>
                                </div>
                                <small class="form-text text-muted">Formatos: JPG, PNG, GIF, WEBP (Máx. 5MB)</small>
                                <div class="image-preview-area" id="imagePreview">
                                    <img id="previewImg" src="" alt="Vista previa">
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-submit btn-block">
                                    <i class="fas fa-check-circle"></i> Registrar Vehículo
                                </button>
                                <a href="index.php?action=list" class="btn btn-cancel btn-block mt-3">
                                    <i class="fas fa-arrow-left"></i> Volver al Catálogo
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Actualizar label del archivo y mostrar vista previa
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName);

            // Vista previa de la imagen
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImg').attr('src', e.target.result);
                    $('#imagePreview').addClass('active');
                }
                reader.readAsDataURL(file);
            }
        });

        // Validación de formulario con efectos visuales
        $('#vehicleForm').on('submit', function(e) {
            const button = $(this).find('button[type="submit"]');
            button.html('<i class="fas fa-spinner fa-spin"></i> Registrando...');
            button.prop('disabled', true);
        });
    </script>
</body>
</html>
