### Hey, glad to see you here! To run the project you should to follow few steps:

> git clone https://github.com/vamajordy/brambling.git

> cd brambling && cp .env.example .env

> docker-compose up -d

> docker-compose exec app php composer.phar install
>
> docker-compose exec app php artisan key:generate
> 
> docker-compose exec app php artisan config:clear
> 
> docker-compose exec app php artisan migrate 

#### to test api use postman, etc:

#### GET        api/dictionaries - DictionaryController@index - List all dictionaries
#### POST       api/dictionaries - DictionaryController@store - Create new dictionary
#### GET        api/dictionaries/{dictionary} - DictionaryController@show - List dictionary's words
#### DELETE     api/dictionaries/{dictionary} - DictionaryController@destroy - Delete dictionary
#### PATCH      api/set-word/{dictionary}/{word} - WordController@setWord - Add word to dictionary
#### PATCH      api/unset-word/{word} - WordController@unsetWord - Remove word 
#### POST       api/words - WordController@store - Create new word
#### DELETE     api/words/{word} - WordController@destroy - Delete word

