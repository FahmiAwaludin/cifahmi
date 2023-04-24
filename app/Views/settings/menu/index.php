<?= $this->include('layout/page_layout') ?>

  <!-- Section Index -->
<div class="container p-3 my-3 border text-dark" style="background-color : #black;">
    <div class="row my-3 mt-3 border-dark">
            <div class="col-10">
				<br><br>
                <h2 class="h2"><b>List Menu</b></h2>
            </div>
            <div class="col-2 align-self-end border-dark">
                <p class="text-md-right border-dark">
                    <a href="#" class="btn btn-outline-primary bg-white" role="button" data-toggle="modal" data-target="#exampleModal">Add Menu</a>
                </p>
            </div>
    </div>      
    <!-- Edit Modal -->
    <div class="row card">
	<?php foreach($menus as $menu){?>
		<div class="modal fade" id="exampleModal<?=$menu['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel" style="color:black;">Edit Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>	
				<form method="POST" action="<?= base_url('settings/menu/'.$menu["id"].'/update') ?>">
					<div class="modal-body">
						<div class="form-group">
							<label for="menu_id" style="color:black;">Menu ID</label>
							<input type="text" class="form-control" id="menu_id<?=$menu['id']?>" name="menu_id" value="<?=$menu['menu_id']?>">
						</div>
                        <div class="form-group">
							<label for="menu_level" style="color:black;">Menu Level</label>
							<select class="form-control" id="menu_level<?=$menu['id']?>" name="menu_level">
								<option value="0"><?php if ($menu['menu_level'] == 0) { echo 'Main Menu'; }?></option>
								<option value="1">Sub Menu</option>
							</select>
						</div>
						<div class="form-group">
							<label for="title" style="color:black;">Title</label>
							<input type="text" class="form-control" id="title<?=$menu['id']?>" name="title" value="<?=$menu['title']?>">
						</div>
                        <div class="form-group">
							<label for="icon" style="color:black;">Icon</label>
							<input type="text" class="form-control" id="icon<?=$menu['id']?>" name="icon" value="<?=$menu['icon']?>">
						</div>
						<div class="form-group">
							<label for="link" style="color:black;">Link</label>
							<input type="text" class="form-control" id="link<?=$menu['id']?>" name="link" value="<?=$menu['link']?>">
						</div>
						<div class="form-group">
							<label for="parent_id" style="color:black;">Group Menu</label>
							<select class="form-control" id="parent_id<?=$menu['id']?>" name="parent_id">
								<option value="0">Pilih..</option>
								<?php foreach($main as $opt){?>
								<option value="<?= $opt['id'] ?>"><?= $opt['title'] ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group form-check">
							<input class="form-check-input" type="radio" name="is_active" id="is_active<?=$menu['id']?>" value="1" <?php if ($menu['is_active'] == 1) { echo 'checked="checked"'; }?>>
							<label class="form-check-label" for="is_active" style="color:black;">
								Yes
							</label> 
							&nbsp;&nbsp;&nbsp;&nbsp;
							<input class="form-check-input " type="radio" name="is_active" id="is_active<?=$menu['id']?>" value="0" <?php if ($menu['is_active'] == 0) { echo 'checked="checked"'; }?>>
							<label class="form-check-label" for="is_active" style="color:black;">
								No
							</label>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
				</div>
			</div>
		</div>
			<div class="col-12 card">
				<div class="row mt-3">
					<div class="col-10">
					<h5 class="h5"><?=$menu['title']?></h5>
					</div>
					<div class="col-2">
						<p class="text-md-right">
							<a class="btn btn-outline-warning" href="#" role="button" data-toggle="modal" data-target="#exampleModal<?=$menu['id']?>" onclick="getData(<?=$menu['id']?>)">Edit</a>
							<a class="btn btn-outline-danger" href="<?= base_url('settings/menu/'.$menu['id'].'/delete') ?>"  
							onclick="return confirm('Anda yakin ingin menghapus menu <?= $menu['title'] ?>');">Delete</a>
						</p>
					</div>
				</div>
			</div>
			<?php if($menu['sub']){ ?>
			<?php foreach($menu['sub'] as $sub){?>
				<div class="modal fade" id="exampleModal<?=$sub['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel" style="color:black;">Edit Data</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>	
						<form method="POST" action="<?= base_url('settings/menu/'.$sub["id"].'/update') ?>">
					<div class="modal-body">
						<div class="form-group">
							<label for="menu_id" style="color:black;">Menu ID</label>
							<input type="text" class="form-control" id="menu_id<?=$sub['id']?>" name="menu_id" value="<?=$sub['menu_id']?>">
						</div>
                        <div class="form-group">
							<label for="menu_level" style="color:black;">Menu Level</label>
							<select class="form-control" id="menu_level<?=$sub['id']?>" name="menu_level">
							<option value="1"><?php if ($sub['menu_level'] == 1) { echo 'Sub Menu'; }?></option>	
							<option value="0">Main Menu</option>
							</select>
						</div>
						<div class="form-group">
							<label for="title" style="color:black;">Title</label>
							<input type="text" class="form-control" id="title<?=$sub['id']?>" name="title" value="<?=$sub['title']?>">
						</div>
                        <div class="form-group">
							<label for="icon" style="color:black;">Icon</label>
							<input type="text" class="form-control" id="icon<?=$sub['id']?>" name="icon" value="<?=$sub['icon']?>">
						</div>
						<div class="form-group">
							<label for="link" style="color:black;">Link</label>
							<input type="text" class="form-control" id="link<?=$sub['id']?>" name="link" value="<?=$sub['link']?>">
						</div>
						<div class="form-group">
							<label for="parent_id" style="color:black;">Group Menu</label>
							<select class="form-control" id="parent_id<?=$sub['id']?>" name="parent_id">
								<?php foreach($main as $opt){?>
								<option value="<?= $opt['id']?>" <?php if ($sub['parent_id'] == $opt['id']) { echo ' selected="selected"'; } ?>><?=$opt['title'];?></option>

								<?php } ?>
							</select>
						</div>
						<div class="form-group form-check">
							<input class="form-check-input" type="radio" name="is_active" id="is_active<?=$sub['id']?>" value="1" <?php if ($sub['is_active'] == 1) { echo 'checked="checked"'; }?>>
							<label class="form-check-label" for="is_active" style="color:black;">
								Yes
							</label> 
							&nbsp;&nbsp;&nbsp;&nbsp;
							<input class="form-check-input " type="radio" name="is_active" id="is_active<?=$sub['id']?>" value="0" <?php if ($sub['is_active'] == 0) { echo 'checked="checked"'; }?>>
							<label class="form-check-label" for="is_active" style="color:black;">
								No
							</label>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
						</div>
					</div>
				</div>
				<div class="col-11 card align-self-end">
					<div class="row mt-3">
						<div class="col-10">
						<h5 class="h5"><?=$sub['title']?></h5>
						</div>
						<div class="col-2">
							<p class="text-md-right">
								<a class="btn btn-outline-warning" href="#" role="button" data-toggle="modal" data-target="#exampleModal<?=$sub['id']?>" onclick="getData(<?=$sub['id']?>)">Edit</a>
								<a class="btn btn-outline-danger" href="<?= base_url('settings/menu/'.$sub['id'].'/delete') ?>"  
								onclick="return confirm('Anda yakin ingin menghapus Sub menu <?= $sub['title'] ?>');">Delete</a>
							</p>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
	<?php } ?>
	</div>
    <!-- End Edit Modal -->
    <!-- Add Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" style="color:black;">Tambah Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form method="POST" action="<?= base_url('settings/menu/add') ?>">
                        <div class="modal-body">
                    <div class="form-group">
                        <label for="menu_id" style="color:black;">Menu ID</label>
                        <input type="text" class="form-control" id="menu_id" name="menu_id">
                    </div>
                    <div class="form-group">
                        <label for="menu_level" style="color:black;">Menu Level</label>
                        <select class="form-control" id="menu_level" name="menu_level">
                            <option value="">Pilih..</option>
                            <option value="0">Main Menu</option>
                            <option value="1">Sub Menu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title" style="color:black;">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="form-group" style="color:black;">
                        <label for="icon">Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon">
                    </div>
                    <div class="form-group" style="color:black;">
                        <label for="link">Link</label>
                        <input type="text" class="form-control" id="link" name="link">
                    </div>
                    <div class="form-group" style="color:black;">
                        <label for="parent_id">Group Menu</label>
                        <select class="form-control" id="parent_id" name="parent_id">
                        <option value="0">Pilih..</option>
                                    <?php foreach($main as $opt) : ?>
                                    <option value="<?= $opt['id'] ?>"><?= $opt['title'] ?></option>
                                    <?php endforeach ; ?>
                        </select>
                    </div>
                    <div class="form-group form-check">
                        <input class="form-check-input" type="radio" name="is_active" id="is_active" value="1" checked>
                        <label class="form-check-label" for="is_active" style="color:black;">
                            Yes
                        </label> 
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <input class="form-check-input " type="radio" name="is_active" id="is_active" value="0">
                        <label class="form-check-label" for="is_active" style="color:black;">
                            No
                        </label>
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
<!-- ======= Footer ======= -->

  <!-- End Footer -->
<script>
	function getData(id){
		var link = "<?= base_url('/settings/menu');?>"+"/"+id+"/edit";
		$.ajax({
			type  : 'GET',
			url   : link, //Memanggil Controller/Function
			async : false,
			dataType : 'json',
			success : function(data){
				console.log('[value='+data['is_active']+']');
				$('#menu_id'+id).val(data['menu_id']);
                $('#menu_level'+id).val(data['menu_level']).prop('selected', true);
				$('#title'+id).val(data['title']);
				$('#icon'+id).val(data['icon']);
				$('#link'+id).val(data['link']);
				$('#parent_id'+id).val(data['parent_id']).change();
				$('#is_active'+id).filter('[value='+data['is_active']+']').prop('checked', true);
			}      
		});
	}
	</script>