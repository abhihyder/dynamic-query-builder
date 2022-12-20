## Server Setup

-   If you want to run this project in live server, I assume that you have Ubuntu 20.04 or 18.04 operating system. Or if you want to run this project in local server in windows, I assume that you have installed xampp with minimum PHP version 7.3. Also installed node.

-   PHP Configuration from Laravel (version 8.x) Documentation : [https://laravel.com/docs/8.x/deployment#server-requirements](https://laravel.com/docs/8.x/deployment#server-requirements)

-   Installation composer with minimum version : 2.2.x. [See Documentation](https://getcomposer.org/doc/00-intro.md)

## Project Setup

-   Clone the repository to /var/www/html for Ubuntu or xampp/htdocs/ for Windows (xampp)
-   Navigate to the project directory
-   Run "composer install"
-   Run "cp .env.example .env"
-   Run "php artisan key:generate"

<h4> Set value in .env</h4>

-   DB\_ .....= (Database connection related values)


<h4>After that run those following command</h4>

-   npm install

-   npm run dev

-   php artisan migrate --seed

-   php artisan serve

<h4>Now you can login with the default user</h4>

- Email: hyder@gmail.com

- Password: secret
