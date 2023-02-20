<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <!-- bootsrap icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- tailwindcss CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#e3e9ff] md:p-[10%] lg:px-[20%] grid">
    <header class="bg-[#af7eeb] p-4">
        <h1 class="text-white text-center text-2xl font-bold">Daily To Do List</h1>
    </header>
    <main>
        <div class="bg-white text-slate-600 mt-10 pb-8 p-4 md:p-16 relative">
            <ul>
                <?php
                require_once __DIR__ . "./connect.php";
                $query = "SELECT * FROM tasks ORDER BY id";
                $statement = $pdo->query($query);
                $tasks = $statement->fetchAll(PDO::FETCH_OBJ);

                foreach ($tasks as $task) :
                ?>
                    <li class="mb-4 flex">
                        <div class="flex flex-1">
                            <i class="bi bi-circle text-[#af7eeb]"></i>
                            <p class="ml-4">
                                <?php echo $task->task; ?>
                            </p>
                        </div>
                        <button class="ml-4 bi bi-pencil-square" onclick="updateTask(<?= $task->id; ?>)"></button>
                        <button class="hidden ml-4 bi bi-trash remove-icon" onclick="deleteTask(<?= $task->id; ?>)"></button>
                    </li>
                <?php endforeach; ?>
            </ul>
            <button id="new-task-btn" class="bg-[#af7eeb] px-5 py-3 text-white font-semibold rounded-2xl shadow-md absolute bottom-[-16px] left-1/2 -translate-x-1/2">+
                New Task</button>
        </div>

        <form action="./insert.php" method="POST" id="add-form" class="hidden bg-white text-slate-600 mt-10 shadow-md">
            <div class="flex justify-between">
                <textarea class="p-2 focus:outline-none border w-full" name="task" rows="1" placeholder="Write a task..."></textarea>
                <button type="submit" class="bg-[#af7eeb] px-4 text-white">Add</button>
            </div>
        </form>

        <form action="./update.php" method="POST" id="update-form" class="hidden bg-white text-slate-600 mt-10 shadow-md">
            <div class="flex justify-between">
                <textarea class="p-2 focus:outline-none border w-full" name="task" rows="1" placeholder="Write a task..."></textarea>
                <input type="hidden" name="id">
                <button class="bg-[#af7eeb] px-4 text-white">Update</button>
            </div>
        </form>
    </main>

    <footer>

    </footer>

    <script src="./js/script.js"></script>
</body>

</html>