# Test Task

## Стек
- PHP 8.2 (Laravel)
- MySQL
- Docker + Docker Compose

## Запуск

### Через Makefile (простіше)

```bash
make init

# Відкрий http://localhost:8080
```

### Без Makefile

```bash
cp app/.env.example app/.env
cd docker

docker-compose build
docker-compose up -d
docker-compose exec php composer i
docker-compose exec php php artisan key:generate
docker-compose exec php php artisan migrate

# Відкрийте http://localhost:8080
```

## Що реалізовано

1. **Головна сторінка:**
    - Форма реєстрації Username, Phone number, кнопка Register
    - При реєстрації генерується унікальний лінк на сторінку, дійсний 7 днів

2. **Сторінка гри (по лінку):**
    - Кнопка "Regenerate link" — новий токен (старий не працює)
    - Кнопка "Deactivate link" — деактивує лінк
    - Кнопка "I'm feeling lucky":
        - Генерує число 1-1000
        - Win якщо парне, Lose якщо непарне
        - Суму виграшу (якщо Win)
    - Кнопка "History" — останні 3 результати

## Makefile команди

```bash
make up       # підняти сервіси
make down     # зупинити сервіси
make bash     # зайти в контейнер php
make migrate  # запустити міграції
make key      # згенерувати app key
make composer # встановити залежності
```