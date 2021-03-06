<?php

/**
 *
 */
class Number extends \Decimal\Number
{
    protected $value;

    private static function parse($number)
    {
        $value = $number instanceof self ? $number->value : $number;

             if ($value ===  "INF") $value =  INF;
        else if ($value === "-INF") $value = -INF;
        else if ($value ===  "NAN") $value =  NAN;

        return $value;
    }

    protected function __construct($value)
    {
        $this->value = self::parse($value);
    }

    public static function valueOf($value): \Decimal\Number
    {
        return new static($value);
    }

    public function add($other): \Decimal\Number
    {
        printf("%s\n", __METHOD__);

        return new static($this->value + $this->parse($other));
    }

    public function sub($other): \Decimal\Number
    {
        printf("%s\n", __METHOD__);

        return new static($this->value - $this->parse($other));
    }

    public function mul($other): \Decimal\Number
    {
        printf("%s\n", __METHOD__);

        return new static($this->value * $this->parse($other));
    }

    public function div($other): \Decimal\Number
    {
        printf("%s\n", __METHOD__);

        return new static($this->value / $this->parse($other));
    }

    public function pow($other): \Decimal\Number
    {
        printf("%s\n", __METHOD__);

        return new static($this->value ** $this->parse($other));
    }

    public function mod($other): \Decimal\Number
    {
        printf("%s\n", __METHOD__);

        return new static($this->value % $this->parse($other));
    }

    public function shiftl($places): \Decimal\Number
    {
        printf("%s\n", __METHOD__);

        return new static($this->value * (10 ** $places));
    }

    public function shiftr($places): \Decimal\Number
    {
        printf("%s\n", __METHOD__);

        return new static($this->value / (10 ** $places));
    }

    public function round(int $places = NULL, int $mode = NULL): \Decimal\Number
    {
        return new static($this->toDecimal(\Decimal\Decimal::MAX_PRECISION)->round($places, $mode)->toString());
    }

    public function toFixed(int $places = NULL, bool $commas = NULL, int $mode = NULL): string
    {
        return new static($this->toDecimal(\Decimal\Decimal::MAX_PRECISION)->toFixed($places, $commas, $mode));
    }

    public function toDecimal(int $precision): \Decimal\Decimal
    {
        printf("%s\n", __METHOD__);

        return parent::toDecimal($precision);
    }

    public function toRational(): \Decimal\Rational
    {
        printf("%s\n", __METHOD__);

        return parent::toRational();
    }

    public function toString(): string
    {
        return (string) $this->value;
    }

    public function toInt(): int
    {
        return (int) $this->value;
    }

    public function toFloat(): float
    {
        return (float) $this->value;
    }

    public function compareTo($other): int
    {
        printf("%s\n", __METHOD__);

        return $this->value <=> self::parse($other);
    }
}
