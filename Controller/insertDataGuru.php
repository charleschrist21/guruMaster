<?php
    include "koneksi.php";

    if(isset($_POST['tambahGuru'])){
        $insNamaGuru = $_POST["Nama"];
        $insAlamatGuru = $_POST["Alamat"];
        $insTglMasukGuru = $_POST["Tgl_Masuk"];
        $insImgGuru = upload();
        $insNamaGuru = htmlspecialchars($insNamaGuru);
        $insAlamatGuru = htmlspecialchars($insAlamatGuru);
        $insTglMasukGuru = htmlspecialchars($insTglMasukGuru);

        if(!$insImgGuru){
            return false;
        }else{
            $sql = "INSERT INTO Guru 
            Nama='$insNamaGuru',
            Alamat='$insAlamatGuru',
            Tgl_Masuk='$insTglMasukGuru',
            Img_Guru=$insImgGuru";

            if($conn->query($sql)==TRUE){
               echo "<script> 
                        alert('success uploaded');
                     </script>";
           }else{
               
           }   echo "<script> 
                        alert('failed uploaded');
                    </script>";
        }
        
        

        function upload (){
        $image = $_FILES['image']['name'];
        $error = $_FILES['image']['error'];
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
            echo    "<script> 
                    alert('yang anda masukan bukan gambar');
                    </script>";
            return false;
        }

  	    move_uploaded_file($_FILES['image']['tmp_name'], $targe . $imageGuru_text);
        
         $result = "SELECT * FROM images";
        }
    }
    
        

    
    
?>