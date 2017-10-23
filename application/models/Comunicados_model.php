<?php

require_once __DIR__ . '../../libraries/phpmailer/class.phpmailer.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 * Andrei Basso
 * 
 */

class Comunicados_model extends CI_Model {

    private $tabela;

    function __construct() {
        $this->tabela = 'cliente';
    }
        

    function enviaSms($msg = null, $dados = null, $telefone_envia=null, $nome_envia=null) {
     $account = 'm2p2comunicacoes.mkt';
       $code =  'OOQ8xcM6ZZ';
       $to = $telefone_envia;
       $msg2="Ola ". $nome_envia. ", Temos uma mensagem para voce: " . $msg;
       $from = 'Grupo Minozzo';
          
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
    
    function smtpmailer($para, $de, $de_nome, $assunto, $corpo) {
        global $error;
        $mail = new PHPMailer();
        $mail->IsSMTP();  // Ativar SMTP
        $mail->SMTPDebug = 0;  // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
        $mail->SMTPAuth = true;  // Autenticação ativada
        $mail->SMTPSecure = 'tls'; // SSL REQUERIDO pelo GMail
        $mail->Host = 'smtp.gmail.com'; // SMTP utilizado
        $mail->Port = 587;    // A porta 587 deverá estar aberta em seu servidor
        $mail->Username = 'gpmgpm17@gmail.com';
        $mail->Password = 's1nc3r0s1nc3r0';
        $mail->SetFrom($de, $de_nome);
        $mail->Subject = $assunto;
        $mail->Body = $corpo;
        $mail->AddAddress($para);
        if (!$mail->Send()) {
            $error = 'Mail error: ' . $mail->ErrorInfo;
            return false;
        } else {
            $error = 'Mensagem enviada!';
            return true;
        }
    }

    public function gravar($id = NULL) {
        $dados = $this->input->post();
        $msg = $dados['mensagem'];
        $titulo = $dados['titulo'];
        echo $dados['remetente'];
        
        switch ($dados['remetente']) {
            
        case "envia_email":
            
            

        if ($dados['idcliente'] === '999999') {
            $todos = $this->db->get($this->tabela);

            $todos = $todos->result_array();
            $count = count($todos);
            for ($i = 0; $i < $count; $i++) {
                $nome_envia = $todos[$i]['nomecliente'];
                echo $nome_envia;
                $telefone_envia = $todos[$i]['telefone'];
                echo $telefone_envia;
                $email_envia = $todos[$i]['email'];
                echo $email_envia;

                $Vai = "Olá $nome_envia! \n\nNós do Grupo Minozzo temos uma mensagem importante para você:\n\n$msg\n";
                $this->smtpmailer($email_envia, 'gpmgpm17@gmail.com', 'Grupo Minozzo', $titulo, $Vai);
            }
        } else {
            $cliente = $this->db->get_where('cliente', array('id' => $dados['idcliente']));
            $cliente = $cliente->result_array();
            $nome_envia = $cliente['0']['nomecliente'];
            $telefone_envia = $cliente['0']['telefone'];
            $email_envia = $cliente['0']['email'];

            $Vai = "Olá $nome_envia! \n\nNós do Grupo Minozzo temos uma mensagem importante para você:\n\n$msg\n";
            $this->smtpmailer($email_envia, 'gpmgpm17@gmail.com', 'Grupo Minozzo', $titulo, $Vai);
        }
        
          break;
          
          case "envia_sms":
              
            if ($dados['idcliente'] === '999999') {
            $todos = $this->db->get($this->tabela);

            $todos = $todos->result_array();
            $count = count($todos);
            for ($i = 0; $i < $count; $i++) {
                $nome_envia = $todos[$i]['nomecliente'];
                $telefone_envia = $todos[$i]['telefone'];
                $email_envia = $todos[$i]['email'];

                $this->enviaSms($msg, $dados, $telefone_envia, $nome_envia);
            }
        } else {
            $cliente = $this->db->get_where('cliente', array('id' => $dados['idcliente']));
            $cliente = $cliente->result_array();
            $nome_envia = $cliente['0']['nomecliente'];
            $telefone_envia = $cliente['0']['telefone'];
            $email_envia = $cliente['0']['email'];

            $this->enviaSms($msg, $dados, $telefone_envia, $nome_envia);
        }
              

              break;
          case "envia_ambos":
              
                       if ($dados['idcliente'] === '999999') {
            $todos = $this->db->get($this->tabela);

            $todos = $todos->result_array();
            $count = count($todos);
            for ($i = 0; $i < $count; $i++) {
                $nome_envia = $todos[$i]['nomecliente'];
                $telefone_envia = $todos[$i]['telefone'];
                $email_envia = $todos[$i]['email'];

                $this->enviaSms($msg, $dados, $telefone_envia, $nome_envia);
                $Vai = "Olá $nome_envia! \n\nNós do Grupo Minozzo temos uma mensagem importante para você:\n\n$msg\n";
                $this->smtpmailer($email_envia, 'gpmgpm17@gmail.com', 'Grupo Minozzo', $titulo, $Vai);
            }
        } else {
            $cliente = $this->db->get_where('cliente', array('id' => $dados['idcliente']));
            $cliente = $cliente->result_array();
            $nome_envia = $cliente['0']['nomecliente'];
            $telefone_envia = $cliente['0']['telefone'];
            $email_envia = $cliente['0']['email'];

            $this->enviaSms($msg, $dados, $telefone_envia, $nome_envia);
            $Vai = "Olá $nome_envia! \n\nNós do Grupo Minozzo temos uma mensagem importante para você:\n\n$msg\n";
            $this->smtpmailer($email_envia, 'gpmgpm17@gmail.com', 'Grupo Minozzo', $titulo, $Vai);
        }
              break;

    }
    }

}
