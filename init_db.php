<?php
try {
    $db = new PDO('sqlite:db.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Створити таблицю
    $db->exec("CREATE TABLE IF NOT EXISTS products (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        price INTEGER NOT NULL
    )");

    // Додати записи
    $db->exec("INSERT INTO products (name, price) VALUES
        ('Телефон', 8000),
        ('Навушники', 1500),
        ('Зарядний пристрій', 500),
        ('Чохол', 300),
        ('Павербанк', 1200)
    ");

    echo "База даних ініціалізована.";
} catch (PDOException $e) {
    echo "Помилка: " . $e->getMessage();
}
