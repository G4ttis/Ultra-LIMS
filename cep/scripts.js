document.getElementById('consultaForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const cep = document.getElementById('cepInput').value;
    fetch(`https://viacep.com.br/ws/${cep}/json/`)
        .then(response => response.json())
        .then(data => {
            if (!data.erro) {
                const enderecoInfo = `
                    <p>CEP: ${data.cep}</p>
                    <p>Logradouro: ${data.logradouro}</p>
                    <p>Bairro: ${data.bairro}</p>
                    <p>Cidade: ${data.localidade}</p>
                    <p>Estado: ${data.uf}</p>
                `;
                document.getElementById('enderecoInfo').innerHTML = enderecoInfo;
            } else {
                document.getElementById('enderecoInfo').innerHTML = '<p>CEP não encontrado</p>';
            }
        })
        .catch(error => console.error('Erro ao consultar o CEP:', error));
});