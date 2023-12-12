<!DOCTYPE html>
<html>
<head>
    <title>Lotería Mexicana</title>
    <style>
        body {
            background-image: url('loteria/img/Loteriabackground.jpg'); 
            background-size: cover; 
            background-attachment: fixed; /* Evita que la imagen de fondo se desplace al hacer scroll */
            background-repeat: no-repeat; /* Evita que la imagen de fondo se repita */
            background-color: rgba(0, 0, 0, 0.10); 
        }

        /* Estilos para la ventana modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            background-color: white;
            width: 300px;
            margin: 100px auto;
            padding: 20px;
            text-align: center;
        }

        /* Estilos para los input y botón */
        .input-box {
            margin-bottom: 20px;
            font-size: 18px;
        }

        .custom-button {
            background-color: red;
            color: white;
            border: none;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin-bottom: 20px;
            cursor: pointer;
        }

        /* Estilos para la tabla de cartas */
        table {
            margin: 0 auto; /* Centra la tabla horizontalmente */
            margin-top: 20px;
        }

        td {
            text-align: center;
            padding: 15px;
        }

        img {
            max-width: 150px;
            max-height: 150px;
        }

        /* Contenedor principal */
        .container {
            text-align: center;
        }

        h1 {
            font-size: 36px;
        }

        /* Estilos para la sección de la carta al azar */
        .carta-azar {
            text-align: center;
            margin-top: 20px;
        }

        .otra-carta-button {
            background-color: #FFFFFF;
            color: white;
            border: none;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 20px;
            margin-top: 20px;
            cursor: pointer;
        }

        .column {
            display: inline-block;
            margin-right: 10px;
        }

        .file {
            padding: 5px 10px;
            font-size: 16px;
        }

        /* Estilos para el nombre de la carta en la tabla */
        .nombre-carta {
            display: none;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h1 style="font-size: 36px; font-family: 'Arial', sans-serif; color: #000000">Lotería mexicana</h1>
        <button class="custom-button btn-primary" onclick="mostrarCartaAzar()">Cantar carta aleatoria</button> 
        <div class="carta-azar">
        <img src="" alt="" id="cartaAzarImg" width="" height="">
        
        <br>
        <audio id="audioCarta" controls>
            <source src="" type="audio/mp3">
            Tu navegador no soporta el elemento de audio.
        </audio>
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content" id="modalContent">
            <!-- Aquí se mostrará la carta seleccionada -->
        </div>
    </div>
        
    
    </div>

    <table>
        <?php
        // Array de nombres de las cartas
        $cartas = [
            "El Nopal", "La Mano", "La Bandera", "El Gorrito",
            "La Luna", "La Dama", "La Escalera", "El Barril",
            "El Pescado", "El Gallo", "El Tambor", "La Chalupa",
            "El Valiente", "El Catrin", "La Pera", "La Muerte",
            "El Melon", "El Diablito", "El Bandolón", "El Violoncello",
            "El Sol", "La Palma", "La Botella", "La Corona",
            "El Cotorro", "El Arbol"
        ];
        //4 filas x 4 columnas =16
        
        
        // Baraja el array para obtener un orden aleatorio de las cartas
        shuffle($cartas);
        $cartasConImagenes = [
            "El Gallo" => "img/gallo.jpg",
            "El Diablito" => "img/diablo.jpg",
            "La Dama" => "img/dama.jpg",
            "El Catrin" => "img/catrin.jpg",
            "La Escalera" => "img/escalera.jpg",
            "La Botella" => "img/botella.jpg",
            "El Barril" => "img/barril.jpg",
            "El Arbol" => "img/arbol.jpg",
            "El Melon" => "img/melon.jpg",
            "El Valiente" => "img/valiente.jpg",
            "El Gorrito" => "img/gorrito.jpg",
            "La Muerte" => "img/muerte.jpg",
            "La Pera" => "img/pera.jpg",
            "La Bandera" => "img/bandera.jpg",
            "El Bandolón" => "img/bandolon.jpg",
            "El Violoncello" => "img/violoncello.jpg",
            "El Sol" => "img/sol.jpg",
            "La Luna" => "img/luna.jpg",
            "La Mano" => "img/mano.jpg",
            "El Pescado" => "img/pescado.jpg",
            "El Cotorro" => "img/cotorro.jpg",
            "La Palma" => "img/palma.jpg",
            "La Corona" => "img/corona.jpg",
            "La Chalupa" => "img/chalupa.jpg",
            "El Tambor" => "img/tambor.jpg",
            "El Nopal" => "img/nopal.jpg"
        ];
        
        
        

        $contador = 0;
        for ($fila = 0; $fila < 4; $fila++) {
            echo "<tr>";
            for ($columna = 0; $columna < 4; $columna++) {
                $carta = $cartas[$contador];
                $imagen = $cartasConImagenes[$carta]; // sirve para obtener la ruta de la imagen correspondiente

                echo "<td style='text-align: center; padding: 10px;' onmouseover='mostrarNombreCarta(this)' onmouseout='ocultarNombreCarta(this)'>";
                echo "<img src='$imagen' alt='$carta' width='' height=''>"; // Muestra la imagen correspondiente
                echo "<p class='nombre-carta'>$carta</p>";
                echo "</td>";
                $contador++;
            }
            echo "</tr>";
        }
        ?>
    </table>

    <div style="text-align: center;">
<div class="input-box">
            <label for="fila" class="column">Fila:</label>
            <select id="fila" class="file">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <label for="columna" class="column">Columna:</label>
            <select id="columna" class="file">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </div>
        <div style="text-align: center;">
    <button class="custom-button" onclick="mostrarCarta()">Mostrar Carta</button>
    <button class="custom-button" onclick="mezclarCartas()">Mezclar</button>


   
    <script>
        // lleva un registro de las cartas mezcladas y sus rutas de imagen
        var cartasMezcladas = <?php echo json_encode($cartas); ?>;
        var cartasConImagenes = <?php echo json_encode($cartasConImagenes); ?>;
        var audioPlayer = document.getElementById("audioCarta");
     
        function mostrarCarta() {
            const fila = parseInt(document.getElementById('fila').value);
            const columna = parseInt(document.getElementById('columna').value);
            const indice = (fila - 1) * 4 + (columna - 1);

            if (indice >= 0 && indice < cartasMezcladas.length) {
                const carta = cartasMezcladas[indice];
                const imagen = cartasConImagenes[carta];
                const modal = document.getElementById('myModal');
                const modalContent = document.getElementById('modalContent');
                modalContent.innerHTML = `
                    <p>Fila: ${fila}, Columna: ${columna}</p>
                    <p>Carta seleccionada: ${carta}</p>
                    <img src='${imagen}' alt='${carta}' width='' height=''>`;
                modal.style.display = 'block';

                const audioSrc = `audios/${carta}.mp3`;
                audioPlayer.src = audioSrc;
                audioPlayer.load();
                audioPlayer.play();
            } else {
                alert('Fila o columna fuera de rango');
            }
        }

        function mostrarCartaAzar() {
            const cartaAzar = cartasMezcladas[Math.floor(Math.random() * cartasMezcladas.length)];
            const imagenAzar = cartasConImagenes[cartaAzar];
            const cartaAzarImg = document.getElementById('cartaAzarImg');
            cartaAzarImg.src = imagenAzar;
            const audioSrc = `audios/${cartaAzar}.mp3`;
            audioPlayer.src = audioSrc;
            audioPlayer.load();
            audioPlayer.play();
        }

        function mostrarNombreCarta(elemento) {
            const nombreCarta = elemento.querySelector('.nombre-carta');
            nombreCarta.style.display = 'block';
        }

        function ocultarNombreCarta(elemento) {
            const nombreCarta = elemento.querySelector('.nombre-carta');
            nombreCarta.style.display = 'none';
        }

        function mezclarCartas1() {
            // Baraja el array de cartas nuevamente
            cartasMezcladas.sort(() => Math.random() - 0.5);
        }

        function mezclarCartas() {
            // Mezcla las cartas
            mezclarCartas1();

            // Recarga la página para mostrar las cartas barajadas
            location.reload();
        }

        window.onclick = function(event) {
            const modal = document.getElementById('myModal');
            if (event.target == modal) {
                modal.style.display = 'none';
                audioPlayer.pause();
                audioPlayer.currentTime = 0;
            }
        }
    </script>
    <br><br><br>
</body>
</html>
