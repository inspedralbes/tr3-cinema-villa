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