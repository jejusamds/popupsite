<?php

if ( ! function_exists('logs') ) {
  function logs($message) {
    static $_log;
    if (config_item('log_threshold') == 0) return;
    $_log =& load_class('Log');
    $_log->write_log('neosms', $message, false);
  }
}

/* sms는 euc-kr인코딩을 사용하므로 euc-kr로 인코딩을 변경후, 길이 체크.
 * @param string $str
 * @return boolean
 */
if (!function_exists('sms_message_length')) {
  function sms_message_length($str) {
    $CI = get_instance();
    $str_ko = mb_convert_encoding($str, 'EUC-KR', $CI->config->item('charset'));
    return strlen($str_ko);
  }
}

/* sms 메시지를 $byte만큼 자른 후 반환한다.
 * @param string $str
 * @param int $byte
 * @return string 
 */
if (!function_exists('sms_message_cut')) {
  function sms_message_cut($str, $byte) {
    $CI = get_instance();
    $str_ko = mb_convert_encoding($str, 'EUC-KR', $CI->config->item('charset'));
    $str_ko = mb_strcut($str_ko, 0, $byte, 'EUC-KR');
    return mb_convert_encoding($str_ko, $CI->config->item('charset'), 'EUC-KR');
  }
}

if (!function_exists('upload_image')) {
  function upload_image($FILES = array()) {

    $CI = get_instance();
    
    if (empty ($FILES['image']) && $FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
      return array("WA", EXC_FAILED_UPLOAD." (005)");
    }

    if ($FILES['image']['error'] === UPLOAD_ERR_OK) {
      //get mime
      $image_mime = strtoupper($FILES['image']['type']);
      $image_filename = $FILES['image']['tmp_name'];

      if (preg_match('/^IMAGE.+(3FR|A|AAI|AI|ART|ARW|AVS|B|BGR|BGRA|BMP|BMP2|BMP3|BRF|C|CAL|CALS|CANVAS|CAPTION|CIN|CIP|CLIP|CMYK|CMYKA|CR2|CRW|CUR|CUT|DCM|DCR|DCX|DDS|DFONT|DNG|DOT|DPX|EPDF|EPI|EPS|EPS2|EPS3|EPSF|EPSI|EPT|EPT2|EPT3|ERF|EXR|FAX|FITS|FRACTAL|FTS|G|G3|GIF|GIF87|GRADIENT|GRAY|GROUP4|HALD|HDR|HISTOGRAM|HRZ|ICB|ICO|ICON|INFO|INLINE|IPL|ISOBRL|J2C|JNG|JP2|JPC|JPEG|JPG|JPX|K|K25|KDC|LABEL|M|M2V|M4V|MAC|MAP|MAT|MATTE|MIFF|MNG|MONO|MRW|MSL|MSVG|MTV|MVG|NEF|NULL|O|ORF|OTB|OTF|PAL|PALM|PAM|PATTERN|PBM|PCD|PCDS|PCL|PCT|PCX|PDB|PDF|PDFA|PEF|PES|PFA|PFB|PFM|PGM|PGX|PICON|PICT|PIX|PJPEG|PLASMA|PNG|PNG24|PNG32|PNG8|PNM|PPM|PREVIEW|PS|PS2|PS3|PSB|PSD|PTIF|PWP|R|RADIAL-GRADIENT|RAF|RAS|RGB|RGBA|RGBO|RLA|RLE|SCR|SCT|SFW|SGI|SHTML|SR2|SRF|STEGANO|SUN|SVG|SVGZ|TEXT|TGA|THUMBNAIL|TIFF|TIFF64|TILE|TIM|TTC|TTF|TXT|UBRL|UIL|UYVY|VDA|VICAR|VID|VIFF|VST|WBMP|WMF|WMZ|WPG|X|X3F|XBM|XC|XCF|XPM|XPS)/', $image_mime, $m)) {

        do {
          $rand_name = 'nd_'.date("YmdHis")."_".random_string('alnum', 10);
          $new_image_filepath = "/tmp/".$rand_name.".jpg";
          $new_image_filename = $rand_name.".jpg";
        } while (file_exists($rand_name));

        //$config['image_library'] = 'gd2';
        $config['image_library']   = 'ImageMagick';
        $config['library_path']    = '/usr/bin';
        $config['source_image']    = $image_filename;
        $config['new_image']       = $new_image_filepath;
        $config['create_thumb']    = FALSE;
        $config['maintain_ratio']  = TRUE;
        $config['width']           = 176*2;
        $config['height']          = 144*2;
        $config['quality']         = '80%';
        $CI->load->library('image_lib', $config);

        if($CI->image_lib->resize()){
          $temp_filepath = FILE_UPLOAD_PATH."/temp/".$new_image_filename;

          if (@copy($new_image_filepath, $temp_filepath)) {
            //tmp 폴더에 생성했던 이미지 제거
            unlink($new_image_filepath);
            return array("OK", $new_image_filename);
          } else {
            //Failed COPY
            return array("WA", EXC_FAILED_UPLOAD." (002)");
          }

        } else {
          //Failed RESIZE
          return array("WA", EXC_FAILED_UPLOAD." (003)");
        }
      } else {
        //missmatch MIME-TYPE
        return array("WA", EXC_FAILED_UPLOAD." (004)");
      }
    } else {
      //Failed upload
      return array("WA", EXC_FAILED_UPLOAD." (005)");
    }
  }
}


