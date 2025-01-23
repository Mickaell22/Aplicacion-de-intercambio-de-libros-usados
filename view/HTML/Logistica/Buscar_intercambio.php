<!-- Autor: Troya Garzón Geancarlos -->
<body class="grid-container">
    <aside class="sidebar">
        <h2>Filtros de búsqueda</h2>

        <!-- Filtros de Búsqueda de Intercambio -->
        <h3>Intercambios</h3>
        <label for="fecha" class="opcion">
            <input type="checkbox" name="fecha" id="fecha" value="Fecha"> Fecha
        </label>
        <label for="metodo" class="opcion">
            <input type="checkbox" name="metodo" id="metodo" value="Metodo"> Método
        </label>
        <label for="idinter" class="opcion">
            <input type="checkbox" name="id" id="idinter" value="Id"> ID
        </label>
    </aside>

    <main class="main">
        <div class="search">
            <form action="index.php" method="GET" class="search-form">
                <input type="hidden" name="c" value="busqueda">
                <input type="hidden" name="f" value="index">
                <input type="text" name="q" class="search-input" placeholder="Busca tus intercambios..."
                    value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : ''; ?>">
                <button type="submit" class="search-button">Buscar</button>
            </form>
        </div>

        <?php if (empty($intercambios)): ?>
            <div class="no-results">
                <p>No se encontraron intercambios que coincidan con tu búsqueda.</p>
            </div>
        <?php else: ?>
            <?php foreach ($intercambios as $intercambio): ?>
                <div class="elemento">
                    <a href="             <?php echo htmlspecialchars($intercambio['id']); ?>">
                        <img src="<?php echo htmlspecialchars($intercambio['imagen']); ?>"
                            alt="<?php echo htmlspecialchars($intercambio['titulo']); ?>">
                    </a>
                    <h3><?php echo htmlspecialchars($intercambio['titulo']); ?></h3>
                    <p class="autor">por <?php echo htmlspecialchars($intercambio['autor']); ?></p>
                    <input type="button" class="Info-button" value="Información"
                        onclick="location.href='                 <?php echo htmlspecialchars($intercambio['id']); ?>'">
                    <input type="button" class="Comprar-button" value="Pedir">
                </div>
            <?php endforeach; ?>
        <?php endif; ?>


        <!-- Botón de envío -->
      <div class="form-input">
      <button type="button" class="admin-button" onclick="location.href='index.php?c=Intercambio_info&f=index'">
                    Detalles del Intercambio
      </button>
      </div>
        


    </main>
</body>

<style>
    .box-titulo {
        height: 320px;
        width: 100%;
        box-sizing: border-box;
        text-align: center;
        background-image: url(https://png.pngtree.com/thumb_back/fw800/background/20220504/pngtree-woman-in-bookstore-looking-for-book-bookstore-person-woman-photo-image_36345226.jpg);
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
        /* box-shadow: 10px 5px 37px -13px rgb(51, 51, 51, 0.74); */
        /* border-radius: 10px; */
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
        grid-column: 2/7;
        grid-row: 3/5;
        background-color: rgb(242, 242, 242);
        display: grid;
        grid-template-columns: repeat(4, 1fr);
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

    img {
        width: 200px;
        height: 200px;
    }

    h2 {
        margin-top: 25px;
        font-size: 1em;
        border-top: 7px solid #A65729;
        border-radius: 25px;
        background-color: #f2d7b6;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        text-shadow: 0px 0px 15px #fffa;
    }

    h3 {
        margin-top: 10px;
        text-align: left;
        margin-left: 15px;
        border-left: 7px solid #000A;
        padding-left: 5px;
    }

    .opcion {
        margin-top: 10px;
        margin-left: 40px;
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }



    /* :/ */
    .elemento {
        background-color: #fff;
        height: 500px;
        width: 250px;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    .elemento img {
        width: 100%;
        height: 300px;
        border-radius: 4px;
    }

    .elemento h3 {
        margin-top: 10px;
        text-align: center;
        margin-left: 0;
        border-left: none;
        padding-left: 0;
        font-size: 1.1em;
    }

    /* Barra busqueda */
    /* Estilos para el contenedor de búsqueda */
    .search {
        grid-column: 1 / -1;
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 20px;
        padding: 20px;
    }

    /* Estilos para el input de búsqueda */
    .search-input {
        width: 75%;
        padding: 12px 20px;
        border: 2px solid #ddda;
        border-radius: 25px;
        font-size: 16px;
        outline: none;
    }

    .search-input:focus {
        border-color: #2196F3;
        box-shadow: 0 0 8px rgba(33, 150, 243, 0.2);
    }

    /* Estilos para el botón de búsqueda */
    .search-button {
        padding: 12px 25px;
        background-color: #2196F3;
        color: #fffe;
        border: none;
        border-radius: 25px;
        font-size: 16px;
        cursor: pointer;
        font-weight: bold;
    }

    .search-button:hover {
        background-color: #1976D2;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3);
    }


    /* bOTONES */
    .button {
        margin-top: 20px;
        padding: 10px 25px;
        border: none;
        border-radius: 25px;
        font-weight: bold;
        cursor: pointer;
    }

    .Info.button {
        background: linear-gradient(#2196F3, #4CAF50);
        color: #fffe;
    }

    .Comprar.button {
        background: linear-gradient(#FF4081, #FF9800);
        color: white;
    }

    .button:hover {
        font-weight: bold;
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.3);
    }

    .admin-button {
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
      margin-left: 140px;
    }

    .btn-submit:hover {
      background-color: #2980b9;
    }

    .footer-content {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 30px;
        padding: 40px 20px;
        color: #fff;

        background-image: url(https://png.pngtree.com/thumb_back/fw800/background/20220504/pngtree-woman-in-bookstore-looking-for-book-bookstore-person-woman-photo-image_36345226.jpg);
        background-position: center;
        box-sizing: border-box;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
</style>