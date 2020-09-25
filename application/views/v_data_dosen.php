<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row">
      <div class="col-lg-3 mb-3">
        <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
          <i class="fas fa-fw fa-plus"></i>
          Add Data
        </button>
      </div>
    </div>

    <!-- Sukses Tambah Data -->
    <?= $this->session->flashdata('message'); ?>

    <!-- Modal Insert -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add <?= $title; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php echo form_open_multipart('Admin/data_dosen'); ?>
          <div class="modal-body">
            <!-- Form -->
            <div class="form-group">
              <label for="exampleFormControlInput1">Nama Dosen</label>
              <input type="text" class="form-control" class="form-control" id="nama_dosen" name="nama_dosen" value="<?= set_value('nama_dosen'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">

            </div>
            <div class="form-group">
              <label for="exampleFormControlInput1">NIP</label>
              <input type="text" class="form-control" class="form-control" id="nip" name="nip" value="<?= set_value('nip'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Akhir Modal Insert -->

    <table class="table">
      <thead class="thead-light">
        <tr>
          <th scope="col">No</th>
          <th scope="col">ID Dosen</th>
          <th scope="col">Nama Dosen</th>
          <th scope="col">NIP</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($dosen as $tb) :
        ?>
          <tr>
            <th scope="row"><?= $no++ ?></th>
            <td><?= $tb['id_dosen'] ?></td>
            <td><?= $tb['nama_dosen'] ?></td>
            <td><?= $tb['nip'] ?></td>
            <td>

              <!-- Tombol -->
              <!-- Edit -->
              <a href="" class=" badge badge-success" data-toggle="modal" data-target="#exampleModal2<?= $tb['id_dosen']; ?>">edit</a> |

              <!-- Modal edit -->
              <div class="modal fade" id="exampleModal2<?= $tb['id_dosen']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel2">Edit <?= $title; ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      <form action="<?= base_url('Admin/edit_dosen/'); ?><?= $tb['id_dosen']; ?>" method="post">
                        <!-- Form -->
                        <div class="form-group">
                          <label for="exampleFormControlInput2">ID Dosen</label>
                          <input type="text" class="form-control" class="form-control" id="id_dosen" name="id_dosen" placeholder="<?= $tb['id_dosen']; ?>" readonly>

                          <div class="form-group">
                            <label for="exampleFormControlInput2">Nama Dosen</label>
                            <input type="text" class="form-control" class="form-control" id="nama_dosen" name="nama_dosen" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">

                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlInput2">NIP</label>
                            <input type="text" class="form-control" class="form-control" id="nip" name="nip" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Akhir Modal Edit -->

              <!-- Delete -->
              <a href="<?= base_url('Admin/delete_dosen/'); ?><?= $tb['id_dosen']; ?>" class="badge badge-danger" onclick="return confirm('Your data will be delete. Are you sure to continue?');">delete</a>

            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>



  </div>
</div>
<!-- End of Begin Page -->

</div>
<!-- End of Main Content -->