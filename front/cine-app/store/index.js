import { defineStore } from 'pinia'

export const useAppStore = defineStore({
    id: 'appStore',
    state: () => {
        // Define tu estado aquí
        return {
            all_movies: [],
            all_sessions: [],
            movie: {},
            session: {},
            id_movie: Number,
            id_session: Number,
            selectedSeats: [],
            occupiedSeats: [],
            //session
            client: {}
        }
    },
    actions: {
        setAllMovies(movies) {
            this.all_movies = movies
        },
        setMovie(movie) {
            this.movie = movie
        },
        setMovieId(id) {
            this.id_movie = id
        },
        setAllSessions(sessions) {
            this.all_sessions = sessions
        },
        setSession(session) {
            this.session = session
        },
        setSessionId(id) {
            this.id_session = id
        },
        setSelectedSeats(seats) {
            this.selectedSeats = seats
        },
        setOccupiedSeats(seats) {
            this.occupiedSeats = seats
        }
    }
})