# SocialNetworks
Компонент для вывода социальных сетей и других сервисов.

## **Админка**
![](https://file.modx.pro/files/c/0/2/c02d15be012dac76755dd5904ac04c29.jpg)

## **Cниппет SocialNetworks** (вызывать некэшируемым).
    [[!SocialNetworks]]

### **Параметры сниппеты:**
| Имя | Описание | По умолчанию |
| -- | -- | -- |
| tplOuter | Чанк оформления всего блока | '@INLINE &lt;ul class="list-inline"&gt;&#123;$wrapper&#125;&lt;/ul&gt;' | 
| tpl | Чанк оформления сервиса | '@INLINE &lt;li class="list-inline-item"&gt;&lt;a href="&#123;$link&#125;" target="_blank" title="&#123;$name&#125;"&gt;&lt;i class="fab fa-&#123;$name&#125;"&gt;&lt;/i&gt;&lt;/a&gt;&lt;/li&gt;' | 
| sortby | Поле сортировки | name |
| sortdir | Направления сортировки | ASC |
| limit | Ограничение кол-ва результатов выборки | 0 |
| outputSeparator | Разделить вывода строк | '/n' |
| toPlaceholder | Если указан этот параметр, то результат будет сохранен в плейсхолдер, вместо прямого вывода на странице. | | services | Список соц. сетей для вывода. Если пусто, то выводятся все сети. | |
| fontawesome | Подключает шрифт fontawesome. Возможные варианты: **webfont**\|\| **svg**\|\|**none** | webfont

## **Примеры:**
1.Показываем все сервисы:

    {'SocialNetworks' | snippet}

2.Показываем только 3 сервиса: Vkontakte, Facebook, Instagram

    {'SocialNetworks' | snippet: [
        'services' => 'vk,facebook-f,instagram'
    ]}
Больше примеров можно посмотреть [здесь](http://socialnetworks.boshnik.ru/#example)

## **Как добавить еще сервисы?**
Добавляем необходимый элемент массива в системную настройку: <strong>socialnetworks_services</strong>: ["modx","MODX"]
Добавляем сервис в меню компонента:
![](https://file.modx.pro/files/d/0/3/d03fc19b2ee246312aca5ea3a1f08302.jpg)
Выводим:

    {'SocialNetworks' | snippet: [
        'services' => 'modx'
    ]}