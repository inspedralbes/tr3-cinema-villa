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
  }
]

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