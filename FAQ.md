#Часто задаваемые вопросы (ЧаВо) по модулю Y.CMS для Opencart 2

###Установка
**Вопрос:** Могу ли я установить модуль Y.CMS на Opencart версии 1.5?
>**Ответ:**
>Нет, т.к. модуль Y.CMS для Opencart 2 совместим только с CMS Opencart версии 2.0 или выше. 

**Вопрос:** Как полностью удалить модуль (для любой из Opencart 2) с сайта?
>**Ответ:** 
>Можно попытаться удалить все следы модуля с помощью [расширения ](https://yadi.sk/d/CaX0jg503HxXk8) или удалить файлы из списка ниже вручную.
>
>Каталог `admin`:
>```
        "controller/feed/yamodule.php",
        "controller/payment/yamodule.php",
        "controller/tool/mws.php",
        "model/yamodule/metrika.php",
        "model/yamodule/pokupki.php",
        "model/yamodule/return.php",
        "controller/extension/feed/yamodule.php",
        "controller/extension/payment/yamodule.php",
        "controller/extension/tool/mws.php",
        "model/extension/yamodule/metrika.php",
        "model/extension/yamodule/pokupki.php",
        "model/extension/yamodule/return.php"
```

>Каталог `catalog`:
>```
        "controller/feed/yamarket.php",
        "controller/payment/yamodule.php",
        "controller/yandexbuy/cart.php",
        "controller/yandexbuy/order.php",
        "model/payment/yamodule.php",
        "model/yamodel/pokupki.php",
        "model/yamodel/yamarket.php",
        "model/yamodel/yamoney.php",
        "controller/extension/feed/yamarket.php",
        "controller/extension/payment/yamodule.php",
        "controller/yandexbuy/cart.php",
        "controller/yandexbuy/order.php",
        "model/extension/payment/yamodule.php",
        "model/extension/yamodel/pokupki.php",
        "model/extension/yamodel/yamarket.php",
        "model/extension/yamodel/yamoney.php"
```
>

**Вопрос:** 
>**Ответ:** 
>
