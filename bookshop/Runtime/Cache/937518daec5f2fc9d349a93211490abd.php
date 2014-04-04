<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta charset="GB2312">
    <title>Bookshop</title>
    <script src="/bookshop/Public/Js/jquery.js"></script>
    <script src="/bookshop/Public/Js/ajax.js">
    </script>
    <link rel="stylesheet" type="text/css" href="/bookshop/Public/Pure/pure-min.css" />


    <!--[if lte IE 8]>
    <link rel="stylesheet" type="text/css" href="/app/Public/Pure/css/layouts/side-menu.css" />
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <link rel="stylesheet" type="text/css" href="/app/Public/Pure/css/layouts/side-menu-old-ie.css" />
    <!--<![endif]-->

</head>
<body>



<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="#">Company</a>

            <ul>

                <li><a class="x1" href="#">注册</a></li>
                <li><a class="x2" href="#">登陆</a></li>
                <li >
                    <a  class="x3" href="#">商品</a>
                </li>
                <li><a  class="x4" href="#">商品列表</a></li>

            </ul>
        </div>
    </div>

    <div id="main">
        <div><?php echo ($id); ?></div>
        <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img src="/bookshop/Public/Uploads/s_<?php echo ($vo["image"]); ?>" />
            <FORM method="post" action="__URL__/order">

                商品名：<INPUT type="text" name="in" value="<?php echo ($vo["name"]); ?>" readonly="readonly"/>
                价格：<INPUT type="text" name="no" value="<?php echo ($vo["price"]); ?>" readonly="readonly"/>
                <input type="hidden" name="image" value="<?php echo ($vo["image"]); ?>">
                <INPUT type="submit" value="提交">
            </FORM><?php endforeach; endif; else: echo "" ;endif; ?>


</div>