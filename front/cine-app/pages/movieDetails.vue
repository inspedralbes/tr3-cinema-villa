<template>
    <div class="container mx-auto py-8">
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
            <img :src="movie.image" alt="Poster de la película" class="w-full h-auto">
            <div class="p-6">
                <h1 class="text-2xl font-bold mb-4">{{ movie.title }}</h1>
                <div class="mb-4">
                    <p><strong>Director:</strong> {{ movie.director }}</p>
                    <p><strong>Actores:</strong> {{ movie.actors }}</p>
                    <p><strong>Género:</strong> {{ movie.genre }}</p>
                    <p><strong>Clasificación:</strong> {{ movie.classification }}</p>
                </div>
                <div class="mb-4">
                    <p class="font-semibold">Sinopsis:</p>
                    <p>{{ movie.sinopsis }}</p>
                </div>
                <div class="flex justify-between">
                    <p><strong>Duración:</strong> {{ movie.duration }}</p>
                    <p><strong>Fecha de Estreno:</strong> {{ movie.premiere }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { getMovie } from '~/services/communicationManager.js';
import { useAppStore } from '~/store';

export default {
    components: {

    },
    data() {
        const store = useAppStore();

        return {
            movie: {},
        };
    },
    methods: {

    },
    mounted() {
        if (this.$route.params.id_movie) {
            // Llamada a la API para obtener las películas
            getMovie(this.$route.params.id_movie)
                .then((response) => {
                    this.movie = response;
                    store.setMovie(response);
                })
                .catch((error) => {
                    console.error(error);
            });
        } else {
            console.error("El parámetro id_movie está indefinido");
        }
    },
    created() {

    },

    computed: {

    }
};
</script>