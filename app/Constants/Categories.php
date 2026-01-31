<?php

namespace App\Constants;

class Categories
{
    /*** @var string */
    public const CPU = 1;
    /*** @var string */
    public const MOTHERBOARD = 2;
    /*** @var string */
    public const RAM = 3;
    /*** @var string */
    public const GPU = 4;
    /*** @var string */
    public const SSD = 5;
    /*** @var string */
    public const HDD = 6;
    /*** @var string */
    public const POWER_SUPPLY = 7;
    /*** @var string */
    public const BODY = 8;
    /*** @var string */
    public const COOLING_SYSTEM = 9;
    /*** @var string */
    public const MONITORS = 10;
    /*** @var string */
    public const OTHER = 99;

    /*** @var array */
    public const ALL = [
        self::CPU,
        self::MOTHERBOARD,
        self::RAM,
        self::GPU,
        self::SSD,
        self::HDD,
        self::POWER_SUPPLY,
        self::BODY,
        self::COOLING_SYSTEM,
        self::MONITORS,
        self::OTHER
    ];

    /*** @var array */
    public const WITH_TEXT = [
        self::CPU => 'Процесори',
        self::MOTHERBOARD => 'Материнські плати',
        self::RAM => 'Оперативна пам\'ять ',
        self::GPU => 'Відеокарти',
        self::SSD => 'SSD накопичувачі',
        self::HDD => 'Жорсткі диски',
        self::POWER_SUPPLY => 'Блоки живлення',
        self::BODY => 'Корпуси',
        self::COOLING_SYSTEM => 'Системи охолодження',
        self::MONITORS => 'Монітори',
        self::OTHER
    ];
}
