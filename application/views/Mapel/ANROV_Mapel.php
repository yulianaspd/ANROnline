<main>
    <div class="container">
        <div class="row">
            <div class="col s12 z-depth-3">
                <blockquote><h3>Menu Jurusan</h3></blockquote>
            </div>
        </div>
        <div class="row">
            <div class="col s12 z-depth-3">
                <table class="responsive-table bordered">
                    <tr>
                        <th>Kode Mata Pelajaran</th>
                        <th>Nama Mata Pelajaran</th>
                        <th>KKM</th>
                        <th>Guru</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <?php foreach($resource as $res){?>
                    <tr>
                        <td><?php echo $res->Kode_Mapel?></td>
                        <td><?php echo $res->Nama_Mapel?></td>
                        <td><?php echo $res->KKM ?></td>
                        <td><a href="<?php echo base_url("ANROC_Guru/profile/".$res->ID_Guru) ?>"><?php echo $res->Nama_Guru?></a></td>
                        <td><a href="<?php echo base_url("ANROC_Mapel/edit/".$res->Kode_Mapel) ?>"><i class="material-icons">edit</i></a></td>
                        <td><a href="<?php echo base_url("ANROC_Mapel/delete/".$res->Kode_Mapel) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')"><i class="material-icons">delete</i></a></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
         <div class="row">
            <div class="col s12 right-align">
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url()."ANROC_Exel/import/anr_mapel" ?>"><i class="material-icons right">open_in_browser</i></a>
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_Mapel/create/") ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
</main>