
        document.addEventListener('DOMContentLoaded', function () {
            var mensagems = json($mensagems ?? []); // Converter mensagems PHP para JavaScript, fornecendo um array vazio padrão se não houver mensagems

            // Verificar se há mensagens de erro
            if (mensagems.length > 0) {
                var offcanvasElement = document.getElementById('Menulogin');
                var offcanvas = new bootstrap.Offcanvas(offcanvasElement);
                offcanvas.show(); // Mostrar Offcanvas se houver mensagens de erro
            }
        });
