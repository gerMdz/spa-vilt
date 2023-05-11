# SPA Portafolio

## About SPA Portafolio

Es lo aprendido en un curso que describo en Learning Laravel.
Es para integrar distintos componentes de front y back

## Documentación usada

[Tailwindcss](https://tailwindcss.com/docs/installation)

[Laravel](https://laravel.com/docs/8.x/installation)

[Inertia](https://inertiajs.com/)

[Vue](https://vuejs.org/guide/introduction.html)

[jetstream](https://jetstream.laravel.com/3.x/introduction.html)

## Comandos

### Instalar componentes
#### Laravel
```
composer create-project laravel/laravel carpeta-de-destino
```

#### Jetstream
```bash
composer require laravel/jetstream
```
#### Crear model (-m migración -f factory -c controller)
```
php artisan make:model Skill -mfc
php artisan make:model Project -mfc
```

#### Creando la base de datos
```
php artisan migrate:fresh
```
#### Recreando la base de datos, borrando datos y aplicando seeders
```
php artisan migrate:fresh --seed
```
#### Ejecutando solo los seeders en la base de datos
```
php artisan db:seed
```

#### Instalando Jetstream
##### Elegimos inerti
```bash
php artisan jetstream:install inertia
```

#### Comprobando los datos cargados en la base de datos
```
php artisan tinker
 App\Models\Skill::all();
 App\Models\Project::all();
```


## Learning Laravel

Esto es parte de los cursos que imparte en Udemy [JuanDMGon](https://www.udemy.com/user/juandavidmezagonzlez/)

En este caso lo sigo en Laravel, otros los he seguido en Symfony aunque él lo enseñaba en Laravel.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

Este proyecto también está licenciado bajo la [MIT license](https://opensource.org/licenses/MIT). 


#### Next step

[Cap 14](https://www.udemy.com/course/usa-laravel-y-crea-un-spa-con-vue-intertia-y-tailwind-css/learn/lecture/31415714#questions/17832372)
