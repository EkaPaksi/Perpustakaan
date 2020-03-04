
<div class='panel panel-border panel-primary'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-user-plus'></i> Tambah User</h3> 
                                    </div>  <div class='panel-body'> <?php
if(isset($_POST['username'])){
$passasli=$_POST['password'];
$password=md5($passasli);
$username	= $_POST['username'];
$nama		= $_POST['nama'];
$level		= $_POST['level'];
$cekuser = mysql_query("SELECT * FROM pengguna WHERE username = '$username'");  
  if(mysql_num_rows($cekuser) <> 0) {
 echo "ERROR : Username sudah terdaftar";
  }else{
	
	$input = mysql_query("INSERT INTO pengguna VALUES(NULL, '$nama','$username', '$password', '$level')") or die(mysql_error());
	if($input){
		
		echo '<div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><b>Tambah Karyawan Berhasil!</b></h4>';		//Pesan jika proses tambah sukses
		echo '
		============================<Br>
		<b>Info Karyawan</b><br>
		Nama : <b>'.$nama.'</b><br>
		============================<Br>
		<b>Info Akun </b><br>
		Username : <b>'.$username.'</b><br>
		Password : <b>'.$passasli.'</b><br>
		</div>
		
		';	
	}else{
		
		echo 'Gagal menambahkan data! ';	
		echo '<a href="tambah.php">Kembali</a>';	
		
	}
  }
}
?>
									<form method="post">
									<div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Karyawan" required>
                                    </div>
											 
									<div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Masukan Username" required>
                                    </div>
									<div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Masukan Password" required>
                                    </div>
									<div class="form-group">
                                        <label>Level</label>
                                        <select name="level">
											<option value="Administrator">Administrator</option>
											<option value="Karyawan">Karyawan</option>
										  </select>
                                    </div>
										<button type="submit" class="btn btn-primary waves-effect waves-light">Tambah</button>
									</form>
                                     </div>
									 
          </div>
		 