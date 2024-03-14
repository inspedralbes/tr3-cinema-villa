<template>
  <HeaderLanding />
    <div class="bg-gray-100 min-h-screen flex flex-col items-center justify-center">
      <main class="flex flex-wrap justify-center items-start max-w-4xl">
        <div class="movie-card p-4 m-4 bg-white rounded-lg shadow-lg flex flex-col items-center">
          <img src="https://via.placeholder.com/200" alt="Película 1" class="w-48 h-64 object-cover rounded-lg mb-4">
          <h2 class="text-xl font-semibold mb-2">Título de la Película 1</h2>
          <p class="text-gray-600 mb-4">Sinopsis de la película 1</p>
          <a href="#" class="btn">Ver Detalles</a>
        </div>
        <div class="movie-card p-4 m-4 bg-white rounded-lg shadow-lg flex flex-col items-center">
          <img src="https://via.placeholder.com/200" alt="Película 2" class="w-48 h-64 object-cover rounded-lg mb-4">
          <h2 class="text-xl font-semibold mb-2">Título de la Película 2</h2>
          <p class="text-gray-600 mb-4">Sinopsis de la película 2</p>
          <a href="#" class="btn">Ver Detalles</a>
        </div>
        <!-- Agrega más películas según sea necesario -->
      </main>
    </div>
  </template>
  
  <script setup >
    import HeaderLanding from '~/components/headerLanding.vue';
  </script>
  
  <style scoped>
  /* Estilos de botón personalizados */
  .btn {
    padding: 0.5rem 1rem;
    background-color: #4caf50;
    color: white;
    text-decoration: none;
    border-radius: 0.25rem;
    transition: background-color 0.3s ease;
  }
  .btn:hover {
    background-color: #388e3c;
  }
  /* Estilos de tarjeta de película */
  .movie-card {
    max-width: 250px;
  }
  </style>
  