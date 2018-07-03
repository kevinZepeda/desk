<?php 
//#####################################################
// CARLOS SANTOS DE AZEVEDO
// Software: DbackupeXPro
// Mysql Database Backups Central
// CopyRight: Litos Media - Carlos Santos de Azevedo
// Contact: info@litos.top
#####################################################
function total_dbs(){
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'databases');
return   sprintf("%02d", mysqli_num_rows($sql));
}
	
	
function total_ftps(){
global $con;
global $prefixo;
$sql= mysqli_query($con, 'SELECT * FROM '.$prefixo.'ftp');
return   sprintf("%02d", mysqli_num_rows($sql));
}
	


function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}




function contar_ficheiros($path){
    $ite=new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS); 
    $bytestotal=0;
    $nbfiles=0;
    foreach (new RecursiveIteratorIterator($ite) as $filename=>$cur) {
        $filesize=$cur->getSize();
        $bytestotal+=$filesize;
        $nbfiles++;
        $files[] = $filename;
    }

    $bytestotal=formatSizeUnits($bytestotal);

    return array('total_files'=>$nbfiles,'total_size'=>$bytestotal,'files'=>$files);
}



$pasta= dirname(dirname(__FILE__)).'/DbackupexPro_Backups';
$total_ficheiros_backups = contar_ficheiros($pasta);
$total_spaco_ocupado_pelos_backups=   $total_ficheiros_backups['total_size'];
 
  	
?>


<!-- Small boxes (Stat box) -->

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-skin">
            <div class="inner ">
              <h3><?php echo total_dbs();?></h3>

              <p><?php echo _('Total of Databases');?></p>
            </div>
            <div class="icon">
              <i class="fa fa-database"></i>
            </div>
            <a class="small-box-footer"><?php echo _('Total of databases added');?></a>  
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-skin">
            <div class="inner">
               <h3><?php echo total_ftps();?></h3>
                <p><?php echo _('Total of FTP Servers');?></p>
            </div>
            <div class="icon">
              <i class="fa fa-server"></i>
            </div>
            <a class="small-box-footer"><?php echo _('Total of FTP Servers added');?></a>
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-skin">
            <div class="inner">
             <h3><?php echo $total_ficheiros_backups['total_files'];?></h3>
              <p><?php echo _('Total of Backups');?></p>
            </div>
            <div class="icon">
              <i class="fa fa-file-archive-o"></i>
            </div>
            <a class="small-box-footer"><?php echo _('Total of Backup Files on local Server');?></a> 
          </div>
        </div>
        <!-- ./col -->
        
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-skin">
            <div class="inner">
              <h3><?php echo $total_spaco_ocupado_pelos_backups;?></h3>
              <p><?php echo _('Total space used by Backups');?></p>
            </div>
            <div class="icon">
              <i class="fa fa-hdd-o"></i>
            </div>
            <a class="small-box-footer"><?php echo _('Total of space used by all backups on this Server');?></a> 
          </div>
        </div>
        <!-- ./col -->