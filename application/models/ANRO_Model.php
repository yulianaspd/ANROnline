<?php
class ANRO_Model extends CI_Model{
    public function create($table,$data){
        $this->db->insert($table,$data);
    }
    public function read($table, $where=""){
        if($table=="anr_nilai"){
            $this->db->select('*');
            $this->db->order_by('Mapel' ,'DESC');    
            $this->db->from('anr_nilai');
            if(!empty($where)){
                $this->db->where($where);
            }
            $this->db->join('anr_siswa', 'anr_siswa.ID_SISWA = anr_nilai.Siswa');
            $this->db->join('anr_kelas', 'anr_kelas.Kode_Kelas = anr_nilai.Kelas');
            $this->db->join('anr_mapel', 'anr_mapel.Kode_Mapel = anr_nilai.Mapel');
            $query = $this->db->get();
            return $query;
        }else if($table=="anr_paket_keahlian"){
            $this->db->select('*');
            $this->db->from('anr_paket_keahlian');
            if(!empty($where)){
                $this->db->where($where);
            }
            $this->db->join('anr_program_keahlian', 'anr_program_keahlian.id_program_keahlian = anr_paket_keahlian.id_program_keahlian');
            $query = $this->db->get();
            return $query;    
        }else if($table=="anr_mapel"){
            $this->db->select('*');
            $this->db->from('anr_mapel');
            if(!empty($where)){
                $this->db->where($where);
            }
            $this->db->join('anr_guru', 'anr_guru.ID_Guru = anr_mapel.Guru');
            $query = $this->db->get();
            return $query;    
        }else if($table=="anr_siswa_kelas"){
            $this->db->select('*');
            $this->db->from('anr_siswa_kelas');
            if(!empty($where)){
                $this->db->where($where);
            }
            $this->db->join('anr_siswa', 'anr_siswa.ID_Siswa = anr_siswa_kelas.ID_Siswa');
            $this->db->join('anr_kelas', 'anr_kelas.Kode_Kelas = anr_siswa_kelas.Kode_Kelas');
            $query = $this->db->get();
            return $query;    
        }else{
            if(!empty($where)){
                return $this->db->get_where($table, $where);    
            }
            else{
                return $this->db->get($table);
            }
        }
    }
    public function delete($table,$where){
        $del=$this->db->delete($table,$where);
        if($del){
        return true;
        }else{
            return false;
        }
    }
    public function update($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function search($table,$data){
        $this->db->like($data);
        return $this->db->get($table);
        
    }
    public function CKode($table, $data, $awal){
        $this->db->select('RIGHT('.$table.'.'.$data.',3) as kode', FALSE);
        $this->db->order_by($data,'DESC');    
        $this->db->limit(1);     
        $query = $this->db->get($table);
        if($query->num_rows() <> 0){  
            $data = $query->row();      
            $kode = intval($data->kode) + 1;     
        }
        else{       
            $kode = 1;     
        }
        $kodemax = str_pad($kode, 3, '0',STR_PAD_LEFT);  
        $kodejadi = $awal.$kodemax;     
        return $kodejadi;  
    }
    
    function insertExel($table, $data, $banyak){
        if($table == "anr_siswa"){
            $banyak1 = strlen($data['NIS']);
            $banyak2 = strlen($data['NISN']);
        }
        if($table == "anr_guru"){
            $banyak1 = strlen($data['NIP']);
            $banyak2 = strlen($data['NUPTK']);
        }
        if($banyak1 == 9 && $banyak2 == 10){
            if($this->db->insert($table, $data)){
                return $banyak;
            }else{
                return $banyak += 1;
            }
        }else{
            return $banyak += 1;
        }
    }
    
    function readNilai($where){
        $this->db->select('GROUP_CONCAT(Mapel SEPARATOR ",") AS Mapel, GROUP_CONCAT(Jenis_Nilai SEPARATOR ",") AS Jenis_Nilai, GROUP_CONCAT(Nilai SEPARATOR ",") AS Nilai_Siswa');
        $this->db->from('anr_nilai');
        $this->db->where($where);
        return $this->db->get();
    } 
    public function page($table, $batas=null, $offset=null, $kelas=null, $key=null){
        $sql="SELECT * FROM ".$table;
        if (($kelas != null) || ($key != null)) {
            $sql .= " WHERE ";
            if ($kelas != null){
                $sql .= "Kelas='".$kelas."' ";
            }
            if ($key != null){
                $sql .= ($kelas != null) ? "AND " : "";
                $sql .= "(anr_siswa.NIS LIKE '%".$key."%' OR anr_siswa.NISN LIKE '%".$key."%' OR anr_siswa.nama_siswa LIKE '%".$key."%') "; 
            }
            if($batas != null){
                $sql .= " limit ". $offset .", ".$batas;
            }
        }else{
             if($batas != null){
                $sql .= " limit ". $offset .", ".$batas;
            }
        }
        $query = $this->db->query($sql);
        return $query;
    }
}