<?php

namespace app\lib;

class Request{

    /**
     * @param $cadEmp Seu código administrativo junto à ECT. O código está disponível no corpo do contrato firmado com os Correios.
     * @param $pwd Senha para acesso ao serviço, associada ao seu código administrativo. A senha inicial corresponde aos 8 primeiros dígitos do CNPJ informado no contrato. A qualquer momento, é possível alterar a senha no endereço http://www.corporativo.correios.com.br/encomendas/servicosonline/recuperaSenha.
     * @param $cepOrig cep que endereço da empresa
     * @param $cepDest cep de destino da entrega
     * @param $peso = peso da mercadoria
     * @param $formato = 1=> caixa/pacote 2=> rolo/prisma 3=> envelope
     * @param $comprimento Comprimento da encomenda (incluindo embalagem),em centímetros.
     * @param $altura Altura da encomenda (incluindo embalagem), emcentímetros. Se o formato for envelope,  informar zero(0).
     * @param $largura Largura da encomenda (incluindo embalagem), emcentímetros
     * @param $maoPropria Indica se a encomenda será entregue com o serviço adicional mão própria.Valores possíveis: S ou N (S – Sim, N – Não)
     * @param $valorDeclarado Indica se a encomenda será entregue com o serviço adicional valor declarado. Neste campo deve serapresentado o valor declarado desejado, em Reais.
     * @param $avisoRecebimento Indica se a encomenda será entregue com o serviço adicional aviso de recebimento.Valores possíveis: S ou N (S – Sim, N – Não)  se não optar pelo serviço informar N
     * @param $codServico Código do serviço: Sim. Pode ser mais de um numa consulta separados por vírgula. Código Serviço: 
     * 40010 SEDEX Varejo
     * 40045 SEDEX a Cobrar
     * 40215 Varejo SEDEX 10
     * 40290 Varejo SEDEX Hoje
     * 41106 Varejo PAC Varejo      
     * Para outros serviços, consulte o código no seu contrato com os correios.
     * @param $diametro Diâmetro da encomenda (incluindo embalagem), em centímetros. 
     */

    public static  function request(string $cadEmp=null, string $pwd=null,string $cepOrig, string $cepDest, string $peso, int $formato, float $comprimento, float $altura, float $largura, string $maoPropria = null, int $valorDeclarado = null, string $avisoRecebimento = null, string $codServico, float $diametro = null)
    {
        $maoPropria = is_null($maoPropria)? "n": $maoPropria;
        $valorDeclarado = is_null($valorDeclarado)? "0": $valorDeclarado;
        $avisoRecebimento = is_null($avisoRecebimento)? "n":$avisoRecebimento;
        $diametro = is_null($diametro)? "0": $diametro;

        $url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=".$cadEmp."&sDsSenha=".$pwd."&sCepOrigem=".$cepOrig."&sCepDestino=".$cepDest."&nVlPeso=".$peso."&nCdFormato=".$formato."&nVlComprimento=".$comprimento."&nVlAltura=".$altura."&nVlLargura=".$largura."&sCdMaoPropria=".$maoPropria."&nVlValorDeclarado=".$valorDeclarado."&sCdAvisoRecebimento=".$avisoRecebimento."&nCdServico=".$codServico."&nVlDiametro=".$diametro."&StrRetorno=xml&nIndicaCalculo=3";
        
        $ch = curl_init($url);

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $response = simplexml_load_string(curl_exec($ch));

        
        echo "valor = R$ ".$response->cServico->Valor."<br>".
        "prazoEntrega = ".$response->cServico->PrazoEntrega. " dias";
        
    }
}