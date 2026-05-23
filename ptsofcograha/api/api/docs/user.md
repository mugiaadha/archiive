# user api spec

## Register User
- Endpoint : POST /api/users

Request Body :
```json
{
  "username": "mugiaadha",
  "password": "Admin123",
  "name": "Mugia Adha Kusumah"
}
```

Response Body (success) :
```json
{
  "data": "OK"
}
```

Response Body (Failed) :
```json
{
  "errors": "Invalid"
}
```

## Login User
Endpoint : POST /api/auth/login
Request Body :
```json
{
  "username": "mugiaadha",
  "password": "Admin123"
}
```

Response Body (success) :
```json
{
  "data": {
    "token": "asdasd12",
    "expiredAt": 12312312
  }
}
```

## Get User
- Endpoint : GET /api/users/current
Request Header : 
- X-API-TOKEN : Token (mandatory)

- Response Body (success) :
```json
{
  "data": {
    "username": "mugiaadha",
    "name": "Mugia Adha Kusumah"
  }
}
```

Response Body (Failed, 401) :
```json
{
  "errors": "Unauthorized"
}
```

## Update User
- Endpoint : PATCH /api/users

Request Header :
X-API-TOKEN : Token (mandatory)

Request Body :
```json
{
  "username": "mugiaadha",
  "password": "Admin123"
}
```

Response Body (success) :
```json
{
  "data": {
    "token": "asdasd12",
    "expiredAt": 12312312
  }
}
```

## Logout User
- Endpoint : Delete /api/auth/logout

Request Header :
X-API-TOKEN : Token (mandatory)

Response Body (success) :
```json
{
  "data": "OK"
}
```