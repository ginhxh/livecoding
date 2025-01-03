<?php
include_once 'config.php';

class tasks extends db
{
    private $task_content ;
    private $id;
   
    function setId($id)
    {
        $this->id = $id;
    }
    function setTask_content($task_content)
    {
        $this->task_content = $task_content;
    }
   

    public function add()
    {
        try {
            $stmt = $this->connect()->prepare("INSERT INTO tasks(task_content) VALUES(:task_content)");
            $stmt->bindparam(":task_content", $this->task_content);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function getAllTasks()
    {
        $stmt = $this->connect()->prepare("SELECT*FROM tasks");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
                <li class="py-4 px-4 flex justify-between items-center bg-gray-50 rounded-md shadow mb-2">
                    <p><?php print($row['task_content']); ?></p>
                    <form method="post" action="" class="ml-4">
                        <button
                        name="delete_btn"
                            type="submit"
                            value= <?php print($row['id']); ?>
                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition focus:outline-none focus:ring-2 focus:ring-red-400">
                            Delete
                        </button>
                    </form>
                </li>
<?php
            }
        } else {
            echo "<h1> There is no task </h1>";
        }
    }

    public function remove(){
        $stmt = $this->connect()->prepare("DELETE FROM tasks WHERE id=:id");
        $stmt->bindparam(":id",$this->id);
        $stmt->execute();
        return true;
    }
}



?>