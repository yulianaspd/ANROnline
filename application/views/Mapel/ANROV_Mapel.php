<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="#">Data Mata Pelajaran</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Data Mata Pelajaran</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
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
                    <tr>
                        <td><?php echo $this->pagination->create_links() ?></td>
                    </tr>
                </table>
            </div>
        </div>
         <div class="row">
            <div class="col s12 right-align">
                <form autocomplete="off" method="post" action="<?php echo base_url("ANROC_Exel/Save") ?>" enctype="multipart/form-data">
                    <input type="hidden" name="table" value="anr_mapel">
                    <input type="file" name="file" class="uploadbtn" onchange="this.form.submit()"/>
                </form>
                <button class="btn-floating btn-large waves-effect waves-light red uploadtr" ><i class="material-icons right ">open_in_browser</i></button>
                <a class="btn-floating btn-large waves-effect waves-light red " href="<?php echo base_url("ANROC_Mapel/create/") ?>"><i class="material-icons right">add</i></a>
            </div>
        </div>
    </div>
</main>
<script>
    <?php if(isset($_GET['success'])&&isset($_GET['error'])){ ?>
    counter(1, '<?php echo base_url("ANROC_Mapel")?>');
    <?php } ?>
</script>