if (!function_exists('sms_send_validate')) {
  function sms_send_validate($send_type, $title, $message, $callback, $reservation_flag,
                             $send_date, $rcpg_id, $att_key, $filename) {

    $CI = get_instance();
    $CI->load->model('recipient_model');

    // 제목이 입력하였는지
    if(empty ($title)) {
      return array("", EXC_SEND_EMPTY_TITLE);

    // 제목이 20자가 넘지 않는지
    } else if(mb_strlen($title) > 20) {
      $title = mb_substr($title, 0, 20);
      return array($title,  EXC_SEND_TITLE_LENGTH);
    }

    // 메시지를 입력하였는지
    if(empty ($message)) {
      return array("", EXC_SEND_EMPTY_MESSAGE);
    }

    //SMS 일시 메시지 길이가 90바이트를 넘는지 체크
    if($send_type == 'S' && sms_message_length($message) > SMS_MAX_LENGTH) {
      return array("", EXC_SEND_SMS_LENGTH);
    }

    //SMS가 아닐시 메시지 길이가 2000바이트를 넘는지 체크
    if($send_type != 'S' && sms_message_length($message) > MMS_MAX_LENGTH) {
      return array("", EXC_SEND_MMS_LENGTH);
    }

    $callback = preg_replace('/[^0-9]/', '', $callback);
    if(empty ($callback)) {
      return array($callback, EXC_EMPTY_CALLBACK);
    }

    // 8자리보다 작거나 14자리보다 큰지 체크
    if(mb_strlen($callback) < 8 || mb_strlen($callback) > 14) {
      $callback = '';
      return array($callback, EXC_CALLBACK_LIMIT);
    }

    // 예약발송 선택 여부
    if(!in_array($reservation_flag, array('Y', 'N'))) {
      $reservation_flag = 'N';
      return array($reservation_flag, EXC_RESERVATION_FLAG);
    }

    //예약 시간이 현재 시간보다 이전인지
    if($reservation_flag == 'Y') {
      if(date('Y-m-d H:i:s') > $send_date) {
        return array("", EXC_RESERVATION_DATE_OVER);
      }
    } else {
      $send_date = date("Y-m-d H:i:s");
    }

    // 수신자가 있는지
    $real_count = $CI->recipient_model->get_recipient_real_count($rcpg_id);

    if($real_count < 1){
      return array("", ERR_EMPTY_RECIPIENT);
    }

    //포토메시지일 경우 이미지를 첨부하였는지
    if($send_type == 'M'){
      if(empty($att_key) && empty($filename)){
        return array("", ERR_EMPTY_IMAGE);
      }
    }

    return array("", "");
  }
}


if (!function_exists('addslashes_recursive')) {
  function addslashes_recursive($data) {

    if (is_array($data)) {
      return array_map('addslashes', $data);
    } else {
      return addslashes($data);
    }
  }
}
