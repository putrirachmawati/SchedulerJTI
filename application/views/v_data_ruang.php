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

        <!-- Notif (Sukses insert data, edit data, delete data) -->
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

                    <!-- Form -->
                    <?php echo form_open_multipart('Ruang'); ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Ruang</label>
                            <input type="text" class="form-control" id="nama_ruang" name="nama_ruang" value="<?= set_value('nama_ruang'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Kapasitas</label>
                            <input type="text" class="form-control" id="kapasitas" name="kapasitas" value="<?= set_value('kapasitas'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Jenis Ruang</label>
                            <select class="form-control" id="jenis_ruang" name="jenis_ruang" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <option value="">--- No Selected ---</option>
                                <option>Kelas Besar</option>
                                <option>Kelas Kecil</option>
                                <option>Workshop</option>
                                <option>Lab</option>
                            </select>
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
                    <th scope="col">Id Ruang</th>
                    <th scope="col">Nama Ruang</th>
                    <th scope="col">Kapasitas</th>
                    <th scope="col">Jenis Ruang</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($ruang as $tb) :
                ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $tb['id_ruang'] ?></td>
                        <td><?= $tb['nama_ruang'] ?></td>
                        <td><?= $tb['kapasitas'] ?></td>
                        <td><?= $tb['jenis_ruang'] ?></td>
                        <td>

                            <!-- Tombol -->
                            <!-- Edit -->
                            <a href="" class=" badge badge-success" data-toggle="modal" data-target="#exampleModal2<?= $tb['id_ruang']; ?>">edit</a> |

                            <!-- Modal edit -->
                            <div class="modal fade" id="exampleModal2<?= $tb['id_ruang']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel2">Edit <?= $title; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="<?= base_url('Ruang/edit_ruang/'); ?><?= $tb['id_ruang']; ?>" method="post">
                                                <!-- Form -->
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput2">ID Ruang</label>
                                                    <input type="text" class="form-control" class="form-control" id="id_ruang" name="id_ruang" placeholder="<?= $tb['id_ruang']; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput2">Nama Ruang</label>
                                                    <input type="text" class="form-control" class="form-control" id="nama_ruang" name="nama_ruang" value="<?= $tb['nama_ruang']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">

                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput2">Kapasitas</label>
                                                    <input type="text" class="form-control" class="form-control" id="kapasitas" name="kapasitas" value="<?= $tb['kapasitas']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Jenis Ruang</label>
                                                    <select class="form-control" id="jenis_ruang" name="jenis_ruang" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                        <option value="">--- No Selected ---</option>
                                                        <option <?php if ($tb['jenis_ruang'] == 'Kelas Besar') : ?> selected="selected" <?php endif; ?>>Kelas Besar</option>
                                                        <option <?php if ($tb['jenis_ruang'] == 'Kelas Kecil') : ?> selected="selected" <?php endif; ?>>Kelas Kecil</option>
                                                        <option <?php if ($tb['jenis_ruang'] == 'Workshop') : ?> selected="selected" <?php endif; ?>>Workshop</option>
                                                        <option <?php if ($tb['jenis_ruang'] == 'Lab') : ?> selected="selected" <?php endif; ?>>Lab</option>
                                                    </select>
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
                            <a href="<?= base_url('Ruang/delete_ruang/'); ?><?= $tb['id_ruang']; ?>" class="badge badge-danger" onclick="return confirm('Your data will be delete. Are you sure to continue?');">delete</a>

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