### Hey, glad to see you here! To run the project you should to follow few steps:

> git clone https://github.com/vamajordy/brambling.git

> cp .env.example .env

> docker-compose up -d

> php composer.phar install
>
> docker-compose exec app php artisan key:generate
> 
> docker-compose exec app php artisan optimize
> 
> docker-compose exec app php artisan migrate 

#### to test api use postman, etc:

#### GET        api/dictionaries ................................................................................................................. DictionaryController@index
#### POST       api/dictionaries ................................................................................................................. DictionaryController@store
#### GET        api/dictionaries/{dictionary} ..................................................................................................... DictionaryController@show
#### DELETE     api/dictionaries/{dictionary} .................................................................................................. DictionaryController@destroy
#### PATCH      api/set-word/{dictionary}/{word} ..................................................................................................... WordController@setWord
#### PATCH      api/unset-word/{word} .............................................................................................................. WordController@unsetWord
#### POST       api/words .............................................................................................................................. WordController@store
#### DELETE     api/words/{word} ..................................................................................................................... WordController@destroy

