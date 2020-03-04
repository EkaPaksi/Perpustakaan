
<?php

$aksi="customer/proses.php";
                    $p=isset($_GET['aksi'])?$_GET['aksi']:null;
                    switch($p){
default:
echo "<div class='panel panel-border panel-primary'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-list'></i> Data Karyawan</h3> 
                                    </div>  <div class='panel-body'> 
									<p align='left'><a class='btn btn-primary' href='?p=cust&aksi=tambah'><i class='icon-plus'></i>Tambah</a>
									<a class='btn btn-primary' href='?p=cust_email'><i class='icon-plus'></i>Email Semua</a>
                                   <hr>
                                <table id='datatable' class='table table-hover'>
                                    <thead>
                                        <tr>
										    <th><i class='icon-time'></i> File </th>
                                            <th><i class='icon-time'></i> Nama </th>
                                            <th><i class='icon-signal'></i> Alias</th>
											<th><i class='icon-signal'></i> EMAIL</th>
											<th><i class='icon-signal'></i> Kirim Terakhir</th>
											<th><i class='icon-chevron-right'></i> Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
							$i=1;
							$tp=mysql_query("SELECT * FROM customer ORDER BY id");
							while($r=mysql_fetch_array($tp)){
								$time = strtotime($r["last_sent"]);
								$myFormatForView = date("d/m/Y", $time);
								$attachment = ('W:/'.($r['nama']). '.xlsx');
						    //$hargaa = $r['harga'];
								echo"<tr>";
									if (!file_exists($attachment)){
										echo "<td>&#10060;</td>";
									} else {
										echo "<td>&#10004;</td>";
									}
									echo"
                                    <td>$r[nama]</td>
									<td>$r[alias]</td>
									<td>$r[email]</td>
									<td>$myFormatForView</td>
                                    <td>
										<a class='btn btn-success' href='?p=cust_email2&id=$r[id]'><i class='icon-trash'></i>Email</a>
										<a class='btn btn-primary' href='?p=cust&aksi=edit&id=$r[id]'><i class='icon-edit'></i>Edit</a>
										<a class='btn btn-danger' href='$aksi?act=hapus&id=$r[id]'><i class='icon-trash'></i>Hapus</a>
									 </td>
                                </tr>";
								$i=$i+1;
							}       
                        echo"</tbody>
                        </table>
                                     </div><!-- /.box-body -->
          </div><!-- /.box -->   ";    

break;
case "edit":
	$edit = mysql_query("SELECT * FROM customer WHERE id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='customer/proses.php?act=update' enctype='multipart/form-data'>";
echo "<div class='panel panel-border panel-primary'>
        <div class='panel-heading'> 
         <h3 class='panel-title'><i class='fa fa-list'></i> Edit Customer</h3> 
        </div>  
		<div class='panel-body'> 
		<div class='control-group'>
			<div class='form-group'>
			<input type='hidden' class='form-control' value='$r[id]' name='id' />
			</div>
			<div class='form-group'>
			<label>Nama</label>
			<div class='span9'><input class='form-control' value='$r[nama]' type='text' name='nama' /></div>
			</div>						
			<div class='form-group'>
			<label>Alias</label>
			<div class='span9'><input class='form-control' value='$r[alias]' type='text' name='alias' /></div>
			</div>
			<div class='form-group'>
			<label>Email</label>
			<div class='span9'><input class='form-control' value='$r[email]' type='text' name='email' /></div>
			</div>
			<Br>
			<input type='submit' class='btn btn-primary' value='Update'> <a class='btn btn-danger' href='?p=cust'>Batal</a>
			</form>
			</div> 
            </div>
		</div>
		";
echo "";
break;

case "tambah":
echo "<form method='post' action='customer/proses.php?act=input' enctype='multipart/form-data'>";
echo '<div class="panel panel-border panel-primary">
                     <div class="panel-heading"> 
                        <h3 class="panel-title"><i class="fa fa-list"></i> Tambah Customer</h3> 
                     </div> 
					 <div class="panel-body"> 
						 <div class="control-group">
						   <div class="form-group">
								<label>Nama</label>
								<div class="span9"><input class="form-control" type="text" name="nama" /></div>
							</div>						
						   <div class="form-group">
								<label>Alias</label>
								<div class="span9"><input class="form-control" type="text" name="alias" /></div>
							</div>
							<div class="form-group">
								<label>EMAIL</label>
								<div class="span9"><input class="form-control" type="text" name="email" /></div>
							</div>				 
					<Br>

			<input type="submit" class="btn btn-primary" value="Tambah"> <a class="btn btn-danger" href="?p=cust">Batal</a>
		  </form>
		  <br>
		</div> 
		</div>
		</div> ';
echo "";
break;
case "email":
echo "<form method='post' action='customer/proses.php?act=mail' enctype='multipart/form-data'>";
echo"";
break;

case "mail2":						
include "../customer/mail2.php";
break;
}//penutup switch
?>    
</body>
</html>