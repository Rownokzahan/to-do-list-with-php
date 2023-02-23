<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootsrap icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- daisyui CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header class="lg:mx-[10%] flex justify-between items-center pt-16 pb-8">
        <h1 class="text-center text-2xl font-semibold uppercase text-white">To Do List</h1>
        <label for="insert-modal" class="h-fit bg-[#8e40ee] px-5 py-[6px] text-white font-semibold rounded-xl shadow-md">+
            New Task</label>
    </header>

    <main class="lg:mx-[10%] relative pb-5">
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Attachment</th>
                        <th>Start Time</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once __DIR__ . "./connect.php";
                    $query = "SELECT * FROM tasks ORDER BY id";
                    $statement = $pdo->query($query);
                    $tasks = $statement->fetchAll(PDO::FETCH_OBJ);

                    foreach ($tasks as $task) :
                    ?>
                        <tr class="hover">
                            <th>1</th>
                            <td><?php echo $task->name; ?></td>
                            <td><img src="https://picsum.photos/seed/picsum/200/300" class="w-12 h-12 rounded" alt=""></td>
                            <td><?php echo $task->start_time; ?></td>
                            <td><?php echo $task->deadline; ?></td>
                            <td><?php echo $task->status; ?></td>
                            <td>
                                <label for="update-modal" onclick="updateTask(<?= $task->id; ?>)" class="bi bi-pencil-square mr-8 text-[#8e40ee] text-xl"></label>
                            </td>
                            <td>
                                <button onclick="deleteTask(<?= $task->id; ?>)" class="bi bi bi-trash mr-4 text-red-500 text-xl"></button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer class="text-center mt-16">
        © copyright <?php echo "hi"; ?> by Rownok, all right reserved
    </footer>

    <!-- Put this part before </body> tag -->
    <!-- Insert Modal -->
    <input type="checkbox" id="insert-modal" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box relative">
            <div class="flex justify-between mb-4">
                <h5 class="text-xl font-semibold">Create New Task</h5>
                <label for="insert-modal" class="btn btn-sm btn-circle">✕</label>
            </div>
            <!-- Insert Form -->
            <form action="./insert.php" method="POST">
                <div class="form-control w-full mb-4">
                    <label class="label">
                        <span class="label-text">Name</span>
                    </label>
                    <input type="text" name="name" placeholder="Task Name" class="input input-bordered w-full" />
                </div>
                <div class="form-control w-full mb-4">
                    <label class="label">
                        <span class="label-text">Deadline</span>
                    </label>
                    <input type="date" name="deadline" class="input input-bordered w-full" />
                </div>
                <div class="form-control w-full mb-4">
                    <label class="label">
                        <span class="label-text">Status</span>
                    </label>
                    <select name="status" class="select select-bordered flex-1">
                        <option disabled selected>Status</option>
                        <option>In Progress</option>
                        <option>Complete</option>
                        <option>Incomplete</option>
                    </select>
                </div>
                <div class="form-control w-full mb-4">
                    <label class="label">
                        <span class="label-text">Attachment</span>
                    </label>
                    <input type="file" class="file-input file-input-bordered w-full" />
                </div>
                <button type="submit" class="bg-[#8e40ee] px-5 py-[6px] text-white font-semibold rounded shadow-md block ml-auto">Create</button>
            </form>
        </div>
    </div>

    <!-- Update Modal -->
    <input type="checkbox" id="update-modal" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box relative">
            <div class="flex justify-between mb-4">
                <h5 class="text-xl font-semibold">Update Task</h5>
                <label for="update-modal" class="btn btn-sm btn-circle">✕</label>
            </div>
            <!-- Update Form -->
            <form action="./update.php" method="POST">
                <div class="form-control w-full mb-4">
                    <label class="label">
                        <span class="label-text">Name</span>
                    </label>
                    <input type="text" name="name" placeholder="Task Name" class="input input-bordered w-full" />
                </div>
                <div class="form-control w-full mb-4">
                    <label class="label">
                        <span class="label-text">Deadline</span>
                    </label>
                    <input type="date" name="deadline" class="input input-bordered w-full" />
                </div>
                <div class="form-control w-full mb-4">
                    <label class="label">
                        <span class="label-text">Status</span>
                    </label>
                    <select name="status" class="select select-bordered flex-1">
                        <option disabled selected>Status</option>
                        <option>In Progress</option>
                        <option>Complete</option>
                        <option>Incomplete</option>
                    </select>
                </div>
                <div class="form-control w-full mb-4">
                    <label class="label">
                        <span class="label-text">Attachment</span>
                    </label>
                    <input type="file" class="file-input file-input-bordered w-full" />
                </div>
                <button type="submit" class="bg-[#8e40ee] px-5 py-[6px] text-white font-semibold rounded shadow-md block ml-auto">Update</button>
            </form>
        </div>
    </div>
</body>

</html>