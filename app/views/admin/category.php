<script>
$(document).ready(function() {
    $('#catTable').DataTable( {
    	responsive: true,
        "language": {
            "sEmptyTable":      "Ma'lumot topilmadi",
            "sInfo":            "Umumiy _TOTAL_ yozuvlardan _START_ dan _END_ gachasi ko'rsatilmoqda",
            "sInfoEmpty":       "Umumiy 0 yozuvlardan 0 dan 0 gachasi ko'rsatilmoqda",
            "sInfoFiltered":    "(_MAX_ yozuvlardan filtrlandi)",
            "sInfoPostFix":     "",
            "sLengthMenu":      "_MENU_ ta yozuvlarni ko'rsat",
            "sLoadingRecords":  "Yozuvlar yuklanmoqda...",
            "sProcessing":      "Ishlayapman...",
            "sSearch":          "Izlash:",
            "sZeroRecords":     "Ma'lumot yo'q.",
            "oPaginate": {
                "sFirst":       "Birinchi",
                "sPrevious":    "Avvalgi",
                "sNext":        "Keyingi",
                "sLast":        "Son'ggi"
            },
            "oAria": {
                "sSortAscending":  ": to'g'ri tartiblash",
                "sSortDescending": ": teskari tartiblash"
            }
        }
    } );
} );
                </script>
          <div class="card shadow mb-4">
            <div class="d-flex justify-content-between card-header py-3">
              <h6 class="mt-2 font-weight-bold text-primary">Kategoriyalar ro'yhati</h6><!-- Button trigger modal -->
				<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
				  <i class="fas fa-plus"></i> Qo'shish
				</button>

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Kategoriya qo'shish</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <form action="/admin/category" method="POST">
				      <div class="modal-body">
						  <div class="form-group">
						    <label for="cat_name">Kategoriya nomi:</label>
						    <input type="text" class="form-control" name="cat_name">
						  </div>
						  <div class="form-group">
						    <label for="cat_image_path">Kategoriya uchun rasm:</label>
						    <input type="text" class="form-control" name="cat_image_path">
						  </div>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Yopish</button>
				        <input type="submit" name="add_cat" class="btn btn-primary" value="Saqlash">
				      </div>
				      </form>
				    </div>
				  </div>
				</div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="catTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Rasm</th>
                      <th width="23%">Harakat</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Nom</th>
                      <th>Rasm</th>
                      <th width="23%">Harakat</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($catlist as $key => $cat): ?>
                      <tr>
                      <td><?= ($key+1) ?></td>
                      <td><?= $cat['cat_name'] ?></td>
                      <td><?= $cat['cat_image_path'] ?></td>
                      <td>
			           <a href="/admin/category/delete/<?= $cat['id'] ?>" type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> O'chirish</a>
			           <a href="/admin/category/edit/<?= $cat['id'] ?>" type="submit" class="btn btn-success btn-sm"><i class="far fa-edit"></i> Tahrirlash</a>
                       </td>    
                   </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>