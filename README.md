# Punch Clock

Sistema simples de ponto eletrônico desenvolvido em Laravel.

## Índice
- [Sobre o Projeto](#sobre-o-projeto)
- [Tecnologias Utilizadas](#tecnologias-utilizadas)
- [Requisitos](#requisitos)
- [Instalação](#instalação)
- [Configuração](#configuração)
- [Como Rodar](#como-rodar)
- [Testes](#testes)

## Sobre o Projeto
Este sistema permite o registro de pontos eletrônicos por usuários, com funcionalidades de cadastro, autenticação, registro de horários e visualização de histórico.

## Tecnologias Utilizadas
- [Laravel](https://laravel.com/) (backend e estrutura principal)
- [Livewire](https://laravel-livewire.com/) (componentes dinâmicos)
- [Vite](https://vitejs.dev/) (build e assets)
- PHP 8.2+
- MySQL

## Requisitos
- PHP >= 8.2
- Composer
- Node.js >= 16.x e npm

## Instalação
1. Clone o repositório:
   ```bash
   git clone git@github.com:adrysson/punch-clock.git
   cd punch-clock
   ```
2. Instale as dependências PHP:
   ```bash
   composer install
   ```
3. Instale as dependências JavaScript:
   ```bash
   npm install
   ```

## Configuração
1. Copie o arquivo de ambiente:
   ```bash
   cp .env.example .env
   ```
2. Gere a chave da aplicação:
   ```bash
   php artisan key:generate
   ```
3. Configure o banco de dados no arquivo `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=punch_clock
   DB_USERNAME=root
   DB_PASSWORD=password
   ```
4. Execute as migrations e seeders:
   ```bash
   php artisan migrate --seed
   ```

## Como Rodar
1. Realize o build dos assets com o Vite:
   ```bash
   npm run build
   ```
2. Inicie o servidor de desenvolvimento Laravel:
   ```bash
   php artisan serve
   ```
3. Acesse o sistema em [http://localhost:8000](http://localhost:8000)

## Testes
Para rodar os testes automatizados:
```bash
php artisan test
```