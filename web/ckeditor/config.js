
/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
        // Define changes to default configuration here. For example:
        // config.language = 'ko';
        // config.uiColor = '#AADC6E';

        config.filebrowserUploadUrl = 'http://uhm.co.kr/geumsa/web/index.php/request/ckeditor_image_upload'; //업로드 실행파일
        config.toolbar = 'TB';
        config.toolbar_TB =
                [
                //['Styles','Format','Font','FontSize'],
                ['Font','FontSize'],
                ['Bold','Italic','Underline','Strike'],
                ['TextColor','BGColor'],
                ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                //['NumberedList','BulletedList','-','Outdent','Indent','Blockquote']
                //['Cut','Copy','Paste','PasteText'],
                //['Undo','Redo','-','SelectAll','RemoveFormat'],
                ['Link','Unlink'],
                ['Image','Table','HorizontalRule'],
                //['ShowBlocks','Print'],
                //['PageBreak','Print'],
                ['Source'],
                ['Maximize']
                ];


        config.font_names =
        '맑은 고딕;' +
        '고딕;' +
        '고딕체;' +
        '굴림;' +
        '굴림체;' +
        '바탕;' +
        '바탕체;' +
        '명조;' +
        '명조체;' +
        '궁서;' +
        '궁서체;' +
        'Simsun;' +
        'MS PGothic;MS PMincho;' +
        'Arial/Arial, Helvetica, sans-serif;' +
        'Comic Sans MS/Comic Sans MS, cursive;' +
                'Courier New/Courier New, Courier, monospace;' +
                'Georgia/Georgia, serif;' +
                //'Lucida Sans Unicode/Lucida Sans Unicode, Lucida Grande, sans-serif;' +
                'Tahoma/Tahoma, Geneva, sans-serif;' +
                'Times New Roman/Times New Roman, Times, serif;' +
                'Trebuchet MS/Trebuchet MS, Helvetica, sans-serif;' +
                'Verdana/Verdana, Geneva, sans-serif';

        config.fontSize_defaultLabel = '12';

	config.skin = 'moonocolor';
        config.image_previewText = '미리보기입니다.';
};
