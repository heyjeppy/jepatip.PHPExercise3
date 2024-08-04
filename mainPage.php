<?php 
session_start();
include "dbConnection.php";

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {

    function Add($newTask) {
        $newTask = $_POST['inputTask'];

        if(empty($newTask)){
            echo 'No task input';
        }else {
            $sql = "INSERT INTO tasks(task) VALUE(?)"
            $stmt = $host->prepare($sql);
            $res = $stmt->execute([$newTask]);
    
            if($res){
                echo 'added';  
            }else {
                echo 'failed to add';
            }
            $host = null;
            exit();
        }
    }

    function Remove() {
        $sql = "DELETE FROM tasks(task) VALUE(?)"
        $stmt = $host->prepare($sql);
        $res = $stmt->execute([$newTask]);

        if($res){
            echo 'added';  
        }else {
            echo 'failed to add';
        }
        $host = null;
        exit();
    }

 ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="mainPage_design.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <title>Main Page</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <section class="vh-100 bg-dark">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-12 col-xl-10">

            <div class="card mask-custom bg-white rounded w-75">
            <div class="card-body p-4 text-black">

                <div class="text-center pt-3 pb-2">
                <img src="<?php echo $_SESSION['img_url']; ?>"
                    alt="Check" width="60">
                <h2 class="my-2"><?php echo $_SESSION['name']; ?></h2>
                </div> <br>

                <form class="add-items d-flex justify-content-center mb-4" action="mainPage.php" method="POST"> 
                    <input type="text" class="form-control w-50 todo-list-input" name="inputTask" placeholder="What do you need to do today?"> 
                    <button type="submit" class="add btn btn-primary font-weight-bold ms-1 todo-list-add-btn" name="addTask">Add</button> 
                </form>
                        

                <table class="table text-white mb-0">
                <thead>
                    <tr>
                    <th scope="col">Task</th>
                    <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="fw-normal">
                    <td class="align-middle">
                        <span><?php echo $_SESSION['task']; ?></span>
                    </td>
                    <td class="align-middle">
                        <button class="bg-success" type="button"><i class="fa fa-check" aria-hidden="true"></i></button>
                       <button class="bg-danger" name='remove' type="button"><i class="fa fa-trash" aria-hidden="true"></i></button>
                    </td>
                    </tr>
                </tbody>
                </table>


            </di>
            </div>

        </div>
        </div>
    </div>
    </section>


</body>
</html>

<?php 
}else{
     header("Location: loginForm.php");
     exit();
}
 ?>