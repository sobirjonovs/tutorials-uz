<script>
$(document).ready(function() {
    $('#dataTable').DataTable( {
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
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Blog maqolalar ro'yhati</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Ko'rishlar</th>
                      <th>Muallif</th>
                      <th>Sana</th>
                      <th>Rasm</th>
                      <th>URL</th>
                      <th width="22%">Harakat</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nom</th>
                      <th>Ko'rishlar</th>
                      <th>Muallif</th>
                      <th>Sana</th>
                      <th>Rasm</th>
                      <th>URL</th>
                      <th width="22%">Harakat</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($bloglist as $key => $blog): ?>
                      <tr>
                      <td><?= $blog['blog_title'] ?></td>
                      <td><?= $blog['blog_views'] ?></td>
                      <td><?= $blog['blog_post_author'] ?></td>
                      <td><?= $blog['blog_post_date'] ?></td>
                      <td><?= $blog['blog_post_img'] ?></td>
                      <td><?= $blog['blog_post_slug'] ?></td>
                      <td>
                 <a href="/admin/blog-list/delete/<?= $blog['blog_id'] ?>" type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> O'chirish</a>
                 <a href="/admin/blog-list/edit/<?= $blog['blog_id'] ?>" type="submit" class="btn btn-success btn-sm"><i class="far fa-edit"></i> Tahrirlash</a>
                       </td> 
                    </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>