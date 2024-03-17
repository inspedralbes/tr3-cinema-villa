<template>
  <HeaderLanding />
  <div class="flex flex-wrap justify-center bg-blue-950">
    <MovieCard v-for="movie in movies" :key="movie.id" :movie="movie" class="m-4 cursor-pointer"/>
  </div>
</template>

<script>
import { getMoviesLanding } from '~/services/communicationManager.js';
import { useAppStore } from '~/store';

export default {
  components: {

  },
  data() {
    const store = useAppStore();

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