
## Установка 

- создать и выставить значения .env из .env.example
- значение "BACKEND_DOMAIN". Указать в файл хосте 127.0.0.1 agro-service.local(значение BACKEND_DOMAIN)
- docker compose build
- docker compose up -d
- docker compose exec backend composer install


- docker compose exec backend php artisan key:generate
- docker compose exec backend php artisan migrate
- docker compose exec backend php artisan db:seeder CountrySeeder
- docker compose exec backend php artisan db:seeder ProductSeeder

Для проверки можно запустить комманду 

- docker-compose exec backend php artisan test

## ТЗ
Пример:
Продавец продает два продукта
- наушники (100 евро)
- чехол для телефона (20евро)

в трёх странах:
- Германия
- Италия
- Греция

При покупке получатель сверх цены продукта должен уплатить налог за него (аналог НДС), 
- Налог в Германии - 19% 
- Италии - 22% 
- Греции - 24% 
	 
В итоге для покупателя из Греции цена наушников составляет 124 евро (цена продукта + налог). 


У каждого покупателя есть свой tax номер следующего формата: 
    DEXXXXXXXXX - для жителей Германии 
    ITXXXXXXXXXXX - для жителей Италии 
    GRXXXXXXXXX - для жителей Греции 
где первые два символа - это код страны, а X - это любая цифра от 0 до 9 
 
Страница рассчёта цены продукта для покупателя должна состоять из двух полей: 
    1. select со списком продуктов 
    2. input для ввода tax номера покупателя 
    3. кнопка отправки формы 
 
После отправки формы, по tax номеру нужно определить страну покупателя и рассчитать конечную стоимость выбранного продукта 
 
При написании тестового используйте гит, после выполнения пришлите ссылку на репозиторий. Будет большим плюсом, если задание сразу будет выполнено в Docker, так же плюсом будут написанные тесты

200 = 100
x     120 


x = цена * procent
