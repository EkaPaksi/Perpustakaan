<div class='panel panel-border panel-primary'>
<div class='panel-heading'> 
<h3 class='panel-title'><i class='fa fa-lock'></i> Ganti Password</h3> 
</div>  
<div class='panel-body'> 
<?php
    include "koneksi.php";
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    }
    else {
    die ("Error. No ID Selected! ");    
    }

        if (isset($_POST['Ganti'])) {
        $username        = $_POST['username'];
        $password_lama    = $_POST['password_lama'];
        $password_baru    = $_POST['password_baru'];
        $konf_password    = $_POST['konf_password'];
        //cek old password
        $query = "SELECT * FROM pengguna WHERE username='$username' AND password=md5('$password_lama')";
        $sql = mysql_query ($query);
        $hasil = mysql_num_rows ($sql);
        if (! $hasil >= 1) {
            ?>
                <script language="JavaScript">
                alert('Password lama tidak sesuai!, silahkan ulang kembali!');
                document.location='index.php';
                </script>
            <?php
                unset($_SESSION['username']);
                unset($_SESSION['level']);
                session_destroy();
        }
        //validasi data data kosong
        else if (empty($_POST['password_baru']) || empty($_POST['konf_password'])) {
                echo "<h3><font color=red>Ganti Password Gagal! Data Tidak Boleh Kosong.</font></h3>";    
        }
        //validasi input konfirm password
        else if (($_POST['password_baru']) != ($_POST['konf_password'])) {
                echo "<h3><font color=red><center>Ganti Password Gagal! Password dan Konfirm Password Harus Sama.</center></font></h3>";    
        }
        else {
        //update data
		// UPDATE `pengguna` SET `password` = MD5('1234567') WHERE `pengguna`.`username` = 'admina' 
        $query1 = "UPDATE pengguna SET password = MD5('$password_baru') WHERE username = '$username'";
        $sql1 = mysql_query ($query1);
        //setelah berhasil update
        if ($sql1) {
            echo "<h3><font color=#8BB2D9><center>Ganti Password Berhasil!</center></font></h3>";    
        } else {
            echo "<h3><font color=red><center>Ganti Password Gagal!</center></font></h3>";    
        }
        }
        }
    ?>
									<form action="#" method="POST" name="form-ganti-password" enctype="multipart/form-data">
									<?php
									if ($hasil['level']=='Administrator'){
										echo "<div class='form-group'>
                                        <label>Nama</label>
                                        <input type='text' class='form-control' name='username' id='username' value='$username'>
										</div>";
									} else {
										echo "<div class='form-group'>
                                        <input type='hidden' class='form-control' name='username' id='username' value='$username'>
										</div>";
									}
									?>
											 
									<div class="form-group">
                                        <label>Username</label>
                                        <input type="password" class="form-control" name="password_lama" id="password_lama" placeholder="Masukan Password" >
                                    </div>
									<div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="Masukan Password baru">
                                    </div>
									<div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="konf_password" id="konf_password" placeholder="Konfirmasi Password">
                                    </div>
										<input type="submit" name="Ganti" value="Ganti">
									</form>
                                     </div>
				 <?php
        mysql_close($Open);
    ?>					 
          </div>
		 