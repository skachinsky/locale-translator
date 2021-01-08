## Laravel Locale Translator

Locale Translator - это простой Eloquent трейт и таблица базы данных для Laravel, который добавляет `translateAttribute()` метод. Он помогает в случаях, когда объект модели подразумевает разные варианты значений для разных локалей.

## Установка

Установка с использованием Composer:
```sh
composer require skachinsky/locale-translator
```

Далее необходимо запустить команду в корневой директории проекта:
```sh
php artisan vendor:publish --provider="Skachinsky\LocaleTranslator\LocaleTranslatorServiceProvider"
```

После чего запустить миграцию:
```sh
php artisan migrate
```

В итоге создастся таблица `translates`.


## Использование

Предположим, у вас имеется таблица-справочник с видами домашних животных:

**pet_types**

| id | slug |
|---|---|
|1|dog|
|2|cat|
|3|hamster|

**Вам необходимо заранее внести в таблицу** `translates` значения.
Как например, можно использовать такой код:
```php
use Skachinsky\LocaleTranslator\Models\Translate;

$petType = PetType::find(1);
Translate::create([
    "type"=>$petType->getModelName(),
    "row_id"=>$petType->id,
    "locale"=>"en",
    "value"=>"dog"
]);
Translate::create([
    "type"=>$petType->getModelName(),
    "row_id"=>$petType->id,
    "locale"=>"ru",
    "value"=>"собака"
]);
//и т.д. для каждой строки pet_types
```

Теперь, для того чтобы выдать клиенту значение справочника в зависимости от текущей локали, необходимо в моделе подключить трейт:
```php
namespace App\Models;

use Skachinsky\LocaleTranslator\LocaleTranslator;

class PetType extends Model
{
    use LocaleTranslator;
    
    /*...*/
    
    public function getTitleAttribute() {
       return $this->translateAttribute($this->slug);
    }
}
```
