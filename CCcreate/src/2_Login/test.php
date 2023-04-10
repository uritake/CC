<script>
    $(function(){
	$("#textbox").bind("blur", function() {
		var _textbox = $(this).val();
		check_textbox(_textbox);
	});
});

function check_textbox(str){
	$("#err_textbox p").remove();
	var _result = true;
	var _textbox = $.trim(str);

	if(_textbox.match(/^[ 　\r\n\t]*$/)){
		$("#err_textbox").append("<p><i class=\"fa fa-exclamation-triangle\"></i>テキストボックスを入力してください。</p>");
		_result = false;
	}else if(_textbox.length > 50){
		$("#err_textbox").append("<p><i class=\"fa fa-exclamation-triangle\"></i>テキストボックスは50文字以内で入力してください。</p>");
		_result = false;
	}
	return _result;
}
</script>

<dl class="clearfix">
	<dt>テキストボックス</dt>
	<dd>
		<input type="text" class="input_textbox" id="textbox" name="textbox" value="">
		<div class="err_text" id="err_textbox"></div>
	</dd>
</dl>