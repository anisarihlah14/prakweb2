# Inventory API Documentation v1

Base URL

http://127.0.0.1:8000/api/v1

---

## Register User

### Endpoint

POST /register

### Request Body

```json
{
  "name": "Anisa",
  "email": "anisa@gmail.com",
  "password": "password",
  "password_confirmation": "password"
}
```

### Success Response

```json
{
  "success": true,
  "message": "User berhasil didaftarkan"
}
```

---

## Login

### Endpoint

POST /login

### Request Body

```json
{
  "email": "anisa@gmail.com",
  "password": "password"
}
```

### Success Response

```json
{
  "success": true,
  "token": "xxxxx"
}
```

---

## Get All Categories

### Endpoint

GET /categories

### Header

Authorization: Bearer {token}

### Success Response

```json
{
  "success": true,
  "data": []
}
```

---

## Create Category

### Endpoint

POST /categories

### Header

Authorization: Bearer {token}

### Request Body

```json
{
  "name": "Elektronik"
}
```

---

## Get All Items

### Endpoint

GET /items

### Header

Authorization: Bearer {token}

### Success Response

```json
{
  "success": true,
  "data": []
}
```

---

## Create Item

### Endpoint

POST /items

### Header

Authorization: Bearer {token}

### Request Body

```json
{
  "name": "Laptop",
  "price": 5000000,
  "category_id": 1
}
```

---

## Get Item By ID

### Endpoint

GET /items/{id}

### Header

Authorization: Bearer {token}

---

## Update Item

### Endpoint

PUT /items/{id}

### Header

Authorization: Bearer {token}

---

## Delete Item

### Endpoint

DELETE /items/{id}

### Header

Authorization: Bearer {token}
