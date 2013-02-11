<?php
function array_k2v($array){
	$returnarray = array();
	foreach($array as $key => $value){
		$returnarray[$value] = $key;
	}
	return $returnarray;
}
$atbarray = array_k2v(array('','��','ˮ','��','��','��','��','��','��','��','��','��','��','��','��','��','��','��'));
$eggarray = array_k2v(array('', '???','����','ˮ��1','ˮ��2','ˮ��3','��','����','½��','����','ֲ��','����','����','������','�ٱ��','��','δ����'));
$eggarray['�޶���'] = $eggarray['������'];
$eggarray['�Ա���'] = $eggarray['����'];

$evostatus = array_k2v(array('', '������̬', '�е���̬', '������̬','����'));
include './include/common.inc.php';
if($_GET['id']) $id = $_GET['id'];else $id = 0;
if($id==493) exit('<meta http-equiv="refresh" content="0;url=pokemon_importer.php" />');
$array = file(S_ROOT.'Pokemon_data/Pokemon/'.$id.'.htm');
function convert($line){
	global $array;
	return trim(preg_replace("/\<.*?\>/s", '', (iconv('utf-8', 'gbk', $array[$line-1]))));
}
$nationalnumber = convert(558);
$name_c = convert(567);
$name_j = convert(569);
$name_e = convert(571);

$atb = explode('/', convert(576));
$atb1 = $atbarray[trim($atb[0])];
$atb2 = $atbarray[trim($atb[1])];

$fixnumber = 0;

$temp1 = explode("DPTrait.asp?ID=", iconv('utf-8', 'gbk', $array[577]));
$temp2 = explode('&', $temp1[1]);
$trait1 = intval($temp2[0]);
if($trait1 == 0) $fixnumber -= 1;

$temp1 = explode("DPTrait.asp?ID=", iconv('utf-8', 'gbk', $array[580]));
$temp2 = explode('&', $temp1[1]);
$trait2 = intval($temp2[0]);
if($trait2 != 0) $fixnumber += 1;

$eggtype1 = $eggarray[str_replace('��', '', convert(586+$fixnumber))];
$eggtype2 = $eggarray[str_replace('��', '', convert(588+$fixnumber))];

$size = explode('/', str_replace(array('kg', 'm'), '', convert(595+$fixnumber)));
$height = trim($size[0]);
$weight = trim($size[1]);

$frd = convert(604+$fixnumber);

$evoarray = array('������̬'=>1, '�е���̬'=>2, '������̬'=>3, '����'=>4);
$evostatus = $evostatus[convert(619+$fixnumber)];

$hp = trim(preg_replace("/��.*?��/s", '', convert(657+$fixnumber)));
$atk = trim(preg_replace("/��.*?��/s", '', convert(666+$fixnumber)));
$def = trim(preg_replace("/��.*?��/s", '', convert(675+$fixnumber)));
$spd = trim(preg_replace("/��.*?��/s", '', convert(684+$fixnumber)));
$stk = trim(preg_replace("/��.*?��/s", '', convert(693+$fixnumber)));
$sdf = trim(preg_replace("/��.*?��/s", '', convert(702+$fixnumber)));

$gender = explode(':', convert(597+$fixnumber));
$gender[0] = intval($gender[0]);$gender[1]=intval($gender[1]);
if($gender[0] == 0 && $gender[1] == 100) $gen = 2;
elseif($gender[0] == 100 && $gender[1] == 0) $gen = 1;
elseif($gender[0] == 0 && $gender[1] == 0) $gen = 3;
else $gen = 0;

$db->query("UPDATE `pkw_mon` SET gender=$gen WHERE id=$nationalnumber");
$id++;
echo "<meta http-equiv=\"refresh\" content=\"0;url=pokemon_mon.php?id={$id}\" />���ڴ���No.{$id}����";

@$fp = fopen(S_ROOT.'data/mon/'.$nationalnumber.'.txt', 'w');
$txt = "$nationalnumber
$name_c
$name_j
$name_e
$atb1
$atb2
$gen
$trait1
$trait2
$eggtype1
$eggtype2
$height
$weight
$frd
$evostatus
$hp
$atk
$def
$spd
$stk
$sdf";
@fwrite($fp, $txt);
@fclose($fp);
/*ȫ����ţ�<?=$nationalnumber?><br />
���֣�<?=$name_c?> <?=$name_j?> <?=$name_e?><br />
����1��<?=$atb1?><br />
����2��<?=$atb2?><br />
������ʣ�<?=$gender?><br />
���ԣ�<?=$trait1?> | <?=$trait2?><br />
������1��<?=$eggtype1?><br />
������2��<?=$eggtype2?><br />
��ߣ�<?=$height?><br />
���أ�<?=$weight?><br />
�Ѻöȣ�<?=$frd?><br />
����״̬��<?=$evostatus?><br />
HP��<?=$hp?><br />
������<?=$atk?><br />
������<?=$def?><br />
�ٶȣ�<?=$spd?><br />
�ع���<?=$stk?><br />
�ط���<?=$sdf?><br />*/
?>
