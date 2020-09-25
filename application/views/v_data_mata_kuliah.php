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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add <?= $title; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Ruang</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Kapasitas</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Jenis Ruangan</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option>Kuliah Bersama</option>
                                    <option>Workshop</option>
                                    <option>Praktek</option>
                                </select>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>

    </div>

</div>
<!-- End of Begin Page -->

</div>
<!-- End of Main Content -->