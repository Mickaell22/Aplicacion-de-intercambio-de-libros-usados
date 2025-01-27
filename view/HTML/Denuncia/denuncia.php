<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Autor -->
  <meta name="author" content="Fernadez Nanande Jahir Bismark">

  <!-- Metadatos -->
  <meta name="description" content="Este es un proyecto de diseño de aplicaciones web diseñado por el grupo 5">
  <meta name="keywords" content="Libro, intercambio, busqueda, filtrado, foro">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Open Graph -->
  <meta name="OG::title" content="Proyecto">

  <!-- CSS -->
  <link rel="stylesheet" href="../CSS/estilos-comunes-2.css">

  <!-- Favicon -->
  <!-- <link rel="icon" href="../Image/icon.png" type="image/png"> -->

  <!-- Titulo de pagiona -->
  <title>Intercambios de libros usados</title>

</head>

<body class="grid-container">

  <main class="main">
    <div class="frase">
      <h3 class="frase-principal">¡Denuncia y reporta cosas inusuales!</h3>
      <p class="frase-secundaria">Tu denuncia es importante para tomar acción y mejorar nuestra comunidad de libros.</p>
      <img
        src="https://img.freepik.com/fotos-premium/martillo-libros-simbolo-estatua-justicia-concepto-derecho-legal_218381-4285.jpg"
        alt="Simbolo de justicia">

      <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin'): ?>
        <div class="admin-actions">
          <button type="button" class="admin-button" onclick="location.href='index.php?c=denuncia&f=gestionar'">
            Gestionar Denuncias
          </button>
        </div>
      <?php endif; ?>
    </div>
    <div class="form-container">
      <form class="form-denuncia" id="formulario" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="libro_id" value="<?php echo $libro['id']; ?>">
        <h2 class="form-titulo">Denuncia</h2>

        <!-- Tipo de denuncia -->
        <div class="form-input">
          <label for="tipo">Tipo de Denuncia</label>
          <select id="tipo" name="tipo" required>
            <option value="">Selecciona</option>
            <option value="acoso">Acoso</option>
            <option value="fraude">Fraude</option>
            <option value="discriminacion">Discriminación</option>
            <option value="contenido_inapropiado">Contenido inapropiado</option>
            <option value="derechos_autor">Violación de derechos de autor</option>
            <option value="publicidad_engañosa">Publicidad engañosa</option>
            <option value="informacion_falsa">Información falsa</option>
            <option value="otros">Otros</option>
          </select>
        </div>

        <!-- Descripción de los hechos -->
        <div class="form-input">
          <label for="descripcion">Descripción de los Hechos</label>
          <textarea id="descripcion" name="descripcion" rows="4" placeholder="¿Qué ocurrió? Cuéntanos."
            required></textarea>
        </div>

        <!-- Evidencia -->
        <div class="form-input">
          <label for="evidencia">Evidencia (opcional)</label>
          <input type="file" id="evidencia" name="evidencia" accept="image/*, .pdf">
          <small class="file-info">Formatos aceptados: JPG, PNG, PDF. Máximo 10MB</small>
        </div>

        <!-- Fecha del incidente -->
        <div class="form-input">
          <label for="fecha">Fecha del Incidente</label>
          <input type="date" id="fecha" name="fecha" required>
        </div>

        <!-- Botón de envío -->
        <div class="form-input">
          <button type="submit" class="btn-submit">Enviar Denuncia</button>
        </div>
      </form>
    </div>
  </main>

  <script src="../JavaScript/Validaciones_Denuncia.js"></script>
</body>

</html>

<style>




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

  .admin-actions {
      margin-top: 20px;
      padding: 15px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
    }

    .admin-button {
      display: inline-block;
      padding: 12px 25px;
      background: linear-gradient(#FF4081, #FF9800);
      color: white;
      text-decoration: none;
      border-radius: 25px;
      font-weight: bold;
      cursor: pointer;
    }
</style>