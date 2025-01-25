<!-- Autor: Troya Garzón Geancarlos -->
<!DOCTYPE html>
<html lang="es">

<head>

  <meta name="author" content="Troya Garzón Geancarlos">

  <!-- Metadatos -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Este es un proyecto de diseño de aplicaciones web diseñado por el grupo 5">
  <meta name="keywords" content="Libro, intercambio, busqueda, filtrado, foro, inicio, libros, chat, charla">

  <!-- Open Graph -->
  <meta name="OG::title" content="Proyecto">

  <!-- CSS -->
  <link rel="stylesheet" href="../CSS/estilos-comunes-2.css">

  <!-- Favicon -->
  <link rel="icon" href="../Image/icon.png" type="image/png">

  <!-- JavaScipt -->

  <!-- Titulo de Pagina -->
  <title>Intercambios de libros usados</title>

  <style>
    .box-titulo {
      height: 320px;
      width: 100%;
      box-sizing: border-box;
      text-align: center;
      background-image: url(https://png.pngtree.com/background/20230519/original/pngtree-stack-of-old-books-sitting-on-a-table-picture-image_2662639.jpg);
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
      grid-row: 3/5;
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
      height: 100%;
      width: 500px;
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

    .frase img {
      width: 100%;
      height: auto;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
      margin-top: 20px;
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

    .form-upload {
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


    .footer-content {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 30px;
      padding: 20px 20px;
      color: #fff;
      background: url(https://png.pngtree.com/background/20230519/original/pngtree-stack-of-old-books-sitting-on-a-table-picture-image_2662639.jpg);
      background-position: bottom;
      box-sizing: border-box;
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
    }

    .error {
      color: red;
      display: block;
    }

    textarea {
      min-height: 100px;
      max-height: 200px;
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


</head>

<main class="main">
  <div class="frase">
    <h3 class="frase-principal">¡Registra tu intercambio y comparte tu experiencia!</h3>
    
    <img src="https://img.freepik.com/fotos-premium/hombre-sienta-pila-libros-libro-su-regazo_853645-14105.jpg"
      alt="Una persona sentada sobre una pila de libros">
  </div>

  <div class="form-container">
    <form class="form-upload" id="formulario" method="POST" action="index.php?c=registrar_intercambio&f=insert" 
          enctype="multipart/form-data" onsubmit="return validarFormulario()">
      <h2 class="form-titulo">Registrar Intercambio</h2>

      <!-- Fecha de Intercambio -->
      <div class="form-input">
        <label for="fechaintercambio">Fecha de Intercambio</label>
        <input type="date" id="fechaintercambio" name="fechaintercambio" required>
        <span class="error" id="fechaintercambio-error"></span>
      </div>

      <!-- Fecha de Registro -->
      <div class="form-input">
        <label for="fecharegistro">Fecha de Registro</label>
        <input type="date" id="fecharegistro" name="fecharegistro" required>
        <span class="error" id="fecharegistro-error"></span>
      </div>

      <!-- Ubicacion -->
      <div class="form-input">
        <label for="ubicacion">Ubicación de Intercambio</label>
        <input type="text" id="ubicacion" name="ubicacion" required>
        <span class="error" id="ubicacion-error"></span>
      </div>

      <!-- Calificación -->
      <div class="form-input">
        <label for="calificacion">Calificación del Servicio (del 1 al 10)</label>
        <input type="number" id="calificacion" name="calificacion" required min="1" max="10">
        <span class="error" id="calificacion-error"></span>
      </div>

      <!-- Estado del Intercambio -->
      <div class="form-input">
        <label for="estado">Estado</label>
        <select id="estado" name="estado" required>
          <option value="">Seleccione un estado</option>
          <option value="pendiente">Pendiente</option>
          <option value="realizado">Realizado</option>
          <option value="cancelado">Cancelado</option>
        </select>
        <span class="error" id="estado-error"></span>
      </div>

      <!-- Método de Entrega -->
      <div class="form-input">
        <label for="metodo">Método de Entrega</label>
        <select id="metodo" name="metodo" required>
          <option value="">Seleccione un método</option>
          <option value="presencial">Presencial</option>
          <option value="envio">Envío</option>
        </select>
        <span class="error" id="metodo-error"></span>
      </div>

      <!-- Botón de envío -->
      <div class="form-input">
        <button type="submit" class="btn-submit">Añadir Intercambio</button>
      </div>
    </form>
  </div>
</main>

<script src="assets/JavaScript/Validaciones_subir_intercambio.js"></script>



</body>

</html>