<?php
if(!defined('IN_PKW')) exit('Access Denied');

switch($skillext){
	case 51:
	$rev['tmpsdf']+= $rev['sdf'] / $rev['level'] * 2;
break;
	case 52:
	$obv['tmpspr']-= $obv['spr'] * 0.1;
break;
	case 53:
	$rev['hp']+= $obvhurt / 2;
break;
	case 54:
	$obv['hp']-= rand(0, $obv['hp']) / 2;
break;
	case 55:
	$rev['hp'] = $rev['maxhp'];
	$rev['status'] = 4;
break;
	case 56:
	if($obv['atb1'] != 8 && $obv['atb2'] != 8) $obvhurt = $revhurt * 2;	
break;
	case 57:
	$code = '$rev[\'tmpstatus\'][18] = $rev[\'tmpstatus\'][19] = $timestamp + $_CONFIG[\'battlewaittime\'];';
	$rev['tmpstatus'][20] = array($code, $timestamp + 2 * $_CONFIG['battlewaittime']);
break;
	case 58:
	$obv_equip = $obv['equip'];
	$obv['equip'] = $rev['equip'];
	$rev['equip'] = $obv_equip;
	unset($obv_equip);
break;
	case 59:
	$rev['tmptrait'] = $obv['trait'];
break;
	case 60:
	if(in_array($obv_skill['ext'] , $direct_status_ext)){
		skillext_effect($obv_skill['ext'], $side);
		$rev['status'] = 1;
		$rev['tmpatk'] = $rev['tmpdef'] = $rev['tmpstk'] = $rev['tmpsdf'] = $rev['tmpspd'] = $rev['tmpspr'] = 0;
	}
	//���Ʋ��������ֵ�ֱ���쳣״̬����ֱ��������
break;
	case 61:
	$obv['tmptrait'] = $rev['trait'];
	$rev['tmptrait'] = $obv['trait'];
break;
	case 62:
	$obv['tmpstatus'][13] = array($rev['skill'], $timestamp + 5 * $_CONFIG['battlewaitime']);
	if($obv['username']){
		$tmpstatus = $obv['tmpstatus'][13];
		$db->query("UPDATE {$PKWpre}mymon SET tmpstatus='$tmpstatus' WHERE owner='$obv[username]' AND status < 10 AND status!=0 AND status!=9");
	} 
	//����ӵ�еļ��ɵ�ȫ�Ӳ���ʹ��
break;
	case 63:
	if(rand(1, 2) == 1) $obv['tmpdef']-= $obv['sdf'] / $obv['level'];
break;
	case 64:
	if(rand(1, 2) == 1) $obv['tmpdef']-= $obv['stk'] / $obv['level'];
break;
	case 65:
	$rev['tmpdef']+= $rev['def'] / $rev['level'];
	$rev['tmpsdf']+= $rev['sdf'] / $rev['level'];
break;
	case 66:
	if(rand(1, 10) == 1){
		$revhurt = 0;
		$obv_undermsg.= 'η����û����ѵ��ʦ��������У�';
	}
break;
	case 67:
	$rev['tmpstk']+= $rev['stk'] / $rev['level'];
	$rev['tmpsdf']+= $rev['sdf'] / $rev['level'];
break;
	case 68:
	//����ϵ��Ʈ�������Լ����Ʈ��״̬���Ա�����ϵ�������˺�,�ɿպͷ�Ծ����ʹ��,�ѷɿ�PM�ط�����
break;
	case 69:
	//���ֻر��ʸ�ԭ�ҳ���ϵ���������ܹ���а��ϵ
break;
	case 70:
	//����ɥʧս����,�����ϳ�����ظ��������쳣״̬
break;
	case 71:
	//�����쳣״̬ת����Ŀ�굥��
break;
	case 72:
	//5�غ��ڵж��岻��ʹ�ûظ�����
break;
	case 73:
	$dist = $rev['atk'] - $rev['def'];
	$rev['tmpatk'] -= $dist;
	$rev['tmpdef'] += $dist;
break;
	case 74:
	//�Ͷ��ֽ������������⹥�����������ȼ�
break;
	case 75:
	//�Ͷ��ֽ�������������������������ȼ�
break;
	case 76:
	//����ֻ��������ȼ�
break;
	case 77:
	if(rand(1, 5) == 1) $obv['tmpstatus'][14] = $timestamp + $_CONFIG['battlewaittime'];
break;
	case 78:
	//����,5�غ�����˫���������ȶ���ͬ���Ϊ�ٶ������ȹ�,ȫ����Ч
break;
	case 79:
	//����ʧȥս����,�����ϳ���������,�쳣״̬��PPȫ�ظ�
break;
	case 80:
	if(rand(1, 10) == 1) $obv['status'] = 5;
break;
	case 81:
	$obv['status'] = 5;
break;
	case 82:
	//30%�����,��������50%,����100%������,�ܻ��зɿ�/��Ծ��PM
break;
	case 83:
	$obv['status'] = 5;
break;
	case 84:
	if(rand(1, 10) <= 3) $obv['status'] = 5;
break;
	case 85:
	//���������������������,�»غϼ�����ϵ�˺��ӱ�
break;
	case 86:
	//������ʧ������1/3�˺�������,10%�����
break;
	case 87:
	//�ض�����
break;
	case 88:
	//5�غ��ڼ������ᱻ����ϵ���ܹ���
break;
	case 89:
	//10%������Ի�η��
break;
	case 90:
	//70%�����������⹥����
break;
	case 91:
	//ս����õ���Ǯ
break;
	case 92:
	//���غ�����,�»غϹ���
break;
	case 93:
	//������������������
break;
	case 94:
	//ǿ�ƶԷ���������,ǿ�ƽ���Ұ��ս��,��������:	n*������lv+�Է�lv��/256+1>=�Է�lv/4,nΪ0~255�����
break;
	case 95:
	//30%��η��,������С�Ķ����������ӱ�
break;
	case 96:
	//30%��η��
break;
	case 97:
	//������������ʧ������1/4�˺�������
break;
	case 98:
	//��������з�����,����������
break;
	case 99:
	//������ʧ������1/3�˺�������
break;
	case 100:
	//�з����彵�ͷ�����
}
?>