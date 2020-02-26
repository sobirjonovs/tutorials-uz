<div class="card shadow mb-4">
	<div class="card-header py-3">   
		<h6 class="m-0 font-weight-bold text-primary">Maqola qo'shish</h6>
	</div>
	    <div class="card-body">
	      <form action="/admin/blog-list/edit/<?= $id ?>" method="post" enctype="multipart/form-data">
	        	<div class="form-group">
	        	  <label for="title">Sarlavha</label>
				  <input type="text" name="title" class="form-control" value="<?= $btitle ?>">
				</div>
	        	<div class="form-group">
	        	  <label for="author">Muallif</label>
				  <input type="text" name="author" class="form-control" value="<?= $bauthor ?>">
				</div>
				<div class="form-group">
					<label for="img">Rasm</label>
                    <input type="file" name="img" class="form-control" required>
                </div>
	        	<div class="form-group mt-2">
	        	<label for="editor">Post matni</label>
				  <textarea class="form-control" name="editorr"><?= $beditor ?></textarea>
				</div>
	        	<input type="submit" name="submit" class="btn btn-primary" value="Chop etish"></input>
	       </form>
	        <script>
	                CKEDITOR.replace( 'editorr',{
	                	height: 300,
	                	filebrowserUploadUrl: '../app/views/admin/upload.php'
	                });
	        </script>
	    </div>
	</div>