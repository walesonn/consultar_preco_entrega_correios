# Para utilizar basta apenas clonar rodar o comando => composer install e sair usando não tem nenhum requisito específico apenas o jquery que ja está na pasta js/

# URI base de consulta de preços e de entregas dos correios

http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?nCdEmpresa=09146920&sDsSenha=123456&sCepOrigem=35325000&sCepDestino=15076610&nVlPeso=1&nCdFormato=1&nVlComprimento=30&nVlAltura=30&nVlLargura=30&sCdMaoPropria=n&nVlValorDeclarado=0&sCdAvisoRecebimento=n&nCdServico=40010&nVlDiametro=0&StrRetorno=xml&nIndicaCalculo=3

#Caso você tenha algum contrato com os correios verifique a class Request responsável por fazer a requisição a api, e adicione as informações do seu contrato com os correios nela (codigo da empresa e senha => obtido pelo contrato com a agência dos correios ) para obter uma diferença nos preços para seus clientes.Caso não possua contrato com uma agência dos correios não tem problema funciona do mesmo jeito, porém, com preços praticados no balcão.