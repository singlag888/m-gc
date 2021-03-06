<?php $id=uniqid();?>
<form class="form-horizontal validate" role="form" method="post"  style="margin: 10px;">
    <input type="hidden" name="text_id" value="<?php echo $rs[0]['id']?>" />
    <input type="hidden" name="title" value="<?php echo $rs[0]['title']?>" />
<div style="margin-bottom: 10px;" id="PayinfoBtn">   
    <?php foreach($rs as $v){?>
    <button type="button" class="btn btn-info btn-sm" style="margin-top:5px !important" id="<?php echo $v['id']?>"><?php echo $v['title']?></button>
    <?php }?>
</div>
<?php $id=uniqid();?>
    <div class="form-group">
        <div class="col-sm-10">
            <textarea id="<?php echo $id?>" style="height:300px;width: 100%" name="content"><?php echo $rs[0]['content']?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-1 control-label"></label>
        <div class="col-sm-10">
            <button class="btn btn-success btn-icon save" type="button" onclick="saveinfo(this)">保存修改 <i class="entypo-check"></i></button>
        </div>
    </div>
</form>
<style>
    #PayinfoBtn>button{margin-right:10px;}
</style>
<script>
$(function(){
     $('#PayinfoBtn>button').eq(0).addClass('btn-danger');
});
 var ue=UE.getEditor('<?php echo $id?>',{
        toolbars:[['source', '|', 'undo', 'redo', '|',
            'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
            'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
            'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
            'directionalityltr', 'directionalityrtl', 'indent', '|',
            'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
            'link', 'unlink', '|', 'imagenone', 'insertvideo','pagebreak', '|',
            'horizontal', 'date', 'time', 'spechars', '|',
            'inserttable', '|',
            'print', 'searchreplace', 'drafts']],
        elementPathEnabled: false,//刪除元素路徑
        wordCount: false    //刪除字數統計
   });
$('#PayinfoBtn>button').click(function(){
    $('#PayinfoBtn>button').removeClass('btn-danger');
    $(this).addClass('btn-danger');
    
    $.get(WEB+'setting/getSiteOne?id='+$(this).attr('id'),function(c){
        c=eval('('+c+')');
        $('[name=text_id]').val(c.id);
        $('[name=title]').val(c.title);
        ue.setContent(c.content);
        $('[name=content]').val(c.content);
    });
});
function saveinfo(e){
        $(e).parents('form').form('submit',{
            ajax:true,
            url:'setting/saveSiteInfo',
            onSubmit: function(){
                return $(this).form('enableValidation').form('validate');
            },
            success:function(c){
                c=eval('('+c+')');
                switch(c.status){
                    case "ERROR": Core.error('沒有修改任何信息','error'); break;
                    case 'OK': Core.ok('基礎信息修改成功'); break;
                    default: Core.error(c); 
                }
            }
        });
    }
</script>