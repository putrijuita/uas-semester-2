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

            <form role="form" action="<?= base_url; ?>/pemilu/updatePemilu" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $data['pemilu']['id']; ?>">

                <div class="card-body">

                     <div class="form-group">

                        <label >Partai</label>

                        <select class="form-control" name="partai_nama">

                            <option value="">Pilih Partai</option>

                            <?php foreach ($data['partai'] as $row) :?>

                                <option value="<?= $row['nama_partai']; ?>" <?php if($data['pemilu']['partai_nama'] == $row['nama_partai']) { echo "selected"; } ?>><?= $row['nama_partai']; ?></option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="form-group">

                        <label >Nama Lengkap</label>

                        <input type="text" class="form-control" placeholder="masukkan nama lengkap..." name="nama_lengkap" value="<?= $data['pemilu']['nama_lengkap'];?>">

                    </div>

                    <div class="form-group">

                        <label >Umur</label>

                        <input type="number" class="form-control" placeholder="masukkan umur..." name="umur" value="<?= $data['pemilu']['umur'];?>">

                    </div>

                    <div class="form-group">

                        <label >Jenis Kelamin</label>

                        <select class="form-control" name="jenis_kelamin">
                                
                            <option value="<?= $data['pemilu']['jenis_kelamin'];?>"><?= $data['pemilu']['jenis_kelamin'];?></option>
                            <option value="Laki-Laki">Laki-Laki</option>
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