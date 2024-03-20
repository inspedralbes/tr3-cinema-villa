<template>
    <div class="container mx-auto py-8 bg-blue-950">
            <!-- <div class="flex space-x-4 overflow-hidden">
                <div v-for="movie in movies" :key="movie.id_movie" class="flex-shrink-0">
                    <nuxt-link :to="{ name: 'movies-id', params: { id: movie.id_movie } }">
                        <div class="movie-card p-1 rounded-lg bg-white hover:shadow-white hover:shadow-lg transition duration-300 ease-in-out">
                            <img :src="movie.image" :alt="movie.title" class="w-24 h-auto rounded-lg">
                        </div>
                    </nuxt-link>
                </div>
            </div> -->
            

            <div id="indicators-carousel" class="relative w-full bg-blue-950" data-carousel="static">
                <!-- Carousel wrapper -->
                <div v-for="movie in movies" :key="movie.id_movie" class="relative h-56 overflow-hidden rounded-lg md:h-96 bg-blue-950">
                    <nuxt-link :to="{ name: 'movies-id', params: { id: movie.id_movie } }">
                        <div class="hidden duration-700 ease-in-out bg-blue-950" data-carousel-item="active">
                            <img :src="movie.image" :alt="movie.title" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                        </div>
                    </nuxt-link>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2 bg-blue-950">
                    <button v-for="movie in movies" :key="movie.id_movie" type="button" class="w-3 h-3 rounded-full" :aria-current="movie.id_movie == 0" :aria-label="`Slide ${movie.id_movie + 1}`" :data-carousel-slide-to="movie.id_movie"></button>
                </div>
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
    </div>
</template>

<script>
export default {
    props: {
        movies: Object
    },
    methods: {
        scrollLeft() {
            this.container.scrollLeft -= 200; 
        },
        scrollRight() {
            this.container.scrollLeft += 200; 
        }
    }
};
</script>

<style scoped>
    .movie-card {
        min-width: 100px; 
    }
</style>