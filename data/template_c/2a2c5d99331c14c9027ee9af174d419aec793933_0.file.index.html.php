<?php
/* Smarty version 3.1.30, created on 2016-11-10 14:32:41
  from "D:\wamp64\www\mvc\tpl\index\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array(
    'version' => '3.1.30',
    'unifunc' => 'content_582414899e4418_31982986',
    'has_nocache_code' => false,
    'file_dependency' =>
        array(
            '2a2c5d99331c14c9027ee9af174d419aec793933' =>
                array(
                    0 => 'D:\\wamp64\\www\\mvc\\tpl\\index\\index.html',
                    1 => 1478759560,
                    2 => 'file',
                ),
        ),
    'includes' =>
        array(),
), false)
) {
    function content_582414899e4418_31982986(Smarty_Internal_Template $_smarty_tpl)
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>新闻</title>
    </head>
    <style type="text/css">
        * {
            padding: 0px;
            margin: 0px;
        }

        .nav {
            background: lightgreen;
            width: 100%;
            height: 200px;
        }

        .nav ul {
            background: black;
            color: white;
            overflow: hidden;
        }

        .nav li {
            float: left;
            list-style: none;
            line-height: 45px;
            margin-left: 10%;
        }

        .nav .spe {
            margin-left: 5%;
        }

        a {
            text-decoration: none;
            color: inherit;
            font-weight: bolder;
            text-shadow: 0 0 4px #fc6;
        }

        .content {
            width: 80%;
            margin: 0 auto;
            box-shadow: 0 0 10px lightgreen;
            padding-bottom: 40px;
            z-index: 3;
            position: absolute;
            background: white;
            top: 150px;
            left: 50%;
            margin-left: -40%;
            overflow: hidden;
        }

        .newslist {
            width: 70%;
            float: left;

        }

        .aboutus {
            width: 30%;
            box-sizing: border-box;
            border-left: 4px solid lightgray;
            height: 300px;
            float: left;
            margin-top: 40px;
            padding: 10px;
        }

        .list {
            width: 80%;
            margin: 40px auto;
            border: 1px dotted #ccc;
            padding: 10px;
        }

        .list h3 {
            line-height: 30px;
            font-size: 18px;
        }

        .list span {
            border-left: 1px solid #ccc;
            padding: 0 5px;
            font-size: 14px;
            color: #ccc;
        }

        .list p {
            text-indent: 2em;
            padding: 20px;
            font-size: 14px;
        }
    </style>
    <body>
    <div class="nav">
        <ul>
            <li><a href=''>首页</a></li>
            <li class='spe'><a href='#'>关于我们</a></li>
        </ul>
        <p style='color:white;font-size: 30px;margin-top:30px;margin-left:10%;'><b>新闻</b></p>
    </div>
    <div class="content">
        <div class='newslist'>
            <?php
            $_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value, 'news');
            if ($_from !== null) {
                foreach ($_from as $_smarty_tpl->tpl_vars['news']->value) {
                    ?>
                    <div class="list">
                        <h3>
                            <a href='index.php?controller=index&method=newsshow&id=<?php echo $_smarty_tpl->tpl_vars['news']->value['id']; ?>
' style="color: #0e0e0e;text-shadow: none;"><?php echo $_smarty_tpl->tpl_vars['news']->value['title']; ?>
                            </a></h3>
            <span>作者:<?php echo $_smarty_tpl->tpl_vars['news']->value['author']; ?>
</span><span>:<?php echo $_smarty_tpl->tpl_vars['news']->value['dateline']; ?>
</span>
                        <p><?php echo $_smarty_tpl->tpl_vars['news']->value['content']; ?>
                        </p>
                        <a href='index.php?controller=index&method=newsshow&id=<?php echo $_smarty_tpl->tpl_vars['news']->value['id']; ?>
' style="color:orange;text-shadow: none;">阅读更多</a>
                    </div>
                    <?php
                }
            }
            $_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
            ?>

        </div>
        <div class='aboutus'>
            <h3>关于我们</h3>
            <p><?php echo $_smarty_tpl->tpl_vars['about']->value; ?>
            </p>
        </div>
    </div>
    </body>
        </html><?php }
}
