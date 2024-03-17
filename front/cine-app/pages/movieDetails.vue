<!-- <template>
    <div>
        <h2>About Page, cinemaVilla</h2>
    </div>
</template>

<script setup>

</script>

<style scoped>

</style> -->

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
export default {
    data() {
        return {
            movie: {}
        };
    },
    async mounted() {
        // Obtener el ID de la película de los parámetros de ruta
        const id_movie = this.$route.params.id_movie;

        // Aquí puedes hacer una solicitud para obtener los detalles de la película
        // Supongamos que tienes una función llamada getMovieDetails() que obtiene los detalles de la película por su ID
        try {
            const movieDetails = await this.getMovieDetails(id_movie);
            this.movie = movieDetails;
        } catch (error) {
            console.error('Error al obtener detalles de la película:', error);
        }
    },
    methods: {
        async getMovieDetails(id_movie) {
            // Aquí iría tu lógica para obtener los detalles de la película, por ejemplo, una solicitud HTTP a una API
            // Debes implementar esta función según tu estructura de datos y cómo obtienes los detalles de la película
            // Por ejemplo:
            // const response = await this.$axios.get(`/api/peliculas/${id_movie}`);
            // return response.data;
            // O si tienes los detalles de la película en un array o base de datos local:
            // return movies.find(movie => movie.id === id_movie);
            // Esto es solo un ejemplo de cómo podrías obtener los detalles de la película
        }
    }
};
</script>