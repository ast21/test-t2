### test-t2

Выполнение тестового задания.
Задача находится в файле [task.md](./task.md).

### Требования

- php ^8.2
- composer ^2.0
- все расширения требуемые Laravel

### Установка

```bash
git clone git@github.com/ast21/test-t2.git && cd test-t2
composer install
```

### Запуск

```bash
php artisan farm:life
```
<img width="661" alt="image" src="https://github.com/user-attachments/assets/9fa08371-a34d-43e7-bbeb-1467f07d423c">

### Структура проекта

```
─── app
    ├── Console
    │   └── Commands
    │       └── FarmLife.php
    └── Farm
        ├── Abstracts
        │   └── ...
        ├── Data
        │   └── ...
        ├── Interfaces
        │   └── ...
        ├── Farm.php
        ├── Product.php
        ├── Chicken.php
        └── Cow.php
```
