<?php
/**

 * class Login

 *

 * creates db connection, logs in the user, creates session

 *

 * @author Panique <panique@web.de>

 * @version 1.0

 * @package login

 */
class Login {


	private $logged_in = false;
	// status of login

	public $errors = array();
	// collection of error messages

	public $messages = array();
	// collection of success / neutral messages

	private $user_name = "";
	// user's name

	private $user_email = "";
	// user's email

	private $user_password = "";
	// user's password (what comes from POST)



	public function __construct() {
		session_start();
		// create session


			if ($this -> logout()) {// checking for logout, performing login

				// do nothing, you are logged out now // this if construction just exists to prevent unnecessary method calls

			} elseif ($this -> loginWithSessionData()) {

				$this -> logged_in = true;

			} elseif ($this -> loginWithPostData()) {

				$this -> logged_in = true;

			}


	}

	private function loginWithSessionData() {

		if (!empty($_SESSION['user_id'])) {

			return true;

		} else {

			return false;

		}

	}

	private function loginWithPostData() {
		global $pdo;
		if (isset($_POST["login"]) && !empty($_POST['id_number']) && !empty($_POST['password'])) {
			$data[id_number] = $_POST ['id_number'] ;
			$sql = "SELECT `id`, `username`, `id_number`, `password`,`is_admin` FROM users WHERE id_number=:id_number";
                $checklogin = $pdo->pdoExecute($sql, $data);
                $checklogin_count = $pdo->pdoRowCount($checklogin);
			$sql1 = "SELECT * FROM banned_course WHERE user_id=:id_number";
			$checkbanned = $pdo->pdoExecute($sql1, $data);
			$checkbanned_count = $pdo->pdoRowCount($checkbanned);
		
			if ($checklogin_count == 1 && $checkbanned_count == 0) {

				$result_row = $pdo->pdoGetRow($sql,$data);

				if ($_POST["password"] == $result_row['password']) {
					$_SESSION['user_id'] = $result_row['id'];
					$_SESSION['is_admin'] = $result_row['is_admin'];

					$_SESSION['username'] = $result_row['username'];
                    header('Location: login.php?do=succes');

				} else {
 					header('Location: login.php?do=password_wrong');
					return false;

				}

			} else {
				header('Location: login.php?do=user_not_exist');

				return false;

			}

		} elseif (isset($_POST["login"]) && !empty($_POST['user_email']) && empty($_POST['user_password'])) {

			header('Location: login.php?do=password_wrong');

		}

	}

	public function logout() {

		if (isset($_GET["logout"])) {

			$_SESSION = array();

			session_destroy();
			unset($_SESSION);
			return true;

		}

	}

	public function isLoggedIn() {

		return $this -> logged_in;

	}

}
?>
