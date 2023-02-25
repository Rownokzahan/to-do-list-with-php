const deleteTask = (id) => {
    // window.location.href = `./delete.php?id=${id}`;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            window.location.reload();
        }
    };
    xhttp.open("POST", "delete.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id=" + id);
}

const getTask = (id) => {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const task = JSON.parse(this.responseText);
            console.log(task.attachment);

            const updateForm = document.querySelector('#update-form');
            updateForm.querySelector("[name = 'id']").value = task.id;
            updateForm.querySelector("[name = 'name']").value = task.name;
            updateForm.querySelector("[name = 'deadline']").value = task.deadline;
            updateForm.querySelector("[name = 'status']").value = task.status;
        }
    };
    xhttp.open("POST", "get_task.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id=" + id);
}
