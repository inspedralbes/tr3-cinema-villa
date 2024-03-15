<template>
  <HeaderLanding />
  <div class="flex flex-wrap justify-center">
    <div v-for="movie in movies" :key="movie.id" class="m-4 cursor-pointer" @click="verDetalle(movie.id)">
      <img :src="movie.image" :alt="movie.title" class="mb-2">
      <p class="text-center">{{ movie.title }}</p>
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