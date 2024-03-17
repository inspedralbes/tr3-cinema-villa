<template>
    <div>
        <!-- Verificar si movie.id está definido antes de renderizar el enlace -->
        <nuxt-link v-if="movie.id_movie" :to="{ name: 'movieDetails', params: { id_movie: movie.id_movie } }">
            <div
                class="movie-card p-2 rounded-lg bg-white hover:shadow-white hover:shadow-lg transition duration-300 ease-in-out">
                <img :src="movie.image" :alt="movie.title" class="mb-2 rounded-lg">
                <p class="p-2 text-center text-3xl font-semibold">{{ movie.title }}</p>
            </div>
        </nuxt-link>
        <!-- Si movie.id no está definido, mostrar un mensaje de error o manejarlo de alguna otra manera -->
        <p v-else>Error: ID de la película no definido</p>
    </div>
</template>

<script>
export default {
    props: {
        movie: Object
    },
    methods: {
    }
};
</script>