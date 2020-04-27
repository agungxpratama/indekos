<div class="container-fluid">

         <!-- DataTales Example -->
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h1 class="h3 mb-0 text-gray-800">Data Kamar</h1>
           <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" type="button" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Kamar</a>
         </div>
         <div class="card shadow mb-4">
           <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Keterangan Kamar <?= $kamar->kode_kamar ?></h6>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                 <table class="table" width="100%" cellspacing="0">
                     <form class="" action="<?= base_url('index.php/pemilik/update_kamar') ?>" method="post">
                         <tr>
                             <th width="20%">Kode Kamar</th>
                             <th><input class="form-control bg-light border-1 small" type="hidden" name="kode_kamar" value="<?= $kamar->kode_kamar ?>"><?= $kamar->kode_kamar ?></th>
                         </tr>
                         <tr>
                             <td>Harga</td>
                             <th><input class="form-control bg-light border-1 small" type="text" name="harga" value="<?= $kamar->harga ?>"></th>
                         </tr>
                         <tr>
                             <td>Deskripsi</td>
                             <th><input class="form-control bg-light border-1 small" type="text" name="deskripsi" value="<?= $kamar->deskripsi ?>"></th>
                         </tr>
                         <tr>
                             <td>Status</td>
                             <th><input class="form-control bg-light border-1 small" type="text" name="status" value="<?= $kamar->status ?>"></th>
                         </tr>
                         <tr>
                             <td>Tanggal Tersedia</td>
                             <th><input class="form-control bg-light border-1 small" type="date" name="tgl_tersedia" value="<?= $kamar->tgl_tersedia ?>"></th>
                         </tr>
                         <tr>
                             <td>
                                 <button class="btn btn-primary" type="submit" name="button">Update</button>
                                 <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="button" data-toggle="modal" data-target="#myModal2"><i class="fas fa-pen fa-sm text-white-50"></i> Edit Kos</a> -->
                             </td>
                         </tr>
                     </form>
                 </table>
               </div>
               <hr>
           </div>

       </div>
       <!-- /.container-fluid -->

     </div>
     <!-- End of Main Content -->

   </div>
   <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->
