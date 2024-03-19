import { defineStore } from 'pinia'

export const useAppStore = defineStore({
    id: 'appStore',
    state: () => {
        // Define tu estado aquí
        return {
            all_movies: [],
            movie: {},
        }
    },
    getters: {
        getAllMovies() {
            return this.all_movies
        },
        getMovie() {
            return this.movie
        }
    },
    actions: {
        setAllMovies(movies) {
            this.all_movies = movies
        },
        setMovie(movie) {
            this.movie = movie
        }
    },
    // Define tus getters, mutations, acciones aquí
})