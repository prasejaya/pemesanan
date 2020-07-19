<?php   
  include "config/koneksi.php";  
  $response = array();  
  if(isset($_GET['apicall'])){  
  switch($_GET['apicall']){  
  case 'signup':  
    if(isTheseParametersAvailable(array('username','password'))){  
    $username = $_POST['username'];   
    $email = $_POST['email'];   
    $password = $_POST['password'];  
    $alamat = $_POST['alamat'];
    $nama = $_POST['nama'];   
   
    $stmt = $conn->prepare("SELECT kode FROM user WHERE username = ? OR email = ?");  
    $stmt->bind_param("ss", $username, $email);  
    $stmt->execute();  
    $stmt->store_result();  
   
    if($stmt->num_rows > 0){  
        $response['error'] = true;  
        $response['message'] = 'User already registered';  
        $stmt->close();  
    }  
    else{
		$kode = getRandomString();
		$level = 'User'  
        $stmt = $conn->prepare("INSERT INTO user (username, email, password, alamat,kode,level,nama_user) VALUES (?, ?, ?, ?,?,?,?)");  
        $stmt->bind_param("ssss", $username, $email, $password, $gender,$kode,$level,$nama);  
   
        if($stmt->execute()){  
            $stmt = $conn->prepare("SELECT kode, username, email, alamat,nama_user FROM users WHERE username = ?");   
            $stmt->bind_param("s",$username);  
            $stmt->execute();  
            $stmt->bind_result($id, $username, $email, $alamat,$nama);  
            $stmt->fetch();  
   
            $user = array(  
            'kode'=>$id,   
            'username'=>$username,   
            'email'=>$email, 
            'nama_user'=>$nama, 
            'alamat'=>$alamat  
            );  
   
            $stmt->close();  
   
            $response['error'] = false;   
            $response['message'] = 'User registered successfully';   
            $response['user'] = $user;   
        }  
    }  
   
}  
else{  
    $response['error'] = true;   
    $response['message'] = 'required parameters are not available';   
}  
break;   
case 'login':  
  if(isTheseParametersAvailable(array('username', 'password'))){  
    $username = $_POST['username'];  
    $password = md5($_POST['password']);   
   
    $stmt = $conn->prepare("SELECT kode, username, email, nama_user, alamat FROM users WHERE username = ? AND password = ?");  
    $stmt->bind_param("ss",$username, $password);  
    $stmt->execute();  
    $stmt->store_result();  
    if($stmt->num_rows > 0){  
    $stmt->bind_result($id, $username, $email, $alamat);  
    $stmt->fetch();  
    $user = array(  
    'id'=>$id,   
    'username'=>$username,   
    'email'=>$email,  
    'alamat'=>$alamat,
    'nama_user'=>$nama,  
    );  
   
    $response['error'] = false;   
    $response['message'] = 'Login successfull';   
    $response['user'] = $user;   
 }  
 else{  
    $response['error'] = false;   
    $response['message'] = 'Invalid username or password';  
 }  
}  
break;   
default:   
 $response['error'] = true;   
 $response['message'] = 'Invalid Operation Called';  
}  
}  
else{  
 $response['error'] = true;   
 $response['message'] = 'Invalid API Call';  
}  
echo json_encode($response);  
function isTheseParametersAvailable($params){  
foreach($params as $param){  
 if(!isset($_POST[$param])){  
     return false;   
  }  
}  
return true;   
}

function getRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';

    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string;
}  
?>  
