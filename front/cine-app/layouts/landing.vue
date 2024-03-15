<template>
  <HeaderLanding />
    
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