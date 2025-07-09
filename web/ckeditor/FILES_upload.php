<?php
$docroot = $_SERVER['DOCUMENT_ROOT'];
set_time_limit(0);

@extract($_FILES);

$tmpdir = $docroot.'/data/tmp';
foreach($_FILES as $file)
{
    $ext = mb_substr($file['name'], mb_strlen($file['name']) - 4, 4);
    $file_tmp_name = $file['tmp_name'];
    $file_name     = $file['name'];
    $file_name     = 'IMG_'.date("YmdHis").'_'.md5(rand(0, 9999999)) . $ext;
    $file_type     = $file['type'];
    move_uploaded_file($file_tmp_name, "$tmp_dir/$file_name");
}

$uri = parse_url($_SERVER['SCRIPT_URI']);
$PID = $uri['scheme'] .'://' . $httpserver."/tmp/".$id_cook."_FILES/";

$en_fname = rawurlencode('/tmp/'.$id_cook.'_'.session_id().'/'.$file_name);
$src = 'http://' . $httpserver.'/libraries/img.php?f='.$en_fname;
//$src = '/libraries/img.php?f='.$en_fname;
/**
 * 첨부파일 읽어서
 * mime 인코딩해서
 * CID 값으로 넘겨준다.
 */
$filename = $tmp_dir . '/' . $file_name;
$handle = fopen($filename, "rb");
$contents = fread($handle, filesize($filename));
fclose($handle);

$boundary = '----NeoExpress_'.$neoex_ver.'_FirstDocBlock_'.date('Ymd');

$contents_mime = createAttachHeader2($boundary, $file_name, $file_type,'', $file_name);
$contents_mime .= '\n' . encodeMailbody2($contents) . '\n';

// 부모창의 이미지 갯수 증가시켜줌.
echo "<script type='text/javascript'>
window.parent.document.form.insimg.value++;\n
window.parent.document.form.CID.value += '" . $contents_mime . "';\n
window.parent.CKEDITOR.tools.callFunction({$_GET['CKEditorFuncNum']}, '$src');
</script>";
?>
