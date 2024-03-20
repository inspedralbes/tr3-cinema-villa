<template>
    <HeaderMovie v-show="showMovie" :movie="movie" />
    <MoviesCarousel class="p-4 pb-8" v-show="showMovie" :movies="movies" />

    <div v-show="showMovie" class="p-8 flex bg-blue-950">
        <img :src="movie.image" alt="Poster de la película" class="w-65 h-80">
        <div class="bg-gray-900 text-slate-50 rounded-lg m-7 p-3">
            <h1 class="text-2xl font-bold mb-4">{{ movie.title }}</h1>
            <div class="mb-4">
                <p><strong>Director:</strong> {{ movie.director }}</p>
                <div><strong>Actores:</strong>
                    <ul>
                        <li v-for="actor in actors" :key="actor"> {{ actor }} </li>
                    </ul>
                </div>
                <p><strong>Género:</strong> {{ movie.genre }}</p>
                <p><strong>Clasificación:</strong> {{ movie.classification }}</p>
            </div>
            <div class="mb-4">
                <p class="font-semibold">Sinopsis:</p>
                <p>{{ movie.sinopsis }}</p>
            </div>
            <!-- <div class="flex justify-between mb-4">
                <p><strong>Duración:</strong> {{ movie.duration }}</p>
                <p><strong>Fecha de Estreno:</strong> {{ movie.premiere }}</p>
            </div> -->
        </div>
    </div>
    <div v-if="showMovie == false" class="flex items-center justify-center h-screen">
        <div class="loader ease-linear rounded-full border-4 border-t-4 border-gray-200 h-12 w-12"></div>
    </div>
</template>

<script>
import { getMovie, getAllMovies } from '~/services/communicationManager.js';
import { useAppStore } from '~/store';

export default {
    components: {

    },
    data() {
        return {
            movies: [],
            movie: {},
            actors: [],
            showMovie: false
        };
    },
    methods: {

    },
    mounted() {
        if (this.$route.params.id != undefined) {
            // Obtener el store
            const store = useAppStore();            
            // Llamada a la API para obtener las películas
            getMovie(this.$route.params.id).then((response) => {
                // Guardar la película en el store
                this.movie = response;
                store.setMovie(response);
                // Guardar los actores
                this.actors = JSON.parse(response.actors);
                // Guardar todas las películas y si no buscarlas otra vez
                this.movies = store.all_movies;
                if (this.movies.length == 0) {
                    getAllMovies().then((response) => {
                        this.movies = response;
                        store.setAllMovies(response);
                    }).catch((error) => {
                        console.error(error);
                    });
                } 
                // Mostrar la película
                this.showMovie = true;
            }).catch((error) => {
                console.error(error);
            });
        } else {
            console.error("El parámetro id no está definido");
        }
    },
    created() {

    },

    computed: {

    }
};
</script>

<style scoped>
@keyframes loader {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

.loader {
    border-top-color: #3498db;
    animation: loader 1.5s linear infinite;
}
</style>