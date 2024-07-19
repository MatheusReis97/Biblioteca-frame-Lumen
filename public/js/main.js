
async function login(event) {
    event.preventDefault();

    // Coletar as credenciais de login do formulário
    const email = document.getElementById('email').value;
    const senha = document.getElementById('senha').value;

    // Enviar uma requisição POST para o servidor com as credenciais
    const response = await fetch('/login-submit', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ email, senha })
    });

    // Processar a resposta do servidor
    const data = await response.json();

    if (data.success) {
        // Se o login for bem-sucedido, armazenar o token no localStorage
        localStorage.setItem('jwt_token', data.token);

        // Redirecionar para a página de livros
        window.location.href = '/livros';
    } else {
        // Se o login falhar, exibir a mensagem de erro
        alert('Login falhou: ' + data.error.join(', '));
    }
}
