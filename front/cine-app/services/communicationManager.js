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

//cambiar para hacerlo con seats pasados por parametro
export function postBuyEntradas () {
    return new Promise((resolve, reject) => {
        fetch(`${url}/entradas`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                "session_id": 1,
                "cliente": {
                    "email": "cliente@example.com",
                    "first_name": "Juan",
                    "last_name": "González",
                    "phone_number": "123456789"
                },
                "seats": [
                    "A-1",
                    "A-2",
                    "A-3",
                    "A-4",
                    "A-5",
                    "A-6",
                    "A-7",
                    "F-8-VIP"
                ]
            })
        }).then(response => {
            if (response.status == 200) {
                return response.json();
            } else {
                reject('Error al comprar las entradas');
            }
        }).then(data => {
            JSON.stringify(data);
            resolve(data);
        }).catch(error => {
            reject(error);
        });
    });
}