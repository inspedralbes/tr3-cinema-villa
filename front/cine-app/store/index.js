import { defineStore } from 'pinia'

export const useAppStore = defineStore({
    id: 'appStore',
    state: () => {
        // Define tu estado aquí
        return {
            all_movies: [],
            all_sessions: [],
            movie: {},
            session: {}
        }
    },
    actions: {
        setAllMovies(movies) {
            this.all_movies = movies
        },
        setMovie(movie) {
            this.movie = movie
        },
        setAllSessions(sessions) {
            this.all_sessions = sessions
        },
        setSession(session) {
            this.session = session
        }
    }
})