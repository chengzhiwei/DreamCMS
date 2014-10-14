var uploader = new plupload.Uploader({
    runtimes: "flash",
    flash_swf_url: RES_URL + "Moxie.swf",
    browse_button: "uploadPic",
    url: UP_PATH,
    chunk_size: "1mb",
    unique_names: true,
    multi_selection: true,
    resize: {
    },
    filters: {
        max_file_size: "20mb",
        mime_types: [{title: "Image files", extensions: "png,jepg,jpg,gif"}]
    },
    silverlight_xap_url: RES_URL + "Moxie.xap",

           
          preinit: {
                    Init: function(up, info) {
               
                    },
 
                    UploadFile: function(up, file) {
                            up.setOption('multipart_params', {true_fn: file.name});
                    }
            },
    init: {
        Browse: function(up) {
                    },
        UploadProgress: function(up, file) {
            //$('#uploadFileInfo').html('<span class="upload_file_info">附件上传' + file.percent + "%...</span>").show();
        },
        FileFiltered: function(up, file) {
        },
        FilesAdded: function(up, files) {
            plupload.each(files, function(file) {
            }), uploader.start();
        },
        FileUploaded: function(up, file, info) {
            var myData;
            try {
                myData = eval(info.response);
            } catch (err) {
                myData = eval('(' + info.response + ')');
            }

            if (typeof (myData.error) == 'undefined')
            {
                //$('.group_pic').append('<a href=' + root + '/' + myData.filepath + ' class="cLightBlue">' + myData.filename + '</a> <a href="javascript:void(0)" class="cOrange" id="uploadFileDel">删除</a>');
              
                $('.group_pic').append('<div><img src="'+root_path+'/'+myData.filepath+'" style="width: 50px;height: 50px"> 图片路径：<input type="text" name="imgpath[]" value="'+myData.filepath+'" />  图片标题: <input name="imgtitle[]" type="text" value="'+myData.filename+'"/>   <a class="del_pics" href=" javascript:void(0)">删除</a></div>');
           
            }
            else
            {
                errorBox(myData.error.message, 0, 1115);
            }

        },
        Error: function(up, err) {
            alert(err.message);
        }
    }
});
uploader.init();
