const url = 'http://localhost:8000/api';
// const url = 'http://tr3.cinemavilla.a22betvilver.daw.inspedralbes.cat/laravel/public/api'; //producción

export function getAllMovies() {
    return new Promise((resolve, reject) => {
        fetch(`${url}/movies`)
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
        fetch(`${url}/movie/${id}`)
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
        fetch(`${url}/sessions`)
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
        fetch(`${url}/movie_session/${id_movie}`)
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
        fetch(`${url}/session/${id}`)
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

export function getOccupiedSeats(id) {
    return new Promise((resolve, reject) => {
        fetch(`${url}/session/${id}/entradas`)
            .then(response => {
                if (response.status == 200) {
                    return response.json();
                } else {
                    reject('Error al obtener los asientos ocupados');
                }
            }).then(data => {
                JSON.stringify(data);
                resolve(data);
            }).catch(error => {
                reject(error);
            });
    });
}

export function postBuyEntradas (data) {
    return new Promise((resolve, reject) => {
        fetch(`${url}/entradas`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(response => {
            if (response.status == 200) {
                return response.json();
            } else {
                reject('Error al comprar las entradas: ' + response.statusText);
            }
        }).then(data => {
            JSON.stringify(data);
            resolve(data);
        }).catch(error => {
            reject(error);
        });
    });
}