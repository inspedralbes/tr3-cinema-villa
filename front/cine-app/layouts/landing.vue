<template>
  <HeaderLanding />
  <div class="flex flex-wrap justify-center bg-gray-100">
    <div v-for="movie in movies" :key="movie.id" class="m-4 cursor-pointer" @click="verDetalle(movie.id)">
      <div class="movie-card p-2 rounded-lg shadow-lg bg-white hover:shadow-2xl transition duration-300 ease-in-out">
        <img :src="movie.image" :alt="movie.title" class="mb-2 rounded-lg">
        <p class="p-2 text-center text-3xl font-semibold">{{ movie.title }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import HeaderLanding from '~/components/headerLanding.vue';
import { getMoviesLanding } from '~/services/communicationManager.js';

export default {
  components: {
    HeaderLanding,
  },
  data() {
    const store = "";

    return {
      movies: [],
    };
  },
  methods: {

  },
  mounted() {
    // Llamada a la API para obtener las películas
    getMoviesLanding()
      .then((response) => {
        // response: title, image, id.
        this.movies = response;
      })
      .catch((error) => {
        console.error(error);
      });
  },
  created() {

  },

  computed: {

  }
};

</script>

<style scoped>

</style>