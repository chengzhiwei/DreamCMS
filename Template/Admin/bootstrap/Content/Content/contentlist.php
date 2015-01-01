
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>DreamCMS 后台管理系统</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- basic styles -->
        <link href="<?php echo CSS_PATH; ?>bootstrap.min.css" rel="stylesheet" />
       <link rel="stylesheet" href="<?php echo CSS_PATH; ?>font-awesome.min.css" />
        <!--[if IE 7]>
          <link rel="stylesheet" href="<?php echo CSS_PATH; ?>font-awesome-ie7.min.css" />
        <![endif]-->
        <!-- page specific plugin styles -->
        <!-- fonts -->
        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo CSS_PATH; ?>ace.min.css" />
  

        <!--[if lte IE 8]>
          <link rel="stylesheet" href="<?php echo CSS_PATH; ?>ace-ie.min.css" />
        <![endif]-->


        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!--[if lt IE 9]>
        <script src="<?php echo JS_PATH; ?>html5shiv.js"></script>
        <script src="<?php echo JS_PATH; ?>respond.min.js"></script>
        <![endif]-->
        <style>
          .op_btn a{  margin-left: 5px;}
        </style>
    </head>

    <body>
<div class="page-content">

    <div class="row">
        
        <div  style="padding-bottom: 10px;" class="col-xs-12 op_btn">
           
            <a class=" pull-right btn btn-xs btn-info " href="<?php echo U('Content/Content/add',array('cid'=>I('get.cid')));?>">
                <b>添加文章</b>
            </a>
            <a class=" pull-right btn btn-xs btn-warning"  href="/DreamCMS/admin.php/Content/Model/addfield/mid/1.html">
                <b>批量移动</b>
            </a>
            <a class=" pull-right btn btn-xs btn-danger" href="<?php echo U('Content/Content/add',array('cid'=>I('get.cid')));?>">
               <b>批量删除</b>
            </a>
        </div>
        
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="center">
                                        <label>
                                            <input type="checkbox" class="ace">
                                            <span class="lbl"></span>
                                        </label>
                                    </th>
                                    <th>标题</th>
                                    <th>发布时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>

                            <tbody>
                                                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">曝中国军方背景人士用私人飞机带现金赴澳洲女博士写8万字论文论</a>
                                        </td>

                                        <td>2014-12-02</td>

                                        <td>
                                            <button class="btn btn-xs btn-info">
                                                    <i class="icon-edit bigger-120"></i>
                                                </button>

                                            <button class="btn btn-xs btn-danger">
                                                    <i class="icon-trash bigger-120"></i>
                                                </button>
                                        </td>
                                    </tr>
                                                                        <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">图片</a>
                                        </td>

                                        <td>Array</td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="/DreamCMS/admin.php/Content/Model/fields/mid/2.html">字段管理</a>
                                            </div>

                                            
                                        </td>
                                    </tr>
                                                                        <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">单页面</a>
                                        </td>

                                        <td>Array</td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="/DreamCMS/admin.php/Content/Model/fields/mid/3.html">字段管理</a>
                                            </div>

                                            
                                        </td>
                                    </tr>
                                    
<tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">图片</a>
                                        </td>

                                        <td>Array</td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="/DreamCMS/admin.php/Content/Model/fields/mid/2.html">字段管理</a>
                                            </div>

                                            
                                        </td>
                                    </tr><tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">图片</a>
                                        </td>

                                        <td>Array</td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="/DreamCMS/admin.php/Content/Model/fields/mid/2.html">字段管理</a>
                                            </div>

                                            
                                        </td>
                                    </tr><tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">图片</a>
                                        </td>

                                        <td>Array</td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="/DreamCMS/admin.php/Content/Model/fields/mid/2.html">字段管理</a>
                                            </div>

                                            
                                        </td>
                                    </tr><tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">图片</a>
                                        </td>

                                        <td>Array</td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="/DreamCMS/admin.php/Content/Model/fields/mid/2.html">字段管理</a>
                                            </div>

                                            
                                        </td>
                                    </tr><tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">图片</a>
                                        </td>

                                        <td>Array</td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="/DreamCMS/admin.php/Content/Model/fields/mid/2.html">字段管理</a>
                                            </div>

                                            
                                        </td>
                                    </tr><tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">图片</a>
                                        </td>

                                        <td>Array</td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="/DreamCMS/admin.php/Content/Model/fields/mid/2.html">字段管理</a>
                                            </div>

                                            
                                        </td>
                                    </tr><tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">图片</a>
                                        </td>

                                        <td>Array</td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="/DreamCMS/admin.php/Content/Model/fields/mid/2.html">字段管理</a>
                                            </div>

                                            
                                        </td>
                                    </tr><tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">图片</a>
                                        </td>

                                        <td>Array</td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="/DreamCMS/admin.php/Content/Model/fields/mid/2.html">字段管理</a>
                                            </div>

                                            
                                        </td>
                                    </tr><tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">图片</a>
                                        </td>

                                        <td>Array</td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="/DreamCMS/admin.php/Content/Model/fields/mid/2.html">字段管理</a>
                                            </div>

                                            
                                        </td>
                                    </tr><tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">图片</a>
                                        </td>

                                        <td>Array</td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="/DreamCMS/admin.php/Content/Model/fields/mid/2.html">字段管理</a>
                                            </div>

                                            
                                        </td>
                                    </tr><tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">图片</a>
                                        </td>

                                        <td>Array</td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="/DreamCMS/admin.php/Content/Model/fields/mid/2.html">字段管理</a>
                                            </div>

                                            
                                        </td>
                                    </tr><tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">图片</a>
                                        </td>

                                        <td>Array</td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="/DreamCMS/admin.php/Content/Model/fields/mid/2.html">字段管理</a>
                                            </div>

                                            
                                        </td>
                                    </tr><tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">图片</a>
                                        </td>

                                        <td>Array</td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="/DreamCMS/admin.php/Content/Model/fields/mid/2.html">字段管理</a>
                                            </div>

                                            
                                        </td>
                                    </tr><tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">图片</a>
                                        </td>

                                        <td>Array</td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="/DreamCMS/admin.php/Content/Model/fields/mid/2.html">字段管理</a>
                                            </div>

                                            
                                        </td>
                                    </tr><tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" class="ace">
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            <a href="#">图片</a>
                                        </td>

                                        <td>Array</td>

                                        <td>
                                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                                <a href="/DreamCMS/admin.php/Content/Model/fields/mid/2.html">字段管理</a>
                                            </div>

                                            
                                        </td>
                                    </tr>

                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div><!-- /span -->
            </div><!-- /row -->








        </div><!-- /.col -->
    </div><!-- /.row -->
</div>    </body>
</html>