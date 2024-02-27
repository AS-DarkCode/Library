<?php

date_default_timezone_set('Asia/Kolkata');
require_once('Model/Model.php');
session_start();


class Controller extends Model
{

	function __construct()
	{
		parent::__construct();

		if (isset($_SERVER['PATH_INFO'])) {
			$capcha = rand(100000, 999999);

			switch ($_SERVER['PATH_INFO']) {

				case '/ragister':

					if (isset($_POST['ragister'])) {

						$path = 'uploads/';
						$allowedExtension = ['jpeg', 'jpg', 'png', 'gif'];
						$MaxSize = 5 * 1024 * 1024;



						if ($_FILES['profile_picture']['error'] == 0) {


							if ($_FILES['profile_picture']['size'] <= $MaxSize) {
								$extension = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);

								if (in_array(strtolower($extension), $allowedExtension)) {
									$file_name = $_POST['first_name'] . '-' . date('YmdHis') . '.' . $extension;
									$profile = (file_exists($_FILES['profile_picture']['tmp_name'])) ? $file_name : null;
									// echo "<pre>"; print_r($_FILES['profile_picture']['tmp_name']);exit();
									if (!is_null($profile)) {
										move_uploaded_file($_FILES['profile_picture']['tmp_name'], $path . $file_name);
									} else {
										echo "<script>
										alert('Error moving uploaded file.');
										window.location.href = '/login';
										</script>";
										exit();
									}
								} else {
									echo "<script>
									alert('Allowed extension Only jpg jpeg png and gif only');
									window.location.href = '/login';
									</script>";
									exit();
								}
							} else {
								echo "<script>
								alert('Minimum file size only 5MB');
								window.location.href = '/login';
								</script>";
								exit();
							}
						} else {
							echo "<script>
							alert('Something went wrong with file upload.');
							window.location.href = '/login';
							</script>";
							exit();
						}



						$insert_data = [
							'first_name' => $_POST['first_name'],
							'last_name' => $_POST['last_name'],
							'email' => $_POST['email'],
							'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
							'contact_number' => $_POST['contact_number'],
							'gender' => $_POST['gender'],
							'address' => $_POST['address'],
							'state' => $_POST['state'],
							'profile_picture' => $profile,
							'hobbies' => implode(',', $_POST['hobbies']),
						];

						$InsertEX = $this->InsertData('users', $insert_data);
						if ($InsertEX['Code']) {
							echo "<script>alert('Ragistation successfully!');</script>";
							// exit;
							echo "<script type='text/javascript'>window.location.href='login';</script>";
						} else {
							echo "<script>alert('Data Delete successfully!');</script>";
							// exit;
							echo "<script type='text/javascript'>window.location.href='login';</script>";
						}
					}

					include "Views/header.php";
					include "Views/ragister.php";
					include "Views/footer.php";
					break;

				case '/login':

					if (isset($_SESSION['User_data']) && $_SESSION['User_data']->role_id == 0) {
						echo "<script type='text/javascript'>window.location.href='UserHome';</script>";
						exit();
					} else if ((isset($_SESSION['User_data']) && ($_SESSION['User_data']->role_id == 1))) {
						echo "<script type='text/javascript'>window.location.href='Admin_Home';</script>";
						exit();
					}

					if (isset($_POST['login'])) {


						$email = mysqli_real_escape_string($this->connection, $_POST['input_email']);
						$pass = mysqli_real_escape_string($this->connection, $_POST['input_password']);
						$loginEx = $this->LoginData($email, $pass);

						if ($loginEx['Code']) {

							$_SESSION['User_data'] = $loginEx['Data'];
							echo '<script>
							alert("' . $loginEx['Message'] . '");
							</script>';

							if ($_SESSION['User_data']->role_id == 0) {
								echo "<script type='text/javascript'>window.location.href='UserHome';</script>";
								exit();
							} else {
								echo "<script type='text/javascript'>window.location.href='Admin_Home';</script>";
								exit();
							}
						} else {
							echo "<script>
									alert('" . $loginEx['Message'] . "');
									window.location.href = 'login';
							</script>";
							exit();
						}
					}
					include "Views/header.php";
					include "Views/login.php";
					include "Views/footer.php";
					break;

				case '/Admin_Home':
					if (!isset($_SESSION['User_data']) || $_SESSION['User_data']->role_id != 1) {
						echo "<script type='text/javascript'>window.location.href='login';</script>";
						exit();
					}

					$ViewBook = $this->Select_Data('books');
					$_books = $ViewBook['Data'];
					// echo "<pre>";
					// print_r($_books);
					// exit();

					include "Views/Admin/bottom_nav.php";
					include "Views/Admin/home.php";
					include "Views/Admin/footer.php";
					break;

				case '/Admin_Books':
					if (!isset($_SESSION['User_data']) || $_SESSION['User_data']->role_id != 1) {
						echo "<script type='text/javascript'>window.location.href='login';</script>";
						exit();
					}

					if (isset($_POST['save_book'])) {
						$path = 'books/';
						$allowed_Extension_book = ['pdf'];
						$allowed_Extension_cover = ['jpg', 'png', 'gif', 'jpeg'];

						$maxbookSize = 10 * 1024 * 1024;
						$maxcoverSize = 5 * 1024 * 1024;

						if ($_FILES['input_book']['error'] == 0 && $_FILES['input_cover']['error'] == 0) {

							$book_extension = pathinfo($_FILES['input_book']['name'], PATHINFO_EXTENSION);
							$cover_extension = pathinfo($_FILES['input_cover']['name'], PATHINFO_EXTENSION);

							if ($_FILES['input_book']['size'] <= $maxbookSize && $_FILES['input_cover']['size'] <= $maxcoverSize) {
								$bookName = $_POST['book_name'] . "_" . date('YdmHis') . "." . $book_extension;
								$coverName = $_POST['author_name'] . "_" . date('YdmHis') . "." . $cover_extension;
								if (in_array($book_extension, $allowed_Extension_book) && in_array($cover_extension, $allowed_Extension_cover)) {
									$book_file = (file_exists($_FILES['input_book']['tmp_name'])) ? $bookName : null;
									$cover_file = (file_exists($_FILES['input_cover']['tmp_name'])) ? $coverName : null;
									if (!is_null($book_file) || !is_null($cover_file)) {
										move_uploaded_file($_FILES['input_book']['tmp_name'], $path . $bookName);
										move_uploaded_file($_FILES['input_cover']['tmp_name'], $path . $coverName);
									} else {
										echo "<script>
										alert('Error moving uploaded file.');
										</script>";
										exit();
									}
								} else {
									echo "<script>
									alert('Book upload only pdf extension and cover upload only jpg gif jpeg ');
									</script>";
									exit();
								}
							} else {
								echo "<script>
								alert('Cover size upload only 5MB and Book Upload only 10MB');
								window.location.href = 'Admin_Books';
								</script>";
								exit();
							}
						} else {
							echo "<script>
							alert('Something went wrong with file upload.');
							</script>";
							exit();
						}

						$insert_book = [
							'cover_image' => $cover_file,
							'file' => $book_file,
							'book_name' => $_POST['book_name'],
							'description' => $_POST['description'],
							'author_name' => $_POST['author_name'],
						];

						$insert_bookEX = $this->InsertData('books', $insert_book);
						if ($insert_bookEX['Code']) {
							echo "<script>
							alert('Successfully upload books.');
							window.location.href = 'Admin_Home';
							</script>";
							exit();
						}
						// echo "<pre>";print_r($insert_bookEX);exit;
					}

					include "Views/Admin/bottom_nav.php";
					include "Views/Admin/books.php";
					include "Views/Admin/footer.php";

					break;

				case '/Admin_Students':
					if (!isset($_SESSION['User_data']) || $_SESSION['User_data']->role_id != 1) {
						echo "<script type='text/javascript'>window.location.href='login';</script>";
						exit();
					}

					$SelectDataStudent = $this->Select_Data('users', ['role_id' => 0]);
					$_data = $SelectDataStudent['Data'];

					include "Views/Admin/bottom_nav.php";
					include "Views/Admin/students.php";
					include "Views/Admin/footer.php";
					break;

					// case '/Admin_Books':
					// 	if (!isset($_SESSION['User_data']) || $_SESSION['User_data']->role_id != 1) {
					// 		echo "<script type='text/javascript'>window.location.href='login';</script>";
					// 		exit();
					// 	}
					// 	include "Views/Admin/bottom_nav.php";
					// 	include "Views/Admin/books.php";
					// 	include "Views/Admin/footer.php";
					// 	break;

				case '/Books_List':
					if (!isset($_SESSION['User_data']) || $_SESSION['User_data']->role_id != 1) {
						echo "<script type='text/javascript'>window.location.href='login';</script>";
						exit();
					}
					$book_list = $this->Select_Data('books');
					$book_list = $book_list['Data'];

					include "Views/Admin/bottom_nav.php";
					include "Views/Admin/Books_List.php";
					include "Views/Admin/footer.php";
					break;

				case '/Books_Edit':
					if (!isset($_SESSION['User_data']) || $_SESSION['User_data']->role_id != 1) {
						echo "<script type='text/javascript'>window.location.href='login';</script>";
						exit();
					}

					$where = ['id' => $_GET['book']];
					$Admin_Book_edit = $this->Select_Data('books', $where);
					$Admin_Book_edit = $Admin_Book_edit['Data'][0];
					// echo "<pre>";
					// print_r($Admin_Book_edit); exit();

					if (isset($_POST['save_book'])) {
						$path = 'books/';
						$allowed_Extension_cover = ['jpg', 'png', 'gif', 'jpeg'];
						$maxcoverSize = 5 * 1024 * 1024;

						// Get the existing book data
						// $existingBookData = $this->Select_Data('books', ['id' => $_GET['book']]);
						// $existingBookData = $existingBookData['Data'][0];

						// Initialize update data with existing values
						$updateData = [
							'book_name' => $existingBookData->book_name,
							'author_name' => $existingBookData->author_name,
							'description' => $existingBookData->description,
							'cover_image' => $existingBookData->cover_image,
						];

						// Check if a new cover image is uploaded
						if (!empty($_FILES['input_cover']['tmp_name'])) {
							$cover_extension = pathinfo($_FILES['input_cover']['name'], PATHINFO_EXTENSION);

							if ($_FILES['input_cover']['size'] <= $maxcoverSize && in_array($cover_extension, $allowed_Extension_cover)) {
								$bookName = $_POST['book_name'] . "_" . date('YdmHis') . "." . $book_extension;
								$coverName = $_POST['author_name'] . "_" . date('YdmHis') . "." . $cover_extension;

								$book_file = (file_exists($_FILES['input_book']['tmp_name'])) ? $bookName : $Admin_Book_edit->file;
								$cover_file = (file_exists($_FILES['input_cover']['tmp_name'])) ? $coverName : $Admin_Book_edit->cover_image;

								move_uploaded_file($_FILES['input_book']['tmp_name'], $path . $bookName);
								move_uploaded_file($_FILES['input_cover']['tmp_name'], $path . $coverName);

								$updateData['cover_image'] = $cover_file;
								$updateData['file'] = $book;
							} else {
								echo "<script>
									alert('Invalid cover image format or size exceeds the limit.');
								</script>";
							}
						}

						// Update other fields
						$updateData['book_name'] = mysqli_real_escape_string($this->connection, $_POST['book_name']);
						$updateData['author_name'] = mysqli_real_escape_string($this->connection, $_POST['author_name']);
						$updateData['description'] = mysqli_real_escape_string($this->connection, $_POST['description']);

						// Update the data in the database
						$where = ['id' => $_GET['book']];
						$updateResult = $this->UpdateData('books', $updateData, $where);
						// echo "<pre>";print_r($updateResult);exit;

						if ($updateResult) {
							echo "<script>
								alert('Book data updated successfully.');
								window.location.href = 'Admin_Home';
							</script>";
							exit();
						} else {
							echo "<script>
								alert('Error updating book data.');
							</script>";
						}
					}




					include "Views/Admin/bottom_nav.php";
					include "Views/Admin/Edit_book.php";
					include "Views/Admin/footer.php";
					break;

				case '/Books_Delete';
					if (isset($_GET['book'])) {
						$where = ['id' => $_GET['book']];
						$delete_data = $this->DeleteData('books', $where);

						echo "<script>alert('Data Delete successfully!');</script>";
						// exit;
						echo "<script type='text/javascript'>window.location.href='Books_List';</script>";
					}
					break;

				case '/Admin_Notification':
					if (!isset($_SESSION['User_data']) || $_SESSION['User_data']->role_id != 1) {
						echo "<script type='text/javascript'>window.location.href='login';</script>";
						exit();
					}
					if (isset($_POST['save'])) {
						$notification_data = [
							'type' => $_POST['notificationType'],
							'message' => $_POST['notificationMessage'],
							'name' => $_POST['name'],
						];
						$insert_notification = $this->InsertData('notification', $notification_data);
						echo "<script type='text/javascript'>alert('Add Success');</script>";
						echo "<script type='text/javascript'>window.location.href='Admin_Notification';</script>";
					}
					$Notification_DATA = $this->Select_Data('notification');
					$Notification_DATA = $Notification_DATA['Data'];

					// echo "<pre>";print_r($Notification_DATA);exit();


					// print_r($notifi_data);exit();
					include "Views/Admin/bottom_nav.php";
					include "Views/Admin/notification.php";
					include "Views/Admin/footer.php";
					break;

				case '/Admin_Profile':
					if (!isset($_SESSION['User_data']) || $_SESSION['User_data']->role_id != 1) {
						echo "<script type='text/javascript'>window.location.href='login';</script>";
						exit();
					}
					$where = ['id' => $_SESSION['User_data']->id];
					$SelectData = $this->Select_Data('users', $where);

					include "Views/Admin/bottom_nav.php";
					include "Views/Admin/profile.php";
					include "Views/Admin/footer.php";
					break;


				case '/Students_Delete';
					if (isset($_GET['user'])) {
						$where = ['id' => $_GET['user']];
						$delete_data = $this->DeleteData('users', $where);

						echo "<script>alert('Data Delete successfully!');</script>";
						// exit;
						echo "<script type='text/javascript'>window.location.href='Admin_Students';</script>";
					}
					break;

				case '/Student_Add':
					if (!isset($_SESSION['User_data']) || $_SESSION['User_data']->role_id != 1) {
						echo "<script type='text/javascript'>window.location.href='login';</script>";
						exit();
					}
					if (isset($_POST['add'])) {

						$path = 'uploads/';
						$allowedExtension = ['jpeg', 'jpg', 'png', 'gif'];
						$MaxSize = 5 * 1024 * 1024;



						if ($_FILES['profile_picture']['error'] == 0) {


							if ($_FILES['profile_picture']['size'] <= $MaxSize) {
								$extension = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);

								if (in_array(strtolower($extension), $allowedExtension)) {
									$file_name = $_POST['first_name'] . '-' . date('YmdHis') . '.' . $extension;
									$profile = (file_exists($_FILES['profile_picture']['tmp_name'])) ? $file_name : null;
									// echo "<pre>"; print_r($_FILES['profile_picture']['tmp_name']);exit();
									if (!is_null($profile)) {
										move_uploaded_file($_FILES['profile_picture']['tmp_name'], $path . $file_name);
									} else {
										echo "<script>
										alert('Error moving uploaded file.');
										window.location.href = '/login';
										</script>";
										exit();
									}
								} else {
									echo "<script>
									alert('Allowed extension Only jpg jpeg png and gif only');
									window.location.href = '/login';
									</script>";
									exit();
								}
							} else {
								echo "<script>
								alert('Minimum file size only 5MB');
								window.location.href = '/login';
								</script>";
								exit();
							}
						} else {
							echo "<script>
							alert('Something went wrong with file upload.');
							window.location.href = '/login';
							</script>";
							exit();
						}


						$insert_data = [
							'first_name' => $_POST['first_name'],
							'last_name' => $_POST['last_name'],
							'email' => $_POST['email'],
							'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
							'contact_number' => $_POST['contact_number'],
							'gender' => $_POST['gender'],
							'address' => $_POST['address'],
							'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
							'state' => $_POST['state'],
							'profile_picture' => $profile,
							'hobbies' => implode(',', $_POST['hobbies']),
						];

						$InsertEX = $this->InsertData('users', $insert_data);
						// echo "<pre>"; print_r($InsertEX);exit();
						if ($InsertEX['Code']) {
							echo "<script>alert('Student Add Successfully!');</script>";
							// exit;
							echo "<script type='text/javascript'>window.location.href='Admin_Students';</script>";
						} else {
							echo "<script>alert('Something Went wroung');</script>";
							// exit;
							echo "<script type='text/javascript'>window.location.href='Admin_Students';</script>";
						}
					}
					include "Views/Admin/bottom_nav.php";
					include "Views/Admin/Add_Student.php";
					include "Views/Admin/footer.php";
					break;

				case '/Admin_Edit':
					if (!isset($_SESSION['User_data']) || $_SESSION['User_data']->role_id != 1) {
						echo "<script type='text/javascript'>window.location.href='login';</script>";
						exit();
					}

					$where = ['id' => $_SESSION['User_data']->id];
					$Admin_data = $this->Select_Data('users', $where);
					$Admin_data = $Admin_data['Data'][0];

					if (isset($_POST['update'])) {
						$path = 'uploads/';
						$allowedExtension = ['jpeg', 'jpg', 'png', 'gif'];
						$MaxSize = 5 * 1024 * 1024;

						$update_Admin = [
							'first_name' => mysqli_real_escape_string($this->connection, $_POST['first_name']),
							'last_name' => mysqli_real_escape_string($this->connection, $_POST['last_name']),
							'email' => mysqli_real_escape_string($this->connection, $_POST['email']),
							'contact_number' => mysqli_real_escape_string($this->connection, $_POST['contact_number']),
							'gender' => mysqli_real_escape_string($this->connection, $_POST['gender']),
							'address' => mysqli_real_escape_string($this->connection, $_POST['address']),
							'state' => mysqli_real_escape_string($this->connection, $_POST['state']),
							'hobbies' => mysqli_real_escape_string($this->connection, implode(',', $_POST['hobbies'])),
						];

						$extension = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
						if (!empty($_FILES['profile_picture']['tmp_name']) && in_array(strtolower($extension), $allowedExtension)) {
							$File_Name = $_POST['first_name'] . '_' . date('YmdHis') . "." . $extension;
							$profile = $path . $File_Name;

							// Move the uploaded file to the desired directory
							move_uploaded_file($_FILES['profile_picture']['tmp_name'], $profile);

							// Remove the old profile picture if it exists
							if (file_exists($path . $Admin_data->profile_picture)) {
								unlink($path . $Admin_data->profile_picture);
							}

							$update_data['profile_picture'] = mysqli_real_escape_string($this->connection, $File_Name);
						} else {
							$update_data['profile_picture'] = mysqli_real_escape_string($this->connection, $Admin_data->profile_picture);
						}

						$UpdateAdmin = $this->UpdateData('users', $update_Admin, $where);
						// echo "<pre>"; print_r($Admin_data);exit();

						// Display an alert
						echo "<script>alert('Data updated successfully!');</script>";
						echo "<script type='text/javascript'>window.location.href='Admin_Profile';</script>";
					}


					include "Views/Admin/bottom_nav.php";
					include "Views/Admin/Admin_Edit.php";
					include "Views/Admin/footer.php";
					break;


				case '/Students_Edit':
					if (!isset($_SESSION['User_data']) || $_SESSION['User_data']->role_id != 1) {
						echo "<script type='text/javascript'>window.location.href='login';</script>";
						exit();
					}
					$where = ['id' => $_GET['user']];
					$Admin_Student_edit = $this->Select_Data('users', $where);
					$Admin_Student_edit = $Admin_Student_edit['Data'][0];

					if (isset($_POST['update'])) {
						$path = 'uploads/';
						$allowedExtension = ['jpeg', 'jpg', 'png', 'gif'];
						$MaxSize = 5 * 1024 * 1024;

						$update_data = [
							'first_name' => mysqli_real_escape_string($this->connection, $_POST['first_name']),
							'last_name' => mysqli_real_escape_string($this->connection, $_POST['last_name']),
							'email' => mysqli_real_escape_string($this->connection, $_POST['email']),
							'contact_number' => mysqli_real_escape_string($this->connection, $_POST['contact_number']),
							'gender' => mysqli_real_escape_string($this->connection, $_POST['gender']),
							'address' => mysqli_real_escape_string($this->connection, $_POST['address']),
							'state' => mysqli_real_escape_string($this->connection, $_POST['state']),
							'hobbies' => mysqli_real_escape_string($this->connection, implode(',', $_POST['hobbies'])),
						];

						$extension = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
						if (!empty($_FILES['profile_picture']['tmp_name']) && in_array(strtolower($extension), $allowedExtension)) {
							$File_Name = $_POST['first_name'] . '_' . date('YmdHis') . "." . $extension;
							$profile = $path . $File_Name;

							// Move the uploaded file to the desired directory
							move_uploaded_file($_FILES['profile_picture']['tmp_name'], $profile);

							// Remove the old profile picture if it exists
							if (file_exists($path . $Admin_Student_edit->profile_picture)) {
								unlink($path . $Admin_Student_edit->profile_picture);
							}

							$update_data['profile_picture'] = mysqli_real_escape_string($this->connection, $File_Name);
						} else {
							$update_data['profile_picture'] = mysqli_real_escape_string($this->connection, $Admin_Student_edit->profile_picture);
						}

						$up_data = $this->UpdateData('users', $update_data, $where);

						// Display an alert
						echo "<script>alert('Data updated successfully!');</script>";
						echo "<script type='text/javascript'>window.location.href='Admin_Students';</script>";
					}


					include "Views/Admin/bottom_nav.php";
					include "Views/Admin/Students_edit.php";
					include "Views/Admin/footer.php";
					break;

				case '/LogOut':
					unset($_SESSION['User_data']);
					session_destroy();
					echo "<script type='text/javascript'>alert('Logout successfully');</script>";
					echo "<script type='text/javascript'>window.location.href='login';</script>";
					exit();
					break;

				case '/UserHome':

					if (!isset($_SESSION['User_data']) || $_SESSION['User_data']->role_id != 0) {
						echo "<script type='text/javascript'>window.location.href='login';</script>";
						exit();
					}
					$getHomeBook = $this->Select_Data('books');
					$getHomeBook = $getHomeBook['Data'];

					include "Views/user_bottom_nav.php";
					include "Views/home.php";
					include "Views/footer.php";
					break;

				case '/User_Books':
					if (!isset($_SESSION['User_data']) || $_SESSION['User_data']->role_id != 0) {
						echo "<script type='text/javascript'>window.location.href='login';</script>";
						exit();
					}
					$getBook = $this->Select_Data('books');
					$get_Books = $getBook['Data'];
					// echo "<pre>";print_r($get_Books); exit();

					include "Views/user_bottom_nav.php";
					include "Views/books.php";
					include "Views/footer.php";
					break;

				case '/Notifications':
					if (!isset($_SESSION['User_data']) || $_SESSION['User_data']->role_id != 0) {
						echo "<script type='text/javascript'>window.location.href='login';</script>";
						exit();
					}

				$notificationget = $this->Select_Data('notification');
				$notificationget = $notificationget['Data'];


					include "Views/user_bottom_nav.php";
					include "Views/notification.php";
					include "Views/footer.php";
					break;

				case '/Profile':

					$where = ['id' => $_SESSION['User_data']->id];
					$SelectData = $this->Select_Data('users', $where);

					include "Views/user_bottom_nav.php";
					include "Views/profile.php";
					include "Views/footer.php";
					break;

				case '/Edit':

					$where = ['id' => $_SESSION['User_data']->id];
					$SelectData = $this->Select_Data('users', $where);

					include "Views/user_bottom_nav.php";
					include "Views/User_Edit.php";
					include "Views/footer.php";
					break;

				default:

					break;
			}
		}
	}
}

$obj = new Controller;
