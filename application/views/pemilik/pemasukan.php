<div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pemasukan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <!-- <?php print_r($result) ?> -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Transaksi</th>
                      <th>Tagihan Sewa</th>
                      <th>Tanggal Bayar</th>
                      <th>Status Bayar</th>
                      <th>Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      $no = 0;
                      foreach ($result as $r):
                          $no++?>
                          <tr>
                              <td><?= $no ?></td>
                              <td><?= $no ?></td>
                              <td><?= $r->total_bayar ?></td>
                              <td><?= $r->tgl_bayar ?></td>
                              <td><?= $r->status ?></td>
                              <td></td>
                          </tr>
                      <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
