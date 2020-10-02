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
                    <?php echo form_open_multipart('Pengampu'); ?>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Dosen</label>
                            <select class="form-control" name="id_dosen" id="id_dosen" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <option value="">--- No Selected ---</option>
                                <?php foreach ($dos as $dosen) : ?>
                                    <option value="<?php echo $dosen['id_dosen']; ?>">
                                        <?php echo $dosen['nama_dosen']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Mata Kuliah</label>
                            <select class="form-control" name="id_mata_kuliah" id="id_mata_kuliah" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <option value="">--- No Selected ---</option>
                                <?php foreach ($MataKuliah as $matkul) : ?>
                                    <option value="<?php echo $matkul['id_mata_kuliah']; ?>">
                                        <?php echo $matkul['nama_mata_kuliah']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Program Studi</label>
                            <select class="form-control" name="id_prodi" id="id_prodi" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <option value="">--- No Selected ---</option>
                                <?php foreach ($prod as $prodi) : ?>
                                    <option value="<?php echo $prodi['id_prodi']; ?>">
                                        <?php echo $prodi['nama_prodi']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Semester</label>
                            <select class="form-control" name="id_semester" id="id_semester" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <option value="">--- No Selected ---</option>
                                <?php foreach ($sem as $semester) : ?>
                                    <option value="<?php echo $semester['id_semester']; ?>">
                                        <?php echo $semester['nama_semester']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Golongan</label>
                            <select class="form-control" name="id_golongan" id="id_golongan" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <option value="">--- No Selected ---</option>
                                <?php foreach ($gol as $golongan) : ?>
                                    <option value="<?php echo $golongan['id_golongan']; ?>">
                                        <?php echo $golongan['nama_golongan']; ?>
                                    </option>
                                <?php endforeach; ?>
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
                    <th scope="col">Id Pengampu</th>
                    <th scope="col">Id Dosen</th>
                    <th scope="col">Id Matkul</th>
                    <th scope="col">Id Prodi</th>
                    <th scope="col">Id Semester</th>
                    <th scope="col">Id Golongan</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($pengampu as $tb) :
                ?>
                    <tr>
                        <th scope="row"><?= $no++ ?></th>
                        <td><?= $tb['id_pengampu'] ?></td>
                        <td><?= $tb['id_dosen'] ?></td>
                        <td><?= $tb['id_mata_kuliah'] ?></td>
                        <td><?= $tb['id_prodi'] ?></td>
                        <td><?= $tb['id_semester'] ?></td>
                        <td><?= $tb['id_golongan'] ?></td>
                        <td>

                            <!-- Tombol -->
                            <!-- Edit -->
                            <a href="" class=" badge badge-success" data-toggle="modal" data-target="#exampleModal2<?= $tb['id_pengampu']; ?>">edit</a> |

                            <!-- Modal edit -->
                            <div class="modal fade" id="exampleModal2<?= $tb['id_pengampu']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel2">Edit <?= $title; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="<?= base_url('Pengampu/edit_pengampu/'); ?><?= $tb['id_pengampu']; ?>" method="post">
                                                <!-- Form -->
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput2">Id Pengampu</label>
                                                    <input type="text" class="form-control" class="form-control" id="id_pengampu" name="id_pengampu" placeholder="<?= $tb['id_pengampu']; ?>" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect2">Dosen</label>
                                                    <select class="form-control" name="id_dosen" id="id_dosen" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                        <option value="">--- No Selected ---</option>
                                                        <?php foreach ($dos as $dos) : ?>
                                                            <option value="<?php echo $dos['id_dosen']; ?>" <?php if ($dos['id_dosen'] == $tb['id_dosen']) : ?> selected="selected" <?php endif; ?>>
                                                                <?php echo $dos['nama_dosen']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect2">Mata Kuliah</label>
                                                    <select class="form-control" name="id_mata_kuliah" id="id_mata_kuliah" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                        <option value="">--- No Selected ---</option>
                                                        <?php foreach ($MataKuliah as $row) : ?>
                                                            <option value="<?php echo $row['id_mata_kuliah']; ?>" <?php if ($row['id_mata_kuliah'] == $tb['id_mata_kuliah']) : ?> selected="selected" <?php endif; ?>>
                                                                <?php echo $row['nama_mata_kuliah']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect2">Program Studi</label>
                                                    <select class="form-control" name="id_prodi" id="id_prodi" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                        <option value="">--- No Selected ---</option>
                                                        <?php foreach ($prod as $prod) : ?>
                                                            <option value="<?php echo $prod['id_prodi']; ?>" <?php if ($prod['id_prodi'] == $tb['id_prodi']) : ?> selected="selected" <?php endif; ?>>
                                                                <?php echo $prod['nama_prodi']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect2">Semester</label>
                                                    <select class="form-control" name="id_semester" id="id_semester" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                        <option value="">--- No Selected ---</option>
                                                        <?php foreach ($sem as $sem) : ?>
                                                            <option value="<?php echo $sem['id_semester']; ?>" <?php if ($sem['id_semester'] == $tb['id_semester']) : ?> selected="selected" <?php endif; ?>>
                                                                <?php echo $sem['nama_semester']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect2">Golongan</label>
                                                    <select class="form-control" name="id_golongan" id="id_golongan" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                        <option value="">--- No Selected ---</option>
                                                        <?php foreach ($gol as $gol) : ?>
                                                            <option value="<?php echo $gol['id_golongan']; ?>" <?php if ($gol['id_golongan'] == $tb['id_golongan']) : ?> selected="selected" <?php endif; ?>>
                                                                <?php echo $gol['nama_golongan']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
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
                            <a href="<?= base_url('Pengampu/delete_pengampu/'); ?><?= $tb['id_pengampu']; ?>" class="badge badge-danger" onclick="return confirm('Your data will be delete. Are you sure to continue?');">delete</a>

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