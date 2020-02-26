<div class="card shadow mb-4">
	<div class="card-header py-3">   
		<h6 class="m-0 font-weight-bold text-primary">Maqola qo'shish</h6>
	</div>
	    <div class="card-body">
	      <form action="/admin/add" method="post">
	        	<div class="form-group">
	        	  <label for="title">Sarlavha</label>
				  <input type="text" name="title" class="form-control">
				</div>
				<div class="form-group">
				<label for="category">Bo'limni tanlang</label>
			    <select class="custom-select" name="category" required>
			      <option value="">Katalog</option>
			      <?php foreach ($cats as $key => $value): ?>
			      	<option value="<?= $value['cat_name'] ?>"><?= $value['cat_name'] ?></option>
			      <?php endforeach ?>
			    </select>
			    <div class="invalid-feedback">Example invalid custom select feedback</div>
			    </div>
	        	<div class="form-group">
	        	  <label for="author">Muallif</label>
				  <input type="text" name="author" class="form-control">
				</div>
	        	<div class="form-group">
	        	<label for="editor">Post matni</label>
				  <textarea class="form-control" name="editor"></textarea>
				</div>
	        	<input type="submit" name="submit" class="btn btn-primary" value="Chop etish"></input>
	       </form>
	        <script>
	                CKEDITOR.replace( 'editor',{
	                	height: 300,
	                	filebrowserUploadUrl: '../app/views/admin/upload.php'
	                });
	        </script>
	    </div>
	</div>