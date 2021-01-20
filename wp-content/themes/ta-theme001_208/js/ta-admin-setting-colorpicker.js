/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-admin-setting-colorpicker.js: ( Latest Version 2.01 2017.03.01 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2015.12.24: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2017.03.01: 色情報のリアルタイム反映化 by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/

jQuery(window).load( function() { //全てのコンテンツのロードが終了したら実行
  jQuery('.color_picker').wpColorPicker();

  jQuery('.color-picker-exp').each(function(){
    var input_id = jQuery(this).attr('id');
    var title_name = input_id.replace( /_cover/g, '_picker_title' );
    var input_name = input_id.replace( /_cover/g, '_select' );
    var gradName = input_id.replace( /_cover/g, '' );
    jQuery( '#' + input_id + ' #' + title_name + ' a' ).click( function() {
      jQuery( '#' + gradName + '_cp_cover .selectable_color_picker' ).wpColorPicker({
        change: function( event, ui ) {
          var radio_class = jQuery( '#' + input_id + ' input[name=' + input_name + ']:checked' ).attr( 'class' );
          if ( 'selectable-input' == radio_class ){
            var selected_color = ui.color.toString();
            if ( -1 != input_id.indexOf('_grd_start_color') || -1 != input_id.indexOf('_grd_mid_color') || -1 != input_id.indexOf('_grd_stop_color') ) {  //グラデーション設定内
              //グラデーション設定内の表示
              var targetBox = input_id.replace( /_cover/g, '-colorinfo-container' );
              jQuery( '#' + targetBox + ' .color-picker-current-color-frame' ).css( 'background-color', selected_color );
              jQuery( '#' + targetBox + ' .colorcode-disp' ).html( selected_color );
              //グラデーション表記の場合のOnOffと親色表示IDの取得
              if ( -1 != gradName.indexOf('_grd_start_color') ) {
                var keyId = gradName.replace( /_grd_start_color/g, '' );
                var parentId = gradName.replace( /_grd_start_color/g, '_cover' );
                var thisName = gradName.replace( /_grd_start_color/g, '_grad_onoff' );
                var graOnoff = (jQuery( '#' + parentId + ' input[name=' + thisName + ']' ).prop("checked")) ? 'valid' : 'invalid';
              } else if ( -1 != gradName.indexOf('_grd_mid_color') ) {
                var keyId = gradName.replace( /_grd_mid_color/g, '' );
                var parentId = gradName.replace( /_grd_mid_color/g, '_cover' );
                var thisName = gradName.replace( /_grd_mid_color/g, '_grad_onoff' );
                var graOnoff = (jQuery( '#' + parentId + ' input[name=' + thisName + ']' ).prop("checked")) ? 'valid' : 'invalid';
              } else if ( -1 != gradName.indexOf('_grd_stop_color') ) {
                var keyId = gradName.replace( /_grd_stop_color/g, '' );
                var parentId = gradName.replace( /_grd_stop_color/g, '_cover' );
                var thisName = gradName.replace( /_grd_stop_color/g, '_grad_onoff' );
                var graOnoff = (jQuery( '#' + parentId + ' input[name=' + thisName + ']' ).prop("checked")) ? 'valid' : 'invalid';
              } else {
                var keyId = '';
                var graOnoff = '';
              }
              //親設定内の表示
              if ( '' != keyId && '' != graOnoff ) { cp_gradRewrite(graOnoff, keyId); }
            } else {  //通常単色設定
              if ( ! jQuery( '#' + input_id + ' input[name=' + gradName + '_grad_onoff]' ).prop("checked") ) { //グラデーションOff
                var targetBox = input_id.replace( /_cover/g, '-colorinfo-container' );
                jQuery( '#' + targetBox + ' .color-picker-current-color-frame' ).css( 'background', 'none' );
                jQuery( '#' + targetBox + ' .color-picker-current-color-frame' ).css( 'background-color', selected_color );
                jQuery( '#' + targetBox + ' .colorcode-disp' ).html( selected_color );
              }
              //アディショナルモード時の表示
              if ( 'ta_responsible_additional_trigger_color_cover' == input_id ) {
                jQuery( '#ta_responsible_additional_trigger_type_table' ).css( 'color', selected_color );
              } else if ( 'ta_responsible_additional_closer_color_cover' == input_id ) {
                jQuery( '#ta_responsible_additional_closer_type_table' ).css( 'color', selected_color );
              }
            }
          }
        },
        clear: function() {
          if ( 'selectable-input' == jQuery( '#' + input_id + ' input[name=' + input_name + ']:checked' ).attr( 'class' ) ) {
            if ( -1 != input_id.indexOf('_grd_start_color') || -1 != input_id.indexOf('_grd_mid_color') || -1 != input_id.indexOf('_grd_stop_color') ) {  //グラデーション設定内
              //グラデーション設定内の表示
              var targetBox = input_id.replace( /_cover/g, '-colorinfo-container' );
              jQuery( '#' + targetBox + ' .color-picker-current-color-frame' ).css( 'background', 'none' );
              jQuery( '#' + targetBox + ' .color-picker-current-color-frame' ).css( 'background-color', ' ' );
              jQuery( '#' + targetBox + ' .colorcode-disp' ).html( '未定' );
              //グラデーション表記の場合の親色表示IDの取得
              if ( -1 != input_id.indexOf('_grd_start_color') ) {
                var parentId = input_id.replace( /_grd_start_color/g, '' );
              } else if ( -1 != input_id.indexOf('_grd_mid_color') ) {
                var parentId = input_id.replace( /_grd_mid_color/g, '' );
              } else if ( -1 != input_id.indexOf('_grd_stop_color') ) {
                var parentId = input_id.replace( /_grd_stop_color/g, '' );
              } else {
                var parentId = '';
              }
              //親設定内の表示
              var gradOnoff = ( jQuery('#' + parentId + ' .grd_onoff_cover input').prop('checked') ) ? 'valid' : 'invalid';
              var keyId = parentId.replace( /_cover/g, '' );
              cp_gradRewrite(gradOnoff, keyId);
            } else {  //通常単色設定
              if ( ! jQuery('#' + input_id + ' .grd_onoff_cover input').prop('checked') ) { //グラデーションOff
                var targetBox = input_id.replace( /_cover/g, '-colorinfo-container' );
                jQuery( '#' + targetBox + ' .color-picker-current-color-frame' ).css( 'background', 'none' );
                jQuery( '#' + targetBox + ' .color-picker-current-color-frame' ).css( 'background-color', ' ' );
                jQuery( '#' + targetBox + ' .colorcode-disp' ).html( '未定' );
              }
              //アディショナルモード時の表示
              if ( 'ta_responsible_additional_trigger_color_cover' == input_id ) {
                jQuery( '#ta_responsible_additional_trigger_type_table' ).css( 'color', 'transparent' );
              } else if ( 'ta_responsible_additional_closer_color_cover' == input_id ) {
                jQuery( '#ta_responsible_additional_closer_type_table' ).css( 'color', 'transparent' );
              }
            }
          }
        }
      })
    });
    jQuery( '#' + input_id + ' input[name=' + input_name + ']' ).click( function() {
      //色情報取得
      var radio_class = jQuery( '#' + input_id + ' input[name=' + input_name + ']:checked' ).attr( 'class' );
      switch ( radio_class ) {
        case 'c-s-bg-input':
          var selected_color = cp_rgbToHex( jQuery( '#' + input_id + ' .c-s-bg-color' ).css( 'background-color' ) );
          break;
        case 'c-s-hl-input':
          var selected_color = cp_rgbToHex( jQuery( '#' + input_id + ' .c-s-hl-color' ).css( 'background-color' ) );
          break;
        case 'c-s-tonbg-input':
          var selected_color = cp_rgbToHex( jQuery( '#' + input_id + ' .c-s-tonbg-color' ).css( 'background-color' ) );
          break;
        case 'c-s-tonhl-input':
          var selected_color = cp_rgbToHex( jQuery( '#' + input_id + ' .c-s-tonhl-color' ).css( 'background-color' ) );
          break;
        case 'c-f-a-input':
          var selected_color = cp_rgbToHex( jQuery( '#' + input_id + ' .c-f-a-color' ).css( 'background-color' ) );
          break;
        case 'c-f-ahover-input':
          var selected_color = cp_rgbToHex( jQuery( '#' + input_id + ' .c-f-ahover-color' ).css( 'background-color' ) );
          break;
        case 'selectable-input':
          var selected_color = jQuery( '#' + gradName + '_cp_cover input[name=' + gradName + ']' ).val();
          break;
      }
      if ( -1 != input_id.indexOf('_grd_start_color') || -1 != input_id.indexOf('_grd_mid_color') || -1 != input_id.indexOf('_grd_stop_color') ) {  //グラデーション設定内
        //グラデーション設定内の表示
        var targetBox = input_id.replace( /_cover/g, '-colorinfo-container' );
        jQuery( '#' + targetBox + ' .color-picker-current-color-frame' ).css( 'background', 'none' );
        jQuery( '#' + targetBox + ' .color-picker-current-color-frame' ).css( 'background-color', selected_color );
        if ( 'transparent' == selected_color ) {
          var selected_color_disp = '透明';
        } else if ( '' == selected_color ) {
          var selected_color_disp = '未定';
        } else {
          var selected_color_disp = selected_color;
        }
        //グラデーション表記の場合の親色表示IDの取得
        if ( -1 != input_id.indexOf('_grd_start_color') ) {
          var parentId = input_id.replace( /_grd_start_color/g, '' );
        } else if ( -1 != input_id.indexOf('_grd_mid_color') ) {
          var parentId = input_id.replace( /_grd_mid_color/g, '' );
        } else if ( -1 != input_id.indexOf('_grd_stop_color') ) {
          var parentId = input_id.replace( /_grd_stop_color/g, '' );
        } else {
          var parentId = '';
        }
        //親設定内の表示
        var gradOnoff = ( jQuery('#' + parentId + ' .grd_onoff_cover input').prop('checked') ) ? 'valid' : 'invalid';
        var keyId = parentId.replace( /_cover/g, '' );
        cp_gradRewrite(gradOnoff, keyId);
      } else {  //通常単色設定
        if ( ! jQuery('#' + input_id + ' .grd_onoff_cover input').prop('checked') ) { //グラデーションOff
          var targetBox = input_id.replace( /_cover/g, '-colorinfo-container' );
          if ( 'transparent' == selected_color ) {
            var selected_color_disp = '透明';
          } else if ( '' == selected_color ) {
            var selected_color_disp = '未定';
          } else {
            var selected_color_disp = selected_color;
          }
          if ( '未定' == selected_color_disp ) {
            current_select_color = 'transparent';
          } else {
            current_select_color = selected_color;
          }
          jQuery( '#' + targetBox + ' .colorcode-disp' ).html( selected_color_disp );
          jQuery( '#' + targetBox + ' .color-picker-current-color-frame' ).css( 'background', 'none' );
          jQuery( '#' + targetBox + ' .color-picker-current-color-frame' ).css( 'background-color', current_select_color );
          //アディショナルモード時の対応
          if ( 'ta_responsible_additional_trigger_color_cover' == input_id ) {
            jQuery( '#ta_responsible_additional_trigger_type_table' ).css( 'color', current_select_color );
          } else if ( 'ta_responsible_additional_closer_color_cover' == input_id ) {
            jQuery( '#ta_responsible_additional_closer_type_table' ).css( 'color', current_select_color );
          }
        }
      }
    });
  });
});

function cp_rgbToHex(rgb) {
  if ( 'transparent' == rgb ) {
    hexCode = 'transparent';
  } else {
    hexCode = "#" + rgb.match(/\d+/g).map(function(a){return ("0" + parseInt(a).toString(16)).slice(-2)}).join("");
    if ( '#00000000' == hexCode ) { hexCode = 'transparent'; }
  }
  return hexCode;
}

function cp_gradRewrite(graOnoff, thisId) {
  var grdDirect = jQuery("input[name=" + thisId + "_grd_direct]:checked").val();
  var midOnoff = ( jQuery("input[name=" + thisId + "_grd_mid_color_onoff]").prop("checked")) ? 'valid' : 'invalid';
  var midPos = jQuery("input[name=" + thisId + "_grd_mid_color_pos]").val();
  var startColor = cp_rgbToHex(jQuery('#' + thisId + '_grd_start_color_cover .color-picker-current-color-frame').css('background-color'));
  var midColor = cp_rgbToHex(jQuery('#' + thisId + '_grd_mid_color_cover .color-picker-current-color-frame').css('background-color'));
  var stopColor = cp_rgbToHex(jQuery('#' + thisId + '_grd_stop_color_cover .color-picker-current-color-frame').css('background-color'));
  if ( 'valid' == midOnoff ) { var midInfo = midColor + " " + midPos + "%, "; } else { var midInfo = ""; }
  switch ( grdDirect ) {
    case 'bottom':
      var newDirect = 'top';
      var directNum = 0;
      var newStart = startColor;
      var newStop = stopColor;
      break;
    case 'top':
      var newDirect = 'bottom';
      var directNum = 0;
      var newStart = stopColor;
      var newStop = startColor;
      break;
    case 'right':
      var newDirect = 'left';
      var directNum = 1;
      var newStart = startColor;
      var newStop = stopColor;
      break;
    case 'left':
      var newDirect = 'right';
      var directNum = 1;
      var newStart = stopColor;
      var newStop = startColor;
      break;
    default:
      var newDirect = 'top';
      var directNum = 0;
      var newStart = startColor;
      var newStop = stopColor;
  }
  var gradCss = {
    filter:"progid:DXImageTransform.Microsoft.Gradient(GradientType=" + directNum + ", StartColorStr=" + newStart + ", EndColorStr=" + newStop + ")",
    background:"-ms-linear-gradient(" + newDirect + "," + startColor + " 0%," + midInfo + stopColor + " 100%)",
    background:"-o-linear-gradient(" + newDirect + "," + startColor + " 0%," + midInfo + stopColor + " 100%)",
    background:"-moz-linear-gradient(" + newDirect + "," + startColor + " 0%," + midInfo + stopColor + " 100%)",
    background:"-webkit-linear-gradient(" + newDirect + "," + startColor + " 0%," + midInfo + stopColor + " 100%)",
    background:"linear-gradient(to " + grdDirect +"," + startColor + " 0%," + midInfo + stopColor + " 100%)"
  }
  jQuery('#' + thisId + '-grd-seting-cover .color-picker-gradient-current-color-frame').css(gradCss);
  if ( 'valid' == graOnoff ) { jQuery('#' + thisId + '_cover #' + thisId + '-colorinfo-container .color-picker-current-color-frame').css(gradCss); }
}
