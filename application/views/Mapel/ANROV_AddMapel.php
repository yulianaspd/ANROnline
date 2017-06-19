<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Mapel")?>">Data Mata Pelajaran</a>
                    <a class="breadcrumb" href="#">Tambah Data Mata Pelajaran</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Tambah Data Mata Pelajaran</h3></blockquote>
                <hr>
            </div>    
        <div class="col s12">
                <form onsubmit="return validasi(this, 'mapel')" autocomplete="off" method="post" action="<?php echo base_url("ANROC_Mapel/save") ?>">
                    <input type="hidden" name="kode_mapel" value="<?php echo $kode ?>">
                    <table class="responsive-table">
                        <tr>
                            <td>Kode Mata Pelajaran</td>
                            
                            <td><input type="text" name="kode_mapel" value="<?php echo $kode ?>" disabled></td>
                        </tr>
                        <tr>
                            <td>Nama Mata Pelajaran</td>
                            
                            <td><input type="text" name="nama"></td>
                        </tr>
                        <tr>
                            <td>KKM</td>
                            
                            <td><input type="number" name="kkm" min="0" max="100"></td>
                        </tr>
                        <tr>
                            <td>Guru</td>
                            
                            <td>
                                <select name="guru">
                                    <option value="Pilih" disabled selected>Pilih Guru</option>
                                    <?php foreach($resource as $res){?>
                                    <option value="<?php echo $res->ID_Guru ?>"><?php echo $res->NIP." / ".$res->NUPTK." ".$res->Nama_Guru ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="right-align"><button class="btn" type="submit" name="type" value="insert">Submit</button></td>
                        </tr>
                    </table>
                </form>

            </div>
        </div>
    </div>
</main>