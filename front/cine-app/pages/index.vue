<template>
  <HeaderLanding />
  <div class="flex flex-wrap justify-center bg-blue-950">
    <MovieCard v-for="movie in movies" :key="movie.id_movie" :movie="movie" class="m-4 cursor-pointer"/>
  </div>
</template>

<script>
import { getAllMovies } from '~/services/communicationManager.js';

export default {
  components: {

  },
  data() {
    return {
      movies: [],
    };
  },
  methods: {
    
  },
  mounted() {
    // Llamada a la API para obtener las películas
    getAllMovies()
      .then((response) => {
        // response: title, image, id.
        this.movies = response;
        console.log(this.movies);
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