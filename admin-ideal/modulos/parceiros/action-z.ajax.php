<?php
include_once('config.php');
 
if(!empty($_FILES['files'])){
    $n=0;
    $s=0;
    $prepareNames   =   array();
    foreach($_FILES['files']['name'] as $val)
    {
        $infoExt        =   getimagesize($_FILES['files']['tmp_name'][$n]);
        $s++;
        $filesName      =   str_replace(" ","",trim($_FILES['files']['name'][$n]));
        $files          =   explode(".",$filesName);
        $File_Ext       =   substr($_FILES['files']['name'][$n], strrpos($_FILES['files']['name'][$n],'.'));
         
        if($infoExt['mime'] == 'image/gif' || $infoExt['mime'] == 'image/jpeg' || $infoExt['mime'] == 'image/png')
        {
            $srcPath    =   '../../../uploads/parceiros/';
            $fileName   =   $s.rand(0,999).time().$File_Ext;
            $path   =   trim($srcPath.$fileName);
            if(move_uploaded_file($_FILES['files']['tmp_name'][$n], $path))
            {
                $prepareNames[] .=  $fileName; //need to be fixed.
                $Sflag      =   1; // success
            }else{
                $Sflag  = 2; // file not move to the destination
            }
        }
        else
        {
            $Sflag  = 3; //extention not valid
        }
        $n++;
    }
    if($Sflag==1){
        echo "<strong>Parabéns!</strong> Parceiros salvos com sucesso!";
    }else if($Sflag==2){
        echo '<strong>Erro!</strong> ao salvar os parceiros';
    }else if($Sflag==3){
        echo '{File extention not good. Try with .PNG, .JPEG, .GIF, .JPG}';
    }
    else{
        print "<strong>Erro!</strong> " . mysqli_error(Sflag);
    }  

 
    if(!empty($prepareNames)){
        $count  =   1;
        foreach($prepareNames as $name){
            $data   =   array(
                            'img_name'=>$name,
                            'img_order'=>$count++,
                        );
            $db->insert(TB_IMG,$data);
        }
    }
}
?>