sudo docker-compose up    
composer install  
php artisan migrate:refresh --seed   
cd /resources/js && npm run dev   
cd ../.. && php artisan serve  
  
Devido ao tempo limite de desenvolvimento não foi possível concluir o sistema.  
Não foram implementadas validações no front, cadastro de Experiencias Profissionais e testes.   
A validação do rota aberda de cadastro é feita via CSRF-Token  
  
Rota de Login Admin: /login/admin -> admin@admin.com secret
Rota de Login Candidato: /login (NÃO IMPLEMENTADO)
Rota de Cadastro: /
  