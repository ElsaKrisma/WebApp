<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: hsl(228, 29.8%, 62.5%);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            text-align: center;
        }

        h1 {
            font-size: 2rem;
            color: #000;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        label {
            font-size: 1rem;
            text-align: left;
            width: 100%;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: rgb(33, 69, 139);
            color: white;
            padding: 12px 25px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color:rgb(158, 175, 229);
        }

        a {
            text-decoration: none;
            color: #333;
            font-size: 1rem;
        }

        a button {
            background-color:rgb(244, 67, 54);
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        a button:hover {
            background-color: #e53935;
        }

        .logout {
            margin-top: 10px;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1><i class="fa-solid fa-user"></i> Profile Page</h1>

        <form method="post" action="/profile">
            <?= csrf_field() ?>

            <label for="name"><i class="fa-solid fa-user"></i> Name:</label>
            <input type="text" id="name" name="name" value="<?= esc($user['name']) ?>" required>
            <br>

            <label for="email"><i class="fa-solid fa-envelope"></i> Email:</label>
            <input type="email" id="email" name="email" value="<?= esc($user['email']) ?>" required>
            <br>

            <button type="submit"><i class="fa-solid fa-save"></i> Update Profile</button>
        </form>

        <a href="/"><button type="button"><i class="fa-solid fa-arrow-left"></i> Back</button></a>
        <div class="logout">
            <a href="/logout"><i class="fa-solid fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>

</body>
</html>
