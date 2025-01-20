<div class="admin-container">
    <div class="admin-header">
        <h1>Detalles de la Denuncia</h1>
        <a href="index.php?c=denuncia&f=gestionar" class="btn-volver">Volver</a>
    </div>

    <div class="detalles-grid">
        <!-- Información básica -->
        <div class="detalle-section">
            <h2>Información de la Denuncia</h2>
            <div class="detalle-item">
                <label>ID:</label>
                <span><?php echo $denuncia['id']; ?></span>
            </div>
            <div class="detalle-item">
                <label>Estado:</label>
                <span class="estado-badge <?php echo $denuncia['estado']; ?>">
                    <?php echo ucfirst($denuncia['estado']); ?>
                </span>
            </div>
            <div class="detalle-item">
                <label>Tipo:</label>
                <span><?php echo ucfirst($denuncia['tipo']); ?></span>
            </div>
            <div class="detalle-item">
                <label>Fecha del Incidente:</label>
                <span><?php echo $denuncia['fecha_incidente']; ?></span>
            </div>
            <div class="detalle-item">
                <label>Fecha de Registro:</label>
                <span><?php echo $denuncia['fecha_registro']; ?></span>
            </div>
        </div>

        <!-- Información del libro -->
        <div class="detalle-section">
            <h2>Libro Denunciado</h2>
            <div class="libro-info">
                <img src="<?php echo $denuncia['imagen_libro']; ?>" alt="Portada del libro">
                <div>
                    <h3><?php echo html_entity_decode($denuncia['libro_titulo']); ?></h3>
                    <p>Autor: <?php echo $denuncia['libro_autor']; ?></p>
                </div>
            </div>
        </div>

        <!-- Información del usuario -->
        <div class="detalle-section">
            <h2>Usuario Denunciante</h2>
            <div class="detalle-item">
                <label>Nombre:</label>
                <span><?php echo $denuncia['usuario_nombre']; ?></span>
            </div>
            <div class="detalle-item">
                <label>Email:</label>
                <span><?php echo $denuncia['usuario_email']; ?></span>
            </div>
        </div>

        <!-- Descripción completa -->
        <div class="detalle-section full-width">
            <h2>Descripción de la Denuncia</h2>
            <div class="descripcion-box">
                <?php echo nl2br(htmlspecialchars($denuncia['descripcion'])); ?>
            </div>
        </div>

        <!-- Evidencia si existe -->
        <?php if (!empty($denuncia['evidencia'])): ?>
            <div class="detalle-section full-width">
                <h2>Evidencia Adjunta</h2>
                <div class="evidencia-box">
                    <a href="<?php echo $denuncia['evidencia']; ?>" target="_blank" class="btn-ver">
                        Ver Evidencia
                    </a>
                </div>
            </div>
        <?php endif; ?>

        <!-- Acciones -->
        <div class="detalle-section full-width">
            <div class="acciones-container">
                <?php if ($denuncia['estado'] === 'pendiente'): ?>
                    <button onclick="if(confirm('¿Está seguro de marcar esta denuncia como resuelta?')) 
                location.href='index.php?c=denuncia&f=resolver&id=<?php echo $denuncia['id']; ?>&ret=details'"
                        class="btn-aprobar">Resolver</button>
                    <button onclick="if(confirm('¿Está seguro de descartar esta denuncia?')) 
                location.href='index.php?c=denuncia&f=descartar&id=<?php echo $denuncia['id']; ?>&ret=details'"
                        class="btn-rechazar">Descartar</button>
                <?php endif; ?>
                <button onclick="location.href='index.php?c=denuncia&f=editar&id=<?php echo $denuncia['id']; ?>'"
                    class="btn-editar">Editar</button>
                <button onclick="if(confirm('¿Está seguro de eliminar esta denuncia?')) 
                        location.href='index.php?c=denuncia&f=eliminar&id=<?php echo $denuncia['id']; ?>'"
                    class="btn-eliminar">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<style>
    .admin-container {
        padding: 40px;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        margin: 30px auto;
        max-width: 1200px;
    }

    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #eee;
    }

    .admin-header h1 {
        font-size: 2.2em;
        color: #333;
        margin: 0;
    }

    .btn-volver {
        padding: 10px 25px;
        background: linear-gradient(135deg, #4b6cb7, #182848);
        color: white;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 500;
    }

    .detalles-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 30px;
    }

    .detalle-section {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .detalle-section.full-width {
        grid-column: 1 / -1;
    }

    .detalle-section h2 {
        color: #333;
        margin: 0 0 20px 0;
        font-size: 1.5em;
        padding-bottom: 10px;
        border-bottom: 2px solid #ddd;
    }

    .detalle-item {
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }

    .detalle-item label {
        font-weight: 600;
        color: #666;
        width: 150px;
        margin-right: 15px;
    }

    .detalle-item span {
        color: #333;
        flex: 1;
    }

    .estado-badge {
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 600;
        font-size: 0.9em;
    }

    .estado-badge.pendiente {
        background: linear-gradient(135deg, #ffd700, #ffa500);
        color: white;
    }

    .estado-badge.resuelto {
        background: linear-gradient(135deg, #00b09b, #96c93d);
        color: white;
    }

    .estado-badge.descartado {
        background: linear-gradient(135deg, #8e9eab, #eef2f3);
        color: #4a4a4a;
    }

    .libro-info {
        display: flex;
        gap: 20px;
        align-items: start;
    }

    .libro-info img {
        width: 120px;
        height: 180px;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .libro-info h3 {
        margin: 0 0 10px 0;
        color: #333;
    }

    .descripcion-box {
        background: white;
        padding: 20px;
        border-radius: 10px;
        margin-top: 10px;
        color: #333;
        line-height: 1.6;
    }

    .acciones-container {
        display: flex;
        gap: 15px;
        margin-top: 20px;
        justify-content: flex-end;
    }

    .btn-aprobar,
    .btn-rechazar,
    .btn-editar,
    .btn-eliminar {
        padding: 12px 25px;
        border-radius: 25px;
        font-weight: 500;
        text-decoration: none;
        border: none;
        color: white;
        cursor: pointer;
    }

    .btn-aprobar {
        background: linear-gradient(135deg, #11998e, #38ef7d);
    }

    .btn-rechazar {
        background: linear-gradient(135deg, #cb2d3e, #ef473a);
    }

    .btn-editar {
        background: linear-gradient(135deg, #4b6cb7, #182848);
    }

    .btn-eliminar {
        background: linear-gradient(135deg, #800000, #cc0000);
    }

    .box-titulo {
        height: 320px;
        width: 100%;
        box-sizing: border-box;
        text-align: center;
        background-image: url(https://www.dexiaabogados.com/wp-content/uploads/2021/01/denuncia.jpg);
        background-position: center;
        box-sizing: border-box;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    .box-titulo-opaco {
        height: 295px;
        width: 100%;
        background: radial-gradient(ellipse at 50% 30%, transparent 0%, rgba(0, 0, 0, 0.5) 50%, #000 100%);
    }

    .titulo {
        display: inline-block;
        border-bottom: 7px solid #D98B48;
        color: #FFFB;
        margin: 10% 0 45px;
        border-radius: 20px;
        width: auto;
        height: auto;
        font-size: 3em;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        /* sombra en la parte inferior */
        text-shadow: 0 0 5px #d94;
    }

    .grid-container>* {
        text-align: center;
        font-weight: 500;
    }

    .grid-container {
        display: grid;
        gap: 20px;
        grid-template-columns: repeat(6, 1fr);
        grid-template-rows: repeat(6, auto);
    }

    .navbar {
        grid-column: 1/7;
        grid-row: 1/3;
        padding: 0;
    }

    .header {
        grid-column: 1/7;
        grid-row: 1/2;
        background-color: rgb(217, 139, 72);
    }

    .sidebar {
        grid-column: 1/2;
        grid-row: 3/7;
        background-color: rgb(242, 242, 242);
        /* background-color: rgb(166, 87, 41); */
        margin-left: 20px;

        border-right: 7px solid #D98b48;
        border-top: 7px solid #D98b48;
        border-left: 3px solid #D98B48;

        border-radius: 8px;
        box-shadow: 0 20px 20px rgba(0, 0, 0)
    }

    .main {
        grid-template-rows: auto auto;
        grid-column: 1/7;
        grid-row: 4/6;
        background-color: rgb(242, 242, 242);
        display: grid;
        grid-template-columns: repeat(8, 1fr);
        /* 4 columnas iguales */
        gap: 20px;
        padding-top: 50px;
    }

    .pie {
        grid-column: 1/7;
        grid-row: 6/7;
        background-color: rgb(217, 139, 72);
    }

    .section {
        grid-column: 1/7;
        grid-row: 5/6;
    }



    .frase {
        grid-column: 1/4;
        grid-row: 1/5;
        margin-left: 100px;
        padding: 40px;
        background: linear-gradient(#f5f7fa 0%, #a3dfb2 100%);
        border-radius: 15px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7);
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 90%;
        width: 500px;
    }

    .frase img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .frase-principal {
        font-size: 3rem;
        color: #2c3e50;
        margin-bottom: 20px;
        font-weight: bold;
        line-height: 1.2;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .frase-secundaria {
        font-size: 1.5rem;
        /* También más grande */
        color: #546e7a;
        line-height: 1.6;
        margin: 0;
        font-weight: 400;
    }


    /* Registra tu librop :) ... Tengo hambre :( */
    .form-container {
        grid-column: 5/8;
        grid-row: 1/6;
        width: 600px;
        margin: 0 auto;
        padding: 20px;
        text-align: left;
    }

    .form-denuncia {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .form-titulo {
        text-align: center;
        color: #2c3e50;
        margin-bottom: 30px;
        font-size: 2em;
    }

    .form-input {
        margin-bottom: 20px;
        width: 90%;
    }

    .form-input label {
        display: block;
        margin-bottom: 8px;
        color: #34495e;
        font-weight: 500;
    }

    .form-input input,
    .form-input select,
    .form-input textarea {
        width: 100%;
        padding: 12px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    .form-input input:focus,
    .form-input select:focus,
    .form-input textarea:focus {
        border-color: #3498db;
        outline: none;
    }

    .form-input textarea {
        resize: vertical;
        min-height: 100px;
    }

    .file-info {
        display: block;
        margin-top: 5px;
        color: #7f8c8d;
        font-size: 0.9em;
    }

    input[type="file"] {
        border: 1px dashed #3498db;
        padding: 20px;
        background-color: #f7f9fc;
        cursor: pointer;
    }

    .btn-submit {
        width: 100%;
        padding: 15px;
        background-color: #3498db;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #2980b9;
    }




    /* UNA PATA!!! */
    /* Footer */
    .footer-content {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        padding: 40px 20px;
        color: #fff;
        background: url(https://www.dexiaabogados.com/wp-content/uploads/2021/01/denuncia.jpg);
        background-position: center;
        box-sizing: border-box;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    .error {
        color: red;
        display: block;
    }
</style>