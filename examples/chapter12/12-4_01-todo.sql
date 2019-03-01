CREATE TABLE todo_list (
    todo_list_id INT NOT NULL PRIMARY KEY,
    todo_list_name VARCHAR(255),
    todo_list_deadline DATE
);

CREATE TABLE list_item (
    list_item_id INT NOT NULL PRIMARY KEY,
    list_item_title VARCHAR(255),
    list_item_desc TEXT,
    list_item_done DATETIME,
    todo_list_id INT NOT NULL,
    FOREIGN KEY (todo_list_id) REFERENCES todo_list(todo_list_id)
);