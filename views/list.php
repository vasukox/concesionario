<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario - Lista de Vehículos</title>
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
            font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: var(--dark);
            font-weight: 400;
        }

        .navbar {
            background: var(--primary) !important;
            box-shadow: 0 4px 20px var(--shadow-heavy);
            border: none;
            padding: 1.2rem 0;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 800;
            color: var(--white) !important;
            transition: all 0.3s;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .navbar-brand:hover {
            color: var(--accent) !important;
        }

        .navbar-brand i {
            color: var(--accent);
            margin-right: 12px;
        }

        .navbar .btn {
            transition: all 0.3s;
            border-radius: 0;
            padding: 12px 28px;
            font-weight: 600;
            background: var(--secondary);
            border: 2px solid var(--secondary);
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .navbar .btn:hover {
            background: var(--accent);
            border-color: var(--accent);
            transform: translateX(-3px);
            box-shadow: 0 5px 15px rgba(245, 5, 55, 0.4);
        }

        .container-custom {
            margin-top: 40px;
            margin-bottom: 40px;
            max-width: 1400px;
        }

        .header-section {
            background: var(--dark);
            padding: 60px 40px;
            border-radius: 0;
            box-shadow: none;
            margin-bottom: 50px;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .header-section::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 50%;
            height: 100%;
            background: linear-gradient(135deg, transparent 0%, rgba(187, 10, 33, 0.1) 100%);
            pointer-events: none;
        }

        .header-section h2 {
            color: var(--white);
            font-weight: 700;
            margin-bottom: 8px;
            font-size: 3rem;
            letter-spacing: -1px;
            text-transform: uppercase;
        }

        .header-section p {
            color: var(--gray-light);
            font-size: 1.1rem;
            font-weight: 300;
            letter-spacing: 0.5px;
        }

        .btn-add-vehicle {
            background: var(--secondary);
            border: 2px solid var(--secondary);
            padding: 16px 35px;
            font-weight: 700;
            transition: all 0.3s;
            border-radius: 0;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-add-vehicle:hover {
            background: var(--accent);
            border-color: var(--accent);
            transform: translateX(5px);
            box-shadow: -5px 5px 20px rgba(245, 5, 55, 0.3);
        }

        .vehicle-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 30px;
            padding: 0;
        }

        .vehicle-card {
            background: var(--white);
            border-radius: 0;
            overflow: hidden;
            box-shadow: 0 2px 15px var(--shadow);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            border: none;
            border-bottom: 4px solid transparent;
        }

        .vehicle-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 50px var(--shadow-heavy);
            border-bottom-color: var(--secondary);
        }

        .vehicle-image-container {
            width: 100%;
            height: 280px;
            overflow: hidden;
            position: relative;
            background: var(--light);
        }

        .vehicle-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
            filter: brightness(0.95);
        }

        .vehicle-card:hover .vehicle-image {
            transform: scale(1.1);
            filter: brightness(1);
        }

        .vehicle-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.3) 100%);
            pointer-events: none;
            opacity: 0.6;
            transition: opacity 0.3s;
        }

        .vehicle-card:hover .vehicle-image-overlay {
            opacity: 0.3;
        }

        .vehicle-badge {
            position: absolute;
            top: 20px;
            left: 0;
            background: var(--secondary);
            padding: 10px 20px;
            border-radius: 0;
            font-weight: 700;
            color: var(--white);
            box-shadow: 5px 5px 15px rgba(0,0,0,0.3);
            font-size: 0.85rem;
            z-index: 10;
            transition: all 0.3s;
            border: none;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .vehicle-card:hover .vehicle-badge {
            background: var(--accent);
            transform: translateX(5px);
        }

        .vehicle-content {
            padding: 28px;
            background: var(--white);
        }

        .vehicle-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 16px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            letter-spacing: -0.5px;
            line-height: 1.3;
            text-transform: uppercase;
        }

        .vehicle-info {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            color: var(--gray);
            font-size: 0.9rem;
            font-weight: 400;
        }

        .vehicle-info i {
            width: 18px;
            margin-right: 10px;
            color: var(--dark);
            font-size: 0.85rem;
        }

        .vehicle-price {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--primary);
            margin: 20px 0;
            letter-spacing: -1px;
        }

        .vehicle-actions {
            display: flex;
            gap: 0;
            padding-top: 0;
            border-top: none;
            margin-top: 20px;
        }

        .btn-action {
            flex: 1;
            padding: 15px;
            border-radius: 0;
            font-weight: 700;
            transition: all 0.3s;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
        }

        .btn-edit {
            background: var(--dark);
            color: white;
            border-right: 2px solid var(--white);
        }

        .btn-edit:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .btn-delete {
            background: var(--secondary);
            color: white;
        }

        .btn-delete:hover {
            background: var(--accent);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(245, 5, 55, 0.4);
        }

        .empty-state {
            text-align: center;
            padding: 80px 40px;
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 4px 20px var(--shadow);
            border: 1px solid rgba(44, 62, 80, 0.08);
        }

        .empty-state i {
            font-size: 5rem;
            color: var(--light);
            margin-bottom: 24px;
        }

        .empty-state h3 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 12px;
        }

        .empty-state p {
            color: #7F8C8D;
        }

        .alert {
            border: none;
            border-radius: 0;
            padding: 18px 25px;
            font-weight: 600;
            box-shadow: none;
            border-left: 4px solid;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .alert-success {
            background: rgba(0, 177, 64, 0.1);
            color: var(--success);
            border-color: var(--success);
        }

        .alert-danger {
            background: rgba(245, 5, 55, 0.1);
            color: var(--accent);
            border-color: var(--accent);
        }

        @media (max-width: 768px) {
            .vehicle-grid {
                grid-template-columns: 1fr;
            }

            .header-section {
                text-align: center;
            }

            .btn-add-vehicle {
                width: 100%;
                margin-top: 15px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-car"></i> Premium Motors
            </a>
            <div class="ml-auto">
                <a href="index.php?action=mobile" class="btn btn-info">
                    <i class="fas fa-mobile-alt"></i> Vista Móvil
                </a>
            </div>
        </div>
    </nav>

    <div class="container container-custom">
        <div class="header-section">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2>Nuestros Vehículos</h2>
                    <p class="mb-0">Descubre la excelencia en cada detalle</p>
                </div>
                <div class="col-md-4 text-right">
                    <a href="index.php?action=create" class="btn btn-add-vehicle btn-primary">
                        <i class="fas fa-plus-circle"></i> Agregar Vehículo
                    </a>
                </div>
            </div>
        </div>

        <?php
        // Mostrar mensajes
        if(isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            $alertClass = 'success';
            $icon = 'check-circle';
            $message = '';
            
            switch($msg) {
                case 'created':
                    $message = 'Vehículo creado exitosamente';
                    break;
                case 'updated':
                    $message = 'Vehículo actualizado exitosamente';
                    break;
                case 'deleted':
                    $message = 'Vehículo eliminado exitosamente';
                    break;
                case 'error':
                    $alertClass = 'danger';
                    $icon = 'exclamation-circle';
                    $message = 'Ocurrió un error';
                    break;
            }
            
            if($message) {
                echo "<div class='alert alert-{$alertClass} alert-dismissible fade show' role='alert' style='border-radius: 10px;'>
                        <i class='fas fa-{$icon}'></i> {$message}
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>";
            }
        }
        ?>

        <div class="vehicle-grid">
            <?php
            $hasVehicles = false;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $hasVehicles = true;
                extract($row);
                ?>
                <div class="vehicle-card">
                    <div class="vehicle-image-container">
                        <?php if($imagen): ?>
                            <img src="uploads/<?php echo htmlspecialchars($imagen); ?>" alt="<?php echo htmlspecialchars($nombre); ?>" class="vehicle-image" onerror="this.src='https://via.placeholder.com/400x300/667eea/ffffff?text=Sin+Imagen'">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/400x300/667eea/ffffff?text=<?php echo urlencode($nombre); ?>" alt="<?php echo htmlspecialchars($nombre); ?>" class="vehicle-image">
                        <?php endif; ?>
                        <div class="vehicle-image-overlay"></div>
                        <div class="vehicle-badge">MODELO <?php echo htmlspecialchars($modelo); ?></div>
                    </div>
                    
                    <div class="vehicle-content">
                        <h3 class="vehicle-title"><?php echo $nombre; ?></h3>

                        <?php if(isset($calificacion) && $calificacion > 0): ?>
                        <div class="vehicle-info" style="color: #FFD700; font-size: 1.1rem; margin-bottom: 12px;">
                            <?php
                            for($i = 1; $i <= 5; $i++) {
                                echo ($i <= $calificacion) ? '★' : '☆';
                            }
                            ?>
                        </div>
                        <?php endif; ?>

                        <div class="vehicle-info">
                            <i class="fas fa-industry"></i>
                            <span><?php echo $fabricante; ?></span>
                        </div>

                        <div class="vehicle-info">
                            <i class="fas fa-globe"></i>
                            <span><?php echo $pais; ?></span>
                        </div>

                        <?php if(isset($descripcion) && !empty($descripcion)): ?>
                        <div class="vehicle-info" style="display: block; margin-top: 12px; color: #7F8C8D; font-size: 0.9rem; line-height: 1.5;">
                            <?php echo nl2br(htmlspecialchars(substr($descripcion, 0, 120))); ?>
                            <?php if(strlen($descripcion) > 120) echo '...'; ?>
                        </div>
                        <?php endif; ?>

                        <div class="vehicle-price">
                            $<?php echo number_format($precio, 2); ?>
                        </div>
                        
                        <div class="vehicle-actions">
                            <a href="index.php?action=edit&id=<?php echo $id; ?>" class="btn btn-action btn-edit">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <a href="index.php?action=delete&id=<?php echo $id; ?>" 
                               class="btn btn-action btn-delete" 
                               onclick="return confirm('¿Está seguro de eliminar este vehículo?');">
                                <i class="fas fa-trash"></i> Eliminar
                            </a>
                        </div>
                    </div>
                </div>
                <?php
            }
            
            if(!$hasVehicles) {
                echo '<div class="col-12">
                        <div class="empty-state">
                            <i class="fas fa-car"></i>
                            <h3>No hay vehículos registrados</h3>
                            <p class="text-muted">Comienza agregando tu primer vehículo al catálogo</p>
                            <a href="index.php?action=create" class="btn btn-primary btn-lg mt-3">
                                <i class="fas fa-plus-circle"></i> Agregar Primer Vehículo
                            </a>
                        </div>
                    </div>';
            }
            ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        // Animación de entrada
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.vehicle-card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    card.style.transition = 'all 0.5s';
                    
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 50);
                }, index * 100);
            });
        });
    </script>
</body>
</html>