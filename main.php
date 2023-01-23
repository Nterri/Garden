<?php
class Tree
{
    private $uniqID;
    private $type;
    private $countFetus;
    private $weightFetus;

    public function __construct(string $type)
    {
        $this->uniqID = uniqid();
        $this->type = $type;
        if ($type == "apple")
        {
            $this->countFetus = rand(40, 50);
            $this->weightFetus = rand(150, 180);
        }
        if ($type == "pear")
        {
            $this->countFetus = rand(0, 20);
            $this->weightFetus = rand(130, 170);
        }
    }

    public function getTypeInfo()
    {
        return $this->type;
    }

    public function setCountFetusInfo(int $countFetus)
    {
        $this->countFetus = $countFetus;
    }

    public function setWeightFetusInfo(int $weightFetus)
    {
        $this->weightFetus = $weightFetus;
    }

    public function getCountFetusInfo()
    {
        return $this->countFetus;
    }

    public function getWeightFetusInfo()
    {
        return $this->weightFetus;
    }
}

print_r("Добавление деревьев...\n");
$garden = array();
for ($i = 1;$i <= 10;$i++)
{
    $garden[] = new Tree("apple");
}
for ($i = 1;$i <= 15;$i++)
{
    $garden[] = new Tree("pear");
}
print_r("Деревья добавлены.\n");
$fetusCountsApples = 0;
$fetusCountsPears = 0;
$fetusWeightApples = 0;
$fetusWeightPears = 0;
print_r("Сбор плодов...\n");
foreach ($garden as & $tree)
{
    if ($tree->getTypeInfo() == "apple")
    {
        $fetusCountsApples = $fetusCountsApples + $tree->getCountFetusInfo();
        $fetusWeightApples = $fetusWeightApples + $tree->getWeightFetusInfo();
    }
    if ($tree->getTypeInfo() == "pear")
    {
        $fetusCountsPears = $fetusCountsPears + $tree->getCountFetusInfo();
        $fetusWeightPears = $fetusWeightPears + $tree->getWeightFetusInfo();
    }
}
print_r("Конец сбора.\n");
print_r("Вывод данных:\n\n");
print_r("    Количество яблок: ");
print_r($fetusCountsApples);
print_r(" яблок.\n    Общий вес яблок: ");
print_r($fetusWeightApples);
print_r(" гр.\n\n    Количество груш: ");
print_r($fetusCountsPears);
print_r(" груш.\n    Общий вес груш: ");
print_r($fetusWeightPears);
print_r(" гр.");
?>