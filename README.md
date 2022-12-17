# Instruction après déploiment
composer install

# Installation de breeze
php artisan breeze:install
php artisan migrate
npm install
npm run dev

#
php artisan migrate
php artisan db:seed

Compte Admin
email: admin@gmail.com
mot de passe: password

Compte Patient
email: patient@gmail.com
mot de passe: password