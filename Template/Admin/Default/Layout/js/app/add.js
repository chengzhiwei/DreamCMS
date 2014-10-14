// JavaScript Document
seajs.config(_seajsConfing);
seajs.use(['jquery'], function($) {
    $(function() {
        $(".page_cls").hide();
        $(".list_cls").show();
         $("#linkType input:first").click(function() {
            $(".js_1").show();
            $(".js_0").hide();
            if ($('#modsel').val() == 3)
            {
                $(".page_cls").show();
                $(".list_cls").hide();
            }
            else
            {
                $(".page_cls").hide();
                $(".list_cls").show();
            }
        });
        
        $("#linkType input:last").click(function() {
            $(".js_1").hide();
            $(".js_0").show();
        });
        
        if($("#linkType input:last").attr("checked")){
            $(".js_1").hide();
            $(".js_0").show();
        }else{
            $(".js_1").show();
            $(".js_0").hide();
        }
       
       
        $('#modsel').change(function() {
            if ($(this).val() == 3)
            {
                $(".page_cls").show();
                $(".list_cls").hide();
            }
            else
            {
                $(".page_cls").hide();
                $(".list_cls").show();
            }
        });
    });
});