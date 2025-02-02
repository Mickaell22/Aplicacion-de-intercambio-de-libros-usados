<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Autor -->
    <meta name="author" content="Fernadez Nanande Jahir Bismark">

    <!-- Metadatos -->
    <meta name="description" content="Este es un proyecto de diseño de aplicaciones web diseñado por el grupo #5">
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

    <main class="main">
        <div class="search">
            <input type="text" class="search-input" placeholder="Busca tus chats...">
            <button class="search-button">Buscar</button>
        </div>

        <div class="chats-container">
            <?php
            $chats = [
                ['imagen' => 'assets/CSS/Image/portadas/academicos/alg.jpg', 'titulo' => 'Algebra', 'ultimo_mensaje' => 'Algebra...'],
                ['imagen' => 'assets/CSS/Image/portadas/academicos/arq.jpg', 'titulo' => 'Arquitectura', 'ultimo_mensaje' => 'Arquitectura...'],
            ];

            foreach ($chats as $chat): ?>
                <div class="chat">
                    <img src="<?php echo $chat['imagen']; ?>" alt="<?php echo $chat['titulo']; ?>">
                    <h3><?php echo $chat['titulo']; ?></h3>
                    <p><?php echo $chat['ultimo_mensaje']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <section class="section">
        <div class="chat-container">
            <div class="chat-header">
                <div class="chat-header-content">
                    <img src="assets/CSS/Image/portadas/academicos/alg.jpg" alt="" class="chat-header-img">
                    <h3>Chat - Algebra</h3>
                </div>
            </div>
            <div class="chat-messages">
                <div class="message sent">
                    <p>Aun tiene el libro disponible?</p>
                </div>
                <div class="message received">
                    <p>No :(</p>
                </div>
                <div class="message sent">
                    <p>Ta bien</p>
                </div>
            </div>
            <div class="chat-input">
                <input type="text" placeholder="Escribe aqui tu mensaje...">
                <button>Enviar</button>
            </div>
        </div>
    </section>

    <script>
        const chats = document.querySelectorAll('.chat');
        const chatContainer = document.querySelector('.chat-container');
        const chatHeader = document.querySelector('.chat-header');
        const chatMessages = document.querySelector('.chat-messages');

        chats.forEach(chat => {
            chat.addEventListener('click', function () {
                const chatTitle = this.querySelector('h3').textContent;
                const chatImage = this.querySelector('img').src;

                chatHeader.innerHTML = `
            <div class="chat-header-content">
                <img src="${chatImage}" alt="" class="chat-header-img">
                <h3>Chat - ${chatTitle}</h3>
            </div>
        `;

                chatMessages.innerHTML = '';
                chatContainer.scrollIntoView({ behavior: 'smooth' });

                chats.forEach(c => c.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>

</html>

<style>
        .box-titulo {
            height: 320px;
            width: 100%;
            box-sizing: border-box;
            text-align: center;
            background-image: url(https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgEQNyrRQAEAMRktHtrNnVhdAyNR8cHWCknFot6Q8hxCx0IiHojaaF7ODix06C7Ijej7FwChPYmHhyphenhyphenvM96nmSp8-IwLu02unlWDpMdPfWRJksv9ajarA4L6bp5iv_nijkQ5tpCwGRsP2oXT/s730/hablando.jpg);
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


        /* :( */
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
            grid-column: 1/7;
            grid-row: 3/5;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* 2 columnas para los chats */
            gap: 20px;
            padding: 20px;
        }

        .pie {
            grid-column: 1/7;
            grid-row: 6/7;
            background-color: rgb(217, 139, 72);
        }

        .section {
            grid-column: 2/6;
            grid-row: 5/6;
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


        /* Cjat */
        .chat {
            display: flex;
            align-items: center;
            gap: 1rem;
            border: 2px solid #000;
            border-radius: 25px;
            padding: 15px;
            background-color: #fff;
            cursor: pointer;
        }

        .chat:hover {
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);
        }

        /* Para el contenido del chat */
        .chat-content {
            flex: 1;
        }

        .chat-header-content {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .chat-header-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid white;
        }

        .chat img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        .chat h3 {
            margin: 0;
            font-size: 1.1em;
        }

        .chat p {
            margin: 5px 0 0;
            color: #666;
            font-size: 0.9em;
        }

        /* Estilos para el chat-libro */
        .chat-libro {
            padding: 10px 15px;
        }

        .chat-libro h3 {
            color: #333;
            margin-bottom: 10px;
            font-size: 1.2em;
        }

        .chat-libro p {
            color: #666;
            line-height: 1.6;
            font-size: 0.9em;
            text-align: justify;
        }

        /* Chat */
        .chat-container {
            display: flex;
            flex-direction: column;
            height: 400px;
            /* O el alto que prefieras */
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 20px 5px rgba(0, 0, 0, 0.5);
            border: 2px solid #fffa;
            margin-bottom: 20px;
        }

        /* Cabecera del chat */
        .chat-header {
            padding: 15px;
            background-color: #D98B48;
            color: white;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Área de mensajes */
        .chat-messages {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        /* Estilos para los mensajes */
        .message {
            max-width: 70%;
            padding: 10px 15px;
            border-radius: 15px;
            margin: 5px 0;
        }

        .message.sent {
            background-color: #D98B48;
            color: white;
            align-self: flex-end;
            border-bottom-right-radius: 5px;
        }

        .message.received {
            background-color: #e9ecef;
            color: black;
            align-self: flex-start;
            border-bottom-left-radius: 5px;
        }

        /* Área de entrada de mensaje */
        .chat-input {
            display: flex;
            padding: 15px;
            gap: 10px;
            background-color: #fff;
            border-top: 1px solid #eee;
        }

        .chat-input input {
            flex-grow: 1;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 20px;
            outline: none;
        }

        .chat-input button {
            padding: 10px 20px;
            background-color: #D98B48;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .chat-input button:hover {
            background-color: #c17a37;
        }

        /* Pie */
        .footer-content {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            padding: 20px 20px;
            color: #fff;
            background: url(https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgEQNyrRQAEAMRktHtrNnVhdAyNR8cHWCknFot6Q8hxCx0IiHojaaF7ODix06C7Ijej7FwChPYmHhyphenhyphenvM96nmSp8-IwLu02unlWDpMdPfWRJksv9ajarA4L6bp5iv_nijkQ5tpCwGRsP2oXT/s730/hablando.jpg);
            background-position: bottom;
            box-sizing: border-box;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
</style>