<?php

/**
 * @Project NUKEVIET 4.x
 * @Author SWINGP (http://swingp.com.vn)
 * @Copyright (C) 2022 SWINGP. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Mon, 28 Feb 2022 21:00:00 GMT
 */

if ( ! defined( 'NV_IS_MOD_BMI' ) ) die( 'Stop!!!' );

$page_title = $module_info['custom_title'];
$key_words = $module_info['keywords'];

$ifram = $nv_Request->get_int( 'ifram', 'get', 0 );

//Xử lý sau khi nhận request từ client
$DIAGNOSTIC = "";
$ESTIMATE = "";
$accept = $nv_Request->get_int('accept', 'post', 0);
$weight = 25;
$height = 100;
$total_bmi = 0;

if ($nv_Request->isset_request('submit', 'post')) {
    $weight = $nv_Request->get_title('input_weight', 'post', 0);
    $height = $nv_Request->get_title('input_height', 'post', 0);
    //Kiểm tra điều kiện
    if(true!=true){

    }
    else{
        $total_bmi = $weight/(($height*0.01)*($height*0.01));
        $remain = ($height*0.01)*($height*0.01) * 20;
        if($total_bmi>29.9){
            //Béo cấp 2
            $DIAGNOSTIC = "Bạn đang béo cấp độ 2";
            $ESTIMATE = "Cơ thể hoàn hảo nếu bạn ".number_format($remain, 2)." Kg." ;
        }
        else if($total_bmi>25.0){
            //Béo cấp 1
            $DIAGNOSTIC ="Bạn đang béo cấp độ 1";
            $ESTIMATE = "Cơ thể hoàn hảo nếu bạn ".number_format($remain, 2)." Kg." ;
        }
        else if($total_bmi>23.0){
            //Sắp béo
            $DIAGNOSTIC ="Bạn có nguy cơ béo !";
            $ESTIMATE = "Cơ thể hoàn hảo nếu bạn ".number_format($remain, 2)." Kg." ;
        }
        else if($total_bmi>18.6){
            //Hoàn hảo
            $DIAGNOSTIC ="Bạn thật hoàn hảo.";
        }
        else{
            //Quá còi
            $DIAGNOSTIC ="Bạn quá gầy !";
            $ESTIMATE = "Cơ thể hoàn hảo nếu bạn ".number_format($remain, 2)." Kg." ;
        } 
        
    }
}

//Chuyển đổi tpl sang xtemplate
$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file );
//Truyền tham số sang view
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'LINK_MAIN', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' );
$xtpl->assign('FORM_ACTION', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $op);
$xtpl->assign('DIAGNOSTIC', $DIAGNOSTIC);
$xtpl->assign('HEIGHT', $height);
$xtpl->assign('WEIGHT', $weight);
$xtpl->assign('ESTIMATE', $ESTIMATE);
$xtpl->assign('TOTAL_BMI', number_format($total_bmi, 2));
//Chuyển qua khối main
$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

//Khởi tạo giao diện
include NV_ROOTDIR . '/includes/header.php';
if( $ifram )
{
    echo nv_site_theme( $contents, 0 );
}
else
{
    echo nv_site_theme( $contents );
}
include NV_ROOTDIR . '/includes/footer.php';
