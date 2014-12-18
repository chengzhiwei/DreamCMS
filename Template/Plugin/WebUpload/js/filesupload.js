
$(function () {
    var uploader = WebUploader.create({
        // swf文件路径
        swf: 'Uploader.swf',
        // 文件接收服务端。
        server: $('#server').val(),
        chunked: true,
        chunkSize: 1024 * 1024,
        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#picker',
        disableGlobalDnd: true,
        fileNumLimit: 300,
        fileSizeLimit: 200 * 1024 * 1024, // 200 M
        fileSingleSizeLimit: 50 * 1024 * 1024    // 50 M
    });
    uploader.onFileQueued = function (file) {

        addFile(file);
        setState('ready');
    };
    var percentages = {}, state = 'pedding';
    function addFile(file) {
        filename = file.name;
        var index1 = filename.lastIndexOf(".");
        var index2 = filename.length;
        var ext = filename.substring(index1, index2);//后缀名
        file.name = WebUploader.guid('DreamCMS_') + ext;
        var $li = '<tr class="" id="' + file.id + '"><td style="width:200px;">' + filename + '</td><td id="proc" style="width:100px;"></td><td class="op" style="width:50px;"></td></tr>';
        $('.uploader-list').find('table').append($li);
        showError = function (code) {
            switch (code) {
                case 'exceed_size':
                    text = '文件大小超出';
                    break;

                case 'interrupt':
                    text = '上传暂停';
                    break;

                default:
                    text = '上传失败，请重试';
                    break;
            }
        };
        percentages[ file.id ] = [file.size, 0];
    }


    function setState(val) {
        var file, stats;

        if (val === state) {
            return;
        }
        state = val;

        switch (state) {
            case 'pedding':
                break;

            case 'ready':

                break;

            case 'uploading':

                break;

            case 'paused':

                break;

            case 'confirm':

                break;
            case 'finish':
                stats = uploader.getStats();
                if (stats.successNum) {

                } else {
                    state = 'done';
                    //location.reload();
                }
                break;
        }

        //updateStatus();
    }
    $('#uploadBtn').click(function () {
        if (state === 'ready') {
            uploader.upload();
        } else if (state === 'paused') {
            uploader.upload();
        } else if (state === 'uploading') {
            uploader.stop();
        }
    });

    uploader.on('uploadProgress', function (file, percentage) {
        var $li = $('#' + file.id);
        $percent = $li.find('.progress');
        // 避免重复创建
        if (!$percent.length) {
            $percent = $('<div class="progress progress-striped active">' +
                    '<div class="progress-bar" role="progressbar" style="width: 0%">100' +
                    '</div>' +
                    '</div>').appendTo($li.find('#proc'));
        }


        $percent.find('.progress-bar').css('width', percentage * 100 + '%');
        $percent.find('.progress-bar').html(percentage * 100 + '%');
    });

    uploader.on('uploadSuccess', function (file) {
        $('#' + file.id).addClass('success');
        $('#' + file.id).find('.op').html('<i class="icon-trash"></i>');
    });

    uploader.on('uploadError', function (file) {
        $('#' + file.id).addClass('warning');
         $('#' + file.id).find('.op').html('<i class="icon-pencil"></i>');
    });
})
