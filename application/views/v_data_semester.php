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
                    <?php echo form_open_multipart('Semester'); ?>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Tahun Akademik</label>
                            <select class="form-control" name="id_tahun_akademik" id="id_tahun_akademik" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <option value="">--- No Selected ---</option>
                                <?php foreach ($TahunAkademik as $ta) : ?>
                                    <option value="<?php echo $ta['id_tahun_akademik']; ?>">
                                        <?php echo $ta['nama_tahun_akademik']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Semester</label>
                            <input type="text" class="form-control" class="form-control" id="nama_semester" name="nama_semester" value="<?= set_value('nama_semester'); ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
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
                    <th scope="col">Id Semester</th>
                    <th scope="col">Id Tahun Akademik</th>
                    <th scope="col">Nama Semester</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($semester as $tb) :
                ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $tb['id_semester'] ?></td>
                        <td><?= $tb['id_tahun_akademik'] ?></td>
                        <td><?= $tb['nama_semester'] ?></td>
                        <td>

                            <!-- Tombol -->
                            <!-- Edit -->
                            <a href="" class=" badge badge-success" data-toggle="modal" data-target="#exampleModal2<?= $tb['id_semester']; ?>">edit</a> |

                            <!-- Modal edit -->
                            <div class="modal fade" id="exampleModal2<?= $tb['id_semester']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel2">Edit <?= $title; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="<?= base_url('Semester/edit_semester/'); ?><?= $tb['id_semester']; ?>" method="post">
                                                <!-- Form -->
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput2">Id Semester</label>
                                                    <input type="text" class="form-control" class="form-control" id="id_semester" name="id_semester" placeholder="<?= $tb['id_semester']; ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect2">Tahun Akademik</label>
                                                    <select class="form-control" name="id_tahun_akademik" id="id_tahun_akademik" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                        <option value="">--- No Selected ---</option>
                                                        <?php foreach ($TahunAkademik as $ta) : ?>
                                                            <option value="<?php echo $ta['id_tahun_akademik']; ?>" <?php if ($ta['id_tahun_akademik'] == $tb['id_tahun_akademik']) : ?> selected="selected" <?php endif; ?>>
                                                                <?php echo $ta['nama_tahun_akademik']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlInput2">Nama Semester</label>
                                                    <input type="text" class="form-control" class="form-control" id="nama_semester" name="nama_semester" value="<?= $tb['nama_semester']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
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
                            <a href="<?= base_url('Semester/delete_semester/'); ?><?= $tb['id_semester']; ?>" class="badge badge-danger" onclick="return confirm('Your data will be delete. Are you sure to continue?');">delete</a>

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