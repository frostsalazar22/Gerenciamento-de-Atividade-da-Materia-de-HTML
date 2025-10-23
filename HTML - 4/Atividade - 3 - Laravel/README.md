# Atividade3---Laravel
Funcional exemplo bom para projeto



✅ Passos para rodar o projeto Laravel após clonar do Git
execute o xampp e de start nos apche, mysql
# 1. Clonar o repositório (se ainda não fez)
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio

# 2. Instalar dependências do PHP (via Composer)
Requer que o Composer esteja instalado.
composer install
# 3. Instalar dependências do JavaScript (opcional, apenas se usar Vue/React/Bootstrap/etc.)
Requer que o Node.js e npm estejam instalados.
npm install
Se o projeto usar frontend com Vite ou Laravel Mix, você depois roda npm run dev.

# 4. Copiar e configurar o arquivo .env
O .env contém as configurações de ambiente (como banco de dados).
cp .env.example .env
Depois, edite o .env com seu editor de texto e configure:

# Editar
APP_NAME="Seu Projeto"
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha

# 5. Gerar a chave da aplicação
php artisan key:generate

# 6. Criar o banco de dados (via phpMyAdmin ou MySQL Workbench)
Crie o banco de dados com o nome definido no .env.

# 7. Rodar as migrations (cria as tabelas no banco)
php artisan migrate
Se você tiver dados de teste com seeders, também pode usar:
php artisan db:seed

# 8. Subir o servidor local
php artisan serve

# 9. (Opcional) Rodar frontend com Vite ou Mix
Se o projeto usa Vite ou Laravel Mix:
npm run dev
