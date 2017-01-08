<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app = new \Slim\App;

//Get All Projects
$app->get('/api/projects', function(Request $request, Response $response){
    $sql = "SELECT * FROM work";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->query($sql);
        $projects = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($projects);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
//Get Single Project
$app->get('/api/projects/{id}', function(Request $request, Response $response){
	$id = $request->getAttribute('id');
    $sql = "SELECT * FROM work WHERE id = $id";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->query($sql);
        $project = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo json_encode($project);
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});
?>