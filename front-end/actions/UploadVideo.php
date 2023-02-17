<?php
if (!function_exists('giveId')) {
	include_once __DIR__ . '/../helper/function.php';
}

function upload()
{


	$apiUrl = 'http://192.168.128.6:8082/';

	$id = giveId();

	if (array_key_exists('video', $_FILES)) {
		if ($_FILES['video']['error'] === UPLOAD_ERR_OK) {
			echo 'upload was successful';
		} else {
			die("Upload failed with error code " . $_FILES['video']['error']);
		}
	}
	$maxsize = 1000000000000;
	if (isset($_FILES['video']['name']) && $_FILES['video']['name'] != '') {
		//$path_key = "./storage/";
		$path_key = "/home/front/storage/";
		$target_file = $path_key . $_FILES["video"]["name"];

		// Select file type
		$extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

		// Valid file extensions
		$extensions_arr = array("mp4", "avi", "3gp", "mov", "mpeg");

		// Check extension
		if (in_array($extension, $extensions_arr)) {
			// Check file size
			if (($_FILES['video']['size'] >= $maxsize) || ($_FILES["video"]["size"] == 0)) {
			} else {
				// Upload
				if (move_uploaded_file($_FILES['video']['tmp_name'], $path_key . $id . '.' . $extension)) {

					$img_file = $_FILES['thumbnail']['tmp_name'];
					$thumbailEmpty = "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";

					if (empty($img_file)) {
						$imgData = $thumbailEmpty;
					} else {
						$imgData = base64_encode(file_get_contents($img_file));
					}



					$data = array(
						"id" => $id,
						"creator" => $_SESSION['user']['id'],
						"title" => $_POST['title'],
						"thumbnail" => $imgData,
						"description" => $_POST['description'],
						"privacy" => "public"
					);
					postApi($data, 'upload/video');
				}
			}
		} else {
			$_SESSION['message'] = "Invalid file extension.";
		}
	} else {
		$_SESSION['message'] = "Please select a file.";
	}
	header('location: index.php?name=ChannelPage');
	exit();
}