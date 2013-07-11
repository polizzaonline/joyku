<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<!--引入后前台公共public的模版文件 -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo ($seo["title"]); ?>_<?php echo ($seo["subtitle"]); ?></title>
<?php if(!empty($seo["keywords"])): ?><meta name="keywords" content="<?php echo ($seo["keywords"]); ?>" /><?php endif; ?>
<?php if(!empty($seo["description"])): ?><meta name="description" content="<?php echo ($seo["description"]); ?>" /><?php endif; ?>
<meta property="qc:admins" content="12472730776130006375" />
<link rel="shortcut icon" href="__PUBLIC__/images/fav.ico" type="image/x-icon">
__SITE_THEME_CSS__
<!--[if gte IE 7]><!-->
    <link href="__PUBLIC__/js/dialog/skins5/idialog.css" rel="stylesheet" />
<!--<![endif]-->
<!--[if lt IE 7]>
    <link href="__PUBLIC__/js/dialog/skins5/idialog.css" rel="stylesheet" />
<![endif]-->
<script>var siteUrl = '__SITE_URL__',show_login_url='<?php echo U("public/user/ajaxlogin");?>',show_register_url='<?php echo U("public/user/ajaxregister");?>';</script>
<script src="__PUBLIC__/js/jquery.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/common.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/IK.js" type="text/javascript" data-cfg-autoload="false"></script>
<script src="__PUBLIC__/js/all.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="__PUBLIC__/js/html5.js"></script>
<![endif]-->
<script src="__PUBLIC__/js/dialog/jquery.artDialog.min5.js" type="text/javascript"></script> 
__EXTENDS_JS__
<!--<script src="http://l.tbcdn.cn/apps/top/x/sdk.js?appkey=21509482"></script>-->

<script type="text/javascript" src="__PUBLIC__/js/lib/jquery.text-selection.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/lib/ajaxfileupload.js"></script>
</head>

<body>
<!--引入后前台公共public的模版文件 -->
<!--头部开始-->
<header>
<?php if($app_name == 'public' && empty($visitor) && $module_name == 'index'): ?><div class="hd-wrap">
            <div class="hd" id="anony-nav">
                <div class="logo">
                    <h1><a href="__SITE_URL__" title="爱客开源">爱客开源</a></h1>
                </div>
                <div class="anony-srh">
                <form onsubmit="return searchForm(this);" method="post" action="<?php echo U('public/search/index');?>">
                <span class="inp"><input type="text" autocomplete="off" placeholder="书籍、电影、音乐、小组、小站、成员" size="12" maxlength="60" class="key" name="q"></span>
                <span class="bn"><input type="submit" value="搜索"></span>
                </form>
                </div>
                
                <div class="top-nav-items">
                <ul>
                <li><a href="__SITE_URL__" class="lnk-home" target="_blank">爱客首页</a></li>
                <li><a href="<?php echo U('group/index/index');?>" class="lnk-group" target="_blank">爱客小组</a></li>
                <li><a href="<?php echo U('article/index/index');?>" class="lnk-article" target="_blank">爱客阅读</a></li>
                <li><a href="<?php echo U('location/index/index');?>" class="lnk-location" target="_blank">爱客同城</a></li>
                <li><a href="<?php echo U('site/index/index');?>" class="lnk-site" target="_blank">爱客小站</a></li>
                <li><a href="<?php echo U('mall/index/index');?>" class="lnk-mall" target="_blank">爱客商城</a></li>
                </ul>
                </div>
            </div>
</div>
<?php else: ?>
<div class="top_nav">
  <div class="top_bd">
    
    <div class="top_info">
        <?php if(empty($visitor)): ?><a href="<?php echo U('public/user/login');?>">登录</a> | <a href="<?php echo U('public/user/register');?>">注册</a> | <a href="<?php echo U('public/oauth/index', array('mod'=>'qq'));?>" target="_blank" style="margin-left:10px"><img  align="absmiddle" title="QQ登录" src="__PUBLIC__/images/connect_qq.png"> 登录</a> | <a href="<?php echo U('public/oauth/index', array('mod'=>'sina'));?>" target="_blank" style="margin-left:10px"><img  align="absmiddle" title="新浪微博" src="__PUBLIC__/images/connect_sina_weibo.png"> 登录</a>    
        <?php else: ?>
        <a id="newmsg" href="<?php echo U('public/message/ikmail',array('d'=>'inbox'));?>">新消息(<?php echo ($count_new_msg); ?>)</a> | 
        <a href="<?php echo U('space/index/index', array('id'=>$visitor['doname']));?>">
        	<?php echo ($visitor["username"]); ?>
        </a> | 
        <a href="<?php echo U('public/user/setbase');?>">设置</a> | 
        <a href="<?php echo U('public/user/logout');?>">退出</a><?php endif; ?>
    </div>


    <div class="top_items">
        <ul>
             <?php if(is_array($topNav)): foreach($topNav as $key=>$item): ?><li><a href="<?php echo ($item[url]); ?>" title="<?php echo ($item[name]); ?>"><?php echo ($item[name]); ?></a></li><?php endforeach; endif; ?>
             <li><a href="<?php echo U('develop/index/index');?>">应用商店</a></li>
             <li><a href="<?php echo U('public/help/download');?>" style="color:#fff">IKPHP源码下载</a></li>                                                      
        </ul>
    </div>
  	<div class="cl"></div>
    
  </div>
  
