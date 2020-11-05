<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

## Sobre

Ordenação e prorização de tickets desenvolvido em Laravel, Elasticsearch e Redis

## Instalação

Copiar o arquivo .env.template e preencher com as credenciais do Redis e Elasticsearch.

Rodar o comando para popular o Redis:

```
php artisan seed

``` 

Depois que o Redis estiver populado, rodar o comando para indexar os documentos no Elasticsearch:
```
php artisan elasticsearch:index
```
---
## Endpoints

Lita de tickets:
- /api/v1/tickets

Ordenação:
- /api/v1/tickets?sort=Priority:desc
- /api/v1/tickets?sort=Priority:asc
- /api/v1/tickets?sort=DateCreate:desc
- /api/v1/tickets?sort=DateCreate:asc
- /api/v1/tickets?sort=DateUpdate:desc
- /api/v1/tickets?sort=DateUpdate:asc

Paginação:
- /api/v1/tickets?page=1