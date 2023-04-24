<?= $this->include('layout/page_layout') ?>

  <!-- Section Index -->
<div class="container p-3 my-3 border text-dark" style="background-color : #aqua;">
    <div class="row my-3 mt-3 border-dark">
            <div class="col-10">
                <br><br><br><br>
                <h2 class="h2"><b>List Menu</b></h2>
            </div>
            <div class="col-2 align-self-end border-dark">
                <p class="text-md-right border-dark">
                    <a href="#" class="btn btn-outline-primary bg-white" role="button" data-toggle="modal" data-target="#exampleModal">Add Menu</a>
                </p>
            </div>
    </div>      
	<!-- Table -->
	<table class="table table-bordeaqua" style="background-color:black;">
        <thead>
          <tr class="table-dark text-center" >
            <th scope="col" style="background-color:black;">id</th>
            <th scope="col" style="background-color:black;">Nama Pasien</th>
            <th scope="col" style="background-color:black;">Umur</th>
            <th scope="col" style="background-color:black;">Nama Kamar</th>
            <th scope="col" style="background-color:black;">Jenis_kelamin</th>
            <th scope="col" style="background-color:black;">Jenis Kamar </th>
            <th scope="col" style="background-color:black;">Alamat</th>
            <th scope="col" style="background-color:black;">Action </th>
          </tr>
        </thead>
        <tbody>
		<?php foreach($pasien as $list => $pgw){?>
			<tr class="table-dark text-center" >
              <th scope="row = 2" style="background-color:aqua;"><?php echo $list + 1 ?></th>
              <td style="background-color:aqua;"><?php echo $pgw['nama_pasien'] ?></td>
              <td style="background-color:aqua;"><?php echo $pgw['umur'] ?></td>
              <td style="background-color:aqua;"><?php echo $pgw['nama_kamar'] ?></td>
              <td style="background-color:aqua;"> <?php
                    if ($pgw['jenis_kelamin'] == 0) {
                      echo "laki-laki";
                    } elseif ($pgw['jenis_kelamin'] == 1) {
                      echo "perempuan";
                    }
                    else {
                      echo "Not Found";
                    } ?>
              </td>
              
              <td style="background-color:aqua;"> <?php
                    if ($pgw['jenis_kamar'] == 0) {
                      echo "VIP";
                    } elseif ($pgw['jenis_kamar'] == 1) {
                      echo "REGULER";
                    }
                    else {
                      echo "Not Found";
                    } ?></td>
                
              <td style="background-color:aqua;"><?php echo $pgw['alamat'] ?></td>
              <td style="background-color:aqua;">
			  <a href="" class="btn btn-outline-warning" data-toggle="modal"
            data-target="#modal<?php echo $pgw['id']; ?>">Edit</a>
							<a class="btn btn-outline-danger" href="<?= base_url('pasien/list/'.$pgw['id'].'/delete') ?>"  
							onclick="return confirm('Anda yakin ingin menghapus jadwal <?= $pgw['nama_pasien'] ?> ?');">Delete</a>
				</td>
			<?php } ?>
		</tbody>
    	</table>
	<!-- End Table -->
	<!-- Edit Modal -->
	<?php foreach($pasien as $pgw){?>
        <!-- untuk melihat bentuk-bentuk modal kalian bisa mengunjungi laman bootstrap dan cari modal di kotak pencariannya -->
        <!-- id setiap modal juga harus berbeda, cara membedakannya dengan menggunakan id_barang -->
        <div class="modal fade" id="modal<?php echo $pgw['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Kelas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- di dalam modal-body terdapat 4 form input yang berisi data.
                    data-data tersebut ditampilkan sama seperti menampilkan data pada tabel. -->
                    <div class="modal-body">
                        <form method="POST" action="<?= base_url('pasien/list/'.$pgw["id"].'/update') ?>">
						<div class="modal-body">
                            <div class="form-group">
                                <label for="nama_pasien">Nama Pasien</label>
                                <input type="text" class="form-control" id="nama_pasien<?=$pgw['id']?>" name="nama_pasien" value="<?php echo $pgw['nama_pasien']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="umur">Umur</label>
                                <input class="form-control" rows="5" id="umur<?=$pgw['id']?>" name="umur" value="<?php echo $pgw['umur']; ?>"></input>
                            </div>
                            <div class="form-group">
                                <label for="nama_kamar">Nama Kamar</label>
                                <input type="text" class="form-control" id="nama_kamar<?=$pgw['id']?>" name="nama_kamar" value="<?php echo $pgw['nama_kamar']; ?>">
                            </div>
									<div class="form-group">
								<label for="jenis_kelamin" style="color:aqua;">jenis_kelamin</label>
								<select class="form-control" id="jenis_kelamin<?=$pgw['id']?>" name="jenis_kelamin">
									<option value="<?php $pgw['jenis_kelamin'] ?>"><?php
													if ($pgw['jenis_kelamin'] == 0) {
													echo "laki-laki";
													} elseif ($pgw['jenis_kelamin'] == 1) {
													echo "perempuan";
													} 
                                                     else {
													echo "Not Found";
													} ?></option>
									<option value="0">laki-laki</option>
									<option value="1">perempuan</option>
								</select>
							</div>
							<div class="form-group">
								<label for="jenis_kamar" style="color:aqua;">Jenis Kamar</label>
								<select class="form-control" id="jenis_kamar<?=$pgw['id']?>" name="jenis_kamar">
									<option value="<?php $pgw['jenis_kamar'] ?>"><?php
										if ($pgw['jenis_kamar'] == 0) {
										echo "VIP";
										} elseif ($pgw['jenis_kamar'] == 1) {
										echo "REGULER";
										}
                                         else {
										echo "Not Found";
										} ?></option>
									<option value="0">VIP</option>
									<option value="1">REGULER</option>
								</select>
                                <label for="alamat">Matkul</label>
                                <input type="text" class="form-control" id="alamat<?=$pgw['id']?>" name="alamat" value="<?php echo $pgw['alamat']; ?>">
                            </div>
							</div>
							<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
						</div>
						</div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
				<?php } ?>
    <!-- End Edit Modal -->
    <!-- Add Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color:aqua;">Tambah Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form method="POST" action="<?= base_url('pasien/list/add') ?>">
                        <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_pasien" style="color:aqua;">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien">
                    </div>
					<div class="form-group">
                        <label for="umur" style="color:aqua;">Umur</label>
                        <input type="text" class="form-control" id="umur" name="umur">
                    </div>
					<div class="form-group">
                        <label for="nama_kamar" style="color:aqua;">Nama Kamar</label>
                        <input type="text" class="form-control" id="nama_kamar" name="nama_kamar">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin" style="color:aqua;">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                            <option value="">Pilih..</option>
                            <option value="0">laki-laki</option>
                            <option value="1">perempuan</option>
                        </select>
                    </div>
					<div class="form-group">
                        <label for="jenis_kamar" style="color:aqua;">Jenis Kamar</label>
                        <select class="form-control" id="jenis_kamar" name="jenis_kamar">
                            <option value="">Pilih..</option>
                            <option value="0">1</option>
							<option value="1">2</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat" style="color:aqua;">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                          <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- End Add Modal -->
	
    <!-- End Row Card Box -->
    
</div>
  <!-- End Section Index -->
  <br><br><br><br><br><br><br><br><br>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- ======= Footer ======= -->

  <!-- End Footer -->
<script>
	function getData(id){
		var link = "<?= base_url('/pasien/list');?>"+"/"+id+"/edit";
		$.ajax({
			type  : 'GET',
			url   : link, //Memanggil Controller/Function
			async : false,
			dataType : 'json',
			success : function(data){
				console.log('[value='+data['is_active']+']');
				$('#nama_pasien'+id).val(data['nama_pasien']);
				$('#umur'+id).val(data['umur']);
				$('#nama_kamar'+id).val(data['nama_kamar']);
				$('#jenis_kelamin'+id).val(data['jenis_kelamin']).prop('selected', true);
				$('#jenis_kamar'+id).val(data['jenis_kamar']).prop('selected', true);
				$('#alamat'+id).val(data['alamat']).change();
				
			}      
		});
	}
	</script>