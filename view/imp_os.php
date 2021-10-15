<?php
require_once '../vendor/autoload.php';
require_once '../model/Os.class.php';
require_once '../controller/activebar.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['id_os'])) {
  # code...
        if (empty($_SESSION['id_os']) && !empty($_POST['id_os']) ) {
          # code...
          $_SESSION['id_os'] = $_POST['id_os'];
        }
}
        $id = $_SESSION['id_os'];

$manager = new Os();
//var_dump($manager->listOS($id));
$generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
 ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<?php $title = 'Ordem de Serviço'; require_once 'dependencias.php'; ?>
<style type="text/css">
<!--
.style1 {
	font-family: Geneva, Arial, Helvetica, sans-serif;
	font-weight: bold;
	font-size: 18px;
}
.style4 {

	font-family: verdana;
	font-size: 12px;
}
.style5 {
	
	font-family: verdana;
	font-size: 12px;
}
.style6 {
	font-family: verdana;
	font-size: 12px;
}
.style8 {
	font-family: verdana;
	font-style: italic;
	font-size: 10px;
}
.style12 {font-size: 20px; color: #FF0000; font-family: verdana;}
.style13 {font-family: verdana}
.style15 {font-size: 12px}
.LINHA {
	margin-left:auto;
	border-bottom-width: 1px;
	border-right-width: 1px;
	border-left-width: 1px;
	border-top-style: none;
	border-right-style: solid;
	border-bottom-style: solid;
	border-left-style: solid;
	border-left-width: 0.02px;
	border-top-color: #000000;
	border-right-color: #000000;
	border-bottom-color: #000000;
	border-left-color: #000000;
	padding-left:5px;
}
	num{
		margin-left: 10000px;
		
	}
	
-->
</style>
</head>

<body>
 
<hr>
 <?php foreach($manager->listOS($id) as $os): ?>


<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="1">
  <tr>
    <td width="16%" bgcolor="#F4F4F4"><div align="center" class="style6">DATA </div></td>
    <td width="17%" bgcolor="#F4F4F4" class="style6"><div align="center">PRAZO</div></td>
    <td colspan="3" rowspan="2"><div align="center"></div>
        <div align="center"><span class="style1">ORDEM DE SERVI&Ccedil;O <br>
              <br>
      </span></div></td>
    <td width="28%" colspan="2" bgcolor="#F4F4F4"><div align="center" class="style6">N&deg; O.S</div></td>
  </tr>
  <tr>
    <td><div align="center"><em><span class="style4"><?= date('d/m/Y', strtotime($os['Data']))?></span><br>
            <br>
    </em></div></td>
    <td><div align="center"><em><span class="style5"><?= date('d/m/Y', strtotime($os['Prazo']))?></span><br>
            <br>
    </em></div></td>
    <td width="28%" colspan="2"><div align="center" class="style3"><span class="style12"><?=$os['Numero_Os']?></span><br>
            <br>
    </div></td>
  </tr>
  <tr>
    <td bgcolor="#F4F4F4"><div align="center" class="style6">QUANTIDADE</div></td>
    <td colspan="2" bgcolor="#F4F4F4"><div align="center" class="style6">CLIENTE</div></td>
    <td width="23%" colspan="2" bgcolor="#F4F4F4"><div align="center" class="style6">
      <div align="right">PEDIDO</div>
    </div></td>
    <td colspan="2" bgcolor="#F4F4F4"><div align="center" class="style6">
      <div align="right">N.F.</div>
    </div></td>
  </tr>
  <tr>
    <td valign="top"><div align="center" class="style6"><em><?=$os['Quantidade']?></em></div></td>
    <td colspan="2" rowspan="2" valign="top"><div align="center" class="style8"><?=$manager->listClientes($id);?></div></td>
    <td><div align="left" class="style6">
      <div align="right">N&deg;: </div>
    </div>      </td>
    <td><div align="left" class="style6">
      <div align="right"><em>
          
              <?=$os['Numero_Pedido']?>
         
      </em> </div>
    </div>
      <div align="right"><span class="style6"></span></div></td>
    <td><div align="right"><span class="style6">N&deg;:</span></div></td>
    <td><div align="right"><span class="style6"><em>
         
            <?=$os['Numero_Nf']?>
          
      </em></span> <span class="style6"></span> </div></td>
  </tr>
  <tr>
    <td valign="top"><div align="center"><span class="style6"><em><?=$os['unidade']?></em></span></div></td>
    <td><div align="right"><span class="style6">DATA:</span></div></td>
    <td><div align="right"><span class="style6"><em><?php if(!empty($os['Data_Pedido'])) { echo date('d/m/Y', strtotime($os['Data_Pedido']));}else{echo '';}?></em></span></div></td>
    <td><div align="right"><span class="style6">DATA:</span></div></td>
    <td><div align="right"><span class="style6"><em> <?php if(!empty($os['Data_Nf'])){ echo date('d/m/Y', strtotime($os['Data_Nf']));}else{echo '';} ?> </em></span></div></td>
  </tr>
  
  <tr>
    <td colspan="7"><div align="center"> </div></td>
  </tr>
</table>
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="5">
  <tr>
    <td width="23%"><div align="right"></div></td>
    <td colspan="2">&nbsp;</td>
    <td width="35%"><div align="center"> </div></td>
  </tr>
  <tr>
    <td width="23%" class="style6"><div align="right">FERRAMENTA: &nbsp;</div></td>
    <td colspan="2" class="style6"><div align="left"><em><?=$os['Ferramenta']?></em></div></td>
    <td width="35%"><div align="center" class="style6">TIPO DA O.S. </div></td>
  </tr>
  <tr>
    <td class="style6"><div align="right">MATERIAL: &nbsp;</div></td>
    <td colspan="2" class="style6"><div align="left"><em><?=$os['Material']?></em></div></td>
    <td><div align="center" class="style6"><strong><em><?=strtoupper($os['Tipo'])?></em></strong></div></td>
  </tr>
  <tr>
    <td class="style6"><div align="right">DESENHO CLIENTE: &nbsp; </div></td>
    <td colspan="2" class="style6"><div align="left"><em><?=$os['Desenho_Cliente']?></em></div></td>
    <td rowspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td class="style6"><div align="right">DESENHO PIMENTEL: &nbsp; </div></td>
    <td colspan="2" class="style6"><div align="left"><em><?$os['Desenho_Pimentel']?></em></div></td>
  </tr>
 <!--- <tr>
    <td class="style6"><div align="right">CODIGO DO PRODUTO: &nbsp; </div></td>
    <td colspan="2" class="style6"><div align="left"><em>#lista.codigo#</em></div></td>
  </tr>  --->
  <tr>
    <td height="59" valign="top" class="style6"><div align="right">ESPECIFICA&Ccedil;&Atilde;O: &nbsp;</div></td>
    <td colspan="2" class="style6"><p><em><?$os['Especificacao']?></em></p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td valign="top" class="style6"><div align="right">GRAVA&Ccedil;&Atilde;O:</div></td>
    <td colspan="2" class="style6"><em><?=$os['gravacao']?></em></td>
  </tr>
  <tr>
    <td valign="top" class="style6"><div align="right">GRAVA&Ccedil;&Atilde;O C&Oacute;D: </div></td>
    <td colspan="2" class="style6"><em><?=$os['gravacao2']?></em></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
</table>
<script>
window.print();

</script>
<hr>
<!---  <p class="style13"><strong>PROCESSOS:</strong></p> --->
<table style="float:left" width="50%"  border="0" cellspacing="0" cellpadding="0">
	<th style="font-family:verdana">
			<strong>PROCESSOS:</strong>
	</th>
	<tr>
		
  <tr class="style13">
    <td colspan="4" class="LINHA"><div align="left"></div>      <div align="center"></div></td>
  </tr>
  <tr>
    <td width="20%" class="LINHA">
	<div align="right" class="style15">
      <div align="left"><span class="style13">Corte</span></div>
    </div>
	</td>
    <td class="LINHA" width="20%" >&nbsp;</td>
    <td class="LINHA" width="20%" >&nbsp;</td>
    <td class="LINHA" width="22%" >&nbsp;</td>
  </tr>
  <tr>
    <td class="LINHA"><div align="right" class="style15">
      <div align="left"><span class="style13"> Torno</span></div>
    </div></td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA" width="22%">&nbsp;</td>
  </tr>
  <tr>
    <td class="LINHA"><div align="right" class="style15">
      <div align="left"><span class="style13">Fresa</span></div>
    </div></td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr>
    <td class="LINHA"><div align="right" class="style15">
      <div align="left"><span class="style13">Centro</span></div>
    </div></td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr>
    <td class="LINHA"><div align="right" class="style15">
      <div align="left"><span class="style13">T.T&eacute;rm.</span></div>
    </div></td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr>
    <td class="LINHA"><div align="right" class="style15">
      <div align="left"><span class="style13">Solda</span></div>
    </div></td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr>
    <td class="LINHA"><div align="right" class="style15">
      <div align="left"><span class="style13">Jatear</span></div>
    </div></td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr>
    <td class="LINHA"><div align="right" class="style15">
      <div align="left"><span class="style13">R.Cilind.</span></div>
    </div></td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr>
    <td class="LINHA"><div align="right" class="style15">
      <div align="left"><span class="style13">R.Rosca.</span></div>
    </div></td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr>
    <td class="LINHA"><div align="right" class="style15">
      <div align="left"><span class="style13"> R.Canal</span></div>
    </div></td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr>
    <td class="LINHA"><div align="right" class="style15">
      <div align="left"><span class="style13">R.Perfil</span></div>
    </div></td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr>
    <td class="LINHA"><div align="right" class="style15">
      <div align="left"><span class="style13">Filetar</span></div>
    </div></td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr>
    <td class="LINHA"><div align="right" class="style15">
      <div align="left"><span class="style13">Afia&ccedil;&atilde;o</span></div>
    </div></td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr>
    <td class="LINHA"><div align="right" class="style15">
      <div align="left"><span class="style13">Detalon.</span></div>
    </div></td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
  </tr>
   <tr>
    <td class="LINHA"><div align="right" class="style15">
      <div align="left"><span class="style13">Revestimento</span></div>
    </div></td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr>
    <td class="LINHA"><div align="right" class="style15">
      <div align="left"><span class="style13">Grav.</span></div>
    </div></td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr>
    <td class="LINHA"><div align="right" class="style15">
      <div align="left"><span class="style13">Embal. </span></div>
    </div></td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
    <td class="LINHA">&nbsp;</td>
  </tr>
</table>
<!---<p><span class="style13"><strong>OCORR&Ecirc;NCIAS / REFUGO:</strong></span></p> --->
<table style="float: left; margin-left:10px" width="45%" border="0" cellspacing="0" cellpadding="0">
  <th style="font-family:verdana"><strong>OCORR&Ecirc;NCIAS / REFUGO:</strong></th>
  <tr class="style13">
    <td class="LINHA"><div align="left"></div>      <div align="center"></div></td>
  </tr>
  <tr class="style13">
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr class="style13">
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr class="style13">
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr class="style13">
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr class="style13">
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr class="style13">
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr class="style13">
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr class="style13">
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr class="style13">
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr class="style13">
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr class="style13">
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr class="style13">
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr class="style13">
    <td class="LINHA">&nbsp;</td>
  </tr>
  <tr class="style13">
    <td class="LINHA">&nbsp;</td>
  </tr>
 <tr class="style13">
    <td class="LINHA">&nbsp;</td>
  </tr>
 <tr class="style13">
    <td class="LINHA">&nbsp;</td>
  </tr>  
 
</table>



<table style="float:left" width="100%"  border="0" align="center" cellpadding="0" cellspacing="1">
	<tr> <td colspan="4">&nbsp;</td> </tr>
	
	
	
		<tr> <td colspan="95" align="center">--------------------------------------------------------------------------------------------------------------------------------</td> </tr>
	<tr> <td colspan="4">&nbsp;</td> </tr>
	
	
	
	<tr>
    <td width="23%" class="style6"><div align="right">FERRAMENTA: &nbsp;</div></td>
    <td colspan="2" class="style6"><div align="left"><em><?=$os['Ferramenta']?></em></div></td>
    <td width="35%"><div align="center" class="style6">TIPO DA O.S. </div></td>
  </tr>
  <tr>
    <td class="style6"><div align="right">MATERIAL: &nbsp;</div></td>
    <td colspan="2" class="style6"><div align="left"><em><?=$os['Material']?></em></div></td>
    <td><div align="center" class="style6"><strong><em><?=$os['Tipo']?></em></strong></div></td>
  </tr>
  <tr>
    <td class="style6"><div align="right">DESENHO CLIENTE: &nbsp; </div></td>
    <td colspan="2" class="style6"><div align="left"><em><?=$os['Desenho_Cliente']?></em></div></td>
    <td rowspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td class="style6"><div align="right">DESENHO PIMENTEL: &nbsp; </div></td>
    <td colspan="2" class="style6"><div align="left"><em><?=$os['Desenho_Pimentel']?></em></div></td>
  </tr>

   <tr>
    <td class="style6"><div align="right">&nbsp; </div></td>
    <td colspan="2" class="style6"><div align="left"><em></em></div></td>
  </tr>

		<tr>
    <td width="23%" class="style6"><div align="right">Cod: &nbsp;</div></td>
    <td colspan="2" class="style6"><div align="left"><em><?php
		echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($os['Id'], $generator::TYPE_CODE_128)) . '">';
		?></em><p class="num">..........<?=$os['Id']?>..........</p></div> 
		</td>
		
		
	
  </tr>
	
 </table>
 <?php endforeach;?>
<p><span class="style13"><strong></strong></span></p>

</body>
</html>
