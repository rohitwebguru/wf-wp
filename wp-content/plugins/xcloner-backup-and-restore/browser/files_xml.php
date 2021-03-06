<?php
/**
* XCloner
* Oficial website: http://www.xcloner.com/
* -------------------------------------------
* Creator: Liuta Romulus Ovidiu
* License: GNU/GPL
* Email: admin@xcloner.com
* Revision: 1.0
* Date: November 2010
**/

defined( '_VALID_MOS' ) or die( 'Restricted access' );

header("Cache-Control: no-cache");
header("Pragma: nocache");
header("Content-Type: text/xml; charset=utf-8");

error_reporting(2);

include(realpath(dirname(__FILE__))."/../cloner.config.php");
include(realpath(dirname(__FILE__)) ."/../common.php");

$request_dir = str_replace(array(".."), array(""), $_REQUEST['dir']);
$dir = realpath(realpath($_CONFIG['backup_path']) . DIRECTORY_SEPARATOR. $request_dir);

if(!stristr($dir, realpath($_CONFIG['backup_path'])))
	return false;

$parent_dir = dirname($dir);

if(strlen($parent_dir) < strlen($_CONFIG['backup_path']))
	$parent_dir = "/";
	
$parent_dir	= str_replace(realpath($_CONFIG['backup_path']),"",$parent_dir);
$request_dir	= str_replace(realpath($_CONFIG['backup_path']),"",$dir);

$fulldir = $dir;
$f_arr = array();
$d_arr =array();
$exclude = array();
$_COOKIES = array();
$exfile = realpath($_CONFIG['backup_path']."/administrator/backups")."/.excl";

if(isset($_REQUEST['path']) and $_REQUEST['path'])
	$path = realpath($dir.DIRECTORY_SEPARATOR.$_REQUEST['path']);

$loc = $_REQUEST['dir'];

if(!is_dir($_CONFIG['backup_path'])){

	echo "<directory location=\"Error: Directory $_CONFIG[backup_path] does not exist!\"></directory>";
	exit;

}elseif(!is_readable($_CONFIG['backup_path'])){

	echo "<directory location=\"Error: Directory $_CONFIG[backup_path] is not readable!\"></directory>";
	exit;

}


if($_REQUEST['act'] == "checkall"){

    check($dir, $exfile, 1);

    }
elseif($_REQUEST['act'] == "uncheckall"){

    check($dir, $exfile, 0);

    }

if($loc == "")
 $loc = "/";


$data = "";

if($fp = @fopen($exfile,"r")){

while(!feof($fp)){
    $data .= fread($fp, 1024);
    }
fclose($fp);
}
$_COOKIES = explode("\r\n", $data);


$exc = 0;

if($fp = @fopen($exfile,"w")){

	if(is_array($_COOKIES))

		foreach($_COOKIES as $key=>$value)

			if(trim($value!="")){

				if($value!=$path){

					 fwrite($fp, $value."\r\n");

				}else{

				    $exc = 1;
    			}
			}

		if((!$exc)&&(trim($path)!=''))

		fwrite($fp, $path."\r\n");

		fclose($fp);
}


$data = "";

if($fp = @fopen($exfile,"r")){

while(!feof($fp)){

    $data .= fread($fp, 1024);

    }

fclose($fp);

}
else{

	echo "<directory location=\"Error: Unable to write to file $exfile\"></directory>";
	exit;

}

$_COOKIES = explode("\r\n", $data);


if(is_array($_COOKIES))
foreach($_COOKIES as $key=>$value)
if($value!='')
{

     $exclude[] = $value;


    }

sort($exclude);

   if (@is_dir($fulldir)){

         if ($root=@opendir($fulldir)){
               while ($file=@readdir($root)){
                           if(@is_dir($fulldir.DIRECTORY_SEPARATOR.$file)){
                           //is folder
                             if($file=="." || $file==".."){continue;}
                             else{
                              $d_arr[] = $file;
                             }
                           }else{
                           //is file
                           $type=substr($file, strrpos($file, '.'));
                            $f_arr[] = $file;
                           }
               }
         }

      sort($f_arr);

      sort($d_arr);


      echo "<directory current_dir=\"".htmlspecialchars($request_dir.DIRECTORY_SEPARATOR)."\" location=\"".htmlspecialchars($dir)."\" parent_location=\"".htmlspecialchars($parent_dir)."\" >";

      foreach($d_arr as  $file){
       if(in_array($dir.DIRECTORY_SEPARATOR.$file, $_COOKIES))
        $check = 'checked';
       else
        $check = '';
       echo "<folder check='$check'>".htmlspecialchars($file)."</folder>";

      }

      foreach($f_arr as $file){
       if(in_array($dir.DIRECTORY_SEPARATOR.$file, $_COOKIES))
        $check = 'checked';
       else
        $check = '';

       echo "<file  check='$check' link=\"#\">".htmlspecialchars($file)."</file>";

      }

      foreach($exclude as $file)
      	echo "<message>".str_replace("","",htmlspecialchars($file))."</message>";

      echo "</directory>";


   }

function check($loc, $exfile, $act ){
    global $_CONFIG;

    $fulldir = $loc;
    $flist = array();
    $_COOKIES = array();
    if (@is_dir($fulldir)){

         if ($root=@opendir($fulldir)){

               while ($file=readdir($root))
               if(($file!='.')&&($file != '..'))
               {

                      $flist[] = $loc .DIRECTORY_SEPARATOR. $file;

               }
         }
    }

    if($fp = @fopen($exfile,"r")){

    while(!feof($fp)){
    $data .= fread($fp, 1024);
    }
        fclose($fp);
    }

    $_COOKIES = explode("\r\n", $data);



    if($act == 1){

        $flist = @array_merge($_COOKIES, $flist);

        }
    else{

        $flist = @array_diff($_COOKIES, $flist);

        }

    $flist = @array_unique($flist);

    if($fp = @fopen($exfile,"w")){

        foreach($flist as $file){

           fwrite($fp, $file."\r\n");

        }

        fclose($fp);
    }




}

?>
