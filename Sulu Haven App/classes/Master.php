<?php
require_once('../config.php');
class Master extends DBConnection
{
	private $settings;
	public function __construct()
	{
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct()
	{
		parent::__destruct();
	}

	function save_package()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'description'))) {
				if (!empty($data))
					$data .= ",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if (isset($_POST['description'])) {
			if (!empty($data))
				$data .= ",";
			$data .= " `description`='" . addslashes(htmlentities($description)) . "' ";
		}
		if (empty($id)) {
			$sql = "INSERT INTO `packages` set {$data} ";
			$save = $this->conn->query($sql);
			$id = $this->conn->insert_id;
		} else {
			$sql = "UPDATE `packages` set {$data} where id = '{$id}' ";
			$save = $this->conn->query($sql);
		}
		if ($save) {
			if (isset($_FILES['img']) && count($_FILES['img']['tmp_name']) > 0) {
				if (!is_dir(base_app . 'uploads/package_' . $id)) {
					mkdir(base_app . 'uploads/package_' . $id);
					$data = " `upload_path`= 'uploads/package_{$id}' ";
				} else {
					$data = " `upload_path`= 'uploads/package_{$id}' ";
				}
				$this->conn->query("UPDATE `packages` set {$data} where id = '{$id}' ");
				foreach ($_FILES['img']['tmp_name'] as $k => $v) {
					move_uploaded_file($_FILES['img']['tmp_name'][$k], base_app . 'uploads/package_' . $id . '/' . $_FILES['img']['name'][$k]);
				}
			}

			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', "New Package successfully saved.");
		} else {
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error . "[{$sql}]";
		}
		return json_encode($resp);
	}

	//car
	function save_car()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'description'))) {
				if (!empty($data))
					$data .= ",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if (isset($_POST['description'])) {
			if (!empty($data))
				$data .= ",";
			$data .= " `description`='" . addslashes(htmlentities($description)) . "' ";
		}
		if (empty($id)) {
			$sql = "INSERT INTO `rent` set {$data} ";
			$save = $this->conn->query($sql);
			$id = $this->conn->insert_id;
		} else {
			$sql = "UPDATE `rent` set {$data} where id = '{$id}' ";
			$save = $this->conn->query($sql);
		}
		if ($save) {
			if (isset($_FILES['img']) && count($_FILES['img']['tmp_name']) > 0) {
				if (!is_dir(base_app . 'uploads/car_' . $id)) {
					mkdir(base_app . 'uploads/car_' . $id);
					$data = " `upload_path`= 'uploads/car_{$id}' ";
				} else {
					$data = " `upload_path`= 'uploads/car_{$id}' ";
				}
				$this->conn->query("UPDATE `rent` set {$data} where id = '{$id}' ");
				foreach ($_FILES['img']['tmp_name'] as $k => $v) {
					move_uploaded_file($_FILES['img']['tmp_name'][$k], base_app . 'uploads/car_' . $id . '/' . $_FILES['img']['name'][$k]);
				}
			}

			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', "New Car to Rent successfully saved.");
		} else {
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error . "[{$sql}]";
		}
		return json_encode($resp);
	}

	function save_accom()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'description'))) {
				if (!empty($data))
					$data .= ",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if (isset($_POST['description'])) {
			if (!empty($data))
				$data .= ",";
			$data .= " `description`='" . addslashes(htmlentities($description)) . "' ";
		}
		if (empty($id)) {
			$sql = "INSERT INTO `accom` set {$data} ";
			$save = $this->conn->query($sql);
			$id = $this->conn->insert_id;
		} else {
			$sql = "UPDATE `accom` set {$data} where id = '{$id}' ";
			$save = $this->conn->query($sql);
		}
		if ($save) {
			if (isset($_FILES['img']) && count($_FILES['img']['tmp_name']) > 0) {
				if (!is_dir(base_app . 'uploads/accom_' . $id)) {
					mkdir(base_app . 'uploads/accom_' . $id);
					$data = " `upload_path`= 'uploads/accom_{$id}' ";
				} else {
					$data = " `upload_path`= 'uploads/accom_{$id}' ";
				}
				$this->conn->query("UPDATE `accom` set {$data} where id = '{$id}' ");
				foreach ($_FILES['img']['tmp_name'] as $k => $v) {
					move_uploaded_file($_FILES['img']['tmp_name'][$k], base_app . 'uploads/accom_' . $id . '/' . $_FILES['img']['name'][$k]);
				}
			}

			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', "New Accommodation successfully saved.");
		} else {
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error . "[{$sql}]";
		}
		return json_encode($resp);
	}

	function save_guide()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'description'))) {
				if (!empty($data))
					$data .= ",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if (isset($_POST['description'])) {
			if (!empty($data))
				$data .= ",";
			$data .= " `description`='" . addslashes(htmlentities($description)) . "' ";
		}
		if (empty($id)) {
			$sql = "INSERT INTO `guide` set {$data} ";
			$save = $this->conn->query($sql);
			$id = $this->conn->insert_id;
		} else {
			$sql = "UPDATE `guide` set {$data} where id = '{$id}' ";
			$save = $this->conn->query($sql);
		}
		if ($save) {
			if (isset($_FILES['img']) && count($_FILES['img']['tmp_name']) > 0) {
				if (!is_dir(base_app . 'uploads/guide_' . $id)) {
					mkdir(base_app . 'uploads/guide_' . $id);
					$data = " `upload_path`= 'uploads/guide_{$id}' ";
				} else {
					$data = " `upload_path`= 'uploads/guide_{$id}' ";
				}
				$this->conn->query("UPDATE `guide` set {$data} where id = '{$id}' ");
				foreach ($_FILES['img']['tmp_name'] as $k => $v) {
					move_uploaded_file($_FILES['img']['tmp_name'][$k], base_app . 'uploads/guide_' . $id . '/' . $_FILES['img']['name'][$k]);
				}
			}

			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', "New Tour Guide successfully saved.");
		} else {
			$resp['status'] = 'failed';
			$resp['err'] = $this->conn->error . "[{$sql}]";
		}
		return json_encode($resp);
	}

	function delete_p_img()
	{
		extract($_POST);
		if (is_file($path)) {
			if (unlink($path)) {
				$resp['status'] = 'success';
			} else {
				$resp['status'] = 'failed';
				$resp['error'] = 'unlink file failed.';
			}
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = 'unlink file failed. File do not exist.';
		}
		return json_encode($resp);
	}
	function delete_package()
	{
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `packages` where id = '{$id}'");
		if ($del) {
			$resp['status'] = 'success';
			if (is_dir(base_app . 'uploads/package_' . $id)) {
				$file = scandir(base_app . 'uploads/package_' . $id);
				foreach ($file as $img) {
					if (in_array($img, array('..', '.')))
						continue;
					unlink(base_app . 'uploads/package_' . $id . '/' . $img);
				}
				rmdir(base_app . 'uploads/package_' . $id);
			}
			$this->settings->set_flashdata('success', "Tour Package successfully deleted.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	function delete_car()
	{
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `rent` where id = '{$id}'");
		if ($del) {
			$resp['status'] = 'success';
			if (is_dir(base_app . 'uploads/car_' . $id)) {
				$file = scandir(base_app . 'uploads/car_' . $id);
				foreach ($file as $img) {
					if (in_array($img, array('..', '.')))
						continue;
					unlink(base_app . 'uploads/car_' . $id . '/' . $img);
				}
				rmdir(base_app . 'uploads/car_' . $id);
			}
			$this->settings->set_flashdata('success', "Car successfully deleted.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	function delete_accom()
	{
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `accom` where id = '{$id}'");
		if ($del) {
			$resp['status'] = 'success';
			if (is_dir(base_app . 'uploads/accom_' . $id)) {
				$file = scandir(base_app . 'uploads/accom_' . $id);
				foreach ($file as $img) {
					if (in_array($img, array('..', '.')))
						continue;
					unlink(base_app . 'uploads/accom_' . $id . '/' . $img);
				}
				rmdir(base_app . 'uploads/accom_' . $id);
			}
			$this->settings->set_flashdata('success', "Accomodation successfully deleted.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	function delete_guide()
	{
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `guide` where id = '{$id}'");
		if ($del) {
			$resp['status'] = 'success';
			if (is_dir(base_app . 'uploads/guide_' . $id)) {
				$file = scandir(base_app . 'uploads/guide_' . $id);
				foreach ($file as $img) {
					if (in_array($img, array('..', '.')))
						continue;
					unlink(base_app . 'uploads/guide_' . $id . '/' . $img);
				}
				rmdir(base_app . 'uploads/guide_' . $id);
			}
			$this->settings->set_flashdata('success', "Tour Guide successfully deleted.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	function book_tour()
	{
		extract($_POST);
		$data = " user_id = '" . $this->settings->userdata('id') . "' ";
		foreach ($_POST as $k => $v) {
			$data .= ", `{$k}` = '{$v}' ";
		}
		$save = $this->conn->query("INSERT INTO `book_list` set $data");
		if ($save) {
			$resp['status'] = 'success';
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}

	function book_car()
	{
		extract($_POST);
		$data = " user_id = '" . $this->settings->userdata('id') . "' ";
		foreach ($_POST as $k => $v) {
			$data .= ", `{$k}` = '{$v}' ";
		}
		$car_id = isset($_POST['package_id']) ? $_POST['package_id'] : '';

		// Append 'car_id' to the $data string
		$data .= ", `car_id` = '$car_id' ";

		$save = $this->conn->query("INSERT INTO `book_list` set $data");
		if ($save) {
			$resp['status'] = 'success';
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function book_accom()
	{
		extract($_POST);
		$data = " user_id = '" . $this->settings->userdata('id') . "' ";
		foreach ($_POST as $k => $v) {
			$data .= ", `{$k}` = '{$v}' ";
		}
		$accom_id = isset($_POST['package_id']) ? $_POST['package_id'] : '';

		// Append 'car_id' to the $data string
		$data .= ", `accom_id` = '$accom_id' ";

		$save = $this->conn->query("INSERT INTO `book_list` set $data");
		if ($save) {
			$resp['status'] = 'success';
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}

	function book_guide()
	{
		extract($_POST);
		$data = " user_id = '" . $this->settings->userdata('id') . "' ";
		foreach ($_POST as $k => $v) {
			$data .= ", `{$k}` = '{$v}' ";
		}
		$guide_id = isset($_POST['package_id']) ? $_POST['package_id'] : '';

		// Append 'car_id' to the $data string
		$data .= ", `guide_id` = '$guide_id' ";

		$save = $this->conn->query("INSERT INTO `book_list` set $data");
		if ($save) {
			$resp['status'] = 'success';
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function update_book_status()
	{
		extract($_POST);
		$update = $this->conn->query("UPDATE `book_list` set `status` = '{$status}' where id ='{$id}' ");
		if ($update) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success', "Book successfully updated.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function register()
	{
		extract($_POST);
		$data = "";
		$_POST['password'] = md5($password);
		foreach ($_POST as $k => $v) {
			if (!empty($data))
				$data .= ",";
			$data .= " `{$k}`='{$v}' ";
		}
		$check = $this->conn->query("SELECT * FROM `users` where username='{$username}' ")->num_rows;
		if ($check > 0) {
			$resp['status'] = 'failed';
			$resp['msg'] = "Username already taken.";
			return json_encode($resp);
			exit;
		}
		$save = $this->conn->query("INSERT INTO `users` set $data ");
		if ($save) {
			foreach ($_POST as $k => $v) {
				$this->settings->set_userdata($k, $v);
			}
			$this->settings->set_userdata('id', $this->conn->insert_id);
			$resp['status'] = 'success';
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	function update_account()
	{
		extract($_POST);
		$data = "";
		if (!empty($password)) {
			$_POST['password'] = md5($password);
			if (md5($cpassword) != $this->settings->userdata('password')) {
				$resp['status'] = 'failed';
				$resp['msg'] = "Current Password is Incorrect";
				return json_encode($resp);
				exit;
			}

		}
		$check = $this->conn->query("SELECT * FROM `users`  where `username`='{$username}' and `id` != $id ")->num_rows;
		if ($check > 0) {
			$resp['status'] = 'failed';
			$resp['msg'] = "Username already taken.";
			return json_encode($resp);
			exit;
		}
		foreach ($_POST as $k => $v) {
			if ($k == 'cpassword' || ($k == 'password' && empty($v)))
				continue;
			if (!empty($data))
				$data .= ",";
			$data .= " `{$k}`='{$v}' ";
		}
		$save = $this->conn->query("UPDATE `users` set $data where id = $id ");
		if ($save) {
			foreach ($_POST as $k => $v) {
				if ($k != 'cpassword')
					$this->settings->set_userdata($k, $v);
			}

			$this->settings->set_userdata('id', $this->conn->insert_id);
			$resp['status'] = 'success';
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}

	function save_inquiry()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!empty($data))
				$data .= ",";
			$data .= " `{$k}`='{$v}' ";
		}
		$save = $this->conn->query("INSERT INTO `inquiry` set $data");
		if ($save) {
			$resp['status'] = 'success';
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	function rate_review()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if ($k == 'review')
				$v = addslashes(htmlentities($v));
			if (!empty($data))
				$data .= ",";
			$data .= " `{$k}`='{$v}' ";
		}
		$data .= ", `user_id`='" . $this->settings->userdata('id') . "' ";

		$save = $this->conn->query("INSERT INTO `rate_review` set $data");
		if ($save) {
			$resp['status'] = 'success';
			// $this->settings->set_flashdata("success","Rate & Review submitted.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	function delete_inquiry()
	{
		$del = $this->conn->query("DELETE FROM `inquiry` where id='{$_POST['id']}'");
		if ($del) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata("success", "Inquiry Deleted.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function delete_review()
	{
		$del = $this->conn->query("DELETE FROM `rate_review` where id='{$_POST['id']}'");
		if ($del) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata("success", "Feedback Deleted.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function delete_booking()
	{
		$del = $this->conn->query("DELETE FROM `book_list` where id='{$_POST['id']}'");
		if ($del) {
			$resp['status'] = 'success';
			$this->settings->set_flashdata("success", "Booking Deleted.");
		} else {
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
}

$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	case 'save_package':
		echo $Master->save_package();
		break;
	case 'save_car':
		echo $Master->save_car();
		break;
	case 'save_accom':
		echo $Master->save_accom();
		break;
	case 'save_guide':
		echo $Master->save_guide();
		break;
	case 'delete_package':
		echo $Master->delete_package();
		break;
	case 'delete_car':
		echo $Master->delete_car();
		break;
	case 'delete_guide':
		echo $Master->delete_guide();
		break;
	case 'delete_accom':
		echo $Master->delete_accom();
		break;
	case 'delete_p_img':
		echo $Master->delete_p_img();
		break;
	case 'book_tour':
		echo $Master->book_tour();
		break;
	case 'book_car':
		echo $Master->book_car();
		break;
	case 'book_guide':
		echo $Master->book_guide();
		break;
	case 'book_accom':
		echo $Master->book_accom();
		break;
	case 'update_book_status':
		echo $Master->update_book_status();
		break;
	case 'register':
		echo $Master->register();
		break;
	case 'update_account':
		echo $Master->update_account();
		break;
	case 'save_inquiry':
		echo $Master->save_inquiry();
		break;
	case 'rate_review':
		echo $Master->rate_review();
		break;
	case 'delete_inquiry':
		echo $Master->delete_inquiry();
		break;
	case 'delete_booking':
		echo $Master->delete_booking();
		break;
	case 'delete_review':
		echo $Master->delete_review();
		break;
	default:
		// echo $sysset->index();
		break;
}