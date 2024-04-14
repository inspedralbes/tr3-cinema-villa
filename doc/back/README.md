# API: JSON para comprar entradas
http://localhost:8000/api/entradas (POST)
{
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
}

# API: JSON para verificar email de cliente para 1 session
http://localhost:8000/api/entradas/validate (POST)
{
    "session_id": 1,
    "email": "cliente@example.com"
}

# API: JSON para buscar entradas de cliente con email 
http://localhost:8000/api/entradas/searchEmail (POST)
{
    "email": "cliente@example.com"
}

## Respuesta
[
  {
    "session_id": 1,
    "seat": "A-2",
    "price": "4.00",
    "email": "cliente@example.com",
    "first_name": "Juan",
    "last_name": "González",
    "phone_number": "123456789"
  },
  {
    "session_id": 1,
    "seat": "L-2-VIP",
    "price": "6.00",
    "email": "cliente@example.com",
    "first_name": "Juan",
    "last_name": "González",
    "phone_number": "123456789"
  },
  {
    "session_id": 2,
    "seat": "A-2",
    "price": "8.00",
    "email": "cliente@example.com",
    "first_name": "Juan",
    "last_name": "González",
    "phone_number": "123456789"
  },
  {
    "session_id": 2,
    "seat": "L-2-VIP",
    "price": "10.00",
    "email": "cliente@example.com",
    "first_name": "Juan",
    "last_name": "González",
    "phone_number": "123456789"
  }
]

# API: Respuesta verificar email
Se Puede Comprar
{
  "comprar": "True"
}
No Se Puede Comprar (porque ya compro entradas para esa session)
{
  "comprar": "False"
}

# API: JSON para buscar entradas de x session compradas por x email
http://localhost:8000/api/entradas/searchIdEmail (POST)
{
  "id": 1,
  "email": "cliente@example.com"
}

## Respuesta
[
  {
    "session_id": 1,
    "seat": "A-1",
    "price": "4.00",
    "email": "client1@gmail.com",
    "first_name": "Client",
    "last_name": "One",
    "phone_number": "123456789"
  },
  {
    "session_id": 1,
    "seat": "A-2",
    "price": "4.00",
    "email": "client1@gmail.com",
    "first_name": "Client",
    "last_name": "One",
    "phone_number": "123456789"
  },
  {
    "session_id": 1,
    "seat": "A-3",
    "price": "4.00",
    "email": "client1@gmail.com",
    "first_name": "Client",
    "last_name": "One",
    "phone_number": "123456789"
  },
  {
    "session_id": 1,
    "seat": "A-4",
    "price": "4.00",
    "email": "client1@gmail.com",
    "first_name": "Client",
    "last_name": "One",
    "phone_number": "123456789"
  }
]

# API: Respuesta para saber que asientos estan ocupados en una session 
http://localhost:8000/api/session/1/entradas (GET)
[
  "A-1",
  "A-10",
  "A-2",
  "A-3",
  "A-4",
  "A-5",
  "A-6",
  "A-7",
  "A-8",
  "A-9",
  "B-1-VIP",
  "K-3"
]

# API: JSON para crear sesiones 
http://localhost:8000/api/addSession (POST)
Tambien necesita el TOKEN de autenticación
audience price y vip son opcionales
{
    "day": "2024-05-15",
    "hour": "18:00",
    "movie_id": 2,
    "audienceDay": true,
    "priceBase": 6.50,
    "vip": true
}
## Respuesta
{
  "message": "NEW Session created successfully"
}

# API: JSON para crear peliculas
http://localhost:8000/api/addMovie (POST)
{
    "image": "https://example.com/movie_image.jpg",
    "title": "The Movie Title",
    "director": "John Doe",
    "actors": ["Actor 1", "Actor 2", "Actor 3"],
    "sinopsis": "A brief summary of the movie plot.",
    "duration": "120",
    "premiere": "2024-04-15",
    "genre": "Action",
    "classification": "PG-13"
}
## Respuesta
{
  "message": "Movie created successfully"
}

# API: JSON para actualizar sesiones
http://localhost:8000/api/updateSession (POST)
Tambien necesita el TOKEN de autenticación
{
    "id": 11,
    "day": "2024-08-23",
    "hour": "18:00",
    "movie_id": 2,
    "audienceDay": true,
    "priceBase": 17.50,
    "vip": true
}
## Respuesta
{
  "message": "Session updated successfully"
}

# API: JSON para actualizar peliculas
http://localhost:8000/api/updateMovie (POST)
{
    "id": 19,
    "image": "https://example.com/movie_image.jpg",
    "title": "The peli caca Title",
    "director": "John Dodasdasdasdae",
    "actors": ["Actor 1", "Actor 2", "Actor 3"],
    "sinopsis": "A laslaslalslalslalsldaq.",
    "duration": "120 minutos",
    "premiere": "2024-04-15",
    "genre": "Action",
    "classification": "PG-13"
}
## Respuesta
{
  "message": "Movie updated successfully"
}

# API: JSON para eliminar sesiones
http://localhost:8000/api/deleteSession/11 (GET)
Tambien necesita el TOKEN de autenticación
## Respuesta
{
  "message": "Session deleted successfully"
}

# API: JSON para eliminar peliculas
http://localhost:8000/api/deleteMovie/19 (GET)
Tambien necesita el TOKEN de autenticación
## Respuesta
{
  "message": "Movie deleted successfully"
}

# API: JSON para obtener todas las pelis sin sesiones
http://localhost:8000/api/moviesFree (GET)
## Respuesta
[
  {
    "id_movie": 2,
    "title": "Finding Nemo"
  },
  {
    "id_movie": 4,
    "title": "Monsters, Inc."
  },
  {
    "id_movie": 7,
    "title": "Frozen"
  },
  {
    "id_movie": 9,
    "title": "Zootopia"
  },
  {
    "id_movie": 10,
    "title": "Moana"
  },
  {
    "id_movie": 11,
    "title": "Toy Story 4"
  },
  {
    "id_movie": 13,
    "title": "Finding Dory"
  },
  {
    "id_movie": 15,
    "title": "Ratatouille"
  },
  {
    "id_movie": 18,
    "title": "Luca"
  }
]