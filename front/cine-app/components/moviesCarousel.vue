<template>
    <div class="container mx-auto py-8">
        <div class="flex overflow-x-auto space-x-4">
            <div v-for="movie in movies" :key="movie.id_movie" class="flex-shrink-0">
                <nuxt-link :to="{ name: 'movies-id', params: { id: movie.id_movie } }">
                <div class="movie-card p-2 rounded-lg bg-white hover:shadow-white hover:shadow-lg transition duration-300 ease-in-out">
                    <img :src="movie.image" :alt="movie.title" class="mb-2 rounded-lg">
                    <p class="p-2 text-center text-3xl font-semibold">{{ movie.title }}</p>
                </div>
                </nuxt-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    setup () {
        

        return {}
    }
}
</script>

<style scoped>

</style>