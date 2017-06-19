<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Nilai")?>">Data Nilai</a>
                    <a class="breadcrumb" href="#">Edit Data Nilai</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Edit Data Nilai</h3></blockquote>
                <hr>
            </div>    
        <div class="col s12">
                <form onsubmit="return validasi(this, 'edit_nilai')" autocomplete="off" method="post" action="<?php echo base_url("ANROC_Nilai/save") ?>">
                    <input type="hidden" name="id_nilai" value="<?php echo $resource['ID_NILAI']?>">
                    <table>
                        <tr>
                            <td>Nama Siswa</td>
                           
                            <td>
                                <input type="text" name="siswa" value="<?php echo $siswa['NIS']."/".$siswa['NISN']." - ".$siswa['Nama_Siswa'] ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Mata Pelajaran</td>
                           
                            <td>
                                <input type="text" name="mapel" value="<?php echo $mapel['Nama_Mapel']; ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Nilai</td>
                           
                            <td>
                                <input type="text" name="jenis_nilai" value="<?php echo $resource['Jenis_Nilai'] ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                           
                            <td>
                                <input type="text" name="kelas" value="<?php echo $resource['Tingkat_Kelas']."-".$resource['Nama_Kelas']." (".$resource['Tahun_Masuk']."/".$resource['Tahun_Keluar'].")"?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>Nilai</td>
                           
                            <td>
                                <input type="number" name="nilai" min="0" max="100" value="<?php echo $resource['Nilai'] ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Semester</td>
                           
                            <td>
                                <?php 
                                    if($resource['Semester'] == "Ganjil"){
                                        echo "<input type='radio' name='semester' value='Ganjil' id='ganjil' checked><label for='ganjil'>Ganjil</label>";
                                        echo "<input type='radio' name='semester' value='Genap' id='genap'><label for='genap'>Genap</label>";
                                    } 
                                    else if($resource['Semester'] == "Genap"){
                                        echo "<input type='radio' name='semester' value='Ganjil' id='ganjil' checked><label for='ganjil'>Ganjil</label>";
                                        echo "<input type='radio' name='semester' value='Genap' checked id='genap'><label for='genap'>Genap</label>";
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="right-align"><button type="submit" name="type" value="update" class="btn">Submit</button></td>
                        </tr>
                    </table>
                </form>
            
            </div>
        </div>
    </div>
    
</main>