function fw_rename(mid){
	var html = '<form action="pkw.php?index=mypokemon&action=rename&mid='+mid+'" method="post">';
	html+= '<input type="hidden" name="formhash" value="'+FORMHASH+'" />';
	html+= '<p>�����֣�<input type="text" name="newname" maxlength=15 /></p>';
	html+= '<button type="submit" class="submit" name="renamesubmit">ȷ��</button>';
	html+= '</form>';
	pnotice(html);
}

function fw_give(mid){
	var html = '<form action="pkw.php?index=mypokemon&action=give&mid='+mid+'" method="post">';
	html+= '<input type="hidden" id="formhash" name="formhash" value="'+FORMHASH+'" />';
	html+= '<p>�Է��û�����<input type="text" id="receiver" name="receiver" maxlength=15 /></p>';
	html+= '<button type="submit" class="submit" id="givesubmit" name="givesubmit">ȷ��</button>';
	html+= '</form>';
	pnotice(html);
}

function fw_throw(mid){
	msg = '<p>��ȷ�϶�����</p>';
	msg+= '<p>���������ĵ�¼���룺<input type="text" type="password" id="password" name="password" /></p>';
	msg+= '<button class="submit" onclick="location.href=\'pkw.php?index=mypokemon&action=throw&id='+mid+'\'">ȷ��</button>&nbsp;';
	msg+= '<button class="submit" onclick="floatwin(\'close_confirm\')">ȡ��</button>';
	pnotice(msg, '', '', 140);
}