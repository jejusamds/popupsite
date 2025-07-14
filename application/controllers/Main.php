<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
 * Main
 * @functions  redirect
 * @functions  index
 */
class Main extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        //PHP Setting
        ini_set("max_execution_time", 90000000);
        set_time_limit(0);
        date_default_timezone_set('Asia/Seoul');

        //cache
        header("Content-Type: text/html; charset=UTF-8");
        header('P3P: CP="CAO PSA OUR"');
        header('Cache-Control: no-cache');
        header('Pragma: no-cache');

        $this->load->model('popup_model');
    }

    /*
     * MAIN
     *
     * author/date  kwchoi/20150601
     */
    public function index()
    {

        $tpl_vars = array();
        $tpl_vars['ERROR'] = "";
        $this->load->model('board_model');
        $this->load->model('gallery_model');
        $this->load->model('diet_model');

        $tpl_vars['NOTICE_ROWS'] = array();
        $tpl_vars['DIET_ROWS'] = array();
        $tpl_vars['GALLERY_ROWS'] = array();

        $tpl_vars['NOTICE_ROWS'] = $this->board_model->recent_notice();
        $tpl_vars['DIET_ROWS'] = $this->diet_model->recent_diet();
        $tpl_vars['GALLERY_ROWS'] = $this->gallery_model->recent_gallery();

        foreach ($tpl_vars['NOTICE_ROWS'] as $k => $v) {
            $v['BASE_URL'] = base_url();
            $v['TITLE'] = mb_strimwidth($v['TITLE'], 0, 20, '..');
            $tpl_vars['NOTICE_ROWS'][$k] = $v;
        }
        foreach ($tpl_vars['DIET_ROWS'] as $k => $v) {
            $v['BASE_URL'] = base_url();
            $v['TITLE'] = mb_strimwidth($v['TITLE'], 0, 20, '..');
            $tpl_vars['DIET_ROWS'][$k] = $v;
        }
        foreach ($tpl_vars['GALLERY_ROWS'] as $k => $v) {
            $v['BASE_URL'] = base_url();
            $v['TITLE'] = mb_strimwidth($v['TITLE'], 0, 20, '..');
            $tpl_vars['GALLERY_ROWS'][$k] = $v;
        }

        $this->parser->parse("layouts/common/header", $tpl_vars);
        $this->parser->parse("main/index", $tpl_vars);
    }

    /**
     * HTML 중 <img> 태그만 남기고, style 속성은 제거한 뒤
     * width 속성을 500으로 설정하여 반환합니다.
     *
     * @param string $html 원본 HTML
     * @return string 가공된 HTML
     */
    private function sanitize_popup_contents($html)
    {
        // 1) <img> 태그만 남기기
        $clean = strip_tags($html, '<img>');

        // 2) DOMDocument 로드 (UTF-8 처리)
        $dom = new DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="utf-8"?>' . $clean);
        libxml_clear_errors();

        // 3) 모든 <img> 요소 순회
        $imgs = $dom->getElementsByTagName('img');
        for ($i = 0; $i < $imgs->length; $i++) {
            $img = $imgs->item($i);
            // style, height 속성 제거
            if ($img->hasAttribute('style')) {
                $img->removeAttribute('style');
            }
            if ($img->hasAttribute('height')) {
                $img->removeAttribute('height');
            }
            // width 속성 강제 설정 (500px)
            //$img->setAttribute('width', '500');
        }

        // 4) <body> 태그 안의 innerHTML만 추출
        $body = $dom->getElementsByTagName('body')->item(0);
        $result = '';
        foreach ($body->childNodes as $child) {
            $result .= $dom->saveHTML($child);
        }

        return $result;
    }


    public function index_tmp()
    {
        $tpl_vars = array();
        $tpl_vars['ERROR'] = "";
        $this->load->model('board_model');
        $this->load->model('gallery_model');
        $this->load->model('diet_model');

        $tpl_vars['NOTICE_ROWS'] = array();
        $tpl_vars['DIET_ROWS'] = array();
        $tpl_vars['GALLERY_ROWS'] = array();

        $tpl_vars['NOTICE_ROWS'] = $this->board_model->recent_notice();
        $tpl_vars['DIET_ROWS'] = $this->diet_model->recent_diet();
        $tpl_vars['GALLERY_ROWS'] = $this->gallery_model->recent_gallery();

        foreach ($tpl_vars['NOTICE_ROWS'] as $k => $v) {
            $v['BASE_URL'] = base_url();
            $v['TITLE'] = mb_strimwidth($v['TITLE'], 0, 20, '..');
            $tpl_vars['NOTICE_ROWS'][$k] = $v;
        }
        foreach ($tpl_vars['DIET_ROWS'] as $k => $v) {
            $v['BASE_URL'] = base_url();
            $v['TITLE'] = mb_strimwidth($v['TITLE'], 0, 20, '..');
            $tpl_vars['DIET_ROWS'][$k] = $v;
        }
        foreach ($tpl_vars['GALLERY_ROWS'] as $k => $v) {
            $v['BASE_URL'] = base_url();
            $v['TITLE'] = mb_strimwidth($v['TITLE'], 0, 20, '..');
            $tpl_vars['GALLERY_ROWS'][$k] = $v;
        }

        $popup_rows = $this->popup_model->get_popup('array', '*', '', '', 'N');
        $tpl_vars['POPUP_ROWS'] = array();
        $today = date('Y-m-d');
        foreach ($popup_rows as $v) {
            $startDate = empty($v['pop_start']) ? null : date('Y-m-d', strtotime($v['pop_start']));
            $endDate = empty($v['pop_end']) ? null : date('Y-m-d', strtotime($v['pop_end']));

            if (
                (empty($startDate) || $startDate <= $today) &&
                (empty($endDate) || $endDate >= $today)
            ) {
                $row = array_change_key_case($v, CASE_UPPER);
                $row['POP_CONTENTS'] = $this->sanitize_popup_contents($row['POP_CONTENTS']);
                $tpl_vars['POPUP_ROWS'][] = $row;
            }
        }


        $this->parser->parse("layouts/common/header", $tpl_vars);
        $this->parser->parse("main/index_tmp", $tpl_vars);
    }

    function manage_index()
    {

        if (!defined("L_USR_ID")) {
            redirect("adm/index");
        }

        if (L_USR_ID != 'admin') {
            redirect("adm/index");
        }

        $tpl_vars = array();
        $tpl_vars['ERROR'] = "";
        $this->load->model('visit_logs_model');

        $tpl_vars['VISIT_COUNT'] = $this->visit_logs_model->get_visit_count('all');
        $tpl_vars['VISIT_COUNT_DAY'] = $this->visit_logs_model->get_visit_count('day_count');
        $tpl_vars['VISIT_COUNT_MONTH'] = $this->visit_logs_model->get_visit_count('month_count');

        $tpl_vars['HOUR_ROWS'] = $this->visit_logs_model->get_visit_count('hour');
        $tpl_vars['DAY_ROWS'] = $this->visit_logs_model->get_visit_count('day');
        $tpl_vars['MONTH_ROWS'] = $this->visit_logs_model->get_visit_count('month');

        foreach ($tpl_vars['HOUR_ROWS'] as $k => $v) {
            $hour_rows[] = $v['VISIT_COUNT'];
            $v['NUM'] = $k;
            $v['DATE'] = $v['DATE'] . "시";
            $tpl_vars['HOUR_ROWS'][$k] = $v;
        }
        $tpl_vars['HOUR_DATA'] = implode(", ", $hour_rows);

        foreach ($tpl_vars['DAY_ROWS'] as $k => $v) {
            $day_rows[] = $v['VISIT_COUNT'];
            $v['NUM'] = $k;
            $tpl_vars['DAY_ROWS'][$k] = $v;
        }
        $tpl_vars['DAY_DATA'] = implode(", ", $day_rows);

        foreach ($tpl_vars['MONTH_ROWS'] as $k => $v) {
            $month_rows[] = $v['VISIT_COUNT'];
            $v['NUM'] = $k;
            $tpl_vars['MONTH_ROWS'][$k] = $v;
        }
        $tpl_vars['MONTH_DATA'] = implode(", ", $month_rows);

        $tpl_vars['AGENT_ROWS'] = $this->visit_logs_model->get_agent_count($tpl_vars['VISIT_COUNT']);
        $tpl_vars['IP_ROWS'] = $this->visit_logs_model->get_ip_count($tpl_vars['VISIT_COUNT']);
        $tpl_vars['OS_ROWS'] = $this->visit_logs_model->get_os_count($tpl_vars['VISIT_COUNT']);
        $tpl_vars['REFERRER_ROWS'] = $this->visit_logs_model->get_referrer_count($tpl_vars['VISIT_COUNT']);

        $this->parser->parse("layouts/admin/header", $tpl_vars);
        $this->parser->parse("main/manage_index", $tpl_vars);
        $this->parser->parse("layouts/admin/footer", $tpl_vars);
    }

}