</div><?php endif; ?>
<!--APP NAV-->

</header>

<?php if($app_name == 'public' && !empty($visitor)): ?><div id="header">
    
	<div class="site_nav">
        <div class="<?php echo ($logo[style]); ?>">
            <a href="<?php echo ($logo[url]); ?>"><?php echo ($logo[name]); ?></a>
        </div>
		<div class="appnav">
			    <ul id="nav_bar">
                    <?php if(is_array($arrNav)): foreach($arrNav as $key=>$item): ?><li><a href="<?php echo ($item[url]); ?>" class="a_<?php echo ($key); ?>"><?php echo ($item[name]); ?></a></li><?php endforeach; endif; ?>
			    </ul>
		   <form onsubmit="return searchForm(this);" method="post" action="<?php echo U('public/search/index');?>">
                <input type="hidden" value="all" name="type">
                <div id="search_bar">
                    <div class="inp"><input type="text" placeholder="小组、话题、日志、成员、小站" value="" class="key" name="q"></div>
                    <div class="inp-btn"><input type="submit" class="search-button" value="搜索"></div>
                </div>
		    </form>
		</div>
        <div class="cl"></div>
	</div>
        
</div><?php endif; ?>
<!--header-->
<div id="header">
    
	<div class="site_nav">
        <div class="<?php echo ($logo[style]); ?>">
            <a href="<?php echo ($logo[url]); ?>"><?php echo ($logo[name]); ?></a>
        </div>
		<div class="appnav">
			    <ul id="nav_bar">
                    <?php if(is_array($arrNav)): foreach($arrNav as $key=>$item): ?><li><a href="<?php echo ($item[url]); ?>" class="a_<?php echo ($key); ?>"><?php echo ($item[name]); ?></a></li><?php endforeach; endif; ?>
			    </ul>
		   <form onsubmit="return searchForm(this);" method="post" action="<?php echo U('public/search/index');?>">
                <input type="hidden" value="all" name="type">
                <div id="search_bar">
                    <div class="inp"><input type="text" placeholder="小组、话题、日志、成员、小站" value="" class="key" name="q"></div>
                    <div class="inp-btn"><input type="submit" class="search-button" value="搜索"></div>
                </div>
		    </form>
		</div>
        <div class="cl"></div>
	</div>
        
</div>

<div class="midder">
<div class="mc">
	<h1><?php echo ($seo["title"]); ?></h1>
	<div class="cleft">
    	<div id="mod-status-cate">
            <div class="status-cate">
                <a class="bn-status-more" href="#"><span>全部</span><i></i></a>
                <div class="more-status-items">
                  <table cellspacing="0" cellpadding="0">
                    <tbody>
                      <tr><td><span class="cate-list-title">分组查看</span></td></tr>
                      <tr><td><a class="on" href="#">全部</a></td></tr>
                      <tr><td><a class="" href="#">日记</a></td></tr>
                      <tr><td><a class="" href="#">相册</a></td></tr>
                  </tbody></table>
                </div>
            </div>
    	</div>

		<!--内容开始-->
        <div id="statuses">
        
<div class="mod isay isay-disable" id="db-isay">
	<form action="<?php echo U('space/update/publish');?>" method="post" name="mbform" onsubmit="return checkFrom(this)">
    <ul class="isay-links">
      <li class="isay-main active"><a href="javascript:void(0);" data-action="main">说句话</a></li>
      <li class="isay-share"><a href="javascript:void(0);" data-action="sharesite">推荐网页</a></li>
     <!-- <li class="isay-tab-subject"><a href="javascript:void(0);" data-action="subject">分享电影</a></li> -->
      <li class="notes-link"><a title="添加日记" href="#">写日记</a></li>
    </ul>
    <div class="isay-act" id="isay-url-field"></div>
    <div class="item">
      <p class="highlighter mention-highlighter"></p>
      <p class="highlighter error-highlighter"></p>
      <label for="isay-cont" id="isay-label">快来分享一下你今天的所见所得吧...</label>
      <textarea rows="1" name="comment" id="isay-cont" tabindex="1" data-minheight="90" maxlength="150"></textarea>
    </div>
    <div class="isay-act" id="isay-act-field"></div>
    <div class="btn">
      <span id="isay-counter"></span>
      <span class="bn-submit bn-flat"><input type="submit" value="我来说" tabindex="1" id="isay-submit" disabled></span>
    </div>
  </form>
  <div class="btn-group">
    <form method="post" enctype="multipart/form-data" action="<?php echo U('space/update/uploadImg');?>" data-action="pic" id="isay-upload" charset="utf-8">
      <input type="file" title="上传照片" name="image" data-action="pic" autocomplete="off" tabindex="2" id="isay-upload-inp" onChange="Ik.upload()">
    </form>
    <a title="上传照片" class="ico ico-pic"   data-action="pic" tabindex="-1" href="javascript:void(0);" >照片</a>
    <a title="添加话题" class="ico ico-topic" data-action="topic" tabindex="2" href="javascript:void(0);" >话题</a>
  </div>
