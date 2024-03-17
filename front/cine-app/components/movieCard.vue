<template>
    <div class="movie-card p-2 rounded-lg bg-white hover:shadow-white hover:shadow-lg transition duration-300 ease-in-out"
        @click="showDetailsMovie(movie.id)">
        <img :src="movie.image" :alt="movie.title" class="mb-2 rounded-lg">
        <p class="p-2 text-center text-3xl font-semibold">{{ movie.title }}</p>
    </div>
</template>

<script>
export default {
    props: {
        movie: Object
    },
    methods: {
        showDetailsMovie(id) {
            this.$router.push(`/detalle/${id}`);
        }
    }
};
</script>