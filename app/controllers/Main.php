<?php
namespace app\controllers;

class Main extends \app\core\Controller{
	public function index(){
		//To see interesting publications, as a person or user, I can see a list of all publications, most recent first.
		$publication = new \app\models\Publication();
		$publications = $publication->getAll();
		$this->view('Main/index', $publications);
	}

	public function search(){
		//To find interesting publications, as a person or user, I can search for captions by search terms.
		$publication = new \app\models\Publication();
		$publications = $publication->search($_GET['search_term']);
		$this->view('Main/index', $publications);
	}

	public function foods(){
		//process the form data if it is submitted
		if(isset($_POST['action'])){
			//create a Food object
			$newfood = new \app\models\Food();
			//populate the Food object
			$newfood->name = $_POST['new_food'];
			//call insert
			$newfood->insert();
		}

		//read the foods.txt file into a variable
		$food = new \app\models\Food();
		$foods = $food->getAll();
		
		//pass the foods to the view for render and output
		$this->view('Main/foods', $foods);
	}


	public function foodsJSON(){
		//service that outputs JSON
		//read the foods.txt file into a variable
		$food = new \app\models\Food();
		$foods = $food->getAll();
		
		echo json_encode($foods);
	}

	public function foodsAJAX(){
		$this->view('Main/foodsAJAX');
	}


}