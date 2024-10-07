// Definimos las constantes para el tamaño del tablero y las piezas
const TABLERO_FILAS = 20;
const TABLERO_COLUMNAS = 10;
const PIEZA_TAMANO = 50;

// Creamos el tablero y las piezas
const tablero = document.querySelector('.tablero');
const piezaActual = document.querySelector('.pieza-actual');
const siguientePieza = document.querySelector('.siguiente-pieza');
const botonReiniciar = document.querySelector('.boton-reiniciar');

// Creamos un arreglo para almacenar el estado del tablero
let tableroEstado = new Array(TABLERO_FILAS).fill(0).map(() => new Array(TABLERO_COLUMNAS).fill(0));

// Creamos un arreglo para almacenar las piezas
const piezas = [
  // I
  [
    [1, 1, 1, 1]
  ],
  // J
  [
    [1, 0, 0],
    [1, 1, 1]
  ],
  // L
  [
    [0, 0, 1],
    [1, 1, 1]
  ],
  // O
  [
    [1, 1],
    [1, 1]
  ],
  // S
  [
    [0, 1, 1],
    [1, 1, 0]
  ],
  // T
  [
    [0, 1, 0],
    [1, 1, 1]
  ],
  // Z
  [
    [1, 1, 0],
    [0, 1, 1]
  ]
];

// Creamos una función para generar una nueva pieza
function generarPieza() {
  const indice = Math.floor(Math.random() * piezas.length);
  return piezas[indice];
}

// Creamos una función para dibujar la pieza actual
function dibujarPieza(pieza, x, y) {
  piezaActual.innerHTML = '';
  for (let i = 0; i < pieza.length; i++) {
    for (let j = 0; j < pieza[i].length; j++) {
      if (pieza[i][j] === 1) {
        const div = document.createElement('div');
        div.style.width = `${PIEZA_TAMANO}px`;
        div.style.height = `${PIEZA_TAMANO}px`;
        div.style.background = 'blue';
        div.style.position = 'absolute';
        div.style.top = `${y * PIEZA_TAMANO}px`;
        div.style.left = `${x * PIEZA_TAMANO}px`;
        piezaActual.appendChild(div);
      }
    }
  }
}

// Creamos una función para dibujar el tablero
function dibujarTablero() {
  tablero.innerHTML = '';
  for (let i = 0; i < TABLERO_FILAS; i++) {
    for (let j = 0; j < TABLERO_COLUMNAS; j++) {
      if (tableroEstado[i][j] === 1) {
        const div = document.createElement('div');
        div.style.width = `${PIEZA_TAMANO}px`;
        div.style.height = `${PIEZA_TAMANO}px`;
        div.style.background = 'blue';
        div.style.position = 'absolute';
        div.style.top = `${i * PIEZA_TAMANO}px`;
        div.style.left = `${j * PIEZA_TAMANO}px`;
        tablero.appendChild(div);
      }
    }
  }
}

// Creamos una función para actualizar el estado del tablero
function actualizarTablero(pieza, x, y) {
  for (let i = 0; i < pieza.length; i++) {
    for (let j = 0; j < pieza[i].length; j++) {
      if (pieza[i][j] === 1) {
        tableroEstado[y + i][x + j] = 1;
      }
    }
  }
}

// Creamos una función para comprobar si la pieza puede moverse
function puedeMoverse(pieza, x, y) {
  for (let i = 0; i < pieza.length; i++) {
    for (let j = 0; j < pieza[i].length; j++) {
      if (pieza[i][j] === 1) {
        if (x + j < 0 || x + j >= TABLERO_COLUMNAS || y + i < 0 || y + i >= TABLERO_FILAS) {
          return false;
        }
        if (tableroEstado[y + i][x + j] === 1) {
          return false;
        }
      }
    }
  }
  return true;
}

// Creamos una función para mover la pieza
function moverPieza(pieza, x, y) {
  if (puedeMoverse(pieza, x, y)) {
    actualizarTablero(pieza, x, y);
    dibujarTablero();
    dibujarPieza(pieza, x, y);
  }
}

// Creamos una función para rotar la pieza
function rotarPieza(pieza) {
  const nuevaPieza = [];
  for (let i = 0; i < pieza[0].length; i++) {
    nuevaPieza.push([]);
    for (let j = pieza.length - 1; j >= 0; j--) {
      nuevaPieza[i].push(pieza[j][i]);
    }
  }
  return nuevaPieza;
}

// Creamos una función para generar una nueva pieza y moverla al tablero
function generarNuevaPieza() {
  const pieza = generarPieza();
  const x = Math.floor(Math.random() * (TABLERO_COLUMNAS - pieza[0].length));
  const y = 0;
  dibujarPieza(pieza, x, y);
  return { pieza, x, y };
}

// Creamos una función para actualizar el juego
function actualizarJuego() {
  const { pieza, x, y } = generarNuevaPieza();
  moverPieza(pieza, x, y);
  setTimeout(actualizarJuego, 1000);
}

// Inicializamos el juego
actualizarJuego();