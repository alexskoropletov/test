<?php
namespace Skoropletov;

use Skoropletov\Parser;

spl_autoload_register(function ($class) {
    $class = sprintf(
        dirname(__FILE__) . '/classes/%s.class.php',
        str_replace("skoropletov\\" , "", strtolower($class))
    );
    include $class;
});

/**
* Напишите класс, при создании которого можно указать url, предусмотрите возможность указать его после инициализации класса.
*/
//$parser = new Parser("https://example.com");
$parser = new Parser;
$parser->setUrl("https://example.com");
/**
 * Класс должен уметь получать содержимое страницы по указанному url, при этом получение данных должно быть защищено от всех возможных исключений и ожидать ответа не более 10 сек.
 */
$parser->parseUrlContent();
/**
 * Оба метода могут вызываться несколько раз, при этом данные должны не заменяться, а дополняться.
 */
$parser->setAccordanceArray([
    'html' => 'lmth',
    'body' => [
        'yd',
        'ob',
        '_',
        'reverse'
    ]
]);
$parser->setAccordanceArray([
    'head' => 'daeh',
    'html' => 'reverse'
]);
$parser->setAccordance('html', '_');
$parser->setAccordance('head', ['_', 'reverse']);
/**
 * Замена должна производиться рекурсивно, т.е. если после замены в тексте остались или появились вхождения для замены,
 * то их тоже нужно заменить.
 * Предусмотрите защиту от зацикливания при замене.
 */
$parser->changeUrlContent();
/**
 * Класс должен уметь выводить результат.
 */
$parser->showUrlContent();
/**
 * Напишите наследник класса, который будет проводить инверсивную замену, т.е. менять результирующие значения исходными,
 * при этом вызов всех методов и инициализация потомка должна производиться только через класс – родитель.
 */
$parser->reverse();
$parser->showUrlContent();
