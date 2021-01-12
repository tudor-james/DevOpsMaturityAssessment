<?php
include __DIR__ . '/../settings.php';
$user = DB_USER;
$password = DB_PASSWORD;
$database = DB_NAME;
$table = "todo_list";
$dbhost = DB_HOST;

try {
  $db = new PDO("mysql:host=$dbhost;dbname=$database", $user, $password);
  echo "<h2>TODO</h2><ol>";
  foreach($db->query("SELECT content FROM $table") as $row) {
    echo "<li>" . $row['content'] . "</li>";
  }
  echo "</ol>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
