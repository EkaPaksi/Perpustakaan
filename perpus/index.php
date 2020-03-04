
<?php
$query = mysql_query("SELECT * FROM pengguna WHERE username = '$usr'");
$hasil = mysql_fetch_array($query);
if (empty($hasil['username'])) {
    header('Location: ./login.php');
}
$aksi="perpus/proses.php";
                    $p=isset($_GET['aksi'])?$_GET['aksi']:null;
                    switch($p){
default:
echo "<div class='panel panel-border panel-primary'>
                                    <div class='panel-heading'> 
                                        <h3 class='panel-title'><i class='fa fa-list'></i> Data Buku</h3> 
                                    </div>  <div class='panel-body'> 
									<p align='left'><a class='btn btn-primary' href='?p=perpus&aksi=tambah'><i class='icon-plus'></i>Tambah</a>
                                   <hr>
                                <table id='datatable' class='table table-hover'>
                                    <thead>
                                        <tr>
										    <th><i class='icon-time'></i> Judul </th>
                                            <th><i class='icon-time'></i> Pengarang </th>
                                            <th><i class='icon-signal'></i> Tahun terbit</th>
											<th><i class='icon-chevron-right'></i> Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
							$i=1;
							$tp=mysql_query("SELECT * FROM perpus ORDER BY id");
							while($r=mysql_fetch_array($tp)){
								echo"<tr>";
									echo"
                                    <td>$r[judul]</td>
									<td>$r[pengarang]</td>
									<td>$r[thn_terbit]</td>
                                    <td>";
									if ($hasil['level']=='Administrator'){
										echo "<a class='btn btn-success' href='?p=perpus&aksi=view&id=$r[id]'><i class='icon-trash'></i>Baca</a>
										<a class='btn btn-primary' href='?p=perpus&aksi=edit&id=$r[id]'><i class='icon-edit'></i>Edit</a>
										<a class='btn btn-danger' href='$aksi?act=hapus&id=$r[id]'><i class='icon-trash'></i>Hapus</a>";
									} else {
										echo"<a class='btn btn-danger' href='?p=perpus&aksi=view&id=$r[id]'><i class='icon-trash'></i>Baca</a>";
									}";
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
	$edit = mysql_query("SELECT * FROM perpus WHERE id='$_GET[id]'");
    $r    = mysql_fetch_array($edit);
echo "<form method='post' action='perpus/proses.php?act=update' enctype='multipart/form-data'>";
echo "<div class='panel panel-border panel-primary'>
        <div class='panel-heading'> 
         <h3 class='panel-title'><i class='fa fa-list'></i> Edit Buku</h3> 
        </div>  
		<div class='panel-body'> 
		<div class='control-group'>
			<div class='form-group'>
			<input type='hidden' class='form-control' value='$r[id]' name='id' />
			<input type='hidden' class='form-control' value='$hasil[username]' name='edit_user' />
			</div>
			<div class='form-group'>
			<label>Judul Buku</label>
			<div class='span9'><input class='form-control' value='$r[judul]' type='text' name='judul' /></div>
			</div>	
			<div class='form-group'>
			<label>Pengarang</label>
			<div class='span9'><input class='form-control' value='$r[pengarang]' type='text' name='pengarang' /></div>
			</div>	
			<div class='form-group'>
			<label>Penerbit</label>
			<div class='span9'><input class='form-control' value='$r[penerbit]' type='text' name='penerbit' /></div>
			</div>	
			<div class='form-group'>
			<label>Tahun Terbit</label>
			<div class='span9'><input class='form-control' value='$r[thn_terbit]' type='date' name='thn_terbit' /></div>
			</div>	
			<div class='form-group'>
			<label>Abstrak</label>
			<div class='span9'><textarea class='form-control' value='$r[abstrak]' type='text' name='abstrak'>$r[abstrak]</textarea></div>
			</div>	
			<div class='form-group'>
			<label>File</label>
			<div class='span9'>
			<input type='checkbox' name='ubah_foto' value='true'> Ceklis jika ingin mengubah File<br>
			<input class='form-control' id='file' type='file' name='file' />
			<input name='x' type='hidden' id='x' value='$r[file]'</div>
			</div>	
			<Br>
			<input type='submit' class='btn btn-primary' value='Update'> <a class='btn btn-danger' href='?p=perpus'>Batal</a>
			</form>
			</div> 
            </div>
		</div>
		";
echo "";
break;

case "tambah":
echo "<form method='post' action='perpus/proses.php?act=input' enctype='multipart/form-data'>";
echo "<div class='panel panel-border panel-primary'>
                     <div class='panel-heading'> 
                        <h3 class='panel-title'><i class='fa fa-list'></i> Tambah Buku</h3> 
                     </div> 
					 <div class='panel-body'> 
						 <div class='control-group'>
						   <div class='form-group'>
								<label>Judul Buku</label>
								<div class='span9'><input class='form-control' type='text' name='judul' />
								<input class='form-control' type='hidden' name='create_user' value='$hasil[username]' /></div>
							</div>
							 <div class='form-group'>
								<label>Pengarang</label>
								<div class='span9'><input class='form-control' type='text' name='pengarang' /></div>
							</div>	
							<div class='form-group'>
								<label>Penerbit</label>
								<div class='span9'><input class='form-control' type='text' name='penerbit' /></div>
							</div>
							<div class='form-group'>
								<label>Tahun Terbit</label>
								<div class='span9'><input class='form-control' type='date' name='thn_terbit' /></div>
							</div>
							<div class='form-group'>
								<label>Abstrak</label>
								<div class='span9'><textarea class='form-control' type='text' name='abstrak'></textarea></div>
							</div>
							<div class='form-group'>
								<label>File</label>
								<div class='span9'><input class='form-control' type='file' name='file'/></div>
							</div>
							
					<Br>

			<input type='submit' class='btn btn-primary' value='Tambah'> <a class='btn btn-danger' href='?p=perpus'>Batal</a>
		  </form>
		  <br>
		</div> 
		</div>
		</div> ";
echo "";
break;

case "view":
	$qry = mysql_query("SELECT * FROM perpus WHERE id='$_GET[id]'");
    $ee    = mysql_fetch_array($qry);
echo "<div class='panel panel-border panel-primary'>
					 <div class='panel-body'> 
						 <div class='control-group'>
						   <div class='form-group'>
								<label>$ee[judul]</label>
								<embed src='./upload/$ee[file]' type='application/pdf' width='100%' height='700px'/></embed>
							</div>		
					<Br>
		  </form>
		  <br>
		</div> 
		</div>
		</div> ";
echo "";
break;
}//penutup switch
?>    
</body>
</html>