</div>
<script language="javascript">
	var Ik = {upload:function(){IK.uplaodPic()}};
</script>

<!--内容-->
<div class="stream-items">
	<?php if(is_array($arrFeed)): foreach($arrFeed as $key=>$item): ?><div data-object-id="536893167" data-object-kind="1018" data-target-type="sns" data-action="1" data-sid="1188476174" style="" class="status-item">
    <div data-status-id="1188476174" class="mod">
      
      <div class="hd">
        <a title="<?php echo ($item[user][username]); ?>" href="<?php echo U('space/index/index',array('id'=>$item[user][doname]));?>"><img alt="<?php echo ($item[user][username]); ?>" src="<?php echo ($item[user][face]); ?>"></a>
      </div>
      
      <div class="bd layout-2"> 
       	<?php echo ($item[content]); ?>
        <div class="actions">
          <span title="<?php echo (date('Y-m-d h:m:s',$item["addtime"])); ?>" class="created_at"><a href="#"><?php echo getTime($item[addtime],time()); ?></a></span>
          &nbsp;&nbsp;
          <a data-action-type="showComments" class="btn btn-action-reply" href="#">回应</a>
          &nbsp;&nbsp;<a data-action-type="deleteStatus" class="btn btn-action-reply-delete" href="#">删除</a>
        </div>

        <div class="others">
          <div class="comments">
              <div class="comments-items"></div>
              <form class="comment-form" action="#" method="post">
                  <input type="text" data-type="status-comment" class="comment-text" name="text" maxlength="280">
                  <input type="submit" data-type="status-comment" value="发表回应">
                  <a class="add-more-comments" href="javascript:void(0);">继续回应</a>
              </form>
          </div>
        </div>
        
      </div><!--//layout2 -->
    </div>
</div><?php endforeach; endif; ?>
</div>
<!--//内容-->
        </div>
        

    </div><!--//cleft-->
    <div class="cright">
		
    </div><!--//right-->
</div>
</div>

<!--引入后前台的模版文件 -->
<!--footer-->
<?php if(empty($$visitor)): ?><div id="g-popup-reg" class="popup-reg" style="display:none;"><div class="bd"><iframe src="about:blank" frameborder="0" scrolling="no"></iframe><a href="javascript:;" class="lnk-close">&times;</a></div></div><?php endif; ?>
<footer>
<div id="footer">
	<div class="f_content">
        <span class="fl gray-link" id="icp">
            &copy; 2012－2015 IKPHP.COM, all rights reserved <span><a href="http://www.miibeian.gov.cn/" target="_blank">京ICP备13018602号</a></span>
        </span>
        
        <span class="fr">
            <a href="<?php echo U('public/help/about');?>">关于爱客</a>
            · <a href="<?php echo U('public/help/contact');?>">联系我们</a>
            · <a href="<?php echo U('public/help/agreement');?>">用户条款</a>
            · <a href="<?php echo U('public/help/privacy');?>">隐私申明</a>
        </span>
        <div class="cl"></div>
        <p>Powered by <a class="softname" href="<?php echo (IKPHP_SITEURL); ?>"><?php echo (IKPHP_SITENAME); ?></a> <?php echo (IKPHP_VERSION); ?>  
        <font color="green">ThinkPHP版本<?php echo (THINK_VERSION); ?></font>  目前有 <?php echo ($count_online_user); ?> 人在线 
        <!--<script src="http://s6.cnzz.com/stat.php?id=5262498&web_id=5262498" language="JavaScript"></script><br />-->
        <span style="font-size:0.83em;">{__RUNTIME__}          </span>

        
       
        </p>   
    </div>
</div>
</footer>
<div id="styleBox"><a href="<?php echo U('public/index/style');?>">风格设置</a></div>
<!-- Baidu Button BEGIN -->
<script type="text/javascript" id="bdshare_js" data="type=slide&amp;img=1&amp;pos=right&amp;uid=0" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
//document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
</script>
<!-- Baidu Button END -->

</body>
</html>