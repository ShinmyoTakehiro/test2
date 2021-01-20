/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-admin-functions.js: ( Latest Version 2.03 2017.03.01 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2016.02.17: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2016.05.05: ta_built_in追加 by Kotaro Kashiwamura.
/* File Version 2.02 2016.09.17: SEO設定の集中管理画面追加 by Kotaro Kashiwamura.
/* File Version 2.03 2017.03.01: ta_cal_1, ta_cal_1p2, ta_cal_1p2p3追加
/*                               アコーディオン(.nocookie-class-big-title)追加 by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/

jQuery(window).load( function() { //全てのコンテンツのロードが終了したら実行
  jQuery('.big-title').each(function(){
    var refid = jQuery(this).attr('id');
    var currenthis = ( jQuery.cookie( 'ta_theme_setting_history' ) ) ? jQuery.cookie( 'ta_theme_setting_history' ): '';
    if ( -1 == currenthis.indexOf( refid ) ) {
      jQuery('#' + refid.replace('_title', '_disp')).hide();
    } else {
      jQuery('#' + refid.replace('_title', '_disp')).show();
    }
    jQuery('#' + refid).on( 'click', function() {
      currenthis = ( jQuery.cookie( 'ta_theme_setting_history' ) ) ? jQuery.cookie( 'ta_theme_setting_history' ): '';
      if ( 'none' == jQuery('#' + refid.replace('_title', '_disp')).css('display') ) {
        if ( -1 == currenthis.indexOf( refid ) ) {
          var arr = currenthis.split(',');
          if ( arr.length > 50 ) {
            currenthis = currenthis.replace( arr[0] + ',', '' );
          }
          currenthis = currenthis + refid + ',';
          jQuery.cookie( 'ta_theme_setting_history', currenthis );
        }
      } else {
        if ( -1 != currenthis.indexOf( refid ) ) {
          currenthis = currenthis.replace( refid + ',', '' );
          jQuery.cookie( 'ta_theme_setting_history', currenthis );
        }
      }
      jQuery('#' + refid.replace('_title', '_disp')).slideToggle();
    } );
  });

  jQuery('.pro-title').each(function(){
    var refid = jQuery(this).attr('id');
    var currenthis = ( jQuery.cookie( 'ta_theme_setting_history' ) ) ? jQuery.cookie( 'ta_theme_setting_history' ): '';
    if ( -1 == currenthis.indexOf( refid ) ) {
      jQuery('#' + refid.replace('_title', '_disp')).hide();
    } else {
      jQuery('#' + refid.replace('_title', '_disp')).show();
    }
    jQuery('#' + refid).on( 'click', function() {
      currenthis = ( jQuery.cookie( 'ta_theme_setting_history' ) ) ? jQuery.cookie( 'ta_theme_setting_history' ): '';
      if ( 'none' == jQuery('#' + refid.replace('_title', '_disp')).css('display') ) {
        if ( -1 == currenthis.indexOf( refid ) ) {
          var arr = currenthis.split(',');
          if ( arr.length > 50 ) {
            currenthis = currenthis.replace( arr[0] + ',', '' );
          }
          currenthis = currenthis + refid + ',';
          jQuery.cookie( 'ta_theme_setting_history', currenthis );
        }
      } else {
        if ( -1 != currenthis.indexOf( refid ) ) {
          currenthis = currenthis.replace( refid + ',', '' );
          jQuery.cookie( 'ta_theme_setting_history', currenthis );
        }
      }
      jQuery('#' + refid.replace('_title', '_disp')).slideToggle();
    } );
  });
  
  jQuery('.group-title').each(function(){
    var refid = jQuery(this).attr('id');
    var currenthis = ( jQuery.cookie( 'ta_theme_setting_history' ) ) ? jQuery.cookie( 'ta_theme_setting_history' ): '';
    if ( -1 == currenthis.indexOf( refid ) ) {
      jQuery('#' + refid.replace('_title', '_disp')).hide();
    } else {
      jQuery('#' + refid.replace('_title', '_disp')).show();
    }
    jQuery('#' + refid).on( 'click', function() {
      currenthis = ( jQuery.cookie( 'ta_theme_setting_history' ) ) ? jQuery.cookie( 'ta_theme_setting_history' ): '';
      if ( 'none' == jQuery('#' + refid.replace('_title', '_disp')).css('display') ) {
        if ( -1 == currenthis.indexOf( refid ) ) {
          var arr = currenthis.split(',');
          if ( arr.length > 50 ) {
            currenthis = currenthis.replace( arr[0] + ',', '' );
          }
          currenthis = currenthis + refid + ',';
          jQuery.cookie( 'ta_theme_setting_history', currenthis );
        }
      } else {
        if ( -1 != currenthis.indexOf( refid ) ) {
          currenthis = currenthis.replace( refid + ',', '' );
          jQuery.cookie( 'ta_theme_setting_history', currenthis );
        }
      }
      jQuery('#' + refid.replace('_title', '_disp')).slideToggle();
    } );
  });
  
  jQuery('.nocookie-big-title').each(function(){
    var refid = jQuery(this).attr('id');
    jQuery('#' + refid.replace('_title', '_disp')).hide();
    jQuery('#' + refid).on( 'click', function() {
      jQuery('#' + refid.replace('_title', '_disp')).slideToggle();
    } );
  });
  
  jQuery('.class-big-title').each(function(){
    var refid = jQuery(this).attr('id');
    var currenthis = ( jQuery.cookie( 'ta_theme_setting_history' ) ) ? jQuery.cookie( 'ta_theme_setting_history' ): '';
    if ( -1 == currenthis.indexOf( refid ) ) {
      jQuery('.' + refid.replace('_title', '_disp')).hide();
    } else {
      jQuery('.' + refid.replace('_title', '_disp')).show();
    }
    jQuery('#' + refid).on( 'click', function() {
      currenthis = ( jQuery.cookie( 'ta_theme_setting_history' ) ) ? jQuery.cookie( 'ta_theme_setting_history' ): '';
      if ( 'none' == jQuery('.' + refid.replace('_title', '_disp')).css('display') ) {
        if ( -1 == currenthis.indexOf( refid ) ) {
          var arr = currenthis.split(',');
          if ( arr.length > 50 ) {
            currenthis = currenthis.replace( arr[0] + ',', '' );
          }
          currenthis = currenthis + refid + ',';
          jQuery.cookie( 'ta_theme_setting_history', currenthis );
        }
      } else {
        if ( -1 != currenthis.indexOf( refid ) ) {
          currenthis = currenthis.replace( refid + ',', '' );
          jQuery.cookie( 'ta_theme_setting_history', currenthis );
        }
      }
      jQuery('.' + refid.replace('_title', '_disp')).slideToggle();
    } );
  });
  
  jQuery('.nocookie-class-big-title').each(function(){
    var refid = jQuery(this).attr('id');
    jQuery('.' + refid.replace('_picker_title', '_picker_disp')).hide();
    jQuery('#' + refid).on( 'click', function() {
      jQuery('.' + refid.replace('_picker_title', '_picker_disp')).slideToggle();
    } );
  });
  
  jQuery('.grad-pup').each(function(){
    var refId = jQuery(this).attr('id');
    var refIdwH = '#' + refId;
    var tgtId = refId.replace('_title', '_disp');
    var tgtIdwH = '#' + tgtId;
    jQuery(refIdwH).on( 'click', function() {
      jQuery(tgtIdwH).css( 'width', '100%' );
      jQuery(tgtIdwH).fadeToggle(500);
    } );
    jQuery(tgtIdwH + ' .grad-close').on( 'click', function() {
      jQuery(tgtIdwH).fadeOut(500);
    } );
  } );
  
  jQuery('.grd_onoff_cover input').on( 'click', function() {
    var refid = jQuery(this).attr('id');
    var checkValue = (jQuery(this).prop('checked')) ? 'valid' : 'invalid';
    if ('valid' == checkValue) {
      var grdDirect = jQuery("input[name=" + refid.replace('_grad_onoff', '_grd_direct') + "]:checked").val();
      var midOnoff = ( jQuery("input[name=" + refid.replace('_grad_onoff', '_grd_mid_color_onoff') + "]").prop("checked")) ? 'valid' : 'invalid';
      var midPos = jQuery("input[name=" + refid.replace('_grad_onoff', '_grd_mid_color_pos') + "]").val();
      var startColor = rgbToHex(jQuery('#' + refid.replace('_grad_onoff', '_grd_start_color_cover') + ' .color-picker-current-color-frame').css('background-color'));
      var midColor = rgbToHex(jQuery('#' + refid.replace('_grad_onoff', '_grd_mid_color_cover') + ' .color-picker-current-color-frame').css('background-color'));
      var stopColor = rgbToHex(jQuery('#' + refid.replace('_grad_onoff', '_grd_stop_color_cover') + ' .color-picker-current-color-frame').css('background-color'));
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
      jQuery('#' + refid.replace('_grad_onoff', '_cover') + ' #' + refid.replace('_grad_onoff', '-colorinfo-container') + ' .color-picker-current-color-frame').css(gradCss);
      var imgPath = images_url.url;
      var gradWord = '<span class="grad-disp-img"><img src="' + imgPath + 'grad_disp.png"/></span>';
      jQuery('#' + refid.replace('_grad_onoff', '_cover') + ' #' + refid.replace('_grad_onoff', '-colorinfo-container') + ' .colorcode-disp').html( gradWord );
    } else {
      var inputId = refid.replace('_grad_onoff', '_cover');
      var inputName = refid.replace('_grad_onoff', '_select');
      var radioValue = jQuery( 'input[name=' + inputName + ']:checked' ).attr( 'class' );
      switch ( radioValue ) {
        case 'c-s-bg-input':
          var selected_color = rgbToHex(jQuery( '#' + inputId + ' .c-s-bg-color' ).css( 'background-color' ));
          break;
        case 'c-s-hl-input':
          var selected_color = rgbToHex(jQuery( '#' + inputId + ' .c-s-hl-color' ).css( 'background-color' ));
          break;
        case 'c-s-tonbg-input':
          var selected_color = rgbToHex(jQuery( '#' + inputId + ' .c-s-tonbg-color' ).css( 'background-color' ));
          break;
        case 'c-s-tonhl-input':
          var selected_color = rgbToHex(jQuery( '#' + inputId + ' .c-s-tonhl-color' ).css( 'background-color' ));
          break;
        case 'c-f-a-input':
          var selected_color = rgbToHex(jQuery( '#' + inputId + ' .c-f-a-color' ).css( 'background-color' ));
          break;
        case 'c-f-ahover-input':
          var selected_color = rgbToHex(jQuery( '#' + inputId + ' .c-f-ahover-color' ).css( 'background-color' ));
          break;
        case 'selectable-input':
          var key_name = refid.replace('_grad_onoff', '');
          var selected_color = jQuery( '#' + inputId + ' input[name=' + key_name + ']' ).val();
          break;
        default:
          var selected_color = 'invalid';
          break;
      }
      if ( 'invalid' != selected_color ) {
        var targetBox = refid.replace('_grad_onoff', '-colorinfo-container');
        jQuery('#' + targetBox + ' .color-picker-current-color-frame').css( 'background', 'none' );
        jQuery('#' + targetBox + ' .color-picker-current-color-frame').css( 'background-color', selected_color );
        if ( 'transparent' == selected_color ) {
          var selected_color_disp = '透明';
        } else if ( '' == selected_color ) {
          var selected_color_disp = '未定';
        } else {
          var selected_color_disp = selected_color;
        }
        jQuery('#' + targetBox + ' .colorcode-disp').html( selected_color_disp );
      }
    }
  });
  
  jQuery('.grd_mid_color_onoff_cover input').on( 'click', function() {
    var refid = jQuery(this).attr('id');
    var checkValue = (jQuery(this).prop('checked')) ? 'valid' : 'invalid';
    if ('valid' == checkValue) {
      jQuery('.' + refid.replace('_grd_mid_color_onoff', '_mid_cover') + ' .color-picker-exp').css( 'height', 'auto' );
      jQuery('.' + refid.replace('_grd_mid_color_onoff', '_mid_cover')).css( 'visibility', 'visible' );
    } else {
      jQuery('.' + refid.replace('_grd_mid_color_onoff', '_mid_cover') + ' .color-picker-exp').css( 'height', '0' );
      jQuery('.' + refid.replace('_grd_mid_color_onoff', '_mid_cover')).css( 'visibility', 'hidden' );
    }
  });
  
  jQuery('.gradient-color-setting-container').each(function(){
    var refId = jQuery(this).attr('id');
    //Direction
    jQuery('#' + refId + ' .grd-direct-trigger').on( 'click', function() {
      gradRewrite('#' + refId + ' .grd-direct-trigger', '-grd-direct-cover');
    });
    //Mid onoff
    jQuery('#' + refId + ' .grd_mid_color_onoff_cover input').on( 'click', function() {
      gradRewrite('#' + refId + ' .grd_mid_color_onoff_cover input', '_grd_mid_color_onoff');
    });
    //Mid position
    jQuery('#' + refId + ' .grd_mid_color_pos_cover input').keyup(function() {
      gradRewrite('#' + refId + ' .grd_mid_color_pos_cover input', '_grd_mid_color_pos');
    });
    //Start
    jQuery('#' + refId + ' .inner-grad-setting-start .c-s-bg-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-start .c-s-bg-input', '_grd_start_color-c-s-bg-input');
    });
    jQuery('#' + refId + ' .inner-grad-setting-start .c-s-hl-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-start .c-s-hl-input', '_grd_start_color-c-s-hl-input');
    });
    jQuery('#' + refId + ' .inner-grad-setting-start .c-s-tonbg-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-start .c-s-tonbg-input', '_grd_start_color-c-s-tonbg-input');
    });
    jQuery('#' + refId + ' .inner-grad-setting-start .c-s-tonhl-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-start .c-s-tonhl-input', '_grd_start_color-c-s-tonhl-input');
    });
    jQuery('#' + refId + ' .inner-grad-setting-start .c-f-a-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-start .c-f-a-input', '_grd_start_color-c-f-a-input');
    });
    jQuery('#' + refId + ' .inner-grad-setting-start .c-f-ahover-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-start .c-f-ahover-input', '_grd_start_color-c-f-ahover-input');
    });
    jQuery('#' + refId + ' .inner-grad-setting-start .selectable-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-start .selectable-input', '_grd_start_color-selectable-input');
    });
    //Mid
    jQuery('#' + refId + ' .inner-grad-setting-mid .c-s-bg-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-mid .c-s-bg-input', '_grd_mid_color-c-s-bg-input');
    });
    jQuery('#' + refId + ' .inner-grad-setting-mid .c-s-hl-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-mid .c-s-hl-input', '_grd_mid_color-c-s-hl-input');
    });
    jQuery('#' + refId + ' .inner-grad-setting-mid .c-s-tonbg-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-mid .c-s-tonbg-input', '_grd_mid_color-c-s-tonbg-input');
    });
    jQuery('#' + refId + ' .inner-grad-setting-mid .c-s-tonhl-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-mid .c-s-tonhl-input', '_grd_mid_color-c-s-tonhl-input');
    });
    jQuery('#' + refId + ' .inner-grad-setting-mid .c-f-a-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-mid .c-f-a-input', '_grd_mid_color-c-f-a-input');
    });
    jQuery('#' + refId + ' .inner-grad-setting-mid .c-f-ahover-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-mid .c-f-ahover-input', '_grd_mid_color-c-f-ahover-input');
    });
    jQuery('#' + refId + ' .inner-grad-setting-mid .selectable-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-mid .selectable-input', '_grd_mid_color-selectable-input');
    });
    //Stop
    jQuery('#' + refId + ' .inner-grad-setting-stop .c-s-bg-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-stop .c-s-bg-input', '_grd_stop_color-c-s-bg-input');
    });
    jQuery('#' + refId + ' .inner-grad-setting-stop .c-s-hl-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-stop .c-s-hl-input', '_grd_stop_color-c-s-hl-input');
    });
    jQuery('#' + refId + ' .inner-grad-setting-stop .c-s-tonbg-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-stop .c-s-tonbg-input', '_grd_stop_color-c-s-tonbg-input');
    });
    jQuery('#' + refId + ' .inner-grad-setting-stop .c-s-tonhl-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-stop .c-s-tonhl-input', '_grd_stop_color-c-s-tonhl-input');
    });
    jQuery('#' + refId + ' .inner-grad-setting-stop .c-f-a-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-stop .c-f-a-input', '_grd_stop_color-c-f-a-input');
    });
    jQuery('#' + refId + ' .inner-grad-setting-stop .c-f-ahover-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-stop .c-f-ahover-input', '_grd_stop_color-c-f-ahover-input');
    });
    jQuery('#' + refId + ' .inner-grad-setting-stop .selectable-input').on( 'click', function() {
      gradRewrite('#' + refId + ' .inner-grad-setting-stop .selectable-input', '_grd_stop_color-selectable-input');
    });
  });
  
  jQuery('.digest_steady_onoff_cover input').on( 'click', function() {
    var refid = jQuery(this).attr('id');
    var checkValue = (jQuery(this).prop('checked')) ? 'valid' : 'invalid';
    if ('invalid' == checkValue) {
      jQuery('#' + refid.replace('_onoff', '_shortcode')).fadeIn();
      jQuery('#' + refid.replace('_onoff', '_usable_cover')).fadeIn();
      jQuery('#' + refid.replace('_onoff', '_steady_cat_cover')).fadeOut();
    } else {
      jQuery('#' + refid.replace('_onoff', '_shortcode')).fadeOut();
      jQuery('#' + refid.replace('_onoff', '_usable_cover')).fadeOut();
      jQuery('#' + refid.replace('_onoff', '_steady_cat_cover')).fadeIn();
    }
  });
  
  jQuery('.headline_type_sel_cover input').on( 'click', function() {
    var refclass = jQuery(this).attr('class');
    var checkValue = jQuery(this).val();
    if ('simple' != checkValue && 'left' != checkValue) {
      jQuery('#' + refclass.replace('_type', '_box_color_container')).fadeIn();
    } else {
      jQuery('#' + refclass.replace('_type', '_box_color_container')).fadeOut();
    }
    if ('left' == checkValue) {
      jQuery('#' + refclass.replace('_type', '_left_color_container')).fadeIn();
      jQuery('#' + refclass.replace('_type', '_over_color_grad_container')).fadeOut();
      jQuery('#' + refclass.replace('_type', '_over_color_grad_container_off_disp')).fadeIn();
      jQuery('#' + refclass.replace('_type', '-left-grad-limit')).fadeIn();
    } else {
      jQuery('#' + refclass.replace('_type', '_left_color_container')).fadeOut();
      jQuery('#' + refclass.replace('_type', '_over_color_grad_container')).fadeIn();
      jQuery('#' + refclass.replace('_type', '_over_color_grad_container_off_disp')).fadeOut();
      jQuery('#' + refclass.replace('_type', '-left-grad-limit')).fadeOut();
    }
    if ( 'simple' == checkValue || 'left' == checkValue || "box" == checkValue ) {
      jQuery('#' + refclass.replace('_type', '_overunderline_container')).fadeIn();
    } else {
      jQuery('#' + refclass.replace('_type', '_overunderline_container')).fadeOut();
    }
    if ( 'simple' != checkValue && 'left' != checkValue ) {
      jQuery('#' + refclass.replace('_type', '_box_round_container')).fadeIn();
    } else {
      jQuery('#' + refclass.replace('_type', '_box_round_container')).fadeOut();
    }
    if ( 'balloon1' == checkValue ) {
      jQuery('#' + refclass.replace('_type', '_balloon1_container')).fadeIn();
    } else {
      jQuery('#' + refclass.replace('_type', '_balloon1_container')).fadeOut();
    }
    if ( 'balloon2' == checkValue ) {
      jQuery('#' + refclass.replace('_type', '_balloon2_container')).fadeIn();
    } else {
      jQuery('#' + refclass.replace('_type', '_balloon2_container')).fadeOut();
    }
  });
  
  jQuery('.headline_font_style_onoff_cover input').on( 'click', function() {
    var refid = jQuery(this).attr('id');
    var checkValue = (jQuery(this).prop('checked')) ? 'valid' : 'invalid';
    if ('valid' == checkValue) {
      jQuery('.' + refid.replace('_font_style_onoff', '_common_font_valid')).css( 'color', '#bbbbbb' );
    } else {
      jQuery('.' + refid.replace('_font_style_onoff', '_common_font_valid')).css( 'color', '#777777' );
    }
  });
  
  if (!jQuery('#ta-menu-group').length){
    jQuery('<div id="ta-menu-group"></div>').prependTo('#ta-setting-form');
  }
  if (!jQuery('#ta-menu-group #ta-menu-title').length){
    jQuery('#ta-menu-title').prependTo('#ta-menu-group');
  }
  if (!jQuery('#ta-menu-talink').length){
    jQuery('<div id="ta-menu-talink"></div>').appendTo('#ta-menu-group');
  }
  if (!jQuery('#ta-menu-talink-anc').length){
    jQuery('#ta-menu-talink').wrap('<a id="ta-menu-talink-anc" href="http://tec-aid.com/ta_theme001_add_info/" target="_blank"></a>')
  }

});

function ta_no_img(idNum) {
  if ( 'no_image' != jQuery(idNum).val() ) {
    var imgPath = images_url.url;
    var imgUrl = imgPath + "ta_no_img.png";
    jQuery(idNum).val('no_image');
    jQuery(idNum + '_info').html('<span style="font-weight:bold;color:#ff0000;" class="before-done">更新すると登録されている画像URL情報は消去されます。</span>');
    jQuery( idNum + '_disp' ).show();
    jQuery( idNum + '_disp' ).attr( 'src', imgUrl );
  }
}

function tomei(idNum) {
  jQuery(idNum).val('transparent');
  jQuery(idNum + '_cp_cover a.wp-color-result').css('background-color', 'transparent');
  if ( "selectable" == jQuery("input[name=" + idNum.replace('#', '') + "_select]:checked").val() ) {
    if ( -1 != idNum.indexOf('_grd_start_color') || -1 != idNum.indexOf('_grd_mid_color') || -1 != idNum.indexOf('_grd_stop_color') ) {  //グラデーション設定内
      //グラデーション設定内の表示
      jQuery(idNum + '-colorinfo-container .color-picker-current-color-frame').css('background', 'none');
      jQuery(idNum + '-colorinfo-container .color-picker-current-color-frame').css('background-color', 'transparent');
      jQuery(idNum + '-colorinfo-container .colorcode-disp').html('透明');
      //グラデーション表記の場合の親色表示IDの取得
      if ( -1 != idNum.indexOf('_grd_start_color') ) {
        var parentId = idNum.replace( /_grd_start_color/g, '' );
      } else if ( -1 != idNum.indexOf('_grd_mid_color') ) {
        var parentId = idNum.replace( /_grd_mid_color/g, '' );
      } else if ( -1 != idNum.indexOf('_grd_stop_color') ) {
        var parentId = idNum.replace( /_grd_stop_color/g, '' );
      } else {
        var parentId = '';
      }
      //親設定内表示
      var gradOnoff = ( jQuery(parentId + '_cover .grd_onoff_cover input').prop('checked') ) ? 'valid' : 'invalid';
      var keyId = parentId.replace('#', '');
      onoff_gradRewrite(gradOnoff, keyId);
    } else {  //通常単色設定
      if ( ! jQuery(idNum + '_cover .grd_onoff_cover input').prop('checked') ) { //グラデーションOff
        jQuery(idNum + '-colorinfo-container .color-picker-current-color-frame').css('background', 'none');
        jQuery(idNum + '-colorinfo-container .color-picker-current-color-frame').css('background-color', 'transparent');
        jQuery(idNum + '-colorinfo-container .colorcode-disp').html('透明');
      }
    }
  }
}

function ta_no_link(idNum) {
  if ( 'no_link' != jQuery(idNum).val() ) {
    jQuery(idNum).val('no_link');
    jQuery(idNum + '_info').html('<span style="font-weight:bold;color:#ff0000;" class="before-done">更新すると登録されているリンク情報は消失します。</span>');
  }
}

function ta_no_disp(idNum) {
  jQuery(idNum).val('no_disp');
}

function ta_built_in(idNum) {
  if ( 'built_in' != jQuery(idNum).val() ) {
    jQuery(idNum).val('built_in');
    var imgPath = images_url.url;
    switch ( idNum ) {
      case '#ta_common_top_outframe_pic':
        var imgUrl = imgPath + "ta-bg-images/bodyhome_bg.png";
        break;
      case '#ta_common_outframe_pic':
        var imgUrl = imgPath + "ta-bg-images/body_bg.png";
        break;
      case '#ta_top_topcatch_pic1':
        var imgUrl = imgPath + "ta-top-catch/valentine-candy.jpg";
        break;
      case '#ta_top_topcatch_pic2':
        var imgUrl = imgPath + "ta-top-catch/jelly-babies.jpg";
        break;
      case '#ta_top_topcatch_pic3':
        var imgUrl = imgPath + "ta-top-catch/bananas.jpg";
        break;
      case '#ta_header_logo_pic':
        var imgUrl = imgPath + "ta-header-images/logo.png";
        break;
      case '#ta_footer_frame_pic':
        var imgUrl = imgPath + "ta-bg-images/footer_bg.png";
        break;
      case '#ta_responsible_footer_frame_pic':
        var imgUrl = imgPath + "ta-res-bg-images/res_footer_bg.png";
        break;
      case '#ta_common_back2top_img':
        var imgUrl = imgPath + "ta-back2top-images/ta-back2top.png";
        break;
      case '#ta_common_favicon_img':
        var imgUrl = imgPath + "ta-favicon-images/favicon.ico";
        break;
      case '#ta_common_appletouch_img':
        var imgUrl = imgPath + "ta-favicon-images/apple-touch-icon.png";
        break;
      default:
        var imgUrl = "";
    }
    jQuery( idNum + '_info').html('<span style="font-weight:bold;color:#ff7f00;" class="before-done">更新すると下の内蔵画像URL情報が登録されます。</span>');
    jQuery( idNum + '_disp' ).show();
    jQuery( idNum + '_disp' ).attr( 'src', imgUrl );
  }
}

function ta_cal_1(idNum) {
  var cal_height1 = jQuery('#bg-bar-cal-height1').text();
  jQuery(idNum).val(parseInt(cal_height1));
}

function ta_cal_1p2(idNum) {
  var cal_height1 = jQuery('#bg-bar-cal-height1').text();
  var cal_height2 = jQuery('#bg-bar-cal-height2').text();
  var total = parseInt(cal_height1) + parseInt(cal_height2);
  jQuery(idNum).val(total);
}

function ta_cal_1p2p3(idNum) {
  var cal_height1 = jQuery('#bg-bar-cal-height1').text();
  var cal_height2 = jQuery('#bg-bar-cal-height2').text();
  var cal_height3 = jQuery('#bg-bar-cal-height3').text();
  var total = parseInt(cal_height1) + parseInt(cal_height2) + parseInt(cal_height3);
  jQuery(idNum).val(total);
}

function rgbToHex(rgb) {
  if ( 'transparent' == rgb ) {
    hexCode = 'transparent';
  } else {
    hexCode = "#" + rgb.match(/\d+/g).map(function(a){return ("0" + parseInt(a).toString(16)).slice(-2)}).join("");
    if ( '#00000000' == hexCode ) { hexCode = 'transparent'; }
  }
  return hexCode;
}

function gradRewrite(thisClass, thisId) {
  var refid = jQuery(thisClass).attr('id');
  var grdDirect = jQuery("input[name=" + refid.replace(thisId, '_grd_direct') + "]:checked").val();
  var midOnoff = ( jQuery("input[name=" + refid.replace(thisId, '_grd_mid_color_onoff') + "]").prop("checked")) ? 'valid' : 'invalid';
  var midPos = jQuery("input[name=" + refid.replace(thisId, '_grd_mid_color_pos') + "]").val();
  var startColor = rgbToHex(jQuery('#' + refid.replace(thisId, '_grd_start_color_cover') + ' .color-picker-current-color-frame').css('background-color'));
  var midColor = rgbToHex(jQuery('#' + refid.replace(thisId, '_grd_mid_color_cover') + ' .color-picker-current-color-frame').css('background-color'));
  var stopColor = rgbToHex(jQuery('#' + refid.replace(thisId, '_grd_stop_color_cover') + ' .color-picker-current-color-frame').css('background-color'));
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
  jQuery('#' + refid.replace(thisId, '-grd-seting-cover') + ' .color-picker-gradient-current-color-frame').css(gradCss);
  //グラデーション表記の親色表示IDの取得
  parentId = refid.replace( thisId, '_cover' );
  if ( jQuery('#' + parentId + ' .grd_onoff_cover input').prop('checked') ) { //グラデーションOn
    jQuery('#' + refid.replace(thisId, '_cover') + ' #' + refid.replace(thisId, '-colorinfo-container') + ' .color-picker-current-color-frame').css(gradCss);
  }
}

function onoff_gradRewrite(graOnoff, thisId) {
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
