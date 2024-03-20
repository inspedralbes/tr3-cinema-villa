export function getAllMovies() {
    return new Promise((resolve, reject) => {
        fetch('http://localhost:8000/api/movies')
            .then(response => {
                if (response.status == 200) {
                    return response.json();
                } else {
                    reject('Error al obtener las peliculas');
                }
            }).then(data => {
                JSON.stringify(data);
                resolve(data);
            }).catch(error => {
                reject(error);
            });
    });
}

export function getMovie(id) {
    return new Promise((resolve, reject) => {
        fetch(`http://localhost:8000/api/movie/${id}`)
            .then(response => {
                if (response.status == 200) {
                    return response.json();
                } else {
                    reject('Error al obtener la pelicula');
                }
            }).then(data => {
                JSON.stringify(data);
                resolve(data);
            }).catch(error => {
                reject(error);
            });
    });
}

export function getAllSessions() {
    return new Promise((resolve, reject) => {
        fetch('http://localhost:8000/api/sessions')
            .then(response => {
                if (response.status == 200) {
                    return response.json();
                } else {
                    reject('Error al obtener las funciones');
                }
            }).then(data => {
                JSON.stringify(data);
                resolve(data);
            }).catch(error => {
                reject(error);
            });
    });
}

export function getSessionByMovieId(id_movie) {
    return new Promise((resolve, reject) => {
        fetch(`http://localhost:8000/api/movie_session/${id_movie}`)
            .then(response => {
                if (response.status == 200) {
                    return response.json();
                } else {
                    reject('Error al obtener las funciones');
                }
            }).then(data => {
                JSON.stringify(data);
                resolve(data);
            }).catch(error => {
                reject(error);
            });
    });
}

export function getSession(id) {
    return new Promise((resolve, reject) => {
        fetch(`http://localhost:8000/api/session/${id}`)
            .then(response => {
                if (response.status == 200) {
                    return response.json();
                } else {
                    reject('Error al obtener la funcion');
                }
            }).then(data => {
                JSON.stringify(data);
                resolve(data);
            }).catch(error => {
                reject(error);
            });
    });
}