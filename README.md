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

Запустите команду `artisan`
```bash
php artisan farm:life
```

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
