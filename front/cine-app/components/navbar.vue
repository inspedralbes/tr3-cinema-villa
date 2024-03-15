<template>
    <nav class="bg-gray-800 py-4">
      <div class="container mx-auto flex justify-between items-center">
        <!-- Nombre del cine a la izquierda -->
        <h1 class="text-white text-2xl font-semibold">CineVilla</h1>
        
        <!-- Botón para toggle de menú en dispositivos móviles -->
        <button @click="toggleMenu" class="block lg:hidden text-white focus:outline-none">
          <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
            <path v-if="!showMenu" fill-rule="evenodd" clip-rule="evenodd" d="M3 5h18v2H3V5zm18 4H3v2h18V9zm0 6H3v2h18v-2z"/>
            <path v-else fill-rule="evenodd" clip-rule="evenodd" d="M12 5c1.1046 0 2 .89543 2 2v10c0 1.1046-.8954 2-2 2s-2-.8954-2-2V7c0-1.10457.8954-2 2-2zM4 5c1.1046 0 2 .89543 2 2v10c0 1.1046-.8954 2-2 2s-2-.8954-2-2V7c0-1.10457.8954-2 2-2zm14 0c1.1046 0 2 .89543 2 2v10c0 1.1046-.8954 2-2 2s-2-.8954-2-2V7c0-1.10457.8954-2 2-2z"/>
          </svg>
        </button>
        
        <!-- Secciones a la derecha -->
        <div :class="menuClasses">
          <a href="/" class="text-white block mt-4 lg:inline-block lg:mt-0 mr-4">Cartelera</a>
          <a href="#" class="text-white block mt-4 lg:inline-block lg:mt-0 mr-4">Sesiones</a>
          <!-- Agrega más secciones según sea necesario -->
        </div>
      </div>
    </nav>
  </template>
  
  <script>
  export default {
    data() {
      return {
        showMenu: false
      }
    },
    methods: {
      toggleMenu() {
        this.showMenu = !this.showMenu;
      }
    },
    computed: {
      menuClasses() {
        return {
          'hidden': !this.showMenu,
          'lg:flex': true,
          'flex-row': true, // Cambio a disposición horizontal
          'items-center': true,
          'w-full': true,
          'lg:w-auto': true,
          'text-center': true
        };
      }
    }
  }
  </script>
  
  <style scoped>
  /* Estilos personalizados */
  /* Ajuste de margen inferior para el botón de menú en dispositivos móviles */
  nav button {
    margin-bottom: -0.125rem;
  }
  /* Estilos de enlace */
  nav a {
    transition: color 0.3s ease;
  }
  nav a:hover {
    color: #ffd700; /* Cambiar color al pasar el cursor */
  }
  </style>
  