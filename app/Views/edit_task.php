<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
</head>
<style>
    /* Reset default margin and padding */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Set background color and font family */
body {
    background-color: hsl(228, 29.8%, 62.5%);
    font-family: 'Arial', sans-serif;
    color: #333;
}

/* Style the form container */
form {
    width: 100%;
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

/* Style the header */
h1 {
    font-size: 24px;
    margin-top: 20px;
    margin-bottom: 20px;
    color: #000;
    text-align: center;
}

/* Style input text field */
input[type="text"], textarea {
    width: 100%;
    padding: 12px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
}

/* Textarea customization */
textarea {
    resize: vertical;
    height: 150px;
}

/* Button style */
button {
    padding: 12px 20px;
    background-color:rgb(33, 69, 139);
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
    margin-top: 10px;
}

button:hover {
    background-color:rgb(138, 161, 224);
}

/* Link styling */
a {
    display: block;
    margin-top: 20px;
    text-decoration: none;
    color:rgb(25, 40, 80);
    text-align: center;
    font-size: 16px;
    text-align: center;
}

a:hover {
    text-decoration: underline;
}

/* Center the link */
form a {
    text-align: center;
}

</style>
<body>
    <h1>Edit Task</h1>
<form method="post" action="/edit-task/<?= $task['id'] ?>">
    <input type="text" name="title" value="<?= $task['title'] ?>" required>
    <textarea name="description"><?= $task['description'] ?></textarea>
    <button type="submit">Update Task</button>
</form>
<a href="/">Back to Home</a>

</body>
</html>