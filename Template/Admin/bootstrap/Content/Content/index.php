
<style>
    .modal-content{border-radius:5px;}
    .modal-body {
        max-height: 800px;
    }fieldset{ padding-bottom: 20px;}
    .form-horizontal .control-label .chk_lbl{text-align:left}

    .tree {
        min-height:20px;
        padding:1px;
        margin-bottom:20px;
        background-color:#fbfbfb;
        border:1px dotted #e2e2e2;
        -webkit-border-radius:4px;
        -moz-border-radius:4px;
        border-radius:2px;
        overflow-y:hidden;
        -webkit-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
        -moz-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
        box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05)
    }
    .tree li {
        list-style-type:none;
        margin:0;
        padding:10px 5px 0 5px;
        position:relative
    }
    .tree li::before, .tree li::after {
        content:'';
        left:-20px;
        position:absolute;
        right:auto
    }
    .tree li::before {
        border-left:1px solid #999;
        bottom:50px;
        height:100%;
        top:0;
        width:1px
    }
    .tree li::after {
        border-top:1px solid #999;
        height:20px;
        top:25px;
        width:25px
    }
    .tree li span {
        -moz-border-radius:5px;
        -webkit-border-radius:5px;
        // border:1px solid #999;
        border-radius:5px;
        display:inline-block;
        padding:1px 3px;
        text-decoration:none
    }
    .tree li.parent_li>span {
        cursor:pointer
    }
    .tree>ul>li::before, .tree>ul>li::after {
        border:0
    }
    .tree li:last-child::before {
        height:26px
    }
    .tree li.parent_li>span:hover, .tree li.parent_li>span:hover+ul li span {
        background:#eee;
        //border:1px solid #94a0b4;
        color:#000
    }

</style>
<script type="text/javascript">
    function autoHeight(){
        var iframe = document.getElementById("iframeId");
        if(iframe.Document){//ie自有属性
            iframe.style.height = iframe.Document.documentElement.scrollHeight;
        }else if(iframe.contentDocument){//ie,firefox,chrome,opera,safari
            iframe.height = iframe.contentDocument.body.offsetHeight ;
        }
       
    }
</script>
<div class="page-content " style=" height: 100%">
    <div class="page-header">
        <h1>
            <small>
                <i class="icon-double-angle-right"></i>
                文章管理
            </small>
        </h1>
    </div>

    <div class="row " style=" height: 100%" >
        <div class="col-xs-12 " >
            <div class="tree well col-lg-3 " >
                <ul>

                    <?php
                    foreach ($Category_arr as $key => $cate)
                    {
                        $str = '<li>';
                        if (count($Category_arr) - 1 != $key)
                        {
                            if ($Category_arr[$key + 1]['deep'] > $cate['deep'])
                            {
                                $str.='<span><i class="icon-folder-open "></i> ' . $cate['title'] . '</span>';
                                $str.='<ul>';
                            }
                            if ($Category_arr[$key + 1]['deep'] <= $cate['deep'])
                            {
                                $str.='<a href=""><span><i class="icon-leaf "></i> ' . $cate['title'] . '</span></a>';
                                for ($i = 0; $i < $cate['deep'] - ($Category_arr[$key + 1]['deep']); $i++)
                                {
                                    $str.='</li></ul>';
                                }
                            }
                        } else
                        {
                            $str.='<a href=""><span><i class="icon-leaf "></i> ' . $cate['title'] . '</span></a>';
                            if ($cate['deep'] == 0)
                            {
                                $str.='</li>';
                            } else
                            {
                                for ($i = 0; $i <= $cate['deep']; $i++)
                                {
                                    $str.='</li></ul>';
                                }
                            }
                        }
                        echo $str;
                    }
                    ?>




                </ul>
            </div>

            <div class="col-lg-9 "  >
                <iframe id='iframeId' onload="autoHeight()"  style="zoom: 0.6; " src="http://127.0.0.1/DreamCMS/admin.php/Content/Content/contentlist.html" frameBorder="0"  width="100%" ></iframe> 
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
        $('.tree li.parent_li > span').on('click', function (e) {
            var children = $(this).parent('li.parent_li').find(' > ul > li');
            if (children.is(":visible")) {
                children.hide('fast');
                $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
            } else {
                children.show('fast');
                $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
            }
            e.stopPropagation();
        });
    });
</script>