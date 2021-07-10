<?php
include('../config/db.php');
include('../models/fiche_model.php');

if (isset($_POST["operation"])) {


	if ($_POST["operation"] == "Ajoût") {

		$image = '';
		$select = '';

		$ref = $_POST['ref_cat'];

		//print json_encode($ref);

		$libelle = $_POST['libelle'];

		$description = $_POST['description'];

		if ($_FILES["fiche_image"]["name"] != '') {
			$image = upload_image();
		}

		foreach ($ref as $rowhob) {

			$select .= $rowhob . ', ';

		}

			$select = substr($select, 0, -2);

			$con = mysqli_connect("localhost","root","","dbtestherilalainajaonas189558com");

			$query = "INSERT INTO fiches (ref_cat, libelle, description, image) VALUE ('$select', '$libelle', '$description', '$image')";
				
			$query_run = mysqli_query($con, $query);

			if($query_run)
			{
				echo " Inserted";
			}
			else
			{
				echo " Not Inserted";
			}
		
	}

	if ($_POST["operation"] == "Modifier") {
		
		$image = '';

		$select = '';

		$id = $_POST["fiche_id"];

		$ref = $_POST['ref_cat'];
		
		//print json_encode($ref);

		$libelle = $_POST['libelle'];

		$description = $_POST['description'];


		if ($_FILES["fiche_image"]["name"] != '') {
			$image = upload_image();
		} else {
			$image = $_POST["hidden_fiche_image"];
		}

		if ($_FILES["fiche_image"]["name"] != '') {
			$image = upload_image();
		}

		foreach ($ref as $rowhob) {

			$select .= $rowhob . ', ';

		}

			$con = mysqli_connect("localhost","root","","dbtestherilalainajaonas189558com");
			//print json_encode($select);

			$query = "UPDATE fiches SET ref_cat = '$select', libelle = '$libelle', description = '$description', image = '$image'  WHERE id_fiche = $id";
				
			$query_run = mysqli_query($con, $query);

			if($query_run)
			{
				echo "Update Inserted";
			}
			else
			{
				echo "Update Not Inserted";
			}
		

	}
}
