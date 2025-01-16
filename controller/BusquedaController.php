<?php
class BusquedaController {
    private $libros;
    
    public function __construct() {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: ' . URL_BASE . 'index.php');
            exit;
        }
        
        // Datos locales de libros usando IMG_PATH
        $this->libros = [
            // Académicos
            [
                'id' => 1,
                'imagen' => IMG_PATH . 'portadas/academicos/alg.jpg',
                'titulo' => 'Fundamentos de programación',
                'categoria' => 'Académicos'
            ],
            [
                'id' => 2,
                'imagen' => IMG_PATH . 'portadas/academicos/arq.jpg',
                'titulo' => 'Arquitectura moderna',
                'categoria' => 'Académicos'
            ],
            [
                'id' => 3,
                'imagen' => IMG_PATH . 'portadas/academicos/c.jpg',
                'titulo' => 'Lenguaje de programación C',
                'categoria' => 'Académicos'
            ],
            [
                'id' => 4,
                'imagen' => IMG_PATH . 'portadas/academicos/cabeza.jpg',
                'titulo' => 'Las vidas dentro de tu cabeza',
                'categoria' => 'Académicos'
            ],
            // ... Amor
            [
                'id' => 8,
                'imagen' => IMG_PATH . 'portadas/Amor/Como_Si_Fuera_Ayer.png',
                'titulo' => 'Como si fuera ayer',
                'categoria' => 'Amor'
            ],
            [
                'id' => 9,
                'imagen' => IMG_PATH . 'portadas/Amor/Cuando_Te_Conoci.png',
                'titulo' => 'Cuando te conocí',
                'categoria' => 'Amor'
            ],
            // ... Aventura
            [
                'id' => 13,
                'imagen' => IMG_PATH . 'portadas/aventura/faro.jpg',
                'titulo' => 'El faro del fin del mundo',
                'categoria' => 'Aventura'
            ],
            [
                'id' => 14,
                'imagen' => IMG_PATH . 'portadas/aventura/leguas.jpg',
                'titulo' => 'Veinte mil leguas de viaje submarino',
                'categoria' => 'Aventura'
            ]
        ];
    }
    
    public function index() {
        require_once SUB_HEADER;
        $libros = $this->libros;
        require_once BCATEGORIA;
        require_once FOOTER;
    }
}
?>