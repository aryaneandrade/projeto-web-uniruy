<?php
include_once("templates/header.php");
?>

<body>
    <div class="container" id="form-container">
        <h2>Finalize o seu Pedido</h2>
        <form>
            <div class="row">
                <p>Informe os dados do Endereço de Entrega</p>

                <div class="form-group col-md-3">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" placeholder="00000-000" maxlength="9">
                </div>

                <div class="form-group col-md-4">
                    <label for="rua">Rua / Avenida</label>
                    <input type="text" class="form-control" id="rua" placeholder="Ex: Rua Oswaldo Sento Sé">
                </div>

                <div class="form-group col-md-2">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" id="numero" placeholder="Ex: 151">
                </div>

                <div class="form-group col-md-3">
                    <label for="telefone">Telefone</label>
                    <input type="tel" class="form-control" id="telefone" pattern="^[0-9]{2}\s[0-9]{4,5}-[0-9]{4}$"
                        placeholder="Ex: 71 90000-0000">
                </div>

                <div class="form-group col-md-4 mt-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" placeholder="Ex: Centro">
                </div>

                <div class="form-group col-md-4 mt-3">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" placeholder="Ex: Salvador">
                </div>

                <div class="form-group col-md-4 mt-3">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" id="estado" placeholder="Ex: BA">
                </div>
            </div>

            <a href="pagamento.php" class="btn btn-primary mt-4">Continuar</a>
        </form>
    </div>

    <!-- Script da API ViaCEP -->
    <script>
        document.getElementById('cep').addEventListener('blur', function () {
            let cep = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos

            if (cep.length !== 8) {
                alert('Por favor, insira um CEP válido.');
                return;
            }

            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => {
                    if (!response.ok) throw new Error('Erro na resposta da API');
                    return response.json();
                })
                .then(data => {
                    if (data.erro) {
                        alert('CEP não encontrado.');
                        return;
                    }

                    // Preenche automaticamente os campos
                    document.getElementById('rua').value = data.logradouro || '';
                    document.getElementById('bairro').value = data.bairro || '';
                    document.getElementById('cidade').value = data.localidade || '';
                    document.getElementById('estado').value = data.uf || '';
                })
                .catch(error => {
                    console.error('Erro ao buscar o CEP:', error);
                    alert('Não foi possível buscar o endereço. Tente novamente.');
                });
        });
    </script>

</body>

</html>