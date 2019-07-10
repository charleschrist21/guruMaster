<?php
    include "koneksi.php";

    if(isset($_POST['updateGuru'])){
        $updNIPGuru = $_POST["NIP"];
        $updNamaGuru = $_POST["Nama"];
        $updAlamatGuru = $_POST["Alamat"];
        $updTgl_KeluarGuru = $_POST["Tgl_Keluar"];
        $updNamaGuru = htmlspecialchars($updNamaGuru);
        $updAlamatGuru = htmlspecialchars($updAlamatGuru);
        $updTgl_KeluarGuru = htmlspecialchars($updTgl_KeluarGuru);

        $updImgGuru = upload();
        if ($_FILES['gambar']['error']==4){
            $sql = "UPDATE Guru SET 
            Nama ='$updNamaGuru',
            Alamat = '$updAlamatGuru',  
            WHERE NIP ='$updNIPGuru'"; 

                if($conn->query($sql)==TRUE){
                    echo "<script> 
                             alert('success uploaded');
                          </script>";
                }else{
                    echo "<script> 
                             alert('failed uploaded');
                          </script>";
                    } 
        }else{
            $sql = "UPDATE Guru SET 
            Nama ='$updNamaGuru',
            Alamat = '$updAlamatGuru', 
            Img_Guru='$updImgGuru', 
            Tgl_Keluar = '$updTgl_KeluarGuru',
            WHERE NIP ='$updNIPGuru'";

                if($conn->query($sql)==TRUE){
                    echo "<script> 
                            alert('success uploaded');
                          </script>";
                }else{
                    echo "<script> 
                            alert('failed uploaded');
                          </script>";
                    } 
        }
        
        
        
        function upload (){
            $image = $_FILES['image']['name'];
              $imageGuru_text = mysqli_real_escape_string($_POST['Img_Guru']);
    
              $target = "images/fotoGuru".basename($image);
            
    
            mysqli_query($conn,$sql);
            if ($error == 4) {
                echo"<script> 
                    alert('anda perlu mengisi gambar');
                    </script>";
                return false;
            }
    
            $ekstensiGambarValid=["jpg","jpeg","png","bmp"];
            $ekstensiGambar = explode(".",$image);
            $ekstensiGambar = strtolower(end($ekstensiGambar));
    
            if ( !in_array($ekstensiGambar,$ekstensiGambarValid)) {
                echo"<script> 
                    alert('yang anda masukan bukan gambar');
                    </script>";
                return false;
            }
    
              move_uploaded_file($_FILES['image']['tmp_name'], $target . $imageGuru_text);
            
             $result = "SELECT * FROM images";
            }
    }
    
?>