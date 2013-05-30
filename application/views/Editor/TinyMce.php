<link href="<?=config_item('BootStrap')?>" rel="stylesheet">
<script language="javascript" type="text/javascript" src="<?=base_url()?>Public/tinymce/tiny_mce.js"></script>
 <script language="javascript" type="text/javascript">
  	tinyMCE.init({
    theme : "advanced",
    mode: "exact",
    elements : "TextEditor",
    plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

        // Theme options
        theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
        theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,
    height:"80%",
    width:"100%"
});
</script>
<!--admin/categories/addEditorText-->
<?=form_open('', array('id'=>'frm'))?>
<textarea name="TextEditor" id="TextEditor" style="width:100%; height:80%">
</textarea>
<hr />
<input type="submit" name="btn" value="Submit" class="btn btn-primary" />
<?=form_close()?>

