<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vehículo - Concesionario Premium</title>
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
            background: var(--warning);
        }

        .form-header i.main-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            display: block;
            color: var(--warning);
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
            color: var(--warning);
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
            border-bottom-color: var(--warning);
            box-shadow: none;
            background: transparent;
            outline: none;
        }

        .form-control:hover {
            border-bottom-color: var(--gray);
        }

        .current-image {
            border: 3px solid var(--warning);
            border-radius: 12px;
            padding: 20px;
            background: #FEF5E7;
            margin-bottom: 20px;
            text-align: center;
        }

        .current-image img {
            max-width: 100%;
            max-height: 250px;
            border-radius: 10px;
            box-shadow: 0 4px 20px var(--shadow);
        }

        .current-image-label {
            display: block;
            color: var(--warning);
            font-weight: 700;
            margin-bottom: 12px;
            font-size: 1rem;
        }

        .custom-file-label {
            border: 2px solid #E8EDF2;
            border-radius: 10px;
            padding: 14px 18px;
            background: #F8F9FA;
        }

        .custom-file-label::after {
            background: var(--warning);
            color: white;
            border: none;
            padding: 14px 25px;
            height: calc(100% - 4px);
            border-radius: 0 8px 8px 0;
            font-weight: 600;
        }

        .btn-update {
            background: var(--warning);
            border: 2px solid var(--warning);
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

        .btn-update:hover {
            background: #D68A00;
            border-color: #D68A00;
            transform: translateX(5px);
            box-shadow: -5px 5px 20px rgba(255, 184, 0, 0.3);
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
                        <i class="fas fa-edit main-icon"></i>
                        <h3>Editar Vehículo</h3>
                        <p>Actualiza la información del vehículo</p>
                    </div>
                    <div class="form-body">
                        <form action="index.php?action=edit&id=<?php echo $this->vehicle->id; ?>" method="POST" enctype="multipart/form-data" id="editForm">
                            <input type="hidden" name="id" value="<?php echo $this->vehicle->id; ?>">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nombre"><i class="fas fa-car"></i> Nombre del Vehículo</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo htmlspecialchars($this->vehicle->nombre); ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="modelo"><i class="fas fa-calendar"></i> Modelo (Año)</label>
                                        <input type="number" class="form-control" id="modelo" name="modelo" value="<?php echo htmlspecialchars($this->vehicle->modelo); ?>" min="1900" max="2100" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fabricante"><i class="fas fa-industry"></i> Fabricante</label>
                                        <input type="text" class="form-control" id="fabricante" name="fabricante" value="<?php echo htmlspecialchars($this->vehicle->fabricante); ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pais"><i class="fas fa-globe"></i> País de Origen</label>
                                        <input type="text" class="form-control" id="pais" name="pais" value="<?php echo htmlspecialchars($this->vehicle->pais); ?>" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="precio"><i class="fas fa-dollar-sign"></i> Precio (USD)</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" class="form-control" id="precio" name="precio" value="<?php echo htmlspecialchars($this->vehicle->precio); ?>" required step="0.01" min="0">
                                        </div>
                                        <small class="form-text text-muted">Ingresa solo números. Ej: 230000 o 230000.50</small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="descripcion"><i class="fas fa-align-left"></i> Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Describe las características del vehículo..."><?php echo htmlspecialchars($this->vehicle->descripcion ?? ''); ?></textarea>
                                <small class="form-text text-muted">Opcional: Agrega detalles adicionales del vehículo</small>
                            </div>

                            <div class="form-group">
                                <label for="calificacion"><i class="fas fa-star"></i> Calificación</label>
                                <select class="form-control" id="calificacion" name="calificacion" required>
                                    <option value="5" <?php echo ($this->vehicle->calificacion == 5) ? 'selected' : ''; ?>>★★★★★ (5 estrellas - Excelente)</option>
                                    <option value="4" <?php echo ($this->vehicle->calificacion == 4) ? 'selected' : ''; ?>>★★★★☆ (4 estrellas - Muy Bueno)</option>
                                    <option value="3" <?php echo ($this->vehicle->calificacion == 3) ? 'selected' : ''; ?>>★★★☆☆ (3 estrellas - Bueno)</option>
                                    <option value="2" <?php echo ($this->vehicle->calificacion == 2) ? 'selected' : ''; ?>>★★☆☆☆ (2 estrellas - Regular)</option>
                                    <option value="1" <?php echo ($this->vehicle->calificacion == 1) ? 'selected' : ''; ?>>★☆☆☆☆ (1 estrella - Básico)</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label><i class="fas fa-image"></i> Imagen del Vehículo</label>
                                <?php if($this->vehicle->imagen): ?>
                                    <div class="current-image">
                                        <span class="current-image-label"><i class="fas fa-check-circle"></i> Imagen Actual</span>
                                        <img src="uploads/<?php echo htmlspecialchars($this->vehicle->imagen); ?>" alt="Imagen actual" onerror="this.parentElement.style.display='none'">
                                    </div>
                                <?php endif; ?>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="imagen" name="imagen" accept="image/*">
                                    <label class="custom-file-label" for="imagen">Seleccionar nueva imagen...</label>
                                </div>
                                <small class="form-text text-muted">Deja vacío si no deseas cambiar la imagen actual</small>
                            </div>

                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-update btn-block">
                                    <i class="fas fa-save"></i> Actualizar Vehículo
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
        // Actualizar label del archivo
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').html(fileName);
        });

        // Validación de formulario con efectos visuales
        $('#editForm').on('submit', function(e) {
            const button = $(this).find('button[type="submit"]');
            button.html('<i class="fas fa-spinner fa-spin"></i> Actualizando...');
            button.prop('disabled', true);
        });
    </script>
</body>
</html>
