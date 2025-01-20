<div class="admin-container">
  <div class="admin-header">
    <h1>Gestión de Denuncias</h1>
  </div>

  <div class="filtros-container">
    <div class="search-filter">
      <input type="text" id="searchInput" placeholder="Buscar por título de libro..." class="search-input">
    </div>

    <div class="select-filters">
      <select id="tipoFilter" class="filter-select">
        <option value="">Tipo de Denuncia</option>
        <option value="acoso">Acoso</option>
        <option value="fraude">Fraude</option>
        <option value="discriminacion">Discriminación</option>
        <option value="contenido_inapropiado">Contenido inapropiado</option>
        <option value="derechos_autor">Derechos de autor</option>
        <option value="publicidad_engañosa">Publicidad engañosa</option>
        <option value="informacion_falsa">Información falsa</option>
        <option value="otros">Otros</option>
      </select>

      <select id="estadoFilter" class="filter-select">
        <option value="">Estado</option>
        <option value="pendiente">Pendiente</option>
        <option value="resuelto">Resuelto</option>
        <option value="descartado">Descartado</option>
      </select>
    </div>
  </div>

  <?php if (empty($denuncias)): ?>
    <p class="no-results">No hay denuncias para mostrar.</p>
  <?php else: ?>
    <table class="admin-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Libro</th>
          <th>Usuario</th>
          <th>Tipo</th>
          <th>Fecha Incidente</th>
          <th>Estado</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($denuncias as $denuncia): ?>
          <tr>
            <td><?php echo $denuncia['id']; ?></td>
            <td><?php echo html_entity_decode($denuncia['libro_titulo']); ?></td>
            <td><?php echo $denuncia['usuario_nombre']; ?></td>
            <td><?php echo $denuncia['tipo']; ?></td>
            <td><?php echo $denuncia['fecha_incidente']; ?></td>
            <td>
              <span class="estado-badge <?php echo $denuncia['estado']; ?>">
                <?php echo ucfirst($denuncia['estado']); ?>
              </span>
            </td>
            <td class="acciones">
              <a href="index.php?c=denuncia&f=ver&id=<?php echo $denuncia['id']; ?>" class="btn-ver">Ver Detalles</a>
              <?php if ($denuncia['estado'] === 'pendiente'): ?>
                <a href="index.php?c=denuncia&f=resolver&id=<?php echo $denuncia['id']; ?>"
                  onclick="return confirm('¿Está seguro de marcar esta denuncia como resuelta?')"
                  class="btn-aprobar">Resolver</a>
                <a href="index.php?c=denuncia&f=descartar&id=<?php echo $denuncia['id']; ?>"
                  onclick="return confirm('¿Está seguro de descartar esta denuncia?')" class="btn-rechazar">Descartar</a>
              <?php endif; ?>
              <a href="index.php?c=denuncia&f=editar&id=<?php echo $denuncia['id']; ?>" class="btn-ver">Editar</a>
              <a href="index.php?c=denuncia&f=eliminar&id=<?php echo $denuncia['id']; ?>" class="btn-rechazar"
                onclick="return confirm('¿Está seguro de eliminar esta denuncia?')">Eliminar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const tipoFilter = document.getElementById('tipoFilter');
    const estadoFilter = document.getElementById('estadoFilter');
    const rows = document.querySelectorAll('.admin-table tbody tr');

    function filterTable() {
      const searchTerm = searchInput.value.toLowerCase();
      const tipoValue = tipoFilter.value.toLowerCase();
      const estadoValue = estadoFilter.value.toLowerCase();

      rows.forEach(row => {
        const libro = row.cells[1].textContent.toLowerCase();
        const tipo = row.cells[3].textContent.toLowerCase();
        const estado = row.cells[5].textContent.toLowerCase();

        const matchesSearch = libro.includes(searchTerm);
        const matchesTipo = tipoValue === '' || tipo === tipoValue;
        const matchesEstado = estadoValue === '' || estado === estadoValue;

        if (matchesSearch && matchesTipo && matchesEstado) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    }

    searchInput.addEventListener('input', filterTable);
    tipoFilter.addEventListener('change', filterTable);
    estadoFilter.addEventListener('change', filterTable);
  });
</script>

<style>
  .filtros-container {
    margin: 20px 0;
    padding: 20px;
    background: white;
    border-radius: 15px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
  }

  .search-filter {
    flex: 1;
  }

  .search-input {
    width: 100%;
    padding: 12px 20px;
    border: 2px solid #e0e0e0;
    border-radius: 25px;
    font-size: 1em;
    transition: all 0.3s ease;
  }

  .search-input:focus {
    border-color: #4b6cb7;
    box-shadow: 0 0 0 3px rgba(75, 108, 183, 0.1);
    outline: none;
  }

  .select-filters {
    display: flex;
    gap: 15px;
  }

  .filter-select {
    padding: 12px 20px;
    border: 2px solid #e0e0e0;
    border-radius: 25px;
    font-size: 1em;
    background: white;
    min-width: 200px;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  .filter-select:focus {
    border-color: #4b6cb7;
    box-shadow: 0 0 0 3px rgba(75, 108, 183, 0.1);
    outline: none;
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


  .admin-container {
    padding: 40px;
    background: linear-gradient(145deg, #f0f0f0, #ffffff);
    border-radius: 25px;
    box-shadow: 20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff;
    margin: 30px auto;
    max-width: 1400px;
  }

  .admin-header {
    display: flex;
    align-items: center;
    margin-bottom: 40px;
  }

  .admin-header h1 {
    font-size: 2.5em;
    background: linear-gradient(45deg, #1a1a1a, #4a4a4a);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    text-transform: uppercase;
    letter-spacing: 2px;
  }

  .admin-table {
    width: 100%;
    border-spacing: 0 15px;
    border-collapse: separate;
    margin-top: 25px;
  }

  .admin-table th {
    padding: 20px;
    text-align: left;
    color: #808080;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-bottom: 2px solid #e0e0e0;
  }

  .admin-table td {
    padding: 20px;
    background: white;
    position: relative;
  }

  .admin-table tr td:first-child {
    border-radius: 15px 0 0 15px;
  }

  .admin-table tr td:last-child {
    border-radius: 0 15px 15px 0;
  }

  .admin-table tr {
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  }


  .estado-badge {
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.85em;
    text-transform: uppercase;
    letter-spacing: 1px;
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

  .acciones {
    display: flex;
    gap: 10px;
  }

  .btn-ver,
  .btn-aprobar,
  .btn-rechazar {
    padding: 10px 20px;
    border-radius: 25px;
    font-weight: 500;
    text-decoration: none;
    border: none;
    text-transform: uppercase;
    font-size: 0.8em;
    letter-spacing: 1px;
  }

  .btn-ver {
    background: linear-gradient(135deg, #4b6cb7, #182848);
    color: white;
  }

  .btn-aprobar {
    background: linear-gradient(135deg, #11998e, #38ef7d);
    color: white;
  }

  .btn-rechazar {
    background: linear-gradient(135deg, #cb2d3e, #ef473a);
    color: white;
  }

  /* Estilos para el mensaje de no resultados */
  .no-results {
    text-align: center;
    padding: 60px 20px;
    font-size: 1.2em;
    color: #808080;
    background: white;
    border-radius: 15px;
    margin-top: 20px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  }
</style>