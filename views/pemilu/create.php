<div class="content-wrapper">

    <section class="content-header">

        <div class="container-fluid">

            <div class="row mb-2">

                <div class="col-sm-6">

                    <h1><?= $data['title']; ?></h1>

                </div>

            </div>

        </div>

    </section>

    <section class="content">

        <div class="card card-primary">

            <div class="card-header">

                <h3 class="card-title"><?= $data['title']; ?></h3>

            </div>

            <form role="form" action="<?= base_url; ?>/pemilu/simpanPemilu" method="POST" enctype="multipart/form-data">

                <div class="card-body">

                    <div class="form-group">

                        <label >Partai</label>

                        <select class="form-control" name="partai_nama">

                            <option value="">Pilih Partai</option>

                            <?php foreach ($data['partai'] as $row) :?>

                                <option value="<?= $row['nama_partai']; ?>"><?= $row['nama_partai']; ?></option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="form-group">

                        <label >Nama Lengkap</label>

                        <input type="text" class="form-control" placeholder="masukkan nama lengkap..." name="nama_lengkap" required>

                    </div>

                    <div class="form-group">

                        <label >Umur</label>

                        <input type="number" class="form-control" placeholder="masukkan umur..." name="umur" required>

                    </div>

                    <div class="form-group">

                        <label >Jenis Kelamin</label>

                        <select class="form-control" name="jenis_kelamin">

                            <option value="">Jenis Kelamin</option>
                            <option value="Laki-aki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>


                        </select>

                    </div>

                </div>

                <div class="card-footer">

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </form>

        </div>

    </section>

</div>
