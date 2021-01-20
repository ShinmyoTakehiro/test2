/*******************************************************************************************************/
/*
/* テックエイドの成長する自作ホームページWordPressテーマ『 TAテーマ001 (ta-theme001) 』
/*
/* ta-admin-setting-upload.js: ( Latest Version 2.01 2017.02.05 )
/*
/* このプログラムの著作権、使用権、その他全ての権利はde集まれ株式会社に属します。
/* The copyright, royalty and all the other rights of this program belong to deatsumare Corporation.
/*
/* File Version 履歴
/* File Version 2.00 2015.12.24: first edition by Kotaro Kashiwamura.
/* File Version 2.01 2017.02.05: class "before-done"追加 by Kotaro Kashiwamura.
/*
/*******************************************************************************************************/

jQuery( function() {
  jQuery('.media-upload').each(function(){
    var rel = jQuery(this).attr("rel");
    jQuery(this).click(function(){
      window.send_to_editor = function(html) {
        imgurl = jQuery('img', html).attr('src');
        jQuery('#'+rel).val(imgurl);
        jQuery('#'+rel+'_disp').show();
        jQuery('#'+rel+'_disp').attr('src', imgurl);
        jQuery('#'+rel+'_info').html('<span style="font-weight:bold;color:#ff7f00;" class="before-done">更新すると下の画像URL情報が登録されます。</span>');
        tb_remove();
      }
      formfield = jQuery('#'+rel).attr('name');
      tb_show(null, 'media-upload.php?post_id=0&type=image&TB_iframe=true');
      return false;
    }); 
  }); 
});