<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color:hsl(228, 29.80%, 62.50%);
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
            max-width: 600px;
            background-color:rgb(31, 51, 123);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2rem;
            color:rgb(255, 255, 255);
            margin-bottom: 30px;
            text-align: center;
        }

        input[type="text"], textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color:rgb(66, 144, 227);
            color: #ffffff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color:rgb(119, 127, 135);
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color:rgb(255, 255, 255);
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Create Task</h1>
        <form method="post" action="/create-task">
            <input type="text" name="title" placeholder="Task Title" required>
            <textarea name="description" placeholder="Task Description"></textarea>
            <button type="submit">Create Task</button>
        </form>
        <a href="/">Back to Home</a>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
