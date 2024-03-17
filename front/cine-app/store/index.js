import { defineStore } from 'pinia'

export const useAppStore = defineStore({
    id: 'appStore',
    state: () => {
        // Define tu estado aquí
        return {
            movies: [],
        }
    },
    getters: {
        // Define tus getters aquí
    },
    actions: {
        setMovies(movies) {
            this.movies = movies
        }
    },
    // Define tus getters, mutations, acciones aquí
})