# Laravel
OpalGlow Laravel Web Project
# Salon & Spa Management API (Laravel)

## 📌 Project Overview

This project is a **RESTful API built using Laravel** for managing a Salon/Spa system.
It supports **service management** and **appointment scheduling**, including validation, pagination, and clean JSON responses.

---

## 🎯 System Purpose

The API handles:

* Service catalog management
* Appointment scheduling
* Therapist & customer linkage (via IDs)
* Status tracking (Booked, Cancelled, Completed)

---

## 🛠️ Technologies Used

* Laravel (PHP Framework)
* MySQL Database
* Postman (API Testing)
* Composer

---

## 📂 API Endpoints

### 🔹 Service API

| Method | Endpoint             | Description        |
| ------ | -------------------- | ------------------ |
| GET    | `/api/services`      | Get all services   |
| POST   | `/api/services`      | Create new service |
| PUT    | `/api/services/{id}` | Update service     |
| DELETE | `/api/services/{id}` | Delete service     |

---

### 🔹 Appointment API

| Method | Endpoint                 | Description                      |
| ------ | ------------------------ | -------------------------------- |
| GET    | `/api/appointments`      | Get all appointments (paginated) |
| POST   | `/api/appointments`      | Create appointment               |
| PUT    | `/api/appointments/{id}` | Update appointment               |
| DELETE | `/api/appointments/{id}` | Delete appointment               |

---

## 📦 Sample Request (POST Appointment)

```json
{
  "customer_id": 1,
  "therapist_id": 2,
  "service_id": 1,
  "start_datetime": "2026-04-27 15:30:00",
  "end_datetime": "2026-04-27 16:30:00",
  "status": "Booked",
  "notes": "Client prefers evening session"
}
```

---

## ✅ Validation Rules

* `customer_id`, `therapist_id`, `service_id` → required integers
* `start_datetime`, `end_datetime` → valid datetime
* `end_datetime` must be after `start_datetime`
* `status` must be one of:

  * Booked
  * Cancelled
  * Completed

---

## 🔄 Pagination

Appointments are paginated:

```
GET /api/appointments?page=1
```

Optional filtering:

```
GET /api/appointments?status=Booked
```

---

## 📤 Response Format

### ✅ Success Response

```json
{
  "status": "success",
  "message": "Operation successful",
  "data": {}
}
```

### ❌ Error Response

```json
{
  "message": "The selected status is invalid.",
  "errors": {
    "status": [
      "The selected status is invalid."
    ]
  }
}
```

---

## 🚀 How to Run the Project

1. Clone the repository
2. Install dependencies:

   ```bash
   composer install
   ```
3. Configure `.env` file (database settings)
4. Run migrations:

   ```bash
   php artisan migrate
   ```
5. Start server:

   ```bash
   php artisan serve
   ```

---

## 🧪 Testing

* Use **Postman**
* Add header:

  ```
  Accept: application/json
  ```
* Test all endpoints (CRUD operations)

---

## 🧠 Key Features

* RESTful API design
* Data validation and integrity enforcement
* Pagination for performance
* Clean and structured JSON responses
* Scalable architecture (ready for frontend integration)

---

## ⚠️ Notes

* Custom primary keys used (`service_id`, `appointment_id`)
* Table names follow project-specific naming (`service`, `appointment`)
* Designed to integrate with frontend (AJAX / Laravel Blade / Mobile App)

---

## 👨‍💻 Author

Developed as part of **Web Technologies & Security Assignment (ICT 2213Y)**

---

## 🎯 Conclusion

This API demonstrates a **complete backend system** for managing salon operations, following best practices in:

* API design
* validation
* database interaction
* and testing

---
