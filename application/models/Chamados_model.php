<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Andrei Basso
 * 
 */


class Chamados_model extends CI_Model{
    private $tabela;
    function __construct() {
        $this->tabela = 'chamados';
    }
    
    public function buscar($id=NULL) {
        if($id){
            $query = $this->db->get_where($this->tabela, array('idchamados'=>$id));
            return $query->row_array();
        }
        $this->db->select('idchamados, chamados.situacao,chamados.descricao, chamados.datalocal, '
                . 'nomecliente as cliente, email as cliente_email, telefone as cliente_telefone, '
                . 'nomefuncionarios as nome_funcionarios, telefonefuncionarios as telefone_funcionarios, emailfuncionarios as email_funcionarios, '
                . 'nomeequipamentos as nome_equipamentos, '
                . 'nometipos as nome_tipos, tempo as tempo_tipos ');
        $this->db->from($this->tabela);
        $this->db->join('cliente', 'cliente.id=chamados.idcliente');
        $this->db->join('funcionarios', 'funcionarios.idfuncionarios=chamados.idfuncionarios');
        $this->db->join('equipamentos', 'equipamentos.idequipamentos=chamados.idequipamentos');
        $this->db->join('tipos', 'tipos.idtipos=chamados.idtipos');
        $query = $this->db->get();
        return $query->result_array();
    }
    
   
    
    function enviaSms($msg = null, $dados =null) {
       $cliente = $this->db->get_where('cliente', array('id'=>$dados['idcliente']));
       $cliente = $cliente->result_array();
       $fone = $cliente['0']['telefone'];
       $nome = $cliente['0']['nomecliente'];
       $endereco = $cliente['0']['email'];
       
$Nome=$nome;
$Fone=$fone;
$Email=$endereco;
$Mensagem="Ola ". $nome. ", " . $msg;

// Variável que junta os valores acima e monta o corpo do email

$Vai 		= "Nome: $Nome\n\nE-mail: $Email\n\nTelefone: $Fone\n\nMensagem: $Mensagem\n";

//require_once("phpmailer/class.phpmailer.php");
require_once __DIR__. '../../libraries/phpmailer/class.phpmailer.php';

define('GUSER', 'gpmgpm17@gmail.com');	// <-- Insira aqui o seu GMail
define('GPWD', 's1nc3r0s1nc3r0');		// <-- Insira aqui a senha do seu GMail

    function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
	global $error;
	$mail = new PHPMailer();
	$mail->IsSMTP();		// Ativar SMTP
	$mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;		// Autenticação ativada
	$mail->SMTPSecure = 'tls';	// SSL REQUERIDO pelo GMail
	$mail->Host = 'smtp.gmail.com';	// SMTP utilizado
	$mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->SetFrom($de, $de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
	$mail->AddAddress($para);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Mensagem enviada!';
		return true;
	}
}


if (smtpmailer($Email, 'gpmgpm17@gmail.com', 'Grupo Minozzo', 'Chamado', $Vai)) {

	

}
if (!empty($error)) echo $error;
       
       
////////////////////////////////Manda sms
       ///////////////////////////////////
       //////////////////////////////////////
       $account = 'm2p2comunicacoes.mkt';
       $code =  'OOQ8xcM6ZZ';
       $to = $fone;
       $msg2="Ola ". $nome. ", " . $msg;
       $from = 'Grupo Minnozzo';
          
	// Cria array com caracteres de uma possível mascara
	$exclui = array (
			"(",
			")",
			"-"
	);
	// Substitui caracteres do array
	$to = str_replace ( $exclui, "", $to );
	// Adiciona o 55 na frente do numero
	$to = '55' . $to;
	
       // echo $to;
        
        // cria array com dados do POST
	$content = http_build_query ( array (
			'account' => $account,
			'code' => $code,
			'dispatch' => "send",
			'to' => $to,
			'msg' => $msg2,
			'from' => $from,
	) );

	$context = stream_context_create ( array (
			'http' => array (
					'method' => 'POST',
					'header' => "Content-Type: application/x-www-form-urlencoded",
					'content' => $content
			)
	) );

	$result = file_get_contents ( 'http://www.zenvia360.com.br/GatewayIntegration/msgSms.do', null, $context );
	return $result;
    }
    
    
    public function gravar($id=NULL) {
        $dados = $this->input->post();
        if($id){
            $msg = 'seu chamado foi editado em nosso sistema.';
            $this->enviaSms($msg, $dados);
       
        return $this->db->where('idchamados',$id)->update($this->tabela,$dados);
        }
               $msg = 'seu chamado foi inserido em nosso sistema.';
       $this->enviaSms($msg, $dados);
       return$this->db->insert($this->tabela, $dados);
}
    
    public function excluir($id){
        return $this->db->where('idchamados',$id)->delete($this->tabela);
    }
    
}
