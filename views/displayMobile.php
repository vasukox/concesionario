<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario Móvil - Vista Premium</title>

    <!-- jQuery Mobile CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
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

        /* General */
        * {
            font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif !important;
        }

        .ui-page {
            background: var(--white);
        }

        /* Header */
        .ui-header {
            background: var(--primary) !important;
            border: none !important;
            box-shadow: 0 4px 20px var(--shadow-heavy);
            padding: 15px 0 !important;
        }

        .ui-header h1 {
            color: var(--white) !important;
            font-weight: 800 !important;
            text-shadow: none !important;
            font-size: 1.4rem !important;
            letter-spacing: 1px;
            text-transform: uppercase !important;
        }

        .ui-header .ui-btn {
            background: var(--secondary) !important;
            border: 2px solid var(--secondary) !important;
            color: white !important;
            font-weight: 700 !important;
            border-radius: 0 !important;
            box-shadow: none !important;
            text-transform: uppercase !important;
            font-size: 0.75rem !important;
            letter-spacing: 0.5px !important;
        }

        .ui-header .ui-btn:hover {
            background: var(--accent) !important;
            border-color: var(--accent) !important;
        }

        /* Content */
        .ui-content {
            padding: 20px 15px !important;
        }

        /* Vehicle Cards */
        .vehicle-card {
            background: var(--white);
            border-radius: 0;
            overflow: hidden;
            margin-bottom: 25px;
            box-shadow: 0 2px 15px var(--shadow);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none;
            border-bottom: 4px solid transparent;
        }

        .vehicle-card:active {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px var(--shadow-heavy);
            border-bottom-color: var(--secondary);
        }

        .vehicle-image-wrapper {
            position: relative;
            width: 100%;
            height: 220px;
            overflow: hidden;
            background: var(--light);
        }

        .vehicle-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.95);
        }

        .vehicle-badge {
            position: absolute;
            top: 15px;
            left: 0;
            background: var(--secondary);
            padding: 8px 16px;
            border-radius: 0;
            font-weight: 700;
            color: var(--white);
            box-shadow: 5px 5px 15px rgba(0,0,0,0.3);
            font-size: 0.75rem;
            border: none;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .vehicle-content {
            padding: 20px;
        }

        .vehicle-name {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 16px;
            line-height: 1.3;
            letter-spacing: -0.5px;
            text-transform: uppercase;
        }

        .vehicle-info-row {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }

        .vehicle-info-icon {
            width: 32px;
            height: 32px;
            background: transparent;
            border-radius: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            color: var(--dark);
            font-size: 0.85rem;
        }

        .vehicle-info-text {
            flex: 1;
        }

        .vehicle-info-label {
            font-size: 0.7rem;
            color: var(--gray);
            display: block;
            margin-bottom: 3px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .vehicle-info-value {
            font-size: 1rem;
            color: var(--primary);
            font-weight: 600;
        }

        .vehicle-price-section {
            background: transparent;
            padding: 16px 0 0;
            border-radius: 0;
            margin: 16px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: none;
            border-top: 2px solid var(--light);
        }

        .vehicle-price {
            font-size: 1.8rem;
            color: var(--primary);
            font-weight: 800;
            letter-spacing: -1px;
        }

        .star-rating {
            color: #FFD700;
            font-size: 1.3rem;
            text-shadow: none;
        }

        /* Detail Page */
        .detail-header-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            border-radius: 0;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .detail-content {
            margin-top: 20px;
        }

        .detail-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 20px;
            letter-spacing: -1px;
            text-transform: uppercase;
        }

        .spec-box {
            background: var(--white);
            border-radius: 0;
            padding: 25px;
            margin-top: 16px;
            box-shadow: 0 2px 15px var(--shadow);
            border: none;
            border-left: 4px solid var(--secondary);
        }

        .spec-box h3 {
            color: var(--primary);
            font-weight: 800;
            margin-bottom: 20px;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .spec-box h3 i {
            color: var(--secondary);
            margin-right: 12px;
        }

        .spec-item {
            display: flex;
            justify-content: space-between;
            padding: 14px 0;
            border-bottom: 1px solid rgba(44, 62, 80, 0.08);
        }

        .spec-item:last-child {
            border-bottom: none;
        }

        .spec-label {
            font-weight: 600;
            color: var(--gray);
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .spec-value {
            color: var(--primary);
            font-weight: 700;
            font-size: 1rem;
        }

        .price-highlight {
            color: var(--success);
            font-size: 1.5rem;
            font-weight: 700;
        }

        .action-buttons {
            margin-top: 24px;
        }

        .ui-btn {
            border-radius: 0 !important;
            font-weight: 700 !important;
            padding: 16px 0 !important;
            box-shadow: none !important;
            border: 2px solid !important;
            text-transform: uppercase !important;
            font-size: 0.85rem !important;
            letter-spacing: 0.5px !important;
        }

        .btn-back {
            background: var(--secondary) !important;
            border-color: var(--secondary) !important;
            color: white !important;
        }

        .btn-back:hover {
            background: var(--accent) !important;
            border-color: var(--accent) !important;
        }

        .ui-btn-icon-left {
            padding-left: 2.8em !important;
        }

        .ui-grid-a .ui-block-a .ui-btn {
            background: var(--dark) !important;
            border-color: var(--dark) !important;
            color: white !important;
        }

        .ui-grid-a .ui-block-b .ui-btn {
            background: var(--secondary) !important;
            border-color: var(--secondary) !important;
            color: white !important;
        }

        .ui-grid-a .ui-block-b .ui-btn:hover {
            background: var(--accent) !important;
            border-color: var(--accent) !important;
        }

        /* Footer */
        .ui-footer {
            background: var(--dark) !important;
            border: none !important;
            box-shadow: 0 -4px 20px var(--shadow-heavy);
        }

        .ui-footer h4 {
            color: var(--white) !important;
            margin: 12px 0 !important;
            font-weight: 700 !important;
            font-size: 0.85rem !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 30px;
            background: var(--white);
            border-radius: 0;
            box-shadow: 0 4px 20px var(--shadow);
            border: none;
            border-left: 4px solid var(--secondary);
        }

        .empty-icon {
            font-size: 4.5rem;
            color: var(--light);
            margin-bottom: 20px;
        }

        .empty-state h3 {
            color: var(--primary);
            font-weight: 700;
            margin-bottom: 10px;
        }

        .empty-state p {
            color: var(--gray);
            margin-bottom: 20px;
            font-weight: 500;
        }

        .empty-state .ui-btn {
            background: var(--secondary) !important;
            color: white !important;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .vehicle-card {
            animation: fadeIn 0.4s ease-out;
        }
    </style>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

    <!-- jQuery Mobile JS -->
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

<!-- Página: Lista de Vehículos -->
<div data-role="page" id="listPage">
    <div data-role="header" data-position="fixed">
        <h1><i class="fas fa-car"></i> Concesionario</h1>
        <a href="index.php?action=list" data-icon="grid" class="ui-btn-right" data-ajax="false">Vista Web</a>
    </div>

    <div role="main" class="ui-content">
        <div id="vehiclesList">
            <?php
            $hasVehicles = false;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $hasVehicles = true;
                extract($row);

                // Usar la calificación de la BD o valor por defecto
                $rating = isset($calificacion) && $calificacion > 0 ? $calificacion : 5;
                $stars = str_repeat("★", $rating) . str_repeat("☆", 5 - $rating);
                ?>

                <a href="#detailPage<?php echo $id; ?>" data-transition="slide" style="text-decoration: none;">
                    <div class="vehicle-card">
                        <div class="vehicle-image-wrapper">
                            <?php if($imagen): ?>
                                <img src="uploads/<?php echo htmlspecialchars($imagen); ?>" alt="<?php echo htmlspecialchars($nombre); ?>" class="vehicle-image" onerror="this.src='https://via.placeholder.com/400x300/3498DB/ffffff?text=Sin+Imagen'">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/400x300/3498DB/ffffff?text=<?php echo urlencode($nombre); ?>" alt="<?php echo htmlspecialchars($nombre); ?>" class="vehicle-image">
                            <?php endif; ?>
                            <div class="vehicle-badge"><i class="fas fa-calendar-alt"></i> <?php echo htmlspecialchars($modelo); ?></div>
                        </div>

                        <div class="vehicle-content">
                            <div class="vehicle-name"><?php echo htmlspecialchars($nombre); ?></div>

                            <div class="vehicle-info-row">
                                <div class="vehicle-info-icon"><i class="fas fa-industry"></i></div>
                                <div class="vehicle-info-text">
                                    <span class="vehicle-info-label">Fabricante</span>
                                    <span class="vehicle-info-value"><?php echo htmlspecialchars($fabricante); ?></span>
                                </div>
                            </div>

                            <div class="vehicle-info-row">
                                <div class="vehicle-info-icon"><i class="fas fa-globe"></i></div>
                                <div class="vehicle-info-text">
                                    <span class="vehicle-info-label">País de Origen</span>
                                    <span class="vehicle-info-value"><?php echo htmlspecialchars($pais); ?></span>
                                </div>
                            </div>

                            <div class="vehicle-price-section">
                                <span class="vehicle-price">$<?php echo number_format($precio, 2); ?></span>
                                <span class="star-rating"><?php echo $stars; ?></span>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Página de detalle para cada vehículo -->
                <div data-role="page" id="detailPage<?php echo $id; ?>">
                    <div data-role="header" data-add-back-btn="true">
                        <h1><i class="fas fa-info-circle"></i> Detalles</h1>
                        <a href="index.php?action=list" data-icon="home" class="ui-btn-right" data-ajax="false">Web</a>
                    </div>

                    <div role="main" class="ui-content">
                        <?php if($imagen): ?>
                            <img src="uploads/<?php echo htmlspecialchars($imagen); ?>" alt="<?php echo htmlspecialchars($nombre); ?>" class="detail-header-image" onerror="this.src='https://via.placeholder.com/400x300/3498DB/ffffff?text=Sin+Imagen'">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/400x300/3498DB/ffffff?text=<?php echo urlencode($nombre); ?>" alt="<?php echo htmlspecialchars($nombre); ?>" class="detail-header-image">
                        <?php endif; ?>

                        <div class="detail-content">
                            <h2 class="detail-title"><?php echo htmlspecialchars($nombre); ?></h2>

                            <div class="spec-box">
                                <h3><i class="fas fa-clipboard-list"></i> Especificaciones</h3>

                                <div class="spec-item">
                                    <span class="spec-label"><i class="fas fa-calendar"></i> Modelo</span>
                                    <span class="spec-value"><?php echo htmlspecialchars($modelo); ?></span>
                                </div>

                                <div class="spec-item">
                                    <span class="spec-label"><i class="fas fa-industry"></i> Fabricante</span>
                                    <span class="spec-value"><?php echo htmlspecialchars($fabricante); ?></span>
                                </div>

                                <div class="spec-item">
                                    <span class="spec-label"><i class="fas fa-globe"></i> País</span>
                                    <span class="spec-value"><?php echo htmlspecialchars($pais); ?></span>
                                </div>

                                <div class="spec-item">
                                    <span class="spec-label"><i class="fas fa-dollar-sign"></i> Precio</span>
                                    <span class="price-highlight">$<?php echo number_format($precio, 2); ?></span>
                                </div>

                                <div class="spec-item">
                                    <span class="spec-label"><i class="fas fa-star"></i> Calificación</span>
                                    <span class="star-rating"><?php echo $stars; ?></span>
                                </div>
                            </div>

                            <?php if(isset($descripcion) && !empty($descripcion)): ?>
                            <div class="spec-box" style="margin-top: 20px;">
                                <h3><i class="fas fa-file-alt"></i> Descripción</h3>
                                <p style="color: var(--gray); line-height: 1.7; margin: 0; font-weight: 500; font-size: 0.95rem;">
                                    <?php echo nl2br(htmlspecialchars($descripcion)); ?>
                                </p>
                            </div>
                            <?php endif; ?>

                            <div class="action-buttons">
                                <a href="#listPage" data-transition="slide" data-direction="reverse" class="ui-btn btn-back ui-shadow ui-corner-all">
                                    <i class="fas fa-arrow-left"></i> Volver al Catálogo
                                </a>

                                <div class="ui-grid-a" style="margin-top: 15px;">
                                    <div class="ui-block-a">
                                        <a href="index.php?action=edit&id=<?php echo $id; ?>" class="ui-btn ui-shadow ui-corner-all" data-ajax="false">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                    </div>
                                    <div class="ui-block-b">
                                        <a href="index.php?action=delete&id=<?php echo $id; ?>" class="ui-btn ui-shadow ui-corner-all" data-ajax="false" onclick="return confirm('¿Está seguro de eliminar este vehículo?');">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div data-role="footer" data-position="fixed">
                        <h4><i class="fas fa-copyright"></i> Concesionario Premium 2025</h4>
                    </div>
                </div>
                <?php
            }

            if(!$hasVehicles) {
                echo '<div class="empty-state">
                        <div class="empty-icon"><i class="fas fa-car"></i></div>
                        <h3>No hay vehículos</h3>
                        <p>Agrega vehículos desde la vista web para comenzar</p>
                        <a href="index.php?action=list" class="ui-btn ui-shadow ui-corner-all" data-ajax="false">
                            <i class="fas fa-desktop"></i> Ir a Vista Web
                        </a>
                    </div>';
            }
            ?>
        </div>
    </div>

    <div data-role="footer" data-position="fixed">
        <h4>
            <?php
            if($hasVehicles) {
                $count = 0;
                $stmt->execute();
                while($stmt->fetch()) $count++;
                echo '<i class="fas fa-list"></i> Total: ' . $count . ' vehículo' . ($count != 1 ? 's' : '');
            } else {
                echo '<i class="fas fa-inbox"></i> Sin vehículos';
            }
            ?>
        </h4>
    </div>
</div>

</body>
</html>
