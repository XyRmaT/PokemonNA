var pkw_leftid = Array('system', 'ware', 'log', 'gym', 'adven', 'member', 'contest');
var pkw_leftmenu = Array('ϵͳ��������', '��Ʒ����', '������¼', '������', 'ð�մ�½', '�û�����', '��������');
ul = document.createElement('ul');
ul.id = "pkw_menu";
top.document.getElementById('leftmenu').appendChild('ul');
for(i = 0;i<=pkw_leftmenu.length;i++){
	top.document.getElementById('leftmenu').innerHTML+= '<li><a href="admincp.php?action=plugins&operation=config&identifier=pokemon&mod='+pkw_leftid[i]+'" hidefocus="true" target="main">'+pkw_leftmenu[i]+'</a></li>';
}