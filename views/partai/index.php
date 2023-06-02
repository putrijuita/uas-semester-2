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
    
        <div class="row">
    
            <div class="col-sm-12">
    
                <?php Flasher::Message(); ?>
    
            </div>
    
        </div>
    
        <div class="card">
    
            <div class="card-header">
    
                <h3 class="card-title"><?= $data['title'] ?></h3> <a href="<?= base_url;?>/partai/tambahPartai" class="btn float-right btn-xs btn btn-primary">Tambah Partai</a>
    
            </div>
    
            <div class="card-body">
    
                <form action="<?= base_url; ?>/partai/cariPartai" method="post">
    
                    <div class="row mb-3">
    
                        <div class="col-lg-6">
    
                            <div class="input-group">
    
                                <input type="text" class="form-control" placeholder="" name="key" >
    
                                <div class="input-group-append">

                                    <button class="btn btn-outline-secondary" type="submit">Cari Data</button>

                                    <a class="btn btn-outline-danger" href="<?= base_url; ?>/partai" >Reset</a>

                                </div>

                            </div>

                        </div>

                    </div>
    
                </form>
    
                <table class="table table-bordered">
    
                    <thead>
    
                        <tr>
    
                            <th style="width: 10px">#</th>
    
                            <th>Partai</th>
    
                            <th style="width: 150px">Action</th>
    
                        </tr>
    
                    </thead>
    
                    <tbody>
    
                        <?php $no=1; ?>
    
                        <?php foreach ($data['partai'] as $row) :?>
    
                            <tr>
        
                                <td><?= $no; ?></td>
            
                                <td><?= $row['nama_partai'];?></td>
            
                                <td>
        
                                    <a href="<?= base_url; ?>/partai/editPartai/<?= $row['id'] ?>" class="badge badgeinfo ">Edit</a> 
                                    
                                    <a href="<?= base_url; ?>/partai/hapusPartai/<?= $row['id'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
            
                                </td>
        
                            </tr>
    
                        <?php $no++; endforeach; ?>
    
                    </tbody>
    
                </table>
    
            </div>
    
        </div>

    </section>

</div>
