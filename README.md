# crudCodeigniterReact
CRUD Operation Backend using codeigniter-4 and react for frontend

Dependancy:
Composer- install composer
codeigniter 4- install codeigniter 4 "composer create-project codeigniter4/appstarter backend"
Run codeigniter:- php spark serve

Create Database:
- .Env File -Add Db Configuration
- create table For Customer - php spark make:migration Customers
- Run For create db migration -php spark migrate
- for create Model -php spark make:model CustomerModel
- Create Controller - php spark make:controller Customers --restful
- Add Route Configuration
- For CORS run - php spark make:filter Cors
- change code app/Filters/Cors.php and app/Config/Filter.php
 

React-
- Install or check node -v
- Install or check npm -v
- then create react App -  npx create-react-app frontend
- For Routing - install npm install react-router-dom axios bulma
- start server - npm start
- Add Components- src/components
- Add routing App.js
- Change -index.js


