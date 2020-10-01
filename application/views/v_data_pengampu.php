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
                            <select class="form-control" name="id_prodi" id="id_prodi" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                <option value="">--- No Selected ---</option>
                                <?php foreach ($dosen as $dosen) : ?>
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
                                <?php foreach ($prodi as $prodi) : ?>
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
                                <?php foreach ($semester as $semester) : ?>
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
                                <?php foreach ($golongan as $golongan) : ?>
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
                            <a href="" class=" badge badge-success" data-toggle="modal" data-target="#exampleModal2<?= $tb['id_mata_kuliah']; ?>">edit</a> |

                            <!-- Modal edit -->
                            <div class="modal fade" id="exampleModal2<?= $tb['id_mata_kuliah']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel2">Edit <?= $title; ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="<?= base_url('MataKuliah/edit_mata_kuliah/'); ?><?= $tb['id_mata_kuliah']; ?>" method="post">
                                                <!-- Form -->
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput2">Id Mata Kuliah</label>
                                                    <input type="text" class="form-control" class="form-control" id="id_mata_kuliah" name="id_mata_kuliah" placeholder="<?= $tb['id_mata_kuliah']; ?>" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Prodi</label>
                                                    <select class="form-control" name="id_prodi" id="id_prodi" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                        <option value="">--- No Selected ---</option>
                                                        <?php foreach ($prodi as $row) : ?>
                                                            <option value="<?php echo $row['id_prodi']; ?>" <?php if ($row['id_prodi'] == $tb['id_prodi']) : ?> selected="selected" <?php endif; ?>>
                                                                <?php echo $row['nama_prodi']; ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput2">Kode Mata Kuliah</label>
                                                    <input type="text" class="form-control" class="form-control" id="kode_mata_kuliah" name="kode_mata_kuliah" value="<?= $tb['kode_mata_kuliah']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput2">Nama Mata Kuliah</label>
                                                    <input type="text" class="form-control" class="form-control" id="nama_mata_kuliah" name="nama_mata_kuliah" value="<?= $tb['nama_mata_kuliah']; ?>" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Semester</label>
                                                    <select class="form-control" id="semester" name="semester" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                        <option value="">--- No Selected ---</option>
                                                        <option <?php if ($tb['semester'] == 'Semester 1') : ?> selected="selected" <?php endif; ?>>Semester 1</option>
                                                        <option <?php if ($tb['semester'] == 'Semester 2') : ?> selected="selected" <?php endif; ?>>Semester 2</option>
                                                        <option <?php if ($tb['semester'] == 'Semester 3') : ?> selected="selected" <?php endif; ?>>Semester 3</option>
                                                        <option <?php if ($tb['semester'] == 'Semester 4') : ?> selected="selected" <?php endif; ?>>Semester 4</option>
                                                        <option <?php if ($tb['semester'] == 'Semester 5') : ?> selected="selected" <?php endif; ?>>Semester 5</option>
                                                        <option <?php if ($tb['semester'] == 'Semester 6') : ?> selected="selected" <?php endif; ?>>Semester 6</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Jenis Mata Kuliah</label>
                                                    <select class="form-control" id="jenis_mata_kuliah" name="jenis_mata_kuliah" required oninvalid="this.setCustomValidity('data tidak boleh kosong')" oninput="setCustomValidity('')">
                                                        <option value="">--- No Selected ---</option>
                                                        <option <?php if ($tb['jenis_mata_kuliah'] == 'Teori') : ?> selected="selected" <?php endif; ?>>Teori</option>
                                                        <option <?php if ($tb['jenis_mata_kuliah'] == 'Workshop') : ?> selected="selected" <?php endif; ?>>Workshop</option>
                                                        <option <?php if ($tb['jenis_mata_kuliah'] == 'Praktikum') : ?> selected="selected" <?php endif; ?>>Praktikum</option>
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
                            <a href="<?= base_url('MataKuliah/delete_mata_kuliah/'); ?><?= $tb['id_mata_kuliah']; ?>" class="badge badge-danger" onclick="return confirm('Your data will be delete. Are you sure to continue?');">delete</a>

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