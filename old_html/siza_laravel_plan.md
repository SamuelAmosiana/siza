# SIZA – Laravel Enterprise Build Plan

## Stack Decision

| Layer | Technology | Rationale |
|---|---|---|
| **Backend** | PHP 8.2 + Laravel 11 | Mature MVC, Eloquent ORM, built-in auth scaffolding |
| **Templating** | Blade | SSR-first for low-bandwidth users; no JS required for core pages |
| **Interactivity** | Vue 3 (via Inertia.js) | Reactive components (search, filters, live apply form) without full SPA overhead |
| **Styling** | Tailwind CSS v3 | Utility-first, small bundle, optimised for performance |
| **Database** | MySQL (XAMPP) | Relational, suits institution/programme/application relationships |
| **Auth** | Laravel Breeze (Inertia + Vue) | Lightweight, ships with login/register/forgot-password |

> **Why Vue over React?**  
> Laravel's first-party starter kits have better Vue + Inertia tooling. Inertia removes the need for a separate API layer — controllers return page props directly.

---

## Project Architecture

```
siza/                          ← Laravel root (replaces old HTML)
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php
│   │   ├── UniversityController.php
│   │   ├── ProgrammeController.php
│   │   └── ApplicationController.php
│   └── Models/
│       ├── University.php
│       ├── Programme.php
│       ├── Application.php
│       └── User.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── js/
│   │   ├── Pages/
│   │   │   ├── Home.vue
│   │   │   ├── Universities/Index.vue
│   │   │   ├── Universities/Show.vue
│   │   │   ├── Programmes/Index.vue
│   │   │   └── Apply/Create.vue
│   │   └── Components/
│   │       ├── Navbar.vue
│   │       ├── ProgrammeCard.vue
│   │       ├── UniversityCard.vue
│   │       └── SearchFilter.vue
│   └── views/
│       └── app.blade.php      ← Inertia root template
├── routes/web.php
└── ...
```

---

## Database Schema

### `universities`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| name | varchar(255) | |
| slug | varchar(255) | unique |
| type | enum | public / private |
| location | varchar(255) | city |
| description | text | |
| logo | varchar(255) | path |
| website | varchar(255) | |
| phone | varchar(50) | |
| email | varchar(255) | |
| established_year | year | |
| is_active | boolean | default true |
| timestamps | | |

### `programmes`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| university_id | FK → universities | |
| name | varchar(255) | |
| slug | varchar(255) | |
| level | enum | certificate / diploma / bachelor / master / doctorate |
| faculty | varchar(255) | |
| duration_years | tinyint | |
| tuition_fee | decimal(10,2) | nullable |
| description | text | |
| requirements | text | |
| is_active | boolean | |
| timestamps | | |

### `applications`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| user_id | FK → users nullable | guest allowed |
| programme_id | FK → programmes | |
| university_id | FK → universities | |
| full_name | varchar(255) | |
| email | varchar(255) | |
| phone | varchar(50) | |
| nationality | varchar(100) | |
| message | text | |
| status | enum | pending / reviewed / accepted / rejected |
| timestamps | | |

---

## Build Phases

### Phase 1 – Laravel Scaffold (Current)
- [x] Inventory existing HTML
- [ ] Create Laravel 11 project in `c:\xampp\htdocs\siza`
- [ ] Configure `.env` (MySQL, APP_URL)
- [ ] Install Breeze + Inertia + Vue 3
- [ ] Run migrations

### Phase 2 – Models, Migrations & Seeders
- [ ] University model + migration
- [ ] Programme model + migration
- [ ] Application model + migration
- [ ] Seeders with real Zambian universities & programmes

### Phase 3 – Controllers & Routes
- [ ] HomeController
- [ ] UniversityController (index, show)
- [ ] ProgrammeController (index, show, filter)
- [ ] ApplicationController (create, store)

### Phase 4 – Vue Pages & Components
- [ ] Layout + Navbar
- [ ] Home page (hero, stats, featured unis)
- [ ] Universities index + show
- [ ] Programmes index with live search/filter
- [ ] Apply form with validation

### Phase 5 – Admin Panel
- [ ] Middleware-gated `/admin` routes
- [ ] CRUD for universities & programmes
- [ ] Application review dashboard

### Phase 6 – Polish
- [ ] Tailwind design system (green/dark palette matching SIZA brand)
- [ ] SEO meta tags
- [ ] Low-bandwidth optimisations
