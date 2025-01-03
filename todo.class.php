<?php
include_once 'config.php';

class TaskManager extends db
{
    private $task_content;
    private $id;

    public function setId($id) { $this->id = $id; }
    public function setTaskContent($content) { $this->task_content = $content; }

    public function createTask() {
        try {
            $stmt = $this->connect()->prepare("INSERT INTO tasks (task_content) VALUES (:task_content)");
            $stmt->bindParam(":task_content", $this->task_content);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getAllTasks() {
        $stmt = $this->connect()->prepare("SELECT * FROM tasks");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteTask() {
        $stmt = $this->connect()->prepare("DELETE FROM tasks WHERE id = :id");
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return true;
    }
}
?>
