<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@latest/pace-theme-default.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: hsl(228, 29.8%, 62.5%);
            margin: 50px;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .profile-button {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 100px;
            height: 100px;
            cursor: pointer;
        }

        .profile-button img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #2c3531;
            transition: all 0.3s ease;
        }

        .profile-button img:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #000;
            margin-bottom: 30px;
            font-family: "Times New Roman", Times, serif;
        }

        .create-task-container {
            text-align: left;
            margin-top: 20px;
        }

        .create-task-link {
            display: inline-flex;
            align-items: center;
            text-decoration: none;
            font-size: 16px;
            color: #007BFF;
            background-color: #f8f9fa;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .create-task-link:hover {
            background-color: #e2e6ea;
        }

        .create-task-link i {
            margin-right: 8px;
        }

        form {
            margin-bottom: 15px;
            margin-top: 20px;
            display: flex;
            align-items: center;
        }

        input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            margin-right: 10px;
        }

        button {
            padding: 8px 12px;
            background-color: rgb(33, 69, 139);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: rgb(233, 233, 241);
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            width: 100%;
            max-width: 600px;
        }

        .task-container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .task-container li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .task-container li:last-child {
            border-bottom: none;
        }

        .task-container a {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .task-container a.edit {
            background-color: #007bff;
            color: #fff;
        }

        .task-container a.delete {
            background-color: #dc3545;
            color: #fff;
        }

        .task-container a.edit:hover {
            background-color: #0056b3;
        }

        .task-container a.delete:hover {
            background-color: #a71d2a;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="/profile" class="profile-button">
            <i class="fa-solid fa-user"></i>
        </a>

        <h1>YOUR NOTE</h1>
        <div class="create-task-container">
            <a href="/create-task" class="create-task-link">
                <i class="fas fa-plus"></i> Create Task
            </a>
        </div>

        <form method="get" action="/search">
            <input type="text" name="keyword" placeholder="Search tasks">
            <button type="submit">Search</button>
        </form>

        <?php if (empty($tasks)) : ?>
            <p>No tasks found.</p>
        <?php else : ?>
            <div class="task-container">
                <ul>
                    <?php foreach ($tasks as $task) : ?>
                        <li>
                            <div>
                                <span><?= $task['title'] ?></span>
                                <div class="pomodoro-timer" data-task-id="<?= $task['id'] ?>" data-duration="<?= $task['timer_duration'] ?>">
                                    <p id="time-<?= $task['id'] ?>"><?= gmdate("i:s", $task['timer_duration']) ?></p>
                                    <button class="start-btn" data-task-id="<?= $task['id'] ?>">Start</button>
                                    <button class="pause-btn" data-task-id="<?= $task['id'] ?>">Pause</button>
                                    <button class="reset-btn" data-task-id="<?= $task['id'] ?>">Reset</button>
                                    <button class="edit-btn" data-task-id="<?= $task['id'] ?>">Edit Timer</button>
                                </div>
                            </div>
                            <div>
                                <a href="/edit-task/<?= $task['id'] ?>" class="edit">Edit</a>
                                <a href="/delete-task/<?= $task['id'] ?>" class="delete" onclick="return confirmDelete(<?= $task['id'] ?>)">Delete</a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>

    <script>
        function confirmDelete(taskId) {
            return confirm("Are you sure you want to delete this task?");
        }

        document.querySelectorAll('.pomodoro-timer').forEach(timerContainer => {
            const taskId = timerContainer.dataset.taskId;
            let duration = parseInt(timerContainer.dataset.duration, 10);
            let interval;

            const timeDisplay = document.getElementById(`time-${taskId}`);
            const startBtn = timerContainer.querySelector(`.start-btn`);
            const pauseBtn = timerContainer.querySelector(`.pause-btn`);
            const resetBtn = timerContainer.querySelector(`.reset-btn`);
            const editBtn = timerContainer.querySelector(`.edit-btn`);

            function updateDisplay() {
                const minutes = Math.floor(duration / 60);
                const seconds = duration % 60;
                timeDisplay.innerText = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            }

            startBtn.addEventListener('click', () => {
                if (interval) return;
                interval = setInterval(() => {
                    if (duration > 0) {
                        duration--;
                        updateDisplay();
                    } else {
                        clearInterval(interval);
                        alert(`Task ${taskId} Pomodoro Completed!`);
                    }
                }, 1000);
            });

            pauseBtn.addEventListener('click', () => {
                clearInterval(interval);
                interval = null;
            });

            resetBtn.addEventListener('click', () => {
                clearInterval(interval);
                interval = null;
                duration = parseInt(timerContainer.dataset.duration, 10);
                updateDisplay();
            });

            editBtn.addEventListener('click', () => {
                const newDuration = prompt('Enter new timer duration in seconds:', duration);
                if (newDuration !== null && !isNaN(newDuration)) {
                    duration = parseInt(newDuration, 10);
                    updateDisplay();
                }
            });

            updateDisplay();
        });
    </script>
</body>

</html>
