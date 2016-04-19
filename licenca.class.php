<?php
error_reporting(E_ALL || E_PARSE);
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of licenca
 *
 * @author Web-Circular Diego Santos
 */
class licenca {
    
    public $DBHOSTNAME = 'localhost';
    public $DBUSERNAME = 'root';
    public $DBPASSWORD = '';
    public $DBDATABASE = 'licenca';
    public $db;
    public $conn;
            
    function __construct() {
        $this->conn = mysql_connect($this->DBHOSTNAME, $this->DBUSERNAME, $this->DBPASSWORD) 
                or die("Erro ao conectar com banco" . mysql_error());
        $this->db = mysql_select_db($this->DBDATABASE, $this->conn) 
                or die("Erro ao selecionar Banco de dados");
    }
    
    
    /**
     * Gera uma chave Unica para checagem de segurança
     * @return type
     */
    public static function wc_token() {
        return sha1("To" . "WC". date("d/m/Y H:i") . "ORCIM");
    }


    /**
     * Checa de o token é válido
     * @param type $token Token a ser validado
     * @param type $expira Duração do token
     * @return boolean
     */
    public static function wc_chechaToken($token, $expira=5) {
        for($i = 0; $i <= $expira; $i++) {
            if($token == sha1("To" . "WC" . date("d/m/Y H:i", strtotime("-{$i} minutes")) . "ORCIM")) {
                return true;
            }
        }
        return false;
    }
    
    public function cadastraLicenca($empresa, $chave) {
        $sql = "INSERT INTO wc_licenca(empresa, chave, dataCad) VALUES ('$empresa','$chave',NOW())";
        mysql_query($sql) or die(mysql_error() . $sql);
        //echo $sql;
        if(mysql_affected_rows()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function checkaLicenca($empresa) {
        $sql = "SELECT chave FROM wc_licenca WHERE empresa = '$empresa' ";
        $res = mysql_query($sql) or die('Erro ao selecionar');
        //echo $sql;
        if (mysql_numrows($res) > 0) {
            $resultado = mysql_result($res, 0,0);
            return $resultado;
        }
    }
    
    
}
